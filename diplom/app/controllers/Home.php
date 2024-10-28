<?php
    class Home extends \Controller {
        public function index() {
            $data = [];

            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['email'],$_POST['login'], $_POST['password']);

                $isValid = $user->ValidForm();
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }

            // Вытаскиваем id авторизованного сейчас пользователя для отображение его сокращенных ссылок
            $user_model = $this->model('UserModel');
            $user_with_auth = $user_model->getUser();
            if ($user_with_auth) {
                $user_id = $user_with_auth['id'];
                $link = $this->model('LinkModel');

                if(isset($_POST['long_link']) && isset($_POST['short_link'])) {
                    $link->setData($_POST['long_link'], $_POST['short_link'], $user_id);
                    $isValid = $link->ValidForm();
                    if($isValid == "Верно")
                        $link->create($_POST['long_link'], $_POST['short_link'], $user_id);
                    else
                        $data['message'] = $isValid;
                }
                // Получаем ссылки пользователя
                $data['links'] = $link->constantUserLinks($user_id);
            }
//            else {
//                // Обработка случая, когда пользователь не авторизован
//                $data['message'] = "";
//            }

            if(isset($_POST['delete_btn'])) {
                $user_id = $user_with_auth['id'];
                $comment = $this->model('LinkModel');
                $comment->deleteLink($_POST['delete_btn']);

                $data['links'] = $comment->constantUserLinks($user_id);
            }

            $this->view('home/index', $data);
        }
    }