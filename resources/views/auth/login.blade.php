<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 to-blue-900">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-[400px]">
            <h2 class="text-2xl font-bold text-center text-blue-800 mb-6">Login to Your Account</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                        required autofocus>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input id="password" type="password" name="password"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                        required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="remember_me" class="ml-2 text-gray-600 text-sm">Remember Me</label>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-blue-700 text-white font-bold py-2 rounded-lg hover:bg-blue-800 transition">
                    Log In
                </button>

                <p class="text-sm text-center mt-4 text-gray-600">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">
                        Register here
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
