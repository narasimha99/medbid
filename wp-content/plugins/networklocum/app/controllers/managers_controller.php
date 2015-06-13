<?php
class ManagersController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}

	public function  manageitsystems(){

 		$this->set('mylayout', 'client');
		
		global $wpdb;	
		//echo "<pre>";		print_r($this->params); echo "</pre>";

		$this->load_model('itsystem');
 		if(isset($this->params['data']['itsystem'])){
	  		  $this->itsystem->save($this->params['data']['itsystem']);
			  $this->flash('success', 'Successfully Saved');
		}
	
 
		$id = $this->params['id'];
		$sql = "select id,itname From wp_itsystems where id=$id";
		$edititsystem=$wpdb->get_results($sql);
		$this->set('edititsystem',$edititsystem['0']);
 		
		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Itsystem.*');
	 	 
		$collection = $this->itsystem->paginate($params);
		 
		$this->set('itsystemlist', $collection['objects']);
		$this->set_pagination($collection);
	 		  
 	}



	public function  managecgcodes(){

 		$this->set('mylayout', 'client');
		
		global $wpdb;	
		$this->load_model('cgcode');
 		if(isset($this->params['data']['cgcode']['ccg_name'])){
	  		  $this->cgcode->save($this->params['data']['cgcode'])				;
			  $this->flash('success', 'Successfully Saved');
		}
	
		$id = $this->params['id'];
	  	$sql = "select id,ccg_name From wp_cgcodes where id=$id";
		$editccgcode=$wpdb->get_results($sql);
		//echo "<pre>";print_r($editccgcode);
		$this->set('editccgcode',$editccgcode['0']);

 		
		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Cgcode.*');
  		$this->load_model('cgcode');
		$cgcodelist = $this->cgcode->find();
 		//$this->set('cgcodelist',$cgcodelist);
	 
		$collection = $this->cgcode->paginate($params);
  		$this->set('ccgcodelist', $collection['objects']);
 		$this->set_pagination($collection);
 
 	}
 	

	public function  manageuploadfiles(){

 		$this->set('mylayout', 'client');
		
		global $wpdb;	
		$this->load_model('cgcode');
 		if(isset($this->params['data']['cgcode']['ccg_name'])){
	  		  $this->cgcode->save($this->params['data']['cgcode'])				;
			  $this->flash('success', 'Successfully Saved');
		}
	
		$id = $this->params['id'];
	  	$sql = "select id,ccg_name From wp_cgcodes where id=$id";
		$editccgcode=$wpdb->get_results($sql);
		//echo "<pre>";print_r($editccgcode);
		$this->set('editccgcode',$editccgcode['0']);

 		
		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Cgcode.*');
  		$this->load_model('cgcode');
		$cgcodelist = $this->cgcode->find();
 		//$this->set('cgcodelist',$cgcodelist);
	 
		$collection = $this->cgcode->paginate($params);
  		$this->set('ccgcodelist', $collection['objects']);
 		$this->set_pagination($collection);
 
 	}
	public function checkemail(){

		$this->set('mylayout', 'empty');	
		global $wpdb;
		$email_address = $_POST['email'];
		if(email_exists($email_address)) {
	  		$this->flash('error', '     Email already used please choose another email to continue!');
		}

	}

	public function locums(){
	
		$this->set('mylayout', 'client');

		$this->load_model('Locum');
 		if(isset($_POST['submit'])){
	  		  $this->cgcode->save($_POST);
			  $this->flash('success', 'Successfully Saved');
		}
	
  		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('locums.*');
 
		$this->load_model('locum');
		$locumlist = $this->locum->find();
 		$this->set('locumlist',$locumlist);
 
	}

	public function practices(){
	
		$this->set('mylayout', 'client');

		$this->load_model('Practice');
 		if(isset($_POST['submit'])){
	  		  $this->cgcode->save($_POST);
			  $this->flash('success', 'Successfully Saved');
		}
	
  		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Practice.*');
 
		$this->load_model('Practice');
		$practiceslist = $this->Practice->find();
 		$this->set('practiceslist',$practiceslist);
 
	}

 

}
?>
