<?php

 
class Provider_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get provider by providerId
     */
    function get_provider($providerId)
    {
        return $this->db->get_where('provider',array('providerId'=>$providerId))->row_array();
    }
    
    /*
     * Get all providers count
     */
    function get_all_providers_count()
    {
        $this->db->from('provider');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all providers
     */
    function get_all_providers($params = array())
    {
        $this->db->order_by('providerId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('provider_providertype')->result_array();
    }
        
    /*
     * function to add new provider
     */
    function add_provider($params)
    {
        $this->db->insert('provider',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update provider
     */
    function update_provider($providerId,$params)
    {
        $this->db->where('providerId',$providerId);
        return $this->db->update('provider',$params);
    }
    
    /*
     * function to delete provider
     */
    function delete_provider($providerId)
    {
        return $this->db->delete('provider',array('providerId'=>$providerId));
    }
    function connect($email , $pass){
        $this->db->where('providerEmail',$email);
         $this->db->where('password',$pass);
       return $this->db->get('provider')->result();
   }
}
