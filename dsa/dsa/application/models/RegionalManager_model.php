<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegionalManager_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	function getBranchManagers($id)
    {
       
	   
            $this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 13); 
            $this->db->where('RM_ID', $id); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
            return $response;
	}
	
	public function getRegionalRelationshipOfficers($ClusterManagers)
	{
		
		//echo "Test ";
		
		$this->db->select('UNIQUE_CODE');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 14); 
            $this->db->where_in('CM_ID', $ClusterManagers); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			//print_r($response);
            return $response;
		
	}
	
	public function getClusterManagersCust($id)
	{
		
		//echo "Test".$id;
		
		$this->db->select('UNIQUE_CODE');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 15); 
            $this->db->where_in('RM_ID', $id); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			
			//$UpdateQuery = "UPDATE USER_DETAILS SET RM_ID='HvoVodZ9H6' WHERE ID=929";
			
			//$this->db->query($UpdateQuery);
			foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
            return $array;
			
			
            //return $response;
		
	}
	
	
	public function getClusterManagers($id)
	{
		
		//echo "Test".$id;
		
		$this->db->select('*');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 15); 
            $this->db->where('RM_ID', $id); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			
			//$UpdateQuery = "UPDATE USER_DETAILS SET RM_ID='HvoVodZ9H6' WHERE ID=929";
			
			//$this->db->query($UpdateQuery);
            return $response;
		
	}
	
	
	
	
	public function getRegionalBranchManagers($ClusterManagers)
	{
		 $array=array();

		//echo "Test".$id;
		
		$this->db->select('UNIQUE_CODE');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 13); 
            $this->db->where_in('CM_ID', $ClusterManagers); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
            return $array;
		
	}
	
	
	
	
	public function getRegionalClusterManagers($id)
	{
		 $array=array();

		//echo "Test".$id;
		
		//exit;
		
		$this->db->select('UNIQUE_CODE');
            $this->db->from('USER_DETAILS');
            $this->db->where('ROLE', 15); 
            $this->db->where('RM_ID', $id); 			
            $this->db->order_by("ID", "desc");
            $query = $this->db->get();
            $response = $query->result();
			foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
            return $array;
		
	}
	
	/*-------------------------------- Addded by sonal on cluster BM pagination on 13_05_2022------------------------------------------*/
function get_cluster_BM_Branch_Manager($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('RM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}


public function getClusterDSA($Cluster_manger)
{
	
	$array=array();
	if(count($Cluster_manger) > 0)
	{
 $this->db->select('*');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('CM_ID',$Cluster_manger);
 $this->db->where('ROLE',2);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
	} 
	 //print_r($response);
	 
	 //echo $this->db->last_query();

 return $array;
	
}


public function get_bm_DSA($clusterbmarr)
{
	$array=array();
	if(count($Cluster_manger) > 0)
	{
 $this->db->select('*');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$clusterbmarr);
 $this->db->where('ROLE',2);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
	} 
	 //print_r($response);
	 
	 //echo $this->db->last_query();

 return $array;
	
}

public function get_Cluster_BranchManager($ClusterArr)
{
	$array=array();
	if(count($ClusterArr) > 0)
	{
 $this->db->select('*');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('CM_ID',$ClusterArr);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
	}
	 //print_r($response);
	 
	 //echo $this->db->last_query();

 return $array;
	
}

public function get_RO_BM_BM($Branch_manger)
{
 $array=array();
 if(isset($Branch_manger) && count($Branch_manger) > 0)
 {
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$Branch_manger);
 
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
	 
 }
   
 return $array;
}
public function get_DSA_BM_BM($Branch_manger,$Relationship,$id)
{
 $array=array();
 
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
	 if(isset($Branch_manger) && count($Branch_manger) > 0)
 {
     $this->db->where_in('BM_ID',$Branch_manger);
 }
 $this->db->where('ROLE',2);
 if(isset($Relationship) && count($Relationship) > 0)
 {
 $this->db->or_where_in('RO_ID',$Relationship);
 }
 $this->db->where('ROLE',2);
 //if(isset($id) && count($id) > 0)
 //{
 $this->db->or_where_in('RM_ID',$id);
 //}
 $this->db->where('ROLE',2);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}

public function getRegionalrelationship_manager($cluster_managers,$branch_managers)
{
	$array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$branch_managers);
 $this->db->where('ROLE',14);
	$this->db->or_where_in('CM_ID',$cluster_managers);
 $this->db->where('ROLE',14);
 
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

//print_r($array);

//echo $this->db->last_query();

 return $array;
 
 
}

public function getRegionaldsa_manager($cluster_managers,$branch_managers,$getRegionaldsa_manager)
{
	$array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$branch_managers);
 $this->db->where('ROLE',2);
	$this->db->or_where_in('CM_ID',$cluster_managers);
 $this->db->where('ROLE',2);
 $this->db->or_where_in('RO_ID',$getRegionaldsa_manager);
 $this->db->where('ROLE',2);
 
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

//print_r($array);

//echo $this->db->last_query();

 return $array;
	
}


public function get_cluster_BM_BM($Branch_manger,$Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',4);
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',4);
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/

/*-------------------------------- Addded by sonal on cluster dsa pagination on 13_05_2022------------------------------------------*/
function get_cluster_BM_Dsa($id)
{
//echo $id;
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('RM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 //print_r($response);
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}


/*-------------------------------- Addded by sonal on cluster dsa pagination on 13_05_2022------------------------------------------*/
function get_regional_BM_RO($id)
{
//echo $id;
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('RM_ID',$id);
 $this->db->where('ROLE',14);
 $query = $this->db->get();
 $response=$query->result();
 //print_r($response);
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}

public function get_RO_BM_Dsa2($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
   }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_DSA_BM_Dsa($Branch_manger,$Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
      }
      if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
     }
      if(!empty($id))
     {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',2);
      }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}
public function get_cluster_Dsa($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',4);
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',4);
 
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/


/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_Dsa_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter='',$Cluster_DSA,$BranchDSA)
{
if($filter=='all')
{
 
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
          {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',2);
         }
        if(!empty($Relationship))
         {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',2);
         }
        if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
         }
		 
         if(!empty($sales_id))
         {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',2);
        }
        if(!empty($id))
          {
            $this->db->or_where_in('RM_ID',$id);
            $this->db->where('ROLE',2);
          }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
	
	// "I am here ... ";
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
	 
	 //print_r($response);
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
      if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
     if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",'Complete');
         }
    if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
		  
		   if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
         }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
    if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
             $this->db->where("Profile_Status",NULL);
          }
     if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
          if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL);
         }
          if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
		  
		   if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
         }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
          }
        if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
          }
       if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           
         }
		 
		  if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
         }
		 
        if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
          }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}


/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_RO_Regional($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter='')
{
if($filter=='all')
{
 
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
          {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',14);
         }
        if(!empty($Relationship))
         {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',14);
         }
        if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',14);
         }
         if(!empty($sales_id))
         {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',14);
        }
        if(!empty($id))
          {
            $this->db->or_where_in('RM_ID',$id);
            $this->db->where('ROLE',14);
          }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
      if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
      if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
     if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",'Complete');
         }
    if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
    if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
             $this->db->where("Profile_Status",NULL);
          }
     if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
          if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL);
         }
          if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
          }
        if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
          }
       if(!empty($DSA))
          {
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           
         }
        if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
          }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}


/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_BM_cluster($Branch_manger,$Relationship,$DSA,$id,$filter,$filter_by,$clusterbmarr)
{
	$filter = 'all';
	//echo "test"; print_r($clusterbmarr);
if($filter=='all')
{
 
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
	 
	 //print_r($clusterbmarr);
	 
	 //print_r($Branch_manger);
	 
	 //exit;
	 
	  if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
     $this->db->where_in('CM_ID',$clusterbmarr);
     $this->db->where('ROLE',13);
	 }
	 
	 /*
	 
	  if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',13);
	 }
	 if(isset($Relationship) && count($Relationship) > 0)
	 {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',13);
	 }
	  if(isset($DSA) && count($DSA) > 0)
	 {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',13);
	 }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13); */
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
	 
	 //echo $this->db->last_query();
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
  
  if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
     $this->db->where_in('BM_ID',$clusterbmarr);
     $this->db->where('ROLE',13);
	 }
	 
  if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
  $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',13);
	 }
	 
  $this->db->where("Profile_Status",'Complete');
	 
	 if(isset($Relationship) && count($Relationship) > 0)
	 {
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',13);
	 }
  $this->db->where("Profile_Status",'Complete');
  if(isset($Relationship) && count($Relationship) > 0)
	 {
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",'Complete');
	 }
  $this->db->or_where_in('RM_ID',$id);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",'Complete');
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
  
  
  if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
     $this->db->where_in('BM_ID',$clusterbmarr);
     $this->db->where('ROLE',13);
	 }
	 
  if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
  $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',13);
	 }
  $this->db->where("Profile_Status",NULL);
    if(isset($Relationship) && count($Relationship) > 0)
	 {
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',13);
	 }
  $this->db->where("Profile_Status",NULL);
      if(isset($DSA) && count($DSA) > 0)
	 {
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',13);
  
	 }
  $this->db->where("Profile_Status",NULL);
  $this->db->or_where_in('RM_ID',$id);
  $this->db->where('ROLE',13);
  $this->db->where("Profile_Status",NULL);

 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
	 
	 //if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 //{
     $this->db->where_in('BM_ID',$clusterbmarr);
     $this->db->where('ROLE',13);
	 //}
	 
	 if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',13);
	 }
	 if(isset($Relationship) && count($Relationship) > 0)
	 {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',13);
	 }
	 if(isset($DSA) && count($DSA) > 0)
	 {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',13);
	 }
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',13);
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}
function get_all_BM_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter,$columnSortOrder,$row,$rowperpage,$filter_by,$clusterbmarr)
  {
	  
	 // print_r($clusterbmarr);
	  
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
	/*	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',13);
	 }
           if(isset($Relationship) && count($Relationship) > 0)
	 {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',13);
	 }
	 
	 if(isset($DSA) && count($DSA) > 0)
	 {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',13);
	 }
           $this->db->or_where_in('RM_ID',$id);
           $this->db->where('ROLE',13);
		   */
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
   {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
        $this->db->where($where);
        }
		if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
	 }
	 
	 if(isset($Relationship) && count($Relationship) > 0)
	 {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
	 }
	 if(isset($DSA) && count($DSA) > 0)
	 {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',13);
	 }
        $this->db->where("Profile_Status",'Complete');
        $this->db->or_where_in('RM_ID',$id);
        $this->db->where('ROLE',13);
        $this->db->where("Profile_Status",'Complete');
       // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count; 

} 
else if($filter=='Incomplete')
{
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
	 if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
	 }
	 if(isset($Relationship) && count($Relationship) > 0)
	 {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
	 }
	 if(isset($DSA) && count($DSA) > 0)
	 {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',13);
	 }
     $this->db->where("Profile_Status",NULL);
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 

} 
  
 
 else
 {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=13 OR LN like '%".$searchValue."%' AND ROLE=13";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
		 if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',13);
	 }
	 
	 if(isset($Relationship) && count($Relationship) > 0)
	 {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',13);
		 
	 }
	 if(isset($DSA) && count($DSA) > 0)
	 {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',13);
	 }
         $this->db->or_where_in('RM_ID',$id);
         $this->db->where('ROLE',13);
       //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 }
  } 
 function get_all_BM_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$clusterbmarr)
  {
     //print_r($clusterbmarr); echo "test";
   if($filter=='all')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
	   
	   if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
       $this->db->where_in('UNIQUE_CODE',$clusterbmarr);
       $this->db->where('ROLE',13);
	 }
	   /*if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
	 }
	 if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
	 }
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
	   if(isset($Relationship) && count($Relationship) > 0)
	 {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
	 }
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
	   if(isset($Relationship) && count($Relationship) > 0)
	 {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
	 }
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 if(isset($DSA) && count($DSA) > 0)
	 {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
	 }
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($DSA) && count($DSA) > 0)
	 {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
	 }
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',13);
	    */
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',13);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
	
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
	 
	// print_r($response);
	 	 //  echo $this->db->last_query(); echo "HI ";
	   
	   //exit;
     return $response;
    // print_r($this->db->last_query());
     //exit;
   }
   else if($filter=='Complete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
	   
	   if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
       $this->db->where_in('CM_ID',$clusterbmarr);
       $this->db->where('ROLE',13);
	 }
	 
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');
	 }
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   } 
   else if($filter=='Incomplete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
	   
	   if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
       $this->db->where_in('CM_ID',$clusterbmarr);
       $this->db->where('ROLE',13);
	 }
	 
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);
	 }

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',13);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',13);
     $this->db->where("Profile_Status",NULL);

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }

   else
   {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
		 
		 if(isset($clusterbmarr) && count($clusterbmarr) > 0)
	 {
       $this->db->where_in('BM_ID',$clusterbmarr);
       $this->db->where('ROLE',13);
	 }
	 
		 if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',13);
	 }
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
		 if(isset($Branch_manger) && count($Branch_manger) > 0)
	 {
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',13);
	 }
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('RM_ID',$id);
         $this->db->where('ROLE',13);
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('CM_ID',$id);
       $this->db->where('ROLE',13);
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();

	  // echo $this->db->query;
       return $response;
   }

}


/*---------------------------------- Addded by papiha on 19_05_2022---------------------------------------------------------*/
        function get_Sales_BM($Branch_manger)
        {
          $array=array();
          $this->db->select('UNIQUE_CODE');
              $this->db->from('USER_DETAILS');
			  if(isset($Branch_manger) && count($Branch_manger) > 0)
			  {
              $this->db->where_in('BM_ID',$Branch_manger);
			  }
          $this->db->where('ROLE',21);
          $query = $this->db->get();
          $response=$query->result();
          foreach ($response as $value) 
              $array[] = $value->UNIQUE_CODE;
        
          return $array;
        }
		
		
	
	public function get_all_connector_rm($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$filter_by)
		{
			
			//echo $filter_by;
			if($filter_by=='all')
 {
			$this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  
	  
	  if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	  
	  $query = $this->db->get();
      $response=$query->row();
	  
	  //print_r($response);
	  
	  //echo $this->db->last_query();
	  
	  return $response->count;
	  
	  
 }
 
 			if($filter_by=='complete')
 {
			$this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  
	  
	  if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	     $this->db->where("Profile_Status",'Complete');

	  
	  $query = $this->db->get();
      $response=$query->row();
	  
	  //print_r($response);
	  
	  //echo $this->db->last_query();
	  
	  return $response->count;
	  
	  
 }
 
 if($filter_by=='Incomplete')
 {
			$this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  
	  
	  if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	     $this->db->where("Profile_Status",'Incomplete');

	  
	  $query = $this->db->get();
      $response=$query->row();
	  
	  //print_r($response);
	  
	  //echo $this->db->last_query();
	  
	  return $response->count;
	  
	  
 }
 else{
	 
	 $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  
	  
	  if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	 //    $this->db->where("Profile_Status",'Incomplete');

	  
	  $query = $this->db->get();
      $response=$query->row();
	  
	  //print_r($response);
	  
	  //echo $this->db->last_query();
	  
	  return $response->count;
	 
 }
 
			
		}
	
	/*	public function get_all_connector_rm($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$filter)
		{
		echo $filter;	if($filter=='all')
 {
  
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	   if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	  
	  $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count
	  
 }
			
			
		}
		*/
		
		
		public function get_all_connector_regional($Branch_manger,$Relationship,$DSA,$id,$filter)
{
 if($filter=='all')
 {
  
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  if(isset($Branch_Manager) && count($Branch_Manager) > 0)
	  {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
	  }
	  if(isset($Relationship) && count($Relationship) > 0)
	  {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
	  }
	  if(isset($DSA) && count($DSA) > 0)
	  {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
	  }
      $this->db->or_where_in('RM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }
  else if($filter=='Complete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   if(isset($Branch_Manager) && count($Branch_Manager) > 0)
	  {
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
	  }
	  
	  if(isset($Relationship) && count($Relationship) > 0)
	  {
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
	  }
   $this->db->where("Profile_Status",'Complete');
   if(isset($DSA) && count($DSA) > 0)
	  {
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
	  }
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('RM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
  else if($filter=='Incomplete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   if(isset($Branch_Manager) && count($Branch_Manager) > 0)
	  {
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
	  }
   $this->db->where("Profile_Status",NULL);
   if(isset($Relationship) && count($Relationship) > 0)
	  {
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
	  }
   $this->db->where("Profile_Status",NULL);
   if(isset($DSA) && count($DSA) > 0)
	  {
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
	  }
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('RM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
 
  else
  {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  if(isset($Branch_Manager) && count($Branch_Manager) > 0)
	  {
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
	  }
	  if(isset($Relationship) && count($Relationship) > 0)
	  {
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
	  }
	  if(isset($DSA) && count($DSA) > 0)
	  {
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
	  }
      $this->db->or_where_in('RM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }


    
}
		
		
		function get_Regional_BM_connector($id)
		{
			
  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
      $this->db->where('RM_ID',$id);
  $this->db->where('ROLE',13);
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;

  return $array;
		}
		
		public function get_RO_BM_connector($Branch_manger)
{
  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
	  if(isset($Branch_manger) && count($Branch_manger) > 0)
	  {
      $this->db->where_in('BM_ID',$Branch_manger);
	  }
  $this->db->where('ROLE',14);
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;
    
  return $array;
}


public function get_DSA_BM_connector($Branch_manger,$Relationship,$id)
{
  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
	  if(isset($Branch_manger) && count($Branch_manger) > 0){
      $this->db->where_in('BM_ID',$Branch_manger);
	  $this->db->where('ROLE',2); 
	  }
	  if(isset($Relationship) && count($Relationship) > 0){
		  
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',2);
	  }
	  
  $this->db->or_where_in('CM_ID',$id);
  $this->db->where('ROLE',2);
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;
    
  return $array;
}


/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_regional_cluster($Branch_manger,$Relationship,$DSA,$id,$filter)
{
 if($filter=='all')
 {
  
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  	  if(isset($Branch_manger) && count($Branch_manger) > 0){

      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
		  }
		  	  if(isset($Relationship) && count($Relationship) > 0){

      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
			  }
			  	  if(isset($DSA) && count($DSA) > 0){

      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
				  }
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }
  else if($filter=='Complete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
  else if($filter=='Incomplete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
 
  else
  {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }


    
}


function get_cluster_BM($id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
        $this->db->where('CM_ID',$id);
		$this->db->where('ROLE',13);
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	
		return $array;
	}
	
	
		public function get_RO_BM($Branch_manger)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
			  	  if(isset($Branch_manger) && count($Branch_manger) > 0){

        $this->db->where_in('BM_ID',$Branch_manger);
				  }
		
		$this->db->where('ROLE',14);
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	    
		return $array;
	}
	public function get_DSA_BM($Branch_manger,$Relationship,$id)
	{
    $array=array();
		$this->db->select('UNIQUE_CODE');
        $this->db->from('USER_DETAILS');
			  	  if(isset($Branch_manger) && count($Branch_manger) > 0){

        $this->db->where_in('BM_ID',$Branch_manger);
		$this->db->where('ROLE',2);
				  }
				  	  	  if(isset($Relationship) && count($Relationship) > 0){

		$this->db->or_where_in('RO_ID',$Relationship);
		$this->db->where('ROLE',2);
						  }
				  
		$this->db->or_where_in('CM_ID',$id);
		$this->db->where('ROLE',2);
				  
		$query = $this->db->get();
		$response=$query->result();
		foreach ($response as $value) 
        $array[] = $value->UNIQUE_CODE;
	    
		return $array;
	}
	public function get_all_customers_cluster($Branch_manger,$Relationship,$DSA,$sales_id,$id,$filter)
	{
    if($filter=='all')
    {
		    $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
					  	  if(isset($Branch_manger) && count($Branch_manger) > 0){

        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
						  }
						  			  	  if(isset($Relationship) && count($Relationship) > 0){

        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
										  }
						  	  if(isset($DSA) && count($DSA) > 0){
							  
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
							  }
					  	  //if(isset($id) && $id != ''){
					  
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
						  // }
					  	  if(isset($sales_id) && count($sales_id) > 0){
				  
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
						  }
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
    else if($filter=='Application_Completed')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Aadhar E-sign complete');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
    else if($filter=='Application_InCompleted')
    {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS!=','Aadhar E-sign complete');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
    else if($filter=='Cam_Completed')
    {
          $this->db->select('count(*)as count');
          $this->db->from('USER_DETAILS');
          $this->db->where_in('BM_ID',$Branch_manger);
        
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
        
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Cam details complete');
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $query = $this->db->get();
          $response=$query->row();
          //echo $response->count;
          //exit;
          return $response->count;
    }
    else if($filter=='PD_Completed')
    {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','PD Completed');
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
   else if($filter=='income_details_complete')
    {
          $this->db->select('count(*)as count');
          $this->db->from('USER_DETAILS');
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',1);
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',1);
        
          $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','income details complete');
      
          $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $query = $this->db->get();
          $response=$query->row();
          //echo $response->count;
          //exit;
          return $response->count;
    }
    else if($filter=='Created')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
    
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('CUSTOMER_MORE_DETAILS.STATUS','Created');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
    else if($filter=='reject')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
    
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
      $this->db->or_where_in('SELES_ID',$sales_id);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','REJECT');
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
    /*-----------------------------added by sonal on 21-05-2022------------------------------------------*/
    else if($filter=='Hold')
    {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',1);
    
        $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',1);
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',1);
    
      $this->db->where('USER_DETAILS.credit_sanction_status','HOLD');
  
      $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
    }
      else if($filter=='Continue')
      {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
       
          $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
      
        $this->db->where('USER_DETAILS.credit_sanction_status','CONTINUE');
    
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
    else
    {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',1);
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',1);
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',1);
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',1);
        $this->db->or_where_in('SELES_ID',$sales_id);
        $this->db->where('ROLE',1);
        $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count;
    }
	
	
	


	
}


function get_regional_BM_Branch_Manager($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('RM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}

public function getClusterManagersRO($id)
{
	$array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('RM_ID',$id);
 $this->db->where('ROLE',15);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
	
}

function get_cluster_BM_RO($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('RM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}

public function get_RO_BM_RO($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 
 $this->db->where('ROLE',14);
}
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}


public function get_DSA_BM_RO($Branch_manger,$Relationship,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',2);
}
 if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',2);
}
 if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',2);
}
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}

public function get_cluster_RO($Branch_manger,$Relationship,$DSA,$id)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
       if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',4);
}
  if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',4);
}
  if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',4);
}
  if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',4);
 }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}
/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_RO_cluster($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter,$RelationshipOfficers)
{
	
	//print_r($RelationshipOfficers);
if($filter=='all')
{
 
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
       if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',14);
}
  if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',14);
}
  if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',14);
}

if(!empty($RelationshipOfficers))
     {
 $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
 $this->db->where('ROLE',14);
}

  if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',14);
 }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }
 else if($filter=='Complete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');

if(!empty($RelationshipOfficers))
     {
 $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
 $this->db->where('ROLE',14);
}
    if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
}
  if(!empty($Relationship))
     {
 $this->db->or_where_in('RO_ID',$Relationship);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
}
  if(!empty($DSA))
     {
 $this->db->or_where_in('DSA_ID',$DSA);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
}
  if(!empty($id))
     {
 $this->db->or_where_in('CM_ID',$id);
 $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",'Complete');
 }
 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }
 else if($filter=='Incomplete')
 {
  $this->db->select('count(*)as count');
  $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
  $this->db->where_in('BM_ID',$Branch_manger);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}

if(!empty($RelationshipOfficers))
     {
 $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
 $this->db->where('ROLE',14);
}

   if(!empty($Relationship))
     {
  $this->db->or_where_in('RO_ID',$Relationship);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}
   if(!empty($DSA))
     {
  $this->db->or_where_in('DSA_ID',$DSA);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}
   if(!empty($id))
     {
  $this->db->or_where_in('CM_ID',$id);
  $this->db->where('ROLE',14);
  $this->db->where("Profile_Status",NULL);
}



 // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
  $query = $this->db->get();
  $response=$query->row();
  //echo $response->count;
  //exit;
  return $response->count;
 }

 else
 {
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
 if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
   }
   
   if(!empty($RelationshipOfficers))
     {
 $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
 $this->db->where('ROLE',14);
}

    if(!empty($Relationship))
     {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
   }
    if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
   }
    if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count;
 }


   
}

function get_all_RO_cluster_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$RelationshipOfficers)
  {
	  //print_r($RelationshipOfficers);
	  
      if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }
           if(!empty($Branch_manger))
     {
           $this->db->where_in('BM_ID',$Branch_manger);
           $this->db->where('ROLE',14);
           }
           if(!empty($Relationship))
     {
           $this->db->or_where_in('RO_ID',$Relationship);
           $this->db->where('ROLE',14);
         }
         if(!empty($DSA))
     {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',14);
         }
		 
		          if(!empty($RelationshipOfficers))
     {
           $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
           $this->db->where('ROLE',14);
         }
		 
		 
         if(!empty($id))
     {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',14);
         }
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $response->count;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
   {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
        $this->db->where($where);
        }
            if(!empty($Branch_manger))
     {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
          if(!empty($Relationship))
     {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
	  
	  		          if(!empty($RelationshipOfficers))
     {
           $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
           $this->db->where('ROLE',14);
         }
          if(!empty($DSA))
     {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
          if(!empty($id))
     {
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',14);
        $this->db->where("Profile_Status",'Complete');
      }
       // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count; 

} 
else if($filter=='Incomplete')
{
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
            if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
          if(!empty($Relationship))
     {
     $this->db->or_where_in('RO_ID',$Relationship);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
   
   		          if(!empty($RelationshipOfficers))
     {
           $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
           $this->db->where('ROLE',14);
         }
          if(!empty($DSA))
     {
     $this->db->or_where_in('DSA_ID',$DSA);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
          if(!empty($id))
     {
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);
   }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 

} 
  
 
 else
 {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=14 OR LN like '%".$searchValue."%' AND ROLE=14";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
                 if(!empty($Branch_manger))
     {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',14);
       }
	   
	   		          if(!empty($RelationshipOfficers))
     {
           $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
           $this->db->where('ROLE',14);
         }
               if(!empty($Relationship))
     {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',14);
       }
               if(!empty($DSA))
     {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',14);
       }
               if(!empty($id))
     {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',14);
       }
       //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 }
  } 
  
  
   function get_all_RO_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$RelationshipOfficers)
  {
    //print_r($RelationshipOfficers);
	//echo $filter;
   if($filter=='all')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
            if(!empty($Branch_manger))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
      if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
}


		if(!empty($RelationshipOfficers))
     {
       $this->db->or_where_in('UNIQUE_CODE',$RelationshipOfficers);
      // $this->db->where('ROLE',14);
      if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
}
/*
        if(!empty($Branch_manger))
     {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }

             if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }

             if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }


             if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }

              if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }

          if(!empty($id))
     {
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
        if(!empty($id))
     {
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',14);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
 */
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
	 
	// print_r($response);
     return $response;
    // print_r($this->db->last_query());
    // exit;
   }
   else if($filter=='Complete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
           if(!empty($Branch_mangerid))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
             if(!empty($Branch_mangerid))
     {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }
             if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }
           if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }
       if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }
  if(!empty($id))
     {
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
     if(!empty($id))
     {
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   } 
   else if($filter=='Incomplete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
        if(!empty($Branch_manger))
     {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
      if(!empty($Branch_manger))
     {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
     }
      if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
     }
       if(!empty($Relationship))
     {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
     }
       if(!empty($DSA))
     {
 
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
       if(!empty($DSA))
     {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 }
   if(!empty($id))
     {
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',14);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
    }
      if(!empty($id))
     {
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',14);
     $this->db->where("Profile_Status",NULL);

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
 }
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }

   else
   {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
           if(!empty($Branch_manger))
     {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
           if(!empty($Branch_manger))
     {
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
       }
           if(!empty($Relationship))
     {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
             if(!empty($Relationship))
     {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
}
      if(!empty($DSA))
     {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
       }
             if(!empty($DSA))
     {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
}
      if(!empty($id))
     {
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',14);
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
     }
           if(!empty($id))
     {
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',14);
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
     }
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
   }

}


function get_cluster_BM_Dsa2($id)
{

 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     $this->db->where('CM_ID',$id);
 $this->db->where('ROLE',13);
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;

 return $array;
}


public function get_RO_BM_Dsa($Branch_manger)
{
 $array=array();
 $this->db->select('UNIQUE_CODE');
     $this->db->from('USER_DETAILS');
     if(!empty($Branch_manger))
     {
     $this->db->where_in('BM_ID',$Branch_manger);
     $this->db->where('ROLE',14);
   }
 $query = $this->db->get();
 $response=$query->result();
 foreach ($response as $value) 
     $array[] = $value->UNIQUE_CODE;
   
 return $array;
}

function get_all_Dsa_cluster_filter($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$start,$end,$filter,$order,$Cluster_DSA,$BranchDSA)
  {
	  //print_r($order);
     
	 if($filter=='all')
      {
           $this->db->select('count(*)as count');
           $this->db->from('USER_DETAILS');
           if($searchValue!= '')
           {
           $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2";
           // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
           $this->db->where($where);
           }

            if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
          if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
         }
         if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           
         }
          if(!empty($id))
          {
           $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',2);
         }
           //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
           $query = $this->db->get();
           $response=$query->row();
           //echo $this->db->last_query;
           //exit;
           return $response->count; 

   } 
   else if($filter=='Complete')
   {
        $this->db->select('count(*)as count');
        $this->db->from('USER_DETAILS');
        if($searchValue!= '')
        {
        $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
        // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
        $this->db->where($where);
        }
           if(!empty($Branch_manger))
          {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
          if(!empty($DSA))
          { 
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
		  
		  if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
		 
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",'Complete');
         }
          if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",'Complete');
          }
       // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $query = $this->db->get();
        $response=$query->row();
        //echo $response->count;
        //exit;
        return $response->count; 

} 
else if($filter=='Incomplete')
{
     $this->db->select('count(*)as count');
     $this->db->from('USER_DETAILS');
     if($searchValue!= '')
     {
     $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2 ";
     // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
     $this->db->where($where);
     }
      if(!empty($Branch_manger))
          {
             $this->db->where_in('BM_ID',$Branch_manger);
             $this->db->where('ROLE',2);
             $this->db->where("Profile_Status",NULL);
         }
        if(!empty($Relationship))
          {
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',2);
            $this->db->where("Profile_Status",NULL);
          }
        if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL);
          }
          if(!empty($sales_id))
          {
           $this->db->or_where_in('SELES_ID',$sales_id);
           $this->db->where('ROLE',2);
           $this->db->where("Profile_Status",NULL);
           
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
        if(!empty($id))
          {
            $this->db->or_where_in('CM_ID',$id);
           $this->db->where('ROLE',2);
          $this->db->where("Profile_Status",NULL);
        }
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $query = $this->db->get();
     $response=$query->row();
     //echo $response->count;
     //exit;
     return $response->count; 

} 
  
 
 else
 {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=2 OR LN like '%".$searchValue."%' AND ROLE=2";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
         if(!empty($Branch_manger))
          {
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',2);
          }
        if(!empty($Relationship))
          {
             $this->db->or_where_in('RO_ID',$Relationship);
             $this->db->where('ROLE',2);
          }
          if(!empty($DSA))
          {
           $this->db->or_where_in('DSA_ID',$DSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
         if(!empty($sales_id))
         {
          $this->db->or_where_in('SELES_ID',$sales_id);
          $this->db->where('ROLE',2);
        
          
        }
         if(!empty($id))
          {
             $this->db->or_where_in('CM_ID',$id);
             $this->db->where('ROLE',2);
          }
       //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 }
  } 
  
  
  function get_all_Dsa_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$sales_id,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter,$Cluster_DSA,$BranchDSA)
  {
    
   if($filter=='all')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
	   }
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
	   if(isset($Relationship) && count($Relationship) > 0)
	   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
	   }
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
	   
	   if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
	   if(isset($Relationship) && count($Relationship) > 0)
	   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
	   }
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
		if(isset($DSA) && count($DSA) > 0)
	   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
	   }
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($DSA) && count($DSA) > 0)
	   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
	   }
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',2);
     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
	   	   if(isset($sales_id) && count($sales_id) > 0)
	   {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',2);
	   }
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
	    if(isset($sales_id) && count($sales_id) > 0)
	   {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',2);
	   }
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
	 //print_r($response);
     return $response;
    // print_r($this->db->last_query());
     //exit;
   }
   else if($filter=='Complete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
	   	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   }
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
	   }
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
	   
	   if(isset($Relationship) && count($Relationship) > 0)
	   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   }

       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
	    if(isset($Relationship) && count($Relationship) > 0)
	   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   }
	   
	   if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
		 if(isset($DSA) && count($DSA) > 0)
	   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   }

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   
	    if(isset($DSA) && count($DSA) > 0)
	   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   }
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('RM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",'Complete');

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
	    if(isset($sales_id) && count($sales_id) > 0)
	   {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   }
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
	   if(isset($sales_id) && count($sales_id) > 0)
	   {
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",'Complete');
	   
	   }
 
    // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   } 
   else if($filter=='Incomplete')
   {
       $this->db->select('*');
       $this->db->from('USER_DETAILS');
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
       $this->db->where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);
	   }
       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
       $this->db->or_where_in('BM_ID',$Branch_manger);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);
	   }

       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
	   if(isset($Relationship) && count($Relationship) > 0)
	   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);
	   }
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
	   
	   if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
	   
	   if(isset($Relationship) && count($Relationship) > 0)
	   {
       $this->db->or_where_in('RO_ID',$Relationship);
       $this->db->where('ROLE',2);
	   }
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
		if(isset($DSA) && count($DSA) > 0)
	   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);
	   }

       if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
	   if(isset($DSA) && count($DSA) > 0)
	   {
       $this->db->or_where_in('DSA_ID',$DSA);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);
	   }
       if($searchValue!= '')
       {
         $this->db->like('LN',$searchValue);
       }
 
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',2);
       $this->db->where("Profile_Status",NULL);

       if($searchValue!= '')
      {
      $this->db->like('FN',$searchValue);
      }
     $this->db->or_where_in('CM_ID',$id);
     $this->db->where('ROLE',2);
     $this->db->where("Profile_Status",NULL);

     if($searchValue!= '')
     {
        $this->db->like('FN',$searchValue);
     }
     if($searchValue!= '')
     {
        $this->db->like('LN',$searchValue);
     }
	 if(isset($sales_id) && count($sales_id) > 0)
	   {
     $this->db->or_where_in('SELES_ID',$sales_id);
     $this->db->where('ROLE',2);
	   }
     $this->db->where("Profile_Status",NULL);
     if($searchValue!= '')
     {
      $this->db->like('FN',$searchValue);
     }
	 if(isset($sales_id) && count($sales_id) > 0)
	   {
     $this->db->or_where_in('SELES_ID',$sales_id);
     $this->db->where('ROLE',2);
	   }
     $this->db->where("Profile_Status",NULL);

 
     //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
     $this->db->limit($rowperpage,$row);
     $this->db->order_by("USER_DETAILS.ID","desc");
     $query = $this->db->get();
     $response = $query->result();
     return $response;
   }

   else
   {
         $this->db->select('*');
         $this->db->from('USER_DETAILS');
		 if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',2);
	   }
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
		 if(isset($Branch_manger) && count($Branch_manger) > 0)
	   {
         $this->db->or_where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',2);
	   }
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
		 
		 if(!empty($Cluster_DSA))
          {
           $this->db->where_in('UNIQUE_CODE',$Cluster_DSA);
           $this->db->where('ROLE',2);
           }
            if(!empty($BranchDSA))
          {
           $this->db->or_where_in('UNIQUE_CODE',$BranchDSA);
           $this->db->where('ROLE',2);
         }
		 
		 if(isset($Relationship) && count($Relationship) > 0)
	   {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',2);
	   }
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
		 
		 if(isset($Relationship) && count($Relationship) > 0)
	   {
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',2);
	   }
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }
if(isset($DSA) && count($DSA) > 0)
	   {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',2);
	   }
         if($searchValue!= '')
         {
         $this->db->like('FN',$searchValue);
         }
		 if(isset($DSA) && count($DSA) > 0)
	   {
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',2);
	   }
         if($searchValue!= '')
         {
           $this->db->like('LN',$searchValue);
         }

         $this->db->or_where_in('RM_ID',$id);
         $this->db->where('ROLE',2);
         if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('RM_ID',$id);
       $this->db->where('ROLE',2);
       if($searchValue!= '')
       {
         $this->db->like('FN',$searchValue);
       }
       if($searchValue!= '')
       {
          $this->db->like('LN',$searchValue);
       }
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',2);
     
       if($searchValue!= '')
       {
        $this->db->like('FN',$searchValue);
       }
       $this->db->or_where_in('SELES_ID',$sales_id);
       $this->db->where('ROLE',2);
      
  
       //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
       $this->db->limit($rowperpage,$row);
       $this->db->order_by("USER_DETAILS.ID","desc");
       $query = $this->db->get();
       $response = $query->result();
       return $response;
   }

}

public function get_all_connector_regional21($Branch_manger,$Relationship,$DSA,$id,$filter)
{
 if($filter=='all')
 {
  
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }
  else if($filter=='Complete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
  else if($filter=='Incomplete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
 
  else
  {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }


    
}

function get_all_connector_regional_filter($Branch_manger,$Relationship,$DSA,$id,$searchValue,$filter)
   {
       if($filter=='all')
       {
            $this->db->select('count(*)as count');
            $this->db->from('USER_DETAILS');
            if($searchValue!= '')
            {
            $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4";
            // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
            $this->db->where($where);
            }
            $this->db->where_in('BM_ID',$Branch_manger);
            $this->db->where('ROLE',4);
            
            $this->db->or_where_in('RO_ID',$Relationship);
            $this->db->where('ROLE',4);
            $this->db->or_where_in('DSA_ID',$DSA);
            $this->db->where('ROLE',4);
            $this->db->or_where_in('CM_ID',$id);
            $this->db->where('ROLE',4);
            //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
            $query = $this->db->get();
            $response=$query->row();
            //echo $response->count;
            //exit;
            return $response->count; 

    } 
    else if($filter=='Complete')
    {
         $this->db->select('count(*)as count');
         $this->db->from('USER_DETAILS');
         if($searchValue!= '')
         {
         $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
         // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
         $this->db->where($where);
         }
         $this->db->where_in('BM_ID',$Branch_manger);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
         $this->db->or_where_in('RO_ID',$Relationship);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
         $this->db->or_where_in('DSA_ID',$DSA);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
         $this->db->or_where_in('CM_ID',$id);
         $this->db->where('ROLE',4);
         $this->db->where("Profile_Status",'Complete');
        // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
         $query = $this->db->get();
         $response=$query->row();
         //echo $response->count;
         //exit;
         return $response->count; 

 } 
 else if($filter=='Incomplete')
 {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      if($searchValue!= '')
      {
      $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4 ";
      // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
      $this->db->where($where);
      }
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count; 

} 
   
  
  else
  {
          $this->db->select('count(*)as count');
          $this->db->from('USER_DETAILS');
          if($searchValue!= '')
          {
          $where = "FN like '%".$searchValue."%'AND ROLE=4 OR LN like '%".$searchValue."%' AND ROLE=4";
          // $where = "FN like '%".$searchValue."%' OR LN like '%".$searchValue."%  AND ROLE=1' ";
          $this->db->where($where);
          }
		  if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
		  }
		  if(isset($Relationship) && count($Relationship) > 0)
		  {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
		  }
		  if(isset($DSA) && count($DSA) > 0)
		  {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
		  }
          $this->db->or_where_in('RM_ID',$id);
          $this->db->where('ROLE',4);
        //  $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
          $query = $this->db->get();
          $response=$query->row();
          //echo $response->count;
          //exit;
          return $response->count; 

  }
   } 
   
   function get_all_connector_regional_filternew($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by)
   {
	   
	  // echo $rowperpage;
	   if($filter_by=='all')
 {
			$this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
	  
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  
	  
	  if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	  
	  $query = $this->db->get();
      $response=$query->row();
	  
	  //print_r($response);
	  
	  //echo $this->db->last_query();
	  
	  return $response->count;
	  
	  
 }
 
	   
   }
   
   

function get_all_connector_regional_filternew_page($cluster_managers,$branch_managers,$relationship_manager,$dsa_manager,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter_by)
{
	//echo $row;
	
	//echo $rowpage;
	//if($filter_by=='all')
 //{
			$this->db->select('*');
      $this->db->from('USER_DETAILS');
	  
	  if(isset($cluster_managers) && count($cluster_managers) > 0)
	  {
      $this->db->where_in('CM_ID',$cluster_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  
	  
	  if(isset($branch_managers) && count($branch_managers) > 0)
	  {
      $this->db->or_where_in('BM_ID',$branch_managers);
      $this->db->where('ROLE',4);
	  }
	  
	  if(isset($relationship_manager) && count($relationship_manager) > 0)
	  {
      $this->db->or_where_in('RO_ID',$relationship_manager);
      $this->db->where('ROLE',4);
	  }
	  
	  $this->db->limit(10);
	  $query = $this->db->get();
      $response=$query->result();
	  
	  //print_r($response);
	  
	  //echo $this->db->last_query();
	  
	  return $response;
	  
	  
 //}
	
}
   
   
   
   
  function get_all_connector_cluster_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
   {
     
    if($filter=='all')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
		if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
		  }
        
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
		if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
		  }
        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
		if(isset($Relationship) && count($Relationship) > 0)
		  {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
		  }
        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
		if(isset($Relationship) && count($Relationship) > 0)
		  {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
		  }
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  if(isset($DSA) && count($DSA) > 0)
		  {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
		  }
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
		if(isset($DSA) && count($DSA) > 0)
		  {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
		  }
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('RM_ID',$id);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      $this->db->or_where_in('RM_ID',$id);
      $this->db->where('ROLE',4);
      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
  
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     // print_r($this->db->last_query());
      //exit;
    }
    else if($filter=='Complete')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
		if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
		if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
		if(isset($Relationship) && count($Relationship) > 0)
		  {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
		if(isset($Relationship) && count($Relationship) > 0)
		  {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  if(isset($DSA) && count($DSA) > 0)
		  {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
		if(isset($DSA) && count($DSA) > 0)
		  {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('RM_ID',$id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      $this->db->or_where_in('RM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",'Complete');

      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
  
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    } 
    else if($filter=='Incomplete')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
		if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
		if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
		
		  }
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
		if(isset($Relationship) && count($Relationship) > 0)
		  {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
		if(isset($Relationship) && count($Relationship) > 0)
		  {
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  if(isset($DSA) && count($DSA) > 0)
		  {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
		if(isset($DSA) && count($DSA) > 0)
		  {
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
		  }
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('RM_ID',$id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      $this->db->or_where_in('RM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);

      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
  
      //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    }

    else
    {
          $this->db->select('*');
		  if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
          $this->db->from('USER_DETAILS');
          $this->db->where_in('BM_ID',$Branch_manger);
		  }
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
		  if(isset($Branch_manger) && count($Branch_manger) > 0)
		  {
          $this->db->or_where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
		  }
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
		  if(isset($Relationship) && count($Relationship) > 0)
		  {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
		  }
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
		  if(isset($Relationship) && count($Relationship) > 0)
		  {
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
		  
		  }
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

if(isset($DSA) && count($DSA) > 0)
		  {
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
		  }
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('FN',$searchValue);
        }
        //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    }

}


public function getBMRelationshipOfficers($BranchManagers)
{
	$array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$BranchManagers);
  $this->db->where('ROLE',14);
  $query = $this->db->get();
  $response=$query->result();
  
 // print_r($response);
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;

//print_r($array);
  return $array;
	
}



function get_regional_BM_connector2($id)
{

  $array=array();
  $this->db->select('UNIQUE_CODE');
      $this->db->from('USER_DETAILS');
      $this->db->where('RM_ID',$id);
  $this->db->where('ROLE',13);
  $query = $this->db->get();
  $response=$query->result();
  foreach ($response as $value) 
      $array[] = $value->UNIQUE_CODE;

  return $array;
}

/*-----------------------filter added by sonal on 13-05-2022------------------------------*/
public function get_all_connector_regional2($Branch_manger,$Relationship,$DSA,$id,$filter)
{
 if($filter=='all')
 {
  
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }
  else if($filter=='Complete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",'Complete');
  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
  else if($filter=='Incomplete')
  {
   $this->db->select('count(*)as count');
   $this->db->from('USER_DETAILS');
   $this->db->where_in('BM_ID',$Branch_manger);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('RO_ID',$Relationship);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('DSA_ID',$DSA);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);
   $this->db->or_where_in('CM_ID',$id);
   $this->db->where('ROLE',4);
   $this->db->where("Profile_Status",NULL);

  // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
   $query = $this->db->get();
   $response=$query->row();
   //echo $response->count;
   //exit;
   return $response->count;
  }
 
  else
  {
      $this->db->select('count(*)as count');
      $this->db->from('USER_DETAILS');
      $this->db->where_in('BM_ID',$Branch_manger);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('RO_ID',$Relationship);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('DSA_ID',$DSA);
      $this->db->where('ROLE',4);
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $query = $this->db->get();
      $response=$query->row();
      //echo $response->count;
      //exit;
      return $response->count;
  }


    
}


function get_all_connector_regional_filter_with_page($Branch_manger,$Relationship,$DSA,$id,$searchValue,$columnName,$columnSortOrder,$row,$rowperpage,$filter)
   {
     
    if($filter=='all')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
  
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
     // print_r($this->db->last_query());
      //exit;
    }
    else if($filter=='Complete')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",'Complete');

        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",'Complete');

      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
  
     // $this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    } 
    else if($filter=='Incomplete')
    {
        $this->db->select('*');
        $this->db->from('USER_DETAILS');
        $this->db->where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('BM_ID',$Branch_manger);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
           $this->db->like('LN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
         $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('RO_ID',$Relationship);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('DSA_ID',$DSA);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
        {
          $this->db->like('LN',$searchValue);
        }
  
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        $this->db->where("Profile_Status",NULL);

        if($searchValue!= '')
       {
       $this->db->like('FN',$searchValue);
       }
      $this->db->or_where_in('CM_ID',$id);
      $this->db->where('ROLE',4);
      $this->db->where("Profile_Status",NULL);

      if($searchValue!= '')
      {
         $this->db->like('FN',$searchValue);
      }
  
      //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
      $this->db->limit($rowperpage,$row);
      $this->db->order_by("USER_DETAILS.ID","desc");
      $query = $this->db->get();
      $response = $query->result();
      return $response;
    }

    else
    {
          $this->db->select('*');
          $this->db->from('USER_DETAILS');
          $this->db->where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('BM_ID',$Branch_manger);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('RO_ID',$Relationship);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
          $this->db->like('FN',$searchValue);
          }
          $this->db->or_where_in('DSA_ID',$DSA);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
          {
            $this->db->like('LN',$searchValue);
          }

          $this->db->or_where_in('CM_ID',$id);
          $this->db->where('ROLE',4);
          if($searchValue!= '')
        {
        $this->db->like('FN',$searchValue);
        }
        $this->db->or_where_in('CM_ID',$id);
        $this->db->where('ROLE',4);
        if($searchValue!= '')
        {
          $this->db->like('FN',$searchValue);
        }
        //$this->db->join('CUSTOMER_MORE_DETAILS', 'CUSTOMER_MORE_DETAILS.CUST_ID= USER_DETAILS.UNIQUE_CODE');
        $this->db->limit($rowperpage,$row);
        $this->db->order_by("USER_DETAILS.ID","desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    }

}




}
?>