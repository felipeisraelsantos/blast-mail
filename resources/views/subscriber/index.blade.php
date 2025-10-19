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

                <x-form :action="route('subscribers.index', $emailList)" class="w-2/5">
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
                            <x-table.td class="p-4"> // </x-table.td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
            {{ $subscribers->links()}}

    </x-card>
</x-layouts.app>
