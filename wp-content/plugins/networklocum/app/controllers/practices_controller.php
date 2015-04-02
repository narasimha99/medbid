<?php
class PracticesController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}

	public function  practicesignup(){

 
 		$this->set('mylayout', 'client');

		$this->load_model('Practice');
 		
		 // Generate the password and create the user
		 $password = $this->params['data']['Practice']['password'];
		 $mpassword =  wp_generate_password( 12, false);
 		 $email_address = $this->params['data']['Practice']['email'];

		//echo "<pre>";	print_r($this->params);		echo "</pre>";
		if(!empty($this->params['data']['Practice']['email'])){

		 	if(email_exists($email_address)) {
	 		 	$this->flash('error', '     Email already used please choose another email to continue!');
			}else {
		
    			  $user_id = wp_create_user( $email_address, $mpassword, $email_address );
 			  wp_update_user(array('ID'          =>    $user_id,
					      'nickname'     =>    $email_address,
					      'first_name'   =>   $this->params['data']['Practice']['firstname'],
					      'last_name'    =>    $this->params['data']['Practice']['lastname']));

			  // Set the role
			  $user = new WP_User($user_id);
			  $user->set_role('practicer');
			 
			  $this->params['data']['Practice']['user_id'] = $user_id;
 			
			  $this->Practice->save($this->params['data']['Practice']);
			  $this->flash('success', 'Thanks for become our member, Please check your email lot of locums are waiting for you.');

			  // Email the user
			  wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $mpassword);
			}
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
 
}

?>
