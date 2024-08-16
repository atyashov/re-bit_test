{{--@section('title')@parent:: Send Application@endsection--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отправить заявку</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Отправьте заявку</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/application" method="post" class="form-horizontal">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Ваше Имя</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name')  }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="lastname">Фамилия</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="surname">Отчество</label>
                    <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname')  }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone')  }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="text">Текст заявки</label>
                    <textarea class="form-control" name="text">
                        {{ old('text') }}
                    </textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Отправить заявку</button>

    </form>
</div>
</body>
</html>


