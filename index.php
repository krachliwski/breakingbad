<?php
include "configs.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breaking Bad - API</title>
  <base href="http://localhost:8080/breakingbad/">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" alt="Breaking Bad" width="170" height="70">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="index.php">Sobre</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="episodes">Episódios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="actors">Atores</a>
          </li>
        </ul>
      </div>
    </div>

    <div>
      <img src="images/walterwhite.png" alt="Breaking Bad" width="100" height="60">
    </div>
  </nav>

  <main class="container">
    <?php
    $pagina = "home";

    if (isset($_GET["param"])) {
      $param = trim($_GET["param"]);
      $param = explode("/", $param);

      $pagina = $param[0];
    }

    $pagina = "pages/{$pagina}.php";

    if (file_exists($pagina)) {
      include $pagina;
    } else {
      include "pages/error.php";
    }
    ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>