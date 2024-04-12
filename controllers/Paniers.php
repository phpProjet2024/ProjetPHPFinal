<?php

class Paniers extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $panier = new Panier();
        $cumpters = $panier->getAll();
        if (is_null($cumpters)) {
            $cumpters = [];
        }
        $this->render("index", compact('cumpters'));
    }

    public function ajouter($id_cumpter)
    {
        if (is_numeric($id_cumpter)) {
            $panier = new Panier();
            $panier->ajouter($id_cumpter, 1);
        }

        header("Location: " . URI . "auths/index");
    }

    public function supprimer($id_cumpter)
    {
        if (is_numeric($id_cumpter)) {
            $panier = new Panier();
            $panier->supprimer($id_cumpter);
        }
        header("Location: " . URI . "paniers/index");

    }

    public function modifier($id_cumpter)
    {
        if (is_numeric($id_cumpter)) {
            if (isset($_POST['quantite']) && is_numeric($_POST['quantite'])) {
                $panier = new Panier();
                $panier->ajouter($id_cumpter, $_POST['quantite']);
            }

        }
        header("Location: " . URI . "paniers/index");

    }


}