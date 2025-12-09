<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <header>
            <div class="logo"><img src={{asset("bp360logo.png")}}></div>
            <nav>
                <a href="#">NÉPSZERŰ</a>
                <a href="#">ÉTTERMEK</a>
                <a href="#">LÁTNIVALÓK</a>
                <a href="#">ÉJSZAKAI ÉLET</a>
                <a href="#">SZÁLLÁSOK</a>
                <a href="#">BEVÁSÁRLÓKÖZPONTOK</a>
                <a href="#">KULTÚRA</a>
                <a href="#">EGYÉB</a>
                <div class="buttons">
                    <button class="btn-signin buttons">BELÉPEK!</button>
                    <button class="btn-register buttons">REGISZTRÁLOK!</button>
                </div>
            </nav>
        </header>
    </div>
</body>

</html>