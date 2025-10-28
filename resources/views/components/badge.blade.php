@props(['type' => 'primary'])

@php
    // Permite usar <x-badge warning> em vez de type="warning"
    foreach (['primary', 'secondary', 'info', 'success', 'warning', 'danger'] as $t) {
        if ($attributes->has($t)) {
            $type = $t;
            break;
        }
    }
@endphp


<!-- primary Badge -->
@if ($type === 'primary')
    <span
        class="w-fit inline-flex overflow-hidden rounded-sm border border-black bg-white text-xs font-medium text-black dark:border-white dark:bg-neutral-950 dark:text-white">
        <span class="flex items-center gap-1 bg-black/10 px-2 py-1 dark:bg-white/10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
                class="size-3">
                <path fill-rule="evenodd"
                    d="M11.097 1.515a.75.75 0 01.589.882L10.666 7.5h4.47l1.079-5.397a.75.75 0 111.47.294L16.665 7.5h3.585a.75.75 0 010 1.5h-3.885l-1.2 6h3.585a.75.75 0 010 1.5h-3.885l-1.08 5.397a.75.75 0 11-1.47-.294l1.02-5.103h-4.47l-1.08 5.397a.75.75 0 01-1.47-.294l1.02-5.103H3.75a.75.75 0 110-1.5h3.885l1.2-6H5.25a.75.75 0 010-1.5h3.885l1.08-5.397a.75.75 0 01.882-.588zM10.365 9l-1.2 6h4.47l1.2-6h-4.47z"
                    clip-rule="evenodd" />
            </svg>
            {{ $slot }}
        </span>
    </span>
    <!-- secondary Badge -->
@elseif ($type === 'secondary')
    <span
        class="w-fit inline-flex overflow-hidden rounded-sm border border-neutral-800 bg-white text-xs font-medium text-neutral-800 dark:border-neutral-300 dark:bg-neutral-950 dark:text-neutral-300">
        <span class="flex items-center gap-1 bg-neutral-800/10 px-2 py-1 dark:bg-neutral-300/10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                fill="none" stroke-width="1.4" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            {{ $slot }}
        </span>
    </span>
    <!-- info Badge -->
@elseif ($type === 'info')
    <span
        class="w-fit inline-flex overflow-hidden rounded-sm border border-sky-500 bg-white text-xs font-medium text-sky-500 dark:border-sky-500 dark:bg-neutral-950 dark:text-sky-500">
        <span class="flex items-center gap-1 bg-sky-500/10 px-2 py-1 dark:bg-sky-500/10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
                class="size-4">
                <path fill-rule="evenodd"
                    d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                    clip-rule="evenodd" />
            </svg>
            {{ $slot }}
        </span>
    </span>
    <!-- success Badge -->
@elseif ($type === 'success')
    <span
        class="w-fit inline-flex overflow-hidden rounded-sm border border-green-500 bg-white text-xs font-medium text-green-500 dark:border-green-500 dark:bg-neutral-950 dark:text-green-500">
        <span class="flex items-center gap-1 bg-green-500/10 px-2 py-1 dark:bg-green-500/10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
                class="size-4">
                <path fill-rule="evenodd"
                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                    clip-rule="evenodd" />
            </svg>
            {{ $slot }}
        </span>
    </span>
    <!-- warning Badge -->
@elseif ($type === 'warning')
    <span
        class="w-fit inline-flex overflow-hidden rounded-sm border border-amber-500 bg-white text-xs font-medium text-amber-500 dark:border-amber-500 dark:bg-neutral-950 dark:text-amber-500">
        <span class="flex items-center gap-1 bg-amber-500/10 px-2 py-1 dark:bg-amber-500/10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
                class="size-4">
                <path fill-rule="evenodd"
                    d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z"
                    clip-rule="evenodd" />
            </svg>
            {{ $slot }}
        </span>
    </span>
    <!-- danger Badge -->
@elseif ($type === 'danger')
    <span
        class="w-fit inline-flex overflow-hidden rounded-sm border border-red-500 bg-white text-xs font-medium text-red-500 dark:border-red-500 dark:bg-neutral-950 dark:text-red-500">
        <span class="flex items-center gap-1 bg-red-500/10 px-2 py-1 dark:bg-red-500/10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"
                class="size-4">
                <path fill-rule="evenodd"
                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                    clip-rule="evenodd" />
            </svg>
            {{ $slot }}
        </span>
    </span>
@endif
