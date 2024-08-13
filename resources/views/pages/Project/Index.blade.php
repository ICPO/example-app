@extends('layouts.base')
@section('page.title',__("Список проектов"))
@section('content')
    <div class="mt-5">
        <div class="d-flex align-items-center">
            <h1>{{__("Список проектов")}}</h1>
            <a class="ms-3" href="{{route('projects.create')}}"><button class="btn btn-primary">{{__("Создание проекта")}}</button></a>
        </div>


        <div class="mt-5">
            @foreach($projects as $project)
                <x-project-card class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">{!! $project['title'] !!}</h5>
                        <p class="card-text">{{__("Дата завершения")}}: {{$project['deadline_date']}}</p>
                        <a href="{{ route('projects.show',$project['id']) }}" class="btn btn-primary">{{__("Подробнее")}}</a>
                    </div>
                </x-project-card>
            @endforeach
        </div>
    </div>
@endsection
