<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching for Your Best Offers - LoanSaathi</title>
    
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
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulse-scale {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }
        
        @keyframes slide-up {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-spin-slow {
            animation: spin-slow 3s linear infinite;
        }
        
        .animate-pulse-scale {
            animation: pulse-scale 2s ease-in-out infinite;
        }
        
        .animate-slide-up {
            animation: slide-up 0.6s ease-out forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        
        @keyframes progress-bar {
            0% { width: 0%; }
            100% { width: 100%; }
        }
        
        .animate-progress {
            animation: progress-bar 8s ease-in-out forwards;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(247, 147, 30, 0.1) 100%);
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

    <!-- Main Content -->
    <section class="py-16 min-h-screen flex items-center relative overflow-hidden">
        
        <!-- Floating Background Blobs -->
        <div class="absolute top-20 left-10 w-64 h-64 blob animate-float opacity-50"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 blob animate-float opacity-30" style="animation-delay: 1s;"></div>
        
        <div class="container mx-auto px-4 relative z-10" x-data="{
            step: 1,
            steps: [
                { id: 1, text: 'Analyzing your profile...', icon: 'user' },
                { id: 2, text: 'Checking eligibility criteria...', icon: 'check' },
                { id: 3, text: 'Comparing offers from 15+ lenders...', icon: 'search' },
                { id: 4, text: 'Preparing your personalized offers...', icon: 'gift' }
            ],
            currentMessage: 'Analyzing your profile...',
            init() {
                const interval = setInterval(() => {
                    if (this.step < 4) {
                        this.step++;
                        this.currentMessage = this.steps[this.step - 1].text;
                    } else {
                        clearInterval(interval);
                    }
                }, 2000);
            }
        }">
            <div class="max-w-4xl mx-auto">
                
                <!-- Thank You Section -->
                <div class="text-center mb-12 opacity-0 animate-slide-up">
                    <div class="gradient-primary w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-6 animate-pulse-scale">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-4">Thank You!</h1>
                    <p class="text-xl text-gray-600 mb-2">Your application has been successfully submitted</p>
                    <p class="text-lg text-gray-500">Application ID: <span class="font-bold text-orange-600">#LS-2024-78945</span></p>
                </div>

                <!-- Searching Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 mb-8 opacity-0 animate-slide-up delay-1">
                    
                    <!-- Searching Animation -->
                    <div class="text-center mb-8">
                        <div class="relative inline-block mb-6">
                            <div class="gradient-primary w-32 h-32 rounded-full flex items-center justify-center animate-pulse-scale">
                                <svg class="w-16 h-16 text-white animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <!-- Spinning Ring -->
                            <div class="absolute inset-0 border-4 border-orange-200 rounded-full animate-spin-slow"></div>
                        </div>
                        
                        <h2 class="text-3xl font-bold text-gray-900 mb-3">Finding Your Best Offers</h2>
                        <p class="text-lg text-gray-600 mb-6" x-text="currentMessage"></p>
                        
                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-3 mb-4">
                            <div class="gradient-primary h-3 rounded-full animate-progress"></div>
                        </div>
                        
                        <p class="text-sm text-gray-500">This usually takes 10-15 seconds</p>
                    </div>

                    <!-- Processing Steps -->
                    <div class="space-y-4">
                        <template x-for="(stepItem, index) in steps" :key="stepItem.id">
                            <div 
                                class="flex items-center p-4 rounded-xl transition-all duration-500"
                                :class="step >= stepItem.id ? 'bg-green-50 border-2 border-green-200' : 'bg-gray-50 border-2 border-gray-200'"
                            >
                                <div 
                                    class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-500"
                                    :class="step >= stepItem.id ? 'bg-green-500' : 'bg-gray-300'"
                                >
                                    <svg 
                                        x-show="step >= stepItem.id" 
                                        class="w-6 h-6 text-white" 
                                        fill="currentColor" 
                                        viewBox="0 0 20 20"
                                    >
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <svg 
                                        x-show="step < stepItem.id" 
                                        class="w-6 h-6 text-white" 
                                        fill="none" 
                                        stroke="currentColor" 
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <p 
                                    class="ml-4 font-semibold transition-colors duration-500"
                                    :class="step >= stepItem.id ? 'text-green-700' : 'text-gray-500'"
                                    x-text="stepItem.text"
                                ></p>
                            </div>
                        </template>
                    </div>

                </div>

                <!-- What Happens Next -->
                <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 opacity-0 animate-slide-up delay-2">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">What Happens Next?</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-orange-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Email Notification</h4>
                            <p class="text-sm text-gray-600">You'll receive your personalized offers via email within 24 hours</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="bg-orange-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Expert Callback</h4>
                            <p class="text-sm text-gray-600">Our loan advisor will contact you to discuss the best options</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="bg-orange-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Quick Approval</h4>
                            <p class="text-sm text-gray-600">Choose your offer and get approved within 48 hours</p>
                        </div>
                    </div>
                </div>

                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 opacity-0 animate-slide-up delay-3">
                    
                    <!-- Tracking Card -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border-2 border-orange-200">
                        <div class="flex items-start">
                            <div class="gradient-primary w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 mb-2">Track Your Application</h4>
                                <p class="text-sm text-gray-700 mb-3">Use your Application ID to check status anytime</p>
                                <div class="bg-white rounded-lg px-4 py-2 inline-block">
                                    <span class="text-xs text-gray-500">Application ID:</span>
                                    <span class="font-bold text-orange-600 ml-2">#LS-2024-78945</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Help Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border-2 border-blue-200">
                        <div class="flex items-start">
                            <div class="bg-blue-600 w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 mb-2">Need Help?</h4>
                                <p class="text-sm text-gray-700 mb-3">Our support team is available 24/7</p>
                                <a href="tel:+918012345678" class="text-blue-600 font-semibold text-sm hover:text-blue-700">
                                    📞 +91 80 1234 5678
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose LoanSaathi -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose LoanSaathi?</h2>
                <p class="text-xl text-gray-600">Join thousands of satisfied customers who found their perfect loan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
                <div class="text-center p-6 bg-gray-50 rounded-2xl card-hover">
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text gradient-primary mb-2">15+</div>
                    <p class="text-gray-600 font-semibold">Partner Banks</p>
                </div>
                
                <div class="text-center p-6 bg-gray-50 rounded-2xl card-hover">
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text gradient-primary mb-2">50K+</div>
                    <p class="text-gray-600 font-semibold">Happy Customers</p>
                </div>
                
                <div class="text-center p-6 bg-gray-50 rounded-2xl card-hover">
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text gradient-primary mb-2">₹500Cr+</div>
                    <p class="text-gray-600 font-semibold">Loans Disbursed</p>
                </div>
                
                <div class="text-center p-6 bg-gray-50 rounded-2xl card-hover">
                    <div class="text-4xl font-extrabold text-transparent bg-clip-text gradient-primary mb-2">4.8/5</div>
                    <p class="text-gray-600 font-semibold">Customer Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-dark py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Have Questions?</h2>
            <p class="text-xl text-gray-200 mb-8">Our loan experts are here to help you make the right decision</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+918012345678" class="gradient-primary text-white px-8 py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-lg inline-block">
                    Call Us Now
                </a>
                <a href="mailto:support@loansaathi.com" class="bg-white text-gray-900 px-8 py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-lg inline-block">
                    Email Support
                </a>
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