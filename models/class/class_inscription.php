<?php
class user{
    private $id;
    private $usr;
    private $pwd;
    private $email;
    private $tel;
    private $fonction;
    private $con;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_id($id) : void{$this->id=$id;}
    public function set_usr($usr) : void{$this->usr=$usr;}
    public function set_pwd($pwd) : void{$this->pwd=$pwd;}
    public function set_email($email) : void{$this->email=$email;}
    public function set_tel($tel) : void{$this->tel=$tel;}
    public function set_fonction($fonction) : void{$this->fonction=$fonction;}
    public function insert_client(){
        $pwd=password_hash($this->pwd,PASSWORD_DEFAULT);
        $query="insert into client(username,password,tel,email) values(?,?,?,?)";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->usr,$pwd,$this->tel,$this->email))){
            return true;
        }
        else{
            return false;
        }
    }
    public function insert_artisan(){
        $pwd=password_hash($this->pwd,PASSWORD_DEFAULT);
        $query="insert into artisan(username,password,tel,email,activer) values(?,?,?,?,?)";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->usr,$pwd,$this->tel,$this->email,0))){
            return true;
        }
        else{
            return false;
        }
    }
    public function verifier_client(){
        $query="select * from client where username=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->usr));
        if($stmt->fetch()){
            return false;
        }
        else{
            return true;
        }
    }
    public function verifier_artisan(){
        $query="select * from artisan where username=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->usr));
        if($stmt->fetch()){
            return false;
        }
        else{
            return true;
        }
    }
    public function login_artisan(){
        $query="select * from artisan where username=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->usr));
        if($val=$stmt->fetch()){
            if(password_verify($this->pwd,$val['password'])){
                $_SESSION["user"]=$val['id_ar'];
                return true;
            }
        }
    }
    public function login_client(){
        $query="select * from client where username=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->usr));
        if($val=$stmt->fetch()){
            if(password_verify($this->pwd,$val['password'])){
                $_SESSION["patron"]=$val['id_cl'];
                return true;
            }
        }
    }
    public function login_admin(){
        $query="select * from utilisateur where username=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->usr));
        if($val=$stmt->fetch()){
            if(password_verify($this->pwd,$val['password'])){
                $_SESSION["admin"]=$val['id_usr'];
                return true;
            }
        }
    }
    public function profil(){
        $query="select image_profil from profil where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION["user"]));
        if($val=$stmt->fetch()){
            return $val["image_profil"];
        }
        else{
            return "defaul.png";
        }
    }
    public function initialiser(){
        $query="insert into profil(nom,profession,image_profil,document,email,tel,id_ar)values(?,?,?,?,?,?,?)";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array("name","artisan","defaul.png","Chapitre III.pdf","exemple@gmail.com","+243...",$_SESSION["user"]))){
            return true;
        }
        else{
            return false;
        }
    }
    public function verifier_initialisation(){
        $query="select * from profil where id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION["user"]));
        if($val=$stmt->fetch()){
            return false;
        }
        else{
            return true;
        }
    }
}
?>