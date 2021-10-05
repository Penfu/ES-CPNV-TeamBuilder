<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Teambuilder</title>
</head>

<body>

    <head>
        <link rel="stylesheet" href="/css/home.css">
    </head>

    <div id="hero">
        <h1>Teambuilder</h1>
        <p>Connecté en tant que: <?= $_SESSION['userLog']->name ?></p>
    </div>
</body>

</html>