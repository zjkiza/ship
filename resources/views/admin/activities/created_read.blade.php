@component('admin.activities.activity')

    @slot('header')

        {{ $activity->type }}

    @endslot

    @slot('date')

        {{ $activity->created_at }}

    @endslot

@endcomponent
