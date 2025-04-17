<div class="lg:mt-0 bg-base1 p-5 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <div class="w-full">
            <x-wui-input type="search"  right-icon="magnifying-glass-circle" placeholder="Search" class="w-96" wire:model.debounce.500ms="query"/>
        </div>
        <p class="text-salte-900">{{ $query }}</p>
        <div class="flex">
             <!-- per page record -->
            <div class="ml-2">
                <div class="flex justify-center items-center space-x-2">
                    <div>
                        <label for="paginate mr-2 mb-0">Per Page</label>
                    </div>
                    <div>
                        <select name="paginate" id="paginate" wire:model="paginate">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- selected items button -->
            <div>
                @if(count($checked))
                    <div class="ml-4">
                        <x-wui-dropdown>
                            <x-slot name="trigger" class="w-full">
                                <x-wui-button xs label="Checked ({{ count($checked) }})" right-icon="chevron-double-down" outline  focus:solid.gray class="bg-secondary text-white" />
                            </x-slot>
                            <x-wui-dropdown.item wire:click="deleteChecked" label="Delete" />
                            <x-wui-dropdown.item separator label="other option" />
                        </x-wui-dropdown>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- datatable -->
    <div class="overflow-x-auto sm:rounded-lg  bg-base1 ">
    <table class="table-auto w-full">
                <thead class=" w-full bg-base3">
                    <tr class="">
                        <th scope="col" class="">
                            &nbsp;
                        </th>
                        @foreach ($columns as $column)
                        <th scope="col" class="px-6 py-3">
                            {{ $column  }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="  w-full">
                    @foreach($this->records() as $record)
                    <tr class="@if($this->isChecked($record)) bg-negative @endif border-b" wire:key="row-{{ $record->id }}">
                        <td class="">
                            <x-wui-checkbox 
                                rounded="sm"
                                sm 
                                 type="checkbox" 
                                 value="{{ $record->id }}" 
                                 wire:model="checked" 
                            />
                        </td>
                        @foreach ($columns as $column)
                            <td class="px-6 py-3">{{ $record->{$column} }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    <div class="p-5 ">{{ $this->records()->links() }}</div>
</div>