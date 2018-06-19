<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelMyForce extends CI_Model{

  public function CheckLogin($data){		
    $query =$this->db->get_where('admin',$data);
    return $query;	
  }

  public function loadDashboardManagers(){
    $this->db->join('branches', 'branches.id_manager = managers.id_manager');
		$this->db->order_by('managers.id_manager');
		$db = $this->db->get('managers');
		return $db;
  }

  public function LoadSalesDashboardById($id){
		$this->db->where('id_branch',$id);
    $db =$this->db->get('users');
    return $db;
  }

  public function count_managers($limit, $start) {
    $this->db->join('branches', 'branches.id_manager = managers.id_manager');
		$this->db->order_by('branches.branch','asc');
		$this->db->limit($limit, $start);
    $query = $this->db->get("managers");
    
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
          $data[] = $row;
        }
        return $data;
      }
      return false;
    }
     
  public function LoadTargetsById($id_target){
    $this->db->join('users', 'users.id = targets.id');
		$this->db->where('id_target',$id_target);
    $db =$this->db->get('targets');
    return $db;
  }

  public function updateTargetsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
  }
  
  public function insertEvents($events){
		$this->db->insert('events',$events);
  }

  public function insertTarget($targets)
  {
    $this->db->insert('targets', $targets);
  }
  
  public function loadTargets(){  
    $this->db->join('users', 'users.id = targets.id');
    $db = $this->db->get('targets');
    return $db;

  }

  public function loadEvents(){
		$this->db->order_by('id_event','desc');
		$db = $this->db->get('events');
		return $db;
  }
  
  public function LoadEventsById($id){
		$this->db->where('events.id_event',$id);
    $db =$this->db->get('events');
    return $db;
  }
    
  public function updateEventsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  public function deleteEvents($id){
    $this->db->where('id_event', $id);
    $this->db->delete('events');
  }


  public function loadProducts(){
		$this->db->order_by('id_product','desc');
		$db = $this->db->get('products');
		return $db;
  }

  public function insertProducts($products){
		$this->db->insert('products',$products);
  }

  public function LoadProductsById($id){
		$this->db->where('products.id_product',$id);
    $db =$this->db->get('products');
    return $db;
  }


  public function LoadProductsBySubProductId($id){
    $this->db->where('id_product !=',$id);
    $db =$this->db->get('products');
    return $db;
  }
  
  public function deleteProducts($id){
    error_reporting(0);
    $this->db->where('id_product',$id);
    $query = $this->db->get('products');
    $row = $query->row();
    $x = $row->loc_picture;

      $this->db->delete('products',array('id_product' => $id));
      $path ='/opt/lampp/htdocs/myforce/assets/images/products/'.$x;
      if($this->db->affected_rows() >= 1){
        if(unlink($path)){
          return TRUE;
          } else {
              return FALSE;
          }
      }else{

      }
  }

  public function updateProductsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
  }
  
  public function replaceProductById($id){
    error_reporting(0);
    $this->db->where('id_product',$id);
    $query = $this->db->get('products');
    $row = $query->row();
    $x = $row->loc_picture;

    $path ='/opt/lampp/htdocs/myforce/assets/images/products/'.$x;
    //chmod($path, 0666);
    if($this->db->affected_rows() >= 1){
    if(unlink($path))
        return TRUE;
    } else {
        return FALSE;
    }
  }
  
  public function loadSubProducts(){
    $this->db->select('*');
    $this->db->from('subproducts');
    $this->db->select('subproducts.picture as pic');
    $this->db->select('subproducts.description as desc');
    $this->db->join('products','products.id_product = subproducts.id_product');
		$this->db->order_by('id_subproduct','desc');
		$db = $this->db->get('');
		return $db;
  }

  public function insertSubProducts($subproducts){
		$this->db->insert('subproducts',$subproducts);
  }

  public function LoadSubProductsById($id){
    $this->db->select('*');
    $this->db->from('subproducts');
    $this->db->select('subproducts.description as desc');
    $this->db->where('subproducts.id_subproduct',$id);
    $this->db->join('products','products.id_product = subproducts.id_product');
    $db =$this->db->get('');
    return $db;
  
  }

  public function replaceSubProductsById($id){
    error_reporting(0);
    $this->db->where('id_subproduct',$id);
    $query = $this->db->get('subproducts');
    $row = $query->row();
    $x = $row->loc_picture;
    $y = $row->loc_file;
    

    $path ='/opt/lampp/htdocs/myforce/assets/images/subproduct/'.$x;
    $path ='/opt/lampp/htdocs/myforce/assets/images/subproduct/'.$y;

    if($this->db->affected_rows() >= 1){
    if(unlink($path))
        return TRUE;
    } else {
        return FALSE;
    }
  }

  public function replaceSubProductsFileById($id){
    error_reporting(0);
    $this->db->where('id_subproduct',$id);
    $query = $this->db->get('subproducts');
    $row = $query->row();
    $y = $row->loc_file;
    
    $path ='/opt/lampp/htdocs/myforce/assets/images/subproduct/'.$y;

    if($this->db->affected_rows() >= 1){
    if(unlink($path))
        return TRUE;
    } else {
        return FALSE;
    }
  }

  public function replaceSubProductsPicById($id){
    error_reporting(0);
    $this->db->where('id_subproduct',$id);
    $query = $this->db->get('subproducts');
    $row = $query->row();
    $x = $row->loc_picture;
    var_dump($x);
    $path ='/opt/lampp/htdocs/myforce/assets/images/subproduct/'.$x;

    if($this->db->affected_rows() >= 1){
    if(unlink($path))
        return TRUE;
    } else {
        return FALSE;
    }
  }

  public function updateSubProductsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  public function deleteSubProducts($id){
    error_reporting(0);
    $this->db->where('id_subproduct',$id);
    $query = $this->db->get('subproducts');
    $row = $query->row();
    $x = $row->loc_picture;
    $y = $row->loc_file;
      
    $this->db->delete('subproducts',array('id_subproduct' => $id));
    $path ='/opt/lampp/htdocs/myforce/assets/images/subproduct/'.$x;
    $path ='/opt/lampp/htdocs/myforce/assets/images/subproduct/'.$y;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function loadManagers(){
		$this->db->order_by('id_manager','desc');
    $db = $this->db->get('managers');
		return $db;
  }

  public function LoadManagersById($id){
		$this->db->where('managers.id_manager',$id);
    $db = $this->db->get('managers');
    return $db;
  }

  public function deleteManagers($id){
    $this->db->where('id_manager', $id);
    $this->db->delete('managers');
  }

  public function loadSales(){
		$db = $this->db->get('users');
		return $db;
  }

  public function getSales(){
    $this->db->join('targets', 'targets.id = users.id' , 'left');
    $this->db->order_by('users.id', 'desc');
		$db = $this->db->get('users');
		return $db;
  }

  public function LoadSalesById($id){
    $this->db->where('users.id',$id);
    $db =$this->db->get('users');
    return $db;
  }

  public function LoadBranchNotById($id_branch){
    $this->db->where('id_branch !=',$id_branch);
    $db =$this->db->get('branches');
    return $db;
  }

  public function LoadManagerNotById($id_manager){
    $this->db->where('id_manager !=',$id_manager);
    $db =$this->db->get('managers');
    return $db;
  }

  public function deleteSales($id){
    $this->db->where('id', $id);
    $this->db->delete('users');
  }

  public function loadRegions(){
		$this->db->order_by('id_region','desc');
		$db = $this->db->get('regionals');
		return $db;
  }
  public function insertRegions($regions){
		$this->db->insert('regionals',$regions);
  }

  public function LoadRegionsById($id){
		$this->db->where('regionals.id_region',$id);
    $db =$this->db->get('regionals');
    return $db;
  }

  public function updateRegionsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
    
  public function deleteRegions($id){
    $this->db->where('id_region', $id);
    $this->db->delete('regionals');
  }

  public function insertTeams($regions){
		$this->db->insert('team_updates',$regions);
  }

  public function LoadTeamsById($id){
    $this->db->join("branches","branches.id_branch = team_updates.id_branch");
    $this->db->join("pipelines","pipelines.id_pipeline = team_updates.id_pipeline");
    $this->db->join("customers","customers.id_customer = team_updates.id_customer");
    $this->db->join("users","users.id = team_updates.id");
		$this->db->where('team_updates.id_team_update',$id);
    $db =$this->db->get('team_updates');
    return $db;
  }

  public function LoadPipelinesNotById($id_pipeline){
    $this->db->where('id_pipeline !=',$id_pipeline);
    $db =$this->db->get('pipelines');
    return $db;
  }

  public function loadCustomersNotById($id_customer){
    $this->db->where('id_customer !=',$id_customer);
    $db =$this->db->get('customers');
    return $db;
  }

  public function loadSalesNotById($id_sales){
    $this->db->where('id !=',$id_sales);
    $db =$this->db->get('users');
    return $db;
  }

  public function updateTeamsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
  }

  public function updateSalesById($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  
  public function loadBranches(){
    $this->db->join('managers','managers.id_manager = branches.id_manager');
		$this->db->order_by('branches.branch','asc');
		$db = $this->db->get('branches');
		return $db;
  }

  public function loadBranch(){
    $db = $this->db->get('branches');
    return $db;
  }
  
  public function insertBranches($regions){
		$this->db->insert('branches',$regions);
  }

  public function LoadBranchesById($id){
    $this->db->join('managers','managers.id_manager = branches.id_manager');
		$this->db->where('branches.id_branch',$id);
    $db =$this->db->get('branches');
    return $db;
  }

  public function updateBranchesById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  public function deleteBranches($id){
    $this->db->where('id_branch', $id);
    $this->db->delete('branches');
  }

  public function loadTeams(){
    $this->db->join("customers","customers.id_customer = team_updates.id_customer");
    $this->db->join("branches","branches.id_branch = team_updates.id_branch");
    $this->db->join("users","users.id = team_updates.id");
    $this->db->join("pipelines","pipelines.id_pipeline = team_updates.id_pipeline");
		$this->db->order_by('team_updates.id_team_update','desc');
		$db = $this->db->get('team_updates');
		return $db;
  }

  public function LoadPipelines(){
    $this->db->order_by('id_pipeline','desc');
    $db =$this->db->get('pipelines');
    return $db;
  }

  public function LoadCustomers(){
    $this->db->order_by('id_customer','desc');
    $db =$this->db->get('customers');
    return $db;
  }
  
  public function deleteTeams($id){
    $this->db->where('id_team_update', $id);
    $this->db->delete('team_updates');
  }

  public function loadQuestions(){
		$this->db->order_by('id_question','desc');
		$db = $this->db->get('questions');
		return $db;
  }

  public function insertQuestions($events){
		$this->db->insert('questions',$events);
  }

  public function LoadQuestionsById($id){
		$this->db->where('id_question',$id);
    $db =$this->db->get('questions');
    return $db;
  }

  public function updateQuestionsById($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
  
  public function deleteQuetions($id){
    $this->db->where('id_question', $id);
    $this->db->delete('questions');
  }

  public function loadAnswers(){
    $this->db->join('pipelines','answers.id_pipeline = pipelines.id_pipeline');
    $this->db->join('users','answers.id = users.id');
    $this->db->join('questions','answers.id_question = questions.id_question');
		$this->db->order_by('answers.id_answer','desc');
		$db = $this->db->get('answers');
		return $db;
  }

  public function deleteAnswers($id){
    $this->db->where('id_answer', $id);
    $this->db->delete('answers');
  }

}