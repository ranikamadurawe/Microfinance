<?php


class manager
{
    private $manager_id;
    private $branch;
    private $region;

    function __construct($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM managers WHERE manager_id=:id");
        $stmt->execute(array(
            'id' => $id
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->manager_id = $row['manager_id'];
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

    public function getManagerId()
    {
        return $this->manager_id;
    }

}