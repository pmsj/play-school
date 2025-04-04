<div>
    <!-- Profile Settings -->
    <div class="">
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
    <!-- Articles -->
    <div>
        <x-wui-dropdown class="">
            <x-slot name="trigger">
                <x-wui-button label="Article" flat class="bg-slate" icon="photo" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('index.article') }}" :active="request()->routeIs('index.article')">
                    {{ __('All Articles') }}
                </x-responsive-nav-link>
            </div>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('create.article') }}" :active="request()->routeIs('create.article')">
                    {{ __('Create Article') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
    <!-- carousel -->
    <div>
        <x-wui-dropdown class="">
            <x-slot name="trigger">
                <x-wui-button label="Carousel" flat class="bg-slate" icon="photo" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('create.carousel') }}" :active="request()->routeIs('create.carousel')">
                    {{ __('Create Carousel') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
    <!-- Role -->
    <div>
        <x-wui-dropdown class="">
            <x-slot name="trigger">
                <x-wui-button label="Role" flat class="bg-slate" icon="user-plus" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('index.role') }}" :active="request()->routeIs('index.role')">
                    {{ __('Manage Role') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
</div>
