<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleTypeModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('roletypes', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
			$this->db->trans_commit();
			return  true;
	}

	function edit($clause, $value){
		$this->db->trans_begin();
		
		$this->db->where('roletypes', $clause);
		
		$this->db->update('roletypes', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('roletypes',$clause);
		$delete = $this->db->delete('roletypes');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('roletypes');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where($clause);
		$dep = $this->db->get('roletypes');
		return $dep;
	}
}