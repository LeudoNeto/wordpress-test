<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Campeonato Regional de Tênis de Mesa</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      html {
        height: 100%;
      }
      body {
        background-image: url(img/imagemprosite.webp);
        background-repeat: no-repeat;
        background-size: cover;
      }
      .less-opacity {
        background: rgba(248, 249, 250, 0.82);
      }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary" style="height: 10%;">
      <div class="container">
        <a class="navbar-brand">Página Inicial</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
        <h1 style="font-size: 3em;">Primeiro Campeonato Regional</h1>
        <h1 style="font-size: 3em;">de Tênis de Mesa</h1>
        <h1>PB-PE-AL</h1>
        <h1>Data: 11/07 - 18/07 de 2022</h1>

        <button type="button" id="scroll-button" class="btn btn-lg btn-primary font-weight-bold" style="font-size: 3em; height: 2.1em; margin-top: 1em; margin-bottom: 1em;">Saiba Mais</button>
      </div>

    <div class="d-flex justify-content-center" style="margin-top: 1em; background-color: white;">
      <div class="row container-fluid p-5 bg-light" style="margin-top: 1em;">
        <div class="col-lg-7 text-center">
          <h1>A competição será dividida</h1>
          <h1>3 etapas:</h1><br>
          <h3>1ª Etapa: Sousa-PB (11/07)</h3>
          <h3>2ª Etapa: Caruaru-PE (15/07)</h3>
          <h3>3ª Etapa: Maceió-AL (18/07)</h3><br>
          <p>Cada participante disputará 5 partidas em cada etapa.</p>
          <p>Será disponibilizado transporte seguindo a rota à direita:.</p>
        </div>

        <div class="col-lg-5 text-center">
          <img src="img/mapa.png">
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center" style="margin-top: 1em; background-color: white;">
      <div class="row container p-5 bg-light" style="margin-top: 1em;">
        <div class="col-lg-5 text-center">
          <img height="300em" src="img/tenisdemesa.jpg">
          <img>
        </div>

        <div class="col-lg-7 text-center">
          <h1 style="padding: 0.5em; padding-bottom: 0;">Todas as partidas serão transmitidas AO VIVO</h1>
          <a href="https://www.twitch.tv"><button type="button" class="btn btn-lg btn-outline-primary" style="margin-top: 1em; margin-bottom: 1em; --bs-btn-color: rgb(100, 65, 165); --bs-btn-border-color: purple; --bs-btn-hover-bg: rgb(100, 65, 165); --bs-btn-hover-color: white; --bs-btn-hover-border-color: rgb(100, 65, 165);">TWITCH</button><br></a>
          <a href="https://www.youtube.com"><button type="button" class="btn btn-lg btn-outline-danger" style="margin-top: 1em; margin-bottom: 1em;">YOU TUBE</button></a>
        </div>
      </div>
    </div>

      <div class="container-fluid p-5 bg-light text-center" style="margin-top: 1em;">
          <a href="listagem_dos_competidores.php"><button style="margin-top: 1em; margin-bottom: 1em;" type="button" class="btn btn-lg btn-primary">Listagem dos Competidores</button></a>
          <a href="detalhes_dos_competidores.php"><br><button style="margin-top: 1em; margin-bottom: 1em;" type="button" class="btn btn-lg btn-success">Detalhes dos competidores</button></a>
          <a href="ranking.php"><br><button style="margin-top: 1em; margin-bottom: 1em;" type="button" class="btn btn-lg btn-warning">Ranking</button></a>
      </div>

      <script>
        $('#scroll-button').click(function(){
        $('html, body').animate({scrollTop:600});
        });
      </script>
      <?php ?>

  </body>
</html>