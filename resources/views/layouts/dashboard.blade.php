    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="my-10 mx-auto max-w-7xl p-5">
            <div class="grid lg:grid-cols-12">
                <!-- sidebar -->
                <div class="lg:col-span-3 rounded-lg bg-base1">
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