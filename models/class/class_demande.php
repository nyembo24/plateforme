<?php 
class demande{
    private $id;
    private $sujet;
    private $con;
    private $descript;
    public function __construct($con){
        $this->con=$con;
    }
    public function set_id($id) : void{$this->id=$id;}
    public function set_sujet($sujet) : void{$this->sujet=$sujet;}
    public function set_descript($descript) : void{$this->descript=$descript;}
    public function publier(){
        $query="insert into demande(sujet,description,suspendu,id_cl)values(?,?,?,?)";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->sujet,$this->descript,0,$_SESSION["patron"]))){
            return true;
        }
        else{
            return false;
        }
    }
    public function afficher(){
        $query="select * from demande where id_cl=? order by id_de DESC";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array($_SESSION["patron"]));
        return $stmt;
    }
    public function retirer(){
        $query="delete from demande where id_de=? and id_cl=?";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array($this->id,$_SESSION['patron']))){
            return true;
        }
        else{
            return false;
        }
    }
    public function suspendre(){
        $query="update demande set suspendu=? where id_de=?";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array(1,$this->id))){
            return true;
        }
        else{
            return false;
        }
    }
    public function pas_suspendre(){
        $query="update demande set suspendu=? where id_de=?";
        $stmt=$this->con->prepare($query);
        if($stmt->execute(array(0,$this->id))){
            return true;
        }
        else{
            return false;
        }
    }
    public function afficher_tout_demande(){
        $query="select * from demande where suspendu=? order by id_de DESC";
        $stmt=$this->con->prepare($query);
        $stmt->execute(array(0));
        return $stmt;
    }

}
?>