<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $season->season }} сезон</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <section class="wrapper">
        <div class="container">
                <div class="col-md-2 padding-top-bottom-15" style="padding-left: 500px;">
                    <div class="card hoverable text-white card-has-bg click-col">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <h5 >{{ $season->season }} сезон</h5>
                                <p>Номер доктора: {{ $season->doctorNumber }}</p>
                                <p>Год выпуска: {{ $season->year }}</p>
                                <a href="/doctor_who/{{ $season->id }}/edit" type="button" class="btn btn-primary">Редактировать</a>
                                <form style="padding-top: 20px;" action="/doctor_who/{{ $season->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</body>
