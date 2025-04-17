<div>
    <div class="mb-5">
            @if (session()->has('message'))
                <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200 rounded-lg" />
            @endif
    </div>
    <x-wui-card>
        <x-slot name="title" class="text-md font-bold" rounded="lg">
            Assign Group Permissions
        </x-slot>
        <h3 class="text-sm font-semibold mb-3">Enter a permission-group name</h3>
        <form>
            <div class="space-y-10">
                <div class="space-y-3">
                    <x-input wire:model="form.groupName" label="Name" placeholder="group name" class="w-full" />
                </div>
                <div class="space-y-2">
                    <h3 class="text-sm font-semibold mb-3">Description</h3>
                    <x-input wire:model="form.groupDescription" label="Name" placeholder="group name description" class="w-full" />
                </div>
                <!-- Group permissions -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($permissions as $permission)
                        <x-wui-checkbox wire:model="form.selectedPermissions" id="label" label="{{ $permission->description }}"  value="{{ $permission->id }}"/>
                    @endforeach
                </div>
                
            </div>

            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-wui-button flat label="Cancel" x-on:click="close" class="hover:bg-base3 hover:text-textColor" />
                <x-wui-button primary label="Save" wire:click="assignPermissionsToGroup" class="bg-secondary text-white"/>
            </x-slot>
        </form>
    </x-wui-card>
</div>