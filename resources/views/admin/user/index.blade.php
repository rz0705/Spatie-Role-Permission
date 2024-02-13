<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800">
			{{ __('Users') }}
		</h2>
	</x-slot>
	<div class="py-12">
		<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
			<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<div class="flex flex-col mt-8">
						@can('user create')
						<div class="mb-8 d-print-none with-border">
							<a href="{{ route('user.create') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{ __('Add User') }}</a>
						</div>
						@endcan
						<div class="py-2">
							@if(session()->has('message'))
							<div class="mb-8 font-bold text-green-400">
								{{ session()->get('message') }}
							</div>
							@endif
							<div class="min-w-full border-b border-gray-200 shadow">
								<form method="GET" action="{{ route('user.index') }}">
									<div class="flex py-2">
										<div class="flex pl-4 overflow-hidden">
											<input type="search" name="search" value="{{ request()->input('search') }}" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search">
											<button type='submit' class='inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25'>
												{{ __('Search') }}
											</button>
										</div>
									</div>
								</form>
								<table class="w-full text-sm border-collapse table-auto">
									<thead>
										<tr>
											<th class="px-6 py-4 text-sm font-bold text-left uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">
											{{ __('Name')}}
											</th>
											<th class="px-6 py-4 text-sm font-bold text-left uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">
												{{ __('Email')}}
											</th>
											@canany(['user edit', 'user delete'])
											<th class="px-6 py-4 text-sm font-bold text-left uppercase border-b bg-grey-lightest text-grey-dark border-grey-light">
												{{ __('Actions') }}
											</th>
											@endcanany
										</tr>
									</thead>
									<tbody class="bg-white dark:bg-slate-800">
										@foreach($users as $user)
										<tr>
											<td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
												<div class="text-sm text-gray-900">
													<a href="{{route('user.show', $user->id)}}" class="no-underline text-cyan-600 dark:text-cyan-400">{{ $user->name }}</a>
												</div>
											</td>
											<td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
												<div class="text-sm text-white-900">
													{{ $user->email }}
												</div>
											</td>
											@canany(['user edit', 'user delete'])
											<td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
												<form action="{{ route('user.destroy', $user->id) }}" method="POST">
													@can('user edit')
													<a href="{{route('user.edit', $user->id)}}" class="px-4 py-2 mr-4 text-white bg-blue-600">
														{{ __('Edit') }}
													</a>
													@endcan
													@can('user delete')
													@csrf
													@method('DELETE')
													<button class="px-3 py-2 mb-2 text-sm font-medium text-center text-red-700 border border-red-700 rounded-lg hover:text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
														{{ __('Delete') }}
													</button>
													@endcan
												</form>
											</td>
											@endcanany
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="py-8">
								{{ $users->appends(request()->query())->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>