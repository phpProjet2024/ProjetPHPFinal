<?php

class Image extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "image";
    }

    public function upload($data)
    {
        $this->sql = "insert into " . $this->table . "(id_cumpter, path) VALUE (:id_cumpter, :path)";
        return $this->getLines($data, null);

    }

}