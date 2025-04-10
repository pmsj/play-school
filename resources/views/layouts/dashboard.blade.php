    <x-app-layout>
        <x-slot name="header">
           <div class="flex space-x-2 items-center">
                <div>
                <x-wui-mini-button href="{{route('user.dashboard') }}"  rounded icon="home" flat gray hover:outline.negative focus:solid.positive class="hover:text-white hover:bg-primary"/>
                </div>
                <div>
                    <h2 class="font-semibold text-xl leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
           </div>
        </x-slot>
        <div class="my-10 mx-auto max-w-7xl p-5">
            <div class="grid lg:grid-cols-12">
                <!-- sidebar -->
                <div class="lg:col-span-3 rounded-lg">
                    <livewire:sidebar/>
                </div>
                <div class="lg:col-span-9">
                    <div class="mx-auto max-w-3xl">
                        @if( isset($slot) ) {{ $slot }} @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>