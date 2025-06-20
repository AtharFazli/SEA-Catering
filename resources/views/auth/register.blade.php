<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - SEA Catering</title>
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
            width: 33%;
            background-color: #ef4444;
        }

        .strength-medium {
            width: 66%;
            background-color: #f59e0b;
        }

        .strength-strong {
            width: 100%;
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
            <p class="text-gray-600" id="headerSubtitle">Selamat datang di SEA Catering</p>
        </div>

        <!-- Auth Form Container -->
        <div class="rounded-2xl bg-white p-8 shadow-xl" id="authContainer">
            <!-- Form Header -->
            <div class="mb-6 text-center">
                <h2 class="mb-2 text-2xl font-bold text-gray-900" id="formTitle">Register</h2>
                <p class="text-gray-600" id="formSubtitle">Masuk ke akun Anda untuk melanjutkan</p>
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
            <form class="space-y-4" id="authForm" method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name Field (Register Only) -->
                <div class="hidden" id="nameField">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <input
                            class="form-input w-full rounded-lg border border-gray-300 bg-white py-3 pl-10 pr-4 focus:border-transparent focus:ring-2 focus:ring-blue-500"
                            id="name" name="name" type="text" placeholder="Nama lengkap" />
                    </div>
                    <div class="mt-1 hidden text-sm text-red-600" id="nameError">
                        <svg class="mr-1 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="nameErrorText"></span>
                    </div>
                </div>

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
                            id="email" name="email" type="email" placeholder="Email" />
                    </div>
                    <div class="mt-1 hidden text-sm text-red-600" id="emailError">
                        <svg class="mr-1 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="emailErrorText"></span>
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <input
                            class="form-input w-full rounded-lg border border-gray-300 bg-white py-3 pl-10 pr-12 focus:border-transparent focus:ring-2 focus:ring-blue-500"
                            id="password" name="password" type="password" placeholder="Password" />
                        <button
                            class="absolute right-3 top-1/2 -translate-y-1/2 transform text-gray-400 hover:text-gray-600"
                            id="togglePassword" type="button">
                            <svg class="h-5 w-5" id="eyeIcon" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-1 hidden text-sm text-red-600" id="passwordError">
                        <svg class="mr-1 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="passwordErrorText"></span>
                    </div>
                </div>

                <!-- Confirm Password Field (Register Only) -->
                <div class="" id="confirmPasswordField">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <input
                            class="form-input w-full rounded-lg border border-gray-300 bg-white py-3 pl-10 pr-12 focus:border-transparent focus:ring-2 focus:ring-blue-500"
                            id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Konfirmasi password" />
                        <button
                            class="absolute right-3 top-1/2 -translate-y-1/2 transform text-gray-400 hover:text-gray-600"
                            id="toggleConfirmPassword" type="button">
                            <svg class="h-5 w-5" id="eyeConfirmIcon" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-1 hidden text-sm text-red-600" id="confirmPasswordError">
                        <svg class="mr-1 inline h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="confirmPasswordErrorText"></span>
                    </div>
                </div>

                {{-- Password Strength Indicator --}}
                <div class="mt-2 hidden" id="passwordStrengthWrapper">
                    <div class="h-2 w-full rounded-full bg-gray-200">
                        <div class="h-full rounded-full transition-all duration-300 ease-in-out"
                            id="passwordStrengthBar"></div>
                    </div>
                    <p class="mt-1 text-xs font-medium" id="passwordStrengthText"></p>
                </div>

                <!-- Password Requirements (Register Only) -->
                <div class="rounded-lg bg-blue-50 p-3" id="passwordRequirements">
                    <p class="mb-2 text-sm font-medium text-blue-800">Password harus:</p>
                    <div class="space-y-1">
                        <div class="flex items-center text-sm text-blue-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Minimal 6 karakter
                        </div>
                        <div class="flex items-center text-sm text-blue-700">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Mudah diingat tapi sulit ditebak
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button
                    class="btn-primary flex w-full items-center justify-center rounded-lg px-4 py-3 font-semibold text-white disabled:cursor-not-allowed disabled:opacity-50"
                    id="submitBtn" type="submit">
                    <span id="submitText">Register</span>
                    <div class="spinner ml-2 hidden" id="loadingSpinner"></div>
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="bg-white px-2 text-gray-500">atau</span>
                </div>
            </div>

            <!-- Switch Auth Mode -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    <span id="switchText">Sudah punya akun?</span>
                    <a class="font-semibold text-blue-600 transition-colors duration-200 hover:text-blue-800"
                        href="{{ route('login') }}">Masuk sekarang</a>
                </p>
            </div>
        </div>

        <!-- Terms and Privacy -->
        <div class="mt-6 text-center">
            <p class="text-xs text-gray-500">
                Dengan <span id="actionText">masuk</span>, Anda menyetujui
                <button class="text-blue-600 underline hover:text-blue-800">Syarat & Ketentuan</button>
                dan
                <button class="text-blue-600 underline hover:text-blue-800">Kebijakan Privasi</button>
                kami.
            </p>
        </div>
    </div>

    <script>
        // Password
        const passwordInput = document.getElementById('password');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePasswordBtn.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';

            eyeIcon.innerHTML = isHidden ?
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />` :
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
        });

        // Confirm Password
        const confirmInput = document.getElementById('password_confirmation');
        const toggleConfirmBtn = document.getElementById('toggleConfirmPassword');
        const eyeConfirmIcon = document.getElementById('eyeConfirmIcon');

        toggleConfirmBtn.addEventListener('click', () => {
            const isHidden = confirmInput.type === 'password';
            confirmInput.type = isHidden ? 'text' : 'password';

            eyeConfirmIcon.innerHTML = isHidden ?
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />` :
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
        });


        // Password Requirements
        const passwordRequirements = document.getElementById('passwordRequirements');
        const isRegisterPage = true;

        passwordInput.addEventListener('input', function() {
            const value = passwordInput.value;

            // Munculkan jika panjang password > 0
            if (value.length > 0 && isRegisterPage) {
                passwordRequirements.classList.remove('hidden');
            } else {
                passwordRequirements.classList.add('hidden');
            }
        });

        // Sembunyikan default saat load awal (kalau kosong)
        if (passwordInput.value.length === 0) {
            passwordRequirements.classList.add('hidden');
        }

        // Password Strength
        const passwordStrengthWrapper = document.getElementById('passwordStrengthWrapper');
        const passwordStrengthBar = document.getElementById('passwordStrengthBar');
        const passwordStrengthText = document.getElementById('passwordStrengthText');

        function checkPasswordStrength(password) {
            let strength = 0;

            // Penilaian kekuatan
            if (password.length >= 6) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            return strength;
        }

        document.getElementById('password').addEventListener('input', function() {
            const value = this.value;
            if (value.length === 0) {
                passwordStrengthWrapper.classList.add('hidden');
                return;
            }

            passwordStrengthWrapper.classList.remove('hidden');
            const score = checkPasswordStrength(value);

            passwordStrengthBar.className = 'h-full rounded-full transition-all duration-300 ease-in-out';
            passwordStrengthText.className = 'text-xs mt-1 font-medium';

            if (score <= 1) {
                passwordStrengthBar.classList.add('strength-weak');
                passwordStrengthText.textContent = 'Lemah';
                passwordStrengthText.classList.add('text-red-600');
            } else if (score === 2 || score === 3) {
                passwordStrengthBar.classList.add('strength-medium');
                passwordStrengthText.textContent = 'Sedang';
                passwordStrengthText.classList.add('text-yellow-600');
            } else {
                passwordStrengthBar.classList.add('strength-strong');
                passwordStrengthText.textContent = 'Kuat';
                passwordStrengthText.classList.add('text-green-600');
            }
        });
    </script>

</body>

</html>
