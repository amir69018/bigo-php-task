<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Social Link -->
            <div class="mt-4">
                <x-label for="social_link" :value="__('Social Account Link: e.g., LinkedIn')" />

                <x-input id="social_link" class="block mt-1 w-full" type="text" name="social_link" :value="old('social_link')" required />
            </div>
            <!-- Cover Letter -->
            <div class="mt-4">
                <x-label for="cover_letter" :value="__('Cover Letter')" />

                <x-input id="cover_letter" class="block mt-1 w-full" type="text" name="cover_letter" :value="old('cover_letter')"/>
            </div>

            <!-- Resume -->
            <div class="mt-4">
                <x-label for="resume" :value="__('Choose Resume')" />

                <x-input id="resume" class="block mt-1 w-full" type="file" name="resume" :value="old('resume')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already applied?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Apply') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
