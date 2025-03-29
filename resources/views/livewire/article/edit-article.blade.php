<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        Edit Articles
    </h2>
</x-slot>

<div class="mx-auto max-w-4xl my-10 rounded-2xl">
    @if (session()->has('message'))
    <x-wui-alert title="{{ session('message') }} " positive squared class="" />
    @endif
    <div class="bg-cardBackground3 p-3 lg:p-20 rounded-xl m-5 lg:m-0">
        <form wire:submit="updateArticle">
            @csrf
            @method('PUT')
            <div class="space-y-4 md:space-y-8">
                <div>
                    <div><x-wui-input wire:model="form.title" type="text" class="w-full text-rose" label="Title" /></div>
                </div>
                <div>
                    <div>
                        <div><x-wui-textarea wire:model="form.body" type="text" class="w-full text-rose" rows="5" label="Body" /></div>
                    </div>
                    <div class="justify-center items-center border-2 my-2 p-4  lg:space-y-5">
                        <div class="w-full h-64  mx-auto overflow-y-auto rounded" >
                            <!-- Display existing image if available -->
                            @if(!empty($article))
                            <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="Current Image" class="w-full h-auto">
                            @endif
                        </div>
                        <div>
                            <x-wui-input wire:model="form.photo" label="Change image" type="file" class="w-full rounded-full cursor-pointer text-rose" />
                        </div>
                    </div>
                    <div class="mt-5">
                        <x-wui-button class="bg-primary text-textColor" type="submit">
                            Update article
                        </x-wui-button>
                    </div>
                </div>
        </form>
    </div>
</div>