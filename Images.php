<?php
require_once 'Classes/client.php';
require_once 'dbOperations/dbconnect.php';
require_once 'dbOperations/session.php';

class Images
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function display()
    {
        $dataconnect = new DbConnect();
        $database = $dataconnect->connect();
        if( isset($_GET['client_id'])){
            $id = trim($_GET['client_id']);
        }else if( isset($_POST['name'])){
            $id = trim($_POST['name']);
        }else if (isset($_SESSION['client'])){
            $id = $_SESSION['client']->getId();
        }else if (isset($_SESSION['rep'])){
            $id = $_SESSION['rep']->getRepId();
        }else if (isset($_SESSION['officer'])){
            $id = $_SESSION['officer']->getOfficerId();
        }else {
            $id = $_POST['name'];
        }

        $query = "SELECT * FROM clients WHERE client_id='$id'";
        $result = mysqli_query($database, $query);
        while ($row = mysqli_fetch_array($result)) {
            if ($row['photo'] != null) {
                echo '<img  class="user" height="150" width="150" alt="Avatar" src="data:photo;base64,' . $row['photo'] . '" >';
            } else {
                echo '<img  class="user" height="100" width="150" alt="Avatar" src="../Images/db.png" alt="Avatar">';
            }
        }
    }

    public function saveImage($image)
    {
        $dataconnect = new DbConnect();
        $database = $dataconnect->connect();
        session_start();
        $body = "" . $_SESSION['teacher'] . " have updated profile Picture";

        $querynotify = "INSERT INTO notification VALUES ('','{$body}','{$_SESSION['teacher']}',0,0,1)";
        $query = "UPDATE teacher SET photo=('$image') where nic='{$_SESSION['nic']}'";
        $result = mysqli_query($database, $query);

        if ($result) {
            echo "<script type='text/javascript'>alert('Details Succesfully Updated')</script>";
            mysqli_query($database, $querynotify);

        } else {
            echo "<script type='text/javascript'>alert('Erroe Occured...Please retry!!!!')</script>";
        }
    }
}


?>
