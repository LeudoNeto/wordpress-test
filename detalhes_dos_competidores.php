<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Detalhes dos Competidores</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="table.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary" style="height: 10%;">
      <div class="container">
        <a class="navbar-brand">Detalhes dos Competidores</a>
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
                <li><a class="dropdown-item" href="detalhes_do_projeto.php">do Projeto</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <table class="styled-table" style="margin-top: 3em;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descriçãp</th>
                <th>Foto</th>
                <th>Pontos</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once "Competidor.php";

        $competidor = new Competidor;

        $data = $competidor->readByName();

        foreach ($data as $line)
        {
            print("<tr>");
            print("<td>".$line['name']."</td>");
            print("<td>".$line['descricao']."</td>");
            $line_id = $line['id'];
            print("<td>"."<img src='imagem_dos_competidores/$line_id.png' height='80' >"."</td>");
            print("<td>".$line['points']."</td>");
            print("</tr>");
        }

        ?>
        </tbody>
    </table>

  </body>
</html>