<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="doc/css/font-awesome.min.css">
  <link rel="stylesheet" href="doc/css/bootstrap.css">
  <link rel="stylesheet" href="doc/css/style.css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

  <title>ArtIIstE</title>

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->


</head>

<body>
<div class="topbg d-none d-lg-block"></div>
  <!-- NAV -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
          <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a href="index.php" class="navbar-brand">
                <img src="doc/img/logo_a.png"  width="40" height="40">
                <span class="h4 text-success d-inline align-middle mx-2">ArtIIstE</span>
            </a>

            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                    <!--<li class="nav-item">
                      <a class="nav-link" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="client/onglets/a-propos.html">À propos</a>
                    </li>-->
              </ul>
            </div>
          </div>
  </nav>

    <!-- BIENVENUE SECTION -->
    <section id="bienvenue-section">
          <div class="container">
                <div class="row" id="formInscription">
                      <div class="col-lg-4 p-3">
                          <div class="card bg-light text-center card-form pt-3 pb-5">
                            <div class="card-body">

                                <div class="h3 text-success" >Inscription</div>
                                <hr class="my-4">

                                <form id="formLogin" method="POST" action="index.php?page=Profil">
                                    <div class="form-group">
                                        <input type="text" id="nom" name="nom" class="form-control form-control" placeholder=Nom>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="prenom" name="prenom" class="form-control form-control" placeholder="Prenom">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control form-control" placeholder=Email@example.fr>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control form-control" placeholder="Mot de Passe">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="date" name="date" class="form-control form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" class="custom-control-input" id="radio1" name="sexe">
                                          <label class="custom-control-label" for="radio1">Homme</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" class="custom-control-input" id="radio2" name="sexe">
                                          <label class="custom-control-label" for="radio2">Femme</label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="art" class="custom-select mb-3">
                                            <option selected>Art</option> 
                                            <option value="architecture">Architecture</option> 
                                            <option value="sculpture">Sculpture</option>
                                            <option value="peinture">Peinture</option>
                                            <option value="musique">Musique</option>
                                            <option value="cinéma">Cinéma</option>
                                        </select>
                                    </div>
                                    <a href="index.php?page=Connexion" name="" id="" class="btn btn-outline-success btn-block" value="GO !" role="button">Done !</a>
                                </form>

                            </div>
                          </div>
                      </div>
                      
                      <div class="col-lg-8 d-none d-lg-block">
                            <div id="" class="card p-3 d-block my-3 " >
                              <div class="d-flex col justify-content-center">
                                  <img src="doc/img/logo_a.png" style="width:68px; height:68px;" alt="">
                                  <div class="display-4 ml-3 align-self-center">ArtIIstE</div>
                              </div>

                              <span class="my-3 text-muted d-flex col justify-content-center lead">Une nouvelle manière de partager votre talent.</span>

                              <div class="d-flex flex-row col justify-content-center ">
                                  <div class="p-3 align-self-start">
                                    <i class="fa fa-check"></i>
                                  </div>
                                  <div class="p-3 align-self-end">
                                    <em>Pratique</em>
                                  </div>
                              </div>
                              <div class="d-flex flex-row col justify-content-center ">
                                  <div class="p-3 align-self-start">
                                    <i class="fa fa-check"></i>
                                  </div>
                                  <div class="p-3 align-self-end">
                                    <em>Efficace</em>
                                  </div>
                              </div>
                              <div class="d-flex flex-row col justify-content-center ">
                                  <div class="p-3 align-self-start">
                                      <i class="fa fa-check"></i>
                                  </div>
                                  <div class="p-3 align-self-end">
                                      <em>Ergonomique</em>
                                  </div>
                              </div>
                            </div>
                      </div>
                </div>
        </div>
    </section>

    <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <script src="doc/js/jquery.min.js"></script>
    <script src="doc/js/popper.min.js"></script>
    <script src="doc/js/bootstrap.min.js"></script>
    <script src="doc/js/login.js"></script>
  </body>

</html>