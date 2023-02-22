<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        RoyalCut
    </title>
    <link rel="icon" type="img/png" href="./build/img/favicon.webp">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>

    <?php
    echo $script ?? "";
    ?>

</body>

</html>