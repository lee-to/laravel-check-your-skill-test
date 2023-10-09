<!-- TODO Blade Задание 2: Изменить реализацию этой view, расширить ее с использованием layout  -->
<!-- layouts/app.blade.php  -->
@extends('layouts.app')

<!-- TODO Blade Задание 6: В эту view с контроллера передается collection c users в переменной data -->
<!-- Выполнить foreach loop в одну строку -->
@each('shared.user', $data, 'user', 'shared.empty')

@foreach($data as $user)
    <div {{ $loop->index % 2 == 1 ? 'class="bg-red-500"' : ''}}>{{ $user->name }}</div>
@endforeach


