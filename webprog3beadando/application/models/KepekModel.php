<?php
class Kepekmodel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function insert($name, $path_name)
    {
        $data = array(
            'name'    => $name,
            'path'    => $path_name
           );

        $this->db->insert('kepek', $data);

        return $this->db->insert_id();
    }
}
?>