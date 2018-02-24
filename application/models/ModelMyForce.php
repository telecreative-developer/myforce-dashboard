<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelMyForce extends CI_Model{

  public function CheckLogin($data){		
    $query =$this->db->get_where('admin',$data);
    return $query;	
  }

  public function insertEvents($events){
		$this->db->insert('events',$events);
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

  public function loadSales(){
		$this->db->order_by('id','desc');
		$db = $this->db->get('users');
		return $db;
  }

  public function LoadSalesById($id){
    $this->db->where('users.id',$id);
    $this->db->join('regionals','regionals.id_region = users.id_region');
    $this->db->join('branches','branches.id_branch = branches.id_branch');
    $db =$this->db->get('users');
    return $db;
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

  public function loadBranches(){
		$this->db->order_by('id_branch','desc');
		$db = $this->db->get('branches');
		return $db;
  }
  
  public function insertBranches($regions){
		$this->db->insert('branches',$regions);
  }

  public function LoadBranchesById($id){
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




}