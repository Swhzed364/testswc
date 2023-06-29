@extends('event/index')

@section('eventInfo')
    <div class="container">
        <div class="h3">{{ $event->title }}</div>
        <div class="h5">{{ $event->text }}</div>
        <div class="h5">{{ $date }}</div>
        <div class="h3">Участники</div>
        <div class="h5">
            @foreach ($eventMembers as $eventMember)
                <a href="{{ route('user.show', ['user' => $eventMember->id]) }}">
                    <div>{{ $eventMember->name }} {{ $eventMember->last_name }}</div>
                </a>
            @endforeach
        </div>

        @if ($isMember)
            <form method="post" action="{{ route('event.abandon', ['event' => $event->id]) }}">
                @csrf
                @method('patch')
                <button class="btn btn-primary" type="submit">Отказаться от участия</button>
            </form>
        @else
            <form method="post" action="{{ route('event.participate', ['event' => $event->id]) }}">
                @csrf
                @method('patch')
                <button class="btn btn-primary" type="submit">Принять участие</button>
            </form>
        @endif
    </div>
@endsection
