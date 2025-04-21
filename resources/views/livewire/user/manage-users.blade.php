<div>
    <div class="mb-5">
            @if (session()->has('message'))
                <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200" />
            @endif
    </div>
    <div class="flex justify-between my-2 lg:my-2">
        <div>
            <x-wui-button @click="Livewire.dispatchTo('user.create-user', 'createNewUser')" type="submit" icon="plus-circle" primary label="New user"  class="bg-primary"/>
        </div>
        <div></div>
    </div>
    <!-- in exclude prop, always pass comma seperated column names and there should not be any gap in between column names -->
    <livewire:user.create-user />

    <section class="container mx-auto">
  <div class="w-full mb-8  rounded-lg">
    <div class="overflow-x-auto">
      <table class="min-w-full ">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-secondary bg-cardBackground3  border-b border-gray-600">
            <th class="px-4 py-3">No.</th>
            <th class="px-4 py-3">Name</th>
            <th class="hidden sm:table-cell px-4 py-3">Email</th>
            <th class="hidden sm:table-cell px-4 py-3">Permission Groups</th>
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
                  <dl class="mt-1">
                      <dt class="sr-only">Email</dt>
                    <dd class="text-sm sm:hidden">{{ $user->email }}</dd>
                  </dl>
                  <dl class="mt-1 text-center">
                      <dt class="sr-only">Email</dt>
                        @if ($user->groups->isNotEmpty())
                          <dd class="sm:hidden text-xs bg-base3 rounded-full">{{ $user->groups->first()->name }}</dd>
                        @endif
                  </dl>
                  <dl class="mt-1 text-left">
                      <dt class="sr-only"></dt>
                      <dd class="sm:hidden text-xs rounded-full">
                        <x-wui-mini-button rounded icon="pencil-square" flat gray interaction="negative" />
                        <x-wui-mini-button rounded icon="trash" flat gray interaction="negative" />
                      </dd>
                  </dl>
                </div>  
            </td>
            <td class="hidden sm:table-cell px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight"> {{ $user->email }} </span>
            </td>
            <td class="hidden sm:table-cell px-4 py-3 border text-center">
              @foreach($user->groups as $group)
                    <p class="text-xs text-textColor bg-base3 rounded-full mb-1"> {{ $group->name }}@if(!$loop->last), @endif</p>
              @endforeach
                </div>
            </td>
            <td class="hidden sm:table-cell px-4 py-3 text-sm border">
            <x-wui-mini-button rounded icon="pencil-square" flat gray interaction="negative" />
            <x-wui-mini-button rounded icon="trash" flat gray interaction="negative" />
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
</div>
