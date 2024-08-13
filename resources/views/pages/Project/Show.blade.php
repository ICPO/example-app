@extends('layouts.base')
@section('page.title',$projectModel['title'] ? $projectModel['title'] : __("Такого проекта не существует"))
@section('content')
    <div class="mt-5">
        <h1>{{__("Информация по проекту")}}</h1>

        @if(!$projectModel)
            <div>
                <h2>{{__("Такого проекта не существует")}}</h2>
            </div>
        @else
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__("Список проектов")}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{!! $projectModel['title'] !!}</li>
                </ol>
            </nav>


            <x-project-card class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">{!! $projectModel['title'] !!}</h5>
                    <p class="card-text">{{__("Дата завершения")}}: {{$projectModel['deadline_date']}}</p>
                    <a href="{{route('projects.edit',$projectModel['id'])}}"
                       class="btn btn-primary">{{__("Редактировать")}}</a>
                </div>
            </x-project-card>
        @endif

    </div>

@endsection