<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyForce extends CI_Controller {

  public function __construct()
	{
    parent::__construct();
    $this->load->helper('date');
		if($this->session->userdata('username') == ""){
			redirect('../');	
		}
	}

	public function dashboard()
	{
		$this->load->view('admin/dashboard');
  }
  
  public function events()
	{
    $data['events']  = $this->ModelMyForce->LoadEvents()->result();
		$this->load->view('admin/table-events',$data);
  }
  
  public function addevents()
	{
		$this->load->view('admin/addevents');
  }

  public function insertEvents(){
    $id_admin = $this->session->userdata('id_admin');
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time          = $this->input->post('time');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $events = array(
      'title'  			    => $title,
      'description'  		=> $description,
      'time'		        => $date." ".$time,
      'id_admin'		    => $id_admin,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelMyForce->insertEvents($events); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='events';
     </script>");
  }

  public function editEvents()
	{
    $id = $this->uri->segment(2);
    $data['events'] = $this->ModelMyForce->LoadEventsById($id)->result();
		$this->load->view('admin/editevents',$data);
  }

  public function updateEvents() {
    $id_admin = $this->session->userdata('id_admin');
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time          = $this->input->post('time');
    
		$data = array(
      'title'          => $title,
      'description'    => $description,
      'time'		       => $date." ".$time,
      'id_admin'       => $id_admin,
      'updatedAt'		   => $datenow." ".$timenow
		);
		
		$where = array(
			'id_event' => $id
    );
    
    $this->ModelMyForce->updateEventsById($where,$data,'events');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../events';
     </script>");
	}

  public function deleteEvents() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteEvents($id);
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../events';
     </script>");
  }


  public function products()
	{
    $data['products']  = $this->ModelMyForce->LoadProducts()->result();
		$this->load->view('admin/table-products',$data);
  }
  
  public function addproducts()
	{
		$this->load->view('admin/addproducts');
  }

  public function insertProducts(){
    $imageUrl = base_url();
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    
		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/myforce/assets/images/products/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $products = array(
      'product'  			  => $title,
      'picture'		      => $imageUrl."assets/images/products/".$fileName,
      'loc_picture'		  => $fileName,
      'description'  		=> $description,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

    $this->ModelMyForce->insertProducts($products); 
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='products';
     </script>");
  }

  public function editProducts()
	{
    $id = $this->uri->segment(2);
    $data['products'] = $this->ModelMyForce->LoadProductsById($id)->result();
		$this->load->view('admin/editproducts',$data);
  }

  public function updateProducts() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
    $imageUrl = base_url();
    
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/myforce/assets/images/products/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $picture = substr($fileName,10);
    
    if($picture == ""){
        $data = array(
          'product'        => $title,
          'description'    => $description,
          'updatedAt'		   => $datenow." ".$timenow
        );
        
        $where = array(
          'id_product' => $id
        );
        $this->ModelMyForce->updateProductsById($where,$data,'products');
    }else{
      $data = array(
        'product'        => $title,
        'picture'		     => $imageUrl."assets/images/products/".$fileName,
        'loc_picture'		 => $fileName,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'id_product' => $id
      );
      $this->ModelMyForce->replaceProductById($id);
      $this->ModelMyForce->updateProductsById($where,$data,'products');
    }
  
		 echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../products';
     </script>");
  }
  
  public function deleteProducts() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteProducts($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../products';
    </script>");
  }

  public function subproducts()
	{
    $data['subproducts']  = $this->ModelMyForce->LoadSubProducts()->result();
		$this->load->view('admin/table-subproducts',$data);
  }

  public function addsubproducts()
	{
    $data['products'] = $this->ModelMyForce->LoadProducts()->result();
		$this->load->view('admin/addsubproducts',$data);
  }

  public function insertSubProducts(){

    $imageUrl = base_url();
    
    $subproduct         = $this->input->post('subproduct');
    $id_product         = $this->input->post('id_product');
    // $price              = $this->input->post('price');
    $description        = $this->input->post('description');

		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/myforce/assets/images/subproduct/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $tempFilePDF 		= $_FILES['file']['tmp_name'];
		$fileNamePDF    = time().$_FILES['file']['name'];	  
    $targetPathPDF	= '/opt/lampp/htdocs/myforce/assets/images/subproduct/'; 
		$targetFilePDF 	= $targetPathPDF . $fileNamePDF;
    move_uploaded_file($tempFilePDF, $targetFilePDF);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");


    $subproducts = array(
      'subproduct'     => $subproduct,
      'picture'		     => $imageUrl."assets/images/subproduct/".$fileName,
      'loc_picture'		 => $fileName,
      'description'		 => $description,
      // 'price'		 => $price,
      'id_product'		 => $id_product,
      'file'		       => $imageUrl."assets/images/subproduct/".$fileNamePDF,
      'loc_file'		   => $fileNamePDF,
      'updatedAt'		   => $datenow." ".$timenow
    );

    $this->ModelMyForce->insertSubProducts($subproducts); 
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='subproducts'; 
    </script>");
  }

  public function editSubProducts()
	{
    $id = $this->uri->segment(2);

    
    $aquery = $this->db->query("SELECT * FROM subproducts WHERE id_subproduct = $id");
    $row = $aquery->row();

    $id_product = $row->id_product;
    

    $data['subproducts'] = $this->ModelMyForce->LoadSubProductsById($id)->result();
    $data['products'] = $this->ModelMyForce->LoadProductsBySubProductId($id_product)->result();
		$this->load->view('admin/editsubproducts',$data);
  }

  public function updateSubProducts() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");

    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');    
    $subproduct         = $this->input->post('subproduct');
    $id_product         = $this->input->post('id_product');
    // $price              = $this->input->post('price');

    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/myforce/assets/images/subproduct/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $tempFilePDF 		= $_FILES['file']['tmp_name'];
		$fileNamePDF    = time().$_FILES['file']['name'];	  
    $targetPathPDF	= '/opt/lampp/htdocs/myforce/assets/images/subproduct/'; 
		$targetFilePDF 	= $targetPathPDF . $fileNamePDF;
    move_uploaded_file($tempFilePDF, $targetFilePDF);

    $picture = substr($fileName,10);
    
    $pic = substr($fileName,10);
    $file = substr($fileNamePDF,10);
    
    if($pic == "" AND $file == ""){
      $data = array(
        'subproduct'     => $title,
        'description'		 => $description,
        // 'price'		       => $price,
        'id_product'		 => $id_product,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'id_subproduct' => $id
      );
      $this->ModelMyForce->updateSubProductsById($where,$data,'subproducts');
    }else if($pic == ""){
      $data = array(
        'subproduct'     => $title,
        'description'		 => $description,
        // 'price'		       => $price,
        'file'		       => $imageUrl."assets/images/subproduct/".$fileNamePDF,
        'loc_file'		   => $fileNamePDF,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'id_subproduct' => $id
      );
      $this->ModelMyForce->replaceSubProductsFileById($id);
      $this->ModelMyForce->updateSubProductsById($where,$data,'subproducts');
    }else if($file == ""){
      $data = array(
        'subproduct'     => $title,
        'description'		 => $description,
        // 'price'		       => $price,
        'id_product'		 => $id_product,
        'picture'		     => $imageUrl."assets/images/subproduct/".$fileName,
        'loc_picture'		 => $fileName,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'id_subproduct' => $id
      );

      $this->ModelMyForce->replaceSubProductsPicById($id);
      $this->ModelMyForce->updateSubProductsById($where,$data,'subproducts');
    }else{
      $data = array(
        'subproduct'     => $title,
        'picture'		     => $imageUrl."assets/images/subproduct/".$fileName,
        'loc_picture'		 => $fileName,
        'description'		 => $description,
        // 'price'		       => $price,
        'id_product'		 => $id_product,
        'file'		       => $imageUrl."assets/images/subproduct/".$fileNamePDF,
        'loc_file'		   => $fileNamePDF,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'id_subproduct' => $id
      );
      $this->ModelMyForce->replaceSubProductsById($id);
      $this->ModelMyForce->updateSubProductsById($where,$data,'subproducts');
    }
  
		 echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../subproducts';
     </script>");
  }

  public function deleteSubProducts() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteSubProducts($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../subproducts';
    </script>");
  }

  public function sales()
	{
    $data['sales']  = $this->ModelMyForce->LoadSales()->result();
		$this->load->view('admin/table-sales',$data);
  }

  public function pagesprofile()
	{
    $id = $this->uri->segment(2);
    $data['sales']  = $this->ModelMyForce->LoadSalesById($id)->result();
		$this->load->view('admin/pagesprofile',$data);
  }

  public function addsales()
	{
    $data['branches'] = $this->ModelMyForce->loadBranches()->result();
    $data['regions']  = $this->ModelMyForce->LoadRegions()->result();
		$this->load->view('admin/addsales',$data);
  }

  public function insertSales(){
    
    // $firstname         = $this->input->post('firstname');
    // $lastname          = $this->input->post('lastname');
    // $username          = $this->input->post('username');
    // $email             = $this->input->post('email');
    //$password          = password_hash($this->input->post('password'), PASSWORD_DEFAULT)."\n";
    //$cpassword         = password_hash($this->input->post('cpassword'), PASSWORD_DEFAULT)."\n";

    $password          = $this->input->post('password');
    $cpassword         = $this->input->post('cpassword');

    $options = [
      'cost' => 11,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
  ];

  
    echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
    echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

    $phone           = $this->input->post('phone');
    $gender           = $this->input->post('gender');
    $regions           = $this->input->post('regions');
    $branches           = $this->input->post('branches');
    $bank           = $this->input->post('bank');
    //$norek           = $this->input->post('norek');
    $bio           = $this->input->post('bio');
    $address           = $this->input->post('address');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $sales = array(
      'region' 			    => $regions,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

    var_dump($password);
    var_dump($cpassword);
    
    //$this->ModelMyForce->insertRegions($regions); 
    //  echo ("<script LANGUAGE='JavaScript'>
    //  window.alert('Success Data');
    //  window.location.href='regions';
    //  </script>");
  }


  public function regions()
	{
    $data['regions']  = $this->ModelMyForce->LoadRegions()->result();
		$this->load->view('admin/table-regions',$data);
  }

  public function addRegions()
	{
		$this->load->view('admin/addregions');
  }

  public function insertRegions(){
    $id_admin = $this->session->userdata('id_admin');
    $regions         = $this->input->post('title');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $regions = array(
      'region' 			    => $regions,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelMyForce->insertRegions($regions); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='regions';
     </script>");
  }

  public function editRegions()
	{
    $id = $this->uri->segment(2);
    $data['regions'] = $this->ModelMyForce->LoadRegionsById($id)->result();
		$this->load->view('admin/editregions',$data);
  }

  public function updateRegions() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $region         = $this->input->post('title');
    
		$data = array(
      'region'         => $region,
      'updatedAt'		   => $datenow." ".$timenow
		);
		
		$where = array(
			'id_region' => $id
    );
    
    $this->ModelMyForce->updateRegionsById($where,$data,'regionals');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../regions';
     </script>");
  }
  

  public function deleteRegions() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteRegions($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../regions';
    </script>");
  }

  public function branches()
	{
    $data['branches']  = $this->ModelMyForce->loadBranches()->result();
		$this->load->view('admin/table-branches',$data);
  }

  public function addBranches()
	{
		$this->load->view('admin/addbranches');
  }

  public function insertBranches(){
    $branches         = $this->input->post('title');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $regions = array(
      'branch' 			    => $branches,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelMyForce->insertBranches($regions); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='branches';
     </script>");
  }

  public function editBranches()
	{
    $id = $this->uri->segment(2);
    $data['branches'] = $this->ModelMyForce->LoadBranchesById($id)->result();
		$this->load->view('admin/editbranches',$data);
  }

  public function updateBranches() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $branch         = $this->input->post('title');
    
		$data = array(
      'branch'         => $branch,
      'updatedAt'		   => $datenow." ".$timenow
		);
		
		$where = array(
			'id_branch' => $id
    );
    
    $this->ModelMyForce->updateBranchesById($where,$data,'branches');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../branches';
     </script>");
  }

  public function deleteBranches() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteBranches($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../branches';
    </script>");
  }

  public Function logout(){
		$this->session->sess_destroy();
		//redirect('');
  }
}
