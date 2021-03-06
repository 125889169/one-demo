<?php

namespace App\Controllers;

use App\Test\Rpc\ClientAbc;
use One\Http\Controller;

class IndexController extends Controller
{
    private static $client = null;

    public function index()
    {
        return 'hello world';
    }

    public function rpc()
    {
        $a = new ClientAbc(5);
        return $a->add(2, 5);
    }

    public function data(...$args)
    {
        return $this->json($args);
    }
}




