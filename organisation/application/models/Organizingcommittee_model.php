<?php

 
class Organizingcommittee_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get organizingcommittee by organizingCommitteeId
     */
    function get_organizingcommittee($organizingCommitteeId)
    {
        return $this->db->get_where('organizingCommittee',array('organizingCommitteeId'=>$organizingCommitteeId))->row_array();
    }
    
    /*
     * Get all organizingcommittees count
     */
    function get_all_organizingcommittees_count()
    {
        $this->db->from('organizingCommittee');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all organizingcommittees
     */
    function get_all_organizingcommittees($params = array())
    {
        $this->db->order_by('organizingCommitteeId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('organizingcommittee_event')->result_array();
    }
        
    /*
     * function to add new organizingcommittee
     */
    function add_organizingcommittee($params)
    {
        $this->db->insert('organizingCommittee',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update organizingcommittee
     */
    function update_organizingcommittee($organizingCommitteeId,$params)
    {
        $this->db->where('organizingCommitteeId',$organizingCommitteeId);
        return $this->db->update('organizingCommittee',$params);
    }
    
    /*
     * function to delete organizingcommittee
     */
    function delete_organizingcommittee($organizingCommitteeId)
    {
        return $this->db->delete('organizingCommittee',array('organizingCommitteeId'=>$organizingCommitteeId));
    }
}
