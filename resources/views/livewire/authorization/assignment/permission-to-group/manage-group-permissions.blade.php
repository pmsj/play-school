<div
  class="">
  <div class="flex flex-col">
    <div class="mb-5">
        @if (session()->has('message'))
              <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200 rounded-lg" />
        @endif
    </div>
        <div class=" overflow-x-auto">
          <div class="my-2">
            <x-wui-button href="{{ route('assign.user-groups') }}" type="submit" icon="plus-circle" primary label="New  permission-group" class="bg-primary" />
          </div>
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden ">
                    <table class=" table-fixed min-w-full rounded-xl">
                        <thead>
                            <tr class="bg-cardBackground3 text-secondary">
                                <th scope="col" class="p-5 text-left leading-6  capitalize"> &nbsp;</th>
                                <th scope="col" class="p-5 text-left leading-6  capitalize"> Permissions Group </th>
                                <th scope="col" class="p-5 text-left leading-6  capitalize rounded-t-xl"> Actions </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 ">
                            @foreach ($groups as $index => $group)
                            <tr class="bg-white transition-all duration-500 hover:bg-gray-50 overflow-x-scroll">
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> {{ $index + 1 }} </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">   {{ $group->name }}</td>
                                <td class=" p-5 ">
                                    <div class="flex items-center gap-1">
                                        <x-wui-mini-button href="{{ route('edit.group-permissions', ['id' => $group->id]) }}" rounded icon="pencil-square" flat gray interaction="negative" />
                                        <x-wui-mini-button rounded icon="trash" flat gray interaction="primary" hover="primary" />
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>