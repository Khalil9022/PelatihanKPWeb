<?php
class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $config['per_page'] = 2;
        $data['postterbaru'] = $this->Post_model->postTerbaru($config['per_page']);

        $this->load->view('template/header');
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }
}
