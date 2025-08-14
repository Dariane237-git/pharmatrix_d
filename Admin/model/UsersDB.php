<?php
require_once 'Database.php';

class UserBD {
    private $db;
    private $tablename;
    private $tableid;

    public function __construct() {
        $this->db= new Database();
        $this->tablename= 'users'; //permet de dupliquer le fichier et rendre plus facile dans les autres tables on chanege juste les noms des differentes table ex:tablename='all-medicament'
        $this->tableid= 'users_id';


    }

    public function create ($id, $first_name, $last_name, $phone, $location, $email, $password, $role, $photo){
        //avec une autre methode "values"
        //$sql+ "insert into $this->tablename (first_name, last_name, phone, location, email, password, role, photo) values(?,?,?,?,?,?,?,?)";
       $sql= "insert into $this->tablename set first_name=?, last_name=?, phone=?, location=?, email=?, password=?, role=?, photo=?";
       $params= array($first_name, $last_name, $phone, $location, $email, $password, $role, $photo ,$id);
       $this->db->prepare($sql, $params);
    }

    //lors d'un update on ne recupere rien on laisse la methode prepare
    // le ? oblige de respecter l'ordre 

    public function update($id, $first_name, $last_name, $phone, $location, $email, $password, $role, $photo){
       $sql= "update $this->tablename set first_name=?, last_name=?, phone=?, location=?, email=?, password=?, role=?, photo=? where $this->tableid=?";
       $params= array($first_name, $last_name, $phone, $location, $email, $password, $role, $photo ,$id);
       $this->db->prepare($sql, $params);
    }

    public function delete($id){
       $sql="delete from $this->tablename where $this->tableid=?";
       $params= array($id);
       $this->db->prepare($sql, $params);
    }

    public function read($id){
       $sql="select * from $this->tablename where $this->tableid=?";
       $params= array($id);
       $req= $this->db->prepare($sql, $params);
       return $this->db->getDatas($req, true);
    }

    public function readAll(){ //on recupere tout les elements
       $sql="select * from $this->tablename  order by $this->tableid desc";
       $params= null;
       $req= $this->db->prepare($sql, $params);
       return $this->db->getDatas($req, false);
    }

    public function readConnexion($email, $password){ //pour les pages de connexion
       $sql="select * from $this->tablename  where email=? and password=?";
       $params= array($email, $password);
       $req= $this->db->prepare($sql, $params);
       return $this->db->getDatas($req, true);
    }

}
?>