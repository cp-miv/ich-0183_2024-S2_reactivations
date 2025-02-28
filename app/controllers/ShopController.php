<?php

namespace App\Controllers;

use App\Models\Shop;

class ShopController extends AppController
{
    public function index(): void
    {
        $this->view['shops'] = Shop::getAll();
    }

    public function add(): void
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                break;

            case 'POST':
                Shop::add($_POST);
                $this->redirect('/shop/add');
                break;

            default:
                http_response_code(405);
                die();
                break;
        }
    }
}
