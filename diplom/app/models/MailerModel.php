<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class MailerModel {
        private $mail;

        public function __construct() {
            $this->mail = new PHPMailer(true);

            $this->mail->isSMTP();                                     // Указывается, что будет использоваться SMTP
            $this->mail->Host       = 'smtp.example.com';              // Указывается SMTP сервер
            $this->mail->SMTPAuth   = true;                            // Подключается SMTP авторизация
            $this->mail->Username   = 'user@example.com';              // SMTP логин(берется с сайта SendGrind)
            $this->mail->Password   = 'secret';                        // SMTP пароль(также с сайта SendGrind)
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     // Подключается TLS шифрование. Можно - `ssl`
            $this->mail->Port       = 465;                             // TCP порт для подключения
            $this->mail->CharSet = 'UTF-8';
            $this->mail->Encoding = 'base64';
        }

        public function sendMail($to, $subject, $body) {
            try {
                // Получатели
                $this->mail->setFrom('max.gerasimov.20@mail.ri', 'Maxim');
                $this->mail->addAddress($to);

                // Контент
                $this->mail->isHTML(true);
                $this->mail->Subject = $subject;
                $this->mail->Body = $body;

                $this->mail->send();
                return 'Сообщение было отправлено';
            } catch (Exception $e) {
                return "Сообщение не было отправлено. Mailer ошибка: {$this->mail->ErrorInfo}";
            }
        }
    }