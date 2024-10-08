<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title',config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<div class="container">
    @if (session()->has('alertMessage') && session()->has('alertType'))
        <x-alert type="{{session()->get('alertType')}}" title="{{__('Уведомление')}}">
            {{session()->get('alertMessage')}}
        </x-alert>
    @endif
    @yield('content')
</div>
@include('layouts.footer')
</body>
</html>