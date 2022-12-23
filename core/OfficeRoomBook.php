<?php

namespace Core;


class OfficeRoomBook
{
    public $connect;
    public $rooms;

    public function __construct()
    {
        $this->connect = new DataBase();
    }

    public function listRooms()
    {
        $this->connect->echoList();
    }

    public function listFreeRooms($id)
    {
        $this->connect->checkFreeRooms($id);
    }

    public function listFreeRoomsInTime()
    {
        echo "Введите дату и  время начало брони в формате. Пример: 2022-12-23 15:43:02";
        $time_start = trim(fgets(STDIN));
        echo "Введите  дату и  время конец брони в формате. Пример: 2022-12-23 15:43:02";
        $time_finish = trim(fgets(STDIN));

//        $this->connect
    }

    public function addEngded()
    {
        $id = $this->connect->getTrueIdRoom();
        $time_start = $this->connect->getTrueTimestamp('Введите дату и  время начало брони в формате. Пример: 2022-12-23 15:43:02');
        $time_finish = $this->connect->getTrueTimestamp('Введите дату и  время конец брони в формате. Пример: 2022-12-23 15:43:02');
        echo "Введите Имя\n";
        $name = trim(fgets(STDIN));
        $email = $this->connect->getTrueEmail("Введите email");
        $this->connect->addEngaded($id, $time_start, $time_finish, $name, $email);
    }

}