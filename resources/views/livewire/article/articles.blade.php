<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        Create New Articles
    </h2>
</x-slot>

<div class="mx-auto max-w-4xl my-10 rounded-2xl p-3 lg:p-0">
    @if (session()->has('message'))
        <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200"/>
    @endif
    <x-wui-card title="Edit Article" rounded="xl" padding="px-10 py-5">
        <x-slot name="title" class="text-textColor text-lg font-extrabold py-2 flex items-center">
        <x-wui-icon name="book-open" class="w-6 h-6 mx-3 text-primary" />
            Write New Article 
        </x-slot>
        <form>
           <div class="space-y-4 md:space-y-8">
                <div>
                    <div><x-wui-input wire:model="form.title" type="text" class="w-full text-rose" label="Title"/></div>
                </div>
                <div>
                    <div><x-wui-textarea wire:model="form.body" type="text" class="w-full text-rose" rows="5" label="Body"/></div>
                </div>
                <div>
                        <x-wui-input wire:model="form.photo" label="Upload an image" type="file" class="w-full rounded-full cursor-pointer text-rose" />
                </div>
           </div>
                <x-slot name="footer" class="flex items-center justify-between">
                    <x-wui-button wire:click="createArticle" label="Create article" class="bg-secondary" />
                    <x-wui-button wire:click="cancel" outline secondary label="Cancle" class="text-black" />
                </x-slot>
        </form>
    </x-wui-card>
</div>

    