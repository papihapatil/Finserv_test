<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Functions extends CI_Controller 
{
	public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		 $this->load->model('Customercrud_model');

    }
	public function Authentication()
	{
		$data=array(
		             'full_name'=>$this->input->post('full_name'),
					 'pan_no'=>$this->input->post('pan_no'),
					 'Identity_objects_type'=>$this->input->post('type'),
					 'state'=>$this->input->post('state'),
					 'file_number'=>$this->input->post('file_number'),
					 'dob'=>$this->input->post('dob'),
					 'doe'=>$this->input->post('doe'),
					 'GST_retailer'=>$this->input->post('GST_retailer')
					 
					 
		           );
				  
				 
				  
		$curl = curl_init();

		curl_setopt_array($curl, array(
										  //CURLOPT_URL => "https://preproduction.signzy.tech/api/v2/patrons/login",
										  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/login",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => "",
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "POST",
										  //CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_test\",\"password\":\"JaWCbbPZQK5FhPS4N0PL\"}",
										  CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_PROD_LIVE\",\"password\":\"4lMmdEWyM6k2l05KpNb6\"}",
										  CURLOPT_HTTPHEADER => array(
											"accept: */*",
											"accept-language: en-US,en;q=0.8",
											"content-type: application/json"
										  ),
										)
							);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			  //echo "<pre>";
			  //echo $response;
			  //echo '<br>';
		}
		if($data['Identity_objects_type']=='gstinSearch')
		{
			if($data['GST_retailer']=='retailer')
		{
			$this->Verify_GST_Retailer($response,$data);
		}else{
			
			$this->Verify_GST($response,$data);
		}
		}
		
		else
		{
		 $this->Identity_card_object($response,$data);
		}
    }
	public function Identity_card_object($response,$data)
	{
		$type=$data['Identity_objects_type'];
		$auth=json_decode($response);
		$curl = curl_init();
        $options=array(
						  //CURLOPT_URL => "https://preproduction.signzy.tech/api/v2/patrons/".$auth->userId."/identities",
						  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/".$auth->userId."/identities",
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 30,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS => "{\"type\":\"$type\",\"callbackUrl\":\"http://finaleap.com/\",\"email\":\"patilpapiha@gmail.com\",\"images\":[]}",
						  CURLOPT_HTTPHEADER => array(
														"accept: */*",
														"accept-language: en-US,en;q=0.8",
														"authorization:".$auth->id,
														"content-type: application/json"
													  ),
						);
		//echo "<pre>";
		//print_r($options);
		//echo '<br>';
		curl_setopt_array($curl,$options);
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo "<pre>";
		 //echo $response;
		 //exit;
		}
		if($data['Identity_objects_type']=='voterid')
		{
			$this->Verify_Voterid($response,$data);
		}
		else if($data['Identity_objects_type']=='passport')
		{
			$this->Verify_Passport($response,$data);
		}
		else if($data['Identity_objects_type']=='drivingLicence')
		{
			$this->Verify_drivingLicence($response,$data);
			 //echo $response;
			 //exit;
			
		}
		else{
			
		$this->Verify_PAN($response,$data);
		}
		
	}
	public function Verify_drivingLicence($response,$data)
	{
		// echo $response;
		//exit;
		$identity=json_decode($response);
		
		$dl_no=$data['pan_no'];
		
		
		$dob=$data['dob'];
		$doe=$data['doe'];
		
		
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://signzy.tech/api/v2/snoops",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"service\":\"Identity\",\"itemId\":\"$identity->id\",\"accessToken\":\"$identity->accessToken\",\"task\":\"verification\",\"essentials\":{\"number\":\"$dl_no\",\"dob\":\"$dob\",\"issueDate\":\"$doe\"}}",
		  CURLOPT_HTTPHEADER => array(
			"accept: */*",
			"accept-language: en-US,en;q=0.8",
			"content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			
			 $verified_data=json_decode($response,true);
			
		      if(isset($verified_data['response']))
								 {
									
										 if($verified_data['response']['result']['message']=='Driving licence verification process completed successfully with positive result.')
									 {
										 //echo "sucess";
										  $json = array
										(
											'response' =>$response,
											'msg'=>'sucess'
										);
										echo json_encode($json);
									 }else
									 {
										 $json = array
										(
											
											'response' =>$response,
											'msg'=>'fail'
										);
										echo json_encode($json);
									 }
								 }
								 else if(isset($verified_data['error']))
								 {
									   $json = array
										(
											'response' =>$verified_data['error']['message'],
											'msg'=>'error'
											
											
										);
										echo json_encode($json);
								 }
		}
		
	}
	
	public function Verify_Passport($response,$data)
	{
		
		//$epic_no=$data['pan_no'];
		$fullname=$data['full_name'];
		$file_number=$data['file_number'];
		$dob=$data['dob'];
		//print_r($data);
		
	
		
		
		$identity=json_decode($response);
		 $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://signzy.tech/api/v2/snoops",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\"service\":\"Identity\",\"itemId\":\"$identity->id\",\"accessToken\":\"$identity->accessToken\",\"task\":\"verification\",\"essentials\":{\"fileNumber\":\"$file_number\",\"dob\":\"$dob\",\"name\":\"$fullname\"}}",
			  CURLOPT_HTTPHEADER => array(
				
				"accept-language: en-US,en;q=0.8",
				"content-type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				
			  $verified_data=json_decode($response,true);
								  //$name=strtoupper($data['full_name']);
								  //echo $verified_data['response']['result']['name'];
								 // echo $name;
								 //$result=strcmp($verified_data['response']['result']['name'], $name);
								 //echo $result;
								
								 if(isset($verified_data['response']))
								 {
										 if($verified_data['response']['result']['verified']=='true' && $verified_data['response']['result']['message']=='Verification completed with positive results' )
									 {
										 //echo "sucess";
										  $json = array
										(
											'response' =>$response,
											'msg'=>'sucess'
										);
										echo json_encode($json);
									 }else
									 {
										 $json = array
										(
											
											'response' =>$response,
											'msg'=>'fail'
										);
										echo json_encode($json);
									 }
								 }
								 else if(isset($verified_data['error']))
								 {
									  $json = array
									(
										'response' =>$verified_data['error']['message'],
										'msg'=>'error'
									);
									echo json_encode($json);
								 }
			}
		
	}
	public function Verify_Voterid($response,$data)
	{
		$epic_no=$data['pan_no'];
		$fullname=$data['full_name'];
		$state=$data['state'];
		
		$identity=json_decode($response);
		$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://signzy.tech/api/v2/snoops/",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "{\"service\":\"Identity\",\"itemId\":\"$identity->id\",\"accessToken\":\"$identity->accessToken\",\"task\":\"verification\",\"essentials\":{\"epicNumber\":\"$epic_no\",\"name\":\"$fullname\",\"state\":\"$state\"}}",
				  CURLOPT_HTTPHEADER => array(
					"accept: */*",
					"accept-language: en-US,en;q=0.8",
					"content-type: application/json"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
								 
								 $verified_data=json_decode($response,true);
								  //$name=strtoupper($data['full_name']);
								  //echo $verified_data['response']['result']['name'];
								 // echo $name;
								 //$result=strcmp($verified_data['response']['result']['name'], $name);
								 //echo $result;
								
								 if(isset($verified_data['response']))
								 {
										 if($verified_data['response']['result']['verification']=='true' && $verified_data['response']['result']['message']=='Verification completed with positive result' )
									 {
										 //echo "sucess";
										  $json = array
										(
											'response' =>$response,
											'msg'=>'sucess'
										);
										echo json_encode($json);
									 }else
									 {
										 $json = array
										(
											
											'response' =>$response,
											'msg'=>'fail'
										);
										echo json_encode($json);
									 }
								 }
								  else if(isset($verified_data['error']))
								 {
									  $json = array
									(
										'response' =>$verified_data['error']['message'],
										'msg'=>'error'
									);
									echo json_encode($json);
								 }
								
			

					
					
					
					
				 
				}
	}
	// public function Verify_PAN($response,$data)
	// {

	// 	$PAN_no=$data['pan_no']; 
        		
        	
	// 	$identity=json_decode($response);
	// 	$curl = curl_init();
    //     $options=array(
	// 	  CURLOPT_URL => "https://signzy.tech/api/v2/snoops",
	// 	  CURLOPT_RETURNTRANSFER => true,
	// 	  CURLOPT_ENCODING => "",
	// 	  CURLOPT_MAXREDIRS => 10,
	// 	  CURLOPT_TIMEOUT => 30,
	// 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 	  CURLOPT_CUSTOMREQUEST => "POST",
	// 	  CURLOPT_POSTFIELDS => "{\"service\":\"Identity\",\"itemId\":\"$identity->id\",\"accessToken\":\"$identity->accessToken\",\"task\":\"fetch\",\"essentials\":{\"number\":\"$PAN_no\"}}",
	// 	  CURLOPT_HTTPHEADER => array(
	// 		"accept: */*",
	// 		"accept-language: en-US,en;q=0.8",
	// 		"content-type: application/json"
	// 	  ),
	// 	);
		
	// 	curl_setopt_array($curl,$options );

	// 	$response = curl_exec($curl);
	// 	$err = curl_error($curl);

	// 	curl_close($curl);

	// 	if ($err) {
	// 	  echo "cURL Error #:" . $err;
		  
	// 	} else 
	// 	{
			
	// 		 $verified_data=json_decode($response,true);
	// 		  $name=strtoupper($data['full_name']);
	// 		  //echo $verified_data['response']['result']['name'];
	// 		 // echo $name;
	// 		 //$result=strcmp($verified_data['response']['result']['name'], $name);
	// 		 //echo $result;
			
	// 		 if(isset($verified_data['response']))
	// 		 {
	// 				 if(strcmp($verified_data['response']['result']['name'], $name)==0)
	// 			 {
	// 				 //echo "sucess";
	// 				  $json = array
	// 				(
	// 					'response' =>$response,
	// 					'msg'=>'sucess',
	// 					'name'=>$verified_data['response']['result']['name']
	// 				);
	// 				echo json_encode($json);
	// 			 }else
	// 			 {
	// 				 $json = array
	// 				(
	// 				    'name'=>$verified_data['response']['result']['name'],
	// 					'response' =>$response,
	// 					'msg'=>'fail'
	// 				);
	// 				echo json_encode($json);
	// 			 }
	// 		 }
	// 		 else if(isset($verified_data['error']))
	// 		 {
	// 			  $json = array
	// 			(
	// 				'response' =>$verified_data['error']['message'],
	// 				'msg'=>'error'
	// 			);
	// 			echo json_encode($json);
	// 		 }
			

	// 	} 

	// //	$json = array
	// //	(
			
	// 	//	'msg'=>'sucess'
			
	// //	);
	// //	echo json_encode($json);

	// }
	public function Verify_PAN($response,$data)
	{

		$PAN_no=$data['pan_no']; 
        		
        	
		$identity=json_decode($response);
		$curl = curl_init();
        $options=array(
		  CURLOPT_URL => "https://signzy.tech/api/v2/snoops",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"service\":\"Identity\",\"itemId\":\"$identity->id\",\"accessToken\":\"$identity->accessToken\",\"task\":\"fetch\",\"essentials\":{\"number\":\"$PAN_no\"}}",
		  CURLOPT_HTTPHEADER => array(
			"accept: */*",
			"accept-language: en-US,en;q=0.8",
			"content-type: application/json"
		  ),
		);
		
		curl_setopt_array($curl,$options );

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		  
		} else 
		{
			
			 $verified_data=json_decode($response,true);

			 //echo "<pre>";
			 //print_r($verified_data);
			//echo "</pre>";
			//exit();
			  $name=strtoupper($data['full_name']);
			  //echo $verified_data['response']['result']['name'];
			 // echo $name;
			 //$result=strcmp($verified_data['response']['result']['name'], $name);
			 //echo $result;
			
			 if(isset($verified_data['response']))
			 {
					 if(strcmp($verified_data['response']['result']['name'], $name)==0)
				 {
					 //echo "sucess";
					 if(isset($verified_data['response']['result']['fatherName']) && $verified_data['response']['result']['fatherName'] != '')
						 {
					  $json = array
					(
						'response' =>$response,
						'msg'=>'sucess',
						'name'=>$verified_data['response']['result']['name'],
						'fatherName'=>$verified_data['response']['result']['fatherName']
					);
					
						 }
						 else
						 {
							 $json = array(
						'response' =>$response,
						'msg'=>'sucess',
						'name'=>$verified_data['response']['result']['name'],
						'fatherName'=>''
					);
							 
						 }
					echo json_encode($json);
				 }else
				 {
					 if(isset($verified_data['response']['result']['fatherName']) && $verified_data['response']['result']['fatherName'] != '')
						 {
					 $json = array
					(
					    'name'=>$verified_data['response']['result']['name'],
						'fatherName'=>$verified_data['response']['result']['fatherName'],
						'response' =>$response,
						'msg'=>'fail'
					);
						 }
						 else 
						 {
							 $json = array
					(
					    'name'=>$verified_data['response']['result']['name'],
						'fatherName'=>'',
						'response' =>$response,
						'msg'=>'fail'
					);
						 }
					echo json_encode($json);
				 }
			 }
			 else if(isset($verified_data['error']))
			 {
				  $json = array
				(
					'response' =>$verified_data['error']['message'],
					'msg'=>'error'
				);
				echo json_encode($json);
			 }
			

		} 

	//	$json = array
	//	(
			
		//	'msg'=>'sucess'
			
	//	);
	//	echo json_encode($json);

	}
	public function Verify_GST($response,$data)
	{
		    $type=$data['Identity_objects_type'];
			$GST_no=$data['pan_no'];
		    $auth=json_decode($response);
		    $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/".$auth->userId."/gstns",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\"task\":\"$type\",\"essentials\":{\"gstin\":\"$GST_no\"}}",
			  CURLOPT_HTTPHEADER => array(
				"accept: */*",
				"accept-language: en-US,en;q=0.8",
				"authorization:".$auth->id,
				"content-type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} 
			else 
			{
				
			  $verified_data=json_decode($response,true);
			 
			  $org_name=strtoupper($data['full_name'][0]);
			  $business_constitution=strtoupper($data['full_name'][1]);
			  $business_state=strtoupper($data['full_name'][2]);
			   $business_city=strtoupper($data['full_name'][3]);
			   //echo $verified_data['result']['gstnDetailed']['principalPlaceSplitAddress']['state']['0']['0'];
               
			    if(isset($verified_data['result']))
				    {
					   if(strcmp($verified_data['result']['gstnDetailed']['tradeNameOfBusiness'], $org_name)==0)
						{
							
								if(strcmp($verified_data['result']['gstnDetailed']['principalPlaceSplitAddress']['state']['0']['0'], $business_state)==0 && strcmp($verified_data['result']['gstnDetailed']['principalPlaceSplitAddress']['city']['0'], $business_city)==0)
								{
									
										$json = array
										(
                                            'constitutionOfBusiness'=>$verified_data['result']['gstnDetailed']['constitutionOfBusiness'],
											'natureOfBusinessActivities'=>$verified_data['result']['gstnDetailed']['natureOfBusinessActivities'][0],
											'response' =>$response,
											'msg'=>'sucess'
											
										);
										echo json_encode($json);
									
									
								}
								else
								{
									 $json = array
									(
									    'constitutionOfBusiness'=>$verified_data['result']['gstnDetailed']['constitutionOfBusiness'],
										'natureOfBusinessActivities'=>$verified_data['result']['gstnDetailed']['natureOfBusinessActivities'][0],
										'response' =>$response,
										'msg'=>'fail',
										'error'=>'Please Check Registerd State And City.'
									);
									echo json_encode($json);
								}
						
						}
						else
						{
							 $json = array
								(
								    'constitutionOfBusiness'=>$verified_data['result']['gstnDetailed']['constitutionOfBusiness'],
								    'natureOfBusinessActivities'=>$verified_data['result']['gstnDetailed']['natureOfBusinessActivities'][0],
									'response' =>$response,
									'msg'=>'fail',
									'error'=>'Please Check Your Orgnization Name And GST Number'
								);
								echo json_encode($json);
						}
					}
				 else if(isset($verified_data['error']))
				 {
					  $json = array
						(
							'response' =>$verified_data['error']['message'],
							'msg'=>'error'
						);
						echo json_encode($json);
				}
			}
	}
	public function Verify_GST_Retailer($response,$data)
	{
		   
		    $type=$data['Identity_objects_type'];
			$GST_no=$data['pan_no'];
		    $auth=json_decode($response);
		    $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/".$auth->userId."/gstns",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\"task\":\"$type\",\"essentials\":{\"gstin\":\"$GST_no\"}}",
			  CURLOPT_HTTPHEADER => array(
				"accept: */*",
				"accept-language: en-US,en;q=0.8",
				"authorization:".$auth->id,
				"content-type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} 
			else 
			{
				
			  $verified_data=json_decode($response,true);
			 
			  /*$org_name=strtoupper($data['full_name'][0]);
				$business_constitution=strtoupper($data['full_name'][1]);
				$business_state=strtoupper($data['full_name'][2]);
				$business_city=strtoupper($data['full_name'][3]);*/
			   //echo $verified_data['result']['gstnDetailed']['principalPlaceSplitAddress']['state']['0']['0'];
               
			    if(isset($verified_data['result']))
				    {
					  
									
										$json = array
										(
                                            'constitutionOfBusiness'=>$verified_data['result']['gstnDetailed']['constitutionOfBusiness'],
											'legalNameOfBusiness'=>$verified_data['result']['gstnDetailed']['legalNameOfBusiness'],
											'principalPlaceAddress'=>$verified_data['result']['gstnDetailed']['principalPlaceAddress'],
											'principalPlaceDistrict'=>$verified_data['result']['gstnDetailed']['principalPlaceDistrict'],
											'principalPlaceState'=>$verified_data['result']['gstnDetailed']['principalPlaceState'],
											'principalPlacePincode'=>$verified_data['result']['gstnDetailed']['principalPlacePincode'],
											'response' =>$response,
											'msg'=>'sucess'
											
										);
										echo json_encode($json);
									
									
								
					}
				 else if(isset($verified_data['error']))
				 {
					  $json = array
						(
							'response' =>$verified_data['error']['message'],
							'msg'=>'error'
						);
						echo json_encode($json);
				}
			}
	}
	public function Customer_Login()
	{
		$data=$this->session->flashdata('data');
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
										 // CURLOPT_URL => "https://esign-preproduction.signzy.tech/api/customers/login", 
										  CURLOPT_URL => "https://esign.signzy.tech/api/customers/login",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => "",
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "POST",
										  //CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_test\",\"password\":\"JaWCbbPZQK5FhPS4N0PL\"}",
										  CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_PROD_LIVE\",\"password\":\"4lMmdEWyM6k2l05KpNb6\"}",
										  CURLOPT_HTTPHEADER => array(
											"accept: */*",
											"accept-language: en-US,en;q=0.8",
											"content-type: application/json"
										  ),
										)
							);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			  //echo "<pre>";
			 // echo $response;
			  //echo '<br>';
			  $this->File_Exchange($data,$response);
		}
		
	}
	public function File_Exchange($data,$response)
	{
		//$link=$data['link'];
		//$id='RRNNIAev31';
		/*$data_row = $this->Customercrud_model->getDocuments($id);
		foreach($data_row as $row)
			{   
				if($row->DOC_MASTER_TYPE=='kyc' || $row->DOC_MASTER_TYPE=='KYC')	{	
					$dir='./images/documents/';
					$filename=$row->DOC_NAME;

					if(file_exists($dir.$filename))
					  {
						$data['link']=$dir.$filename;
					  }
					else 
					   {
						 $this->session->set_flashdata('warning', 'You Are Not Uploaded Your Document Please Upload Documents');
					   }
				}

			}
			*/
	    $link=$data['link'];

		$this->session->set_userdata('Userid',$data['Userid']);
		$final_link=base_url().$link;
		//echo $final_link;
		//exit();
		$cust_login=json_decode($response);
		$this->session->set_userdata('cust_login',$cust_login);
		$curl = curl_init();
		$tmp = tempnam(sys_get_temp_dir(), 'php');
        file_put_contents($tmp, file_get_contents($final_link));
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://preproduction-persist.signzy.tech/api/files/upload",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>array(
																	  'file' => new CURLFile($tmp),
																	  'ttl'  => 'infinity',
																	),
			  CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: multipart/form-data;",
				
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  //echo $response;
			   $this->Doc_Aadhar_Esign($response,$cust_login,$data);
			}
	}
	public function Doc_Aadhar_Esign($response,$cust_login,$data)
	{
		$file_details=json_decode($response,true);
		$directURL=$file_details['file']['directURL'];
		$redirect_url=base_url().'index.php/Api_Functions/view_E_signdoc';
		$name=$data['name'];
		$this->session->set_userdata('Cust_name',$data['name']);
		
		
		
		
				$curl = curl_init();

				 $options=array(
				  //CURLOPT_URL => "https://esign-preproduction.signzy.tech/api/customers/".$cust_login->userId."/aadhaaresigns",
				  CURLOPT_URL => "https://esign.signzy.tech/api/customers/".$cust_login->userId."/aadhaaresigns",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"{\"task\": \"url\",\"inputFile\": \"$directURL\",\"callbackUrl\": \"$redirect_url\",\"redirectUrl\": \" $redirect_url\",\"redirectTime\": \"20\",\"signatureType\": \"aadhaaresign\",\"name\": \"$name\"}",
				  CURLOPT_HTTPHEADER => array(
					"authorization:".$cust_login->id,
					"cache-control: no-cache",
					"content-type: application/json",
					
				  ),
				);
				
			   curl_setopt_array($curl,$options );

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  //echo $response;
				  $uploded_file=json_decode($response,true);
				   $this->session->set_userdata("uploded_file",$uploded_file);
				  $redirect_url=$uploded_file['result']['url'];
				  
				  redirect($redirect_url);
				 
				  
				  
				  
				
				 
				  
				  
				}
	
	}
	public function view_E_signdoc()
	{	     

		$uploded_file=$this->session->userdata("uploded_file");	
		$cust_login=$this->session->userdata("cust_login");	
		$Userid=$this->session->userdata("Userid");
		
		$customer_id=$uploded_file['customerId'];
        $customer_token=$uploded_file['result']['token'];
		$auth=$cust_login->id;
		$Cust_name=$this->session->userdata("Cust_name");	
      		
        $curl = curl_init();

			curl_setopt_array($curl, array(
			 // CURLOPT_URL => "https://esign-preproduction.signzy.tech/api/callbacks",
			  CURLOPT_URL => "https://esign.signzy.tech/api/callbacks",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => " {\"customerId\": \"$customer_id\",\"token\": \"$customer_token\"}",
			  CURLOPT_HTTPHEADER => array(
				"authorization:".$auth,
				"cache-control: no-cache",
				"content-type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else 
			{
			  
			  //echo $response;
			   $this->load->helper('download');
			   $Esign_file_details=json_decode($response,true);
			   $fileName=$Esign_file_details['result']['esignedFile'];
			   require 'fpdf.php';
			   $data = file_get_contents($fileName);
			    if(strcmp($Esign_file_details['dscData']['name'], strtoupper($Cust_name))==0)
				{
				    
						
						       $dir='./images/all_document_pdf/';    
								$filename= "esign_$Userid.pdf"; 

						
							if (file_exists($dir.$filename)) {
							  $fh = fopen($dir.$filename, 'a');
							  fwrite($fh, $data."\n");
							} else {
							  $fh = fopen($dir.$filename, 'w');
							  fwrite($fh, $data."\n");
							}
							fclose($fh);
							$link=$dir.$filename;
							$this->session->set_flashdata('link', $link);
							 $array_input_more = array(
											'CUST_ID' => $Userid,
											'STATUS'=>('Aadhar E-sign complete')
											);
							
							$result_id1 = $this->Customercrud_model->update_profile_more($Userid, $array_input_more);
							redirect('Customer/Customer_loan_apply_sucess/');
				}
				else
				{
					$this->session->set_flashdata('warning','warning');
					redirect('customer/view_doc');
				}
			   
			 
						
						
				                
			   
			}   
										
	}
// code by priyanka abd ============================================================================================================
	public function Authantication_ICWA_api()
	{
	  $data=array(
		             
					 'icwai_number'=>$this->input->post('icwai_number')
					 
		           );
				  
				 
				  
		$curl = curl_init();

		curl_setopt_array($curl, array(
										  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/login",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => "",
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "POST",
										  //CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_test\",\"password\":\"JaWCbbPZQK5FhPS4N0PL\"}",
										  CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_PROD_LIVE\",\"password\":\"4lMmdEWyM6k2l05KpNb6\"}",
										  CURLOPT_HTTPHEADER => array(
											"accept: */*",
											"accept-language: en-US,en;q=0.8",
											"content-type: application/json"
										  ),
										)
							);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			   $this->ICWA_verification($response,$data);
		}
		
	}
	public function ICWA_verification($response,$data)
	{
		$auth=json_decode($response);
		$Cust_number=$data['icwai_number'];
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://signzy.tech/api/v2/patrons/".$auth->userId."/icwais",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\"type\":\"firms\",\"essentials\":{\"firmNumber\":\"$Cust_number\"}}",
        CURLOPT_HTTPHEADER => array(
         "accept: */*",
         "accept-language: en-US,en;q=0.8",
        "authorization:".$auth->id,
         "content-type: application/json"
         ),
        ));
     
      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
       if ($err) 
      {
        echo "cURL Error #:" . $err;
      }  
      else
	  {
       	
		 $auth1=json_decode($response, true);
		 
	   // echo '<pre>';
	  // print_r($auth1['result']);
		$inner_array=$auth1['result'];
		//exit();
		 $inner_splitAddress_array=$auth1['result']['splitAddress'];
		 $inner_splitAddress_district_array=$inner_splitAddress_array['district'];
		 
		 $district=$inner_splitAddress_district_array[0];
		 
		 $inner_splitAddress_state_array=$inner_splitAddress_array['state'];
		 $inner_splitAddress_state_0_array = $inner_splitAddress_state_array[0];
		 
		 $state=$inner_splitAddress_state_0_array[0];
		 
		 $inner_splitAddress_city_array=$inner_splitAddress_array['city'];
		  
		 $city =  $inner_splitAddress_city_array[0];
		  
		 $pincode = $inner_splitAddress_array['pincode'];
		 
		 $addressline= $inner_splitAddress_array['addressLine'];
		 
		// echo $district;
		//echo $state;
		// echo $city;
		// echo $pincode;
		// echo $addressline;
		
		 
			        if(isset($auth1['result']))
				    {
						  
						       $json = array
								(
								   	'msg'=>'sucess',
									//'address'=>$auth1['result']['address'],
									'address' =>$addressline,
									'district'=>$district,
									'state'=>$state,
									'city'=>$city,
									'pincode'=>$pincode
									
									
									
								);
								echo json_encode($json);
					}
				 else if(!isset($auth1['error']))
				   {
					  $json = array
						(
							'msg'=>'fail'
						);
						echo json_encode($json);
				   }
				   else if(isset($auth1['error']))
				   {
					  $json = array
						(
							'response' =>$auth1['error']['message'],
							'msg'=>'error'
						);
						echo json_encode($json);
				   }
	  }
	}
    public function Authantication_ICAI_api()
	{
	  $data=array(
		             
					 'icai_number'=>$this->input->post('icai_number')
					 
		           );
				  
				 
				  
		$curl = curl_init();

		curl_setopt_array($curl, array(
										  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/login",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => "",
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "POST",
										 // CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_test\",\"password\":\"JaWCbbPZQK5FhPS4N0PL\"}",
										 CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_PROD_LIVE\",\"password\":\"4lMmdEWyM6k2l05KpNb6\"}",
										  CURLOPT_HTTPHEADER => array(
											"accept: */*",
											"accept-language: en-US,en;q=0.8",
											"content-type: application/json"
										  ),
										)
							);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			   $this->ICAI_verification($response,$data);
		}
		
	}
	public function ICAI_verification($response,$data)
	{
		$auth=json_decode($response);
		$Cust_number=$data['icai_number'];
		
		
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://signzy.tech/api/v2/patrons/".$auth->userId."/icais",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
       	CURLOPT_POSTFIELDS => "{\"essentials\":{\"memberNumber\":\"$Cust_number\"}}",
        CURLOPT_HTTPHEADER => array(
         "accept: */*",
         "accept-language: en-US,en;q=0.8",
        "authorization:".$auth->id,
         "content-type: application/json"
         ),
        ));
     
      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
       if ($err) 
      {
        echo "cURL Error #:" . $err;
      }  
      else
	  {
       	
		 $auth1=json_decode($response, true);
		 
		//echo '<pre>';
		//print_r($auth1['result']);
		// $inner_array=$auth1['result'];
		// exit();
		 $inner_splitAddress_array=$auth1['result']['splitAddress'];
		 $inner_splitAddress_district_array=$inner_splitAddress_array['district'];
		 
		 $district=$inner_splitAddress_district_array[0];
		 
		 $inner_splitAddress_state_array=$inner_splitAddress_array['state'];
		 $inner_splitAddress_state_0_array = $inner_splitAddress_state_array[0];
		 
		 $state=$inner_splitAddress_state_0_array[0];
		 
		 $inner_splitAddress_city_array=$inner_splitAddress_array['city'];
		  
		 $city =  $inner_splitAddress_city_array[0];
		  
		 $pincode = $inner_splitAddress_array['pincode'];
		 
		 $addressline= $inner_splitAddress_array['addressLine']; 
		 
		          if(isset($auth1['result']))
				    {
						
						 $json = array
								(
								   'msg'=>'sucess',
									//'address'=>$auth1['result']['address'],
									'address' =>$addressline,
									'district'=>$district,
									'state'=>$state,
									'city'=>$city,
									'pincode'=>$pincode
									
								);
								echo json_encode($json);
					}
					else if(!isset($auth1['error']))
				   {
					  $json = array
						(
							'msg'=>'fail'
						);
						echo json_encode($json);
				   }
				   else if(isset($auth1['error']))
				   {
					  $json = array
						(
							'response' =>$auth1['error']['message'],
							'msg'=>'error'
						);
						echo json_encode($json);
				   }
	  }
	}
	
    public function Authantication_CS_api()
	{
	  $data=array(
		             
					 'cs_number'=>$this->input->post('cs_number')
					 
		           );
				  
				 
				  
		$curl = curl_init();

		curl_setopt_array($curl, array(
										  CURLOPT_URL => "https://signzy.tech/api/v2/patrons/login",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => "",
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "POST",
										  //CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_test\",\"password\":\"JaWCbbPZQK5FhPS4N0PL\"}",
										  CURLOPT_POSTFIELDS => "{\"username\":\"finaleap_PROD_LIVE\",\"password\":\"4lMmdEWyM6k2l05KpNb6\"}",
										  CURLOPT_HTTPHEADER => array(
											"accept: */*",
											"accept-language: en-US,en;q=0.8",
											"content-type: application/json"
										  ),
										)
							);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		else {
			   $this->CS_verification($response,$data);
		}
		
	}
	public function CS_verification($response,$data)
	{
		$auth=json_decode($response);
		$Cust_number=$data['cs_number'];
		
		
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://signzy.tech/api/v2/patrons/".$auth->userId."/icsis",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
       	CURLOPT_POSTFIELDS => "{\"essentials\":{\"memberType\":\"ACS\",\"memberNumber\":\"$Cust_number\"}}",
		CURLOPT_HTTPHEADER => array(
         "accept: */*",
         "accept-language: en-US,en;q=0.8",
        "authorization:".$auth->id,
         "content-type: application/json"
         ),
        ));
     
      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
       if ($err) 
      {
        echo "cURL Error #:" . $err;
      }  
      else
	  {
       	
		 $auth1=json_decode($response, true);
		 
		//echo '<pre>';
		//print_r($auth1['result']);
		// $inner_array=$auth1['result'];
		//exit();
		 $inner_splitAddress_array=$auth1['result']['splitAddress'];
		 $inner_splitAddress_district_array=$inner_splitAddress_array['district'];
		 
		 $district=$inner_splitAddress_district_array[0];
		 
		 $inner_splitAddress_state_array=$inner_splitAddress_array['state'];
		 $inner_splitAddress_state_0_array = $inner_splitAddress_state_array[0];
		 
		 $state=$inner_splitAddress_state_0_array[0];
		 
		 $inner_splitAddress_city_array=$inner_splitAddress_array['city'];
		  
		 $city =  $inner_splitAddress_city_array[0];
		  
		 $pincode = $inner_splitAddress_array['pincode'];
		 
		 $addressline= $inner_splitAddress_array['addressLine'];
		 
		            if(isset($auth1['result']))
				    {
						
						 $json = array
								(
								   	'msg'=>'sucess',
									//'address'=>$auth1['result']['address'],
									'address' =>$addressline,
									'district'=>$district,
									'state'=>$state,
									'city'=>$city,
									'pincode'=>$pincode
									
								);
								echo json_encode($json);
					}
					else if(!isset($auth1['error']))
				   {
					  $json = array
						(
							'msg'=>'fail'
						);
						echo json_encode($json);
				   }
				   else if(isset($auth1['error']))
				   {
					  $json = array
						(
							'response' =>$auth1['error']['message'],
							'msg'=>'error'
						);
						echo json_encode($json);
				   }
	  }
	}
 // api test functions ===========================================================================================================
     public function Test_CS_verification()
	 {
		  $json = array
								(
								   	'msg'=>'sucess',
									'address' =>'C-1,PHASE-2,RAJPURA',
									'district'=>'PATHANKOT',
									'state'=>'PUNJAB',
									'city'=>'FOCAL POINT',
									'pincode'=>'143525'
																		
								);
								echo json_encode($json);
	 }	 
	  public function Test_CA_verification()
	 {
		  $json = array
								(
								   	'msg'=>'sucess',
									'address' =>'PLOT NO 341,WARD 6A,NEAR DAV SCHOOL,ADIPUR INDIA',
									'district'=>'KACHCHH',
									'state'=>'GUJARAT',
									'city'=>'KIDANA',
									'pincode'=>'370205'
																		
								);
								echo json_encode($json);
	 }	
	  public function Test_ICWA_verification()
	 {
		  $json = array
								(
								   	'msg'=>'sucess',
									'address' =>'C-6,PHASE-2,RAJPURA',
									'district'=>'PATHANKOT',
									'state'=>'PUNJAB',
									'city'=>'FOCAL POINT',
									'pincode'=>'143525'
																		
								);
								echo json_encode($json);
	 }	

	 public function Test_PAN_verification()
	 {
		$json = array
			(
				
				'msg'=>'sucess'
				
			);
			echo json_encode($json);
	 }

	 public function Test_drivingLicence_verification()
	 {
		$json = array
			(
				
				'msg'=>'sucess'
				
			);
			echo json_encode($json);
	 }
	
	 public function Test_Passport_verification()
	 {
		$json = array
			(
				
				'msg'=>'sucess'
				
			);
			echo json_encode($json);
	 }
	 public function Test_Voterid_verification()
	 {
		$json = array
			(
				
				'msg'=>'sucess'
				
			);
			echo json_encode($json);
	 }
	 public function Test_GST_verification()
	 {
		$json = array
			(
				
				'msg'=>'sucess'
				
			);
			echo json_encode($json);
	 }
	  /*------------------------------------------------- aadhar verification------------------------------------------------------*/
	  public function send_otp()
	  {
		 $aadhar_no=$this->input->post('aadhar_no');
		 
		 $curl = curl_init();
 
		 curl_setopt_array($curl, array(
		   CURLOPT_URL => 'https://ping.arya.ai/api/v1/aadhaar-verification-generate-otp',
		   CURLOPT_RETURNTRANSFER => true,
		   CURLOPT_ENCODING => '',
		   CURLOPT_MAXREDIRS => 10,
		   CURLOPT_TIMEOUT => 0,
		   CURLOPT_FOLLOWLOCATION => true,
		   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		   CURLOPT_CUSTOMREQUEST => 'POST',
		   CURLOPT_POSTFIELDS =>'{
			 "req_id":"'.REQ_ID_AADHAR.'",
			 "aadhaar_number":"'.$aadhar_no.'"
			 
		 }',
		   CURLOPT_HTTPHEADER => array(
			 'token:'.TOKEN_AADHAR,
			 'Content-Type: application/json'
		   ),
		 ));
		 
		 //"aadhaar_number":"360381182129"
		 //"aadhaar_number":"734280365007"
		 $response = curl_exec($curl);
		 
		 curl_close($curl);
		 echo $response;
	  }
	   public function verify_OTP()
	   {
		 $adhar_OTP=$this->input->post('adhar_OTP');
		 $client_id=$this->input->post('client_id');
		 $curl = curl_init();
 
		 curl_setopt_array($curl, array(
		   CURLOPT_URL => 'https://ping.arya.ai/api/v1/aadhaar-verification-submit-otp',
		   CURLOPT_RETURNTRANSFER => true,
		   CURLOPT_ENCODING => '',
		   CURLOPT_MAXREDIRS => 10,
		   CURLOPT_TIMEOUT => 0,
		   CURLOPT_FOLLOWLOCATION => true,
		   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		   CURLOPT_CUSTOMREQUEST => 'POST',
		   CURLOPT_POSTFIELDS =>'{
		   "req_id":"'.REQ_ID_AADHAR.'",
		   "client_id":"'.$client_id.'",
		   "otp":"'.$adhar_OTP.'"
			 
		 }',
		   CURLOPT_HTTPHEADER => array(
			 'token:'.TOKEN_AADHAR,
			 'Content-Type: application/json'
		   ),
		 ));
		 
		 //"aadhaar_number":"360381182129"
		 //"aadhaar_number":"734280365007"
		 $response = curl_exec($curl);
		 
		 curl_close($curl);
		 echo $response;
	   }
	 /*-----------------------------------------------------------------------------------------------------------------------------------*/	
				 
				
}
?>