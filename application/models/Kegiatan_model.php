<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/models/Kegiatan_model.php
class Kegiatan_model extends CI_Model {

    public function kegiatan($id_kegiatan) {
        $query = $this->db->get_where('kegiatan', array('id_kegiatan' => $id_kegiatan));
        return $query->row();
    }

}
