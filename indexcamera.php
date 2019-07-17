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
      <link rel="stylesheet" href="camera.css">


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body>
      <br />
        <h1>Contrôle:</h1>
          <button id="restart"  value="restart">Reboot</button>
          <button id="cameraInfos"  value="cameraInfos">Camera informations</button>
          <button id="userAccess" value="userAccess">User access</button>
          <button id="activeUsers" value="activeUsers">Active Users</button>
          <button id="imageInfos" value="imageInfos">Image Infos</button>
          <ul id="userList"></ul>
          <hr>

        <h1>Ajouter User:</h1>
          <label>Username :</label>
          <input type="text" name="username" id="username"><br>
          <label>Password :</label>
          <input type="password" name="password" id="password"><br>
          <label>Privilège :</label>
          <select id="userPrivilege" name="userPrivilege">
            <option selected value="0">0</option>
            <option value="1">1</option>
          </select>
          <br>

          <button id="addUser" value="addUser">Ajouter un utilisateur</button>
          <hr>

        <h1>Image Configuration :</h1>
          <label>Vidéo Résolution:</label>
          <select name="resolution">
            <option value="0">160x120</option>
            <option value="1">320x240</option>
            <option value="2">640x480</option>
          </select>
          <br>

          <label>Taux de compression:</label>
          <select name="compression">
            <option value="0">Très peu</option>
            <option value="1">Peu</option>
            <option value="2">Moyen</option>
            <option value="3">Fort</option>
            <option value="4">Très fort</option>
          </select>
          <br>

          <label>Images par secondes:</label>
          <select name="fps">
            <option value="0">Auto</option>
            <option value="2">5 fps</option>
            <option value="10">10 fps</option>
            <option value="15">15 fps</option>
            <option value="20">20 fps</option>
            <option value="25">25 fps</option>
            <option value="30">30 fps</option>
          </select>
          <br>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="http://192.168.0.20:80/video/mjpg.cgi" 
              width="1920" height="1080" class="smart_sizing_iframe noresize" frameborder="0" scrolling="no" > 
            </iframe>
          </div>
      <script src="camera.js?<?php echo $t ?>"></script>
    </body>
  </html>