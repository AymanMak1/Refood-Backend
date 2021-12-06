<?php

 
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by userId
     */
    function get_user($userId)
    {
        return $this->db->get_where('user',array('UserId'=>$userId))->row_array();
    }
    
    /*
     * Get all users count
     */
    function get_all_users_count()
    {
        $this->db->from('user');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all users
     */
 
       
    function get_all_users($params = array())
    {
        $this->db->order_by('userId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('user_view')->result_array();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($userId,$params)
    {
        $this->db->where('UserId',$userId);
        return $this->db->update('user',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($userId)
    {
        return $this->db->delete('user',array('UserId'=>$userId));
    }
    function connect($email , $pass){
        $this->db->where('email',$email);
         $this->db->where('password',$pass);
       return $this->db->get('user')->result();
   }
}
