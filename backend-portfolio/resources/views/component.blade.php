<!-- Hero Section -->
<section id="home" class="h-screen flex items-center relative overflow-hidden group">
    <div class="slider-container absolute inset-0">
        <div class="slide active">
            <!-- <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1533267645537-1e34a2d99e3f')] bg-cover bg-center"></div> -->
            <div v-else class="absolute inset-0 flex items-center justify-center bg-gray-800">
                <span class="text-white text-2xl">SLIDE 1</span>
            </div>
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="container mx-auto px-6 sm:px-10 relative z-10 h-full flex items-center">
                <div class="hero-content max-w-[90%] sm:max-w-2xl">
                    <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-white mb-4 sm:mb-6 leading-tight">
                        Elegant Parasols<br />For Every Occasion
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-200 mb-6 sm:mb-8 max-w-2xl">
                        Discover our collection of handcrafted parasols.
                    </p>
                    <a href="#menu"
                        class="bg-orange-600 text-white px-6 sm:px-8 py-3 rounded-full hover:bg-orange-700 transition-colors inline-block text-sm sm:text-base">
                        View Collection
                    </a>
                </div>
            </div>
        </div>
        <!-- Second slide with similar adjustments -->
        <div class="slide">
            <!-- <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1533267645537-1e34a2d99e3f')] bg-cover bg-center"></div> -->
            <div v-else class="absolute inset-0 flex items-center justify-center bg-gray-800">
                <span class="text-white text-2xl">SLIDE 2</span>
            </div>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="container mx-auto px-10 relative z-10 h-full flex items-center">
                <div class="hero-content">
                    <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                        Handcrafted<br />With Care
                    </h1>
                    <p class="text-xl text-gray-200 mb-8 max-w-2xl">
                        Each parasol tells a unique story of craftsmanship.
                    </p>
                    <a href="#about"
                        class="bg-orange-600 text-white px-8 py-3 rounded-full hover:bg-orange-700 transition-colors inline-block">
                        Our Story
                    </a>
                </div>
            </div>
        </div>
    </div>
    <button
        class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 p-2 rounded-full z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
        id="prevSlide">
        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button
        class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 p-2 rounded-full z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
        id="nextSlide">
        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</section>
