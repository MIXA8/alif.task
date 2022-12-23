<?php

class DataBase
{

    const HOST = 'localhost';
    const DB_NAME = 'alif.tech';
    const LOGIN = 'root';
    const PASSWORD = ' ';
    public $connect;

    public function __construct()
    {
        $this->connect=mysqli_connect(self::HOST,self::LOGIN,self::PASSWORD,self::DB_NAME);
    }


    public function EchoList(){
        $sql='SELECT * FROM `rooms`';
        $result = $this->connect->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }


}