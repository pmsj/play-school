    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="my-10 mx-auto max-w-7xl p-5">
            <div class="grid lg:grid-cols-12">
                <div class="lg:col-span-3 rounded-md">
                    <!-- drop down links -->
                    <div>
                        <x-wui-dropdown class="">
                            <x-slot name="trigger">
                                <x-wui-button label="Account Settings" flat class="bg-slate" icon="user-circle" position="top-start" class="" />
                            </x-slot>
                            <div class="">
                                <x-responsive-nav-link wire:navigate href="{{ route('profile.info') }}" :active="request()->routeIs('profile.info')">
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="">
                                <x-responsive-nav-link wire:navigate href="{{ route('profile.password') }}" :active="request()->routeIs('profile.password')">
                                    {{ __('Password') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="">
                                <x-responsive-nav-link wire:navigate href="{{ route('profile.security') }}" :active="request()->routeIs('profile.security')">
                                    {{ __('Security') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="">
                                <x-responsive-nav-link wire:navigate href="{{ route('profile.delete') }}" :active="request()->routeIs('profile.delete')">
                                    {{ __('Delete Account') }}
                                </x-responsive-nav-link>
                            </div>
                      
                        </x-wui-dropdown>
                    </div>
                </div>
                <div class="lg:col-span-9">
                    <div class="mx-auto max-w-3xl">
                        @if( isset($slot) ) {{ $slot }} @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>