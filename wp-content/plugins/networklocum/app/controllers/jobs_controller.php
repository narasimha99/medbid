<?php
class JobsController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}

	public function  publicjobcreate(){

 		$this->set('mylayout', 'client');

		$this->load_model('Job');
   
		$email_address = $_POST['email'];
		$password = $_POST['password'];
		//echo "<pre>"; print_r($_POST); echo "</pre>";
		if(isset($_POST['save']) ){
   
			  $user_id = wp_create_user( $email_address, $password, $email_address );
 			  wp_update_user(array('ID'          =>    $user_id,
					      'nickname'    =>    $email_address));

			  // Set the role
			  $user = new WP_User($user_id);
			  $user->set_role('contributor');
			 
			  $_POST['user_id'] = $user_id;
			  $this->Practice->save($_POST);
			  $this->flash('success', 'Successfully member Saved');

			  // Email the user
			  wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password);
 		} 		

		$this->load_model('cgcode');
		$cgcodelist = $this->cgcode->find();
		
		$this->set('cgcodelist',$cgcodelist);

		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);

		$this->load_model('howdidyouhear');
		$howdidyouhearlist = $this->howdidyouhear->find();
		$this->set('howdidyouhearlist',$howdidyouhearlist);
		


  	}
 
		
	
	public function  settimerates(){

	 	$this->set('mylayout', 'empty');
		//print_r($_GET);
		$dateranges = $_GET['dateranges'];
		$this->set('dateranges',$dateranges);
  	}
}

?>
