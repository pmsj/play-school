



    <div x-data='{  
    activeSlide: 0, 
    slides: {!! json_encode($heroImages->map(fn($image) => [
        "url" => $image->getFirstMediaUrl("carousel-image") ?: "/fallback.jpg", 
        "title" => $image->title, 
        "subtitle" => $image->subtitle
    ]), JSON_UNESCAPED_SLASHES) !!}
}'
    class=" relative w-full h-[70vh] min-h-[400px] md:h-[80vh] md:min-h-[500px] overflow-hidde">
    <!-- Carousel Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index"
            class="absolute inset-0 transition-opacity duration-700 ease-in-out w-full h-full"
            x-transition:enter="opacity-0"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            :style="'background-image: url(' + slide.url + '); background-size: cover; background-position: center;  width: 100%; height: 100%; object-fit: cover; background-repeat: no-repeat;'">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>

            <!-- Content -->
            <div class="relative flex flex-col items-center justify-center h-full text-center text-white px-4 md:px-6 mt-20 lg:mt-20 ">
                <h1 x-text="slide.title" class="text-3xl lg:text-7xl  font-bold mb-1"></h1>
                <p x-text="slide.subtitle" class="mt-2  text-md md:text-xl"></p>
                <a href="#"
                    class="text-sm lg:text-base mt-4 px-3 py-1.5 lg:mt-4 lg:px-5 lg:py-3 bg-primary text-black font-semibold rounded-full shadow-md scale-100 hover:scale-125 transition duration-300 ease-in-out">
                    Enroll Now
                </a>
            </div>
        </div>
    </template>

    <!-- Navigation Buttons -->
    <button @click="activeSlide = (activeSlide === 0) ? slides.length - 1 : activeSlide - 1"
        class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-opacity-50 text-primary p-2 md:p-3 rounded-full shadow hover:bg-primary hover:text-white hover:bg-opacity-75 transition">
        ❮
    </button>

    <button @click="activeSlide = (activeSlide === slides.length - 1) ? 0 : activeSlide + 1"
        class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2  bg-opacity-50 text-primary p-2 md:p-3 rounded-full shadow hover:bg-primary hover:text-white hover:bg-opacity-75 transition">
        ❯
    </button>

    <!-- Dots Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full"
                :class="activeSlide === index ? 'bg-primary hover:ring-2 ring-negative' : 'bg-gray-400'">
            </button>
        </template>
    </div>
</div>
   