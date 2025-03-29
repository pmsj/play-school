<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        Create New Articles
    </h2>
</x-slot>

 <div class="mx-auto max-w-3xl my-10 rounded-2xl">
    @if (session()->has('message'))
        <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200"/>
    @endif
    <div class="border-4 border-borderColor p-5 lg:p-20 rounded-xl m-5 lg:m-0">
        <form wire:submit="createArticle">
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
                <div>
                    <x-wui-button class="bg-primary text-textColor" type="submit">
                        create article
                    </x-wui-button>
                </div>
           </div>
        </form>
    </div>
 </div>
    