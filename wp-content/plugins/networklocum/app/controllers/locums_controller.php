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
 				// $this->flash('notice', 'Successfully Saved');
				
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
	
	 	if(!empty($this->params['data']['Locum']['gmc_number'])){
   			  $this->Locum->update($id,$this->params['data']);
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
		
	public function youraccount(){
		$this->set('mylayout', 'client');
 	}

	public function accountdetails(){
		$this->set('mylayout', 'client');
		
		$user_id = get_current_user_id();
		$this->set('user_ID',$user_id); 
		if(isset($_POST[data][Locum][user_id]) ) {
			$this->Locum->update($user_id,$_POST[data][Locum]);
			$this->flash('success', 'Your account details updated succeessfully.');	
		}
		$object = $this->Locum->find_by_user_id($user_id);
		$this->set('locumobj',$object[0]);
		//echo "<pre>";print_r($_POST); echo "</pre>";
		
	
	}

	public function uploaddocuments(){
		
//echo "<pre>"; print_r($_SERVER);echo "</pre>";
		$this->set('mylayout', 'client');
		
		//echo "<pre>"; print_r($_POST); print_r($_FILES); echo "</pre>";
		
	$documentList = array("","mdu","certificate_completion_training","cv","crb_chec","passports_photo","diptheria","poliomyelitis",
"basiclifesupport", "tuberculosis", "safeguarding_children", "my_references", "safeguarding_adults", "current_performers_list", "hepatitis_b", "varicella_chicken", "rubella", "last_appraisal", "immunisation_history", "information_governance_certificates", "righttoworkin_uk", "rcgp_substance_misuse", "mmr", "myterms_conditions","gmc_certificate","tetanus");
		$this->set('documentList',$documentList); 
/*
`certificate_completion_training`, `passports_photo`, `cv`, `crb_chec`, `user_id`, `data[Locumdocument][gmc_certificate]`, `diptheria`, ``, `, `);
*/	
  
 
$lable_array = array("","Medical Indemnity","Certificate of Completion of Training","cv","Criminal Records Bureau Check","Passport's photo page or drivers license","Diptheria","Poliomyelitis","Basic Life Support Certificate","Tuberculosis","Safeguarding Children","My References","Safeguarding Adults","Current Performers List","Hepatitis B","Varicella (Chicken Pox)","Rubella (German Measles)","Information about your last appraisal","Immunisation History","Information Governance Certificates","Right to work in UK","RCGP 1/2 in Substance Misuse","MMR (Mumps Measles Rubella)","My Terms and Conditions","GMC Certificate");
	$this->set('lable_array',$lable_array);
	
	//print_r($this->params);
	$sId = $_POST['sId'];
	$selectedfileName  = $documentList[$sId]; //"gmc_certificate";

echo	$useriddir =  get_current_user_id();
	
	
	$target_dir = "upload_documents/";
 	$target_dir = $target_dir.$useriddir."/";
 	if(!is_dir($target_dir)){
 		mkdir($target_dir, 777);
		chmod($upload_dir, 777);
	}


		
	$target_file = $target_dir . basename($selectedfileName);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {

	    $check = getimagesize($_FILES[$selectedfileName]["tmp_name"]);
	    if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	    } else {
		echo "File is not an image.";
		$uploadOk = 0;
	    }
		//$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'index'));
	 	//$this->redirect($url);
 	}

	// Check if file already exists
	//if (file_exists($target_file)) {
	 //   echo "Sorry, file already exists.";
	//    $uploadOk = 0;
	//}

	// Check file size
	//if ($_FILES[$selectedfileName]["size"] > 500000) {
	//    echo "Sorry, your file is too large.";
	//    $uploadOk = 0;
	//}
	// Allow certain file formats
	//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	//&& $imageFileType != "gif" ) {
	//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	//    $uploadOk = 0;
	//}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		
	    if (move_uploaded_file($_FILES[$selectedfileName]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		global $wpdb;
 		$sqldocs = "Select * from wp_locumdocuments where user_id = $useriddir";
		$docdetails = $wpdb->get_results($sqldocs);
 		if($docdetails){
			echo 	$sqlUpdate = "update  wp_locumdocuments set $selectedfileName = 1 where user_id = $useriddir ";
			$wpdb->query($sqlUpdate); 
		}
		else
		{
			echo $sqlUpdate = "INSERT INTO  wp_locumdocuments (user_id,".$selectedfileName.")VALUES(".$useriddir.",1)"; 
			$this->flash('success', 'Thanks for  Uploading the file we will aprove as soon as.'.$sqlUpdate);
			$wpdb->query($sqlUpdate); 
 		}
			

	    } else {
		echo "Sorry, there was an error uploading your file.";
	    }
	}

	
 	
	}
	
	public function editprofile(){
	
		$this->set('mylayout', 'client');
 		$this->load_model('Locum');
 		$user_ID = get_current_user_id();
		if(isset($_POST[data][Locum])){
 		 	$this->Locum->update($user_ID,$_POST[data][Locum]);
			 $this->flash('success', 'Your profile updated succeessfully.');	
		}
		
		$this->set('user_ID',$user_ID); 
		$object = $this->Locum->find_by_user_id($user_ID);
 
	   	$this->set('Locumobject',$object[0]);

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

	public function changepassword(){
 
		$this->set('mylayout', 'client');
 		include("wp-includes/pluggable.php");

		if(isset($_POST)){

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
		$this->set('mylayout', 'client');

		$this->set('mylayout', 'client');
		$this->load_model('Job');
		$this->load_model('Jobsession');
		$job_id = $this->params['id'];
		global $wpdb;

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
			
		$practicer_id  = $_POST['practicer_id'];
 		//echo "<pre>"; print_r($_POST);  echo "</pre>";
 			
		$paperwork = $_POST['paperwork'];
		$referrals = $_POST['referrals'];
		$home_visits = $_POST['home_visits'];
		$bloods = $_POST['bloods'];
		$pension_included = $_POST['pension_included'];
		$number_of_patients = $_POST['number_of_patients'];
		$number_of_telephoneconsultations = $_POST['number_of_telephoneconsultations'];
		

	  	$user_id = get_current_user_id();
		//echo "<pre>"; print_r($jobdetails); echo "</pre>";
		if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
		
		 $job_id = $_POST['job_id'];
		 $sql_appjob = "INSERT INTO  wp_appliedjobs(locum_id,practicer_id,job_id,paperwork,referrals,home_visits,bloods,pension_included,number_of_patients,number_of_telephoneconsultations)VALUES($user_id,$practicer_id,$job_id,$paperwork,$referrals,$home_visits,$bloods,$pension_included,$number_of_patients,$number_of_telephoneconsultations)";
		$wpdb->query($sql_appjob);


			
 		$jobsessions = $_POST['jobsessions']; 
		$hourlyrate = $_POST['hourlyrate'];
		$paytolocum = $_POST['paytolocum'];
	 
		foreach ($jobsessions as $key => $value){

 		 
		    $sql_jobsessions = "INSERT INTO  wp_appliedsessions(user_id,job_id,practicer_id,jobsession_id,hourlyrate,paytolocum)VALUES($user_id,$job_id,$practicer_id,$key,$hourlyrate[$key],$paytolocum[$key])";
				$wpdb->query($sql_jobsessions);
 			}
 		
			$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'alljobs'));
 			//$this->redirect($url);
 			$this->flash('success', 'You have successfully aplied for the job we will get back you soon..');	
		}  
	}

	public function myjobs(){

 		$this->set('mylayout', 'client');
		$user_id = get_current_user_id();
 
		$this->load_model('Appliedsession');
		 
		global $wpdb;

  		
		$params = $this->params;

		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['joins'] = array('Practice');
		$params['includes'] = array('Practice');
		$params['conditions'] = array('Appliedsession.user_id' =>$user_id);
  
 		//$params['conditions'] = array('user_id' =>$user_id);
 		$collection = $this->Appliedsession->paginate($params);
		$this->set('appliedjoblists', $collection['objects']);
		$this->set_pagination($collection);

	//echo "<pre>";print_r($collection['objects']); echo "</pre>";

 	}

	public function myprofile(){
		
		$this->set('mylayout', 'client'); 
		$user_id = get_current_user_id();
		$this->set('user_id',$user_id);

		$profile_image = get_user_meta($user_id, 'profile_image'); 
		//print_r($profile_image);
		if ( $profile_image[0] == null )
			$profile_image[0] = 'demouser.png';
	 	
		$this->set('profile_image',$profile_image[0]);
 	}

	
	public function  uploadcrop(){
	
		$this->set('mylayout', 'client');
	
	}

	public function test(){

	}
	
	public function setyouravailability(){

	}

	public function uploadmutipledocuments(){
		$this->set('mylayout', 'client'); 
 	}

	public function upgradeyourmembership(){
		$this->set('mylayout', 'client'); 
 	}
}

?>
