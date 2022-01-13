<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Grand Tour</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<section class="wrapper">
    <form action="/doctor_who/{{ $season->id }}" method="post">
        @method('PATCH')
            <div class="form-group">
                <label>Номер сезона</label>
                <input id="season" type="number" name="season" class="form-control" required="required" value="{{ $season->season }}">
            </div>
            <div class="form-group">
                <label>Номер доктора</label>
                <input id="doctorNumber" type="number" name="doctorNumber" class="form-control" required="required" value="{{ $season->doctorNumber }}">
            </div>
            <div class="form-group">
                <label>Год выпуска</label>
                <input id="year" type="number" name="year" class="form-control" required="required" value="{{ $season->getYear() }}">
            </div>
            <div style="padding-top: 20px;">
                <input class="custom-file-input" id="poster_url" type="file" name="poster_url">
            </div>
            @csrf
                <div style="padding-top: 20px;">
                    <button type="submit" class="btn btn-success btn-send pt-2 btn-block">
                        Сохранить
                    </button>
                </div>
        </div>
    </form>
</section>
</body>
</html>
