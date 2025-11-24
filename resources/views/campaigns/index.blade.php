<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Campaigns') }}
        </h2>
    </x-slot>

    <x-card class="space-y-4">
        <div class="flex justify-between">

            <x-button.link :href="route('campaigns.create')">
                {{ __('Create a new campaig') }}
                </x-link-button>

                <x-form :action="route('campaigns.index')" class="w-3/5 flex space-x-4 items-center" x-data x-ref="form" flat>
                    <x-input.checkbox value="1" name="withTrashed" :label="__('Show Deleted Records')" @click="$refs.form.submit()"
                        :checked="$withTrashed" />
                    <x-input.text name="search" :value="$search" :placeholder="__('Search')" class="w-full" />
                </x-form>

        </div>
        <x-table :headers="['#', __('Name'), __('Actions')]">
            <x-slot name="body">
                @foreach ($campaigns as $campaign)
                    <tr>
                        <x-table.td class="w-1">{{ $campaign->id }}</x-table.td>
                        <x-table.td>{{ $campaign->name }}</x-table.td>
                        <x-table.td class="w-1">
                            <div class="flex items-center space-x-4">
                                {{-- <x-button.link secondary :href="route('campaigns.show', $campaign)">{{ __('Preview') }}</x-button.link>
                                <x-button.link secondary :href="route('campaigns.edit', $campaign)">{{ __('Edit') }}</x-button.link> --}}
                                @unless ($campaign->trashed())
                                    <div>
                                        <x-form :action="route('campaigns.destroy', $campaign)" delete flat
                                            onsubmit="return confirm('{{ __('Are you sure ?') }}')">
                                            <x-button.secondary type="submit">Delete</x-button.secondary>
                                        </x-form>
                                    </div>
                                @else
                                    <div>
                                        <x-form :action="route('campaigns.restore', $campaign)" patch flat
                                            onsubmit="return confirm('{{ __('Are you sure ?') }}')">
                                            <x-button.secondary danger type="submit">{{__('Restore')}}</x-button.secondary>
                                        </x-form>
                                    </div>
                                @endunless
                            </div>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        {{ $campaigns->links() }}

    </x-card>
</x-layouts.app>
