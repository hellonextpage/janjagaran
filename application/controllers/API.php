<?php
 
class API extends CI_Controller{
    function __construct()
    {
        parent::__construct();		
		$this->load->model('Zilla_model');
		$this->load->model('Nagar_khanda_model');
        $this->load->model('Basti_upamandal_model');
		$this->load->model('Upabasti_gramam_model');
		$this->load->model('Palle_model');
		$this->load->model('Volunteer_model');
		$this->load->model('Occupation_model');
		$this->load->model('Contact_type_model');
		$this->load->model('Contact_model');
    } 

	
	/*
     * Get Master Data
     */
	   function getMasterData()
    {
		$result=[];
		try{
		$data['zilla'] = $this->Zilla_model->get_all_zilla();
		$data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda();
		
        $data['basti_upamandal'] = $this->Basti_upamandal_model->get_all_basti_upamandal();
		$data['upabasti_gramam'] = $this->Upabasti_gramam_model->get_all_upabasti_gramam();
		$data['palle'] = $this->Palle_model->get_all_palle();		
		$data['occupations'] = $this->Occupation_model->get_all_occupations();
		$data['contact_type'] = $this->Contact_type_model->get_all_contact_type();
        $result['data']=$data;		
		$result['status']="SUCCESS";
		$result['message']="Data Fetched Successfully";
		echo json_encode($result);
		}
		catch (Exception $e){
		$result['status']="ERROR";
		$result['message']="Data Fetched Successfully";		
		echo json_encode($result);
		}
		
    }
	
	function getZilla()
	{
		$result=[];
		try{
			$data['zilla'] = $this->Zilla_model->get_all_zilla();		
			$data['occupations'] = $this->Occupation_model->get_all_occupations();
			$data['contact_type'] = $this->Contact_type_model->get_all_contact_type();
			$result['data']=$data;		
			$result['status']="SUCCESS";
			$result['message']="Data Fetched Successfully";
			echo json_encode($result);
		}
		catch (Exception $e){
			$result['status']="ERROR";
			$result['message']="Data Fetched Successfully";		
			echo json_encode($result);
		}
	}
	
	function getMasterDataByZillaId()
	{
		$zilla_id = $this->input->post('zilla_id');
		if(!empty($zilla_id)){
			$result=[];
			try{
				$data['nagar_khanda'] = $this->db->query("select * from nagar_khanda where zilla_id=".$zilla_id)->result_array();
				if(!empty($data['nagar_khanda'])){
					$nagar_ids =  implode(",", array_column($data['nagar_khanda'], "nagar_khanda_id"));
					$data['basti_upamandal'] = $this->db->query("select * from basti_upamandal where nagar_khanda_id IN ($nagar_ids)")->result_array();
				}else{
					$data['basti_upamandal'] = [];
				}
				
				if(!empty($data['basti_upamandal'])){
					$basti_upamandal_ids =  implode(",", array_column($data['basti_upamandal'], "basti_upamandal_id"));
					$data['upabasti_gramam'] = $this->db->query("select * from upabasti_gramam where basti_upamandal_id IN ($basti_upamandal_ids)")->result_array();
				}else{
					$data['upabasti_gramam'] = [];
				}
				$result['data']=$data;		
				$result['status']="SUCCESS";
				$result['message']="Data Fetched Successfully";
				echo json_encode($result);
			}
			catch (Exception $e){
				$result['status']="ERROR";
				$result['message']="Data Fetched Successfully";		
				echo json_encode($result);
			}
		}else{
			$result['status']="ERROR";
			$result['message']="Zilla Id is required.";		
			echo json_encode($result);
		}
	}
	
 
    /*
     * Volunteer Check In
     */
    function VolunteerCheckIn()
    { 
    
	
	if(empty($this->input->post('volunteer_name')) || empty($this->input->post('mobile_no')))
	{
		
				$result['status']="ERROR";
		$result['message']="Name and mobile numbers are mandatory";
		echo json_encode($result);
	}
	else
	{
		$data['volunteers'] = $this->Volunteer_model->get_volunteer_by_mobileno($this->input->post('mobile_no'));

// || count(json_encode($data['volunteers']))===0
		if(empty($data['volunteers']))     
        {   
	
	  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
	$validated_device_id=0;
	if(!empty($this->input->post('device_id')))
	{
		$validated_device_id=$this->input->post('device_id');
	}
	$validated_lat=0;
	if(!empty($this->input->post('latitude')))
	{
		$validated_lat=$this->input->post('latitude');
	}
	$validated_long=0;
	if(!empty($this->input->post('longitude')))
	{
		$validated_long=$this->input->post('longitude');
	}	
	

	
	
            $params = array(
				'volunteer_name' => $this->input->post('volunteer_name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'latitude' => $validated_lat,
				'longitude' => $validated_long,
				'auth_key' => $randomString,
				'device_id' => $validated_device_id,
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $volunteer_id = $this->Volunteer_model->add_volunteer($params);
			$data['volunteers'] = $this->Volunteer_model->get_volunteer($volunteer_id);
			
			$result['data']=$data;
			$result['status']="SUCCESS";
			$result['message']="You have checked In successfully";
			
			echo json_encode($result);
            //redirect('volunteer/index');
        }
        else
        {				
	        
			//$data['volunteer'] = $this->Volunteer_model->get_volunteer($data['volunteers']['volunteer_id']);

			$result['data']=$data;
			$result['status']="SUCCESS";
			$result['message']="You have checked In successfully";
			
			echo json_encode($result);
        }
    }  
}
   
   
      function VolunteerCheckInNew()
    { 
    
	
	if(empty($this->input->post('volunteer_name')) || empty($this->input->post('zilla')) || empty($this->input->post('mobile_no')))
	{
		
				$result['status']="ERROR";
		$result['message']="Name and mobile and zilla  are mandatory";
		echo json_encode($result);
	}
	else
	{
		$data['volunteers'] = $this->Volunteer_model->get_volunteer_by_mobileno($this->input->post('mobile_no'));

// || count(json_encode($data['volunteers']))===0
		if(empty($data['volunteers']))     
        {   
	
	  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
	$validated_device_id=0;
	if(!empty($this->input->post('device_id')))
	{
		$validated_device_id=$this->input->post('device_id');
	}
	$validated_lat=0;
	if(!empty($this->input->post('latitude')))
	{
		$validated_lat=$this->input->post('latitude');
	}
	$validated_long=0;
	if(!empty($this->input->post('longitude')))
	{
		$validated_long=$this->input->post('longitude');
	}	
	

	
	
            $params = array(
				'volunteer_name' => $this->input->post('volunteer_name'),
				'zilla_id' => $this->input->post('zilla'),
				'mobile_no' => $this->input->post('mobile_no'),
				'latitude' => $validated_lat,
				'longitude' => $validated_long,
				'auth_key' => $randomString,
				'device_id' => $validated_device_id,
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $volunteer_id = $this->Volunteer_model->add_volunteer($params);
			$data['volunteers'] = $this->Volunteer_model->get_volunteer($volunteer_id);
			
			$result['data']=$data;
			$result['status']="SUCCESS";
			$result['message']="You have checked In successfully";
			
			echo json_encode($result);
            //redirect('volunteer/index');
        }
        else
        {				
	        
			//$data['volunteer'] = $this->Volunteer_model->get_volunteer($data['volunteers']['volunteer_id']);

			$result['data']=$data;
			$result['status']="SUCCESS";
			$result['message']="You have checked In successfully";
			
			echo json_encode($result);
        }
    }  
}

       /*
     * Contact Saving
     */
    function Savecontact()
    {   
      		
		if(!empty($this->input->post('contact_name')))
		{    
     
            $params = array(
				'contact_name' => $this->input->post('contact_name'),
				'mobile_no' => empty($this->input->post('mobile_no'))?0:$this->input->post('mobile_no'),
				'locality_id' => empty($this->input->post('locality_id'))?0:$this->input->post('locality_id'),
				'locality_type' => empty($this->input->post('locality_type'))?"V":$this->input->post('locality_type'),
				
				'occupation_id' => empty($this->input->post('occupation_id'))?0:$this->input->post('occupation_id'),
				'contact_type_id' => empty($this->input->post('contact_type_id'))?0:$this->input->post('contact_type_id'),
								
				'added_by' => empty($this->input->post('added_by'))?0:$this->input->post('added_by'),
				'address' => empty($this->input->post('address'))?"":$this->input->post('address'),
				'latitude' => empty($this->input->post('latitude'))?0:$this->input->post('latitude'),
				'longitude' => empty($this->input->post('longitude'))?0:$this->input->post('longitude'),
				'comment' => empty($this->input->post('comment'))?"":$this->input->post('comment'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $contact_id = $this->Contact_model->add_contact($params);
				$result['data']=[];
			$result['status']="SUCCESS";
			$result['message']="Contact has saved successfully";
			
			echo json_encode($result);
            
        }
        else
        {
			$result['data']=[];
			$result['status']="ERROR";
			$result['message']="Something went wrong. Please check the data and save again";
			
			echo json_encode($result);
        }
    }

	public function saveContactBulk(){
		
		$contact = $this->input->post('contact');
		if(!empty($contact))
		{    
     
			foreach($contact as $key=>$value){
				$params = array(
				'contact_name' => $value['contact_name'],
				'mobile_no' => empty($value['mobile_no'])?0:$value['mobile_no'],
				'locality_id' => empty($value['locality_id'])?0:$value['locality_id'],
				'locality_type' => empty($value['locality_type'])?"V":$value['locality_type'],				
				'occupation_id' => empty($value['occupation_id'])?0:$value['occupation_id'],
				'contact_type_id' => empty($value['contact_type_id'])?0:$value['contact_type_id'],								
				'added_by' => empty($value['added_by'])?0:$value['added_by'],
				'address' => empty($value['address'])?"":$value['address'],
				'latitude' => empty($value['latitude'])?0:$value['latitude'],
				'longitude' => empty($value['longitude'])?0:$value['longitude'],
				'comment' => empty($value['comment'])?"":$value['comment'],
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
				);            
				$contact_id = $this->Contact_model->add_contact($params);
			}
            
			$result['data']=[];
			$result['status']="SUCCESS";
			$result['message']="Contact has saved successfully";
			
			echo json_encode($result);
            
        }
        else
        {
			$result['data']=[];
			$result['status']="ERROR";
			$result['message']="Something went wrong. Please check the data and save again";
			
			echo json_encode($result);
        }
	}		
    
}
