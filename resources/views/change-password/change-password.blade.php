<x-app-layout>
    <div class="container p-4 bg-white rounded-lg shadow-md mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="overflow-hidden flex justify-between w-full py-2">
                        <div class="flex justify-start py-2 w-full">
                                <div class="flex justify-center items-center w-16 bg-blue-700">
                                    <svg class="w-8 h-8 text-white fill-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                                    </svg>
                                </div>
                                <div class="px-2 py-2 -mx-2">
                                    <div class="mx-2">
                                        <span class="font-semibold text-blue-700 text-base">Hello, {{ auth()->user()->first_name }}. You are updating your password.</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <form action="{{ route('update-password')}}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="card-body">
                        @if (session('status'))
                        <div class="border border-green-400 rounded-b bg-green-100 px-2 py-3 text-green-700">
                            {{ session('status') }}
                        </div>
                        @elseif (session('error'))
                        <div class="border border-red-400 rounded-b bg-red-100 px-2 py-3 text-red-700">
                            {{ session('error') }}
                        </div>
                        @endif
                            <div class="md:flex md:items-center mb-6 pt-4">
                                <div class="md:w-1/3">
                                <label class="block text-neutral-200 font-semibold md:text-right mb-1 md:mb-0 pr-4" for="oldPasswordInput">
                                    Old Password
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                <input class="bg-white appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                    id="oldPasswordInput" name="old_password" type="password" placeholder="">
                                    @error('old_password')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-neutral-200 font-semibold md:text-right mb-1 md:mb-0 pr-4" for="newPasswordInput">
                                    New Password
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                <input class="bg-white appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                    id="newPasswordInput" name="new_password" type="password" placeholder="">
                                    @error('new_password')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-neutral-200 font-semibold md:text-right mb-1 md:mb-0 pr-4" for="confirmNewPasswordInput">
                                    Confirm Password
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                <input class="bg-white appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                                    id="confirmNewPasswordInput" name="new_password_confirmation" type="password" placeholder="">
                                </div>
                            </div>
                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-2/3">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Save Password
                                </button>
                                </div>
                            </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
