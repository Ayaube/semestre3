<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC3 de Marouane</title>
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding: 50px;
        }

        footer {
            text-align: center;
            background-color: #f1f1f1;
            padding: 10px;
        }

        header {
            background-color: #f1f1f1;

        }
    </style>
</head>

<body>
<header>
    <div style="text-align: center;">
        <h1>MVC3 de Marouane</h1>
    </div>
    
</header>

<main>
    <?php $menuComponent->affiche(); ?>
    <?php echo $contenuModule; ?>
</main>

<footer>
    <p>Marouane Irhbira / Page propulsé par mirhbira</p>
</footer>

</body>
</html>
