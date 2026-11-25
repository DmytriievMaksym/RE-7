<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pb-4 border-b border-gray-200">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            Мої моделі
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Моделей, закріплених за автором — {{ $models->count() }}
                        </p>
                    </div>
                    <a href="{{ route('model.create') }}"
                       class="inline-flex items-center gap-1.5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                        <i class="bi bi-plus-lg"></i>
                        <span>Додати модель</span>
                    </a>
                </header>

                <div class="mt-6 overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold uppercase tracking-wider text-gray-600">
                            <th class="px-4 py-3 text-left w-16">ID</th>
                            <th class="px-4 py-3 text-left">Назва моделі</th>
                            <th class="px-4 py-3 text-left w-28">Масштаб</th>
                            <th class="px-4 py-3 text-left">Номінації</th>
                            <th class="px-4 py-3 text-right w-20">Дії</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($models as $model)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3.5 text-gray-500 font-mono text-xs">
                                    {{ $model->id }}
                                </td>
                                <td class="px-4 py-3.5 font-medium text-gray-900">
                                    <a href="{{ route('model.show', $model) }}" class="text-indigo-600 hover:text-indigo-900 hover:underline">
                                        {{ $model->name }}
                                    </a>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-block px-2 py-0.5 text-xs font-medium bg-gray-100 text-gray-800 rounded border border-gray-300">
                                        {{ $model->scale }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5">
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($model->nominations as $nomination)
                                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 border border-indigo-200">
                                                <i class="bi bi-tag text-indigo-500"></i>
                                                {{ $nomination->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                    <a href="{{ route('model.edit', $model) }}"
                                       title="Редагувати модель"
                                       aria-label="Редагувати модель"
                                       class="inline-flex items-center justify-center w-8 h-8 bg-white border border-gray-300 rounded-md text-gray-600 shadow-sm hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 transition ease-in-out duration-150">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
