<div>
    <div class="flex flex-col">
        <div class=" overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="flex justify-between my-2 lg:my-2">
                    <div>
                        <x-wui-button href="{{ route('assign.user-groups') }}" type="submit" icon="plus-circle" primary label="New user group" class="bg-primary" />
                    </div>
                    <div></div>
                </div>
                <div class="overflow-hidden ">
                    <table class="w-full rounded-xl">
                        <thead>
                            <tr class="bg-cardBackground3 text-secondary">
                                <th scope="col" class="p-5 text-left leading-6  capitalize"> &nbsp;</th>
                                <th scope="col" class="p-5 text-left leading-6  capitalize">User</th>
                                <th scope="col" class="p-5 text-left leading-6  capitalize"> Permissions Group </th>
                                <th scope="col" class="p-5 text-left leading-6  capitalize">Permisions</th>
                                <th scope="col" class="p-5 text-left leading-6  capitalize rounded-t-xl"> Actions </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 ">
                            @foreach ($users as $index => $user)
                            <tr class="bg-white transition-all duration-500 hover:bg-gray-50 overflow-x-scroll">
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> {{ $index + 1 }} </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $user->name }} </td>
                                @foreach ($user->groups as $group)
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                    <div class=" text-wrap block">
                                        {{ $group->name }} @if(!$loop->last), @endif
                                    </div>
                                </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{ $group->permissions()->count() }}</td>
                                @endforeach
                                <td class=" p-5 ">
                                    <div class="flex items-center gap-1">
                                        <x-wui-mini-button href="{{ route('edit.user-groups', ['id' => $user->id]) }}" rounded icon="pencil-square" flat gray interaction="negative" />
                                        <x-wui-mini-button href="{{ route('edit.user-groups', ['id' => $user->id]) }}" rounded icon="trash" flat gray interaction="primary" hover="primary" />
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