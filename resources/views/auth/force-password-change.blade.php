<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        @if (session('warning'))
            <div class="mb-4 font-medium text-sm text-yellow-600">
                {{ session('warning') }}
            </div>
        @endif

        <div class="mb-4 text-sm text-gray-600">
            {{ __('For security reasons, you must change your password on your first login before you can access the dashboard.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.change.store') }}">
            @csrf

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('New Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm New Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Change Password') }}
                </x-button>
            </div>
        </form>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </x-auth-card>
</x-guest-layout>
