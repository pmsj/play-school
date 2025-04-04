
<div class="mx-auto max-w-4xl my-10 rounded-2xl p-3 lg:p-0"> 
<x-modal title="Edit Role" blur wire:model.defer="showModal">
    <x-wui-card rounded="xl" padding="px-10 py-10 space-y-5">
        <x-slot name="header" class="text-secondary text-lg font-extrabold py-5 flex items-center bg-cardBackground3 w-full rounded-t-md border-none">
            <x-wui-icon name="user-plus" class="w-6 h-6 mx-3 text-secondary" solid />
            Create New Role
        </x-slot>
       
        <form>
            <div class="space-y-4 md:space-y-8">
                <div>
                    <div><x-wui-input wire:model="form.name" type="text" class="w-full text-rose" label="Role Name"  /></div>
                </div>
            </div>
            <x-slot name="footer" class="flex items-center justify-between">
                <x-wui-button wire:click="createRole" type="submit" label="Create article" class="bg-secondary" />
                <x-wui-button wire:click="cancle" type="submit" outline secondary label="Cancle" class="text-black" />
            </x-slot>
        </form>
    </x-wui-card>
</x-modal>
</div>