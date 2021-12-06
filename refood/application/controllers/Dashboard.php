<?php


class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {$this->load->model('User_model');
        $this->load->model('Pickup_model');
        $this->load->model('Delivery_model');
        $this->load->model('Preparation_model');
        $this->load->model('Organisation_model');
        $this->load->model('Provider_model');
        $this->load->model('Event_model');
        $this->load->model('Organizingcommittee_model');
        $user = $this->session->userdata("auth"); 

    	$params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Dashboard/index?');
        
     

        $this->pagination->initialize($config);

      

        $this->db->where("admin",2);
        $data['users'] = $this->User_model->get_all_users($params);

        $this->db->where("volunteer",1);
        $data['volunteers'] = $this->User_model->get_all_users($params);

        $this->db->where("approved",1);
        $data['reqjoinorg'] = $this->Organisation_model->get_all_organisations($params);

        $this->db->where("approved",3);
        $data['reqleavorg'] = $this->Organisation_model->get_all_organisations($params);

        $this->db->where("approved",1);
        $data['reqjoinpro'] = $this->Provider_model->get_all_providers($params);

        $this->db->where("approved",3);
        $data['reqleavpro'] = $this->Provider_model->get_all_providers($params);


        $this->db->where("volunteer",3);
        $data['leavolunteers'] = $this->User_model->get_all_users($params);

        $this->db->where("providerReview",NULL);
        $data['picksrevs'] = $this->Pickup_model->get_all_picks($params);
        $this->db->where("user",NULL);
        $data['picks'] = $this->Pickup_model->get_all_picks($params);

        $this->db->where("user",NULL);
        $data['preps'] = $this->Preparation_model->get_all_preps($params);

        $this->db->where("user",NULL);
        $data['deliveries'] = $this->Delivery_model->get_all_delivs($params);

        $this->db->where("organisationReview",NULL);
        $data['delivrev'] = $this->Delivery_model->get_all_delivs($params);

        //$this->db->where("origanizerId !=",$user->UserId);
        $data['organisationcom'] = $this->Event_model-> get_all_events();

        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
}
