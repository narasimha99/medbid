<?php
class LocumsController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}

	public function locumsignup(){

 		$this->set('mylayout', 'client');
		
		$this->load_model('Locum');
		//echo "<pre>";
		//print_r($this->params[data]);
 

				 
		$email_address = $this->params['data']['Locum']['email'];
		$firstname = $this->params['data']['Locum']['firstname'];
		$_SESSION['firstname'] = $firstname;
		
		// Generate the password and create the user
		 $password = wp_generate_password( 12, false );

		if(!empty($this->params['data']['Locum']) ){
			if(email_exists($email_address)) {
	 		 	$this->flash('error', '     Email already used please choose another email to continue!');
			}else {
		
			  	  $user_id = wp_create_user( $email_address, $password, $email_address );
	 			  wp_update_user(array('ID'          =>    $user_id,
						      'nickname'    =>    $email_address,
							'first_name'   =>   $this->params['data']['Locum']['firstname'],
						      'last_name'    =>    $this->params['data']['Locum']['lastname']));

				  // Set the role
				  $user = new WP_User($user_id);
				  $user->set_role('locum');
 				  $this->params['data']['Locum']['user_id'] = $user_id;
				  $object = $this->params['data'];
 				  $this->Locum->save($object);
 				  $this->flash('notice', 'Successfully Saved');
				
				  // Email the user
				 wp_mail( $email_address, 'Welcome to Medbid! ', 'Your Password: ' . $password);
		  		$id = $this->Locum->insert_id;
       				$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'locumsignupnext', 'id' => $id));
 			        $this->redirect($url);
		 	}
 				
 		}

		 
  	}


	public function locumsignupnext(){

 		$this->set('mylayout', 'client');
		
		$this->load_model('Locum');

		$id =  $this->params['id'];
 		$this->set('locumid',$id);
		//echo "<pre>"; 	print_r($this->params);echo "</pre>";
	 	if(!empty($this->params['data']['Locum']['gmc_number'])){
   			  $this->Locum->save($this->params['data']);
			  $this->flash('success', '  Thanks for Become our locum, Please check your email jobs are waiting for u.');
  		}
	
		$this->load_model('howdidyouhear');
		$howdidyouhearlist = $this->howdidyouhear->find();
		$this->set('howdidyouhearlist',$howdidyouhearlist);	
  	}


	public function landingpage(){
		$this->set('mylayout', 'client');
	        $this->flash('success', '  Thanks for Become a locum, Please check your email lot of thoughts are awaiting for u.');
 	}
 
}

?>
