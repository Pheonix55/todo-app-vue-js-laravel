<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Todo App | vue</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div id="app">
        <div id="app"></div> 
    </div>
</body>

</html>
