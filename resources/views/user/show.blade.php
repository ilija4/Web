<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seasons</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<section class="wrapper">
    <div class="container">
        <h1>Список сезонов пользователя {{ $user->name }}</h1>
        <div class="row">
            @forelse ($seasons as $season)
                <div class="col-md-2 padding-top-bottom-15">
                    <div class="card hoverable text-white card-has-bg click-col" style="background-image:url({{ asset('/images/'.$season->poster_url) }});">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <a class="stretched-link" href="/doctor_who/{{ $season->id }}"><h4>{{ $season->season }} сезон<br></h4></a>
                                <i>Год выпуска: {{ $season->year }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @cannot('add', $user->id)
                    <span>Не найдено сезонов пользователя {{ $user->name }}</span>
                @endcannot
            @endforelse
            @can('add', $user->id)
                <div class="col-md-2 padding-top-bottom-15">
                    <div class="card hoverable text-white card-has-bg click-col">
                        <div class="card-img-overlay d-flex flex-column">
                            <i style="font-size: xx-large; align-self: center; padding-top: 100px;">Добавить</i>
                            <a href="/doctor_who/create" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        @can('restore-or-full-delete')
            <h1>Список удаленных сезонов</h1>
            @forelse ($deleted_seasons as $season)
                <div class="col-md-2 padding-top-bottom-15">
                    <div class="card hoverable text-white card-has-bg click-col" style="background-image:url({{ asset('/images/'.$season->poster_url) }});">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <form action="/doctor_who/{{ $season->id }}/restore" method="POST">
                                    @csrf
                                    <button style="color: transparent; background-color: transparent; border: none;" class="stretched-link"></button>
                                </form>
                                <h4>{{ $season->season }} сезон<br></h4>
                                <i>Год выпуска: {{ $season->year }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <b>Не найдено удаленных выпусков Grand Tour</b>
            @endforelse
        @endcan
    </div>
</section>
</body>
</html>
