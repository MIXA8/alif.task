<?php

namespace Core;


class DataBase
{

    const HOST = 'localhost';
    const DB_NAME = 'alif.tech';
    const LOGIN = 'root';
    const PASSWORD = '';
    public $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect(self::HOST, self::LOGIN, self::PASSWORD, self::DB_NAME);
    }


    public function echoList()
    {
        $sql = 'SELECT * FROM `rooms`';
        $result = $this->connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Номер: " . $row["id"] . " - Названия: " . $row["title"] . " \n";
            }
        } else {
            echo "Комнат нет";
        }
    }

    public function checkFreeRoom($time_start, $time_finish, $id)
    {
        $sql = "SELECT * FROM `engadedroom` WHERE  `id_room`={$id} AND
                               (`user_start_time`>='{$time_start}' AND `user_finish_time`<='{$time_finish}') OR 
                                 ( (`user_start_time`<='{$time_start}' AND `user_finish_time`>='{$time_start}') ) OR 
                                 ( (`user_start_time`<='{$time_finish}' AND `user_finish_time`>='{$time_finish}') ) ";
        $result = $this->connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Занято! {$row['user_name']}\n";
                echo "email {$row['email']}\n";
                echo "Начнеться {$row['user_start_time']}\n";
                echo "закончиться {$row['user_finish_time']}\n";
            }
        } else {
            echo 'Комната свободна!' . "\n";
            return true;
        };
    }

    public function addEngaded($id, $time_start, $time_finish, $name, $email)
    {
        $sql = "INSERT INTO `engadedroom`(`id`, `id_room`, `user_name`, `email`, `user_start_time`, `user_finish_time`, `createad_at`, `updated_at`) 
                VALUES (NULL,{$id},'{$name}','{$email}','{$time_start}','{$time_finish}',now(),now())";
        $result = $this->connect->query($sql);
    }


    public function getTrueIdRoom(): int
    {
        $checkId = true;
        while ($checkId) {
            $this->echoList();
            echo "Введите номер какой комнаты хотите забронировать\n";
            $id = trim(fgets(STDIN));
            $checkId = $this->checkIdRoom($id);
        }
        return $id;
    }


    public function getTrueTimestamp($string)
    {
        $checkTime = true;
        while ($checkTime) {
            echo "{$string}\n";
            $time = trim(fgets(STDIN));
            $checkTime = $this->is_Date($time);
        }
        return $time;
    }

    public function getTrueEmail($string)
    {
        $checkEmail = true;
        while ($checkEmail) {
            echo "{$string}\n";
            $email = trim(fgets(STDIN));
            $checkEmail = $this->is_Email($email);
        }
        return $email;
    }


    function is_Email($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function is_Date($str)
    {
        return !is_numeric(strtotime($str));
    }

    public function checkIdRoom($id)
    {
        $sql = 'SELECT * FROM `rooms`';
        $result = $this->connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['id'] === $id) return false;
            }
            return true;
        }
        return true;
    }


}