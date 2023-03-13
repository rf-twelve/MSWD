<x-auth-card>
    <form wire:submit.prevent="register()" action="#" method="POST" class="space-y-6">
        <div>
            <x-label for="fullname">Fullname :</x-label>
            <div class="mt-1">
                <x-input
                    wire:model.lazy="fullname"
                    id="fullname" type="text"
                    autocomplete="fullname" placeholder="Enter fullname"
                />
                @error('fullname')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>

        <div>
            <x-label for="username">Username :</x-label>
            <div class="mt-1">
                <x-input
                    wire:model.lazy="username"
                    id="username" type="text"
                    autocomplete="username" placeholder="Enter Username"
                />
                @error('username')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>

        <div>
            <x-label for="password">Password :</x-label>
            <div class="mt-1">
                <x-input
                    wire:model.lazy="password"
                    id="password" type="password"
                    autocomplete="password" placeholder="Enter password"
                />
                @error('password')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>

        <div>
            <x-label for="passwordConfirmation">Re-type password :</x-label>
            <div class="mt-1">
                <x-input
                    wire:model.lazy="passwordConfirmation"
                    id="passwordConfirmation" type="password"
                    autocomplete="passwordConfirmation" placeholder="Enter passwordConfirmation"
                />
                @error('passwordConfirmation')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>


        <div class="flex items-center justify-between">
            {{-- <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox"
                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="remember-me" class="block ml-2 text-sm text-gray-900">
                    Remember me
                </label>
            </div> --}}

            <div class="text-sm">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Forgot your password?
                </a>
            </div>
        </div>

        <div>
            <button type="submit"
                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Register
            </button>
        </div>
    </form>
    <div class="flex items-center justify-center py-4">
        <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
            Already have an account, login!
        </a>
    </div>
</x-auth-card>
