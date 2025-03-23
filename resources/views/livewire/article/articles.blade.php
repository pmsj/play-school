<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        Create New Articles
    </h2>
</x-slot>

 <div class="mx-auto max-w-3xl mt-10 bg-white rounded-2xl">
    @if (session()->has('message'))
        <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200"/>
    @endif
    <div class="shadow p-5 rounded">
        <form wire:submit="createArticle">
           <div class="space-y-4">
                <div class="space-y-2">
                    <div><label for=""> Title</label></div>
                    <div><x-input wire:model="form.title" type="text" class="w-full" /></div>
                    <x-input-error for="form.title" />
                </div>
                <div class="space-y-2">
                    <div><label for="">Body</label></div>
                    <div><x-textarea wire:model="form.body" type="text" class="w-full" rows="5"/></div>
                    <x-input-error for="form.body" />
                </div>
                <div class="space-y-2 text-info">
                        <x-wui-input wire:model="form.photo" label="Upload an image" type="file" class="w-full rounded-full cursor-pointer text-info" />
                    <x-input-error for="form.photo" />
                </div>
                <div class="space-y-2">
                    <x-button>
                        create article
                    </x-button>
                </div>
           </div>
        </form>
    </div>
 </div>
    