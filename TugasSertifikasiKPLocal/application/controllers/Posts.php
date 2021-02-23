<?php
class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('keyword') == false) {
            $this->session->set_userdata('keyword', '');
        }

        if (isset($_POST['submit'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $_SESSION['keyword'];
        }

        #load library pagination
        $this->load->library('pagination');

        $config['total_rows'] = $this->Post_model->banyakPost($data['keyword']);
        $config['base_url'] = "http://localhost/Kuliah/PELATIHAN_KP/TugasKP/posts/index";
        #$config['total_rows'] = $this->Post_model->banyakSemuaPost();
        $config['per_page'] = 5;

        #Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</a></li>';

        $config['attributes'] = ['class' => 'page-link'];

        #initialize PAGINATION
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['posts'] = $this->Post_model->getPencarianPost($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('template/header');
        $this->load->view('posts/index', $data);
        $this->load->view('template/footer');
    }

    public function newest()
    {
        #load library pagination
        $this->load->library('pagination');

        $config['total_rows'] = $this->Post_model->banyakSemuaPost();
        $config['base_url'] = "http://localhost/Kuliah/PELATIHAN_KP/TugasKP/posts/index";
        #$config['total_rows'] = $this->Post_model->banyakSemuaPost();
        $config['per_page'] = 5;

        #Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</a></li>';

        $config['attributes'] = ['class' => 'page-link'];

        #initialize PAGINATION
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['posts'] = $this->Post_model->pencarianTerbaru($config['per_page'], $data['start']);


        $this->load->view('template/header');
        $this->load->view('posts/index', $data);
        $this->load->view('template/footer');
    }

    public function genre()
    {
        if ($this->session->userdata('keywordGenre') == false) {
            $this->session->set_userdata('keywordGenre', '');
        }

        if (isset($_POST['submit'])) {
            $data['keywordGenre'] = $this->input->post('keywordGenre');
            $this->session->set_userdata('keywordGenre', $data['keywordGenre']);
        } else {
            $data['keywordGenre'] = $_SESSION['keywordGenre'];
        }

        #load library pagination
        $this->load->library('pagination');

        $config['total_rows'] = $this->Post_model->banyakPostGenre($data['keywordGenre']);
        $config['base_url'] = "http://localhost/Kuliah/PELATIHAN_KP/TugasKP/posts/index";
        #$config['total_rows'] = $this->Post_model->banyakSemuaPost();
        $config['per_page'] = 5;

        #Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</a></li>';

        $config['attributes'] = ['class' => 'page-link'];

        #initialize PAGINATION
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['posts'] = $this->Post_model->getPencarianGenre($config['per_page'], $data['start'], $data['keywordGenre']);


        $this->load->view('template/header');
        $this->load->view('posts/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['post'] = $this->Post_model->getPostId($id);
        $this->load->view('template/header');
        $this->load->view('posts/detail', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (logged_in()) {
            $data['judul'] = "~ ADD MORE ~";
            $data['listgenre'] = $this->Post_model->getGenre();

            $this->form_validation->set_rules('judul', 'judul post', 'required');
            $this->form_validation->set_rules('isi', 'isi post', 'required');
            $this->form_validation->set_rules('episode', 'Episode', 'required|callback_episode_check');
            $this->form_validation->set_rules('max_episode', 'max Episode', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('posts/tambah', $data);
            } else {
                if ($this->input->post('episode') == 0) {
                    $status = "Not Aired";
                } else {
                    if ($this->input->post('episode') == $this->input->post('max_episode')) {
                        $status = "Completed";
                    } else {
                        $status = "OnGoing";
                    }
                }
                $this->Post_model->tambahPost($status);
                $this->session->set_flashdata('pesan', 'ditambahkan');
                redirect(base_url() . "posts");
            }
        } else {
            redirect('auth');
        }
    }

    public function episode_check()
    {
        $episode = $this->input->post('episode');
        $max_episode = $this->input->post('max_episode');
        if ($episode > $max_episode || $episode < 0 || $max_episode < 0) {
            $this->form_validation->set_message('episode_check', 'nilai Episode salah!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function update($id)
    {
        if (logged_in()) {
            $data['judul'] = 'Update Post';
            $data['listgenre'] = $this->Post_model->getGenre();
            $data['post'] = $this->Post_model->getPostId($id);
            $this->form_validation->set_rules('judul', 'judul post', 'required');
            $this->form_validation->set_rules('isi', 'isi post', 'required');
            $this->form_validation->set_rules('episode', 'Episode', 'required');
            $this->form_validation->set_rules('max_episode', 'max Episode', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('posts/update', $data);
            } else {
                if ($this->input->post('episode') == 0) {
                    $status = "Not Aired";
                } else {
                    if ($this->input->post('episode') == $this->input->post('max_episode')) {
                        $status = "Completed";
                    } else {
                        $status = "OnGoing";
                    }
                }
                $this->Post_model->updatePost($id, $status);
                $this->session->set_flashdata('pesan', 'diupdate');
                redirect(base_url() . "posts");
            }
        } else {
            redirect('auth');
        }
    }
    public function hapus($id)
    {
        if (logged_in()) {
            $this->Post_model->hapusPost($id);
            $this->session->set_flashdata('pesan', 'dihapus');
            redirect(base_url() . "posts");
        } else {
            redirect('auth');
        }
    }
}
