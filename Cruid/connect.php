<?php

class Connect{
    public $conn;
    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=ctg323","root","");
    }

    public function showNote(){
        $statement=$this->conn->prepare("SELECT * FROM  phonebook");
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function update($user_name,$phone,$address,$id)
	{
		$user_name = addslashes($user_name);
		$statement = $this->conn->prepare("UPDATE phonebook SET user_name='$user_name',phone='$phone',address='$address' WHERE id=$id;");
		$statement->execute();
	}

	
	public function delete($id)
	{
		$statement = $this->conn->prepare("DELETE FROM phonebook WHERE id=$id;");
		$statement->execute();
	}

    public function getNote($id){
        $statement=$this->conn->prepare("SELECT * FROM  phonebook WHERE id=$id;");
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function addNote($user_name,$phone,$address){
        $statement = $this->conn->prepare("INSERT INTO phonebook (user_name,phone,address) VALUES (:user_name,:phone,:address)");
                $statement->execute(
                    array(
                        ':user_name'=>$user_name,                       
                        ':phone'=>$phone,
                        ':address'=>$address
                    )
                );
    }

} 


?>