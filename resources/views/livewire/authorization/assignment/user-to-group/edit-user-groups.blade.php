<div>
    <div class="mb-5">
            @if (session()->has('message'))
                <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200 rounded-lg" />
            @endif
            @if (session()->has('error'))
                <x-wui-alert title="{{ session('error') }} " negative squared class=" bg-red-200 text-black rounded-lg" />
            
            @endif
    </div>
    <x-wui-button  href="{{ route('manage.user-groups')}}" outline  label="White" icon="arrow-left" primary label="Go back" class="font-bold my-2 text-secondary bg-cardBackground3" xs/>
    <x-wui-card >
        <x-slot name="header" class="text-md font-extrabold  text-secondary bg-cardBackground3 w-full p-4" rounded="lg">
            Edit User's Permission Group
        </x-slot>
        <h3 class="text-sm  mb-3">User Name</h3>
            <div class="space-y-10">
                <div class="space-y-3">
                <x-wui-input icon="user"  :value="$user->name" readonly />
                </div>
                <div class="space-y-2">
                    <h3 class="text-sm mb-3">Permission Groups</h3>
                    <x-wui-select multiselect wire:model="selectedPermissionGroupsIds" placeholder="Select permission groups">
                        @foreach ($groups as $group)
                            <x-wui-select.option 
                                wire:key="group-{{ $group->id }}" 
                                label="{{ $group->name }}" 
                                value="{{ $group->id }}" />
                        @endforeach
                    </x-wui-select>
                    
                </div>
                <div>

                   <h3 class="text-sm mb-5">Group permissions</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="">
                         @foreach ($groupPermissions as $permission)
                            <x-wui-checkbox 
                                wire:model="selectedPermissionsIds"  
                                label="{{ $permission->description }}"  
                                value="{{ $permission->id }}"
                                class="mb-2" />
                        @endforeach
                        </div>
          
                </div>
            </div>
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-wui-button href="{{ route('manage.user-groups')}}"  flat label="Cancel" class="hover:bg-base3 hover:text-textColor" />
                <x-wui-button  type="submit" primary label="Save" wire:click="assignUserToGroups" class="bg-secondary text-white"/>
            </x-slot>
    </x-wui-card>
</div>