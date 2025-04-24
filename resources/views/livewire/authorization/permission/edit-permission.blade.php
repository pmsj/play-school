<div class="mx-auto max-w-4xl my-10 rounded-2xl p-3 lg:p-0">
<x-wui-button  href="{{ route('index.permission') }}" outline  label="White" icon="arrow-left" primary label="Go back" class="font-bold my-2 text-primary bg-cardBackground3" xs/>
        <x-wui-card rounded="xl" padding="px-10 py-10 space-y-5">
            <x-slot name="header" class="text-secondary text-lg font-extrabold py-5 flex items-center bg-cardBackground3 w-full rounded-t-md border-none">
                <x-wui-icon name="pencil-square" class="w-6 h-6 mx-3 text-secondary" solid />
                Edit Permisison
            </x-slot>
        
            <form>
                <div class="space-y-4 md:space-y-8">
                <div>
                    <div><x-wui-input wire:model="form.name" type="text" class="w-full text-rose" label="Permission Name"  /></div>
                </div>
                <div>
                    <div><x-wui-input wire:model="form.description" type="text" class="w-full text-rose" label="Permission Description"  /></div>
                </div>
                </div>
                <x-slot name="footer" class="flex items-center justify-between">
                    <x-wui-button wire:click="updateRole"  label="Update permission" class="bg-secondary" type="submit" />
                    <x-wui-button href="{{ route('index.permission') }}" outline secondary label="Cancel" class="text-black" type="submit"/>
                </x-slot>
            </form>
        </x-wui-card>
</div>