<?php

class Auths extends Controller
{
    public function deconnexion()
    {
        unset($_SESSION[Auth::USER]);
        header("Location: " . URI . "cumpters/index"); 
    }

    public function admin()
    {
        if (isset($_SESSION[Auth::USER])) {
            if ($_SESSION[Auth::USER]->description === Auth::ADMIN) {
                $user = new Auth();
                $users = $user->getAll();
                $this->render('admin', compact("users"));
                return;
            }
        }

        header("Location: " . URI . "cumpters/index");
    }

    public function login()
    {
        if (isset($_SESSION['Utilisateur'])) {
            die();
            header("Location: " . URI . "auths/index");
        }


        if (isset($_POST["submit"])) {
            if ($this->isValid($_POST)) {
                $mot_de_passe = $_POST["mot_de_passe"];
                unset($_POST["mot_de_passe"]);
                unset($_POST["submit"]);
                $auth = new Auth();
                $utilisateur = $auth->findByEmail($_POST);
                if ($utilisateur) {
                    if (password_verify($mot_de_passe, $utilisateur->mot_de_passe)) {
                        unset($utilisateur->mot_de_passe);
                        $_SESSION[Auth::USER] = $utilisateur;
                        header("Location: " . URI . "auths/index");
                        $_SESSION['role'] = $utilisateur->id_role;
                    } else {
                        $erreurs["message"] = "Email or password invalid!";
                        $this->render("login", $erreurs);
                        return;

                    }
                } else {
                    $erreurs["message"] = "Email or password invalid!";
                    $this->render("login", $erreurs);
                }
            } else {
                $erreurs["message"] = "Remplir tous les champs!";
                $this->render("login", $erreurs);
            }
        }
        $this->render("login");
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function inscription()
    {
        if(isset($_POST["inscription"])){
           $auth = new Auth();
           if($auth->isValid($_POST))
           {
            if ($_POST["mot_de_passe"]===$_POST["c_mot_de_passe"]) {
                unset($_POST["inscription"]);
                unset($_POST["c_mot_de_passe"]);
                $_POST["id_role"]=2;
                $_POST["actif"]=1;
                $_POST["mot_de_passe"]= password_hash($_POST["mot_de_passe"],PASSWORD_DEFAULT);
                $auth->inscription($_POST);
            }
            
           }
           else
           {
            $erreurs["message"] = "Remplir tous les champs!";
            $this->render("inscription", $erreurs);
           }

        }
     
        $this->render("inscription");
    }

    public function profil(){
        $this->render("profil");
    }
    
    public function bloquer(){
        $params = explode("/", $_GET['p']);
        $id_user=["id_user"=>$params["2"]];
        
        $user = new Auth();
         if ($user->bloquer($id_user)) {
            header("Location: " . URI . "auths/admin");
            return;
        }
     
    }
    public function supprimer($id_utilisateur)
    {
        $params = explode("/", $_GET['p']);
        $id_utilisateur=["id_utilisateur"=>$params["2"]];
        
        $user = new Auth();
         if ($user->deleteUser($id_utilisateur)) {
            header("Location: " . URI . "auths/admin");
            return;
        }
                   
    }
    
    public function modifier($id_utilisateur)
    {  

         if(isset($_POST['modifier'])){
         
            unset($_POST['modifier']);
           $_POST['id_utilisateur']=$id_utilisateur;
            $user = new Auth();    
            $user->update($_POST);
            if ($user->update($_POST)) {
                header("Location: " . URI . "auths/modifier");
            return;
            }
         }
      else {
        if(isset($id_utilisateur)){
        $user = new Auth();
        $userDetails=$user->lire(["id_utilisateur"=>$id_utilisateur]);
        if($userDetails){
        $this->render('modifier', compact("userDetails"));
        return;
        }
     }

    }
    }
   
    }


