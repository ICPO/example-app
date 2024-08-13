<h1>Список проектов</h1>
<a href="{{route('projects.create')}}">Создание проекта</a>
<div class="mt-5">
    @foreach($projects as $project)
        <div>
            <h2>{{ $project['id'] }} - {!! $project['title'] !!} - <a href="{{ route('projects.show',$project['id']) }}">Подробнее</a></h2>
        </div>
    @endforeach
</div>

