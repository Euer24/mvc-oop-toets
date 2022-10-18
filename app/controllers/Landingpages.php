<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Homepage MVC',
            'sayHello' => 'Dit is mijn toets',  
        ];
        $this->view('landingpages/index', $data);
    }
}

