@php
    $total_subscribers = $query['total_subscribers'];
@endphp
{{-- @dd($query); --}}
<div class="flex flex-col gap-4">
    <x-alert no-icon success :title="__('Sua campanha foi enviada para :count assinantes da lista: :list', [
        'count' => $total_subscribers,
        'list' => $campaign->emailList->title,
    ])" />
    <div class="grid grid-cols-3 gap-5">
         <x-dashboard.card :heading="$query['total_openings']" subheading="{{ __('Opens') }}" />
        <x-dashboard.card :heading="$query['unique_opens']" subheading="{{ __('Unique Opens') }}" />
        <x-dashboard.card heading="{{ $query['openings_rate'] }}%" subheading="{{ __('Open Rate') }}" />
        <x-dashboard.card :heading="$query['total_clicks']" subheading="{{ __('Clicks') }}" />
        <x-dashboard.card :heading="$query['unique_clicks']" subheading="{{ __('Unique Clicks') }}" />
        <x-dashboard.card heading="{{ $query['clicks_rate'] }}%" subheading="{{ __('Clicks Rate') }}" />
    </div>
</div>
