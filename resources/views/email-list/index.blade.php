<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Email List') }}
        </h2>
    </x-slot>

    <x-card class="space-y-4">
        @unless ($emailLists->isEmpty() && blank($search))
            <div class="flex justify-between">

                <x-button.link :href="route('email-list.create')">
                    {{ __('Create a new email list') }}
                </x-link-button>

                <x-form :action="route('email-list.index')" class="w-2/5">
                    <x-input.text name="search" :value="$search" :placehlder="__('Search')" />
                </x-form>

            </div>
            <x-table :headers="['#', __('Email List'), __('# Subscribers'), __('Actions')]">
                <x-slot name="body">
                    @foreach ($emailLists as $list)
                        <tr>
                            <x-table.td class="p-4">{{ $list->id }}</x-table.td>
                            <x-table.td class="p-4">{{ $list->title }}</x-table.td>
                            <x-table.td class="p-4">{{ $list->subscribers_count }}</x-table.td>
                            <x-table.td class="p-4">
                                <x-button.link :href="route('subscribers.index', $list)" >
                                    Subscribers
                                </x-link-button>
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
            {{ $emailLists->links()}}
        @else
            <div class="flex justify-center">
                <x-button.link :href="route('email-list.create')">
                    {{ __('Create your first email list') }}
                </x-link-button>
            </div>
        @endunless
    </x-card>
</x-layouts.app>
