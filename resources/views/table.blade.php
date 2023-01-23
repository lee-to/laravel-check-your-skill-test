<!-- TODO Blade Задание 2: Изменить реализацию этой view, расширить ее с использованием layout  -->
<!-- layouts/app.blade.php  -->
@extends('layouts/app');


<!-- TODO Blade Задание 6: В эту view с контроллера передается collection c users в переменной data -->
<!-- Выполнить foreach loop в одну строку -->
<!-- Используйте view shared/user.blade.php для item (переменная user во item view) -->
<!-- Используйте view shared/empty.blade.php для состояния когда нет элементов в колекции -->

@if( count($data) === 0)
    @include('shared.empty');
@else
    @include('shared.user');
@endif

{{--@foreach($data['users'] as $user)--}}

{{--@endforeach--}}




<!-- TODO Blade Задание 7: Здесь сделайте классический foreach loop -->
<!-- Выведите div с $user->name -->
<!-- Воспользуйтесь переменной $loop и у нечетных div выведите класс - bg-red-500 -->


@foreach($data as $user)
    <!-- Выведите div с $user->name -->
    <div @if($loop % 2 == 1) class="bg-red-500" @endif>
        {{$user->name}}
    </div>
@endforeach
