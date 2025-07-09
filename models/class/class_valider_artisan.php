<?php
class valider{
    private $id;
    private $con;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_id($id) : void{$this->id=$id;}
    public function non_valider(){
        $query="select profil.id_ar,artisan.username from artisan,profil where activer=? and profil.id_ar=artisan.id_ar";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array(0));
        return $stmt;
    }
    public function activer_profil(){
        $query="update artisan set activer=? where id_ar=?";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array(1,$this->id))){
            return true;
        }
        else{
            return false;
        }
    }
    public function email(){
        $query="select email from artisan where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->id));
        return $stmt->fetch()["email"];
    }
    public function lister_avis(){
        $query="select avis.id_ar,artisan.username from avis,artisan where avis.id_ar=artisan.id_ar and avis.valider=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array(0));
        return $stmt;
    }

}