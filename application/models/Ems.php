<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ems extends CI_Model {

	public function _construct()
	{
		parent::_construct();
	}

	public function insert($data)
	{
		if($this->db->insert('events',$data))
		{
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function insertDates($data)
	{
		if(!empty($data))
		{
			$this->db->insert_batch('events_dates', $data);
		}
	}

	public function softDelete($id)
	{
		if(!empty($id))
		{
			$this->db->where('id', $id);
			return $this->db->update('events', array('is_deleted' => 1, 'deleted_at' => date('Y-m-d H:i:s')));
		} else {
			return false;
		}
	}

	public function getData()
	{
		return $this->db->select('*')->from('events')->where('is_deleted',0)->get()->result();
	}

	public function getDetails($id)
	{
		return $this->db->select('EV.title,ED.date')->from('events as EV')->join('events_dates as ED','EV.id = ED.e_id','LEFT')->where('EV.id',$id)->where('EV.is_deleted',0)->get()->result();
	}
}
