<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="my-10 mx-auto max-w-7xl p-5">
        <div class="grid lg:grid-cols-12">
            <div class="lg:col-span-3 h-96">
                <div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link href="{{ route('profile.info') }}" :active="request()->routeIs('profile.info')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link href="{{ route('profile.password') }}" :active="request()->routeIs('profile.password')">
                            {{ __('Security') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-9">
            @if( isset($slot) ) {{ $slot }} @endif
            </div>
        </div>
    </div>
</x-app-layout>