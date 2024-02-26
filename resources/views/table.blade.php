<!-- TODO Blade Задание 2: Изменить реализацию этой view, расширить ее с использованием layout  -->
<!-- layouts/app.blade.php  -->

@extends('layouts.app')

<!-- TODO Blade Задание 6: В эту view с контроллера передается collection c users в переменной data -->
<!-- Выполнить foreach loop в одну строку -->
<!-- Используйте view shared/user.blade.php для item (переменная user во item view) -->
<!-- Используйте view shared/empty.blade.php для состояния когда нет элементов в колекции -->


@forelse($data as $item)
    @include('shared/user', ['user' => $item])
@empty
    @include('shared/empty')
@endforelse




<!-- TODO Blade Задание 7: Здесь сделайте классический foreach loop -->
<!-- Выведите div с $user->name -->
@foreach($data as $user)
    <div class="{{ $loop->even ? 'bg-red-500' : '' }}">{{ $user->name }}</div>
@endforeach
