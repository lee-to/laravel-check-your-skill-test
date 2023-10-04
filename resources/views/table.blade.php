<!-- TODO Blade Задание 2: Изменить реализацию этой view, расширить ее с использованием layout  -->
<!-- layouts/app.blade.php  -->
@extends('layouts.app')

<!-- TODO Blade Задание 6: В эту view с контроллера передается collection c users в переменной data -->
<!-- Выполнить foreach loop в одну строку -->
@forelse($data as $user)
<!-- Используйте view shared/user.blade.php для item (переменная user во item view) -->
@include('shared.user')
<!-- Используйте view shared/empty.blade.php для состояния когда нет элементов в колекции -->
@empty
    @include('shared.empty')
@endforelse

<!-- TODO Blade Задание 7: Здесь сделайте классический foreach loop -->
<!-- Выведите div с $user->name -->
<!-- Воспользуйтесь переменной $loop и у нечетных div выведите класс - bg-red-500 -->
@foreach ($data as $user)
    @if ($loop->odd)
        <div class="bg-red-500">
            {{$user->name}}
        </div>
    @else
        <div>
            {{$user->name}}
        </div>
    @endif
@endforeach
