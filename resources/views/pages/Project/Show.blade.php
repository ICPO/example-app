@extends('layouts.base')
@section('page.title',$project && $project->title ? $project->title : __('Такого проекта не существует'))
@section('content')
    <div class="mt-5">
        <h1>{{__('Информация по проекту')}}</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__('Список проектов')}}</a></li>
                @if($project)
                    <li class="breadcrumb-item active" aria-current="page">{!! $project->title !!}</li>
                @endif
            </ol>
        </nav>

        @if(!$project)
            <div>
                <h2>{{__('Такого проекта не существует')}}</h2>
            </div>
        @else

            <x-project-card class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">{!! $project->title !!}</h5>
                    <p class="card-text">{{__('Дата завершения')}}: {{$project->deadline_date}}</p>
                    <a href="{{route('projects.edit',$project->id)}}"
                       class="btn btn-primary">{{__('Редактировать')}}</a>
                </div>
            </x-project-card>
        @endif

    </div>

@endsection