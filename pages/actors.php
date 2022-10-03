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
    $arquivo = URL."characters";

    $dados = file_get_contents($arquivo);

    $dados = json_decode($dados);

    foreach ($dados as $actors) {
        echo "<p>{$actors->name}</p>";
    }
    ?>
</body>

</html>