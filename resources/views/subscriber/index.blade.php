<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Email List') }} > {{ $emailList->title }} > {{ __('Subscribers') }}
        </h2>
    </x-slot>

    <x-card class="space-y-4">
        {{-- @unless ($subscribers->isEmpty() && blank($search)) --}}
        <div class="flex justify-between">

            <x-link-button :href="route('subscribers.create', $emailList)">
                {{ __('Add a new subscriber') }}
            </x-link-button>

            <x-form :action="route('subscribers.index', $emailList)" class="w-2/5" x-data x-ref="form">
                <label for="show_trash" class="inline-flex items-center">
                    <input id="show_trash" type="checkbox" value="1" @click="$refs.form.submit()"
                        @if ($showTrash) checked @endif
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="showTrash">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show Deleted Records') }}</span>
                </label>
                <x-text-input name="search" :value="$search" :placehlder="__('Search')" />
            </x-form>

        </div>
        <x-table :headers="['#', __('Name'), __('Email'), __('Actions')]">
            <x-slot name="body">
                @foreach ($subscribers as $subscriber)
                    <tr>
                        <x-table.td class="p-4">{{ $subscriber->id }}</x-table.td>
                        <x-table.td class="p-4">{{ $subscriber->name }}</x-table.td>
                        <x-table.td class="p-4">{{ $subscriber->email }}</x-table.td>
                        {{-- <x-table.td class="p-4"> {{ $subscriber->emailList->title }} </x-table.td> --}}
                        <x-table.td class="p-4">
                            @unless ($subscriber->trashed())
                                <x-form :action="route('subscribers.destroy', [$emailList, $subscriber])" delete flat
                                    onsubmit="return confirm('{{ __('Are you sure ?') }}')">
                                    <x-secondary-button type="submit">Delete</x-secondary-button>
                                </x-form>
                            @else
                                <span
                                    class="w-fit inline-flex overflow-hidden rounded-sm border border-red-500 bg-white text-xs font-medium text-red-500 dark:border-red-500 dark:bg-neutral-950 dark:text-red-500">
                                    <span class="flex items-center gap-1 bg-red-500/10 px-2 py-1 dark:bg-red-500/10">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            fill="currentColor" class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Deleted
                                    </span>
                                </span>
                            @endunless
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        {{ $subscribers->links() }}

    </x-card>
</x-layouts.app>
