<?php

use Core\OfficeRoomBook;

require 'vendor/autoload.php';
$true = true;
while ($true) {
    $programm = new OfficeRoomBook();
    $programm->listFreeRoomsInTime();
    echo "Хотите выйти, и похвалить разработчика?)\n";
    $exit = trim(fgets(STDIN));
    if ($exit === "yes") {
        $true = false;
    }
}

