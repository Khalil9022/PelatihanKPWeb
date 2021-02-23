<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (logged_in()) {
            redirect('home');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Login Page';
                $this->load->view('auth/template/header', $data);
                $this->load->view('auth/login', $data);
                $this->load->view('auth/template/footer', $data);
            } else {
                $this->_login();
            }
        }
    }
    public function register()
    {
        if (logged_in()) {
            redirect('home');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]');
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]', [
                'min_length' => 'Password too short'
            ]);
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]', [
                'matches' => 'Password does not match!'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Register Page';
                $this->load->view('auth/template/header', $data);
                $this->load->view('auth/register');
                $this->load->view('auth/template/footer');
            } else {
                $token = base64_encode(random_bytes(32));
                $tokenh = password_hash($token, PASSWORD_DEFAULT);

                $email = $this->input->post('email');
                $user_token = [
                    'email' => $email,
                    'code' => $tokenh,
                    'created_at' => time()
                ];

                $this->User_model->register();
                $this->User_model->createVerification($user_token);
                #$this->_sendEmail($token);
                $this->session->set_flashdata('alert', '<div class = "alert alert-success" role="alert">Register berhasil! :D </div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('auth');
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->getUserByEmail($email);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message2', '<small class=" text-danger">Password salah</small>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<small class="text-danger">Email belum diaktivasi</small>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<small class=" text-danger">Email belum terdaftar</small>');
            redirect('auth');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        #$token = $this->input->get('token');
        $data = $this->User_model->getUserByEmail($email);

        if ($data) {
            $user_token = $this->User_model->getUserToken($email);
            #if (password_verify($token, $user_token['code'])) {
            // if ($token == $user_token['code']) {
            if (time() - $user_token['created_at'] < 60 * 4) {
                $this->User_model->activate($email);
                $this->session->set_flashdata('alert', '<div class = "alert alert-success" role="alert">Aktivasi Berhasil, Silahkan Login</div>');
                redirect('auth');
            } else {
                $this->User_model->deleteUser($email);
                $this->session->set_flashdata('alert', '<div class = "alert alert-danger" role="alert">Aktivasi Gagal, Token Kedaluarsa </div>');
                redirect('auth');
            }
            #} else {
            #    $this->session->set_flashdata('alert', '<div class = "alert alert-danger" role="alert">Aktivasi Gagal, Token Salah </div>');
            #    redirect('auth');
            #}
        } else {
            $this->session->set_flashdata('alert', '<div class = "alert alert-danger" role="alert">Aktivasi Gagal, Email Salah </div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ci3kp2021@gmail.com',
            'smtp_pass' => 'azsx@ci3kp',
            'smtp_port' => '465',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('ci3kp2021@gmail.com', "CI3KP");
        $this->email->to($this->input->post('email'));
        $this->email->subject("Verification mail");
        $this->email->message(
            'Silahkan verifikasi email anda: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>'
        );

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
