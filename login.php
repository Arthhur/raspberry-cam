<!DOCTYPE html>
  <?php
    $t = time() ;
  ?>
  <html lang="en">
    <head>
      <title>Camera Raspberry</title>
      <meta charset="UTF-8"/>

      <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap4.css">
      <link rel="stylesheet" href="css/bootstrap3.4.css">
      <link rel="stylesheet" href="camera.css?<?php echo $t ?>">

      <script src="js/jquery-3.4.1.js"></script>
      <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <h2 class="text-center title">Bienvenue sur Raspberry cam</h2>
                </div>
                <div class="col col-sm-12 col-md-6 col-lg-4">        
                    <form id="formLogin" method="post" action="/indexcamera.php" class="bg-light">
                        <h4 class="text-center"> Connexion </h4>
                        <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre username" required>
                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" class="form-control" id="motdepasse" name="motdepasse" aria-describedby="mdpHelp" placeholder="Entrez votre mot de passe" required>		    
                    </div>
                    <div class="text-center">
                        <button id="authButton" type="button" class="btn btn-primary">Se connecter</button>
                    </div>
                    </form>
                    <div class="alert alert-danger">
                        
                    </div>
                </div>

            </div>
        </div>
         <script src="camera.js?<?php echo $t ?>"></script>
    </body>
</html>