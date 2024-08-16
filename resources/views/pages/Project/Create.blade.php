@extends('layouts.base')
@section('page.title',__('Создание проекта'))

@section('content')
    <div class="row">
        <div class="mt-5 col-md-4 offset-md-4">

            <h1>{{__('Создание проекта')}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('projects.index')}}">{{__('Проекты')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Создание проекта')}} </li>
                </ol>
            </nav>

            <x-project-form action="{{ route('projects.store') }}" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">{{__('Заголовок проекта')}}</label>
                    <input type="text" class="form-control" name="title" placeholder="{!! __('Например, Проект 1') !!}"
                           value="{{old('title')}}">
                    <x-form-error name="title"/>
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">{{__('Владелец проекта')}}</label>
                    <select class="form-select" name="owner_id">
                        <option selected disabled>{{__('Не выбрано')}}</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" @if(old('owner_id') == $user->id) selected @endif>{{$user->username}}</option>
                        @endforeach
                    </select>
                    <x-form-error name="owner_id"/>

                </div>
                <div class="mb-3">
                    <label for="assignee_id" class="form-label">{{__('Ответственный за проект')}}</label>
                    <select class="form-select" name="assignee_id">
                        <option selected disabled>{{__('Не выбрано')}}</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" @if(old('assignee_id') == $user->id) selected  @endif>{{$user->username}}</option>
                        @endforeach
                    </select>
                    <x-form-error name="assignee_id"/>
                </div>

                <div class="mb-3">
                    <label for="deadline_date" class="form-label">{{__('Дата сдачи проекта')}}</label>
                    <input type="date" class="form-control" name="deadline_date" value="{{old('deadline_date')}}">
                    <x-form-error name="deadline_date"/>
                </div>

                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" name="is_active" @if(old('is_active')) checked @endif>
                    <label class="form-check-label">
                        {{__('Проект активен')}}
                    </label>
                    <x-form-error name="is_active"/>
                </div>

                <button type="submit" class="btn btn-primary">{{__('Обновить')}}</button>
            </x-project-form>
        </div>
    </div>


@endsection