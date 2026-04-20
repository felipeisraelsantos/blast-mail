<div class="space-y-4">
    <x-form class="flex justify-end" action="{{ route('campaigns.show', compact('campaign', 'what')) }}" get>
        <x-input.text  name="search" placeholder="{{ __('Search an email ...') }}" value="{{ $search }}"/>
    </x-form>
    <x-table :headers="[__('Name'), __('# Openings'), __('Email')]">
        <x-slot name="body">
            <tr>
                <x-table.td>Felipe</x-table.td>
                <x-table.td>2</x-table.td>
                <x-table.td>teste@teste.com</x-table.td>
            </tr>
        </x-slot>
    </x-table>
    {{-- {{ $campaigns->links() }} --}}
</div>
