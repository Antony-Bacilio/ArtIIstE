<div class="container">
    <nav id="main_nav" class="navbar pl-5 pr-5 navbar-expand-sm navbar-light fixed-top" >
    
            <a href="" class="navbar-brand">
                <img src="images/logo_a.png"  width="40" height="40">
                <span class="h4 d-inline align-middle mx-2" id="logo_artiste"><strong>ArtIIstE</strong></span>
            </a>
            <form class="form-inline  pl-5" action="../Recherche.php" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="Prénom ou Nom..." name="userRecherche">
                <button name = "btn_search" id="btn_search" class="btn" type="submit">Search</button>
            </form>
            <li class="nav-item ml-auto dropdown active">    
                <a class="nav-link" id="" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <?php 
                        echo $userinfo['firstname'];/*echo $_SESSION['firstname'];*/
                    ?>
                    <?php
                    if(!empty($userinfo['avatar']))
                    {?>
                    <img id="avatar_nav" src="../users/avatar/<?php echo $userinfo['avatar']?>">
                    <?php 
                    } else {
                    ?>	
                    <img id="avatar_nav" src="../images/avatar.png">
                    <?php
                    }
                    ?>
                    
                </a>

                <div class="dropdown-menu bg-light" aria-labelledby="Projet" >
                    <a class="dropdown-item" id="" href="profil.php?id=<?php echo $_SESSION['id'] ?>" ><strong>Mon profil</strong></a>
                    <!--<a class="dropdown-item" id="" href="../ListeAmis.php" ><strong>Amis</strong></a>-->
                    <a class="dropdown-item" id="" href="../logOut.php" ><strong>Déconnexion</strong></a>
                </div>                                                 
            </li>
    </nav>
</div>
        
