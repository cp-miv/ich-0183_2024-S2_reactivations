<?php

namespace App\Controllers;

use App\Models\Friend;

class MeController extends AppController
{
    public function index(): void
    {
        $this->view['friends'] = Friend::getAll();
    }

    public function detail(): void
    {
        $this->view['friend'] = Friend::find($_GET['id']);
    }
}
