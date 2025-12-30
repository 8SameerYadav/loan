<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information - Get Loan Offers | LoanSaathi</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-primary {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        }
        
        .gradient-dark {
            background: linear-gradient(135deg, #7c2d12 0%, #991b1b 50%, #9f1239 100%);
        }
        
        .floating-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.3;
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, -30px); }
        }
        
        /* Custom Radio/Checkbox Styles */
        input[type="radio"]:checked + label {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border-color: #ff6b35;
        }
        
        input[type="radio"] {
            display: none;
        }
        
        /* Input Focus Styles */
        .form-input:focus {
            border-color: #ff6b35;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <div class="gradient-primary text-white px-6 py-2 rounded-full font-bold text-xl">
                    LoanSaathi
                </div>
                <nav class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-gray-700 hover:text-orange-600 font-medium transition">Home</a>
                    <a href="/loans" class="text-gray-700 hover:text-orange-600 font-medium transition">Loans</a>
                    <a href="/about" class="text-gray-700 hover:text-orange-600 font-medium transition">About</a>
                    <a href="/contact" class="text-gray-700 hover:text-orange-600 font-medium transition">Contact</a>
                </nav>
                <button class="gradient-primary text-white px-6 py-2 rounded-full font-semibold hover:scale-105 transition">
                    Login
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-dark relative overflow-hidden py-12">
        <div class="floating-blob w-64 h-64 bg-orange-500 top-10 right-10"></div>
        <div class="floating-blob w-96 h-96 bg-pink-500 bottom-0 left-0" style="animation-delay: 2s;"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                Get Personal Loan Offers in Minutes
            </h1>
            <p class="text-lg text-gray-200 max-w-2xl mx-auto">
                Instant approval, low interest rates, fully digital journey
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                
                <!-- Form Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12" x-data="personalInfoForm()">
                    
                    <!-- Progress Indicator -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">Step 1 of 3</span>
                            <span class="text-sm font-semibold text-orange-600">33% Complete</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="gradient-primary h-2 rounded-full" style="width: 33%"></div>
                        </div>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Personal Information</h2>

                    <form method="POST" action="{{ route('application.personal.submit') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                name="full_name"
                                type="text"
                                x-model="formData.fullName"
                                placeholder="Enter your full name"
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition"
                                required
                            />
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input
                                name="email"
                                type="email"
                                x-model="formData.email"
                                placeholder="Enter your email address"
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition"
                                required
                            />
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Gender <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <input type="radio" id="male" name="gender" value="male" x-model="formData.gender" required>
                                    <label for="male" class="block px-6 py-3 border-2 border-gray-200 rounded-xl font-semibold text-gray-700 text-center cursor-pointer transition hover:border-orange-600">
                                        Male
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="female" name="gender" value="female" x-model="formData.gender" required>
                                    <label for="female" class="block px-6 py-3 border-2 border-gray-200 rounded-xl font-semibold text-gray-700 text-center cursor-pointer transition hover:border-orange-600">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- PAN Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                PAN Number <span class="text-red-500">*</span>
                            </label>
                            <input
                                name="pan"
                                type="text"
                                x-model="formData.pan"
                                @input="formData.pan = formData.pan.toUpperCase()"
                                placeholder="Enter your PAN number"
                                maxlength="10"
                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition uppercase"
                                required
                            />
                            <p class="text-xs text-gray-500 mt-1">Format: ABCDE1234F</p>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Date of Birth <span class="text-red-500">*</span>
                            </label>
                            <p class="text-xs text-gray-500 mb-2">Enter Date of Birth as per the PAN Card</p>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <input
                                        name="dob_day"
                                        type="text"
                                        x-model="formData.dobDay"
                                        placeholder="DD"
                                        maxlength="2"
                                        @input="formData.dobDay = formData.dobDay.replace(/\D/g, '')"
                                        class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition text-center"
                                        required
                                    />
                                </div>
                                <div>
                                    <input
                                        name="dob_month"
                                        type="text"
                                        x-model="formData.dobMonth"
                                        placeholder="MM"
                                        maxlength="2"
                                        @input="formData.dobMonth = formData.dobMonth.replace(/\D/g, '')"
                                        class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition text-center"
                                        required
                                    />
                                </div>
                                <div>
                                    <input
                                        name="dob_year"
                                        type="text"
                                        x-model="formData.dobYear"
                                        placeholder="YYYY"
                                        maxlength="4"
                                        @input="formData.dobYear = formData.dobYear.replace(/\D/g, '')"
                                        class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition text-center"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Pin Code -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Pin Code <span class="text-red-500">*</span>
                            </label>
                            <input
                                name="pincode"
                                type="text"
                                x-model="formData.pincode"
                                @input="formData.pincode = formData.pincode.replace(/\D/g, '')"
                                placeholder="Enter your area pin code"
                                maxlength="6"
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition"
                                required
                            />
                        </div>

                        <!-- Monthly Income -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Monthly Income <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-700 font-semibold">₹</span>
                                <input
                                    name="income"
                                    type="text"
                                    x-model="formData.income"
                                    @input="formatIncome"
                                    placeholder="Enter monthly income"
                                    class="form-input w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl transition"
                                    required
                                />
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Example: 50000 for ₹50,000 or 500000 for ₹5,00,000</p>
                        </div>

                        <!-- Occupation Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Select Your Occupation Type <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <input type="radio" id="salaried" name="occupation" value="salaried" x-model="formData.occupation" required>
                                    <label for="salaried" class="block px-6 py-3 border-2 border-gray-200 rounded-xl font-semibold text-gray-700 text-center cursor-pointer transition hover:border-orange-600">
                                        Salaried
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" id="selfemployed" name="occupation" value="selfemployed" x-model="formData.occupation" required>
                                    <label for="selfemployed" class="block px-6 py-3 border-2 border-gray-200 rounded-xl font-semibold text-gray-700 text-center cursor-pointer transition hover:border-orange-600">
                                        Self-Employed
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full gradient-primary text-white py-4 rounded-xl font-bold text-lg hover:scale-105 transition shadow-lg"
                            >
                                Move To Next Step
                                <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Security Note -->
                        <div class="bg-orange-50 border-2 border-orange-200 rounded-xl p-4 flex items-start gap-3">
                            <svg class="w-6 h-6 text-orange-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 mb-1">Your Information is Safe</p>
                                <p class="text-xs text-gray-600">We use bank-grade encryption to protect your personal and financial information. Your data will only be shared with verified lending partners.</p>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Trust Badges -->
                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-3">
                            <svg class="w-12 h-12 text-orange-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-700">100% Secure</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-3">
                            <svg class="w-12 h-12 text-orange-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-700">Quick Process</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-3">
                            <svg class="w-12 h-12 text-orange-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-700">Best Rates</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-3">
                            <svg class="w-12 h-12 text-orange-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-700">24/7 Support</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-12 mb-8">
                <div>
                    <h3 class="text-white text-xl font-bold mb-4">Contact Us</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:support@loansaathi.in" class="hover:text-orange-500 transition">support@loansaathi.in</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <a href="tel:+918012345678" class="hover:text-orange-500 transition">+91 80 1234 5678</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Chennai, Tamil Nadu, India</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-white text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-orange-500 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Personal Loan</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Business Loan</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Education Loan</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-xl font-bold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-orange-500 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Disclaimer</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm">© 2023 LoanSaathi Finance. All rights reserved.</p>
                    <div class="flex gap-6 text-sm">
                        <a href="#" class="hover:text-orange-500 transition">Privacy Policy</a>
                        <a href="#" class="hover:text-orange-500 transition">Terms of Use</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Alpine.js Component for Personal Info Form
        document.addEventListener('alpine:init', () => {
            Alpine.data('personalInfoForm', () => ({
                formData: {
                    fullName: '',
                    email: '',
                    gender: '',
                    pan: '',
                    dobDay: '',
                    dobMonth: '',
                    dobYear: '',
                    pincode: '',
                    income: '',
                    occupation: ''
                },
                
                formatIncome() {
                    // Remove non-digits
                    this.formData.income = this.formData.income.replace(/\D/g, '');
                },
                
                handleSubmit() {
                    // Validate all fields
                    if (this.validateForm()) {
                        // Prepare data for backend
                        const submitData = {
                            ...this.formData,
                            dob: `${this.formData.dobYear}-${this.formData.dobMonth}-${this.formData.dobDay}`
                        };
                        
                        console.log('Form submitted:', submitData);
                        
                        // Here you would typically send to Laravel backend
                        // fetch('/api/save-personal-info', {
                        //     method: 'POST',
                        //     headers: { 'Content-Type': 'application/json' },
                        //     body: JSON.stringify(submitData)
                        // })
                        
                        // For now, redirect to next step
                        alert('Form submitted successfully! Redirecting to next step...');
                        // window.location.href = '/loan-application/step-2';
                    }
                },
                
                validateForm() {
                    // Add custom validation logic here
                    if (this.formData.pan.length !== 10) {
                        alert('Please enter a valid PAN number');
                        return false;
                    }
                    
                    if (this.formData.pincode.length !== 6) {
                        alert('Please enter a valid 6-digit pin code');
                        return false;
                    }
                    
                    const day = parseInt(this.formData.dobDay);
                    const month = parseInt(this.formData.dobMonth);
                    const year = parseInt(this.formData.dobYear);
                    
                    if (day < 1 || day > 31 || month < 1 || month > 12 || year < 1940 || year > 2006) {
                        alert('Please enter a valid date of birth');
                        return false;
                    }
                    
                    return true;
                }
            }));
        });
    </script>

</body>
</html>