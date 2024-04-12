<?php

class Panier
{
    const NAME = "Panier";

    public function __construct()
    {
        if (!isset($_SESSION[self::NAME])) {
            $_SESSION[self::NAME] = [];
        }
    }

    public function ajouter($id_cumpter, $quantite)
    {
        $_SESSION[self::NAME][$id_cumpter] = $quantite;
    }

    public function supprimer($id_cumpter)
    {
        unset($_SESSION[self::NAME][$id_cumpter]);
    }

    public function getAll()
    {
        $cumpter = [];
        foreach ($_SESSION[self::NAME] as $id_cumpter => $quantite) {
            $cumpter = new Cumpter();

            $currentCumpter = $cumpter->lire(compact('id_cumpter'));
            if ($currentCumpter) {
                $Cumpters[] = [$quantite, $currentCumpter];
            } else {
            unset($_SESSION[self::NAME][$id_cumpter]);
            }
        }
        return $Cumpters;
    }

}