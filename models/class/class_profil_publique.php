<?php 
class publique{
    private $id;
    private $description;
    private $nom;
    private $profession;
    private $photo_profil;
    private $document;
    private $mail;
    private $tel;
    private $con;
    private $limite;
    private $afficher;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_limite($limite) : void{$this->limite=$limite;}
    public function set_afficher($afficher) : void{$this->afficher=$afficher;}
    public function set_id($id) : void{$this->id=$id;}
    public function set_nom($nom) : void{$this->nom=$nom;}
    public function set_profession($profession) : void{$this->profession=$profession;}
    public function set_photo_profil($photo_profil) : void{$this->photo_profil=$photo_profil;}
    public function set_document($document) : void{$this->document=$document;}
    public function set_mail($mail) : void{$this->mail=$mail;}
    public function set_tel($tel) : void{$this->tel=$tel;}
    public function set_description($description) : void{$this->description=$description;}
    public function selection(){
        $query="select profil.id_ar as id_pr,profil.nom,profil.profession,profil.image_profil,profil.description from profil,artisan where artisan.activer=? LIMIT $this->limite, $this->afficher";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array(1));
        return $stmt;
    }
    public function selection_un_artisan(){
        $query="select * from profil where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->id));
        return $stmt->fetch();
    }
    public function insert_commentaire(){
        $query="insert into avis(description,id_ar,valider)values(?,?,?)";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->description,$this->id,0))){
            return true;
        }
        else{
            return false;
        }
    }
    public function select_commentaire(){
        $query="select description from avis where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->id));
        return $stmt;
    }
    public function pagination_profil(){
        $query="select count(id_ar) as nb from artisan where activer=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array(1));
        return $stmt->fetch();

    }

}
?>