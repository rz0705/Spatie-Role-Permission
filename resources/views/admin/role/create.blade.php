<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-6">
                    <h1 class="flex block inline-block py-4 text-2xl font-extrabold tracking-tight sm:text-3xl text-slate-900 dark:text-slate-200 sm:inline-block">{{ __('Create role') }}</h1>
                    <a href="{{route('role.index')}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{ __('Back to all roles') }}</a>
                    {{-- @if ($errors->any())
                    <ul class="mt-3 text-sm text-red-400 list-none list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif --}}
                </div>
                <div class="w-full px-6 py-4 overflow-hidden bg-white">
                    <form method="POST" action="{{ route('role.store') }}">
                        @csrf
                        <div class="py-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('app.role.name') }}</label>
                            <input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('name') ? ' border-red-400' : ''}}" type="text" name="name" value="{{ old('name') }}" />
                            @error('name')
								<p class="text-red-500">{{ $message }}</p>
							@enderror
                        </div>
                        <div class="py-2">
                            <h3 class="flex block inline-block py-4 text-xl font-extrabold tracking-tight sm:text-2xl text-slate-900 dark:text-slate-200 sm:inline-block">Permissions</h3>
                            <div class="grid grid-cols-4 gap-4">
                                @forelse ($permissions as $permission)
                                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @empty
                                ----
                                @endforelse
                            </div>
                            @error('permissions')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type='submit' class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25'>
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>