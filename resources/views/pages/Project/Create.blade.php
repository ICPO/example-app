@extends('layouts.base')
@section('page.title',__("Создание проекта"))

@section('content')
<div class="mt-5">

    <h1>Создание проекта</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('projects.index')}}">Проекты</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__("Создание проекта")}} </li>
        </ol>
    </nav>

    <x-project-form action="{{ route('projects.store') }}" method="POST" class="col-md-4">
        <div class="mb-3">
            <label for="title" class="form-label">{{__("Заголовок проекта")}}</label>
            <input type="text" class="form-control" placeholder="{!! __("Например, Проект 1") !!}}">
        </div>


        <button type="submit" class="btn btn-primary">{{__("Обновить")}}</button>
    </x-project-form>
</div>

@endsection