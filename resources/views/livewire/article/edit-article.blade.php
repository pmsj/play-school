<x-slot name="header">
<div class="flex space-x-5 lg:space-x-10 items-center">
       <a wire:navigate href="{{ route('index.article') }}" class="">
            <x-wui-mini-button primary rounded icon="chevron-double-left" class="bg-secondary font-bold hover:shadow-lg"/>
       </a>
        <h2 class="font-semibold text-xl leading-tight">
            Edit Article :<span class="text-sm ml-2">  {{ $article->truncatedTitle() }}</span>
        </h2>
    </div>
</x-slot>
<div class="mx-auto max-w-4xl my-10 rounded-2xl p-3 lg:p-0">
    <x-wui-card title="Edit Article" rounded="xl" padding="px-10 py-5">
        <x-slot name="title" class="text-textColor text-lg font-extrabold py-2 flex items-center">
        <x-wui-icon name="book-open" class="w-6 h-6 mx-3 text-primary" />
            Edit Article 
        </x-slot>
        <div class="my-4">
            @if (session()->has('message'))
            <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200 rounded-2xl" />
            @endif
        </div>
        <form>
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
                        <div class="w-full h-64  mx-auto overflow-y-auto rounded mb-2">
                            <!-- Display existing image if available -->
                            @if(!empty($article))
                            <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="Current Image" class="w-full h-auto">
                            @endif
                        </div>
                        <div>
                            <x-wui-input wire:model="form.photo" label="Change image" type="file" class="w-full rounded-full cursor-pointer text-rose" />
                        </div>
                    </div>
                </div>


                <x-slot name="footer" class="flex items-center justify-between">
                    <x-wui-button wire:click="updateArticle" label="Update article" class="bg-secondary" />
                    <x-wui-button wire:click="cancel" outline secondary label="Cancle" class="text-black" />
                </x-slot>
        </form>
    </x-wui-card>
</div>