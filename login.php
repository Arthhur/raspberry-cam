<!DOCTYPE html>
  <?php
    $t = time() ;
  ?>
  <html lang="en">
    <head>
      <title>Camera Raspberry</title>
      <meta charset="UTF-8"/>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="login.css">


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <h2 class="text-center title">Bienvenue sur Raspberry cam</h2>
                </div>
                <div class="col col-sm-12 col-md-6 col-lg-4">        
                    <form id="formLogin" class="bg-light">
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