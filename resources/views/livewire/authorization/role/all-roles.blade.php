<div>
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
    <div class="my-5">
        @if (session()->has('message'))
        <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200" />
        @endif
    </div>

    @foreach($allRoles as $role)
    <x-wui-modal name="{{ $role->id }}" class="max-w-5xl" blur="sm">
        <x-wui-card title="" rounded="xl" padding="px-20 py-10 space-y-5">
            <x-slot name="header" class="text-secondary text-lg font-extrabold py-5 flex items-center bg-cardBackground3 w-full rounded-t-md border-none">
                <x-wui-icon name="user-plus" class="w-6 h-6 mx-3 text-secondary" solid />
                Create New Role
            </x-slot>
        </x-wui-card>
    </x-wui-modal>
@endforeach

    <div class="mx-auto max-w-9xl my-5">
        @if($allRoles)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Role Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gurad Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <x-wui-button type="submit" wire:click="$dispatch('createRole')" icon="plus-circle" primary label="New role" class="text-textColor bg-secondary"/>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRoles as $role)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $role->guard_name}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-wui-mini-button type="submit" wire:click="$dispatch('editRole', { roleId: {{ $role->id }} })" rounded icon="pencil-square" flat gray interaction="negative" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
    </div>
</div>