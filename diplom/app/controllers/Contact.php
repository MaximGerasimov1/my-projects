<?php
    require 'vendor/autoload.php';

    class Contact extends Controller {
        public function index() {
            $data = [];
            if(isset($_POST['name'])) {
                $mailer = $this->model('MailerModel'); // Создание объекта для отправки письма
                $mail = $this->model('ContactModel');
                $mail->setData($_POST['name'], $_POST['email'],$_POST['age'], $_POST['message']);

                $isValid = $mail->ValidForm();
                if($isValid == "Верно")
                    $data['message'] = $mailer->sendMail('max.gerasimov.2005@mail.ru', 'Тестирование', 'Это тестовое сообщение');
//                    $data['message'] = $mail->mail();
                else
                    $data['message'] = $isValid;
            }

            $this->view('contact/index', $data);
        }

        public function about() {
            $this->view('contact/about');
        }
    }