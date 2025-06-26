<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot Password - SEA Catering</title>

    <link href="{{ asset('/img/SEA.png') }}" rel="icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .auth-container {
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 50%, #e0e7ff 100%);
        }

        .form-input {
            transition: all 0.2s ease-in-out;
        }

        .form-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #4f46e5 100%);
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 0%, #4338ca 100%);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.25);
        }

        .social-btn {
            transition: all 0.2s ease-in-out;
        }

        .social-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .spinner {
            border: 2px solid #f3f4f6;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .password-strength {
            transition: all 0.3s ease;
        }

        .strength-weak {
            background-color: #ef4444;
        }

        .strength-medium {
            background-color: #f59e0b;
        }

        .strength-strong {
            background-color: #10b981;
        }
    </style>
</head>

<body class="auth-container flex min-h-screen items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo and Header -->
        <div class="mb-8 text-center">
            <div
                class="mb-4 inline-flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-indigo-600">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4">
                    </path>
                </svg>
            </div>
            <h1 class="mb-2 text-3xl font-bold text-gray-900">SEA Catering</h1>
            <p class="text-gray-600" id="headerSubtitle">Forgot Your Password?</p>
        </div>

        <!-- Auth Form Container -->
        <div class="rounded-2xl bg-white p-8 shadow-xl" id="authContainer">
            <!-- Form Header -->
            <div class="mb-6 text-center">
                <h2 class="mb-2 text-2xl font-bold text-gray-900" id="formTitle">Forgot Password</h2>
                <p class="text-gray-600" id="formSubtitle">Reset your password</p>
                @include('dashboard.layouts.error')
            </div>

            <!-- Error Messages -->
            <div class="mb-4 hidden rounded-lg border border-red-200 bg-red-50 p-4" id="errorContainer">
                <div class="flex items-center">
                    <svg class="mr-2 h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm text-red-700" id="errorMessage"></span>
                </div>
            </div>

            <!-- Auth Form -->
            <form class="space-y-4" id="authForm" method="POST" action="{{ route('password.request') }}">
                @csrf
                <!-- Email Field -->
                <div>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                            </path>
                        </svg>
                        <input
                            class="form-input w-full rounded-lg border border-gray-300 bg-white py-3 pl-10 pr-4 focus:border-transparent focus:ring-2 focus:ring-blue-500"
                            id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email"
                            required autofocus />
                    </div>
                    <div class="mt-1 hidden text-sm text-red-600" id="emailError">
                        <svg class="mr-1 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="emailErrorText"></span>
                    </div>
                </div>

                <!-- Submit Button -->
                <p class="text-sm text-gray-600">Please check your email after click the button below</p>
                <button
                    class="btn-primary flex w-full items-center justify-center rounded-lg px-4 py-3 font-semibold text-white disabled:cursor-not-allowed disabled:opacity-50"
                    id="submitBtn" type="submit">
                    <span id="submitText">Reset</span>
                    <div class="spinner ml-2 hidden" id="loadingSpinner"></div>
                </button>
            </form>

            <!-- Switch Auth Mode -->
        </div>

    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        toggleBtn.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';

            // Optional: ganti ikon (bisa diganti pakai class toggle kalau mau dinamis)
            eyeIcon.innerHTML = isHidden ?
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />` :
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
        });
    </script>

</body>

</html>
