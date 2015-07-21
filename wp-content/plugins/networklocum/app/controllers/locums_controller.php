<?php
class LocumsController extends MvcPublicController {

 	public function index() {
		$this->isvaliduser();	
		$this->set('mylayout', 'client');	
   		$user_id = get_current_user_id();
 		$_SESSION['user_id'] =  $user_id;
		$this->load_model('Locum');
		$locumObject = $this->Locum->find_by_user_id($user_id);
 		$this->set('locumObject',$locumObject);

 		$_SESSION['locum_id'] = $locumObject[0]->id;	
 
		$masterDocuments  = array();
		$this->load_model('Masterdocument');		
		$masterDocuments = $this->Masterdocument->find();
		$this->set('masterDocuments',$masterDocuments);
		
 		// echo "<pre>"; print_r($locumObject); echo "</pre>";
		//sendlocummail('sureshmuggalla79@gmail.com','Your profile account rejected by our Docum','testing');	
		 
    	}

	function checkdocument($id,$masterDocuments,$location){
		$this->isvaliduser();	 
		 $id = $id - 1;
 		$locum_id  = $_SESSION['locum_id']; 
		$this->load_model('Locumdocument');
	
		$url = esc_url( home_url( '/' ));

	 	$locumDocuments = $this->Locumdocument->find_by_user_id($locum_id);
		 $this->set('locumDocuments',$locumDocuments);
  		// echo "<pre>"; print_r($locumDocuments);  echo"</pre>";
	 	$document_title =   $masterDocuments[$id]->document_title;
		$document_filename = $masterDocuments[$id]->document_filename;
		  //echo  $locumDocuments[0]->$document_filename; 
		 
		if( $locumDocuments[0]->$document_filename  == 1 )
 			 echo  "<p style=\"color:#F55E08\">Waiting for Approve</p>";
		else if( $locumDocuments[0]->$document_filename == 2 ) 
			echo  '<p style=\"color:green\">Approved</p>';
	 	else if( $locumDocuments[0]->$document_filename == 3) 
		{
			echo  '<p style=\"color:red\">Rejected upload again</p>';
			 $id = $id + 1;
			if ( $location == 0 )
				echo "<a href='$url/locums/uploaddocuments/$id'>".$document_title."</a>";
			else	
			echo " <a class='btn btn-xs btn-default' href='$url/locums/uploaddocuments/$id'><i class='icon-cloud-upload'></i>&nbsp;Upload</a>"; 

		}
		else if($locumDocuments[0]->$document_filename == 0 ) {
			 $id = $id + 1;
			if ( $location == 0 )
				echo "<a href='$url/locums/uploaddocuments/$id'>".$document_title."</a>";
			else	
			echo " <a class='btn btn-xs btn-default' href='$url/locums/uploaddocuments/$id'><i class='icon-cloud-upload'></i>&nbsp;Upload</a>"; 
		}	
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
 	 			  $locum_id = $this->Locum->insert_id;					

				  session_start();
				  $_SESSION['locum_id'] =  $locum_id;


 				//$this->flash('notice', 'Successfully Saved');

				//$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
				//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
				//$headers .= "CC: susan@example.com\r\n";
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				  // Email the user
				 wp_mail( $email_address, 'Welcome to Medbid! ', 'Your Password: ' . $password,$headers);
		  		
       				$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'locumsignupnext'));
 			        $this->redirect($url);
		 	}
 				
 		}

		 
  	}


	public function locumsignupnext(){

 		$this->set('mylayout', 'client');
		
		$this->load_model('Locum');

		session_start();
		$locum_id = $_SESSION['locum_id'];
 		$this->set('locumid',$locum_id);
		//echo "<pre>";	print_r($_POST); echo "</pre>";
	
	 	if(!empty($this->params['data']['Locum']['gmc_number'])){
   			  $this->Locum->update($locum_id,$_POST['data']['Locum']);
			  $this->flash('success', '  Thanks for Become our locum, Please check your email to activate your account.');
 		
       				$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'landingpage'));
 			        $this->redirect($url);
		 
  		}
	
		$this->load_model('howdidyouhear');
		$howdidyouhearlist = $this->howdidyouhear->find();
		$this->set('howdidyouhearlist',$howdidyouhearlist);	
  	}


	public function landingpage(){
		$this->set('mylayout', 'client');
	        $this->flash('success', '  Thanks for Become a locum, Please check your email to activate account.');
 	}
		
	

	public function youraccount(){
		$this->isvaliduser();	
		$this->set('mylayout', 'client');
 	}

	public function accountdetails(){
		$this->isvaliduser();	
		$this->set('mylayout', 'client');
		//echo "<pre>"; print_r($_POST); echo "</pre>";
		$user_id = get_current_user_id();
		$this->set('user_ID',$user_id);
		if(isset($_POST[data][Locum][id])){
			
			$id = $_POST['data']['Locum']['id'];
			if(!isset($_POST[data][Locum][available_on_sunday])) $_POST[data][Locum][available_on_sunday]=0;
			if(!isset($_POST[data][Locum][available_on_tuesday])) $_POST[data][Locum][available_on_tuesday]=0;
			if(!isset($_POST[data][Locum][available_on_wednesday])) $_POST[data][Locum][available_on_wednesday]=0;
			if(!isset($_POST[data][Locum][available_on_thursday])) $_POST[data][Locum][available_on_thursday]=0;
			if(!isset($_POST[data][Locum][available_on_friday])) $_POST[data][Locum][available_on_friday]=0;
			if(!isset($_POST[data][Locum][available_on_saturday])) $_POST[data][Locum][available_on_saturday]=0;
  
			$this->Locum->update($id,$_POST['data']['Locum']);
			$this->flash('success', 'Your account details updated succeessfully.');	
		}
		$object = $this->Locum->find_by_user_id($user_id);
		$this->set('locumobj',$object[0]);
		//echo "<pre>";print_r($_POST); echo "</pre>";
 	}

	public function uploaddocuments(){
		$this->isvaliduser();	
	//echo "<pre>"; print_r($_SERVER);echo "</pre>";
	$this->set('mylayout', 'client');

	//echo "<pre>"; print_r($_POST); print_r($_FILES); echo "</pre>";

	$masterDocuments = array();
	$this->load_model('Masterdocument');		
	$masterDocuments = $this->Masterdocument->find();
	$this->set('masterDocuments',$masterDocuments);
	
	//print_r($this->params);
	$sId = $_POST['sId'];
	$sId = $sId - 1;

	$selectedfileName  = $masterDocuments[$sId]->document_filename; //"gmc_certificate";
	//print_r($_POST);print_r($_FILES);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 		 

	// Check if image file is a actual image or fake image
	if(isset($_POST["sId"])) {
 		 
		$useriddir = $_SESSION['locum_id']; // get_current_user_id();
		$target_dir = "verification_counter/";
		$target_dir = $target_dir.$useriddir."/";
		if(!is_dir($target_dir)){

		mkdir($target_dir, 0777);
		chmod($upload_dir, 0777);

		}
		
	 	$target_file = $target_dir . basename($selectedfileName);
	 	$imageFileType = pathinfo($_FILES[$selectedfileName]["name"],PATHINFO_EXTENSION);
		$target_file =	$target_file.'.'.$imageFileType;
		//exit; 

	    if (move_uploaded_file($_FILES[$selectedfileName]["tmp_name"], $target_file)) {
		 
		global $wpdb;
 		$sqldocs = "Select * from wp_locumdocuments where user_id = $useriddir";
		$docdetails = $wpdb->get_results($sqldocs);
 		if($docdetails)
			{
				$sqlUpdate = "update  wp_locumdocuments set $selectedfileName = 1 where user_id = $useriddir ";
				$sqlUpdate = "update  wp_locumdocuments set $selectedfileName = 1 where user_id = $useriddir ";
			}
  		else

			 $sqlUpdate = "INSERT INTO  wp_locumdocuments (user_id,".$selectedfileName.")VALUES(".$useriddir.",1)"; 
 			$wpdb->query($sqlUpdate); 
  		
		$this->flash('success', 'Thanks for  Uploading the file we will approve ASAP.');
 
	    } else {
		$this->flash('error', "Sorry, there was an error uploading your file.");
	    }
		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'uploadmutipledocuments'));
	        $this->redirect($url);		
	 
	}


	}
	
	public function editprofile(){
		$this->isvaliduser();	
		$this->set('mylayout', 'client');
 		$this->load_model('Locum');
 		$user_ID = get_current_user_id();
		$this->set('user_ID',$user_ID); 
		

		if(isset($_POST[data][Locum])){
			// echo "<pre>"; print_r($_POST); echo "</pre>";	
			 
		if (isset($_POST[data][Locum]['it_systems']))
			$_POST[data][Locum]['it_systems'] = implode(",",$_POST[data][Locum]['it_systems']);
		if (isset($_POST[data][Locum]['qualifications']))
			$_POST[data][Locum]['qualifications'] = implode(",",$_POST[data][Locum]['qualifications']);
		if (isset($_POST[data][Locum]['languages_known']))
			$_POST[data][Locum]['languages_known'] = implode(",",$_POST[data][Locum]['languages_known']);

			if( $_POST[data][Locum]['verifiedlocum'] == 2)
			 $_POST[data][Locum]['verifiedlocum'] = 0;
			
			$id = $_POST[data][Locum][id];
		  	$this->Locum->update($id,$_POST[data][Locum]);
			 $this->flash('success', 'Your profile updated succeessfully.');	
		}
		
		$object = $this->Locum->find_by_user_id($user_ID);
 	   	$this->set('Locumobject',$object[0]);
		
		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);

		$this->load_model('howdidyouhear');
		$howdidyouhearlist = $this->howdidyouhear->find();
		$this->set('howdidyouhearlist',$howdidyouhearlist);
			
		$this->load_model('Languagesknown');
		$spokenLanguagesarray = $this->Languagesknown->find();
		$this->set('spokenLanguagesarray',$spokenLanguagesarray);

		$this->load_model('Qualification');
		$qualificationsarray = $this->Qualification->find();
		$this->set('qualificationsarray',$qualificationsarray);

		//qualifications
		// echo "<pre>"; print_r($qualificationsarray); echo "</pre>";
		//echo "<pre>"; print_r($this->Languagesknown); echo "</pre>";
  
		$this->set('howdidyouhearlist',$howdidyouhearlist);	
		
		$companyStatus = array('I operate as a limited company','I do not operate as a limited company');
		$this->set('companyStatus',$companyStatus); 
	
	}

	public function dashboard(){
		$this->isvaliduser();	
		$this->set('mylayout', 'client');
	}

	public function changepassword(){
		 $this->isvaliduser();		
		$this->set('mylayout', 'client');
 		include("wp-includes/pluggable.php");

		if(isset($_POST['saveform'])){

			$current_user = wp_get_current_user();
			$user_id = get_current_user_id();
	 		$old_password = $_POST['old_password'];
			$new_password =  $_POST['new_password1'];
		 	$hash_old_password = $current_user->data->user_pass;
			if(wp_check_password($old_password, $hash_old_password)){
	 			wp_set_password($new_password,$user_id);
				$this->flash('success', 'Your password update with latest password given.');	
			}else{
				$this->flash('error', 'Please enter valid Old password !');	
			}
		}
	}

 	public function applyjob(){

		$this->isvaliduser();	
	 	$this->set('mylayout', 'client');
		$this->load_model('Job');
		$this->load_model('Appliedjob');
		$this->load_model('Jobsession');
		$this->load_model('Locum');
		$job_id = $this->params['id'];
		$locum_id = $_SESSION['locum_id'];
		global $wpdb;

			$sqllocum = "select id, verifiedlocum from wp_locums where id= $locum_id"; 
			$locumdetails = $wpdb->get_results($sqllocum);
			//echo "<pre>"; print_r($locumdetails);
			$this->set('locumdetails',$locumdetails);

 

		$sqlJob = "Select * from wp_jobs where id = $job_id";
		$jobdetails = $wpdb->get_results($sqlJob);
		//echo "<pre>";print_r($jobdetails); echo "</pre>";
 		$this->set('jobdetails',$jobdetails[0]);
		$practicer_id = $jobdetails[0]->user_id;
		$sqlpracticer = "select user_id, practice_code,practicename,firstname,lastname,address,city,state from wp_practices where user_id=$practicer_id";
		$practicerdetails = $wpdb->get_results($sqlpracticer);
 		$this->set('practicerdetails',$practicerdetails[0]);

 
		$jobsessions = $this->Jobsession->find(array('conditions' => array('Jobsession.job_id' =>$job_id)));
		//echo "<pre>"; print_r($jobsessions); echo "</pre>";
		 
		$this->set('jobsessions',$jobsessions);
		
 
		$this->load_model('cgcode');
		$cgcodelist = $this->cgcode->find();
		
		$this->set('cgcodelist',$cgcodelist);

		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);

		$this->load_model('howdidyouhear');
		$howdidyouhearlist = $this->howdidyouhear->find();
		$this->set('howdidyouhearlist',$howdidyouhearlist);
		
		$this->set('job_id',$job_id);
 	  	$user_id = get_current_user_id();
   		if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
		
		$job_id = $_POST['job_id'];
		$_POST['locum_id'] = $locum_id;
		$_POST['practicer_id'] = $practicer_id;
		 
		 $this->Appliedjob->save($_POST);

 			
 		$jobsessions = $_POST['jobsessions']; 
		$hourlyrate = $_POST['hourlyrate'];
		$paytolocum = $_POST['paytolocum'];
		$session_starttime = $_POST['session_starttime'];
		$session_endtime = $_POST['session_endtime'];
	 
		foreach ($jobsessions as $key => $value){

 		 
		     $sql_jobsessions = "INSERT INTO  wp_appliedsessions(locum_id,job_id,practicer_id,jobsession_id,hourlyrate,paytolocum,session_starttime,session_endtime)VALUES($locum_id,$job_id,$practicer_id,$key,$hourlyrate[$key],$paytolocum[$key],'$session_starttime[$key]','$session_starttime[$key]')";
				$wpdb->query($sql_jobsessions);
 			}

			$this->flash('success', 'You have successfully aplied for the job we will get back you soon..'); 		
			$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'myjobs'));
 			 $this->redirect($url);
 				
		}  
	}

	public function myjobs(){

		$this->isvaliduser();	
 		$this->set('mylayout', 'client');
  		
		$locum_id = $_SESSION['locum_id'];
  
		$this->load_model('Appliedjob');
		 
		global $wpdb;

		$params = array(); 
		$params = $this->params;
    		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
  

 		$params['joins'][] =   array('table' =>'wp_appliedsessions',
					     'on' => 'Appliedjob.job_id = appliedsession.job_id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'appliedsession');

		$params['joins'][] =   array('table' =>'wp_practices',
					     'on' => 'Appliedjob.practicer_id = practicer.id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'practicer');

		$params['joins'][] =   array('table' =>'wp_jobs',
					     'on' => 'Appliedjob.job_id = job.id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'job');

   		
  		$params['additional_selects'] = array('Appliedjob.id AS AppliedjobID,appliedsession.session_date,appliedsession.session_starttime',
						   'appliedsession.session_endtime','appliedsession.hourlyrate','appliedsession.paytolocum',
					   		 						'practicer.id','practicer.lastname','practicer.practice_code','practicer.practicename','practicer.email',
					'job.no_of_sessions','job.session_description','job.onejobormultiplesessions','job.required_it_systems','job.parking_facilities');
						
 
 		 $params['conditions'] = array('Appliedjob.locum_id' =>$locum_id);
		 $params['group'] = 'Appliedjob.id';
		$params['per_page'] = '20';

		$collection = $this->Appliedjob->paginate($params);
		//echo "<pre>";print_r($objects); echo "</pre>";
 		$this->set('appliedjoblists', $collection['objects']);
 	 	$this->set_pagination($collection);		
		 

 	}
	
	public function  myinvitejobs(){

		$this->isvaliduser();	

		$this->set('mylayout', 'empty');
		$user_id = get_current_user_id();
		 
		$locum_id = $_SESSION['locum_id'];
 	 
	  		$sqlinvitedjobs="SELECT inivitedjob.*,jobsession.session_starttime,jobsession.session_endtime,jobsession.hourlyrate, Practice.firstname,Practice.lastname FROM wp_invitedjobs inivitedjob 
		JOIN wp_practices Practice ON Practice.id = inivitedjob.practicer_id 
		join wp_jobsessions jobsession ON jobsession.job_id = inivitedjob.job_id 
		WHERE inivitedjob.locum_id = $locum_id";

 
 	global $wpdb;
 	$invitedJobDetails = 	$wpdb->get_results($sqlinvitedjobs);
		$this->set('invitedJobDetails',$invitedJobDetails);

		// echo"<pre>"; print_r($invitedJobDetails); echo "</pre>";
	
 
	
 	}

	public function myapplicationjobs(){

	}

	public function mybookedjobs(){

	}
	
	public function completedjobs(){
	
	}

 
	public function myprofile(){
		
		$this->isvaliduser();	
		global $wpdb;
		$this->set('mylayout', 'client'); 
		$user_id = get_current_user_id();
		$this->set('user_id',$user_id);

 		//$profile_image = get_user_meta($user_id, 'profile_image'); 
		//print_r($profile_image);
		
  		$sqllocum = "Select * from wp_locums where user_id = $user_id  Limit 1";
		$locumdetails = $wpdb->get_results($sqllocum);
   		$this->set('locumdetails',$locumdetails[0]);
		//echo "<pre>";print_r($locumdetails); echo "</pre>";
		$profile_image = $locumdetails[0]->profile_image;
		if (strlen(trim($profile_image)) == 0 )
			$profile_image = 'demouser.png';

 		$this->set('profile_image',$profile_image);

		
		$sqlit  = " select itname from wp_itsystems where id in (".$locumdetails[0]->it_systems.")";
		$itsystemlist =  $wpdb->get_results($sqlit);
		$this->set('itsystemlist',$itsystemlist);
 
		$qualfy = $locumdetails[0]->qualifications;
		$sqlit  = " select * from  wp_qualifications  where id in (".$qualfy.")";
		$qualificationsarray =  $wpdb->get_results($sqlit);
		$this->set('qualificationsarray',$qualificationsarray);
		$langknow =  $locumdetails[0]->languages_known;
		$sqlit  = "Select * from wp_languagesknowns  where id in (".$langknow.")";
		$spokenLanguagesarray =  $wpdb->get_results($sqlit);
	 	$this->set('spokenLanguagesarray',$spokenLanguagesarray);
  		
			
		$companyStatus = array('I operate as a limited company','I do not operate as a limited company');
		$this->set('companyStatus', $companyStatus); 
	}

	
	public function  uploadcrop(){
	
		$this->set('mylayout', 'client');
	
	}

 	public function setyouravailability(){

	}

	public function uploadmutipledocuments(){
		$this->set('mylayout', 'client');

		$this->load_model('Masterdocument');		
		$masterDocuments = $this->Masterdocument->find();
		$this->set('masterDocuments',$masterDocuments);
 
 	}

	public function upgradeyourmembership(){
		$this->set('mylayout', 'client'); 
 	}

	
	public function acceptyourjob(){
		$this->isvaliduser();	

		$this->set('mylayout', 'client'); 


		$this->load_model('Appliedjob');
 		$locum_id =  $_SESSION['locum_id'];

		$appliedjobId = $this->params['id'];
 		$this->set('appliedjobId',$appliedjobId); 
		$params = array(); 
 		$params['joins'][] =   array('table' =>'wp_appliedsessions',
					     'on' => 'Appliedjob.job_id = appliedsession.job_id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'appliedsession');

		$params['joins'][] =   array('table' =>'wp_practices',
					     'on' => 'Appliedjob.practicer_id = practicer.id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'practicer');

		$params['joins'][] =   array('table' =>'wp_jobs',
					     'on' => 'Appliedjob.job_id = job.id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'job');

   		
  		$params['additional_selects'] = array('appliedsession.session_date,appliedsession.session_starttime',
						   'appliedsession.session_endtime','appliedsession.hourlyrate','appliedsession.paytolocum',
					   		 						'practicer.firstname','practicer.lastname','practicer.practice_code','practicer.practicename','practicer.email',
					'job.no_of_sessions','job.session_description','job.onejobormultiplesessions','job.required_it_systems','job.parking_facilities');
						
 
 		$params['conditions'] = array('Appliedjob.id' =>$appliedjobId);
 
 

		$objects = $this->Appliedjob->find($params);
		//echo "<pre>";print_r($objects); echo "</pre>";
 		$this->set('jobdetails', $objects[1]);

 		
	
		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);


		if(isset($_POST['acceptjob'])){
			$acceptjob = $_POST['acceptjob'];

			global $wpdb;

			if($acceptjob == 'acceptjob'){
		 			
		 	 	//locum_accepted = 1  // Accepted this job
				$sqlJoblocum = "Update wp_appliedjobs set locum_accepted = 1   where id = $appliedjobId ";
				$wpdb->query($sqlJoblocum);

				$url = esc_url( home_url( '/' ) );


				if(isset($objects[1])) {		
 					$practicerName = 	$objects[1]->firstname.$objects[1]->lastname;
					$email = $objects[1]->email;

					$message = "Dear $practicerName, <br><br>
					Congratulations, your application succefully accepted by our locums,<br> 
					Please click here to confirm once to know your availablity. <br>
					To know more details please use bellow link  here to continue.. <br><br>
					<a href='"."$url/locum/acceptyourjob/$appliedjobId'>View the Job</a> <br><br>
					Regards, <br>
					Medbid. ";

					//echo $message;
					
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
 
					mail($email,'Congratulations your job accepted by locum for this job',$message,$headers);
					$this->flash('success', 'You have succesfully accepted our practicers job.');
	 				}					
	
			}

			if($acceptjob == 'rejectjob'){
 		  		$sqlJoblocum = "Update  wp_appliedjobs set locum_rejected = 1 WHERE  id = $appliedjobId ";
		 		$wpdb->query($sqlJoblocum);
		  		$this->flash('success', 'Your are rejected practicers job succesfully.');
  			}

			$url = MvcRouter::public_url(array('controller' =>'locums', 'action' => 'myjobs'));
			$this->redirect($url); 
		} 
		  
 	}

	public function applyedjobdetails(){

		$this->isvaliduser();	

		$this->set('mylayout', 'client'); 

		$this->load_model('Appliedjob');
 
		$appliedjobId = $this->params['id'];
 		$this->set('appliedjobId',$appliedjobId); 
		$params = array(); 
 		$params['joins'][] =   array('table' =>'wp_appliedsessions',
					     'on' => 'Appliedjob.job_id = appliedsession.job_id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'appliedsession');

		$params['joins'][] =   array('table' =>'wp_practices',
					     'on' => 'Appliedjob.practicer_id = practicer.id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'practicer');

		$params['joins'][] =   array('table' =>'wp_jobs',
					     'on' => 'Appliedjob.job_id = job.id ',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'job');

   		
  		$params['additional_selects'] = array('appliedsession.session_date,appliedsession.session_starttime',
						   'appliedsession.session_endtime','appliedsession.hourlyrate','appliedsession.paytolocum',
					   		 						'practicer.firstname','practicer.lastname','practicer.practice_code','practicer.practicename','practicer.email',
					'job.no_of_sessions','job.session_description','job.onejobormultiplesessions','job.required_it_systems','job.parking_facilities');
						
 
 		$params['conditions'] = array('Appliedjob.id' =>$appliedjobId);
 
 

		$objects = $this->Appliedjob->find($params);
		//echo "<pre>";print_r($objects); echo "</pre>";
 		$this->set('jobdetails', $objects[0]);

 		
	
		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);


 		  
 	}


	public function viewlocum(){
		  
		$this->set('mylayout', 'client'); 
		$locum_id = $this->params['id'];
	
		$this->load_model('Locum');
		$Locumobject = $this->Locum->find_by_id($locum_id);
		//echo "<pre>"; print_r($Locumobject); echo "</pre>";
 		$this->set('Locumobject',$Locumobject); 
		
		$this->load_model('itsystem');
		$itsystemlist = $this->itsystem->find();
		$this->set('itsystemlist',$itsystemlist);

		$this->load_model('howdidyouhear');
		$howdidyouhearlist = $this->howdidyouhear->find();
		$this->set('howdidyouhearlist',$howdidyouhearlist);
			
		$this->load_model('Languagesknown');
		$spokenLanguagesarray = $this->Languagesknown->find();
		$this->set('spokenLanguagesarray',$spokenLanguagesarray);

		$this->load_model('Qualification');
		$qualificationsarray = $this->Qualification->find();
 		$this->set('qualificationsarray',$qualificationsarray);
		
		

	}

	public function uploadprofileimage(){
		$this->set('mylayout', 'client'); 

	}

	public function upload(){
		$this->set('mylayout', 'empty');

	}
	
	public function crop_script(){
		$this->set('mylayout', 'empty');
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
	
	public function sendlocummail($toEmail,$subject,$message){

		$headers = "";
		$headers .= "MIME-Version: 1.0 \r\n";
		$headers .= "Content-type: text/html; charset=\"UTF-8\" \r\n";
	 	$headers .= "From: My site<noreply@example.com>\r\n";

		$tmplatemessage  = "<div>";
		$tmplatemessage .= '<table width="100%" border="0" bgcolor="#fafafa" style=" border:2px solid #cdcdcd;">';
		$tmplatemessage .= '<tr bgcolor="#62BFE1">';
		$tmplatemessage .= '<td>
		<img src="http://64.37.52.189/~hashtagf/medbid/wp-content/themes/twentyfifteen/images/medbidlogo.png"> </td>';
		$tmplatemessage .= '</tr>';
		$tmplatemessage .= '<tr>';
		$tmplatemessage .= '<td>';
		$tmplatemessage .=  '<p>Hi Name,</p>';
		$tmplatemessage .= '<p>Thanks for registered with us.</p>';
		$tmplatemessage .= '<p>Your Login details as follows.</p>';
		$tmplatemessage .= '<table width="60%" align="center" bgcolor="#cdcdcd" cellpadding="5" cellspacing="1">';
		$tmplatemessage .= '<tr bgcolor="#fff">';
		$tmplatemessage .= '<td><p><strong>Username</strong></p></td>';
		$tmplatemessage .= '<td>username</td>';
		$tmplatemessage .= '</tr>';
		$tmplatemessage .= '<tr bgcolor="#fff">';
		$tmplatemessage .= '<td><p><strong>Password</strong></p></td>';
		$tmplatemessage .= '<td>password</td>';
		$tmplatemessage .= '</tr>';
		$tmplatemessage .= '</table>';
		$tmplatemessage .= '<p>Feel free to ask any queries. email us <a href="mailto:info@docum.co.uk">info@docum.co.uk</a></p>';
		$tmplatemessage .= '<p>Thanks, have a lovely day.</p>';
		$tmplatemessage .= '</td>';
		$tmplatemessage .=  '</tr>';
		$tmplatemessage .= '</table>';
		$tmplatemessage .= '</div>';
		$tmplatemessage .= '</td>';
		$tmplatemessage .= '<td></td>';
		$tmplatemessage .= '</tr>';
		$tmplatemessage .= '</table>';
		$tmplatemessage .= '<table>';
		$tmplatemessage .= '<tr>';
		$tmplatemessage .= '<td></td>';
		$tmplatemessage .= '<td>';
		$tmplatemessage .= '<div>';
		$tmplatemessage .= '<table>';
		$tmplatemessage .= '<tr>';
		$tmplatemessage .= '<td align="center">';
		$tmplatemessage .= '<p>Don\'t like these annoying emails? <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>.';
		$tmplatemessage .= '</p>';
		$tmplatemessage .= '</td>';
		$tmplatemessage .= '</tr>';
		$tmplatemessage .= '</table>';
		$tmplatemessage .= '</div>';
	
		mail($toEmail,$subject,$tmplatemessage,$headers);

	}
	
}

?>
