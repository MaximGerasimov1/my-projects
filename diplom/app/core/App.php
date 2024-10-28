<?php
    class App {
        protected $controller = 'Home'; // Установление контроллера по умолчанию
        protected $method = 'index'; // Установление метода по умолчанию
        protected $params = []; // Массив для возмодных дополнительных параметров метода

        public function __construct() {
            $url = $this->parseUrl(); // Получение url в нужном виде

            if(file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            } // Если существует контроллер, то в переменную controller указывается текущий контроллер из url

            require_once 'app/controllers/' . $this->controller . '.php'; // Подклюение текущего контроллера

            $this->controller = new $this->controller; // Создание объекта на основе текущего контроллера
            if(isset($url[1])) { // если в url есть метод
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }  // Проверка наличия данного метода в текущем контроллере и в положительном случае установление
            } // этого метода в переменную method

            $this->params = $url ? array_values($url) : []; // Доп параметры помещаются в массив params

            call_user_func_array([$this->controller, $this->method], $this->params);  // Вызов текущего метода в текущем контроллере
            // с передаваемыми параметрами
        }

        public function parseUrl() {
            if(isset($_GET['url'])) {
                return explode('/' ,filter_var(
                    rtrim($_GET['url'], '/'),
                    FILTER_SANITIZE_STRING
                ));
            }
        }
    }