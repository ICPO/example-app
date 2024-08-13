<h1>Информация по проекту</h1>
<a href="{{route('projects.index')}}">На страницу проектов</a>
<div class="mt-5">
    @if(!$projectModel)
        <div>
            <h2>Такого проекта не существует</h2>
        </div>
    @else
        <div>
            <h2>
                {{ $projectModel['id'] }} - {!! $projectModel['title'] !!} - <a href="{{route('projects.edit',$projectModel['id'])}}">Редактировать</a>
            </h2>
        </div>
    @endif

</div>

