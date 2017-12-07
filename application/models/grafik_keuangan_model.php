<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafik_keuangan_model extends CI_Model {
  public function viewPengeluaranPerbulan()
	{
		$this->db->select('month(date) as bulan, sum((amount*(-1)) * total) as pengeluaran');
	    $this->db->where("amount like '-%'");
	    $this->db->where('year(date) = year(CURDATE())');
	    $this->db->group_by('month(date)');
	    $this->db->limit(12);
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewPemasukanPerbulan()
	{
		$this->db->select('month(date) as bulan, sum(amount * total) as pemasukan');
	    $this->db->where("amount like '+%'");
	    $this->db->where('year(date) = year(CURDATE())');
	    $this->db->group_by('month(date)');
	    $this->db->limit(12);
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewPemasukanPertahun()
	{
		$this->db->select('year(date) as tahun, sum(amount * total) as pemasukan');
	    $this->db->where("amount like '+%'");
	    $this->db->group_by('year(date) desc');
	    $this->db->limit(4);
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewPengeluaranPertahun()
	{
		$this->db->select('year(date) as tahun, sum((amount*(-1)) * total) as pengeluaran');
	    $this->db->where("amount like '-%'");
	    $this->db->group_by('year(date) desc');
	    $this->db->limit(4);
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewPengeluaranPerproject()
	{
		$this->db->select('project.name as name, sum((amount*(-1)) * saving.total) as pengeluaran');
		$this->db->distinct();
	    $this->db->where("saving.amount like '-%'");
	    $this->db->where("saving.id_activity != 0");
	    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('project.name');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewHargaproject()
	{
		// $this->db->select('project.name as name, sum(saving.amount * saving.total) as pemasukan');
		// $this->db->distinct();
	 //    $this->db->where('saving.information', 'pemasukan project');
	 //    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	 //    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	 //    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	 //    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	 //    $this->db->group_by('project.name');
	 //    $get_index = $this->db->get('saving');
	 //    return $get_index->result();

		$this->db->select('project.name as name, project.DP as harga');
	    $this->db->group_by('project.name');
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function viewPengeluaranproject()
	{

		$this->db->select('project.name as name, sum((amount*(-1)) * saving.total) as pengeluaran');
		$this->db->distinct();
		$this->db->where("saving.amount like '-%'");
		$this->db->join('activity', 'saving.id_activity=activity.id_activity');
		$this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment');
		$this->db->join('crew', 'jobasigment.id_crew=crew.id_crew');
		$this->db->join('project', 'crew.id_project=project.id_project');
	    $this->db->group_by('project.name');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewGajiCrewproject()
	{

		$this->db->select('sum(crew.fee) as gaji');
		$this->db->distinct();
		$this->db->join('project', 'crew.id_project=project.id_project');
	    $this->db->group_by('project.name');
	    $get_index = $this->db->get('crew');
	    return $get_index->result();
	}

}

// SELECT MONTHNAME(STR_TO_DATE(month(date), '%m')) as bulan, sum(amount * total) as pengeluaran from saving where information like "pengeluaran%" GROUP by month(date)

// SELECT year(date) as tahun, sum(amount * total) as pengeluaran from saving where information like "pengeluaran%" group by year(date) desc limit 4

// SELECT distinct projecttypetype.name , sum(saving.amount * saving.total) as pengeluaran from saving RIGHT join activity on saving.id_activity=activity.id_activity RIGHT join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment RIGHT join crew on jobasigment.id_crew=crew.id_crew RIGHT join project on project.id_project=crew.id_project RIGHT join projecttype on projecttype.id_project=project.id_project RIGHT join projecttypetype on projecttype.id_type=projecttypetype.id_type  where saving.information="pengeluaran project" GROUP by projecttypetype.name

// SELECT distinct project.name as name, sum(saving.amount * saving.total) as pengeluaran from saving left join activity on saving.id_activity=activity.id_activity left join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment left join crew on jobasigment.id_crew=crew.id_crew left join project on project.id_project=crew.id_project left join projecttype on projecttype.id_project=project.id_project left join projecttypetype on projecttype.id_type=projecttypetype.id_type where saving.information="pengeluaran project" GROUP by projecttype.id_projectType

// SELECT distinct project.name as name, sum(saving.amount * saving.total) as pengeluaran from saving left join activity on saving.id_activity=activity.id_activity left join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment left join crew on jobasigment.id_crew=crew.id_crew left join project on project.id_project=crew.id_project where saving.information="pengeluaran project" GROUP by project.name


// SELECT DISTINCT project.name, project.price - sum((sELECT sum(saving.amount * saving.total) FROM saving JOIN activity on activity.id_activity=saving.id_activity join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment JOIN crew ON jobasigment.id_crew=crew.id_crew join project on crew.id_project=project.id_project WHERE project.id_project=1) + (SELECT sum(crew.fee) from crew join project on crew.id_project=project.id_project WHERE project.id_project=1)) as sisa_uang  FROM project  WHERE project.id_project=1

// SELECT sum(saving.amount * saving.total) FROM saving JOIN activity on activity.id_activity=saving.id_activity join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment JOIN crew ON jobasigment.id_crew=crew.id_crew join project on crew.id_project=project.id_project GROUP BY project.name

// SELECT sum(crew.fee) from crew join project on crew.id_project=project.id_project GROUP BY project.name