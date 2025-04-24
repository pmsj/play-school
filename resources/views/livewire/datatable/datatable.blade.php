<div class="lg:mt-0 bg-base1 p-5 rounded-lg">
    <div class="hidden sm:flex justify-between items-center mb-4">
        <div class="w-full">
            <x-wui-input type="search" right-icon="magnifying-glass-circle" placeholder="Search" class="w-96" wire:model.live.debounce.500ms="query" />
        </div>
        <div class="flex">
            <!-- per page record -->
            <div class="ml-2">
                <div class="flex justify-center items-center space-x-2">
                    <div class="text-xs">
                        Per page
                    </div>
                    <div>
                        <x-wui-select wire:model.live="paginate">
                            <x-wui-select.option label="5" value="5" />
                            <x-wui-select.option label="10" value="10" />
                            <x-wui-select.option label="20" value="20" />
                            <x-wui-select.option label="50" value="50" />
                            </x-select>
                    </div>
                </div>
            </div>
            <div>
                @if(count($checked))
                <div class="ml-4">
                    <x-wui-dropdown>
                        <x-slot name="trigger" class="w-full">
                            <x-wui-button md label="({{ count($checked) }})" right-icon="chevron-down" outline focus:solid.gray class="bg-secondary text-white inline-flex items-center gap-1 whitespace-nowrap" />
                        </x-slot>
                        <x-wui-dropdown.item wire:click="deleteChecked" label="Delete" />
                        <x-wui-dropdown.item separator label="Live Chat" />
                    </x-wui-dropdown>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- search inout mobile screen -->
    <div class="mb-5 sm:hidden">
        <div class="space-y-5">
            <div>
                <div class="w-full">
                    <x-wui-input type="search" right-icon="magnifying-glass-circle" placeholder="Search" class="w-96" wire:model.live="query"  />
                </div>
            </div>
            <div>
                <div class="flex">
                    <!-- per page record -->
                    <div class="ml-2">
                        <div class="flex justify-center items-center space-x-2">
                            <div class="text-sm">
                                Per page
                            </div>
                            <div>
                                <x-wui-select wire:model.live="paginate">
                                    <x-wui-select.option label="5" value="5" />
                                    <x-wui-select.option label="10" value="10" />
                                    <x-wui-select.option label="20" value="20" />
                                    <x-wui-select.option label="50" value="50" />
                                    </x-select>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if(count($checked))
                        <div class="ml-4">
                            <x-wui-dropdown>
                                <x-slot name="trigger" class="w-full">
                                    <x-wui-button md label="({{ count($checked) }})" right-icon="chevron-down" outline focus:solid.gray class="bg-secondary text-white inline-flex items-center gap-1 whitespace-nowrap" />
                                </x-slot>
                                <x-wui-dropdown.item wire:click="deleteChecked" label="Delete" />
                                <x-wui-dropdown.item separator label="Live Chat" />
                            </x-wui-dropdown>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- datatable -->
    <div class="overflow-x-auto sm:rounded-lg  bg-base1">
        <table class="table-auto w-full">
            <thead class=" w-full bg-cardBackground3 text-secondary">
                <tr class="">
                    <th scope="col" class="ml-2">
                        &nbsp;
                    </th>
                    @foreach ($columns as $column)
                    <th scope="col" class="px-6 py-3">
                        {{ $column  }}
                    </th>
                    @endforeach
                    @if(count($checked))
                    <th scope="col" class="px-6 py-3">
                       Actions
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody class="w-full text-center">
                @foreach($this->records() as $record)
                <tr class="
                        @if($this->isChecked($record)) 
                        bg-base3 
                        
                        @endif 
                        border-b">
                    <td class="">
                        <x-wui-checkbox type="checkbox" value="{{ $record->id }}" wire:model.live="checked" />
                    </td>
                    @foreach ($columns as $column)
                    <td class="px-6 py-3">{{ $record->{$column} }}</td>
                    @endforeach
                    @if(in_array($record->id, $checked))
                    <td scope="col" class="px-6 py-3">
                        <x-wui-dropdown icon="ellipsis-horizontal">
                            <x-wui-dropdown.item wire:click="edit({{ $record->id }})" label="edit" icon="pencil-square" class="hover:bg-base3 text-textColor"/>
                            <x-wui-dropdown.item label="option" class="hover:bg-base3 text-textColor"/>
                        </x-wui-dropdown>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-5 ">{{ $this->records()->links() }}</div>
</div>