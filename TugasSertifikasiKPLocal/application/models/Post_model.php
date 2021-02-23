<?php
class Post_model extends CI_Model
{

    public function tambahPost($status)
    {
        $data['judul'] = $this->input->post('judul');
        $data['deskripsi'] = $this->input->post('isi');
        $data['tanggal_dibuat'] = time();
        $data['genre'] = $this->input->post('genre');
        $data['episode'] = $this->input->post('episode');
        $data['max_episode'] = $this->input->post('max_episode');
        $data['status'] = $status;
        $this->db->insert('posts', $data);
    }

    public function getGenre()
    {
        return $this->db
            ->get('genre')
            ->result_array();
    }

    #CEK JUMLAH POST
    public function banyakSemuaPost()
    {
        return $this->db->from('posts')->count_all_results();
    }

    public function banyakPost($keyword)
    {
        return $this->db->like('judul', $keyword)->from('posts')->count_all_results();
    }

    public function banyakPostGenre($keyword)
    {
        return $this->db->like('genre', $keyword)->from('posts')->count_all_results();
    }

    #SEARCHING
    public function getPencarianPost($limit, $start, $keyword)
    {
        return $this->db
            ->select("id_post,judul, SUBSTRING(deskripsi, 1,200) as isi,genre,episode,max_episode,status")
            ->like('judul', $keyword)
            ->order_by('id_post', 'asc')
            ->get('posts', $limit, $start)
            ->result_array();
    }

    public function pencarianTerbaru($limit, $start)
    {
        return $this->db
            ->select("id_post,judul, SUBSTRING(deskripsi, 1,200) as isi,genre,episode,max_episode,status")
            ->order_by('id_post', 'desc')
            ->get('posts', $limit, $start)
            ->result_array();
    }

    public function getPencarianGenre($limit, $start, $keyword)
    {
        return $this->db
            ->select("id_post,judul, SUBSTRING(deskripsi, 1,200) as isi,genre,episode,max_episode,status")
            ->like('genre', $keyword)
            ->order_by('id_post', 'asc')
            ->get('posts', $limit, $start)
            ->result_array();
    }

    public function getPostId($id)
    {
        return $this->db
            ->where('id_post', $id)
            ->get('posts')
            ->row_array();
    }

    public function postTerbaru($limit)
    {
        return $this->db
            ->select("id_post,judul, SUBSTRING(deskripsi, 1,100) as isi,genre,episode,max_episode,status")
            ->order_by('id_post', 'desc')
            ->get('posts', $limit,)
            ->result_array();
    }

    #UPDATE
    public function updatePost($id, $status)
    {
        $data = array(
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('isi', true),
            'genre' => $this->input->post('genre', true),
            'episode' => $this->input->post('episode', true),
            'max_episode' => $this->input->post('max_episode', true),
            'status' => $status
        );
        $this->db
            ->where('id_post', $id)
            ->update('posts', $data);
    }
    public function hapusPost($id)
    {
        $this->db
            ->where('id_post', $id)
            ->delete('posts');
    }
}
