<div x-data='{  
    activeSlide: 0, 
    slides: {!! json_encode($heroImages->map(fn($image) => [
        "title" => $image->title, 
        "subtitle" => $image->subtitle
    ]), JSON_UNESCAPED_SLASHES) !!}
}'
    class=" relative w-full h-[70vh] min-h-[400px] md:h-[80vh] md:min-h-[500px] overflow-hidden lg:rounded-lg p-5 my-5">
    <!-- Carousel Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index"
            class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-transition:enter="opacity-0"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
          >

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Content -->
            <div class="relative flex flex-col items-center justify-center h-full text-center text-white px-4 md:px-6 mt-20 ">
                <!-- title -->
                <h1 x-text="slide.title" class="text-xl md:text-5xl font-bold"></h1>
                <!-- subtitle -->
                <p x-text="slide.subtitle" class="mt-2 text-base md:text-xl"></p>
                <a href="/admissions"
                    class="mt-4 px-5 py-2 bg-orange-plus text-black font-semibold rounded-full shadow-md hover:bg-yellow-600 hover:text-white transition">
                    Enroll Now
                </a>
            </div>
        </div>
    </template>

    <!-- Navigation Buttons -->
    <button @click="activeSlide = (activeSlide === 0) ? slides.length - 1 : activeSlide - 1"
        class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 text-white p-2 md:p-3 rounded-full shadow hover:bg-opacity-75 transition">
        ❮
    </button>

    <button @click="activeSlide = (activeSlide === slides.length - 1) ? 0 : activeSlide + 1"
        class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 text-white p-2 md:p-3 rounded-full shadow hover:bg-opacity-75 transition">
        ❯
    </button>

    <!-- Dots Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full"
                :class="activeSlide === index ? 'bg-yellow-500' : 'bg-gray-500'">
            </button>
        </template>
    </div>
   
</div>