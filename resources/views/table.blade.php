<!-- TODO Blade Задание 2: Изменить реализацию этой view, расширить ее с использованием layout  -->
<!-- layouts/app.blade.php  -->
@extends('layouts.app')
{{--@include()--}}

<!-- TODO Blade Задание 6: В эту view с контроллера передается collection c users в переменной data -->
<!-- Выполнить foreach loop в одну строку -->
@forelse($data as $item)
<!-- Используйте view shared/user.blade.php для item (переменная user во item view) -->
    @include('shared.user')
@empty
<!-- Используйте view shared/empty.blade.php для состояния когда нет элементов в колекции -->
    @include('shared.empty')
@endforelse

<!-- TODO Blade Задание 7: Здесь сделайте классический foreach loop -->
@foreach($data as $user)
<!-- Выведите div с $user->name -->
    <div @if($loop % 2 == 1) class="bg-red-500" @endif>
        {{$user->name}}
    </div>
<!-- Воспользуйтесь переменной $loop и у нечетных div выведите класс -  -->

@endforeach
