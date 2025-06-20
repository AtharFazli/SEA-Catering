<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - SEA Catering</title>
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
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .password-strength {
            transition: all 0.3s ease;
        }
        
        .strength-weak { background-color: #ef4444; }
        .strength-medium { background-color: #f59e0b; }
        .strength-strong { background-color: #10b981; }
    </style>
</head>
<body class="auth-container min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo and Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">SEA Catering</h1>
            <p class="text-gray-600" id="headerSubtitle">Selamat datang kembali!</p>
        </div>

        <!-- Auth Form Container -->
        <div class="bg-white rounded-2xl shadow-xl p-8" id="authContainer">
            <!-- Form Header -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2" id="formTitle">Login</h2>
                <p class="text-gray-600" id="formSubtitle">Masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <!-- Error Messages -->
            <div id="errorContainer" class="hidden mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-red-700 text-sm" id="errorMessage"></span>
                </div>
            </div>

            <!-- Auth Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4" id="authForm">
              @csrf
                <!-- Name Field (Register Only) -->
                <div class="hidden" id="nameField">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Nama lengkap"
                            class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        />
                    </div>
                    <div class="text-red-600 text-sm mt-1 hidden" id="nameError">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="nameErrorText"></span>
                    </div>
                </div>

                <!-- Email Field -->
                <div>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Email"
                            class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        />
                    </div>
                    <div class="text-red-600 text-sm mt-1 hidden" id="emailError">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="emailErrorText"></span>
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            class="form-input w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        />
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                        >
                            <svg class="w-5 h-5" id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="text-red-600 text-sm mt-1 hidden" id="passwordError">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="passwordErrorText"></span>
                    </div>
                </div>

                <!-- Confirm Password Field (Register Only) -->
                <div class="hidden" id="confirmPasswordField">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Konfirmasi password"
                            class="form-input w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        />
                        <button
                            type="button"
                            id="toggleConfirmPassword"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                        >
                            <svg class="w-5 h-5" id="eyeConfirmIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="text-red-600 text-sm mt-1 hidden" id="confirmPasswordError">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="confirmPasswordErrorText"></span>
                    </div>
                </div>

                <!-- Password Requirements (Register Only) -->
                <div class="hidden bg-blue-50 p-3 rounded-lg" id="passwordRequirements">
                    <p class="text-sm text-blue-800 font-medium mb-2">Password harus:</p>
                    <div class="space-y-1">
                        <div class="flex items-center text-sm text-blue-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Minimal 6 karakter
                        </div>
                        <div class="flex items-center text-sm text-blue-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Mudah diingat tapi sulit ditebak
                        </div>
                    </div>
                </div>

                <!-- Forgot Password (Login Only) -->
                <div class="text-right" id="forgotPassword">
                    <button
                        type="button"
                        class="text-sm text-blue-600 hover:text-blue-800 transition-colors duration-200"
                    >
                        Lupa password?
                    </button>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    id="submitBtn"
                    class="btn-primary w-full text-white py-3 px-4 rounded-lg font-semibold disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center"
                >
                    <span id="submitText">Masuk</span>
                    <div class="spinner ml-2 hidden" id="loadingSpinner"></div>
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">atau</span>
                </div>
            </div>


            <!-- Switch Auth Mode -->
            <div class="text-center mt-6">
                <p class="text-gray-600">
                    <span id="switchText">Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-200">Daftar sekarang</a>
                </p>
            </div>
        </div>

        <!-- Terms and Privacy -->
        <div class="text-center mt-6">
            <p class="text-xs text-gray-500">
                Dengan <span id="actionText">masuk</span>, Anda menyetujui
                <button class="text-blue-600 hover:text-blue-800 underline">Syarat & Ketentuan</button>
                dan
                <button class="text-blue-600 hover:text-blue-800 underline">Kebijakan Privasi</button>
                kami.
            </p>
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
    eyeIcon.innerHTML = isHidden
      ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />`
      : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
  });
</script>



  
</body>
</html>