<?php 
class profil{
    private $id;
    private $nom;
    private $profession;
    private $photo_profil;
    private $document;
    private $mail;
    private $tel;
    private $con;
    private $tmp_photo;
    private $tmp_dossier;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_id($id) : void{$this->id=$id;}
    public function set_nom($nom) : void{$this->nom=$nom;}
    public function set_profession($profession) : void{$this->profession=$profession;}
    public function set_photo_profil($photo_profil) : void{$this->photo_profil=$photo_profil;}
    public function set_document($document) : void{$this->document=$document;}
    public function set_mail($mail) : void{$this->mail=$mail;}
    public function set_tmp_photo($tmp_photo) : void{$this->tmp_photo=$tmp_photo;}
    public function set_tmp_dossier($tmp_dossier) : void{$this->tmp_dossier=$tmp_dossier;}
    public function set_tel($tel) : void{$this->tel=$tel;}
    public function update(){
        $query="update profil set nom=?,profession=?,image_profil=?,document=?,email=?,tel=? where id_ar=?";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->nom,$this->profession,$this->photo_profil,$this->document,$this->mail,$this->tel,$this->id))){
            return true;
        }
        else{
            return false;
        }
    }
    public function inserer(){
        $query="insert into profil(nom,profession,image_profil,document,email,tel,id_ar)values(?,?,?,?,?,?,?)";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->nom,$this->profession,$this->photo_profil,$this->document,$this->mail,$this->tel,$this->id))){
            return true;
        }
        else{
            return false;
        }
    }
    public function existe(){
        $query="select * from profil where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->id));
        if($stmt->fetch()){
            return true;
        }
        else{
            return false;
        }
    }
    public function deplacer(){
        $dossier1="../../image/".$this->photo_profil;
        $dossier2="../../image/".$this->document;
        if(move_uploaded_file($this->tmp_photo,$dossier1) and move_uploaded_file($this->tmp_dossier,$dossier2)){
            return true;
        }
        else{
            return false;
        }
    }
    public function lister(){
        $query="select * from profil where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION['user']));
        return $stmt;
    }

}
?>