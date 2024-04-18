<?php


class Auth_model extends CI_model
{
    public function getAlljabatan()
    {
        $sql = "SELECT * from jabatan";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getAllpegawai()
    {
        $sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai, jabatan where jabatan.id_jabatan=tb_pegawai.jabatan";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getUserByEmail($email)
    {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->row_array();
    }

    public function saveResetToken($id_user, $token)
    {
        $data = array(
            'id_user' => $id_user,
            'token' => $token
        );
        $this->db->insert('password_resets', $data);
    }

    public function getUserByToken($token)
    {
        $query = $this->db->get_where('password_resets', array('token' => $token));
        return $query->row_array();
    }

    public function deleteToken($token)
    {
        $this->db->delete('password_resets', array('token' => $token));
    }

    public function updatePassword($id_user, $password)
    {
        $data = array('password' => $password);
        $this->db->where('id', $id_user);
        $this->db->update('user', $data);
    }

    // public function getAuthRegister()
    // {
    //     $data = [
    //         'id_user' => $this->input->post('id_user'),
    //         'id_pegawai' => $this->input->post('id_pegawai'),
    //         'nama_pegawai' => $this->input->post('nama_pegawai'),
    //         'email' => $this->input->post('email'),
    //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //         'role_id' => 2,
    //         'is_active' => 1,
    //         'date_created' => time()
    //     ];
    //     $this->db->insert('user', $data);
    // }
}
