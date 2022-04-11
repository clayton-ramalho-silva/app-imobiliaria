<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$subtitulo}}</h1>
    <ul>
        @forelse ($cidades as $cidade)
            <li>{{ $cidade }}</li>
        @empty
            <li>Não há cidades cadastradas</li>
        @endforelse
    </ul>
</body>
</html>