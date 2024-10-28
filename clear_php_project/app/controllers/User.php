<?php
    class User extends Controller {
        public function reg() {
            $data = [];
            if (isset($_POST['name'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);

                $isValid = $user->validForm();
                if ($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }
            $this->view('user/reg', $data);
        }

        public function dashboard() {
            $data = [];
            $spisok = [];

            $user = $this->model('UserModel');

            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            if (isset($_FILES['image-file']) && $_FILES['image-file']['error'] == UPLOAD_ERR_OK && $_FILES['image-file']['size'] < 500 * 1024) {
                $uploadDir = 'public/user_account_img/'; // Путь к папке для загрузки изображений
                $fileExtension = pathinfo($_FILES['image-file']['name'], PATHINFO_EXTENSION); // Получаем расширение файла
                $newFileName = time() . '.' . $fileExtension; // Создаем новое имя файла на основе текущего времени
                $uploadFile = $uploadDir . $newFileName; // Полный путь к загружаемому файлу

                // Проверка типа файла
                $fileType = mime_content_type($_FILES['image-file']['tmp_name']);
                if (in_array($fileType, ['image/jpeg', 'image/png'])) {
                    // Перемещение загруженного файла в указанную директорию
                    if (move_uploaded_file($_FILES['image-file']['tmp_name'], $uploadFile)) {
                        $user->saveUserImage($newFileName); // Сохранение нового имени файла в базе данных
                        $spisok['message'] = "Изображение успешно загружено.";
                    } else {
                        $spisok['message'] = "Ошибка при перемещении загруженного файла.";
                    }
                } else {
                    $spisok['message'] = "Недопустимый тип файла. Загружайте только JPEG или PNG.";
                }
            } elseif (isset($_FILES['image-file'])) {
                // Обработка ошибок загрузки
                $spisok['message'] = "Ошибка при загрузке файла.";
            }

            $this->view('user/dashboard', array_merge($user->getUser(), $spisok));
        }

        public function auth() {
            $data = [];

            if(isset($_POST['email'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['email'], $_POST['pass']);
            }

            $this->view('user/auth', $data);
        }
    }