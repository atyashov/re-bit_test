<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Список заявок</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Список заявок</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ФИО</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Текст заявки</th>
                </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>
                        {{$application->contact->lastname}} {{ $application->contact->name }} {{ $application->contact->surname }}
                    </td>
                    <td>
                        {{ $application->phone }}
                    </td>
                    <td>
                        {{ $application->text }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
