<?php

class Cumpter extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "cumpter";
    }

    public function ajouter($data)
    {
        $this->sql = "insert into " . $this->table . " (nom, prix, description, courte_description, quantite) 
        VALUE (:nom, :prix, :description, :courte_description, :quantite)";
        return $this->getLines($data, null);

    }

    public function getAll()
    {
        $this->sql = "SELECT c.*, i.path from " . $this->table .
            " c left join Image i on c.id_cumpter = i.id_cumpter";

        return $this->getLines();
    }

    public function lire($data)
    {
        $this->sql = "SELECT c.*, i.path from " . $this->table .
            " c left join Image i on c.id_cumpter = i.id_cumpter where c.id_cumpter = :id_cumpter";

        return $this->getLines($data, true);
    }

    public function deleteById($data)
    {
        $this->sql = "delete from " . $this->table . " where id_cumpter = :id_cumpter";
        return $this->getLines($data, null);

    }
    public function update($data){
        $this->sql = "UPDATE   $this->table SET nom = :nom , 
        prix = :prix , 
        courte_description = :courte_description ,
        description = :description , 
        quantite = :quantite   where id_cumpter = :id_cumpter";
        return $this->getLines($data, null);   
    }


}