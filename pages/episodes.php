<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class='bg-episodes'>
    <div class='sinopse-h2'>
        <h2>Episódios</h2>
    </div>
</body>
<?php

$arquivo = URL . "episodes";
$dados = file_get_contents($arquivo);
$dados = json_decode($dados);

foreach ($dados as $actors) {

    if (($actors->series) != "Breaking Bad") {
    } elseif (($actors->season) == 1) {
        $tem1[] = "$actors->title ep $actors->episode<br>";
    } elseif (($actors->season) == 2) {
        $tem2[] = "$actors->title ep $actors->episode<br>";
    } elseif (($actors->season) == 3) {
        $tem3[] = "$actors->title ep $actors->episode<br>";
    } elseif (($actors->season) == 4) {
        $tem4[] = "$actors->title ep $actors->episode<br>";
    } else {
        $tem5[] = "$actors->title ep  $actors->episode<br>";
    }
}

$ntem1 = count($tem1);
$ntem2 = count($tem2);
$ntem3 = count($tem3);
$ntem4 = count($tem4);
$ntem5 = count($tem5);

?>

<div class="container-episodes">
    <div class=" grid">
        <div class="coluna ">
            <div class=" card text-center ">
                <div class="image">
                    <img src=https://es.web.img2.acsta.net/pictures/18/07/23/11/26/1237965.jpg class="w-100">
                </div>
                <h5>Temporada 2</h5>

                <p> <?php   //foto retira de https://www.sensacine.com/series/serie-3517/temporada-6258/                   
                    for ($i = 0; $i < $ntem1; $i++) (print($tem1[$i]))
                    ?></p>
            </div>

        </div>


        <div class="coluna ">
            <div class=" card text-center ">
                <div class="image">
                    <img src=https://elfinalde.s3-accelerate.amazonaws.com/2016/01/7FwD7IuyHy6xl18LDIRxjl7vDbo.jpg class="w-100">
                </div>
                <h5>Temporada 2</h5>

                <p> <?php   // foto retirada de https://elfinalde.com/series/breaking-bad-temporada-2/                   
                    for ($i = 0; $i < $ntem2; $i++) (print($tem2[$i]))
                    ?></p>
            </div>

        </div>
        <div class="coluna ">
            <div class="card text-center">
                <div class="image">
                    <img src=https://es.web.img3.acsta.net/pictures/18/07/23/11/26/2167658.jpg class="w-100">
                </div>
                <h5 class="text-center">Temporada 3</h5>
                <p class="text-center"><?php   //foto retira de https://komorebimanga.wordpress.com/2021/01/04/flops-bilan-2020-2-3/comment-page-1/                     
                                        for ($i = 0; $i < $ntem3; $i++) (print($tem3[$i]))
                                        ?>
                <p>
            </div>
        </div>
        <div class="coluna ">
            <div class=" card text-center ">
                <div class="image">
                    <img src=https://th.bing.com/th/id/R.2d8ff3e20868397937ddc966373985b2?rik=TmCeyyyZLCKJGQ&riu=http%3a%2f%2fes.web.img3.acsta.net%2fpictures%2f18%2f07%2f23%2f11%2f26%2f2778599.jpg&ehk=aHW5N57P%2bI6tCUN01QdamIeY2qEFLxJgpvZp3KpC7%2bI%3d&risl=&pid=ImgRaw&r=0 class="w-100">
                </div>
                <h5 class="text-center">Temporada 4</h5>
                <p class="text-center"><?php       //foto retirada de https://www.allocine.fr/series/ficheserie-3517/saison-19343/                                       
                                        for ($i = 0; $i < $ntem4; $i++) (print($tem4[$i]))
                                        ?></p>
            </div>
        </div>
        <div class="coluna ">
            <div class=" card text-center ">
                <div class="image">
                    <img src=https://th.bing.com/th/id/OIP.nTsh1RsTp7wocJSmUDRfowHaLH?pid=ImgDet&rs=1 class="w-100">
                </div>
                <h5 class="text-center">Temporada 5</h5>
                <p class="text-center"><?php       //foto tirada de https://pelismovi.com/temporadas/breaking-bad-temporada-5/                                       
                                        for ($i = 0; $i < $ntem5; $i++) (print($tem5[$i]))
                                        ?></p>
            </div>
        </div>
    </div>
</div>
</div>


</html>