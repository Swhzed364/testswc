@extends('event/index')

@section('eventInfo')
    <div class="container">
        <div class="h2">{{ $user->name }} {{ $user->last_name}}</div>
        <div class="h4">Дата Рождения: {{ $dateOfBirth }}</div>
    </div>
@endsection
