<!-- TODO Blade Задание 4: Сделать проверку авторизован пользователь или нет -->
<!-- Если да то вывести ID пользователя -->
<!-- ID пользователя вывести внутри конструкции с проверкой -->
@if(Auth::user())
    {{Auth::user()->id}}
@endif
