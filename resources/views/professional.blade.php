<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Personal Loan Offers - LoanSaathi</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
            background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 50%, #9f1239 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
        }
        
        .input-focus:focus {
            border-color: #ff6b35;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
        
        .radio-custom:checked + label {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="gradient-primary text-white font-bold text-2xl px-4 py-2 rounded-lg">
                        LoanSaathi
                    </div>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-orange-600 font-medium">Home</a>
                    <a href="#" class="text-gray-700 hover:text-orange-600 font-medium">Loans</a>
                    <a href="#" class="text-gray-700 hover:text-orange-600 font-medium">About</a>
                    <a href="#" class="text-gray-700 hover:text-orange-600 font-medium">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-dark py-20 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
                    Get Personal Loan<br>Offers in Minutes
                </h1>
                <p class="text-xl text-gray-200 mb-8">
                    Instant approval, low interest rates, fully digital journey
                </p>
                <div class="flex items-center justify-center space-x-2 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-lg font-semibold">Check your loan eligibility instantly</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Application Form -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                
                <!-- Application Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12" x-data="{
                    step: 1,
                    formData: {
                        companyType: '',
                        loanPurpose: '',
                        ownership: ''
                    }
                }">
                    
                    <!-- Progress Steps -->
                    <div class="flex items-center justify-between mb-12">
                        <div class="flex items-center">
                            <div :class="step >= 1 ? 'gradient-primary' : 'bg-gray-300'" class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold">1</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Professional Info</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 mx-4 bg-gray-200">
                            <div :style="'width: ' + ((step - 1) * 50) + '%'" class="gradient-primary h-full transition-all duration-500"></div>
                        </div>
                        <div class="flex items-center">
                            <div :class="step >= 2 ? 'gradient-primary' : 'bg-gray-300'" class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold">2</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Submit</p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('application.professional.submit') }}">
                        @csrf
                        
                        <!-- Step 1: Professional Information -->
                        <div x-show="step === 1" x-transition>
                            <h2 class="text-3xl font-bold text-gray-900 mb-8">Professional Information</h2>
                            
                            <!-- Company Type -->
                            <div class="mb-8">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Select Your Company Type
                                </label>
                                <select name="company_type" x-model="formData.companyType" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl input-focus text-gray-900 font-medium" required>
                                    <option value="">Choose company type</option>
                                    <option value="private">Private Limited Company (Pvt Ltd)</option>
                                    <option value="public">Public Limited Company</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="proprietorship">Proprietorship</option>
                                </select>
                            </div>

                            <!-- Loan Purpose -->
                            <div class="mb-8">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Select Loan Purpose
                                </label>
                                <select name="loan_purpose" x-model="formData.loanPurpose" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl input-focus text-gray-900 font-medium" required>
                                    <option value="">Choose loan purpose</option>
                                    <option value="mortgage">Mortgage Loan</option>
                                    <option value="auto">Auto Loan</option>
                                    <option value="realestate">Real Estate/Commercial Property</option>
                                    <option value="education">Education Loan</option>
                                    <option value="medical">Medical Loan</option>
                                    <option value="personal">Personal Loan</option>
                                </select>
                            </div>

                            <!-- Business Ownership Type -->
                            <div class="mb-10">
                                <label class="block text-sm font-semibold text-gray-700 mb-4">
                                    Business Ownership Type
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                            <input type="radio" id="owned" name="ownership" value="owned" x-model="formData.ownership" class="radio-custom hidden" required>
                                        <label for="owned" class="block cursor-pointer px-6 py-4 border-2 border-gray-200 rounded-xl text-center font-semibold text-gray-700 hover:border-orange-600 transition-all">
                                            Owned
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="rented" name="ownership" value="rented" x-model="formData.ownership" class="radio-custom hidden" required>
                                        <label for="rented" class="block cursor-pointer px-6 py-4 border-2 border-gray-200 rounded-xl text-center font-semibold text-gray-700 hover:border-orange-600 transition-all">
                                            Rented
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Continue Button (advance client-side) -->
                            <button type="button" @click="step = 2" class="w-full gradient-primary text-white py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-lg">
                                Continue to Next Step
                            </button>
                        </div>

                        <!-- Step 2: Terms & Submit -->
                        <div x-show="step === 2" x-transition>
                            <h2 class="text-3xl font-bold text-gray-900 mb-8">Terms & Conditions</h2>
                            
                            <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                                <div class="flex items-start mb-4">
                                    <input name="terms" type="checkbox" id="terms" class="mt-1 w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500" required>
                                    <label for="terms" class="ml-3 text-sm text-gray-600 leading-relaxed">
                                        I have read and agreed to the Terms of Use and hereby appoint LoanSaathi and its Lending Partners to receive my credit information from credit bureaus. By submitting my details I override my NDNC registration & authorize LoanSaathi and its Lending Partners/representatives to contact me through Call, SMS, Email, Whatsapp or any other mode. You also authorize us to send you promotional offers of financial & non-financial products or services from time to time.
                                    </label>
                                </div>
                            </div>

                            <div class="flex space-x-4">
                                <button type="button" @click="step = 1" class="w-full border-2 border-orange-600 text-orange-600 py-4 rounded-full font-bold text-lg hover:bg-orange-600 hover:text-white transition-all">
                                    Back
                                </button>
                                <button type="submit" class="w-full gradient-primary text-white py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-lg">
                                    Get My Offers
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Key Advantages -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Key Advantages</h2>
                <p class="text-xl text-gray-600">We value your trust - Simple, fast, and reliable personal loans</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 rounded-2xl p-6 card-hover">
                    <div class="gradient-primary w-12 h-12 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Discover with ease</h3>
                    <p class="text-gray-600">Compare Pre-qualified offers from RBI Approved lenders</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 card-hover">
                    <div class="gradient-primary w-12 h-12 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Instant Approval</h3>
                    <p class="text-gray-600">Get pre-approved offers within minutes</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 card-hover">
                    <div class="gradient-primary w-12 h-12 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">100% Secure</h3>
                    <p class="text-gray-600">Bank-grade security for your data</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 card-hover">
                    <div class="gradient-primary w-12 h-12 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Best Rates</h3>
                    <p class="text-gray-600">Competitive interest rates from top lenders</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900">How It Works</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="gradient-primary w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Provide Basic Details</h3>
                    <p class="text-gray-600">Fill out a simple application form</p>
                </div>
                <div class="text-center">
                    <div class="gradient-primary w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Compare and Select Offer</h3>
                    <p class="text-gray-600">Choose from multiple pre-approved offers</p>
                </div>
                <div class="text-center">
                    <div class="gradient-primary w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Complete Application Form</h3>
                    <p class="text-gray-600">Submit required documents digitally</p>
                </div>
                <div class="text-center">
                    <div class="gradient-primary w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">4</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Sign & Get Funded</h3>
                    <p class="text-gray-600">E-sign agreement and receive funds</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Disclaimer</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    This site is free service for customers and provides useful information about financial products and services, tools, news and summary about popular financial products and services. We are not an Financial services company, bank, NBFC, Insurers, brokers, aggregators, direct selling agent, agent, registered advisors and do not solicit, advise or sell any financial products. In case use decides to connect directly with any advertiser or brands listed through this website for their individual requirements and/or quotes, we request the users to check that the providers have necessary license required by their industry regulators to offer services in India. This site does not warrant or guarantee any price, quality, service or offer listed. It is the responsibility of the user to verify details of the service provider before they decide to enter into any transaction with them.
                </p>
                <p class="text-sm text-gray-600 mt-4">
                    Contact us at <a href="mailto:support@loansaathi.com" class="text-orange-600 font-semibold hover:underline">support@loansaathi.com</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="gradient-primary text-white font-bold text-2xl px-4 py-2 rounded-lg inline-block mb-4">
                        LoanSaathi
                    </div>
                    <p class="text-gray-400 text-sm">
                        Your trusted partner for quick and hassle-free loans. Compare offers from top lenders in India.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            support@loansaathi.com
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            +91 80 1234 5678
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Chennai, Tamil Nadu, India
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-400">
                <p class="mb-2">© 2023 LoanSaathi Finance. All rights reserved.</p>
                <p class="text-xs leading-relaxed max-w-4xl mx-auto">
                    Disclaimer: LoanSaathi is a loan aggregator and not a lender. We connect borrowers with lenders. The final decision lies with the lender. Interest rates and terms are subject to change based on credit profile and lender policies.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>