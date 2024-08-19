@extends('layouts.base')
@section('page.title',$project && $project->title ? $project->title : __('Такого проекта не существует'))
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1>{{__('Информация по проекту')}}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__('Список проектов')}}</a></li>
                    @if($project)
                        <li class="breadcrumb-item active" aria-current="page">{!! $project->title !!}</li>
                    @endif
                </ol>
            </nav>

            <x-project-card class="card mt-2">
                <div class="card-body">
                    <table class="table-primary">
                        <tr class="d-flex">
                            <th class="col-12">{{__('Название проекта')}}</th>
                            <td class="col-12">{!! $project->title !!}</td>
                        </tr>
                        <tr class="d-flex">
                            <th class="col-12">{{__('Дата сдачи проекта')}}</th>
                            <td class="col-12">{{$project->deadline_date}}</td>
                        </tr>
                        <tr class="d-flex">
                            <th class="col-12">{{__('Владелец проекта')}}</th>
                            <td class="col-12">{{$project->owner->username}}</td>
                        </tr>
                        <tr class="d-flex">
                            <th class="col-12">{{__('Ответственный за проект')}}</th>
                            <td class="col-12">{{$project->assignee->username}}</td>
                        </tr>
                        <tr class="d-flex">
                            <th class="col-12">{{__('Проект активен')}}</th>
                            <td class="col-12">{{$project->is_active == 1 ? 'Да' : 'Нет'}}</td>
                        </tr>
                    </table>
                    <a href="{{route('projects.edit',$project->id)}}"
                       class="btn btn-primary mt-3">{{__('Редактировать')}}</a>
                </div>
            </x-project-card>

        </div>
    </div>


@endsection