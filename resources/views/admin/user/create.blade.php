<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Users') }}
		</h2>
	</x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="px-6 flex justify-between items-center">
					<h1 class="flex block inline-block py-4 text-2xl font-extrabold tracking-tight sm:text-3xl text-slate-900 dark:text-slate-200 sm:inline-block">{{ __('Create User') }}</h1>
                    <a href="{{route('user.index')}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{ __('Back to all users') }}</a>
					{{-- @if ($errors->any())
					<ul class="mt-3 list-none list-inside text-sm text-red-400">
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif --}}
				</div>
				<div class="w-full px-6 py-4 bg-white overflow-hidden">
					<form method="POST" action="{{ route('user.store') }}">
						@csrf
						<div class="py-2">
							<label for="name" class="block font-medium text-sm text-gray-700">{{ __('app.user.name') }}</label>
							<input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('name') ? ' border-red-400' : ''}}" type="text" name="name" value="{{ old('name') }}" />
							@error('name')
								<p class="text-red-500">{{ $message }}</p>
							@enderror
						</div>
						<div class="py-2">
							<label for="email" class="block font-medium text-sm text-gray-700">{{ __('app.user.email') }}</label>
							<input id="email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('email') ? ' border-red-400' : ''}}" type="email" name="email" value="{{ old('email') }}" />
							@error('email')
								<p class="text-red-500">{{ $message }}</p>
							@enderror
						</div>
						<div class="py-2">
							<label for="password" class="block font-medium text-sm text-gray-700">{{ __('app.user.password') }}</label>
							<input id="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('password') ? ' border-red-400' : ''}}" type="password" name="password" />
							@error('password')
								<p class="text-red-500">{{ $message }}</p>
							@enderror
						</div>
						<div class="py-2">
							<label for="password_confirmation" class="block font-medium text-sm text-gray-700">{{ __('app.user.password_confirmation') }}</label>
							<input id="password_confirmation" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('password') ? ' border-red-400' : ''}}" type="password" name="password_confirmation" />
						</div>
						<div class="py-2">
							<h3 class="inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">{{ __('app.user.roles') }}</h3>
							<div class="grid grid-cols-4 gap-4">
								@forelse ($roles as $role)
								<div class="col-span-4 sm:col-span-2 md:col-span-1">
									<label class="form-check-label">
										<input type="checkbox" name="roles[]" value="{{ $role->name }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
										{{ $role->name }}
									</label>
								</div>
								@empty
								----
								@endforelse
							</div>
							@error('roles')
							<p class="text-red-500">{{ $message }}</p>
							@enderror
						</div>
						<div class="flex justify-end mt-4">
							<button type='submit' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
								{{ __('Create') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>