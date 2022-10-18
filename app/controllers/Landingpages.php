<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Homepage MVC',
            'sayHello' => 'De toets',  
        ];
        $this->view('landingpages/index', $data);
    }
}

