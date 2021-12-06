<?php

 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    } 

    /*
     * Listing of users
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('user/index?');
        $config['total_rows'] = $this->User_model->get_all_users_count();
        $this->pagination->initialize($config);

        $data['users'] = $this->User_model->get_all_users($params);
        
        
        $this->db->where("volunteer",3);
        $data['leavolunteers'] = $this->User_model->get_all_users($params);
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }
    public function uploadfile(){
        header('Access-Control-Allow-Origin: *');
        $config['upload_path'] = '../resources/img/';
        $config['allowed_types'] = '*';
        

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
                echo json_encode( $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            echo json_encode( $data);
        }
     }
    /*
     * Adding a new user
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
			$params = array(
                	'admin' => $this->input->post('admin'),
				'gender' => $this->input->post('gender'),
				'cityFrom' => $this->input->post('cityFrom'),
				'cityResident' => $this->input->post('cityResident'),
				'volunteer' => $this->input->post('volunteer'),
				'password' => $this->input->post('password'),
				'name' => $this->input->post('name'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'datebirthday' => date("Y-m-d",strtotime($this->input->post('datebirthday'))),
				 'photo' => $_FILES['photo']['name'],
				'createdAt' => date("Y-m-d") ,
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        }
        else
        {
			$this->load->model('Gender_model');
			$data['all_genders'] = $this->Gender_model->get_all_genders();

			$this->load->model('City_model');
			$data['all_cities'] = $this->City_model->get_all_cities();
			$data['all_cities'] = $this->City_model->get_all_cities();
            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  
    function register()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
			$params = array(
                'admin' => 0,
				'gender' => $this->input->post('gender'),
				'cityFrom' => $this->input->post('cityFrom'),
				'cityResident' => $this->input->post('cityResident'),
				'volunteer' => $this->input->post('volunteer'),
				'password' => $this->input->post('password'),
				'name' => $this->input->post('name'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'datebirthday' => date("Y-m-d",strtotime($this->input->post('datebirthday'))),
				 'photo' => $_FILES['photo']['name'],
				'createdAt' => date("Y-m-d") ,
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        }
        else
        {
			$this->load->model('Gender_model');
			$data['all_genders'] = $this->Gender_model->get_all_genders();

			$this->load->model('City_model');
			$data['all_cities'] = $this->City_model->get_all_cities();
			$data['all_cities'] = $this->City_model->get_all_cities();
            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    } 
    /*
     * Editing a user
     */
    function edit($userId)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($userId);
        
        if(isset($data['user']['UserId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'admin' => $this->input->post('admin'),
					'gender' => $this->input->post('gender'),
					'cityFrom' => $this->input->post('cityFrom'),
					'cityResident' => $this->input->post('cityResident'),
					'volunteer' => $this->input->post('volunteer'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'datebirthday' => date("Y-m-d",strtotime($this->input->post('datebirthday'))),
					'updatedAt' =>  date("Y-m-d") ,
                );
                if($_FILES['photo']['name']!=""){
                    $params["photo"] = $_FILES['photo']['name'];
                    $this->uploadfile();
                }
                $this->User_model->update_user($userId,$params);            
                redirect('user/index');
            }
            else
            {
				$this->load->model('Gender_model');
				$data['all_genders'] = $this->Gender_model->get_all_genders();

				$this->load->model('City_model');
				$data['all_cities'] = $this->City_model->get_all_cities();
				$data['all_cities'] = $this->City_model->get_all_cities();

                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 
    function approve($id)
    {   
        // check if the request exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['UserId']))
        {
            
                $params = array(
                  
                    'admin' => 0,
               
                );

                $this->User_model->update_user($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    function approvevol($id)
    {   
        // check if the request exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['UserId']))
        {
            
                $params = array(
                  
                    'volunteer' => 2,
               
                );

                $this->User_model->update_user($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 
function deny($id)
    {   
        // check if the request exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['UserId']))
        {
            
                $params = array(
                  
                    'admin' => 1,
               
                );

                $this->User_model->update_user($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }
    function denyvol($id)
    {   
        // check if the request exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['UserId']))
        {
            
                $params = array(
                  
                    'volunteer' => 0,
               
                );

                $this->User_model->update_user($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }
    function stopvol($id)
    {   
        // check if the request exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['UserId']))
        {
            
                $params = array(
                  
                    'volunteer' => 3,
               
                );

                $this->User_model->update_user($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }

 
    /*
    /*
     * Deleting user
     */
    function remove($userId)
    {
        $user = $this->User_model->get_user($userId);

        // check if the user exists before trying to delete it
        if(isset($user['UserId']))
        {
            $this->User_model->delete_user($userId);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
            
    }
    
}
