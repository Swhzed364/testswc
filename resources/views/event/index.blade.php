@extends('layouts.admin')

@push('refresh')
    <meta http-equiv="refresh" content="30">
@endpush

@section('content')
    <div class="row">
        <div class="col-3">
            <span class="h3 py-3">Все события</span>

            @foreach ($events as $event)
                <div class="h5 border"><a href="{{ route('event.show', ['event' => $event->id]) }}">{{ $event->title }}</a></div>
            @endforeach

            <span class="h3 py-3">Мои события</span>

            @foreach ($userEvents as $userEvent)
                <div class="h5 border"><a href="{{ route('event.show', ['event' => $userEvent->id]) }}">{{ $userEvent->title }}</a></div>
            @endforeach
        </div>
        <div class="vr border ml-4"></div>
        <div class="col-md-auto">
            @yield('eventInfo')
        </div>
    </div>
@endsection
