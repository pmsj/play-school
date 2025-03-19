<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $article->title }}
    </h2>
</x-slot>
    <div class="flex flex-col py-12 space-y-6">
        <div class="">
            <!-- left area in 2column grid layout -->
            <div class="mx-auto max-w-7xl grid lg:grid-cols-[1fr_2fr] gap-2 p-5 relative space-x-10">
                <!-- top most div on left -->
                <div class="justify-start ticky top-0 z-10 bg-slate-50">
                    <div class="lg:cols-span-3 flex flex-col space-y-2  mr-16">
                        <div class="">
                            <a href="#">
                                <div class="border-b-2">
                                  <div class="text-xl font-bold p-2 text-center">Tags</div>
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <div class="bg-amber-100 opacity-50 rounded-3xl px-4 py-2">
                                something
                            </div>
                            <div class="opacity-50 rounded-3xl px-4 py-2">
                                something
                            </div>
                            <div class="rounded-3xl px-4 py-2">
                                something
                            </div>
                            <div class="rounded-3xl px-4 py-2">
                                something
                            </div>
                            <div class="rounded-3xl px-4 py-2">
                                something
                            </div>

                        </div>
                    </div>
                </div>
                <!-- top most--right div---main content area -->
                <div class="lg:cols-span-9 space-y-2">
                    <!-- top div -->
                    <div class="flex justify-between items-start">
                        <div class="bg-white rounded-3xl px-4 py-2">
                            <input type="text" placeholder="Search anything" class="w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0" name="topic">
                        </div>
                        <div class="bg-white rounded-3xl px-4 py-2">All topics </div>
                    </div>
                    <!-- bottom div -->
                    <div class="space-y-5">
                        <div class="mt-10 space-y-2">
                            <div class="text-2xl font-bold">{{ $article->title }}</div>
                            <div class="flex text-sm space-x-2">
                                <div class="">date and time</div>
                                <div>mins read</div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-slate-200 h-36 rounded-md text-center">Photo</div>
                            <div>
                                {{ $article->body }}
                            </div>
                        </div>
                        <div>
                            <!-- comments -->
                            <div class="mx-auto">
                                    <div class="overflow-hidden sm:rounded-lg">
                                        <livewire:comments :model="$article" />
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>