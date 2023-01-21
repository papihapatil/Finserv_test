<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Functions_for_aadhar extends CI_Controller {
     public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		    }
	public function Customer_Login()
	{
		$data=$this->session->flashdata('data');
		//print_r($data);
	   //exit();
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
        // print_r($data);
		//exit();
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			  //echo "<pre>";
			  //echo $response;
			 // echo '<br>';
			  $this->File_Exchange($data,$response);
		}
		
	}

    public function File_Exchange($data,$response)
	{   
		$link=$data['link'];
		//echo $link;
		
		//print_r($data);
		//exit();
		
			//$this->session->set_userdata('path',$path);
			//$this->session->set_userdata('aadhar_name',$aadhar_name );
		
		//echo $data['name'];
		//echo $userdata['path'];
	   //	echo $data['name'];
	   //exit();  
		//C:/xampp/htdocs/demo/uplodes/Aadharcard_PriyankaAbdagire9.pdf priyanka

		//$this->session->set_userdata('Userid',$data['Userid']);
		//$final_link=base_url().$link;
		$final_link=$link;
		
		//echo $final_link;
		//exit();
		$cust_login=json_decode($response);
		$this->session->set_userdata('cust_login',$cust_login);
		$curl = curl_init();
		$tmp = tempnam(sys_get_temp_dir(), 'php');
        file_put_contents($tmp, file_get_contents($final_link));
		//file_put_contents($tmp, file_get_contents($link));
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
		//$redirect_url=base_url().'index.php/Api_Functions_for_aadhar/view_E_signdoc';
		//$redirect_url=base_url().'index.php/Api_Functions/view_E_signdoc';
		$redirect_url=base_url().'index.php/Api_Functions/view_E_signdoc_new';
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
				
    			 //echo "here";
				// echo $response;
				// exit();
				   $uploded_file=json_decode($response,true);
				   $this->session->set_userdata("uploded_file",$uploded_file);
		 		   $this->session->set_userdata('cust_email_for_aadhar',$data['cust_email_for_aadhar']);
		       //  echo $data['cust_email_for_aadhar'];
		         // exit();
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
			  		   
			   $this->load->helper('download');
			   $Esign_file_details=json_decode($response,true);
			   $fileName=$Esign_file_details['result']['esignedFile'];
			   require 'fpdf.php';
			   $data = file_get_contents($fileName);
			    if(strcmp($Esign_file_details['dscData']['name'], strtoupper($Cust_name))==0)
				{
				    
						
						       $dir='./images/all_document_pdf/';    
								$filename= "esign_$Userid.pdf"; 
                //   echo "here";
				  //echo $filename;
				  //exit();
						
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
					     // $this->session->set_flashdata('sucess','sucess');
					      // redirect('front/new_aadhar_esign');
							
							
				}
				else
				{
					$this->session->set_flashdata('warning','warning');
					redirect('customer/view_doc');
				}
			   
			 
						
						
				                
			   
			}   
										
	}
	   
}
?>