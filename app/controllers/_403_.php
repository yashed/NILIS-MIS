<?php

// 404 class page not found
class _403_ extends Controller
{
    public function index()
    {

        $data['title'] = '404';

        $this->view('common/error-page/403', $data);
    }
}


?>