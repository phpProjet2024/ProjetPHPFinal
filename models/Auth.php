<?php

class Auth extends Model
{
    const USER = "Utilisateur";
    const ADMIN = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->table = self::USER;
    }

    public function inscription($datas)
    {
        $this->sql = "INSERT INTO " . $this->table . " (nom,prenom,email,mot_de_passe,numero_telephone,id_role,actif) 
        Values(:nom,:prenom,:email,:mot_de_passe,:numero_telephone,:id_role,:actif)";

        return $this->getLines($datas, null);
    }

    public function findByEmail($datas)
    {
        $this->sql = "SELECT u.*,r.description FROM " . $this->table . " u JOIN Role r on u.id_role = r.id_role WHERE email=:email";
        return $this->getLines($datas, true);
    }

    public function findByNom($datas)
    {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE nom=:nom";
        return $this->getLines($datas, null);
    }
    public function getAll()
    {
        $this->sql = "SELECT u.*,r.description FROM " . $this->table . " u JOIN Role r on u.id_role = r.id_role" ;
        return $this->getLines();
    }
    public function bloquer($data){
        $this->sql = "UPDATE   $this->table SET actif = 0 where id_utilisateur= :id_utilisateur";
        return $this->getLines($data, true); 
    }
    public function deleteUser($data){
        $this->sql = "delete from " . $this->table . " where id_utilisateur = :id_utilisateur";
        return $this->getLines($data, null);

    }
    public function update($data){
        $this->sql = "UPDATE   $this->table SET id_role = :id_role  where id_utilisateur = :id_utilisateur";
        return $this->getLines($data, null);   
    }
    public function lire($data)
    {
        $this->sql = "SELECT u.*, r.description from " . $this->table .
            " u left join role r on u.id_role = r.id_role where u.id_utilisateur = :id_utilisateur";

        return $this->getLines($data, true);
    }
}
