<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Inscrição</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="table.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary" style="height: 10%;">
      <div class="container">
        <a class="navbar-brand">Editar Inscrição</a>
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
          <style>
            #botao-inscricao {
              border-color: #f1c40f;
              color: #fff;
              background-image: -webkit-linear-gradient(45deg, #90ee90 50%, transparent 50%);
              background-image: linear-gradient(45deg, #90ee90 50%, transparent 50%);
              background-position: 100%;
              background-size: 400%;
              -webkit-transition: 0.5s ease-in-out;
              transition: 0.5s ease-in-out;
            }
            #botao-inscricao:hover {
              background-position: 0;
            }
          </style>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="inscricao.php" id="botao-inscricao">Inscreva-se!</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
      require_once "Competidor.php";

      $competidor = new Competidor;

      $id = $_REQUEST["id"] ?? 0;
      $name = $_REQUEST["name"] ?? '';
      $descricao = $_REQUEST["descricao"] ?? '';
      $foto = $_FILES['foto']['name'] ?? '';
      $fn = $_REQUEST["fn"] ?? '';

      if ($id === 0)
      {
        echo'<div class="container p-5 less-opacity text-center" style="margin-top: 1em;">
            <form class="d-flex" role="search">
                <input name="name" class="form-control me-2" type="search" placeholder="Pesquisar por nome" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
        </div>';
        $competidor->setName($name);
        $data = $competidor->readByName();

        echo '<table class="styled-table">
          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Imagem</th>
                  <th>Editar</th>
                  <th>Deletar</th>
              </tr>
          </thead>
          <tbody>';

          foreach ($data as $line)
          {
              $line_id = $line["id"];
              print("<tr>");
              print("<td>".$line["name"]."</td>");
              print("<td><img src='imagem_dos_competidores/$line_id.png' height='80'></td>");
              print("<td><form><button style='border: 0px solid black; cursor: pointer;' name='id' value='$line_id'><img height='20' src='img/edit.png'><input type='hidden' name='fn' value='edit'></button></form></td>");
              print("<td><form><button style='border: 0px solid black; cursor: pointer;' name='id' value='$line_id'><img height='20' src='img/delete.png'><input type='hidden' name='fn' value='delete'></button></form></td>");
              print("</tr>");
          }
          echo '</tbody>
          </table>';

          if ($name !== '')
          {
          print('<div class="text-center"><a href="editar_inscricao.php"><button type="button" class="btn btn-outline-danger" style="margin-top: 2em; margin-bottom: 3em;">Limpar Pesquisa</button></a></div>');
          }
      }
      else
      {
        $competidor->setId($id);
        if ($fn == 'edit')
        {
          $foto = $_FILES['foto']['name'] ?? '';
          if ($name === '' || $descricao === '' || $foto === '')
          {
            if (!($name === '' && $descricao === '' && $foto === ''))
            {
              echo "<h1 align='center' style='margin-top: 1em;'>ERRO, preencha todos os dados por favor</h1>";
            }
          $data = $competidor->readByName();
          $name = $data[0]['name'];
          echo "<h1 align='center' style='margin-top: 1em;'>Editando inscrição de $name</h1>";

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
                      <input type="submit" value="Editar Inscrição" name="submit" class="btn btn-warning">
                    </div>
                  </div>
                </div>
              </form>';
          }
          else
          {
            $competidor->setName($name);
            $competidor->setDescricao($descricao);
      
            $data = $competidor->update();

            unlink("imagem_dos_competidores/$id.png");

            $currentDirectory = getcwd();
            $uploadDirectory = "/imagem_dos_competidores/";

            $errors = [];

            $fileExtensionsAllowed = ['jpeg','jpg','png'];

            $fileName = "$id.png";
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
                echo "";
                } else {
                echo "An error occurred. Please contact the administrator.";
                }
            } else {
                foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
                }
            }

            } 

            echo "<h1 align='center' style='margin-top: 1em;'>Inscrição alterada com sucesso.</h1>";

            echo "<div class='d-flex justify-content-center' style='margin-top: 2em;'>
                    <div class='row container-fluid p-5 bg-light'>
                      <div class='col-lg-7'>
                        <h1>Nome:</h1>
                        <input class='form-control me-2' value='$name' type='search' readonly>
                        <br><h1>Descrição: </h1>
                        <textarea class='form-control me-2' style='height: 10em;' readonly>$descricao</textarea>

                      </div>

                      <div class='col-lg-5 text-center'>
                        <img src='imagem_dos_competidores/$id.png' height='400'>
                      </div>
                    </div>
                  </div>";
          }
        }
        else if ($fn == 'delete')
        {
          $data = $competidor->delete();
          $name = $data[0]['name'];
          $descricao = $data[0]['descricao'];
          echo '<h1 align="center" style="margin-top: 1em;">Inscrição deletada com sucesso.</h1>';

          echo "<div class='d-flex justify-content-center' style='margin-top: 2em;'>
                  <div class='row container-fluid p-5 bg-light'>
                    <div class='col-lg-7'>
                      <h1>Nome:</h1>
                      <input class='form-control me-2' value='$name' type='search' readonly>
                      <br><h1>Descrição: </h1>
                      <textarea class='form-control me-2' style='height: 10em;' readonly>$descricao</textarea>

                    </div>

                    <div class='col-lg-5 text-center'>
                      <img src='imagem_dos_competidores/$id.png' height='400'>
                    </div>
                  </div>
                </div>";
            
        }
      }
    ?>

  </body>
</html>