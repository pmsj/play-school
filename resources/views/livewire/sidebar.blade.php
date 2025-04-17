<div class="overflow-auto bg-white rounded-lg py-4">
    <!-- Profile Settings -->
    <div class="hover:text-primary">
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
    <div class="hover:text-primary">
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
    <div class="hover:text-primary">
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
    <!-- Users -->
    <div class="hover:text-primary">
        <x-wui-dropdown class="">
            <x-slot name="trigger">
                <x-wui-button label="Manage Users" flat class="bg-slate" icon="user-circle" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('index.user') }}" :active="request()->routeIs('index.user')">
                    {{ __('All users') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
    <!-- Role -->
    <div class="hover:text-primary">
        <x-wui-dropdown class="">
            <x-slot name="trigger">
                <x-wui-button label="Manage Roles" flat class="bg-slate" icon="user-plus" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('index.role') }}" :active="request()->routeIs('index.role')">
                    {{ __('Manage Role') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
    <!-- Permission -->
    <div class="hover:text-primary">
        <x-wui-dropdown>
            <x-slot name="trigger">
                <x-wui-button label="Manage Permission" flat class="bg-slate" icon="user-plus" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('index.permission') }}" :active="request()->routeIs('index.permission')">
                    {{ __('Manage Permission') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
     <!-- Manage Group Permissions -->
     <div class="hover:text-primary">
        <x-wui-dropdown>
            <x-slot name="trigger">
                <x-wui-button label="Assign group permissions" flat class="bg-slate" icon="user-plus" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('assign.group-permissions') }}" :active="request()->routeIs('assign.group-permissions')">
                    {{ __('Assign group permission') }}
                </x-responsive-nav-link>
            </div>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('manage.group-permissions') }}" :active="request()->routeIs('manage.group-permissions')">
                    {{ __('Manage group permission') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>
     <!-- Manage user Groups  -->
     <div class="hover:text-primary">
        <x-wui-dropdown>
            <x-slot name="trigger">
                <x-wui-button label="Manage user groups" flat class="bg-slate" icon="user-plus" position="top-start" class="" />
            </x-slot>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('assign.user-groups') }}" :active="request()->routeIs('assign.user-groups')">
                    {{ __('Assign user group') }}
                </x-responsive-nav-link>
            </div>
            <div class="">
                <x-responsive-nav-link wire:navigate href="{{ route('manage.user-groups') }}" :active="request()->routeIs('manage.user-groups')">
                    {{ __('Manage user groups') }}
                </x-responsive-nav-link>
            </div>
        </x-wui-dropdown>
    </div>

</div>
