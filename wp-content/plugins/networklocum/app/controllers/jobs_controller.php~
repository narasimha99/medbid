<?php
class JobsController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}

	public function  publicjobcreate(){

		global $wpdb;
 		$this->set('mylayout', 'client');
 
		$this->load_model('Job');
	
		$_SESSION['old_post_data'] = $_POST;

 		//echo "<pre>"; print_r($_POST); echo "</pre>";
 	  	//echo "SESSION Data";
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
 		//echo "<pre>"; print_r($_POST); echo "</pre>";
 	
		$practice_created=0;
		$user_id = get_current_user_id();

	if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
		
		
		
		if(isset($_POST['practice_code']) && $user_id == 0){

			
			 // Generate the password and create the user
			 $mpassword =  wp_generate_password( 12, false );
	 		 $email_address = $_POST['email'];
			 $firstname = $_POST['firstname'];
			 $lastname = $_POST['lastname'];
			 $practicename = $_POST['practicename'];
			 $practice_code = $_POST['practice_code'];
	 		 $it_systems =  $_POST['required_it_systems'];
		 	 $parking = $_POST['parking_facilities'];
			 //$postcode = $_POST['postcode'];
			 $email = $_POST['email'];
			 $phone_number = $_POST['phone_number'];

			if(email_exists($email_address)) {
	 		 	echo "<script> alert('Practice email already used please choose another email to continue!'); </script>";
			}else {
		
			  $user_id = wp_create_user( $email_address, $mpassword, $email_address );
 			  wp_update_user(array('ID'          =>    $user_id,
					      'nickname'     =>    $email_address,
					      'first_name'   =>    $firstname,
					      'last_name'    =>    $lastname));

			  // Set the role
			  $user = new WP_User($user_id);
			  $user->set_role('practicer');
			 
		 $sqlPractice = "INSERT INTO `wp_practices` (`id`, `user_id`, `email`, `firstname`, `lastname`, `practicename`,`practice_code`, `it_systems`, `parking`,`phone_number`) VALUES (NULL, $user_id,'$email', '$firstname', '$lastname', '$practicename', '$practice_code', $it_systems, $parking, '$phone_number')";
		
		//	echo $sqlPractice;
		$wpdb->query($sqlPractice);
			  wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $mpassword);
	
			$practice_created=1;
		}
 		}

		if ( $practice_created == 1 || $user_id > 0 ) {

			$session_date_range = $_POST['session_date_range'];
			$session_description = $_POST['session_description'];
			$no_of_sessions = 1;
			$NHS_Pension_info = 0;			
			$location = "Hounslow, London";
			$postcode='SW13 9HB';
			$latitude ='51.475306';
			$longitude ='-0.375766';
			$city_id = 0;
			$state_id= 0;
 			$onejobormultiplesessions = $_POST['onejobormultiplesessions'];
			$required_it_systems = $_POST['required_it_systems'];
 			$parking_facilities = $_POST['parking_facilities'];
  			$grandtotallocumpay = $_POST['grandtotallocumpay'];
			$grandmedbidfee = $_POST['grandmedbidfee'];
			$estimatedsavingvat = $_POST['estimatedsavingvat'];
			$vatonmedbidfee = $_POST['vatonmedbidfee'];
			$pmtotalcost = $_POST['pmtotalcost'];
	 		 
  $sqlJob = "INSERT INTO wp_jobs (`user_id`, `session_date_range`, `session_description`, `no_of_sessions`, `NHS_Pension_info`,  `location`, `postcode`, `latitude`, `longitude`, `city_id`, `state_id`, `onejobormultiplesessions`, `required_it_systems`, `parking_facilities`, `grandtotallocumpay`, `grandmedbidfee`, `estimatedsavingvat`, `vatonmedbidfee`, `pmtotalcost` ) VALUES ($user_id, '$session_date_range', '$session_description', $no_of_sessions, '$NHS_Pension_info','$location', '$postcode',$latitude, $longitude, $city_id, $state_id,$onejobormultiplesessions, $required_it_systems, $parking_facilities,  $grandtotallocumpay, $grandmedbidfee, $estimatedsavingvat,$vatonmedbidfee, $pmtotalcost)";
		$wpdb->query($sqlJob);
		
		
			$session_date_count_primary = count($_POST['session_date']);
			$session_starttime_secondry = count($_POST['session_starttime']);
			for($x=1;$x<=$session_date_count_primary; $x++ ){
			for($y=1; $y<=count($_POST['session_starttime'][$x]); $y++){
		
 			//int mktime ( [int $hour ] [, int $minute ] [, int $second ] [, int $month ] [, int $day ] [, int $year ] [, int $is_dst ] )
			$session_date =	$_POST['session_date'][$x];
			$session_date_array = explode('-',$session_date);
			//print_r($session_date);
			$start_Hours_minutes = explode(':',$_POST['session_starttime'][$x][$y]);
			$end_Hours_minutes = explode(':',$_POST['session_endtime'][$x][$y]);
  
			$start_Hours_minutes[0] = ($start_Hours_minutes[0]=='') ? 0:$start_Hours_minutes[0];
 			$start_Hours_minutes[1] = ($start_Hours_minutes[1]=='') ? 0:$start_Hours_minutes[1];

			$end_Hours_minutes[0] = ($end_Hours_minutes[0]=='') ? 0:$end_Hours_minutes[0];
 			$end_Hours_minutes[1] = ($end_Hours_minutes[1]=='') ? 0:$end_Hours_minutes[1];
 			

			$tmpdt1 = $session_date.' '.$start_Hours_minutes[0].':'.$start_Hours_minutes[1].':0';
			$tmpdt2 = $session_date.' '.$end_Hours_minutes[0].':'.$end_Hours_minutes[1].':0';

			$session_starttime = new DateTime($tmpdt1);
  			$session_endtime = new DateTime($tmpdt2);
 
 			$diff=$session_endtime->diff($session_starttime);
 		 	
			$hourlyrate = $_POST['hourlyrate'][$x][$y];
  			//print_r($diff);			
			$timediff = $diff->h.':'.$diff->m;
			$paytolocums = $this->getlocumrate($diff->h,$diff->m,$hourlyrate);
			$medbidfee  = ($paytolocums * 15)/100;			

		   	$sql_jobsessions = "INSERT INTO wp_jobsessions ( `job_id`, `session_date`, `session_starttime`, `session_endtime`,
				timediff, `Hourlyrate`,paytolocums,medbidfee) VALUES ('1', '$session_date', '$tmpdt1', '$tmpdt2','$timediff',$hourlyrate,$paytolocums,$medbidfee)";
			$wpdb->query($sql_jobsessions);
			
		
			}
			}
			
  		 $this->flash('success', 'Thanks for posting job, your job will visible after admin approved');

			  // Email the user
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
 
		
	
 

 


	public function  settimerates(){

	 	$this->set('mylayout', 'empty');
 		 
		if (isset($_REQUEST['dateranges']))
		$dateranges = $_REQUEST['dateranges'];
 		 
		if (isset($_SESSION['post_data']['session_date_range'])){
			$old_session_date_range = $_SESSION['old_post_data']['session_date_range'];
			$dateranges  =  str_replace($old_session_date_range, "", $dateranges);
	 		if (substr_count($dateranges, ',') == 1 ) 
				$dateranges  =  str_replace("," , "", $dateranges);
		}
		//echo $dateranges;
	
		$this->set('dateranges',$dateranges);
   	}



	public function getlocumrate($HH,$MM,$hourlyrate){

		$locumrate=0;
			//CALculate rate 
			if($hourlyrate>0){
			 
			  if ( $HH>0 )
			   	 $locumrate = $hourlyrate * $HH;
		
			  if ( $MM>0 ){
 				if ( $MM<=25){
	 				 $locumrate = $locumrate + ( ($hourlyrate/4) * $MM);
				 } else if ($MM<=50){
 					 $locumrate = $locumrate + ( ($hourlyrate/2) * $MM);
				 }
			 }

			}		
					 
		    return $locumrate;

}
	
}

?>
