<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        All Articles
    </h2>
</x-slot>

<div class="flex flex-col py-12 space-y-6">
    <div>
        <!-- left area in 2column grid layout -->
        <div class="mx-auto max-w-7xl grid lg:grid-cols-[1fr_2fr] gap-2 p-5">
            <!-- top most div on left -->
            <div class="justify-start lg:sticky lg:top-10 lg:z-10">
                <div class="lg:cols-span-3 flex flex-col space-y-2  mr-16 text-center">
                    <div class="">
                        <a href="{{ route('article.create') }}">
                            <div class="bg-white rounded-3xl">
                               <x-wui-button class="rounded-3xl bg-primary">
                                 Create an article
                               </x-wui-button>
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
                @foreach($articles as $article)
                        <div class="my-5">
                        <div class="space-y-2 p-5 bg-blue-50 bg-opacity-40 rounded-2xl shadow-sm">
                            <a href="{{ route('article.show', $article->slug)}}">
                                <div class="bg-slate-300 opacity-20 h-28 rounded-t-2xl">
                                    <img src="https://unsplash.com/photos/a-tall-blue-building-with-a-clock-on-its-side-fWBZpKTQ_4U" alt="" srcset="">
                                </div>
                                        <livewire:tags />
                                <div class="text-xl font-extrabold hover:underline">{{ $article->title }}</div>
                            </a>
                            <div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit placeat necessitatibus iusto quae velit adipisci reiciendis earum atque odio quos provident molestiae temporibus eius neque modi cum, sint quis fugiat!</div>
                            <!-- user infos -->
                            <div class="flex justify-between items-center">
                                <!-- left div -->
                                <div class="flex space-x-2 justify-center items-center text-start mt-4">
                                    <div class="bg-slate-200 rounded-full size-10">
                                        <img src="https://gravatar.com/creativelystarfish82125b658b" alt="" srcset="">
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold"> <span class="font-light">Posted by </span>{{ $article->user->name}}</div>
                                        <div class="text-xs">{{ $article->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <!-- right div -->
                                <div class="text-sm">Messages</div>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>