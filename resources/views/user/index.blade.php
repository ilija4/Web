<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<section class="wrapper">
    <div class="container">
        <div class="d-flex">
            <h1>Текущий пользователь: {{ Auth::user()->name }}</h1>
            <form style="padding-left: 1000px;" method="POST" action="{{ route('logout') }}">
                @csrf
                <x-button :href="route('logout')" class="btn btn-danger ml-2"
                          onclick="event.preventDefault();
                              this.closest('form').submit();">Выйти
                </x-button>
            </form>
        </div>
        <h1 style="padding-left: 570px; padding-top: 200px;">Список пользователей:</h1>
        <div style="padding-left: 520px;">
            @forelse ($users as $user)
                <a href="/users/{{ $user->name }}" type="button" style="width: 30%;" class="btn btn-primary">{{ $user->name }}</a><br>
            @empty
            @endforelse
        </div>
    </div>
</section>
</body>
</html>
