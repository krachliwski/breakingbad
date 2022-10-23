<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class='bg-quotes'>
    <h2>Frases</h2>

    <?php
    include ('Tradutor.php');
    $arquivoAtores = URL . "characters";
    $atores = file_get_contents($arquivoAtores);
    $nomes = json_decode($atores);

    foreach ($nomes as $nome) {

        $arquivo = URL . "quote?author=" . str_replace(' ', '+', $nome->name);
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        if (!empty($dados)) {
    ?>

            <h1 class="name"><?= $nome->name ?></h1>

            <?php
            foreach ($dados as $quotes) {
                $translator = new Tradutor();
                $phrase = $quotes->quote;
                $translation = $translator->traduzLang('en', 'pt-br', str_replace('.',',',$phrase));
            ?>

                <div class="container">
                    <div class="quotes">
                        <div class="phrase">
                            <h3>Original</h3>
                            <p><?= $phrase ?></p>
                        </div>
                        <div class="translate">
                            <h3>Tradução</h3>
                            <p><?= $translation ?></p>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    }

    ?>
</body>

</html>