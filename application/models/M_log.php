<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_log extends CI_Model
{

  public function save_log($param)
  {
      $sql        = $this->db->insert_string('tb_log',$param);
      $ex         = $this->db->query($sql);
      return $this->db->affected_rows($sql);
  }

    
}

?>
