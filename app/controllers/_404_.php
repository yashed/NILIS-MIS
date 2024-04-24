<?php

// 404 class page not found
class _404_ extends Controller
{
    public function index()
    {

        $data['title'] = '404';

        $this->view('common/error-page/404', $data);
    }
}


?>