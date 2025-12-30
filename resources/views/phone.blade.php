<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Loan - Get Instant Approval | LoanSaathi</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-primary {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        }
        
        .gradient-secondary {
            background: linear-gradient(135deg, #ff8c42 0%, #ff5a3c 100%);
        }
        
        .gradient-dark {
            background: linear-gradient(135deg, #7c2d12 0%, #991b1b 50%, #9f1239 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
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
        
        .swiper-pagination-bullet-active {
            background: #ff6b35 !important;
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

    <!-- Hero Section with Application Form -->
    <section class="gradient-dark relative overflow-hidden py-20">
        <div class="floating-blob w-64 h-64 bg-orange-500 top-10 right-10"></div>
        <div class="floating-blob w-96 h-96 bg-pink-500 bottom-0 left-0" style="animation-delay: 2s;"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                        Get Personal Loan Offers in Minutes
                    </h1>
                    <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                        Instant approval, low interest rates, fully digital journey. Check your loan eligibility instantly.
                    </p>
                    <div class="flex items-center gap-4 text-gray-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">Quick approval in 5 minutes</span>
                    </div>
                </div>

                <!-- Application Form Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-8" x-data="loanForm()">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Apply Now</h3>
                    
                    <form method="POST" action="{{ route('application.phone.submit') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Mobile Number
                            </label>
                            <div class="flex">
                                <span class="inline-flex items-center px-4 bg-gray-100 border-2 border-r-0 border-gray-200 rounded-l-xl text-gray-700 font-semibold">
                                    +91
                                </span>
                                <input
                                    name="mobile"
                                    type="tel"
                                    maxlength="10"
                                    x-model="mobile"
                                    @input="mobile = mobile.replace(/\D/g, '')"
                                    placeholder="Enter mobile number"
                                    class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-r-xl focus:border-orange-600 focus:outline-none transition"
                                    required
                                />
                            </div>
                        </div>

                        <div class="bg-orange-50 border-2 border-orange-200 rounded-xl p-4">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input
                                    name="agreed"
                                    type="checkbox"
                                    x-model="agreed"
                                    value="1"
                                    class="mt-1 w-5 h-5 accent-orange-600"
                                />
                                <span class="text-xs text-gray-700 leading-relaxed">
                                    I have read and agreed to the <a href="#" class="text-orange-600 font-semibold">Terms of Use</a> and hereby appoint LoanSaathi and its Lending Partners to receive my credit information from credit bureaus. By submitting my details I override my NDNC registration & authorize LoanSaathi and its Lending Partners/representatives to contact me through Call, SMS, Email, Whatsapp or any other mode. You also authorize us to send you promotional offers of financial & non-financial products or services from time to time.
                                </span>
                            </label>
                        </div>

                        <button
                            type="submit"
                            :disabled="mobile.length !== 10 || !agreed"
                            class="w-full gradient-primary text-white py-4 rounded-xl font-bold text-lg hover:scale-105 transition disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                        >
                            <span x-show="!otpSent">Get OTP</span>
                            <span x-show="otpSent">✓ OTP Sent Successfully!</span>
                        </button>
                    </form>

                    <p class="text-xs text-gray-500 text-center mt-4">
                        100% Safe & Secure | Free Service
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Advantages -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Key Advantages
                </h2>
                <p class="text-xl text-gray-600">
                    We value your trust - Simple, fast, and reliable personal loans
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 text-center">
                    <div class="gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Discover with ease</h3>
                    <p class="text-gray-600">Compare Pre-qualified offers from RBI Approved lenders</p>
                </div>

                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 text-center">
                    <div class="gradient-secondary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Discover with ease</h3>
                    <p class="text-gray-600">Compare Pre-qualified offers from RBI Approved lenders</p>
                </div>

                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 text-center">
                    <div class="gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Discover with ease</h3>
                    <p class="text-gray-600">Compare Pre-qualified offers from RBI Approved lenders</p>
                </div>

                <div class="card-hover bg-white rounded-2xl shadow-lg p-8 text-center">
                    <div class="gradient-secondary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Discover with ease</h3>
                    <p class="text-gray-600">Compare Pre-qualified offers from RBI Approved lenders</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Banking Partners -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Banking Partners</h2>
            
            <!-- Swiper Slider -->
            <div class="swiper partners-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">HDFC Bank</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">ICICI Bank</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">Axis Bank</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">Kotak Mahindra</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">Yes Bank</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">IndusInd Bank</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">Bajaj Finserv</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-md p-8 flex items-center justify-center h-32">
                            <span class="text-2xl font-bold text-gray-800">Tata Capital</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination mt-8"></div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 text-center mb-16">How It Works</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="relative">
                    <div class="bg-orange-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-black text-orange-600">01</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3">Provide basic details</h3>
                    <p class="text-gray-600 text-center">Fill in your personal and financial information</p>
                </div>

                <div class="relative">
                    <div class="bg-orange-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-black text-orange-600">02</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3">Compare and Select Offer</h3>
                    <p class="text-gray-600 text-center">Review multiple loan offers from our partners</p>
                </div>

                <div class="relative">
                    <div class="bg-orange-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-black text-orange-600">03</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3">Complete Application Form</h3>
                    <p class="text-gray-600 text-center">Submit required documents and details</p>
                </div>

                <div class="relative">
                    <div class="bg-orange-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-black text-orange-600">04</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3">Sign Agreement</h3>
                    <p class="text-gray-600 text-center">Loan amount is credited to your account</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Disclaimer</h3>
            <div class="text-sm text-gray-600 leading-relaxed space-y-4">
                <p>This site is free service for customers and provides useful information about financial products and services, tools, news and summary about popular financial products and services. We are not an Financial services company, bank, NBFC, Insurers, brokers, aggregators, direct selling agent, agent, registered advisors and do not solicit, advise or sell any financial products.</p>
                <p>In case use decides to connect directly with any advertiser or brands listed through this website for their individual requirements and/or quotes, we request the users to check that the providers have necessary license required by their industry regulators to offer services in India. This site does not warrant or guarantee any price, quality, service or offer listed. It is the responsibility of the user to verify details of the service provider before they decide to enter into any transaction with them.</p>
                <p class="font-semibold">Contact us at <a href="mailto:LoanSaathi@gmail.com" class="text-orange-600">LoanSaathi@gmail.com</a></p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
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
                <p class="text-xs text-gray-500 mt-4">
                    <strong>Disclaimer:</strong> LoanSaathi is a loan aggregator and not a lender. We connect borrowers with lenders. The final decision lies with the lender. Interest rates and terms are subject to change based on credit profile and lender policies.
                </p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Alpine.js Component for Form
        document.addEventListener('alpine:init', () => {
            Alpine.data('loanForm', () => ({
                mobile: '',
                agreed: false,
                otpSent: false,
                
                handleSubmit() {
                    if (this.mobile.length === 10 && this.agreed) {
                        this.otpSent = true;
                        
                        // Here you would typically send to Laravel backend
                        // fetch('/api/send-otp', { ... })
                        
                        setTimeout(() => {
                            this.otpSent = false;
                        }, 3000);
                    }
                }
            }));
        });

        // Swiper Initialization
        const partnersSwiper = new Swiper('.partners-swiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
    </script>

</body>
</html>