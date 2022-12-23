<?php

namespace Core;


use PHPMailer\PHPMailer\PHPMailer;

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
        $id = $this->connect->getTrueIdRoom();
        $time_start = $this->connect->getTrueTimestamp('Введите дату и  время начало брони в формате. Пример: 2022-12-23 15:43:02');
        $time_finish = $this->connect->getTrueTimestamp('Введите дату и  время конец брони в формате. Пример: 2022-12-23 15:43:02');
        if ($this->connect->checkFreeRoom($time_start, $time_finish, $id)) {
            $this->addEngded();
        }
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
        $sendEmail = $this->sendEmailQuestion($email);
        $this->sendEmailProcess($sendEmail, $email, $name, $id, $time_start, $time_finish);
    }


    private function sendEmail($email, $name, $id, $start, $finish)
    {
        $mail = new PHPMailer();
        $mail->setFrom('aliftech@example.com');
        $mail->addReplyTo('replyto@example.com');
        $mail->addAddress($email, $name);
        $mail->Body = "Вы забронировали кабинет {$id}, с {$start} до {$finish} . Хорошего дня";

        if (!$mail->send()) {
            echo 'Ошибка Mailer: ' . $mail->ErrorInfo;
        } else {
            echo 'Сообщение отправлено!';
        }
    }

    public function sendEmailProcess($sendEmail, $email, $name, $id, $start, $finish)
    {
        if ($sendEmail === "yes") {
            $this->sendEmail($email, $name, $id, $start, $finish);
        } else {
            echo 'Вам не будет отправлено письмо!';
        }

    }


    public function sendEmailQuestion($email)
    {
        $checkEmail = true;
        while ($checkEmail) {
            echo "Отправить вам на почту {$email} ?\n";
            $emailAnswer = trim(fgets(STDIN));
            if ($emailAnswer === "yes") {
                $checkEmail = false;
            } elseif ($emailAnswer === "no") {
                $checkEmail = false;
            } else {
                $checkEmail = true;
            }
        }
        return $emailAnswer;
    }


}