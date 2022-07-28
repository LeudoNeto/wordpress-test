<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscrição</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="table.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary" style="height: 10%;">
      <div class="container">
        <a class="navbar-brand">Inscrição</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Página Inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listagem_dos_competidores.php">Competidores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ranking.php">Ranking</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Detalhes
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="detalhes_dos_competidores.php">dos Competidores</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="detalhes_do_projeto.php">do Projeto</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="editar_inscricao.php">Edite sua inscrição</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
    require_once "Competidor.php";

    $competidor = new Competidor;

    $name = $_REQUEST["name"] ?? '';
    $descricao = $_REQUEST["descricao"] ?? '';
    $foto = $_FILES['foto']['name'] ?? '';

    if ($name === '' || $descricao === '' || $foto === '')
    {
      if (!($name === '' && $descricao === '' && $foto === ''))
      {
        echo '<h1 align="center">ERRO ao inscrever-se</h1>';
        echo '<h1 align="center">Você não preencheu todos os dados</h1>';
      }

      echo'<form method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center" style="margin-top: 2em;">
          <div class="row container-fluid p-5 bg-light">
            <div class="col-lg-7">
              <h1>Nome:</h1>
              <input class="form-control me-2" name="name">
              <br><h1>Descrição: </h1>
              <textarea class="form-control me-2" style="height: 10em;" name="descricao"></textarea>

            </div>

            <script type="text/javascript">
                function showPreview(event){
                  if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("image-preview");
                    preview.src = src;
                    preview.style.display = "block";
                  }
                }
            </script>

            <div class="col-lg-5 p-3 text-center">
              <img id="image-preview" height="300" src="img/pictemplate.png" style="margin-bottom: 1em; margin-left:auto; margin-right:auto;">
              <input type="file" class="form-control" name="foto" onchange="showPreview(event)"/>
            </div>
            <div style="text-align: center; margin-top: 2em;">
              <input type="submit" value="Increver-se" name="submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>';
    }
    else
    {
      $currentDirectory = getcwd();
      $uploadDirectory = "/imagem_dos_competidores/";

      $errors = [];

      $fileExtensionsAllowed = ['jpeg','jpg','png'];

      $fileName = "51.png";
      $fileSize = $_FILES['foto']['size'];
      $fileTmpName  = $_FILES['foto']['tmp_name'];
      $fileType = $_FILES['foto']['type'];
      $fileExtension = strtolower(end(explode('.',$fileName)));

      $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

      if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
          $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
          $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
          $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

          if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
          } else {
          echo "An error occurred. Please contact the administrator.";
          }
      } else {
          foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
          }
      }

      }
    }
    ?>

  </body>
</html>