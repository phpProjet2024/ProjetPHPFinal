<?php

class Cumpters extends Controller
{

    public function index()
    {
        $cumpter = new Cumpter();
        $cumpters = $cumpter->getAll();
        $this->render('index',compact("cumpters"));
    }

    public function admin()
    {
        if (isset($_SESSION[Auth::USER])) {
            if ($_SESSION[Auth::USER]->description === Auth::ADMIN) {
                $cumpter = new Cumpter();
                $cumpters = $cumpter->getAll();
                $this->render('admin', compact("cumpters"));
                return;
            }
        }

        header("Location: " . URI . "cumpters/index");
    }

    public function __construct()
    {
        parent::__construct();
    }

    private function uploadImage($id_cumpter)
    {

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "assets/images/" . basename($image_name); // Chemin de destination du fichier sur le serveur

            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }

            if (move_uploaded_file($image_tmp, RACINE . $image_destination)) {
                $image = new Image();
                $data = [
                    "id_cumpter" => $id_cumpter,
                    "path" => $image_destination
                ];
                $image->upload($data);

            }
        }

    }

    public function ajouter()
    {

        if (isset($_SESSION[Auth::USER])) {
            if ($_SESSION[Auth::USER]->description === Auth::ADMIN) {
                if (isset($_POST['ajouter'])) {
                    if ($this->isValid($_POST)) {
                        unset($_POST['ajouter']);
                        $cumpter = new Cumpter();
                        if ($cumpter->ajouter($_POST)) {
                            global $oPDO;
                            $id_cumpter = $oPDO->lastInsertId();
                            $this->uploadImage($id_cumpter);
                            header("Location: " . URI . "cumpters/admin");
                            return;

                        } else {
                            header("Location: " . URI . "cumpters/admin");
                            return;
                        }
                    }
                }
                $this->render("ajouter");
                return;
            }
        }
        header("Location: " . URI . "cumpters/index");
    }

    public function supprimer($id_cumpter)
    {
        $params = explode("/", $_GET['p']);
        $id_cumpter=["id_cumpter"=>$params["2"]];
        
        $cumpter = new Cumpter();
         if ($cumpter->deleteById($id_cumpter)) {
            header("Location: " . URI . "cumpters/admin");
            return;
        }
                   
    }

    public function modifier($id_cumpter)
    {  

    if(isset($_POST['modifier'])){
         
            unset($_POST['modifier']);
            $_POST['id_cumpter']=$id_cumpter;
            $cumpter = new Cumpter();    
            $cumpter->update($_POST);
            if ($cumpter->update($_POST)) {
                $this->uploadImage($id_cumpter);
                header("Location: " . URI . "cumpters/index");
            return;}
      }
      else {
        if(isset($id_cumpter)){
        $cumpter = new Cumpter();
        $cumpterDetails=$cumpter->lire(["id_cumpter"=>$id_cumpter]);
        if($cumpterDetails){
        $this->render('modifier', compact("cumpterDetails"));
        return;
        }
     }

    }
    }

}