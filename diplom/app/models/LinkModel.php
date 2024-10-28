<?php
    require_once 'DB.php';
    class LinkModel {
        private $_db = null;
        private $full_url;
        private $short_code;
        private $user_id;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($full_url, $short_code, $user_id) {
            $this->full_url = $full_url;
            $this->short_code = $short_code;
            $this->user_id = $user_id;
        }

        public function ValidForm() {
            $stmt = $this->_db->prepare("SELECT short_code FROM links WHERE short_code = :short_code");
            $stmt->execute(['short_code' => $this->short_code]);
            $link = $stmt->fetch(PDO::FETCH_ASSOC);

            // Проверка на существование логина и email
            if ($link) {
                if ($link['short_code'] === $this->short_code) {
                    return "Такое сокращение уже используется в базе";
                }
            }
            return "Верно";
        }

        //Функция, создающая запись в БД links
        public function create($full_url, $short_code, $user_id) {
            $sql = 'INSERT INTO links(full_url, short_code, user_id) VALUES(:full_url, :short_code, :user_id)';
            $stmt = $this->_db->prepare($sql);

            $full_url = htmlspecialchars(strip_tags($full_url));
            $short_code = htmlspecialchars(strip_tags($short_code));

            $stmt->bindParam(':full_url', $full_url);
            $stmt->bindParam(':short_code', $short_code);
            $stmt->bindParam(':user_id', $user_id);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function getFullUrl($short_code) {
            $sql = 'SELECT full_url FROM links WHERE short_code = :short_code';
            $stmt = $this->_db->prepare($sql);
            $stmt->bindParam(':short_code', $short_code);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return $row['full_url'];
            }

            return null;
        }

        // Функция, в которой я получаю id определенного пользователя и беру все созданные им ссылки
        public function constantUserLinks($user_id) {
            $stmt = $this->_db->prepare( 'SELECT * FROM links WHERE user_id = :user_id');
            $stmt->execute(['user_id' => $user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteLink($id) {
            $stmt = $this->_db->prepare('DELETE FROM links WHERE id = :id');
            $stmt->execute(['id' => $id]);
        }
    }
