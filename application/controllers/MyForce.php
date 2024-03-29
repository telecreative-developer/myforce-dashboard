<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class MyForce extends CI_Controller {
  public function __construct()
	{
    parent::__construct();
    $this->load->helper('date');
    $this->load->library('pagination');

		if($this->session->userdata('username') == ""){
			redirect('../');	
		}
	}

	public function dashboard()
	{
    $data['managers'] = $this->ModelMyForce->loadDashboardManagers()->result();

    $config = array();
    $config["base_url"] = base_url() . "MyForce/dashboard";
    $query = $this->db->query("SELECT * FROM managers, branches WHERE managers.id_manager = branches.id_manager");
    $x = $query->num_rows($query);

    $config["total_rows"] 	= $x;
    $config["per_page"] 	= 5;
    $config["uri_segment"] 	= 3;
    $config['num_links'] 	= 5;

    $config['full_tag_open'] 	= '<div class="pagination"><ul>';
    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

    $config['first_link'] 		= '&laquo; First';
    $config['first_tag_open'] 	= '<li class="prev page">';
    $config['first_tag_close'] 	= '</li>';

    $config['last_link'] 		= 'Last &raquo;';
    $config['last_tag_open'] 	= '<li class="next page">';
    $config['last_tag_close'] 	= '</li>';

    $config['next_link'] 		= 'Next &rarr;';
    $config['next_tag_open'] 	= '<li class="next page">';
    $config['next_tag_close'] 	= '</li>';

    $config['prev_link'] 		= '&larr; Previous';
    $config['prev_tag_open'] 	= '<li class="prev page">';
    $config['prev_tag_close'] 	= '</li>';

    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
    $config['cur_tag_close'] 	= '</a></li>';

    $config['num_tag_open'] 	= '<li class="page">';
    $config['num_tag_close'] 	= '</li>';

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
    $data["results"] = $this->ModelMyForce->count_managers($config["per_page"], $page);
    $data["links"]   = $this->pagination->create_links();


		$this->load->view('admin/dashboard',$data);
  }
  
  public function targets()
	{
    $data['targets']  = $this->ModelMyForce->LoadTargets()->result();
		$this->load->view('admin/table-targets',$data);
  }

  public function editTargets()
	{
    $id = $this->uri->segment(2);
    $data['targets'] = $this->ModelMyForce->LoadTargetsById($id)->result();
		$this->load->view('admin/edittargets',$data);
  }

  public function updateTargets() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $actual_revenue_month           = $this->input->post('actual_revenue_month');
    $actual_revenue_year            = $this->input->post('actual_revenue_year');
    $actual_unit_month              = $this->input->post('actual_unit_month');
    $actual_unit_year               = $this->input->post('actual_unit_year');
    $pipeline_unit_month            = $this->input->post('pipeline_unit_month');
    $pipeline_revenue_month         = $this->input->post('pipeline_revenue_month');
    $year                           = $this->input->post('year');
    $hit_rate                       = $this->input->post('hit_rate');
    
		$data = array(
      'actual_revenue_month'          => $actual_revenue_month,
      'actual_revenue_year'       		=> $actual_revenue_year,
      'actual_unit_month'  	          => $actual_unit_month,
      'actual_unit_year'              => $actual_unit_year,
      'pipeline_unit_month'           => $pipeline_unit_month,
      'pipeline_revenue_month'        => $pipeline_revenue_month,
      'year'                          => $year,
      'hit_rate'                      => $hit_rate,
      'updatedAt'		                  => $datenow." ".$timenow
		);
		
		$where = array(
			'id_target' => $id
    );
    
    $this->ModelMyForce->updateTargetsById($where,$data,'targets');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../targets';
     </script>");
    
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

  public function managers()
	{
    $data['managers']  = $this->ModelMyForce->LoadManagers()->result();
		$this->load->view('admin/table-managers',$data);
  }

  public function addmanagers()
	{
		$this->load->view('admin/addmanagers');
  }


  public function pagesManagers()
	{
    $id = $this->uri->segment(2);

    $query = $this->db->query("SELECT * FROM branches WHERE id_manager = $id");
    $row = $query->row();

    $id_branch = $row->id_branch;

    $data['managers']  = $this->ModelMyForce->LoadManagersById($id)->result();
    $data['sales']     = $this->ModelMyForce->LoadSalesDashboardById($id_branch)->result();
		$this->load->view('admin/pagesmanagers',$data);
  }

  public function deleteManagers() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteManagers($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../managers';
    </script>");
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
    // $data['regions']  = $this->ModelMyForce->LoadRegions()->result();
		$this->load->view('admin/addsales',$data);
  }

  public function sales()
  {
    $data['sales'] = $this->ModelMyForce->getSales()->result();
    $this->load->view('admin/table-sales', $data);
  }

  public function addtarget()
  {
    $data['sales'] = $this->ModelMyForce->loadSales()->result();
    $this->load->view('admin/addtarget', $data);
  }

  public function insertTarget(){
    $actual_revenue_month           = $this->input->post('actual_revenue_month');
    $actual_revenue_year            = $this->input->post('actual_revenue_year');
    $actual_unit_month              = $this->input->post('actual_unit_month');
    $actual_unit_year               = $this->input->post('actual_unit_year');
    $pipeline_unit_month            = $this->input->post('pipeline_unit_month');
    $pipeline_revenue_month         = $this->input->post('pipeline_revenue_month');
    $year                           = $this->input->post('year');
    $id                             = $this->input->post('id');
    $hit_rate                       = $this->input->post('hit_rate');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $targets = array(
      'actual_revenue_month'          => $actual_revenue_month,
      'actual_revenue_year'       		=> $actual_revenue_year,
      'actual_unit_month'  	          => $actual_unit_month,
      'actual_unit_year'              => $actual_unit_year,
      'pipeline_unit_month'           => $pipeline_unit_month,
      'pipeline_revenue_month'        => $pipeline_revenue_month,
      'year'                          => $year,
      'id'                            => $id,
      'hit_rate'                      => $hit_rate,
      'createdAt'		                  => $datenow." ".$timenow,
      'updatedAt'		                  => $datenow." ".$timenow
    );

     $this->ModelMyForce->insertTarget($targets); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='targets';
     </script>");
  }

  // public function insertProducts(){
  //   $target_month         = $this->input->post('target_month');
  //   $target_year   = $this->input->post('target_year');
    

  //   $datenow = date("Y-m-d");
  //   $timenow = date("h:i:s");

  //   $products = array(
  //     'product'  			  => $title,
  //     'picture'		      => $imageUrl."assets/images/products/".$fileName,
  //     'loc_picture'		  => $fileName,
  //     'description'  		=> $description,
  //     'createdAt'		    => $datenow." ".$timenow,
  //     'updatedAt'		    => $datenow." ".$timenow
  //   );

  //   $this->ModelMyForce->insertProducts($products); 
  //   echo ("<script LANGUAGE='JavaScript'>
  //    window.alert('Success Data');
  //    window.location.href='products';
  //    </script>");
  // }  

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

  public function editsales()
	{
    $id = $this->uri->segment(2);
    $data['branch']  = $this->ModelMyForce->loadBranch()->result();
    $data['sales'] = $this->ModelMyForce->LoadSalesById($id)->result();
		$this->load->view('admin/editsales',$data);

    // $id = $this->uri->segment(2);

    // $query = $this->db->query("SELECT * FROM users WHERE id = $id");
    // $row = $query->row();

    // $id_branch = $row->id_branch;

    // $data['branch']  = $this->ModelMyForce->LoadBranchNotById($id_branch)->result();
    // $data['sales'] = $this->ModelMyForce->LoadSalesById($id)->result();
		// $this->load->view('admin/editsales',$data);
  }

  public function updateSales() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $username             = $this->input->post('username');
    $first_name           = $this->input->post('first_name');
    $email                = $this->input->post('email');
    $last_name            = $this->input->post('last_name');
    $phone                = $this->input->post('phone');
    $gender               = $this->input->post('gender');
    $branch               = $this->input->post('branch');
    $bank_name            = $this->input->post('bank_name');
    $no_rek                = $this->input->post('no_rek');
    $address              = $this->input->post('address');
    $id_branch            = $this->input->post('id_branch');
    
		$data = array(
      'username'          => $username,
      'id_branch'         => $id_branch,
      'first_name'        => $first_name,
      'last_name'         => $last_name,
      'email'             => $email,
      'phone'             => $phone,
      'gender'            => $gender,
      'id_branch'         => $branch,
      'bank_name'         => $bank_name,
      'no_rek'            => $no_rek,
      'address'           => $address,
      'updatedAt'		      => $datenow." ".$timenow
		);
		
		$where = array(
			'id' => $id
    );
    
    $this->ModelMyForce->updateSalesById($where,$data,'users');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../sales';
     </script>");
  }

  public function deleteSales() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteSales($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../sales';
    </script>");
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
    $data['managers']  = $this->ModelMyForce->LoadManagers()->result();
		$this->load->view('admin/addbranches',$data);
  }

  public function insertBranches(){
    $branches         = $this->input->post('title');
    $id_manager       = $this->input->post('id_manager');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $regions = array(
      'branch' 			    => $branches,
      'id_manager' 			=> $id_manager,
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
    
    $query = $this->db->query("SELECT * FROM branches WHERE id_branch = $id");
    $row = $query->row();

    $id_manager = $row->id_manager;

    $data['branches'] = $this->ModelMyForce->LoadBranchesById($id)->result();
    $data['managers']  = $this->ModelMyForce->LoadManagerNotById($id_manager)->result();
		$this->load->view('admin/editbranches',$data);
  }

  public function updateBranches() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $branch         = $this->input->post('title');
    $id_manager         = $this->input->post('id_manager');
    
		$data = array(
      'branch'         => $branch,
      'id_manager'     => $id_manager,
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

  public function teams()
	{
    $data['teams']  = $this->ModelMyForce->LoadTeams()->result();
		$this->load->view('admin/table-teams',$data);
  }

  public function addteams()
	{
    $data['sales']      = $this->ModelMyForce->LoadSales()->result();
    $data['pipelines']  = $this->ModelMyForce->LoadPipelines()->result();
    $data['branch']     = $this->ModelMyForce->loadBranches()->result();
    $data['customers']  = $this->ModelMyForce->LoadCustomers()->result();
		$this->load->view('admin/addteams',$data);
  }

  public function insertTeams(){
    $id_branch           = $this->input->post('id_branch');
    $id_pipeline         = $this->input->post('id_pipeline');
    $id_customer         = $this->input->post('id_customer');
    $id_sales            = $this->input->post('id_sales');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $regions = array(
      'id_branch' 			      => $id_branch,
      'id_pipeline' 			    => $id_pipeline,
      'id_customer' 			    => $id_customer,
      'id'      			        => $id_sales,
      'createdAt'		          => $datenow." ".$timenow,
      'updatedAt'		          => $datenow." ".$timenow
    );

     $this->ModelMyForce->insertTeams($regions); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='teams';
     </script>");
  }

  public function editTeams()
	{
    $id = $this->uri->segment(2);
    $query = $this->db->query("SELECT * FROM team_updates WHERE id_team_update = $id");
    $row = $query->row();

    $id_pipeline = $row->id_pipeline;
    $id_sales = $row->id;
    $id_customer = $row->id_customer;

    $data['teams']      = $this->ModelMyForce->LoadTeamsById($id)->result();
    $data['pipelines']  = $this->ModelMyForce->LoadPipelinesNotById($id_pipeline)->result();
    $data['customers']  = $this->ModelMyForce->loadCustomersNotById($id_customer)->result();
    $data['sales']      = $this->ModelMyForce->loadSalesNotById($id_sales)->result();
    
		$this->load->view('admin/editteams',$data);
  }

  public function updateTeams() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $id_branch            = $this->input->post('id_branch');
    $id_pipeline          = $this->input->post('id_pipeline');
    $id_customer          = $this->input->post('id_customer');
    $id_sales             = $this->input->post('id_sales');
    
		$data = array(
      'id_branch'         => $id_branch,
      'id_pipeline'       => $id_pipeline,
      'id_customer'       => $id_customer,
      'id'                => $id_sales,
      'updatedAt'		      => $datenow." ".$timenow
		);
		
		$where = array(
			'id_team_update' => $id
    );
    
    $this->ModelMyForce->updateTeamsById($where,$data,'team_updates');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../teams';
     </script>");
  }
  
  public function deleteTeams() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteTeams($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../teams';
    </script>");
  }

  public function questions()
	{
    $data['questions']  = $this->ModelMyForce->loadQuestions()->result();
		$this->load->view('admin/table-questions',$data);
  }

  public function addquestions()
	{
		$this->load->view('admin/addquestions');
  }
  
  public function insertQuestions(){
    $question     = $this->input->post('questions');
    $step         = $this->input->post('step');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $questions = array(
      'question' 			  => $question,
      'step' 			      => $step,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelMyForce->insertQuestions($questions); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='questions';
     </script>"); 
  }

  public function editQuestions()
	{
    $id = $this->uri->segment(2);
    $data['questions'] = $this->ModelMyForce->LoadQuestionsById($id)->result();
		$this->load->view('admin/editquestions',$data);
  }

  public function updateQuestions() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $question         = $this->input->post('questions');
    $step             = $this->input->post('step');
    
		$data = array(
      'question'       => $question,
      'step'           => $step,
      'updatedAt'		   => $datenow." ".$timenow
		);
		
		$where = array(
			'id_question' => $id
    );
    
    $this->ModelMyForce->updateQuestionsById($where,$data,'questions');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../questions';
     </script>");
	}

  public function deleteQuestions() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteQuetions($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../questions';
    </script>");
  }


  public function answers()
	{
    $data['answers']  = $this->ModelMyForce->loadAnswers()->result();
		$this->load->view('admin/table-answers',$data);
  }

  public function deleteAnswers() {
    $id = $this->uri->segment(2);
    $this->ModelMyForce->deleteAnswers($id);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../answers';
    </script>");
  }
  

  public Function logout(){
		$this->session->sess_destroy();
		redirect('../');
  }
}
