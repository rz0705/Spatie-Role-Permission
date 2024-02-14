<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Permissions') }}
        </h2>
    </x-slot>
		<div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-6">
                    <h1 class="flex block inline-block py-4 text-2xl font-extrabold tracking-tight sm:text-3xl text-slate-900 dark:text-slate-200 sm:inline-block">{{ __('View permission') }}</h1>
                    <a href="{{route('permission.index')}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{ __('Back to all permission') }}</a>
                    @if ($errors->any())
                        <ul class="mt-3 text-sm text-red-400 list-none list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="w-full px-6 py-4">
                    <div class="min-w-full border-b border-gray-200 shadow">
                        <table class="w-full text-sm table-fixed">
                            <tbody class="bg-white dark:bg-slate-800">
                                <tr>
                                    <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{ __('Name') }}</td>
                                    <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{$permission->name}}</td>
                                </tr>
                                <tr>
                                    <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{ __('Created') }}</td>
                                    <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{$permission->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>