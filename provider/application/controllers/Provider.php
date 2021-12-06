<?php

 
class Provider extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Provider_model');
    } 

    /*
     * Listing of providers
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('provider/index?');
        $config['total_rows'] = $this->Provider_model->get_all_providers_count();
        $this->pagination->initialize($config);

        $data['providers'] = $this->Provider_model->get_all_providers($params);
        
        $data['_view'] = 'provider/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new provider
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'approved' => $this->input->post('approved'),
				'providerType' => $this->input->post('providerType'),
				'providerName' => $this->input->post('providerName'),
                'password' => $this->input->post('password'),
				'providerDescription' => $this->input->post('providerDescription'),
				'providerLogo' =>  $_FILES['providerLogo']['name'],
				'providerJoinDate' => $this->input->post('providerJoinDate'),
				'providerEmail' => $this->input->post('providerEmail'),
				'providerPhone' => $this->input->post('providerPhone'),
            );
            
            $provider_id = $this->Provider_model->add_provider($params);
            redirect('provider/index');
        }
        else
        {
			$this->load->model('Providertype_model');
			$data['all_providertypes'] = $this->Providertype_model->get_all_providertypes();
            
            $data['_view'] = 'provider/add';
            $this->load->view('layouts/main',$data);
        }
    }  
    function register()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'approved' => 1,
				'providerType' => $this->input->post('providerType'),
				'providerName' => $this->input->post('providerName'),
                'password' => $this->input->post('password'),
				'providerDescription' => $this->input->post('providerDescription'),
				'providerLogo' =>  $_FILES['providerLogo']['name'],
				'providerJoinDate' => date("Y-m-d") ,
				'providerEmail' => $this->input->post('providerEmail'),
				'providerPhone' => $this->input->post('providerPhone'),
            );
            
            $provider_id = $this->Provider_model->add_provider($params);
            redirect("login/index");
        }
        else
        {
			$this->load->model('Providertype_model');
			$data['all_providertypes'] = $this->Providertype_model->get_all_providertypes();
            
            $data['_view'] = 'provider/add';
            $this->load->view('layouts/main',$data);
        }
    }  
    /*
     * Editing a provider
     */
    function edit($providerId)
    {   
        // check if the provider exists before trying to edit it
        $data['provider'] = $this->Provider_model->get_provider($providerId);
        
        if(isset($data['provider']['providerId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'approved' => $this->input->post('approved'),
					'providerType' => $this->input->post('providerType'),
					'providerName' => $this->input->post('providerName'),
                    'password' => $this->input->post('password'),
					'providerDescription' => $this->input->post('providerDescription'),
					'providerLogo' =>  $_FILES['providerLogo']['name'],
					'providerJoinDate' => date("Y-m-d",strtotime($this->input->post('providerJoinDate'))),
					'providerEmail' => $this->input->post('providerEmail'),
					'providerPhone' => $this->input->post('providerPhone'),
                );

                $this->Provider_model->update_provider($providerId,$params);            
                redirect('provider/index');
            }
            else
            {
				$this->load->model('Providertype_model');
				$data['all_providertypes'] = $this->Providertype_model->get_all_providertypes();

                $data['_view'] = 'provider/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The provider you are trying to edit does not exist.');
    } 

    /*
     * Deleting provider
     */
    function remove($providerId)
    {
        $provider = $this->Provider_model->get_provider($providerId);

        // check if the provider exists before trying to delete it
        if(isset($provider['providerId']))
        {
            $this->Provider_model->delete_provider($providerId);
            redirect('provider/index');
        }
        else
            show_error('The provider you are trying to delete does not exist.');
    }
    
}
