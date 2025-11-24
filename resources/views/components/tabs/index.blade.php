@props(['tabs' => []])

<div class="w-full">
    <div class="flex gap-2 overflow-x-auto  border-slate-300 dark:border-slate-700">

        @foreach ($tabs as $title => $route)
            @php
                $selected = request()->getUri() == $route;
            @endphp

            <a @class([
                'h-min px-4 py-2 text-sm',
                'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' => $selected,
                'text-slate-700 font-medium dark:text-slate-300-dark dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black' => !$selected,
            ]) href="{{ $route }}">{{ $title }}</a>
        @endforeach

        {{-- <button x-bind:class="selectedTab === 'groups' ? 'font-bold text-primary border-b-2 border-primary dark:border-primary-dark dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelGroups" >Groups</button> --}}
    </div>
    <div class="px-2 py-4 text-on-surface dark:text-on-surface-dark">
        {{ $slot }}
    </div>
</div>
