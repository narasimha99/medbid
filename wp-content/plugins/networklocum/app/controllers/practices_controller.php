<?php
class PracticesController extends MvcPublicController {

 	public function index() {
		session_start();
		$this->isvaliduser();	
 		$this->set('mylayout', 'client');
  		$user_id = get_current_user_id();
 		$_SESSION['user_id'] =  $user_id;
		$this->load_model('Practice');
		$PracticeObject = $this->Practice->find_by_user_id($user_id);
		//echo "<pre>";print_r($PracticeObject);	
		$this->set('PracticeObject',$PracticeObject);
 		$_SESSION['practicer_id'] = $PracticeObject[0]->id;	
 			
		$practicer_id = $PracticeObject[0]->id;
  		$sqljobs =  "select count(user_id) as cntjob from wp_jobs where user_id=$practicer_id";
		global $wpdb;
		$rs =  $wpdb->get_results($sqljobs);
		$postedJobscount = 0;
		if(count($rs)>0) {
		   $postedJobscount = $rs[0]->cntjob;
		}
    		$this->set('postedJobscount',$postedJobscount);

		$practicer_id = $PracticeObject[0]->id;
		$_POST['session_date_range'];
 		//echo "<pre>"; print_r($jobs); echo "</pre>";
		$sqljobs =  "select session_date_range from wp_jobs where user_id=$practicer_id";

		$_POST['session_date_range'];
 $wpdb->get_results($sqljobs);


     	}



	public function getLatLong($zipaddress){
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
		".urlencode($zipaddress)."&sensor=false";
		$result_string = file_get_contents($url);
		$result = json_decode($result_string, true);
		//echo "<pre>"; print_r($result); echo"</pre>";
		$result1[]=$result['results'][0];
		$result2[]=$result1[0]['geometry'];
		$result3[]=$result2[0]['location'];
		return $result3[0];
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
			  $this->flash('success', 'Thanks for become our member,Plesase check your email to continue.');
			
				$firstname =  $this->params['data']['Practice']['firstname'];
				$lastname  =  $this->params['data']['Practice']['lastname'];

				$message = "";
				$message .=  "<p>Hi $firstname  $lastname ,</p>";
				$message .= '<p>Thanks for registered with us.</p>';
				$message .= '<p>Your Login details as follows.</p>';
		 		$message .= '<table width="60%" align="center" bgcolor="#cdcdcd" cellpadding="5" cellspacing="1">';
				$message .= '<tr bgcolor="#fff">';
				$message .= '<td><p><strong>Username</strong></p></td>';
				$message .= '<td>'.$email_address.'</td>';
				$message .= '</tr>';
				$message .= '<tr bgcolor="#fff">';
				$message .= '<td><p><strong>Password</strong></p></td>';
				$message .= '<td> '.$mpassword.'</td>';
				$message .= '</tr>';
				$message .= '</table>';
				$message .= '<p>Feel free to ask any queries. email us <a href="mailto:info@docum.co.uk">info@docum.co.uk</a></p>';
				$message .= '<p>Thanks, have a lovely day.</p>';
  				

			  // Email the user
			  sendlocummail( $email_address, 'Welcome to Docum!',$message);
			
				 $url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'landingpage'));
				 $this->redirect($url);
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

	
	public function landingpage(){
		$this->set('mylayout', 'client');
	        $this->flash('success', '  Thanks for Become our practicer, Please check your email to activate account.');
 	}
		
		
	 

	public function youraccount(){
		$this->isvaliduser();	
 		$this->set('mylayout', 'client');
 	}

	public function editprofile(){
		$this->isvaliduser();	
		$this->set('mylayout', 'client');
 		$this->load_model('Practice');	
		//echo "<pre>"; print_r($_POST); echo "</pre>";
		if (isset($_POST['data']['Practice'])){
		// echo "<pre>";print_r($_FILES); echo "</pre>";	

 		//$temp_file = tempnam(sys_get_temp_dir(), 'Tux');
 		//echo $temp_file;

		/*
		$target_dir = "uploads/";
		  $target_file = $target_dir . basename($_FILES['locum_pack']['name']);
  		if(move_uploaded_file($_FILES['locum_pack']["tmp_name"], $target_file)){
		        echo "The file ". basename($_FILES["'locum_pack"]["name"]). " has been uploaded.";
			$this->params['data']['Practice']['locum_pack'] =  $_FILES["'locum_pack"]["name"];
		}
 		*/

			if( $_POST['data']['Practice']['verifiedpracticer'] == 2)
			$_POST['data']['Practice']['verifiedpracticer'] = 0;
			


		$_POST['data']['Practice']['it_systems'] =  implode(",",$_POST['data']['Practice']['it_systems']);
		$practicer_id = $_POST['data']['Practice']['id'];
		$this->Practice->update($practicer_id,$_POST['data']['Practice']);	
		$this->flash('success', 'Your profile updated successfully.');
		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'index'));
		$this->redirect($url);	


		}


		$user_ID = get_current_user_id();
		$object = $this->Practice->find_by_user_id($user_ID);
		// echo "<pre>";	print_r($object); echo "</pre>";
 		$this->set('practiceobject', $object[0]);


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
		
		$this->isvaliduser();	 
		$this->set('mylayout', 'client');
 		include("wp-includes/pluggable.php");
		//echo "<pre>";print_r($_POST); echo "</pre>";
		if(isset($_POST['saveform'])){
			$current_user = wp_get_current_user();
			$user_id = get_current_user_id();
	 		$old_password = $_POST['old_password'];
			$new_password =  $_POST['new_password1'];
		 	$hash_old_password = $current_user->data->user_pass;
			if(wp_check_password($old_password, $hash_old_password)){
	 			wp_set_password($new_password,$user_id);
				$this->flash('success', 'Your password update with latest password given.');	
				 $url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'index'));
				 $this->redirect($url);

			}else{
				$this->flash('error', 'Please enter valid Old password !');	
			}
 		}
	}

	
	public function billing()
	{
		$this->isvaliduser();	
		$this->set('mylayout', 'client');
	}

	public function acceptyourlocum(){
		 
		//print_r($this->params);
		
		$this->isvaliduser();	
		
		$this->load_model('Appliedjob');	
	
		$locum_id = $this->params['locum_id'];
		$applied_id = $this->params['id'];
	 	global $wpdb;

		//$sqlJob = "Update wp_jobs set selected_locum = $locum_id where id = $job_id";
 		//$wpdb->query($sqlJob);

		//applied_job_status = 1  // selected 
		$sqlJoblocum = "Update wp_appliedjobs set practicer_accepted = 1   where id = $applied_id ";
		$wpdb->query($sqlJoblocum);

		 $url = esc_url( home_url( '/' ) );

		$sqlLocum = "Select firstname,lastname,email from wp_locums where id=$locum_id";
		$rs =  $wpdb->get_results($sqlLocum);
		if(count($rs)>0) {		

			$locumName = 	$rs[0]->firstname.$rs[0]->lastname;
			$email = $rs[0]->email;
		
			$message = "Dear $locumName, <br><br>
				    Congratulations, your application succefully accepted by our practicers,<br> 
				    Please click here to confirm once to know your availablity. <br>
				    To know more details please use bellow link  here to continue.. <br><br>
				    <a href='"."$url/locum/acceptyourjob/$applied_id'>View the Job</a> <br><br>
  				    Regards, <br>
				    Medbid. ";

 				// echo $message;
	
 			sendlocummail($email,'Congratulations your selected for this job',$message);
		  	$this->flash('success', 'You have succesfully accepted your locum.');
			$url = MvcRouter::public_url(array('controller' =>'jobs', 'action' => 'jobapplications'));
 			$this->redirect($url);
 				
  		}
					
 	}

	
	

	public function rejectlocum(){

		$this->isvaliduser();	
		 
		//print_r($this->params);
 		$locum_id = $this->params['locum_id'];
		$appliedjobId = $this->params['id'];
		 
		global $wpdb;
 
		//practicer_rejected = 0  // Rejected 
  		  $sqlJoblocum = "Update  wp_appliedjobs set practicer_rejected = 1 WHERE  id = $appliedjobId ";
 		$wpdb->query($sqlJoblocum);
  		$this->flash('success', 'Your are rejected locum succesfully.');
		$url = MvcRouter::public_url(array('controller' =>'jobs', 'action' => 'jobapplications'));
 		$this->redirect($url);
	}	


	public function viewpracticer(){

		$this->set('mylayout', 'client'); 
		$practicer_id = $this->params['id'];
	
		$this->load_model('Practice');
		$practicerobject = $this->Practice->find_by_id($practicer_id);
		//echo "<pre>"; print_r($practicerobject); echo "</pre>";
 		$this->set('practicerobject',$practicerobject); 
		
		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);

		$this->load_model('cgcode');
		$cgcodelist = $this->cgcode->find();
 		$this->set('cgcodelist',$cgcodelist);

		$this->load_model('Pctcode');
		$Pctcodelist = $this->Pctcode->find();
		$this->set('Pctcodelist',$Pctcodelist);
		
 	}


	public function test(){
	$this->set('mylayout', 'client'); 
	}	

	public function isvaliduser(){
 		$user_id = get_current_user_id();
		if($user_id == 0){
			global $wp;
			$url = esc_url( home_url( '/' ));
			$targetplace  = $url.$wp->request;
			$targetUrl = $url."/wp-login.php?redirect_to=$targetplace";
			wp_redirect( $targetUrl, 301);
			exit;		
	 	}
    	}	  
}
?>
