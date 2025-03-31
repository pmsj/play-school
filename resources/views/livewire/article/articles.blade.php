<x-slot name="header">
    <div class="flex space-x-5 lg:space-x-10 items-center">
        <a wire:navigate href="{{ route('index.article') }}" class="">
            <x-wui-mini-button primary rounded icon="chevron-double-left" class="bg-secondary font-bold hover:shadow-lg" />
        </a>
        <h2 class="font-semibold text-xl leading-tight">
            Create New Articles
        </h2>
    </div>
</x-slot>

<div class="mx-auto max-w-4xl my-10 rounded-2xl p-3 lg:p-0">
    <!-- sucess message -->
    <div class="my-5">
        @if (session()->has('message'))
        <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200" />
        @endif
    </div>
    <x-wui-card title="Edit Article" rounded="xl" padding="px-10 py-10 space-y-5">
        <x-slot name="title" class="text-textColor text-lg font-extrabold py-5 flex items-center bg-cardBackground3 w-full rounded-t-md">
            <x-wui-icon name="book-open" class="w-6 h-6 mx-3 text-primary" />
            Write New Article
        </x-slot>
        <form>
            <div class="space-y-4 md:space-y-8">
                <div>
                    <div><x-wui-input wire:model="form.title" type="text" class="w-full text-rose" label="Title" /></div>
                </div>
                <div>
                    <div><x-wui-textarea wire:model="form.body" type="text" class="w-full text-rose" rows="5" label="Body" /></div>
                </div>
                @if($this->form->photo)
                    <div class="h-96 w-auto object-contain overflow-y-auto">
                        <img src="{{ $form->photo->temporaryUrl() }}" alt="uploaded image" class="w-full h-auto rounded-lg">
                    </div>
                @endif
                <div>
                    <x-wui-input id="image" wire:model="form.photo" type="file" class="hidden sr-only w-full cursor-pointer text-rose" />
                    <x-label for="image" class="bg-base2 cursor-pointer p-3 border-2 rounded text-primary hover:underline">Choose photo</x-label>
                </div>
            </div>
            <x-slot name="footer" class="flex items-center justify-between">
                <x-wui-button wire:click="createArticle" label="Create article" class="bg-secondary" />
                <x-wui-button wire:click="cancel" outline secondary label="Cancle" class="text-black" />
            </x-slot>
        </form>
    </x-wui-card>
</div>