<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cron extends CI_Controller {

		public function __construct() {
			parent:: __construct();
		  
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Cron_model');
			$this->load->model('Admin_model');
			$this->load->library('email');	
			$this->load->model('common_model','common');
			$this->load->library('upload');
			$this->load->helper(array('form', 'url'));
			
			if($this->session->userdata('SITE') != 'finserv'){
				
            redirect(base_url('index.php/login'));
        }

		}

		public function updatepassword()
		{

						echo "Update Password Done";

						$savedDocTypekyc = $this->Cron_model->updatepassword();

		}


		public function response()
		{
			$id = $this->input->post('id');
		$type = $this->input->post('type');
		$password = $this->input->post('pass');
		$res = $this->Cron_model->updatepassword2($password, $id, $type);
		$res = $this->Cron_model->updatepasswordexpire($password, $id, $type);
		if($res){
			$response = array('status' => 1, 'message' => "Password updated successfully, please login using newly updated password.", 'path' => base_url('index.php'));
			echo json_encode($response);
		}else{
			$response = array('status' => 0, 'message' => "Unable to update password, please try again", 'path' => '');
			echo json_encode($response);
		}

		}


		public function downloadexcel()
		{
			echo "Download excel will come here.. ";
$url = "https://finaleap.com/dsa/dsa/index.php/admin/download_Excel";

 $tmp_name = "cloudfile/".time()."_Finaleap_data.xlsx";
			$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$st = curl_exec($ch);
$fd = fopen($tmp_name, 'w+');
fwrite($fd, $st);
fclose($fd);
echo "Hi";
curl_close($ch);


/*

$url = "https://finaleap.com/dsa/dsa/index.php/admin/download_Excel_user?data_for=DSA";

 $tmp_name_dsa = "cloudfile/".time()."_Finaleap_data_dsa.xlsx";
			$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$st = curl_exec($ch);
$fd = fopen($tmp_name_dsa, 'w+');
fwrite($fd, $st);
fclose($fd);
echo "Hi";
curl_close($ch);
// https://finaleap.com/dsa/dsa/index.php/admin/download_Excel_user?data_for=DSA


$url = "https://finaleap.com/dsa/dsa/index.php/admin/download_Excel_user?data_for=Connector";

 $tmp_name_conn = "cloudfile/".time()."_Finaleap_data_conn.xlsx";
			$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$st = curl_exec($ch);
$fd = fopen($tmp_name_conn, 'w+');
fwrite($fd, $st);
fclose($fd);
echo "Hi";
curl_close($ch);

*/

									$res = $this->Cron_model->sendexcelfile($tmp_name);

		
		}
		
		
		public function sendemaildsa()
		{
			
			$url = "https://finaleap.com/dsa/dsa/index.php/admin/download_Excel_user?data_for=DSA";

 $tmp_name_dsa = "cloudfile/".time()."_Finaleap_data_dsa.xlsx";
			$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$st = curl_exec($ch);
$fd = fopen($tmp_name_dsa, 'w+');
fwrite($fd, $st);
fclose($fd);
echo "Hi";
curl_close($ch);

$res = $this->Cron_model->sendexcelfiledsa($tmp_name_dsa);
			
		}
		
		


		public function downloadwget()
		{

			echo exec("wget https://finaleap.com/dsa/dsa/index.php/admin/save_Excel");


		}


		public function trucatetable()
{
	$this->Cron_model->truncatetable();
	
}
		public function createdir()
		{
		echo "<pre>";
					$res = $this->Cron_model->createdircust();
				foreach($res as $row) {
				//echo "Create Dir will come here";
				//print_r($row);
				$dirname = "Finaleap/customers/".$row->ID;

				 $curlurl = "curl -X MKCOL -u jaynimbalkar:Jay@1985 https://files.finaleap.com/remote.php/dav/files/jaynimbalkar/".$dirname."";
	
			//echo "<br>";
				 exec($curlurl);

				 $this->Cron_model->insertcustomer($row->ID);

				}

		}

		
	 public function changepassword($code)
		{
			

									$res = $this->Cron_model->getUser($code);

								

									if($res){
			if($res->CODE == $code){
				if($res->IS_EXPIRED == 0){
					$this->load->view('forgotpassword/tokenexpired');	
				}else{
					date_default_timezone_set('Asia/Kolkata');			
					$curentDate = date('Y-m-d H:i:s');
					$savedDate = $res->DATE_TIME;

					$savedDate = strtotime($savedDate);
					$curentDate = strtotime($curentDate);
					$datediff = $curentDate - $savedDate;

					$dateeDiffDay = round($datediff / (60 * 60 * 24));
					if($dateeDiffDay>=1){
						$this->load->view('forgotpassword/tokenexpired');	
					}else{
						$data['id'] = $res->EMAIL_MOBILE;
						$data['type'] = $res->TYPE;							
						$this->load->view('Cron/changepassword', $data);		
					}
				}					
			}else{
				$this->load->view('forgotpassword/tokenexpired');	
			}			
		}else if($code == ''){
			$this->load->view('forgotpassword/tokenexpired');	
		}

										
		}

		public function operation()
		{
			echo "Operation filter consent ";
			
			echo "";

						$savedDocTypekyc = $this->Cron_model->consenttat();


		}

		public function operation2()
		{
			echo "Operation Filter 2";

		}

		public function operation3()
		{
			echo "Operation 3";
		}

		public function operation4()
		{
			echo "Operation 4";
		}

		public function resetpassword()
		{

			echo "Reset Password Done";

						$savedDocTypekyc = $this->Cron_model->resetpassword();


		}

		public function AutoReject()
		{
			echo "Auto Reject Done";

			//CREATED_AT

							$savedDocTypekyc = $this->Cron_model->update_customer_consent();
		}


		public function TestCron()
		{
							$savedDocTypekyc = $this->Cron_model->TestCron();
		}


		public function EmptyCloudFile()
		{

			echo "Empty cloud files Done<br>";

			//$data="item2.txt";
        $dir = "cloudfile";
        $dirHandle = opendir($dir);
        while ($file = readdir($dirHandle)) {
          //  if($file==$data) {
            //    unlink($file);
           // }
		   if(is_dir($file))
			{
				 //echo "HI ".$file;
			}
			else
			{
				//echo $file."<br>";

				   chmod($dir."/".$file, 0777);

				//unlink($file);
				if(unlink($dir."/".$file))
    {
        echo "file named $file has been deleted successfully <br>";
    }
    else
    {
        echo "file is not deleted";
    }
			}
        }

        closedir($dirHandle);

		}

	}
?>