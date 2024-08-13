<h1>Редактирование проекта</h1>
<a href="{{\Illuminate\Support\Facades\URL::previous()}}">Назад</a>
<div class="mt-5">
    @if(!$projectModel)
        <div>
            <h2>Такого проекта не существует</h2>
        </div>
    @else
        <form action="{{ route('projects.update',$projectModel['id']) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="text" value="{{$projectModel['title']}}">

            <input type="submit" value="Обновить">
        </form>
    @endif

</div>

