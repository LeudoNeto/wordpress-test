<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista dos Competidores</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="table.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary" style="height: 10%;">
      <div class="container">
        <a class="navbar-brand">Competidores</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Página Inicial</a>
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
              <a class="nav-link" href="editar_inscricao.php">Edite sua inscrição</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscricao.php" id="botao-inscricao">Inscreva-se!</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container p-5 less-opacity text-center" style="margin-top: 1em;">
        <form class="d-flex" role="search">
            <input name="name" class="form-control me-2" type="search" placeholder="Pesquisar por nome" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Pontos</th>
                <th>Perfil do Competidor</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once "Competidor.php";

        $competidor = new Competidor;

        $name = $_REQUEST["name"] ?? null;

        if ($name !== null)
        {
            $competidor->setName($name);
            $data = $competidor->readByName();
        }
        else
        {
        $data = $competidor->readByName();
        }

        foreach ($data as $line)
        {
            $line_id = $line["id"];
            print("<tr>");
            print("<td>".$line["name"]."</td>");
            print("<td><a href='imagem_dos_competidores/$line_id.png'>ver foto</a></td>");
            print("<td>".$line["points"]."</td>");
            print("<td><form action='perfil_do_competidor.php'><button style='border: 0px solid black; cursor: pointer;' name='id' value='$line_id' class='edit-icon'><img height='20' src='img/competidor_icon.png' ></button></form><td>");
            print("</tr>");
        }

        ?>
        </tbody>
    </table>

    <?php
    
     if ($name !== null)
     {
       print('<div class="text-center"><a href="listagem_dos_competidores.php"><button type="button" class="btn btn-outline-danger" style="margin-top: 2em; margin-bottom: 3em;">Limpar Pesquisa</button></a></div>');
     }

    ?>

  </body>
</html>