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
	
	public function dashboard(){
 		$this->set('mylayout', 'client');
 	}
 

	public function youraccount(){
 		$this->set('mylayout', 'client');
 	}

	public function editprofile(){
		$this->set('mylayout', 'client');
 		$this->load_model('Practice');	
		$user_ID = get_current_user_id();
		$object = $this->Practice->find_by_id($user_ID);
		 	//print_r($object);
  		//print_r($this->params);			
		//print_r($_POST); 
		$this->set('practiceobject', $object);
		if (isset($this->params['data']['Practice'])){
		// echo "<pre>";print_r($_FILES); echo "</pre>";	

 		//$temp_file = tempnam(sys_get_temp_dir(), 'Tux');
 		//echo $temp_file;

		
		$target_dir = "uploads/";
		echo $target_file = $target_dir . basename($_FILES['locum_pack']['name']);
  		if(move_uploaded_file($_FILES['locum_pack']["tmp_name"], $target_file)){
		        echo "The file ". basename($_FILES["'locum_pack"]["name"]). " has been uploaded.";
			$this->params['data']['Practice']['locum_pack'] =  $_FILES["'locum_pack"]["name"];
		}
 		

		  $this->params['data']['Practice']['it_systems'] =  implode(",",$this->params['data']['Practice']['it_systems']);
 		  $this->Practice->save($this->params['data']['Practice']);	
		  $this->flash('success', 'Your details updated successfully.');
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

		$this->load_model('Pctcode');
		$Pctcodelist = $this->Pctcode->find();
	//	echo "<pre>";print_r($Pctcode); echo "</pre>";
		$this->set('pctcodelist',$Pctcodelist);
		
  	}
	
	public function changepassword(){
 
		$this->set('mylayout', 'client');
 		include($_SERVER['DOCUMENT_ROOT']."/medbid/wp-includes/pluggable.php");

		if(isset($_POST)){

			$current_user = wp_get_current_user();
			$user_id = get_current_user_id();
	 		$old_password = $_POST['old_password'];
			$new_password =  $_POST['new_password1'];
		 	$hash_old_password = $current_user->data->user_pass;
			if(wp_check_password($old_password, $hash_old_password)){
	 			wp_set_password($new_password,$user_id);
				$this->flash('error', 'Your password update with latest password given.');	
			}else{
				$this->flash('error', 'Please enter valid Old password !');	
			}
		}
	}


}
?>
