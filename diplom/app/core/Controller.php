<?php
    class Controller {
        protected function model($model) {
            require_once 'app/models/' . $model . '.php';
            return new $model();
        } // Метод для создания модели на основе передаваемого в этот метод параметра

        protected function view($view, $data = []) {
            require_once 'app/views/' . $view . '.php';
        } // Метод, с помощью которого идет подключение к нужному шаблону
    }