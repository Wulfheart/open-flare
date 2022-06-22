@props(['tab' => config('app.name')])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tab }}</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="min-h-screen bg-gray-200">
    {{ $slot }}
</body>
</html>