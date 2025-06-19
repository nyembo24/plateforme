<?php
class message{
    private $id;
    private $message;
    private $id_de;
    private $id_ar;
    private $con;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_id($id) : void{$this->id=$id;}
    public function set_message($message) : void{$this->message=$message;}
    public function set_id_de($id_de) : void{$this->id_de=$id_de;}
    public function set_id_ar($id_ar) : void{$this->id_ar=$id_ar;}
    public function envoyer_artisan(){
        $query="insert into message(description,id_de,id_ar,editeur)values(?,?,?,?)";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->message,$this->id_de,$_SESSION["user"],1));
    }
    public function selection_artisan(){
        $query="select * from message where id_de=? and id_ar=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION["id_de"],$_SESSION['user']));
        return $stmt;
    }
    public function list_utilisateur_sms_clien(){
        $query="select Distinct message.id_de,message.id_ar,artisan.username from message,artisan,demande where message.id_de=demande.id_de and message.id_ar=artisan.id_ar";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array());
        return $stmt;
    }
    public function selection_client(){
        $query="select * from message where id_ar=? and id_de=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION["id_ar"],$_SESSION['id_de']));
        return $stmt;
    }
    public function envoyer_client(){
        $query="insert into message(description,id_de,id_ar,editeur)values(?,?,?,?)";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->message,$_SESSION["id_de"],$_SESSION["id_ar"],0));
    }
    public function list_utilisateur_sms_artisan(){
        $query="select Distinct  message.id_de,client.username from message,client,demande where message.id_ar=? and client.id_cl=demande.id_cl";       
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION['user']));
        return $stmt;
    }
    public function liste_utilisateur_avis(){
        $query="select * from message where id_ar=? and client=?";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->id_ar,$_SESSION['patron']));
        return $stmt;
    }
    public function inserer_utilisateur_avi(){
        $query="insert into message(description,client,id_ar,editeur)values(?,?,?,?)";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($this->message,$_SESSION["patron"],$_SESSION["avis"],0));
    }
}
?>