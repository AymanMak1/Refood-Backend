<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organisation_model');
        $this->load->model('Organisationtype_model');
        $data['all_organisationtypes'] = $this->Organisationtype_model->get_all_organisationtypes();
        
        
    } 

    /*
     * Listing of acces
     */
    function index()
    {
        $this->load->view("login");
        if($this->session->userdata("auth") != false){

            redirect("Dashboard/index");
        }
    }
    function connect(){
        $organisation = $this->Organisation_model->connect($this->input->post("email"),$this->input->post("password"));
       
        if(isset($organisation[0])){
            $this->session->set_userdata("auth",$organisation[0]);
            redirect("dashboard/index");
        }else{
            redirect("login/index");
        }
    }
    function logout(){
        
        $this->session->unset_userdata(["auth"]);
        $this->session->sess_destroy();
        redirect("Login/index");
    }
   
}