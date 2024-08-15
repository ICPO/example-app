@extends('layouts.base')
@section('page.title',$project->title ? $project->title : __("Такого проекта не существует"))

@section('content')
    <div class="mt-5">
        <div>
            <h1>{{__('Редактирование проекта')}}</h1>
        </div>
        @if(!$project)
            <div>
                <h2>{{__('Такого проекта не существует')}}</h2>
            </div>
        @else
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__('Список проектов')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{\Illuminate\Support\Facades\URL::previous()}}">{!! $project->title !!}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Редактирование проекта')}} </li>
                </ol>
            </nav>
            <x-project-form action="{{ route('projects.update',$project->id) }}" method="POST" class="col-md-4">
                @method('PATCH')
                <div class="mb-3">
                    <label for="title" class="form-label">{{__('Заголовок проекта')}}</label>
                    <input type="text" class="form-control" value="{!! $project->title !!}">
                </div>


                <button type="submit" class="btn btn-primary">{{__('Обновить')}}</button>
            </x-project-form>

        @endif

    </div>

@endsection