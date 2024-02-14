<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Account') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6">
                    <h1 class="flex block inline-block py-4 text-2xl font-extrabold tracking-tight sm:text-3xl text-slate-900 dark:text-slate-200 sm:inline-block">{{ __('Account Info') }}</h1>
                    @if ($errors->account->any())
                    <ul class="mt-3 text-sm text-red-400 list-none list-inside">
                        @foreach ($errors->account->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if(session()->has('account_message'))
                    <div class="mb-8 font-bold text-green-400">
                        {{ session()->get('account_message') }}
                    </div>
                    @endif
                </div>
                <div class="w-full px-6 py-4 overflow-hidden bg-white">
                    <form method="POST" action="{{ route('admin.profile.info.store') }}">
                        @csrf
                        <div class="py-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->account->has('name') ? ' border-red-400' : ''}}" type="text" name="name" value="{{ old('name', $user->name) }}" />
                        </div>
                        <div class="py-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                            <input id="email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->account->has('email') ? ' border-red-400' : ''}}" type="email" name="email" value="{{ old('email', $user->email) }}" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6">
                    <h1 class="flex block inline-block py-4 text-2xl font-extrabold tracking-tight sm:text-3xl text-slate-900 dark:text-slate-200 sm:inline-block">{{ __('Change Password') }}</h1>
                    @if ($errors->password->any())
                    <ul class="mt-3 text-sm text-red-400 list-none list-inside">
                        @foreach ($errors->password->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if(session()->has('password_message'))
                    <div class="mb-8 font-bold text-green-400">
                        {{ session()->get('password_message') }}
                    </div>
                    @endif
                </div>
                <div class="w-full px-6 py-4 overflow-hidden bg-white">
                    <form method="POST" action="{{ route('admin.profile.password.store') }}">
                        @csrf
                        <div class="py-2">
                            <label for="old_password" class="block text-sm font-medium text-gray-700">{{ __('Old Password') }}</label>
                            <input id="old_password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="old_password" />
                            @error('password')
								<p class="text-red-500">{{ $message }}</p>
							@enderror
                        </div>
                        <div class="py-2">
                            <label for="new_password" class="block text-sm font-medium text-gray-700">{{ __('New Password') }}</label>
                            <input id="new_password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="new_password" />
                        </div>
                        <div class="py-2">
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">{{ __('Confirm password') }}</label>
                            <input id="confirm_password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="confirm_password" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type='submit' class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25'>
                                {{ __('Change Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>