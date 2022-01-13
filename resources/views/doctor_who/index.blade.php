<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Who</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<section class="wrapper">
    <div class="container">
        <h1>Доктор кто:</h1>
        <div class="row">
            @foreach ($seasons as $season)
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
            @endforeach
            <div class="col-md-2 padding-top-bottom-15">
                <div class="card hoverable text-white card-has-bg click-col">
                    <div class="card-img-overlay d-flex flex-column">
                        <i style="font-size: xx-large; align-self: center; padding-top: 100px;">Добавить</i>
                        <a href="/doctor_who/create" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
