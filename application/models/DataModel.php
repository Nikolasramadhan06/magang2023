<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends CI_model {

//Ambil data pada table
	public function getData($table)
	{
		return $this->db->get($table);
	}

	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

//update data
	public function update_data($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}


//login
	public function cekLogin($email, $password)
	{
		$email = set_value('email');
		$password = set_value('password');

		$result = $this->db->where('email', $email)
						   ->where('password', $password)
						   ->limit(1)
						   ->get('admin');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}

	}

	public function insert_kegiatan($data)
    {
        $this->db->insert('kegiatan', $data);
        return $this->db->insert_id(); // Return inserted ID
    }
	public function getKegiatanById($id_kegiatan) {
		return $this->db->get_where('kegiatan', array('id_kegiatan' => $id_kegiatan))->row();
	}
	public function tambahData($data) {
        return $this->db->insert('data', $data);
    }



}