<?php
class Dbexport extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
       

    }
public function dbexport() {
$this->load->dbutil();
$prefs = array(
'format' => 'zip',
'filename' => 'my_db_backup.sql'
);
$backup =& $this->dbutil->backup($prefs);
$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
$save = 'public/uploads/'.$db_name;
$this->load->helper('file');
write_file($save, $backup);
$this->load->helper('download');
force_download($db_name, $backup);
}
}
?>