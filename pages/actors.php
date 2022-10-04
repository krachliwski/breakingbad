<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class='bg-actors'>
    <div>
        <h2>Atores</h2>
    </div>

    <?php
    $arquivo = URL . "characters";

    $dados = file_get_contents($arquivo);

    $dados = json_decode($dados);

    foreach ($dados as $actors) {
        $poster = $actors->img;

    ?>

        <div class='card'>
            <div class='row'>
                <div class="col-12 cold-md-9">
                    <h1 class='actors-name'><?= $actors->name ?></h1>
                </div>

                <div class="col-12 col-md-3">
                    <img src="<?= $poster ?>" alt="<?= $actors->name ?>" class='card-image'>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>