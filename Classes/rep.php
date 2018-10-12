<?php
require_once '../dbOperations/pdo.php';
class rep
{
    private $rep_id;
    private $region;

    function __construct($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM representatives WHERE rep_id=:id");
        $stmt->execute(array(
            'id'=>$id
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->rep_id = $row['rep_id'];
        $this->region = $row['region'];

    }


    public function getRegion()
    {
        return $this->region;
    }

    public function getRepId()
    {
        return $this->rep_id;
    }

}