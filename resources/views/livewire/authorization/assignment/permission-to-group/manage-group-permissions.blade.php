<div
  class="">
  <div class="flex flex-col">
        <div class="mb-5">
            @if (session()->has('message-one'))
                <x-wui-alert title="{{ session('message-one') }} " positive squared class="bg-green-200 rounded-lg" />
            @endif
        </div>
        <div class="mb-5">
            @if (session()->has('message-two'))
                <x-wui-alert title="{!! session('message-two') !!}"  info  class="bg-positive text-secondary rounded-lg"/>
            @endif
        </div>
        <div class="my-2">
            <x-wui-button href="{{ route('assign.group-permissions') }}" type="submit" icon="plus-circle" primary label="New  permission-group" class="bg-primary" />
          </div>
        <section class="container mx-auto">
        <div class="w-full mb-8  rounded-lg">
        <div class="flex justify-between bg-cardBackground3 p-4 border-b">
                <div class="flex justify-between">
                    <div>
                    <h3 class="text-lg text-secondary font-black">Manage Permission Groups</h3>
                    </div>
                    <div></div>
                        </div>
                <div></div>
            </div>
            <div class="overflow-x-auto">
            <table class="min-w-full ">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-secondary bg-white  border-b border-gray-600">
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">Permissions Group</th>
                    <th class="hidden sm:table-cell px-4 py-3">Permission counts</th>
                    <th class="hidden sm:table-cell px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach ($groups as $index => $group)
                <tr class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div>
                        <p class="font-semibold text-black">{{  $group->name }}</p>
                        <dl class="mt-2">
                            <dt class="sr-only">permission count</dt>
                                <dd class="sm:hidden text-xs bg-base3 rounded-full mb-1 px-1">Permission count ({{ $group->permissions->count()}})</dd>
                        </dl>
                        <dl class="mt-1 text-left">
                            <dt class="sr-only">edit</dt>
                            <dd class="sm:hidden text-xs rounded-full text-primary">
                                <div class="flex items-center">
                                <div class="">edit</div>
                                <div>
                                    <x-wui-mini-button href="{{ route('edit.group-permissions', ['id' => $group->id]) }}" rounded icon="pencil-square" flat gray interaction="negative" class="text-primary"/>
                                </div>
                                <div class="text-rose">delete</div>
                                <div>
                                    <x-wui-mini-button href="{{ route('edit.group-permissions', ['id' => $group->id]) }}" rounded icon="trash" flat gray interaction="negative" class="text-rose"/>
                                </div>
                                </div>
                                </div>
                            </dd>
                        </dl>
                        </div>  
                    </td>
                    <td class="hidden sm:table-cell px-4 py-3 text-xs border text-center">
                    <span class="px-2 py-1 font-semibold leading-tight">  {{ $group->permissions->count() }} </span>
                    </td>
                    <td class="hidden sm:table-cell px-4 py-3 text-sm border">
                        <x-wui-mini-button href="{{ route('edit.group-permissions', ['id' => $group->id])  }}" rounded icon="pencil-square" flat gray interaction="negative" class="text-primary" />
                        <x-wui-mini-button rounded icon="trash" flat gray interaction="primary" hover="primary" />
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </section>  
    </div>
</div>