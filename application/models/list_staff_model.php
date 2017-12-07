<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class list_staff_model extends CI_Model {
	public function viewStaff($id_project){
		$this->db->select('staff.name as staff_name,skill.skillName as staff_skill, tool.name as staff_tool, staff.id_staff as id_staff,'); 
		//$this->db->limit(1);
		$this->db->join('skillMapping','staff.id_staff=skillMapping.id_staff');
		$this->db->join('skill','skill.id_skill=skillMapping.id_skill');
		$this->db->join('toolSkill','skill.id_skill=toolSkill.id_skill');
		$this->db->join('tool','tool.id_tool=toolSkill.id_tool');
		$this->db->join('crew','crew.id_staff=staff.id_staff','inner');
		$this->db->where('crew.id_status <> 3 AND crew.id_status <> 5 AND staff.id_staff NOT IN (SELECT `staff`.`id_staff` FROM (`staff`) JOIN `skillMapping` ON `staff`.`id_staff`=`skillMapping`.`id_staff` JOIN `skill` ON `skill`.`id_skill`=`skillMapping`.`id_skill` JOIN `toolSkill` ON `skill`.`id_skill`=`toolSkill`.`id_skill` JOIN `tool` ON `tool`.`id_tool`=`toolSkill`.`id_tool` JOIN `crew` ON `staff`.`id_staff`=`crew`.`id_staff` WHERE `id_project` ='.$id_project.')');
		$this->db->distinct();
		$get = $this->db->get('staff');
		return $get->result();
	}

	public function viewCrew($id_project){
		$this->db->select('staff.name as staff_name,staff.id_staff as idStaff, skill.skillName as staff_skill, tool.name as staff_tool, crew.id_crew as id_crew'); 
		//$this->db->limit(1);
		$this->db->join('skillMapping','staff.id_staff=skillMapping.id_staff');
		$this->db->join('skill','skill.id_skill=skillMapping.id_skill');
		$this->db->join('toolSkill','skill.id_skill=toolSkill.id_skill');
		$this->db->join('tool','tool.id_tool=toolSkill.id_tool');
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');
		$this->db->where('id_project = '.$id_project.' AND id_status <> 3');
		$this->db->distinct();
		$get = $this->db->get('staff');
		return $get->result();
	}

	public function viewStaff2($id_project){
		$this->db->select('staff.name as staff_name, staff.id_staff,skill.skillName as staff_skill, tool.name as staff_tool, staff.id_staff as id_staff'); 
		//$this->db->limit(1);
		$this->db->join('skillMapping','staff.id_staff=skillMapping.id_staff');
		$this->db->join('skill','skill.id_skill=skillMapping.id_skill');
		$this->db->join('toolSkill','skill.id_skill=toolSkill.id_skill');
		$this->db->join('tool','tool.id_tool=toolSkill.id_tool');
		$this->db->join('crew','crew.id_staff=staff.id_staff','inner');
		$this->db->where('crew.id_status <> 3 AND crew.id_status <> 5 AND staff.id_staff NOT IN (SELECT `staff`.`id_staff` FROM (`staff`) JOIN `skillMapping` ON `staff`.`id_staff`=`skillMapping`.`id_staff` JOIN `skill` ON `skill`.`id_skill`=`skillMapping`.`id_skill` JOIN `toolSkill` ON `skill`.`id_skill`=`toolSkill`.`id_skill` JOIN `tool` ON `tool`.`id_tool`=`toolSkill`.`id_tool` JOIN `crew` ON `staff`.`id_staff`=`crew`.`id_staff` WHERE `id_project` ='.$id_project.')');
		$this->db->distinct();
		$get = $this->db->get('staff');
		return $get->result();
	}

	public function insertManager($insert_manager){
		$this->db->set($insert_manager);
		$this->db->insert('crew');
	}

	public function updateManager($update_manager,$id_project){
		$this->db->where('id_project', $id_project);		
		$this->db->set($update_manager);
		$this->db->update('crew');	
	}

	public function checkManager($id){
		$this->db->select('count(id_crew) as countManager'); 
		//$this->db->limit(1);
		$this->db->where('id_project = '.$id.' AND id_status = 3');
		$get = $this->db->get('crew');
		return $get;
	}

	public function insertStaff($insert_staff){
		$this->db->set($insert_staff);
		$this->db->insert('crew');
	}

	public function deleteCrew($id){
  		$this -> db -> where('id_crew', $id);
  		$this -> db -> delete('crew');
	}
}