<div>
    <div>
    <div class="mb-5">
            @if (session()->has('message'))
                <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200" />
            @endif
    </div>

    <!-- in exclude prop, always pass comma seperated column names and there should not be any gap in between column names -->
    <livewire:user.create-user />

<section class="container mx-auto">
  <div class="w-full mb-8  rounded-lg">
  <div class="flex justify-between bg-cardBackground3 p-4 border-b">
        <div class="flex justify-between">
            <div>
              <h3 class="text-lg text-secondary font-black">Users with assigned permission-groups</h3>
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
            <th class="px-4 py-3">User</th>
            <th class="hidden sm:table-cell px-4 py-3">Permission Groups</th>
            <th class="hidden sm:table-cell px-4 py-3">Permission counts</th>
            <th class="hidden sm:table-cell px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($users as $index => $user)
          <tr class="text-gray-700">
          <td class="px-4 py-3 text-ms font-semibold border">{{ $index + 1 }}</td>
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="{{ $user->profile_photo_url }}" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold text-black">{{ $user->name }}</p>
                  <dl class="mt-2">
                      <dt class="sr-only">Email</dt>
                        @foreach($user->groups as $group)
                          <dd class="sm:hidden text-xs bg-base3 rounded-full mb-1 px-1">{{ $group->name }}</dd>
                        @endforeach
                  </dl>
                  <dl class="mt-1 text-left">
                      <dt class="sr-only"></dt>
                      <dd class="sm:hidden text-xs rounded-full text-primary">
                        <div class="flex items-center">
                          <div class="">edit</div>
                          <div>
                            <x-wui-mini-button href="{{ route('edit.user-groups', ['id' => $user->id]) }}" rounded icon="pencil-square" flat gray interaction="negative" class="text-primary"/>
                          </div>
                        </div>
                      </dd>
                  </dl>
                </div>  
            </td>
            <td class="hidden sm:table-cell px-4 py-3 border text-center">
              @foreach($user->groups as $group)
                    <p class="text-xs text-textColor bg-base3 rounded-full mb-1"> {{ $group->name }}@if(!$loop->last), @endif</p>
              @endforeach
                </div>
            </td>
            <td class="hidden sm:table-cell px-4 py-3 text-xs border text-center">
              <span class="px-2 py-1 font-semibold leading-tight"> {{ count($user->permissions) }} </span>
            </td>
            <td class="hidden sm:table-cell px-4 py-3 text-sm border">
                <x-wui-mini-button href="{{ route('edit.user-groups', ['id' => $user->id]) }}" rounded icon="pencil-square" flat gray interaction="negative" class="text-primary" />
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