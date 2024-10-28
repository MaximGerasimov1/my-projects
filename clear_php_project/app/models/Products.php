<?php
    require 'DB.php';

    class Products {
        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function getProducts() {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Функция для получения целого числа всех товаров
        public function getTotalProducts() {
            $result = $this->_db->query("SELECT COUNT(*) FROM `products`");
            return (int)$result->fetchColumn();
        }

        // Получение лимитированного количества товаров для пагинации(в нашем случае 3)
        public function getLimited($offset, $limit) {
            $stmt = $this->_db->prepare("SELECT * FROM `products` ORDER BY `id` DESC LIMIT :offset, :limit");
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsLimited($order, $limit) {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsCategory($category) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOneProduct($id) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public  function getProductsCart($items) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }