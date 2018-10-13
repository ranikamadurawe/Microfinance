<?php
require_once '../dbOperations/pdo.php';

class officer
{
    private $officer_id;
    private $branch;
    private $region;

    function __construct($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM officers WHERE officer_id=:id");
        $stmt->execute(array(
            'id' => $id
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->officer_id = $row['officer_id'];
        $this->branch = $row['branch'];
        $this->region = $row['region'];

    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getBranch()
    {
        return $this->branch;
    }

    public function getOfficerId()
    {
        return $this->officer_id;
    }


}