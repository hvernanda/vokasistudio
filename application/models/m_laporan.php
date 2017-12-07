<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Laporan extends CI_Model
 {
    public function tiapKru()
    {
    	$query = $this->db->query("
    						SELECT s.name as nama, count(id_project) as Jumlah_Proyek FROM crew
							join staff s using(id_staff)
							group by id_staff 
							");
        $result = $query->result_array();
        return $result;
    }

    public function tiapClient()
    {
    	$query = $this->db->query("
						    select cl.name as namaClient, count(id_contact) as JumlahProyek from project
							join contact using(id_contact)
							join company cl on cl.id = contact.id_company
							group by namaClient
							");
		$result = $query->result_array();
		return $result;
	}
}