<!DOCTYPE html>
  <?php
    $t = time() ;

  ?>
  <html lang="en">
    <head>
      <title>Camera Raspberry</title>
      <meta charset="UTF-8"/>

      <!--<link rel="shortcut icon" href="">
      <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap4.css">
      <link rel="stylesheet" href="css/bootstrap3.4.css">
      <link rel="stylesheet" href="camera.css?">

      <script src="js/jquery-3.4.1.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootstrapv3.min.js"></script> -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap4.css">
      <link rel="stylesheet" href="css/bootstrap3.4.css">
      <link rel="stylesheet" href="camera.css?<?php echo $t ?>">

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>




    </head>
    <body>

      <br />
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">Contrôle</div>
                <div class="panel-body">
                  <div class="test">
                    <button id="restart" class="btn btn-info" value="restart">Reboot</button>
                    <button id="cameraInfos" class="btn btn-info" value="cameraInfos" data-toggle="modal" data-target="#resultModal">Camera informations</button>
                    <button id="imageInfos" class="btn btn-info"value="imageInfos" data-toggle="modal" data-target="#resultModal">Image Infos</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                      Ajouter un utilisateur
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal">
                      Supprimer un utilisateur
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Liste des utilisateurs
                </div>
                <div class="panel-body">
                  <ul id="userList"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Result Modal -->
        <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Résultat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="requestResult"class="requestResult"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Record Modal -->
        <div class="modal fade" id="recordModal" tabindex="-1" role="dialog" aria-labelledby="recordModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Démarrer l'enregistrement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                      <label for="time">Temps (en secondes)</label>
                      <input type="number" class="form-control" id="time" min="5" max="300" value="5">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button id="recordBtn" type="button" class="btn btn-primary" data-dismiss="modal">Démarrer l'enregistrement</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Videos Modal -->
        <div class="modal fade" id="videosModal" tabindex="-1" role="dialog" aria-labelledby="videosModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liste enregistrement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="liste-video" class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Images Modal -->
        <div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="imagesModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liste des images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="liste-image" class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>


        <!--  Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" id="password" placeholder="Mot de passe">
                  </div>
                  <div class="form-group">
                    <label for="username">Droits d'accès</label>
                    <select id="userPrivilege" class="form-control form-control-lg" name="userPrivilege">
                      <option selected value="0">0</option>
                      <option value="1">1</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button id="addUser" type="button" class="btn btn-primary" data-dismiss="modal">Ajouter l'utilisateur</button>
              </div>
            </div>
          </div>
        </div>

        <!--  Delete User Modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="username">Utilisateurs</label>
                    <select id="users" class="form-control form-control-lg" name="users">
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button id="deleteUser" type="button" class="btn btn-primary" data-dismiss="modal">Supprimer l'utilisateur</button>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">Vidéo live 
                  <button id="record" class="btn btn-warning" value="record" data-toggle="modal" data-target="#recordModal">Démarrer l'enregistrement</button>
                  <button id="modal-video" class="btn btn-warning" value="videos" data-toggle="modal" data-target="#videosModal">Liste enregistrements</button>
                  <button id="modal-image" class="btn btn-warning" value="images" data-toggle="modal" data-target="#imagesModal">Liste des images</button></div>
                <div class="panel-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="http://192.168.0.20:80/video/mjpg.cgi"></iframe>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">Configuration Caméra</div>
                <div class="panel-body">
                <form>
                  <div class="form-group">
                    <label for="resolution">Résolution caméra</label>
                    <select id="resolution" name="resolution" class="form-control form-control-lg">
                      <option value="0">160x120</option>
                      <option value="1">320x240</option>
                      <option value="2">640x480</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="compression">Taux de compression</label>
                    <select id="compression" name="compression" class="form-control form-control-lg">
                    <option value="0">Very low</option>
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>
                    <option value="4">Very High</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="fps">Images par secondes</label>
                    <select id="fps" name="fps" class="form-control form-control-lg">
                    <option value="0">Auto</option>
                    <option value="2">5 fps</option>
                    <option value="10">10 fps</option>
                    <option value="15">15 fps</option>
                    <option value="20">20 fps</option>
                    <option value="25">25 fps</option>
                    <option value="30">30 fps</option>
                    </select>
                  </div>

                  <label for="luminosite">Luminosité <p id="valLuminosite"></p></label>
                  <div class="d-flex justify-content-center my-4">
                    <span class="font-weight-bold purple-text mr-2 mt-1"><br>1</span>
                    <form class="range-field w-100">
                      <input class="border-0" type="range" min="1" max="128" id="luminosite" name="luminosite" />
                      
                    </form>
                    <span class="font-weight-bold purple-text ml-2 mt-1">128</span>
                    
                  </div>

                  <label for="saturation">Saturation <p id="valSaturation"></p><p id="valSaturation"></p></label>
                  <div class="d-flex justify-content-center my-4">
                    <span class="font-weight-bold purple-text mr-2 mt-1">1</span>
                    <form class="range-field w-100">
                      <input class="border-0" type="range" min="1" max="128" id="saturation" name="saturation" />
                    </form>
                    <span class="font-weight-bold purple-text ml-2 mt-1">128</span>
                  </div>

                  <label for="contraste">Contraste <p id="valContrast"></p></label>
                  <div class="d-flex justify-content-center my-4">
                    <span class="font-weight-bold purple-text mr-2 mt-1">1</span>
                    <form class="range-field w-100">
                      <input class="border-0" type="range" min="1" max="128" id="contraste" name="contraste" />
                    </form>
                    <span class="font-weight-bold purple-text ml-2 mt-1">128</span>
                  </div>

                  <div class="form-group">
                    <label for="frequence">Anti-Scintillement</label>
                    <select id="noscintillement" name="frequence" class="form-control form-control-lg">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                    </select>
                  </div>  

                  <div class="form-group">
                    <label for="lightFrequency">Light frequency</label>
                    <select id="lightFrequency" name="lightFrequency" class="form-control form-control-lg">
                    <option value="0">50 Hz</option>
                    <option value="1">60 Hz</option>
                    </select>
                  </div>

                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      <script src="camera.js?<?php echo $t ?>"></script>
    </body>
  </html>