    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="my-10 mx-auto max-w-7xl p-5">
            <div class="grid lg:grid-cols-12">
                <div class="lg:col-span-3 h-96 bg-blue-50 rounded-md">
                    <!-- drop down links -->
                    <div>
                        <x-wui-dropdown>
                            <x-slot name="trigger">
                                <x-wui-button label="Account Settings" flat class="bg-slate" icon="user-circle" position="top-start" />
                            </x-slot>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.info') }}" :active="request()->routeIs('profile.info')">
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.password') }}" :active="request()->routeIs('profile.password')">
                                    {{ __('Password') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.security') }}" :active="request()->routeIs('profile.security')">
                                    {{ __('Security') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.delete') }}" :active="request()->routeIs('profile.delete')">
                                    {{ __('Delete Account') }}
                                </x-responsive-nav-link>
                            </div>
                      
                        </x-wui-dropdown>
                    </div>
                    <div>
                        <x-wui-dropdown>
                            <x-slot name="trigger">
                                <x-wui-button label="Account Settings" flat class="bg-slate" icon="user-circle" position="top-start" />
                            </x-slot>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.info') }}" :active="request()->routeIs('profile.info')">
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.password') }}" :active="request()->routeIs('profile.password')">
                                    {{ __('Password') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.security') }}" :active="request()->routeIs('profile.security')">
                                    {{ __('Security') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.delete') }}" :active="request()->routeIs('profile.delete')">
                                    {{ __('Delete Account') }}
                                </x-responsive-nav-link>
                            </div>
                      
                        </x-wui-dropdown>
                    </div>
                    <div>
                        <x-wui-dropdown>
                            <x-slot name="trigger">
                                <x-wui-button label="Account Settings" flat class="bg-slate" icon="user-circle" position="top-start" />
                            </x-slot>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.info') }}" :active="request()->routeIs('profile.info')">
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.password') }}" :active="request()->routeIs('profile.password')">
                                    {{ __('Password') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.security') }}" :active="request()->routeIs('profile.security')">
                                    {{ __('Security') }}
                                </x-responsive-nav-link>
                            </div>
                            <div class="pt-1 pb-3">
                                <x-responsive-nav-link href="{{ route('profile.delete') }}" :active="request()->routeIs('profile.delete')">
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