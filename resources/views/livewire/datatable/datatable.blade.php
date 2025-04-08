<div class="lg:mt-0 bg-base1 p-5 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <div>Search</div>
        <div class="flex">
             <!-- per page record -->
            <!-- <div class="">
                <div class="flex justify-center items-center space-x-2">
                    <div>
                        <label for="paginate mr-2 mb-0">Per Page {{($paginate)}}</label>
                    </div>
                    <div>
                        <select name="paginate" id="paginate" wire:model="paginate">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
            </div> -->
            <div>
                @if(count($checked))
                    <div class="">
                        <x-wui-dropdown>
                            <x-slot name="trigger">
                                <x-wui-button type="button" label="With checked ({{ count($checked) }})" class="bg-primary" sm/>
                            </x-slot>
                        
                            <x-wui-dropdown.item wire:click="deleteChecked" label="Delete" />
                            <x-wui-dropdown.item separator label="Live Chat" />
                        </x-wui-dropdown>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- datatable -->
    <div class="overflow-x-auto sm:rounded-lg  bg-base1">
        <table class="table-auto w-full">
            <thead class=" w-full bg-base3">
                <tr class="">
                    <th scope="col" class="ml-2">
                    </th>
                    @foreach ($columns as $column)
                    <th scope="col" class="px-6 py-3">
                        {{ $column  }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="p-1  w-full">
                @foreach($this->records() as $record)
                <tr class="@if($this->isChecked($record)) bg-cardBackground3 @endif border-b">
                    <td class="">
                        <x-wui-checkbox type="checkbox" value="{{ $record->id }}" wire:model="checked"   />
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