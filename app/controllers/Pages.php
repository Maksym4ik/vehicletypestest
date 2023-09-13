<?php

class Pages extends Controller
{
//    basic page for 404
    public function index()
    {
        $this->setView('index');
    }
}
