<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoanSaathi - Modern Loan Management Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-primary {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        }
        
        .gradient-secondary {
            /* warmer orange-pink secondary */
            background: linear-gradient(135deg, #ff8c42 0%, #ff5a3c 100%);
        }
        
        .gradient-success {
            /* switch blue/teal to orange-warm for theme consistency */
            background: linear-gradient(135deg, #ff8a4b 0%, #ffbf80 100%);
        }
        
        .gradient-warning {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .animate-float {
            /* gentler float for hero blobs to avoid heavy overlap */
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        /* ===== Hero fixes: prevent overlapping content and aggressive animations ===== */
        .hero-blobs { z-index: 0; pointer-events: none; }
        .heroSwiper .swiper-slide { overflow: hidden; }
        .heroSwiper .container.min-h-screen { min-height: 75vh !important; }
        .hero-slide-content { position: relative; z-index: 20; }
        .hero-slide-img { width: 100%; height: auto; object-fit: cover; border-radius: 1rem; z-index: 10; display: block; }

        /* reduce size/opacity of background blobs on small screens */
        @media (max-width: 1024px) {
            .hero-blobs .absolute { opacity: 0.08 !important; }
            .heroSwiper .container.min-h-screen { min-height: 60vh !important; }
        }
        
        .swiper-pagination-bullet-active {
            background: #ff6b35 !important;
        }
        
        .scroll-hidden::-webkit-scrollbar {
            display: none;
        }
        
        .scroll-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-50" x-data="{ 
    mobileMenuOpen: false, 
    applicationModalOpen: false,
    selectedService: null,
    stats: {
        loansProcessed: 0,
        projectsCompleted: 0,
        happyClients: 0,
        successRate: 0
    }
}">

    <!-- ==================== TOP BAR ==================== -->
    <div class="bg-gradient-to-r from-orange-900 to-red-900  text-white py-3 hidden lg:block">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-6">
                    <a href="tel:+918001234567" class="flex items-center space-x-2 hover:text-purple-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+91 800 123 4567</span>
                    </a>
                    <a href="mailto:support@loansaathi.com" class="flex items-center space-x-2 hover:text-purple-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>support@loansaathi.com</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-purple-200 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-purple-200 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-purple-200 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-purple-200 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MAIN HEADER ==================== -->
    <header class="bg-white shadow-md sticky top-0 z-50" x-data="{ scrolled: false }" 
            @scroll.window="scrolled = window.pageYOffset > 50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 gradient-primary rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-orange-900 to-red-900 ext bg-clip-text text-transparent">
                            LoanSaathi
                        </h1>
                        <!-- <p class="text-xs text-gray-500">Smart Lending Solutions</p> -->
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-orange-600 font-medium transition">Home</a>
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-orange-600 font-medium transition flex items-center space-x-1">
                            <span>About</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 rounded-t-lg">Our Story</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-orange-50">Team</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 rounded-b-lg">Careers</a>
                        </div>
                    </div>
                    <a href="#services" class="text-gray-700 hover:text-orange-600 font-medium transition">Services</a>
                    <a href="#projects" class="text-gray-700 hover:text-orange-600 font-medium transition">Projects</a>
                    <a href="#blog" class="text-gray-700 hover:text-orange-600 font-medium transition">Blog</a>
                    <a href="#contact" class="text-gray-700 hover:text-orange-600 font-medium transition">Contact</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden lg:block">
                    <button @click="window.location.href='/apply/phone'" 
                            class="px-6 py-3 gradient-primary text-white rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        Apply Now
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-gray-700">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
                <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="lg:hidden bg-white border-t">
                <div class="px-4 py-4 space-y-3">
                <a href="#home" class="block py-2 text-gray-700 hover:text-orange-600 font-medium">Home</a>
                <a href="#about" class="block py-2 text-gray-700 hover:text-orange-600 font-medium">About</a>
                <a href="#services" class="block py-2 text-gray-700 hover:text-orange-600 font-medium">Services</a>
                <a href="#projects" class="block py-2 text-gray-700 hover:text-orange-600 font-medium">Projects</a>
                <a href="#blog" class="block py-2 text-gray-700 hover:text-orange-600 font-medium">Blog</a>
                <a href="#contact" class="block py-2 text-gray-700 hover:text-orange-600 font-medium">Contact</a>
                <button @click="window.location.href='/apply/phone'; mobileMenuOpen = false" 
                        class="w-full px-6 py-3 gradient-primary text-white rounded-full font-semibold mt-4">
                    Apply Now
                </button>
            </div>
        </div>
    </header>

    <!-- ==================== HERO SLIDER ==================== -->
  <section class="relative bg-gradient-to-br from-orange-900 via-red-900 to-pink-800 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-float"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-orange-500 rounded-full mix-blend-multiply filter blur-3xl animate-float" style="animation-delay: 2s"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl animate-float" style="animation-delay: 4s"></div>
    </div>

    <div class="swiper heroSwiper relative z-10">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="container mx-auto px-4 py-20 lg:py-32 min-h-screen flex items-center">
                    <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                        <div class="text-white space-y-6 max-w-2xl" data-aos="fade-right">
                            <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold">
                                🚀 Fastest Loan Approval
                            </span>
                            <h2 class="text-4xl lg:text-6xl font-bold leading-tight">
                                Empower Your <span class="text-yellow-300">Business Growth</span>
                            </h2>
                            <p class="text-lg text-gray-200">
                                Get instant loan approvals with our AI-powered platform. Whether you're starting a new venture or expanding operations, we provide flexible financing solutions tailored to your needs.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <button @click="window.location.href='/apply/phone'" 
                                        class="px-8 py-4 bg-white text-orange-600 rounded-full font-bold hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                    Get Started
                                </button>
                                <a href="#services" 
                                   class="px-8 py-4 border-2 border-white text-white rounded-full font-bold hover:bg-white hover:text-orange-600 transition-all duration-300">
                                    Learn More
                                </a>
                            </div>
                            <div class="flex items-center space-x-8 pt-4">
                                <div>
                                    <p class="text-3xl font-bold">25K+</p>
                                    <p class="text-sm text-gray-300">Loans Processed</p>
                                </div>
                                <div class="w-px h-12 bg-white/30"></div>
                                <div>
                                    <p class="text-3xl font-bold">98%</p>
                                    <p class="text-sm text-gray-300">Success Rate</p>
                                </div>
                                <div class="w-px h-12 bg-white/30"></div>
                                <div>
                                    <p class="text-3xl font-bold">24H</p>
                                    <p class="text-sm text-gray-300">Quick Approval</p>
                                </div>
                            </div>
                        </div>
                        <div class="hidden lg:block relative" data-aos="fade-left">
                            <div class="relative max-w-lg ml-auto">
                                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=600&h=800&fit=crop" 
                                     alt="Business Growth" 
                                     class="rounded-3xl shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500 w-full">
                                <div class="absolute -bottom-10 -left-10 bg-white p-6 rounded-2xl shadow-2xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-2xl font-bold text-gray-800">₹50L+</p>
                                            <p class="text-sm text-gray-600">Approved Today</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="container mx-auto px-4 py-20 lg:py-32 min-h-screen flex items-center">
                    <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                        <div class="text-white space-y-6 max-w-2xl">
                            <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold">
                                🏠 Home Loan Specialists
                            </span>
                            <h2 class="text-4xl lg:text-6xl font-bold leading-tight">
                                Own Your <span class="text-yellow-300">Dream Home</span> Today
                            </h2>
                            <p class="text-lg text-gray-200">
                                Competitive interest rates starting from 6.5%. Flexible repayment options up to 30 years. Get pre-approved in minutes with our streamlined digital process.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <button @click="window.location.href='/apply/phone'" 
                                        class="px-8 py-4 bg-white text-orange-600 rounded-full font-bold hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                    Apply Now
                                </button>
                                <a href="#calculator" 
                                   class="px-8 py-4 border-2 border-white text-white rounded-full font-bold hover:bg-white hover:text-orange-600 transition-all duration-300">
                                    EMI Calculator
                                </a>
                            </div>
                        </div>
                        <div class="hidden lg:block relative">
                            <div class="relative max-w-lg ml-auto">
                                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=800&fit=crop" 
                                     alt="Dream Home" 
                                     class="rounded-3xl shadow-2xl w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="container mx-auto px-4 py-20 lg:py-32 min-h-screen flex items-center">
                    <div class="grid lg:grid-cols-2 gap-12 items-center w-full">
                        <div class="text-white space-y-6 max-w-2xl">
                            <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold">
                                🎓 Education First
                            </span>
                            <h2 class="text-4xl lg:text-6xl font-bold leading-tight">
                                Invest in Your <span class="text-yellow-300">Future</span>
                            </h2>
                            <p class="text-lg text-gray-200">
                                Study anywhere in the world with our comprehensive education loan solutions. No collateral required. Moratorium period available. Tax benefits under Section 80E.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <button @click="window.location.href='/apply/phone'" 
                                        class="px-8 py-4 bg-white text-orange-600 rounded-full font-bold hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-xl">
                                    Explore Options
                                </button>
                            </div>
                        </div>
                        <div class="hidden lg:block relative">
                            <div class="relative max-w-lg ml-auto">
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&h=800&fit=crop" 
                                     alt="Education Loan" 
                                     class="rounded-3xl shadow-2xl w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="swiper-pagination !bottom-8"></div>
    </div>
</section>

    <!-- ==================== ABOUT SECTION ==================== -->
    <section class="py-20 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Image Side -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&h=1000&fit=crop" 
                         alt="Our Team" 
                         class="rounded-3xl shadow-2xl">
                    <div class="absolute -bottom-6 -right-6 bg-gradient-to-br from-orange-900 to-red-900 text-white p-8 rounded-2xl shadow-2xl">
                        <p class="text-5xl font-bold">25+</p>
                        <p class="text-lg">Years Experience</p>
                    </div>
                </div>

                <!-- Content Side -->
                <div class="space-y-6">
                    <span class="text-orange-600 font-semibold text-sm uppercase tracking-wide">About Us</span>
<h2 class="text-4xl lg:text-5xl font-bold text-gray-900">
We Transform Financial <span class="text-orange-600">Dreams into Reality</span>
</h2>
<p class="text-gray-600 text-lg">
At LoanSaathi, we specialize in delivering fast, reliable, and customer-centric lending solutions. Our platform combines cutting-edge technology with personalized service to make borrowing simple and transparent.
</p>

<!-- Progress Bars -->
                <div class="space-y-6 pt-4">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Business Loans</span>
                            <span class="font-semibold text-orange-600">87%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="h-full gradient-primary rounded-full" style="width: 87%"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Home Loans</span>
                            <span class="font-semibold text-orange-600">92%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="h-full gradient-secondary rounded-full" style="width: 92%"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-gray-700">Education Loans</span>
                            <span class="font-semibold text-orange-600">78%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="h-full gradient-success rounded-full" style="width: 78%"></div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 pt-6">
                    <div class="text-center p-6 bg-orange-50 rounded-2xl">
                        <div class="w-16 h-16 gradient-primary rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">24 Hours</p>
                        <p class="text-sm text-gray-600">Quick Approval</p>
                    </div>
                    
                    <div class="text-center p-6 bg-purple-50 rounded-2xl">
                        <div class="w-16 h-16 gradient-secondary rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">100%</p>
                        <p class="text-sm text-gray-600">Secure Process</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== STATISTICS SECTION ==================== -->
<section class="py-16 gradient-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Stat 1 -->
            <div class="text-center text-white">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
                <p class="text-5xl font-bold mb-2" x-init="
                    let target = 18264;
                    let duration = 2000;
                    let steps = 60;
                    let increment = target / steps;
                    let current = 0;
                    let interval = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(interval);
                        }
                        stats.loansProcessed = Math.floor(current);
                    }, duration / steps);
                " x-text="stats.loansProcessed.toLocaleString() + '+'"></p>
                <p class="text-xl text-white/90">Loans Processed</p>
            </div>

            <!-- Stat 2 -->
            <div class="text-center text-white">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-5xl font-bold mb-2" x-init="
                    let target = 328;
                    let duration = 2000;
                    let steps = 60;
                    let increment = target / steps;
                    let current = 0;
                    let interval = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(interval);
                        }
                        stats.projectsCompleted = Math.floor(current);
                    }, duration / steps);
                " x-text="stats.projectsCompleted + 'K+'"></p>
                <p class="text-xl text-white/90">Projects Completed</p>
            </div>

            <!-- Stat 3 -->
            <div class="text-center text-white">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-5xl font-bold mb-2" x-init="
                    let target = 100;
                    let duration = 2000;
                    let steps = 60;
                    let increment = target / steps;
                    let current = 0;
                    let interval = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(interval);
                        }
                        stats.happyClients = Math.floor(current);
                    }, duration / steps);
                " x-text="stats.happyClients + '%'"></p>
                <p class="text-xl text-white/90">Happy Clients</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== SERVICES SECTION ==================== -->
<section class="py-20 bg-gray-50" id="services">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-orange-600 font-semibold text-sm uppercase tracking-wide">What We Offer</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mt-2 mb-4">
                Our <span class="text-orange-600">Professional</span> Services
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Comprehensive financial solutions designed to meet your unique needs and goals
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover group">
                <div class="w-20 h-20 gradient-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Business Loan</h3>
                <p class="text-gray-600 mb-6">
                    Fuel your business expansion with flexible financing options. Get up to ₹1 Crore with competitive rates starting from 9.5% per annum.
                </p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Quick Approval Process
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Minimal Documentation
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Flexible Repayment
                    </li>
                </ul>
                <button @click="window.location.href='/apply/phone?service=Business%20Loan'" 
                        class="w-full py-3 border-2 border-orange-600 text-orange-600 rounded-full font-semibold hover:bg-orange-600 hover:text-white transition-all duration-300">
                    Apply Now
                </button>
            </div>

            <!-- Service Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover group">
                <div class="w-20 h-20 gradient-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Home Loan</h3>
                <p class="text-gray-600 mb-6">
                    Make your dream home a reality with our affordable home loan solutions. Interest rates starting from 6.5% with tenure up to 30 years.
                </p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Low Interest Rates
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Tax Benefits Available
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Up to 90% Funding
                    </li>
                </ul>
                <button @click="window.location.href='/apply/phone?service=Home%20Loan'" 
                        class="w-full py-3 border-2 border-pink-600 text-pink-600 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300">
                    Apply Now
                </button>
            </div>

            <!-- Service Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover group">
                <div class="w-20 h-20 gradient-success rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Education Loan</h3>
                <p class="text-gray-600 mb-6">
                    Invest in your future with our education loan. Cover tuition, living expenses, and more. Study anywhere with our comprehensive coverage.
                </p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        No Collateral Required
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Moratorium Period
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        100% Finance Available
                    </li>
                </ul>
                <button @click="window.location.href='/apply/phone?service=Education%20Loan'" 
                        class="w-full py-3 border-2 border-cyan-600 text-cyan-600 rounded-full font-semibold hover:bg-cyan-600 hover:text-white transition-all duration-300">
                    Apply Now
                </button>
            </div>

            <!-- Service Card 4 -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover group">
                <div class="w-20 h-20 gradient-warning rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Personal Loan</h3>
                <p class="text-gray-600 mb-6">
                    Get instant personal loans for any purpose. No questions asked. Competitive rates with quick disbursal in 24 hours.
                </p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Instant Approval
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        No Usage Restrictions
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Up to ₹25 Lakhs
                    </li>
                </ul>
                <button @click="window.location.href='/apply/phone?service=Personal%20Loan'" 
                        class="w-full py-3 border-2 border-orange-600 text-orange-600 rounded-full font-semibold hover:bg-orange-600 hover:text-white transition-all duration-300">
                    Apply Now
                </button>
            </div>

            <!-- Service Card 5 -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover group">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Vehicle Loan</h3>
                <p class="text-gray-600 mb-6">
                    Drive your dream vehicle home today. Competitive rates for new and used cars, two-wheelers with flexible repayment options.
                </p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        New & Used Vehicles
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Up to 90% On-Road Price
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Attractive Interest Rates
                    </li>
                </ul>
                <button @click="window.location.href='/apply/phone?service=Vehicle%20Loan'" 
                        class="w-full py-3 border-2 border-green-600 text-green-600 rounded-full font-semibold hover:bg-green-600 hover:text-white transition-all duration-300">
                    Apply Now
                </button>
            </div>

            <!-- Service Card 6 -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover group">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Working Capital</h3>
                <p class="text-gray-600 mb-6">
                    Keep your business operations running smoothly. Flexible working capital solutions to manage day-to-day expenses and growth.
                </p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Overdraft Facility
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Quick Disbursement
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Revolving Credit Line
                    </li>
                </ul>
                <button @click="window.location.href='/apply/phone?service=Working%20Capital'" 
                        class="w-full py-3 border-2 border-yellow-600 text-yellow-600 rounded-full font-semibold hover:bg-yellow-600 hover:text-white transition-all duration-300">
Apply Now
</button>
</div>
</div>
<!-- Client Logos -->
        <div class="mt-20">
            <p class="text-center text-gray-500 mb-8 font-semibold">Trusted by Leading Organizations</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center opacity-50 hover:opacity-100 transition-opacity duration-300">
                <div class="flex justify-center">
                    <div class="w-32 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-600 font-bold">HDFC</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="w-32 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-600 font-bold">ICICI</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="w-32 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-600 font-bold">SBI</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="w-32 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-600 font-bold">AXIS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== TESTIMONIALS SECTION ==================== -->
<section class="py-20 bg-gradient-to-br from-orange-900 to-red-900 to-pink-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-96 h-96 bg-white rounded-full filter blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-white rounded-full filter blur-3xl animate-float" style="animation-delay: 3s"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <span class="text-purple-300 font-semibold text-sm uppercase tracking-wide">Testimonials</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-white mt-2 mb-4">
                What Our <span class="text-yellow-300">Clients Say</span>
            </h2>
            <p class="text-purple-200 text-lg max-w-2xl mx-auto">
                Real stories from real people who transformed their financial future with us
            </p>
        </div>

        <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper pb-12">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                        <div class="flex items-center mb-6">
                            <img src="https://i.pravatar.cc/150?img=1" 
                                 alt="Client" 
                                 class="w-16 h-16 rounded-full border-4 border-white/30">
                            <div class="ml-4">
                                <h4 class="text-white font-bold text-lg">Rahul Sharma</h4>
                                <p class="text-purple-200 text-sm">Business Owner</p>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <p class="text-white leading-relaxed">
                            "LoanSaathi made the loan process incredibly smooth. I got my business loan approved within 24 hours with minimal paperwork. Their team was professional and supportive throughout. Highly recommend!"
                        </p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                        <div class="flex items-center mb-6">
                            <img src="https://i.pravatar.cc/150?img=5" 
                                 alt="Client" 
                                 class="w-16 h-16 rounded-full border-4 border-white/30">
                            <div class="ml-4">
                                <h4 class="text-white font-bold text-lg">Priya Patel</h4>
                                <p class="text-purple-200 text-sm">Homeowner</p>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <p class="text-white leading-relaxed">
                            "I finally bought my dream home thanks to LoanSaathi's affordable home loan. The interest rates were competitive and the repayment terms flexible. Excellent customer service from start to finish!"
                        </p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                        <div class="flex items-center mb-6">
                            <img src="https://i.pravatar.cc/150?img=12" 
                                 alt="Client" 
                                 class="w-16 h-16 rounded-full border-4 border-white/30">
                            <div class="ml-4">
                                <h4 class="text-white font-bold text-lg">Amit Kumar</h4>
                                <p class="text-purple-200 text-sm">Graduate Student</p>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <p class="text-white leading-relaxed">
                            "Education loan from LoanSaathi helped me pursue my masters abroad. No collateral required and the moratorium period gave me breathing room. Thank you for believing in my dreams!"
                        </p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- ==================== BLOG SECTION ==================== -->
<section class="py-20 bg-gray-50" id="blog">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-orange-600 font-semibold text-sm uppercase tracking-wide">News & Insights</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mt-2 mb-4">
                Latest From Our <span class="text-orange-600">Blog</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Stay updated with the latest financial tips, market trends, and loan insights
            </p>
        </div>

        <div class="swiper blogSwiper">
            <div class="swiper-wrapper">
                <!-- Blog Card 1 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                        <div class="relative overflow-hidden h-64">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop" 
                                 alt="Blog Post" 
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-2 bg-orange-600 text-white text-sm font-semibold rounded-full">
                                    Business Tips
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>December 28, 2024</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-orange-600 transition">
                                <a href="#">10 Smart Ways to Grow Your Business with Loans</a>
                            </h3>
                            <p class="text-gray-600 mb-6">
                                Discover proven strategies to leverage business loans effectively for sustainable growth and maximize your ROI...
                            </p>
                            <a href="#" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 2 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                        <div class="relative overflow-hidden h-64">
                            <img src="https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?w=800&h=600&fit=crop" 
                                 alt="Blog Post" 
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-2 bg-pink-600 text-white text-sm font-semibold rounded-full">
                                    Home Buying
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>December 25, 2024</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-orange-600 transition">
                                <a href="#">First-Time Home Buyer's Guide to Mortgages</a>
                            </h3>
                            <p class="text-gray-600 mb-6">
                                Everything you need to know about securing your first home loan, from credit scores to closing costs...
                            </p>
                            <a href="#" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 3 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                        <div class="relative overflow-hidden h-64">
                            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&h=600&fit=crop" 
                                 alt="Blog Post" 
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-2 bg-cyan-600 text-white text-sm font-semibold rounded-full">
                                    Education
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
</svg>
<span>December 22, 2024</span>
</div>
<h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-orange-600 transition">
<a href="#">Studying Abroad? Here's Your Funding Guide</a>
</h3>
<p class="text-gray-600 mb-6">
Learn about education loan options, scholarships, and financial planning for international students...
</p>
<a href="#" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700">
Read More
<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
</svg>
</a>
</div>
</div>
</div>
<!-- Blog Card 4 -->
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                        <div class="relative overflow-hidden h-64">
                            <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&h=600&fit=crop" 
                                 alt="Blog Post" 
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-2 bg-purple-600 text-white text-sm font-semibold rounded-full">
                                    Finance Tips
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>December 20, 2024</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-orange-600 transition">
                                <a href="#">Understanding Your Credit Score Impact</a>
                            </h3>
                            <p class="text-gray-600 mb-6">
                                How your credit score affects loan approval rates and interest rates. Tips to improve your score...
                            </p>
                            <a href="#" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CTA SECTION ==================== -->
<section class="py-20 gradient-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Ready to Transform Your Financial Future?
            </h2>
            <p class="text-xl text-purple-100 mb-10">
                Join thousands of satisfied customers who achieved their dreams with our flexible loan solutions
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button @click="window.location.href='/apply/phone'" 
                        class="px-10 py-4 bg-white text-orange-600 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-2xl">
                    Get Started Now
                </button>
                <a href="tel:+918001234567" 
                   class="px-10 py-4 border-2 border-white text-white rounded-full font-bold text-lg hover:bg-white hover:text-orange-600 transition-all duration-300">
                    Call Us: +91 800 123 4567
                </a>
            </div>
            <div class="mt-12 flex flex-wrap justify-center items-center gap-8 text-white">
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>24/7 Support</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Quick Approval</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Secure Process</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== FOOTER ==================== -->
<footer class="bg-gray-900 text-gray-300">
    <div class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 gradient-primary rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">LoanSaathi</h3>
                        <!-- <p class="text-xs text-gray-400">Smart Lending Solutions</p> -->
                    </div>
                </div>
                <p class="text-sm mb-6">
                    Empowering financial dreams with fast, transparent, and customer-centric loan solutions. Your trusted partner for all financing needs.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-600 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">About Us</a></li>
                    <li><a href="#services" class="hover:text-white hover:pl-2 transition-all duration-300">Our Services</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Loan Calculator</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">FAQ</a></li>
                    <li><a href="#blog" class="hover:text-white hover:pl-2 transition-all duration-300">Blog</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Contact</a></li>
                </ul>
            </div>

            <!-- Our Services -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Our Services</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Business Loan</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Home Loan</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Education Loan</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Personal Loan</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Vehicle Loan</a></li>
                    <li><a href="#" class="hover:text-white hover:pl-2 transition-all duration-300">Working Capital</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Contact Us</h4>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-orange-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm">123 Finance Street, Business District, Mumbai, Maharashtra 400001, India</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+918001234567" class="hover:text-white transition">+91 800 123 4567</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:support@loansaathi.com" class="hover:text-white transition">support@loansaathi.com</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Mon - Sat: 9:00 AM - 7:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm">
                <p>&copy; 2024 LoanSaathi. All Rights Reserved. | Designed by <span class="text-orange-400">LoanSaathi Team</span></p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ==================== APPLICATION MODAL ==================== -->
<div x-show="applicationModalOpen" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-75 backdrop-blur-sm" @click="applicationModalOpen = false"></div>

    <!-- Modal -->
    <div class="flex items-center justify-center min-h-screen px-4">
        <div x-show="applicationModalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-90"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-90"
             class="relative bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto"
             @click.stop>
            
            <!-- Close Button -->
            <button @click="applicationModalOpen = false" 
                    class="absolute top-4 right-4 w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="p-8 lg:p-12">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Apply for Loan</h3>
                    <p class="text-gray-600" x-show="selectedService" x-text="'Service: ' + selectedService"></p>
                    <p class="text-gray-600" x-show="!selectedService">Fill in your details below</p>
                </div>

                <form action="{{ route('application.phone') }}" method="GET" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name (As per PAN)</label>
                            <input type="text" 
                                   name="full_name" 
                                   required
                                   placeholder="e.g. Rajesh Kumar"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   required
                                   placeholder="e.g. rajesh@email.com"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- Mobile -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mobile Number</label>
                            <input type="tel" 
                                   name="phone" 
                                   required
                                   placeholder="e.g. 9876543210"
                                   maxlength="10"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- Pincode -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Residence Pincode</label>
                            <input type="text" 
                                   name="pincode" 
                                   required
                                   placeholder="e.g. 400001"
                                   maxlength="6"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- Employment Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Employment Type</label>
                            <select name="employment_type" 
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                                <option value="">Select Type</option>
                                <option value="salaried">Salaried</option>
                                <option value="self_employed">Self Employed</option>
                                <option value="professional">Self-Employed Professional</option>
                            </select>
                        </div>
                        <!-- Company Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Company Name</label>
                            <input type="text" 
                                   name="company_name" 
                                   required
                                   placeholder="Enter Company Name"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- ITR Filed -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Do you file ITR?</label>
                            <select name="files_itr" 
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                                <option value="">Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <!-- Annual Income -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Annual Income (₹)</label>
                            <input type="number" 
                                   name="annual_income" 
                                   required
                                   placeholder="e.g. 500000"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- Loan Amount -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Loan Amount Required (₹)</label>
                            <input type="number" 
                                   name="loan_amount" 
                                   placeholder="e.g. 1000000"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                        </div>

                        <!-- Loan Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Loan Type</label>
                            <select name="loan_type" 
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-600 focus:ring-0 transition">
                                <option value="">Select Loan Type</option>
                                <option value="business">Business Loan</option>
                                <option value="home">Home Loan</option>
                                <option value="education">Education Loan</option>
                                <option value="personal">Personal Loan</option>
                                <option value="vehicle">Vehicle Loan</option>
                                <option value="working_capital">Working Capital</option>
                            </select>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" 
                               id="terms" 
                               required
                               class="w-5 h-5 text-orange-600 border-2 border-gray-300 rounded focus:ring-0">
                        <label for="terms" class="text-sm text-gray-600">
                            I agree to the <a href="#" class="text-orange-600 hover:underline">Terms & Conditions</a> and <a href="#" class="text-orange-600 hover:underline">Privacy Policy</a>. I authorize LoanSaathi to contact me via phone, email or SMS.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-4 gradient-primary text-white rounded-xl font-bold text-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        Submit Application
                    </button>

                    <p class="text-center text-sm text-gray-500 mt-4">
                        🔒 Your information is 100% secure and confidential
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ==================== BACK TO TOP ==================== -->
<button id="backToTop" 
        class="fixed bottom-8 right-8 w-12 h-12 gradient-primary rounded-full shadow-2xl flex items-center justify-center text-white opacity-0 invisible transition-all duration-300 hover:scale-110 z-40">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

<!-- ==================== SCRIPTS ==================== -->
<script>
    // Hero Slider
    const heroSwiper = new Swiper('.heroSwiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        effect: 'slide',
        speed: 800,
        allowTouchMove: true,
    });

    // Testimonial Slider
    const testimonialSwiper = new Swiper('.testimonialSwiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });

    // Blog Slider
    const blogSwiper = new Swiper('.blogSwiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });

    // Back to Top
    const backToTop = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.classList.remove('opacity-0', 'invisible');
            backToTop.classList.add('opacity-100', 'visible');
        } else {
            backToTop.classList.add('opacity-0', 'invisible');
            backToTop.classList.remove('opacity-100', 'visible');
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
</script>



