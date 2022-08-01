<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Icarus</title>
        <link rel="stylesheet" type="text/css" href="../css/app.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>

        <script src="../js/app.js"></script>
    </body>
</html>
