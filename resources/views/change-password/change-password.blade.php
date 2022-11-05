<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-4 lg:mb-0 font-semibold text-2xl text-gray-800 leading-tight py-4">{{ __('Change Password') }}</div>
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
                                <label class="block text-neutral-200 font-bold md:text-right mb-1 md:mb-0 pr-4" for="oldPasswordInput">
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
                                <label class="block text-neutral-200 font-bold md:text-right mb-1 md:mb-0 pr-4" for="newPasswordInput">
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
                                <label class="block text-neutral-200 font-bold md:text-right mb-1 md:mb-0 pr-4" for="confirmNewPasswordInput">
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
