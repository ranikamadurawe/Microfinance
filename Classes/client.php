<?php
require_once '../dbOperations/pdo.php';

class client
{
    private $first_name;
    private $last_name;
    private $nic;
    private $acc_no;
    private $id;

    function __construct($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE client_id=:id");
        $stmt->execute(array(
            'id'=>$id
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $id;
        $this->nic = $row['nic'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->acc_no = $row['acc_no'];
    }

    public function getAccNo()
    {
        return $this->acc_no;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }


    public function getNic()
    {
        return $this->nic;
    }


    public function getId()
    {
        return $this->id;
    }

}