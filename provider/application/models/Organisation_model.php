<?php

 
class Organisation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get organisation by organisationId
     */
    function get_organisation($organisationId)
    {
        return $this->db->get_where('organisation',array('organisationId'=>$organisationId))->row_array();
    }
    
    /*
     * Get all organisations count
     */
    function get_all_organisations_count()
    {
        $this->db->from('organisation');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all organisations
     */
    function get_all_organisations($params = array())
    {
        $this->db->order_by('organisationId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('organisation_organisationtype')->result_array();
    }
        
    /*
     * function to add new organisation
     */
    function add_organisation($params)
    {
        $this->db->insert('organisation',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update organisation
     */
    function update_organisation($organisationId,$params)
    {
        $this->db->where('organisationId',$organisationId);
        return $this->db->update('organisation',$params);
    }
    
    /*
     * function to delete organisation
     */
    function delete_organisation($organisationId)
    {
        return $this->db->delete('organisation',array('organisationId'=>$organisationId));
    }

    function connect($email , $pass){
        $this->db->where('organisationEmail',$email);
         $this->db->where('password',$pass);
       return $this->db->get('organisation')->result();
   }
}
