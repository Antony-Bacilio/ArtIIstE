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
                <div class="row">
                      <div class="col-lg-4 p-3">
                          <div class="card bg-light text-center card-form pt-3 pb-5">
                            <div class="card-body">

                                <div class="h3 text-success" >Connexion</div>
                                <hr class="my-4">

                                <form id="formLogin" method="POST" action="index.php?page=Profil">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control form-control" placeholder=Email@example.fr>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control form-control" placeholder="Mot de Passe">
                                    </div>
                                    <input type="button" name="login" id="login" class="btn btn-outline-success btn-block" value="GO !">
                                    <a href="index.php?page=Inscription" class="btn btn-outline-info btn-block" role="button">S'inscrire</a>
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

    <!-- test récuperation données -->
    <div class="container">
        <h3><?php echo 'Hello world from Docker - TEST! php' . \PHP_VERSION; ?></h3>

        <table class="table table-bordered table-hover table-striped">
            <thead style="font-weight: bold">
                <td>#</td>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>e-mail</td>
                <td>Mot de passe</td>
                <td>Date de naissance</td>
                <td>Sexe</td>
                <td>Art</td>
            </thead>
            <?php /** @var \User\User $user */
              $users = $objArtiste->getArtistes();
              foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->getId() ?></td>
                    <td><?php echo $user->getFirstname() ?></td>
                    <td><?php echo $user->getLastname() ?></td>
                    <td><?php echo $user->getEmail() ?></td>
                    <td><?php echo $user->getMdp() ?></td>
                    <td><?php echo $user->getBirthday() ?></td>
                    <td><?php echo $user->getSex() ?></td>
                    <td><?php echo $user->getArt() ?></td>
                </tr>
            <?php endforeach; ?>
           
        </table>
    </div>

    <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <script src="doc/js/jquery.min.js"></script>
    <script src="doc/js/popper.min.js"></script>
    <script src="doc/js/bootstrap.min.js"></script>
    <script src="doc/js/login.js"></script>
  </body>

</html>