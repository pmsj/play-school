<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        All Articles
    </h2>
</x-slot>

<div class="flex flex-col py-12 space-y-6">
        <div class="my-5 mx-auto max-w-5xl">
            @if (session()->has('message'))
            <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200 rounded-2xl" />
            @endif
        </div>
    <div>
        <!-- left area in 2column grid layout -->
        <div class="mx-auto max-w-7xl grid lg:grid-cols-[1fr_2fr] gap-2 p-5">
            <!-- top most div on left -->
            <div class="justify-start lg:z-10">
                <div class="lg:cols-span-3 flex flex-col space-y-2  mr-16 text-center lg:sticky top-32 h-auto">
                    <div class="">
                        <a href="{{ route('create.article') }}">
                            <div class="rounded-3xl">
                               <x-wui-button class="rounded-full bg-secondary hover:border-white">
                                 Create an article
                               </x-wui-button>
                            </div>
                        </a>
                    </div>
                    <div class="">
                        <div class="rounded-3xl px-4 py-2">
                            <x-wui-button white label="My articles" href="" />
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
                <div class="flex justify-between items-start my-5">
                    <div class="bg-white rounded-3xl px-4 py-2">
                        <input type="text" placeholder="Search anything" class="w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0" name="topic">
                    </div>
                    <div class="bg-white rounded-3xl px-4 py-2">All topics </div>
                </div>
                <!-- bottom div -->
                @if($articles->count())
                    @foreach($articles as $article)
                        <livewire:article.article-card wire:key="$article->id"  :article="$article" />
                    @endforeach
                @else
                <div class="mx-auto max-w-7xl mt-10">
                    <x-wui-alert icon="computer-desktop" class="bg-base1 p-20 justify-center items-center border border-primary">
                        <x-slot name="title" class="font-bold text-center lg:text-lg bg-base2 p-2 rounded">
                            Be the first one to post an Article!
                        </x-slot>
                    </x-wui-alert>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>