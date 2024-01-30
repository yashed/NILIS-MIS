<?php

/**
 * reports class
 */

class Reports extends Controller
{
    public function index()
    {
        echo "Invalid URL";
    }
    public function ROE()
    {
        $this->view('reports/report-roe-login');
    }
    public function exam_results()
    {
        $this->view('reports/report-roe-card');
    }
}
