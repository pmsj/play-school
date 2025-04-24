<div>
        <x-wui-button  href="{{ route('manage.group-permissions')}}" outline  label="White" icon="arrow-left" primary label="Go back" class="font-bold my-2 text-primary bg-cardBackground3" xs/>
        <x-wui-card title=" Assign Permissions to Groups">
            <x-slot name="header" class="text-secondary text-lg font-extrabold py-5 flex items-center bg-cardBackground3 w-full rounded-t-md border-none">
                <x-wui-icon name="key" class="w-6 h-6 mx-3 text-secondary" solid />
                Update group-permssions
            </x-slot>
            <h3 class="text-sm font-semibold mb-3">Enter a permission-group name</h3>
            <form >
                <div class="space-y-10">
                    <div class="space-y-3">
                        <x-input wire:model="form.groupName" label="Name" placeholder="group name" class="w-full" />
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold mb-3">Description</h3>
                        <x-input wire:model="form.groupDescription" label="Name" placeholder="group name description" class="w-full" />
                    </div>
                    <div>
                        @foreach($permissions as $permission)
                            <x-wui-checkbox id="label" wire:model="form.selectedPermissions" label="{{ $permission->description }}"  value="{{ $permission->id }}" />
                        @endforeach
                    </div>
                    
                </div>

                <x-slot name="footer" class="flex justify-end gap-x-4">
                    <x-wui-button href="{{ route('manage.group-permissions') }}" flat label="Cancel"  class="hover:bg-base3 hover:text-textColor" />
                    <x-wui-button primary label="Save" wire:click="updatePermissionsToGroup" class="bg-secondary text-white"/>
                </x-slot>
            </form>
        </x-wui-card>
</div>