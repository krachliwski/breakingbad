<!DOCTYPE html>
<html lang="pt-br">

<body class='bg-actors'>
    <div class='container-actors'>
        <div class='title'>
            <h2>Atores</h2>
        </div>

        <?php
        include('Tradutor.php');
        $arquivo = URL . "characters";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados as $actors) {
            $poster = $actors->img;
            $translator = new Tradutor();
            $status = $translator->traduzLang('en', 'pt-br', $actors->status);
            $date = strtotime($actors->birthday);
            $infos = "Nome: " . $actors->nickname . "</br> Status: " . $status . "</br> Aniversário: " . date('d/m/Y', $date) . "</br> Papel: ";
        ?>

            <div class='actors'>
                <div class='wraper'>
                    <div class='cards'>
                        <img src="<?= $poster ?>" alt="<?= $actors->name ?>">

                        <div class='descriptions'>
                            <h1><?= $actors->name ?></h1>
                            <p><?= $infos ?></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php
        }
?>
</body>

</html>