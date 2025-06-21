<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MealType;
use App\Models\DeliveryDay;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Admin bisa melihat semua, user hanya miliknya
        if ($user->hasRole('admin')) {
            $subscriptions = Subscription::with(['user', 'plan', 'mealTypes', 'deliveryDays'])
                ->latest()
                ->get();
        } else {
            $subscriptions = $user->Subscriptions()
                ->with(['plan', 'mealTypes', 'deliveryDays'])
                ->latest()
                ->get();
        }

        return view('dashboard.user.index', compact('subscriptions'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'full_name'         => 'required|string|max:255',
            'phone_number'      => 'required|string|max:20',
            'province'          => 'required',
            'city'              => 'required',
            'district'          => 'required',
            'sub_district'      => 'required',
            'postal_code'       => 'required',
            'street_address'    => 'required|string',
            'plan'              => 'required|in:diet,protein,royal',
            'meal_types'        => 'required|array|min:1',
            'meal_types.*'      => 'in:breakfast,lunch,dinner',
            'delivery_days'     => 'required|array|min:1',
            'delivery_days.*'   => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'allergies'         => 'nullable|string'
        ]);

        $provinceName     = $this->getLocationName('province', $request->province);
        $cityName         = $this->getLocationName('city', $request->city);
        $districtName     = $this->getLocationName('district', $request->district);
        $subDistrictName  = $this->getLocationName('sub_district', $request->sub_district);

        $subscription = Subscription::create([
            'user_id'           => Auth::id(),
            'plan_id'           => $this->getPlanId($request->plan),
            'phone_number'      => $request->phone_number,
            'province'          => $provinceName,
            'city'              => $cityName,
            'district'          => $districtName,
            'sub_district'      => $subDistrictName,
            'postal_code'       => $request->postal_code,
            'street_address'    => $request->street_address,
            'allergies'         => $request->allergies
        ]);


        // Simpan meal types
        $mealTypeIds = MealType::whereIn('name', $request->meal_types)->pluck('id');
        $subscription->mealTypes()->attach($mealTypeIds);

        // Simpan delivery days
        $dayIds = DeliveryDay::whereIn('name', $request->delivery_days)->pluck('id');
        $subscription->deliveryDays()->attach($dayIds);

        return redirect()->route('subscriptions')->with('success', 'Subscription created successfully!');
    }

    private function getLocationName($type, $id)
    {
        $url = match ($type) {
            'province'     => "https://alamat.thecloudalert.com/api/provinsi/get/?id={$id}",
            'city'         => "https://alamat.thecloudalert.com/api/kabkota/get/?id={$id}",
            'district'     => "https://alamat.thecloudalert.com/api/kecamatan/get/?id={$id}",
            'sub_district' => "https://alamat.thecloudalert.com/api/kelurahan/get/?id={$id}",
            default        => null
        };

        if (!$url) return null;

        $response = Http::get($url);
        if ($response->successful() && isset($response['result'][0]['text'])) {
            return $response['result'][0]['text'];
        }

        return null;
    }


    // Helper
    private function getPlanId($planSlug)
    {
        return match ($planSlug) {
            'diet'    => 1,
            'protein' => 2,
            'royal'   => 3,
            default   => null
        };
    }

    public function submitPause(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'pause_start' => 'required|date|after_or_equal:today',
            'pause_end' => 'required|date|after_or_equal:pause_start',
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);

        // Simpan ke kolom jika sudah disiapkan
        $subscription->pause_start = Carbon::parse($request->pause_start);
        $subscription->pause_end = Carbon::parse($request->pause_end);
        $subscription->status = 'paused'; // kalau ada kolom boolean
        $subscription->save();

        return back()->with('success', 'Subscription successfully paused!');
    }

    public function cancel($id)
    {
        $siuu = Subscription::findOrFail($id)->update(['status' => 'cancelled']);
        return back()->with('success', 'Langganan berhasil dibatalkan.');
    }
}
