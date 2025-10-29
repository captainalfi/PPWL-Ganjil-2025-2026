<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 to-blue-900">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-[420px]">
            <h2 class="text-2xl font-bold text-center text-blue-800 mb-6">
                Create your account
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                           class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                           required autofocus autocomplete="name">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                           required autocomplete="username">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input id="password" type="password" name="password"
                           class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                           required autocomplete="new-password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                           required autocomplete="new-password">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Optional: Terms --}}
                <div class="flex items-start gap-2 text-sm text-gray-600">
                    <input id="terms" type="checkbox"
                           class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="terms">I agree to the <a href="#" class="text-blue-700 hover:underline">terms & privacy</a>.</label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full bg-blue-700 text-white font-bold py-2 rounded-lg hover:bg-blue-800 transition">
                    Create account
                </button>

                <p class="text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-700 font-semibold hover:underline">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
