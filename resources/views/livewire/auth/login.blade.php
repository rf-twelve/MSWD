<x-auth-card>
    <form wire:submit.prevent="login()" class="space-y-6">

        {{-- <x-input.group group-size="sm:col-span-2" label="Document Number :" for="doc_no"
            :error="$errors->first('editing.doc_no')">
            <x-forms.input id="username" name="username" type="text" :value="old('username')" autofocus />
        </x-input.group> --}}
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
                    placeholder="Enter Password"
                />
                @error('password')<span class="text-red-500">{{ $message }}</span>@enderror
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
                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent shadow-sm rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Login
            </button>
        </div>
    </form>
    <div class="flex items-center justify-center py-4">
        <a href="{{route('register')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
            Don't have an account yet? Sign Up!
        </a>
    </div>
</x-auth-card>
