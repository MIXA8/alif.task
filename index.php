<?php

use Core\OfficeRoomBook;

require 'vendor/autoload.php';


$programm = new OfficeRoomBook();
$programm->listFreeRoomsInTime();
//$id = trim(fgets(STDIN));
//$programm->listFreeRooms($id);
//$data1='2022-12-23 15:43:02';
//$data2='2022-12-23 17:43:02';
////$result=();
//echo($data1<$data2);
