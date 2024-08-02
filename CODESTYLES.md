# Соглашения по написанию кода

**[Демо-приложение](https://github.com/rsukhar/app-example/)** — Пример приложения Laravel + Vue + InertiaJS

# Содержание
1. **[Общие соглашения](#1-общие-соглашения)**
2. **[Соглашения по написанию Backend-кода](#2-соглашения-по-написанию-backend-кода)**
3. **[Соглашения по написанию Frontend-кода](#3-соглашения-по-написанию-frontend-кода)**


## 1. **Общие соглашения**

### 1.1. Мы пишем человекочитаемый код

Мы знаем, что код гораздо чаще читают, чем пишут. Поэтому мы делаем его понятным и прозрачным для будущих читателей.

Переменные, методы и классы мы именуем так, чтобы код был максимально приближен к описанию на человеческом языке, чтобы дальше можно было мысленно вербализировать код в голове. Для этого мы формируем код по лексическим правилам языка: чтобы при прочтении это звучало максимально приближенно к человеческому словесному описанию.

#### 1.1.1. Функции и методы мы начинаем с глаголов

Функции и методы описывают действие, поэтому их названия мы начинаем с глаголов:

```php
// Правильно
function getLeadsCount()

// Неправильно
function leadsCount()
```

#### 1.1.2. Функции для получения булева значения (true/false) мы начинаем с is/has

Обычно используется is:

```php
// Правильно
function isEditable()
function hasChildren()

// Неправильно
function editable()
function children()
```

#### 1.1.3. Переменные мы именуем в соответствии с их сутью в бизнес-логике

Если мы создаем единственный инстанс класса в рамках определенного контекста (например, функции), то он должен называться так же, как и класс (название модели):

```php
// Правильно
$shop = Shop::find($id);

// Неправильно
$magazin = Shop::find($id);
$currentShop = Shop::find($id);
```

Если в рамках одного контекста мы создаем несколько инстансов одного класса, то их названия должны отличаться и точно отражать роль каждого инстанса:

```php
// Правильно
$firstNode = Node::find($firstNodeId);
$lastNode = Node::find($lastNodeId);

// Неправильно
$node = Node::find($firstNodeId);
$node2 = Node::find($lastNodeId);
```

#### 1.1.4. В рамках одного контекста мы сохраняем консистентность в именовании переменных

Мы не допускаем появления синонимов. Если это одно и то же, то и должно называться одинаково.

```php
// Правильно
foreach ($errors as $error)

// Неправильно
foreach ($errors as $myError)
foreach ($errors as $item)
```

#### 1.1.5. Мы сохраняем такой порядок элементов, чтобы соответствовал лексике англоязычного предложения
"if variable equals value"

```php
// Правильно
if ($var === 12)
if ($var === null)

// Неправильно
if (12 === $var)
if (is_null($var))
```

#### 1.1.6. Если можно прописать аргументы метода явно, мы прописываем их явно

А не упаковываем в массив/DTO передачи набора аргументов:

```php
// Правильно
public function move(int $targetId, string $relation): bool
{

}

// Неправильно
public function move(array $data): bool
{
    $targetId = $data['targetId'];
    $relation = $data['relation'];
}
```

### 1.2. Мы упрощаем код

#### 1.2.1. Мы сохраняем сквозное именование переменных

Одни и те же значения могут проходить через несколько этапов сущностей, например: (а) поле в базе данных; => (б) поле в модели; => (в) поле в DTO; => (г) переменная в контроллере; => (д) переменная в View.

Если в разных контекстах речь идет про одно и то же фактическое значение в рамках одного и того же контекста, то и называться они должны везде одинаково.

[🔝 Наверх](#содержание)


## **2. Соглашения по написанию Backend-кода**

### 2.1. Мы поддерживаем единый стиль кода

За основу стиля PHP-кода мы берем PSR-12 и общий гайдлайн Laravel. Стиль кода уже прописан в .editorconfig-файле репозитория.

Качество кода, который коммитим, мы проверяем и поддерживаем встроенными в проект анализаторами. Для удобства мы настраиваем IDE для автоматической проверки качества кода в фоновом режиме.

Выполняя определенную задачу, мы НЕ исправляем кодстайл того кода, который не относится к этой задаче.

### 2.2. Мы пишем в коде достаточно комментариев

Мы хотим, чтобы на любой фрагмент кода можно было посмотреть и сразу понять, зачем этот код нужен, что и как он делает.

#### 2.2.1. Мы пишем комментарии на русском языке

Читать их будут только русскоязычные разработчики, и им проще и быстрее воспринимать русские комментарии, чем английские.

#### 2.2.2. К каждому классу кастомной сущности (например, API) мы пишем комментарий, объясняющий, для чего нужен этот класс

Пример

👍 Правильно
```php
/**
 * Класс для работы с API CloudFlare.
 * 
 * @docs https://suhar.teamly.ru/...
 */ 
class CloudFlareApi
{
    ...
}
```

#### 2.2.3. У всех атрибутов классов с нестандартным форматом мы описываем этот формат

Пример

👍 Правильно
```php
/** 
 * @var array В формате [[id: ..., names: [...], models: [[id: ..., names: ...]]], ...] 
 */ 
protected array $vendorModelNames;
```

#### 2.2.4. Для всех методов мы описываем phpDoc - для чего нужен этот метод, формат параметров, возвращаемого значения и исключений (при необходимости), а также указываем тип возвращаемого значения. 

Для удобства пользуйтесь подсказками в IDE для автоматической генерации phpDoc.

Пример

👍 Правильно
```php
/** 
 * Удалить упоминаемые названия из строки с сохранением правильного форматирования строки 
 * 
 * @param string|array $regex 
 * @param string $string 
 * @param int $limit Максимальное число замен 
 * 
 * @return string 
 */ 
protected function stripNames(string|array $regex, string $string, int $limit = 1): string
{
    ...
}
```

### 2.3. Мы сохраняем простоту кода

#### 2.3.1. Мы не создаем избыточные геттеры/сеттеры атрибутов класса

Мы не создаем отдельные методы для получения/установки атрибута класса, если только для получения/установки не требуется дополнительных действий.

Примеры

👎 Неправильно
```php
class myClass {
    protected string $myAttr;
    
    public function getMyAttr() {
        return $this->myAttr;
    }
    
    public function setMyAttr($value) {
        $this->myAttr = $value;
    }
}

$myClass = new myClass;
$myClass->setAttr('value');
$attr = $myClass->getAttr();
```

👍 Правильно
```php
class myClass {
    protected string $myAttr;
}

$myClass = new myClass;
$myClass->attr = 'value';
$attr = $myClass->attr;
```

#### 2.3.2. Мы используем транзакции БД только когда это необходимо

Т.е. когда есть 2 или более запросов к базе данных, и невыполнение второго или последующих запросов нарушит консистентность данных.

Примеры

👎 Неправильно
```php
// Запрос только один
DB::transaction(function() use ($data) {
    $this->fill($data)->save();
});
```

👍 Правильно
```php
$this->fill($data)->save();
```

#### 2.3.3. Если в контроллере в ресурсном методе предполагается только лишь операция вставки/обновления/удаления, мы используем стандартные методы прямо в контроллере, а не создаем дублирующие методы в модели.

Пример: Создание объекта

👎 Неправильно
```php
public function store(StoreArticleRequest $request): RedirectResponse
{
    (new Article())->storeData($request->validated());
}

class Article extends Model
{
    public function storeData(array $data): static
    {
        return $this->fill($data)->save();
    }
}
```

👍 Правильно
```php
public function store(StoreArticleRequest $request): RedirectResponse
{
    Article::create($request->validated());
}
```

Пример: Обновление объекта

👎 Неправильно
```php
public function update(UpdateArticleRequest $request, int $id): RedirectResponse
{
    $article = Article::findOrFail($id);
    $article->updateData($request->validated());
}

class Article extends Model
{
    public function updateData(array $data): static
    {
        return $this->fill($data)->save();
    }
}
```

👍 Правильно
```php
public function update(UpdateArticleRequest $request, int $id): RedirectResponse
{
    $article = Article::findOrFail($id);
    $article->update($request->validated());
}
```

При этом если предполагается дополнительная логика, то мы эти операции выносим в в модель.

👍 Правильно
```php
public function update(UpdateArticleRequest $request, int $id): RedirectResponse
{
    $article = Article::findOrFail($id);
    $article->updateData($request->validated());
}

class Article extends Model
{
    public function updateData(array $data): void
    {
        match($data['status']) {
            'active' => $this->start($data),
            'stopped' => $this->stop($data),
            default => $this->fill($data)->save()
        };
        
        ...
    }
}
```

#### 2.3.4. Всю бизнес логику мы выносим в сервисные классы

При этом все методы делаем статическими, а методы, которые должны иметь доступ к контексту объекта, выносим в модели

👎 Неправильно
```php
public function store(Request $request)
{
    if ($request->hasFile('image')) {
        $request->file('image')->move(public_path('images') . 'temp');
    }
    ...
}
```

👍 Правильно
```php
public function store(Request $request)
{
    ArticleService::handleUploadedImage($request->file('image'));
    ...
}

class ArticleService
{
    public static function handleUploadedImage($image): void
    {
        if (!is_null($image)) {
            $image->move(public_path('images') . 'temp');
        }
    }
}
```

### 2.4. Мы соблюдаем правильные логические уровни

#### 2.4.1. Значения, которые могут изменяться в зависимости от окружения, мы выносим в ENV-переменные

Примеры

👎 Неправильно
```php
// config/integrations.php
'some_service_token' => 'o8a7ego82aiugliea78dwtaa',
```

👍 Правильно
```php
// .env
SOME_SERVICE_TOKEN='o8a7ego82aiugliea78dwtaa'

// config/integrations.php
'some_service_token' => env('SOME_SERVICE_TOKEN'),
```

#### 2.4.2. При этом мы никогда не используем ENV-переменные напрямую

Т.к. на продакшене используется кешированный конфиг.

Примеры

👎 Неправильно
```php
new SomeService(env('SOME_SERVICE_TOKEN');
```

👍 Правильно
```php
new SomeService(config('integrations.some_service_token'));
```

#### 2.4.3. Мы создаем «тонкие» контроллеры и «толстые» модели, перенося действия над данными в модели

Чтобы при необходимости в будущем выполнять те же действия над данными из других контроллеров, задач, API и сервисов.

Примеры

👎 Неправильно
```php
public function index()
{
    $clients = Client::verified()
        ->with(['orders' => function ($q) {
            $q->where('created_at', '>', Carbon::today()->subWeek());
        }])
        ->get();

    return view('index', ['clients' => $clients]);
}
```

👍 Правильно
```php
public function index()
{
    return view('index', ['clients' => $this->client->getWithNewOrders()]);
}

class Client extends Model
{
    public function getWithNewOrders(): Collection
    {
        return $this->verified()
            ->with(['orders' => function ($q) {
                $q->where('created_at', '>', Carbon::today()->subWeek());
            }])
            ->get();
    }
}
```

#### 2.4.4. Мы выносим валидацию из контроллеров в Request-классы

Примеры

👎 Неправильно
```php
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
        'publish_at' => 'nullable|date',
    ]);
    ...
}
```

👍 Правильно
```php
public function store(PostRequest $request)
{
    ...
}

class PostRequest extends Request
{
    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ];
    }
}
```

#### 2.4.5. Формат передачи данных из контроллера в шаблон мы описываем явно в контроллере 

Чтобы лишние данные, которые не должны быть доступны в компоненте, не передавались. Resource-классы не используем ввиду их чрезмерной усложненности и адаптированности к выводу в REST API (у нас монолит).

Примеры

👎 Неправильно
```php
public function show(Comment $comment)
{
    return Inertia::render('Comment/Show', [
        'comment' => $comment,
    ]);
}
```

👍 Правильно
```php
public function show(Comment $comment)
{
    return Inertia::render('Comment/Show', [
        'comment' => $comment->only([
            'id' => $this->id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'body' => $this->body,
        ]),
    ]);
}
```

[🔝 Наверх](#содержание)


## 3. **Соглашения по написанию Frontend-кода**

### 3.1. Мы поддерживаем единый стиль кода

За основу мы берем ESLint / Vue3 стандарты, которые уже поддерживаются встроенными в проект анализаторами. Пожалуйста, настройте IDE для автоматической проверки качества кода в фоновом режиме.

### 3.2. Мы придерживаемся стандарта именования и расположения файлов

#### 3.2.1 /js/app.js - Входная точка Vue-приложения
#### 3.2.2 /js/helpers.js - Библиотека вспомогательных самописных функций
#### 3.2.3 /css/app.scss - Файл с глобальными (общими) стилями. Стили, которые применимы только для конкретного Vue-компонента необходимо описывать в <style scoped> внутри компонента
#### 3.2.4 /css/helpers.scss - Файл со вспомогательными классами отступов для общего применения
#### 3.2.5 /css/variables.scss - Файл с переменными (см. п.3.3.1)
#### 3.2.6 /views/app.blade.php - Входной шаблон Laravel
#### 3.2.7 /views/blocks/**.vue - Файлы вспомогательных компонентов
#### 3.2.8 /views/layouts/**.vue - Файлы шаблонов страниц (например, Layout.vue, Header.vue, Footer.vue)
#### 3.2.9 /views/pages/${sectionName}/**.vue - Файлы Vue-компонентов страниц с разделением по названию разделов. Одна страница - один компонент (например, /User/Index.vue, /User/Create.vue, /User/Edit.vue, /User/Show.vue)

### 3.3. По возможности мы используем уже готовые компоненты - PrimeVue, PrimeBlocks, PrimeIcons

#### 3.3.1. Цвета и особенности стиля мы задаем существующими переменными

Мы используем CSS-переменные из файла с переменными, а не хардкодим значения.
```css
/* Правильно */
background-color: var(--red);

/* Неправильно */
background-color: #ea524a;
```

[🔝 Наверх](#содержание)
