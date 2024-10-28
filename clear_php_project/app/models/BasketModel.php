<?php
    session_start(); // Запуск сессии
    class BasketModel {
        private $session_name = 'cart';

        public function isSetSession() {
            return isset($_SESSION[$this->session_name]);
        } // Проверка на подключение к сессии

        public function deleteSession() {
            unset($_SESSION[$this->session_name]);
        } // Удаление сессии

        public function getSession() {
            return $_SESSION[$this->session_name];
        } // Возвращение значения сессии

        public function addToCart($itemID) {
            if(!$this->isSetSession())
                $_SESSION[$this->session_name] = $itemID;
            else {
                $items = explode(",", $_SESSION[$this->session_name]);

                $itemExist = false;
                foreach ($items as $el) {
                    if($el == $itemID)
                        $itemExist = true;
                } // Если данный товар же есть в сессии, то повторно он добавляться повторно не будет

                if(!$itemExist)
                    $_SESSION[$this->session_name] = $_SESSION[$this->session_name] . ',' . $itemID;
            }
        } // Добавление товаров в сессию

        public function countItems() {
            if(!$this->isSetSession())
                return 0;
            else {
                $items = explode(",", $_SESSION[$this->session_name]);
                return count($items);
            }
        } // Подсчитывание товаров в сессии

        public function deleteItem($itemID) {
            if(!$this->isSetSession()) {
                return;
            }

            $spisok = explode(',', $_SESSION[$this->session_name]);

            if(count($spisok) == 1) {
                $this->deleteSession();
                return;
            }

            $element_delete_index = array_search($itemID, $spisok);
            if($element_delete_index !== false) {
                unset($spisok[$element_delete_index]);
            }

            $_SESSION[$this->session_name] = implode(',', $spisok);

            if (empty($spisok)) {
                $this->deleteSession();
            }
        }
    }