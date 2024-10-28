<?php
    class Categories extends Controller {
        public function index($page = 1) {
            $products = $this->model('Products');

            $productPerPage = 3; // Количество товаров на странице для пагинации

            $totalProducts = $products->getTotalProducts(); // Получение общего количество товаров из таблицы products

            $totalPages = ceil($totalProducts / $productPerPage); // Общее количество страниц для пагинации

            if($page < 1) {
                $page = 1;
            } elseif ($page > $totalPages) {
                $page = $totalPages;
            } // Проеврка, означающая, если введется кол-во страниц меньше чем 1 - будет установлено значение у
            // страницы 1, если же будет введено число больше чем количество допустимых страниц, то будет установлена
            // последняя страница по счету

            $offset = ($page - 1) * $productPerPage; // Вычисление смещения

            $data = [
                'products' => $products->getLimited($offset, $productPerPage),
                'title' => 'Все товары на сайте',
                'currentPage' => $page,
                'totalPages' => $totalPages
            ];

            $this->view('categories/index', $data);
        }

        public function shoes() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shoes'), 'title' => 'Категория обувь'];
            $this->view('categories/index', $data);
        }

        public function hats() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('hats'), 'title' => 'Категория кепки'];
            $this->view('categories/index', $data);
        }

        public function shirts() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shirts'), 'title' => 'Категория футболки'];
            $this->view('categories/index', $data);
        }

        public function watches() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Категория часы'];
            $this->view('categories/index', $data);
        }
    }