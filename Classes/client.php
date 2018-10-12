<?
require_once '../dbOperations/pdo.php';
class Client
{
    private $first_name;
    private $last_name;
    private $nic;
    private $acc_no;

    function __construct($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Clients WHERE client_id=:id");
        $stmt->execute(array(
            'id'=>$id
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

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

}