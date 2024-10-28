<?php
    class Basket extends Controller {
        public function index() {
            $data = [];

            if(isset($_POST['delete_for_id'])) {
                $products = $this->model('Products');
                $cart = $this->model('BasketModel');
                $cart->deleteItem($_POST['delete_for_id']);
            }

            if(isset($_POST['delete_all'])) {
                $cart = $this->model('BasketModel');
                $cart->deleteSession();
            }

            $cart = $this->model('BasketModel');
            if(isset($_POST['item_id'])) {
                $cart->addToCart($_POST['item_id']);
            }


            if(!$cart->isSetSession())
                $data['empty'] = 'Пустая корзина';
            else {
                $products = $this->model('Products');
                $data['products'] = $products->getProductsCart($cart->getSession());
            }

            $this->view('basket/index', $data);
        }

        public function confirm() {
            require 'vendor/autoload.php';
            \Cloudipsp\Configuration::setMerchantId(1396424);
            \Cloudipsp\Configuration::setSecretKey('test');

            $checkoutData = [
                'currency' => 'USD',
                'amount' => $_POST['amount'],
                'order_desc' => 'Покупка товаров в магазине MaxGDev'
            ];
            $data = \Cloudipsp\Checkout::url($checkoutData);
            $url = $data->getUrl();
            $data->toCheckout();
        }
    }