<?php
class User_model extends CI_Model
{
    public function register()
    {
        $data = [
            'email' => $this->input->post('email', true),
            'nama' => $this->input->post('name', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'is_active' => 0,
            'tanggal_dibuat' => time()
        ];
        $this->db->insert('admin', $data);
    }
    public function getUserByEmail($email)
    {
        return $this->db
            ->get_where('admin', ['email' => $email])
            ->row_array();
    }

    public function createVerification($data)
    {
        $this->db->insert('verification', $data);
    }

    public function getUserToken($email)
    {
        return $this->db
            ->get_where('verification', ['email' => $email])
            ->row_array();
    }

    public function activate($email)
    {
        $this->db->set('is_active', 1)
            ->where('email', $email)
            ->update('admin', ['email' => $email]);
        $this->db->delete('verification', ['email' => $email]);
    }

    public function deleteUser($email)
    {
        $this->db->delete('verification', ['email' => $email]);
        $this->db->delete('admin', ['email' => $email]);
    }
}
