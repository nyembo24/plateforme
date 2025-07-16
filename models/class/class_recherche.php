<?php
class recherche{
    private $id;
    private $query;
    private $con;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_id($id) : void{$this->id=$id;}
    public function set_query($query) : void{$this->query=$query;}
    public function artisan(){
        $querys="select artisan.id_ar as id_pr,artisan.username,profil.nom,profil.profession,profil.image_profil,profil.document,profil.email,profil.tel,profil.description from artisan,profil where profil.nom like ? or profil.profession like ? or profil.description like ?";
        $stmt=$this->con->prepare($querys);
        $stmt->execute(array("%$this->query%","%$this->query%","%$this->query%"));
        return $stmt;
    }
    public function demande_client(){
        $querys="select * from demande where sujet like ? and id_cl=?";
        $stmt=$this->con->prepare($querys);
        $stmt->execute(array("%$this->query%",$_SESSION["patron"]));
        return $stmt;
    }
    public function message_client(){
        $querys="select Distinct message.id_de,message.id_ar,artisan.username from message,artisan,demande where message.id_de=demande.id_de and message.id_ar=artisan.id_ar and artisan.username like ?";
        $stmt=$this->con->prepare($querys);
        $stmt->execute(array("%$this->query%"));
        return $stmt;
    }
}
