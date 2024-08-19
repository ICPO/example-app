@extends('layouts.base')
@section('page.title',$project && $project->title ? $project->title : __("Такого проекта не существует"))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div>
                <h1>{{__('Редактирование проекта')}}</h1>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__('Список проектов')}}</a></li>
                    @if($project)
                        <li class="breadcrumb-item"><a
                                href="{{\Illuminate\Support\Facades\URL::previous()}}">{!! $project->title !!}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{__('Редактирование проекта')}} </li>
                </ol>
            </nav>

            <x-project-form action="{{ route('projects.update',$project->id) }}" method="POST" class="col-md-4">
                @method('PATCH')
                <div class="mb-3">
                    <label for="title" class="form-label">{{__('Заголовок проекта')}}</label>
                    <input type="text" class="form-control" name="title"
                           placeholder="{!! __('Например, Проект 1') !!}"
                           value="{!! $project->title !!}">
                    <x-form-error name="title"/>
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">{{__('Владелец проекта')}}</label>
                    <select class="form-select" name="owner_id">
                        <option selected disabled>{{__('Не выбрано')}}</option>
                        @foreach ($users as $id => $username)
                            <option value="{{$id}}"
                                    @if($project->owner_id == $id) selected @endif>{{$username}}</option>
                        @endforeach
                    </select>
                    <x-form-error name="owner_id"/>

                </div>
                <div class="mb-3">
                    <label for="assignee_id" class="form-label">{{__('Ответственный за проект')}}</label>
                    <select class="form-select" name="assignee_id">
                        <option selected disabled>{{__('Не выбрано')}}</option>
                        @foreach ($users as $id => $username)
                            <option value="{{$id}}"
                                    @if($project->assignee_id == $id) selected @endif>{{$username}}</option>
                        @endforeach
                    </select>
                    <x-form-error name="assignee_id"/>
                </div>

                <div class="mb-3">
                    <label for="deadline_date" class="form-label">{{__('Дата сдачи проекта')}}</label>
                    <input type="date" class="form-control" name="deadline_date"
                           value="{{$project->deadline_date}}">
                    <x-form-error name="deadline_date"/>
                </div>

                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" name="is_active"
                           @if($project->is_active) checked @endif>
                    <label class="form-check-label">
                        {{__('Проект активен')}}
                    </label>
                    <x-form-error name="is_active"/>
                </div>

                <button type="submit" class="btn btn-primary">{{__('Обновить')}}</button>
            </x-project-form>

            <x-project-form method="POST" action="{{route('projects.destroy',$project->id)}}">
                @method('DELETE')
                <button class="btn btn-danger mt-3">{{__('Удалить')}}</button>
            </x-project-form>
        </div>
    </div>


@endsection