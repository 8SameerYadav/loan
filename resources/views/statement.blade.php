<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bank Statement - LoanSaathi</title>
    
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
        
        .upload-area {
            border: 2px dashed #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .upload-area.dragover {
            border-color: #ff6b35;
            background-color: #fff7ed;
        }
        
        .upload-area.has-file {
            border-color: #ff6b35;
            border-style: solid;
        }
        
        @keyframes upload-pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .uploading {
            animation: upload-pulse 1.5s ease-in-out infinite;
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
    <section class="gradient-dark py-16 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                    Get Personal Loan<br>Offers in Minutes
                </h1>
                <p class="text-lg text-gray-200 mb-6">
                    Instant approval, low interest rates, fully digital journey
                </p>
            </div>
        </div>
    </section>

    <!-- Progress Steps -->
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="gradient-primary w-10 h-10 rounded-full flex items-center justify-center text-white font-bold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3 hidden sm:block">
                            <p class="text-xs text-gray-500">Step 1</p>
                            <p class="font-semibold text-gray-900">Personal Info</p>
                        </div>
                    </div>
                    
                    <div class="flex-1 h-1 mx-4 bg-gray-200">
                        <div style="width: 50%" class="gradient-primary h-full"></div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="gradient-primary w-10 h-10 rounded-full flex items-center justify-center text-white font-bold">2</div>
                        <div class="ml-3 hidden sm:block">
                            <p class="text-xs text-gray-500">Step 2</p>
                            <p class="font-semibold text-gray-900">Documents</p>
                        </div>
                    </div>
                    
                    <div class="flex-1 h-1 mx-4 bg-gray-200"></div>
                    
                    <div class="flex items-center">
                        <div class="bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold">3</div>
                        <div class="ml-3 hidden sm:block">
                            <p class="text-xs text-gray-500">Step 3</p>
                            <p class="font-semibold text-gray-400">Offers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Upload Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                
                <!-- Upload Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12" x-data="{
                    fileName: '',
                    fileSize: '',
                    uploading: false,
                    uploadProgress: 0,
                    uploadComplete: false,
                    error: '',
                    
                    handleFile(file) {
                        this.error = '';
                        
                        if (!file) return;
                        
                        // Validate file type
                        if (file.type !== 'application/pdf') {
                            this.error = 'Only PDF files are accepted';
                            return;
                        }
                        
                        // Validate file size (5MB)
                        if (file.size > 5 * 1024 * 1024) {
                            this.error = 'File size must be less than 5MB';
                            return;
                        }
                        
                        this.fileName = file.name;
                        this.fileSize = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                    },
                    
                    handleDrop(e) {
                        e.preventDefault();
                        const file = e.dataTransfer.files[0];
                        this.handleFile(file);
                    },
                    
                    simulateUpload() {
                        if (!this.fileName) {
                            this.error = 'Please select a file first';
                            return;
                        }
                        
                        this.uploading = true;
                        this.uploadProgress = 0;
                        
                        const interval = setInterval(() => {
                            this.uploadProgress += 10;
                            if (this.uploadProgress >= 100) {
                                clearInterval(interval);
                                this.uploading = false;
                                this.uploadComplete = true;
                            }
                        }, 200);
                    }
                }">
                    
                    <form method="POST" action="{{ route('application.statement.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-3">Upload Bank Statement</h2>
                        <p class="text-gray-600">Please upload your recent bank statement (PDF format only, max 5MB)</p>
                    </div>

                    <!-- Upload Area -->
                    <div 
                        class="upload-area rounded-2xl p-8 mb-6 text-center cursor-pointer"
                        :class="{ 'has-file': fileName, 'uploading': uploading }"
                        @dragover.prevent="$el.classList.add('dragover')"
                        @dragleave.prevent="$el.classList.remove('dragover')"
                        @drop="handleDrop($event); $el.classList.remove('dragover')"
                        @click="$refs.fileInput.click()"
                    >
                        <!-- Upload Icon or File Info -->
                        <div x-show="!fileName && !uploadComplete">
                            <div class="gradient-primary w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                            </div>
                            <p class="text-xl font-semibold text-gray-900 mb-2">Select Bank Statement (PDF)</p>
                            <p class="text-sm text-gray-500">or drag and drop your file here</p>
                        </div>

                        <!-- File Selected -->
                        <div x-show="fileName && !uploadComplete && !uploading" x-transition>
                            <div class="gradient-primary w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-lg font-semibold text-gray-900 mb-1" x-text="fileName"></p>
                            <p class="text-sm text-gray-500" x-text="fileSize"></p>
                        </div>

                        <!-- Uploading -->
                        <div x-show="uploading" x-transition>
                            <div class="gradient-primary w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 uploading">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                            </div>
                            <p class="text-lg font-semibold text-gray-900 mb-3">Uploading...</p>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="gradient-primary h-3 rounded-full transition-all duration-300" :style="'width: ' + uploadProgress + '%'"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-2" x-text="uploadProgress + '%'"></p>
                        </div>

                        <!-- Upload Complete -->
                        <div x-show="uploadComplete" x-transition>
                            <div class="bg-green-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-xl font-semibold text-green-600 mb-2">Upload Successful!</p>
                            <p class="text-sm text-gray-600" x-text="fileName"></p>
                        </div>

                        <input 
                            name="statement"
                            type="file" 
                            x-ref="fileInput" 
                            accept=".pdf" 
                            class="hidden"
                            @change="handleFile($event.target.files[0])"
                        >
                    </div>

                    <!-- Error Message -->
                    <div x-show="error" x-transition class="bg-red-50 border-2 border-red-200 rounded-xl p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-red-700 font-medium" x-text="error"></p>
                        </div>
                    </div>

                    <!-- Requirements -->
                    <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            File Requirements
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Only PDF files accepted
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Maximum file size: 5MB
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Recent 3-6 months statement preferred
                            </li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('application.professional') }}" class="flex-1 border-2 border-orange-600 text-orange-600 py-4 rounded-full font-bold text-lg hover:bg-orange-600 hover:text-white transition-all text-center inline-block">
                            Back
                        </a>
                        <button 
                            type="submit" 
                            :disabled="!fileName"
                            :class="!fileName ? 'opacity-50 cursor-not-allowed' : 'hover:scale-105'"
                            class="flex-1 gradient-primary text-white py-4 rounded-full font-bold text-lg transition-transform shadow-lg"
                        >
                            Upload & Continue
                        </button>
                    </div>

                    </form>

                </div>

                <!-- Security Notice -->
                <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-start">
                        <div class="gradient-primary w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-900 mb-2">Your Data is Safe & Secure</h3>
                            <p class="text-sm text-gray-600">All documents are encrypted with bank-grade 256-bit SSL encryption. Your information is never shared with third parties without your consent.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Bank Statement -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Why We Need Your Bank Statement</h2>
                    <p class="text-xl text-gray-600">We analyze your bank statement to provide you with the best loan offers</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover">
                        <div class="gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Income Verification</h3>
                        <p class="text-gray-600">Helps us understand your monthly income and financial stability</p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover">
                        <div class="gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Better Interest Rates</h3>
                        <p class="text-gray-600">Strong banking history can help you get lower interest rates</p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover">
                        <div class="gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Faster Approval</h3>
                        <p class="text-gray-600">Quick document verification means faster loan approval</p>
                    </div>
                </div>
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