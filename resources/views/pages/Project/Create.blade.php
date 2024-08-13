<h1>Создание проекта</h1>
<a href="{{\Illuminate\Support\Facades\URL::previous()}}">Назад</a>
<div class="mt-5">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <input type="text" value="" placeholder="Название проекта">

            <input type="submit" value="Создать">
        </form>
</div>

