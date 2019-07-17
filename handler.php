<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');

/**
 * Class Handler
 */
class Handler
{
    // Ce controller prend en paramètres le type de données que l'on souhaite récupérer
    // Il va lancer la fonction qui correspond et renvoyer les données au fichier restController.
    /**
     * @param $type
     * @return string
     */
	
    function HandlerController($type) {
        date_default_timezone_set('Europe/Madrid');

        switch ($type) {
            case "getSystemInfo":
                    $result = $this->getSystemInfo();
                break;
            case "getUserAccess":
                $result = $this->getUserAccess();
                break ;
            case "addOneUser":
                $result = $this->addOneUser();
                break ;
            case "deleteOneUser":
                $result = $this->deleteOneUser();
                break;
            case "getActiveUsers":
                $result = $this->getActiveUsers();
                break;
            case "getImgInfo":
                $result = $this->getImgInfo();
                break;
            case "restartCamera":
                $result = $this->restartCamera();
                break;
            case "getUserList":
                $result = $this->getUserList();
                break;
            
            default:
                $result = "Erreur: Méthode non trouvée";
                break;
        }
        return $result;
    }

    function getSystemInfo() {
            $url = "http://admin:Cesi2017Cesi2017@192.168.0.20/isystem.cgi";
            $contents = file_get_contents($url, true);
            return $contents ;
      }
    
      function getUserAccess() {
            $url = "http://admin:Cesi2017Cesi2017@192.168.0.20/user.cgi";
            $contents = file_get_contents($url, true);
            return $contents;
      }
    
      /*  UserAdd => Yes */
      function addOneUser() {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['userPrivilege'])) {
      
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userPrivilege = $_POST['userPrivilege'];
          
            $url = 'http://admin:Cesi2017Cesi2017@192.168.0.20/userlist.cgi?UserName='.$username.'&UserPassword='.$password.'&'.'UserPrivilege='.$userPrivilege.'&UserAdd=Yes';
            $contents = file_get_contents($url, true);
            return "Utilisateur ajouté";
        }
      }
    
      /*  UserDelete => Yes */
      function deleteOneUser() {
        if (isset($_POST['usernamer'])) {
      
            $username = $_POST['username'];
          
            $url = 'http://admin:Cesi2017Cesi2017@192.168.0.20/userlist.cgi?UserName='.$username.'&UserDelete=Yes';
            $contents = file_get_contents($url, true);
            return "Utilisateur supprimé";
          }
      }
    
      function getActiveUsers() {
            $url = "http://admin:Cesi2017Cesi2017@192.168.0.20/iactiveuser.cgi";
            $contents = file_get_contents($url, true);
            return $contents;
      }
    
      function getImgInfo() {
            $url = "http://admin:Cesi2017Cesi2017@192.168.0.20/iimage.cgi";
            $contents = file_get_contents($url, true);
            return $contents;
      }
    
    
      function restartCamera() {
            $url = "http://admin:Cesi2017Cesi2017@192.168.0.20/reset.cgi?Reset=yes";
            $contents = file_get_contents($url, true);
            return "camera restart" ;
      }

      function getUserList() {
        $url = "http://admin:Cesi2017Cesi2017@192.168.0.20/userlist.cgi ";
        $contents = file_get_contents($url, true);
        return $contents;
  }
  
}