# Тест на знание основ laravel

Репозиторий служит целью проверки знаний основ фреймворка laravel, в рамках тем указанных в roadmap здесь:
[CutCode Junior Roadmap](https://cutcode.ru/roadmap)

[Видео инструкции](https://youtube.com)

Цель создания такого тестирования было охватить базовые разделы laravel и научиться на практике покрывать тестами проект на laravel.

# Оглавление по темам
1. [Миграции](#task-migrations)
2. [Маршрутизация](#task-route)
3. [Blade template](#task-blade)
4. [Eloquent model](#task-model)
5. [Валидация](#task-validation)
6. [Аутентификация](#task-auth)

Для начала необходимо развернуть проект на котором будут выполняться тесты.

# Установка
- `composer install`
- `php artisan key:generate`
- .env с реквизитами mysql базы данных
- КРАЙНЕ ВАЖНО ЧТОБЫ БАЗА ДАННЫХ НАЗЫВАЛАСЬ laravel_skill_test

# Потребуется
- php >= 7.3
- mysql

# Проверка
- `php artisan test --filter MigrationsTest`
- `php artisan test --filter RouteTest`
- `php artisan test --filter BladeTest`
- `php artisan test --filter ModelTest`
- `php artisan test --filter ValidationTest`
- `php artisan test --filter AuthTest`
- `php artisan test`


# Инструкции
Искать задачи можно по фильтру TODO в IDE (игнорируя директорию /storage), либо по списку заданий

# Подтверждение выполнения теста
PR в ветку master (автоматически запустит тест проверки)

# Задания

## 1) Миграции <a name="task-migrations"></a>
Все задания находятся здесь `database/migrations/tasks`
- Тесты `tests/Feature/MigrationsTest.php`
- Запуск `php artisan test --filter MigrationsTest`

---
#### Задание 1: Новая таблица
Создать в базе данных таблицу categories с 2 полями id и title (не забыть про timestamps)

---
#### Задание 2: Nullable
Для title указать что значение по умолчанию NULL

---
#### Задание 3: Значение по умолчанию
Для active указать что значение по умолчанию TRUE

---
#### Задание 4: Soft Deleting
Добавить функционал soft delete

---
#### Задание 5: Timestamps
Добавить поля с timestamps (created_at, updated_at) через 1 метод

---
#### Задание 6: Новое поле с указанием порядка
Добавить поле description типа text (DEFAULT NULL) ПОСЛЕ поля title

---
#### Задание 7: Проверка наличия поля
Сделать провеку на наличие поля active и в случаи успеха добавить поле main (boolean default false)

---
#### Задание 8: Переименовать поле
Переименовать поле title в name

---
#### Задание 9: Переименовать таблицу
Переименовать таблицу posts в articles

---
#### Задание 10: belongsToMany
Добавить таблицу для связи articles и categories (belongsToMany) c foreign ключами

---
## 2) Маршрутизация (Route) <a name="task-route"></a>
Все задания находятся здесь `routes/web.php` и `routes/api.php`
- Тесты `tests/Feature/RouteTest.php`
- Запуск `php artisan test --filter RouteTest`

---
#### Задание 1: View
По GET урлу /hello отобразить view - /resources/views/hello.blade (без контроллера)

---
#### Задание 2: Controller
По GET урлу / обратиться к IndexController, метод index

---
#### Задание 3: View с наименованием роута
По GET урлу /page/contact отобразить view - /resources/views/pages/contact.blade
с наименованием роута - contact

---
#### Задание 4: Параметры
По GET урлу /users/[id] обратиться к UserController -> метод show
без Route Model Binding. Только параметр id

---
#### Задание 5: Model Binding
По GET урлу /users/bind/[user] обратиться к UserController -> метод showBind
но в данном случае используем Route Model Binding. Параметр user

---
#### Задание 6: Редирект
Выполнить редирект с урла /bad на урл /good

---
#### Задание 7: Resource controller
Добавить роут на ресурс контроллер - UserCrudController с урлом - /users_crud

---
#### Задание 8: Группировка
Организовать группу роутов (Route::group()) объединенных префиксом - dashboard

---
#### Задание 9: Группировка подзадачи
Добавить роут GET /admin -> Admin/IndexController -> index

---
#### Задание 10: Группировка подзадачи
Добавить роут POST /admin/post -> Admin/IndexController -> post

---
#### Задание 11: Middleware
Организовать группу роутов (Route::group()) объединенных префиксом - security и мидлваром auth

---
#### Задание 12: Middleware подзадачи
Добавить роут GET /admin/auth -> Admin/IndexController -> auth

---
#### Задание 13: ApiResource (routes/api.php)
Добавить apiResource контроллер - Api/V1/UserController
- Префикс урла должен быть /api/v1
- Полный урл /api/v1/users (не забывайте что это api routes)

## 3) Blade template <a name="task-blade"></a>
- Тесты `tests/Feature/BladeTest.php`
- Запуск `php artisan test --filter BladeTest`

---
#### Задание 1: Передать данные во view
`Http/Controllers/IndexController.php`
Передайте users во view (название ключа users)

---
#### Задание 2: Layout
`resources/views/table.blade.php`
Изменить реализацию этой view, расширить ее с использованием layout

---
#### Задание 3: Include
`resources/views/layouts/app.blade.php`
Подключите view с меню shared/menu.blade.php

---
#### Задание 4: Auth
`resources/views/auth.blade.php`
Сделать проверку авторизован пользователь или нет.
Если да то вывести ID пользователя.
ID пользователя вывести внутри конструкции с проверкой

---
#### Задание 5: Component
`resources/views/welcome.blade.php`
Сделать blade component с названием HelloWorld с содержимым во view - Текущая дата в формате Y-m-d.
- Обязательное условие добавить регистрацию компонента в AppServiceProvider и изменить его alias на hello
- В итоге alias - hello а класс компонента App\View\Components\HelloWorld
- Вывести его в указаном месте

---
#### Задание 6: Each
`resources/views/table.blade.php`
В эту view с контроллера передается collection c users в переменной data.
- Выполнить foreach loop в одну строку (специальная директива)
- Используйте view shared/user.blade.php для item (переменная user во item view)
- Используйте view shared/empty.blade.php для состояния когда нет элементов

---
#### Задание 7: ForEach
`resources/views/table.blade.php`
Здесь сделайте классический foreach loop
- Выведите div с $user->name
- Воспользуйтесь переменной $loop и у нечетных div выведите класс - `bg-red-500`

## 4) Eloquent Models <a name="task-model"></a>
- Тесты `tests/Feature/ModelTest.php`
- Запуск `php artisan test --filter ModelTest`

---
#### Задание 1: Таблица
`Models/Item.php`
Указать что таблица у модели - products

---
#### Задание 2: Basic query
`Http/Controllers/EloquentController.php`
С помощью модели Item реализовать запрос
- `select * from products where active = true order by created_at desc limit 3`

---
#### Задание 3: Scopes
`Http/Controllers/EloquentController.php`
Добавить в модель Item scope для фильтрации активных продуктов (scopeActive())

---
#### Задание 4: 404
`Http/Controllers/EloquentController.php`
Найти пользователя по id и передать во view либо отдать 404 страницу

---
#### Задание 5: Create
`Http/Controllers/EloquentController.php`
Выполнить простое добавление новой записи

---
#### Задание 6: Update
`Http/Controllers/EloquentController.php`
Выполнить простое обновление записи

---
#### Задание 7: Delete
`Http/Controllers/EloquentController.php`
Выполнить массовое удаление записей


## 5) Валидация <a name="task-validation"></a>
- Тесты `tests/Feature/ValidationTest.php`
- Запуск `php artisan test --filter ValidationTest`

---
#### Задание
`Http/Requests/ItemStoreRequest.php`
Добавить правила валидации для поля title
- Поле обязательно
- Строковое
- Минимам 5 символов
- Максимум 15 символов

## 6) Аутентификация <a name="task-auth"></a>
- Тесты `tests/Feature/AuthTest.php`
- Запуск `php artisan test --filter AuthTest`

---
#### Задание
`Policies/ItemPolicy.php`
Разрешить добавление продуктов только пользователю с id = 10

# Возникли сложности

Есть предложения? Возникли какие-либо проблемы? Не стестняйтесь и пишите GitHub Issues.

Желаю всем удачи!
