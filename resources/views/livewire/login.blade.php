<div class="w-full max-w-md">
    <div>
        @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('message') }}
        </div>
        @endif

        @if (session()->has('success'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="p-3 bg-red-300 text-red-800 rounded shadow-sm">
            {{ session('error') }}
        </div>
        @endif

    </div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4" wire:submit.prevent="login">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email Address
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" wire:model.debounce.500ms="email" placeholder="Email Address">
            @error('email') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pass" type="password" wire:model.debounce.500ms="password" placeholder="Password">
            @error('password') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
                Sign In
            </button>
            {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Forgot Password?
      </a> --}}
        </div>
        Don't have an account? <a class="inline-block align-baseline font-bold text-sm text-blue-300 hover:text-blue-500 mt-1" href="/register" wire:navigate>
            Register
        </a>
    </form>

</div>
