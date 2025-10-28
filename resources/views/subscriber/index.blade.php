<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Email List') }} > {{ $emailList->title }} > {{ __('Subscribers') }}
        </h2>
    </x-slot>

    <x-card class="space-y-4">
        {{-- @unless ($subscribers->isEmpty() && blank($search)) --}}
        <div class="flex justify-between">

            <x-button.link :href="route('subscribers.create', $emailList)">
                {{ __('Add a new subscriber') }}
            </x-link-button>

            <x-form :action="route('subscribers.index', $emailList)" class="w-3/5 flex space-x-4 items-center" x-data x-ref="form" flat>
                <x-input.checkbox value="1" name="showTrash" :label="__('Show Deleted Records')" @click="$refs.form.submit()"
                    :checked="$showTrash" />

                <x-input.text name="search" :value="$search" :placeholder="__('Search')" class="w-full"/>
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
                                    <x-button.secondary type="submit">Delete</x-button.secondary>
                                </x-form>
                            @else
                                <x-badge danger>{{ __('Deleted') }}</x-badge>
                            @endunless
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        {{ $subscribers->links() }}

    </x-card>
</x-layouts.app>
