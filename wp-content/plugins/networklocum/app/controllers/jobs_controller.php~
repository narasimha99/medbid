<?php
class JobsController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}


	public function getLatLong($zipaddress){

	echo	ini_get('allow_url_fopen');

		echo	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".
urlencode($zipaddress)."&key=AIzaSyCoCb0kR4ShcXJJ9gfoemBatMKvNRzueHc";
	//$url  = "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCJD86bI1Bjvs-iVFKHmM8A0D7CAYz0ylA";
		$result_string = file_get_contents($url);
 
 		$result = json_decode($result_string, true);
		$result1[]=$result['results'][0];
		$result2[]=$result1[0]['geometry'];
		$result3[]=$result2[0]['location'];
		
		 echo "<pre>"; print_r($result); echo "</pre>";

		return $result3[0];
	}
	public function  publicjobcreate(){

		global $wpdb;
 		$this->set('mylayout', 'client');
 
		$this->load_model('Job');
	
		$_SESSION['old_post_data'] = $_POST;

	 	// echo "<pre>"; print_r($_POST); echo "</pre>";
 	  	//echo "SESSION Data";
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
 		//echo "<pre>"; print_r($_POST); echo "</pre>";
 	
		$practice_created=0;
		$user_id = get_current_user_id();
		$this->load_model('Practice');
			 
			 
	if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
		  
		if ( $user_id > 0 ) {

			$session_date_range = $_POST['session_date'][1];
			$session_description = $_POST['session_description'];
			$no_of_sessions = 1;
			$NHS_Pension_info = 0;			
			
			
			//$location = "Hounslow, London";
			
			 $practicerDetails = $this->Practice->find_by_user_id($user_id);
   			 $postcode = $practicerDetails[0]->postcode;
		   	 $address  = $practicerDetails[0]->address;
 			 $city_id  = $practicerDetails[0]->city;
			 $state_id = $practicerDetails[0]->state;
	
			 //$vallatlong = $this->getLnt($postcode+$address);
   
			//echo "Latitude: ".$vallatlong['lat']."<br>";
			//echo "Longitude: ".$vallatlong['lng']."<br>";
 
 			$latitude  = '51.475306'; // $vallatlong['lat']; 
			$longitude = '-0.375766'; // $vallatlong['lng']; 
		
 			$onejobormultiplesessions = $_POST['onejobormultiplesessions'];
			$required_it_systems = $_POST['required_it_systems'];
 			$parking_facilities = $_POST['parking_facilities'];
  			$grandtotallocumpay = $_POST['grandtotallocumpay'];
			$grandmedbidfee = $_POST['grandmedbidfee'];
			$estimatedsavingvat = $_POST['estimatedsavingvat'];
			$vatonmedbidfee = $_POST['vatonmedbidfee'];
			$pmtotalcost = $_POST['pmtotalcost'];
	 		 
			$number_of_patients = $_POST['number_of_patients'];
			$number_of_telephoneconsultations = $_POST['number_of_telephoneconsultations'];
			$paperwork = $_POST['paperwork'];
			$referrals = $_POST['referrals'];
			$home_visits = $_POST['home_visits'];
			$bloods = $_POST['bloods'];
			$pension_included = $_POST['pension_included'];


		  	$sqlJob = "INSERT INTO wp_jobs (`user_id`, `session_date_range`, `session_description`, `no_of_sessions`, `NHS_Pension_info`,  `location`, `postcode`, `latitude`, `longitude`, `city_id`, `state_id`, `onejobormultiplesessions`, `required_it_systems`, `parking_facilities`,number_of_patients,number_of_telephoneconsultations,paperwork,referrals,home_visits,bloods,pension_included) VALUES ($user_id, '$session_date_range', '$session_description', $no_of_sessions, '$NHS_Pension_info','$location', '$postcode',$latitude, $longitude, $city_id, $state_id,$onejobormultiplesessions, $required_it_systems, $parking_facilities,$number_of_patients,$number_of_telephoneconsultations,$paperwork,$referrals,$home_visits,$bloods,$pension_included) ";
 

			$wpdb->query($sqlJob);

			$job_id = $wpdb->insert_id;
 			$count_no_of_sessions = 0;
			$session_date_count_primary = count($_POST['session_date']);
			$session_starttime_secondry = count($_POST['session_starttime']);
			for($x=1;$x<=$session_date_count_primary; $x++ ){
 			for($y=1; $y<=count($_POST['session_starttime'][$x]); $y++){
		
 			//int mktime ( [int $hour ] [, int $minute ] [, int $second ] [, int $month ] [, int $day ] [, int $year ] [, int $is_dst ] )
			$session_date =	$_POST['session_date'][$x];
			$session_date_array = explode('-',$session_date);
			//print_r($session_date);
			
			 $_POST['session_starttime'][$x][$y]  = str_replace("am","", $_POST['session_starttime'][$x][$y]);
			 $_POST['session_starttime'][$x][$y]  = str_replace("pm","", $_POST['session_starttime'][$x][$y]);

		  	 $_POST['session_endtime'][$x][$y]  = str_replace("am","", $_POST['session_endtime'][$x][$y]);
			 $_POST['session_endtime'][$x][$y]  = str_replace("pm","", $_POST['session_endtime'][$x][$y]);




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
			$paytolocum = $_POST['paytolocum'][$x][$y];
			$medbidfee = $_POST['medbidfee'][$x][$y];


  			//print_r($diff);			
			$timediff = $diff->h.':'.$diff->m;
			//$paytolocum = $this->getlocumrate($diff->h,$diff->m,$hourlyrate);
			//$medbidfee  = ($paytolocums * 15)/100;			

		   	$sql_jobsessions = "INSERT INTO wp_jobsessions ( `job_id`, `session_date`, `session_starttime`, `session_endtime`,
				timediff, `hourlyrate`,paytolocum,medbidfee) VALUES ($job_id, '$session_date', '$tmpdt1', '$tmpdt2','$timediff',$hourlyrate,$paytolocum,$medbidfee)";
			$wpdb->query($sql_jobsessions);
			
			$count_no_of_sessions = $count_no_of_sessions + 1;
		
			 } 
			}
		

		$sql_job_update = "Update wp_jobs set no_of_sessions = $count_no_of_sessions where id = $job_id";
		$wpdb->query($sql_job_update);
	 
		 
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
 		 
		if (isset($_SESSION['old_post_data']['session_date_range'])){
			$old_session_date_range = $_SESSION['old_post_data']['session_date_range'];
			$dateranges  =  str_replace($old_session_date_range, "", $dateranges);
	 		if (substr_count($dateranges, ',') == 1 ) 
				$dateranges  =  str_replace("," , "", $dateranges);
		}
		//echo $dateranges;
	
		$this->set('dateranges',$dateranges);

		//print_R($_REQUEST);
		if (!isset($_REQUEST['tablcnt']))
			$_REQUEST['tablcnt']=1;

		$this->set('tablcnt',$_REQUEST['tablcnt']);
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

	
	public function alljobs(){

	 	$this->set('mylayout', 'client');
		$this->load_model('Job');
		 
		global $wpdb;

		//echo $sqlJobs = "SELECT job.location,job. * , b . * FROM `wp_jobs` a, wp_jobsessions b WHERE a.id = b.job_id LIMIT 0 , 30 

		//$Jobdetails = $wpdb->get_results($sqlJobs);
 		
		$params = $this->params;

		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['join_table'] = array('Jobsession');
		$params['include'] = array('Jobsession');
		//$params['conditions'] = array('is_public' => true);
		$collection = $this->Job->paginate($params);
		$this->set('joblists', $collection['objects']);
		$this->set_pagination($collection);

	///echo "<pre>";print_r($collection['objects']); echo "</pre>";

 		//$this->set('joblists', $Jobdetails);
  	
 	}
	 
	
	function temp() {
		$this->set('mylayout', 'client');
		$postcode='SW13 9HB';		
		$vallatlong = $this->getLatLong($postcode);

 	}
	
	function myjobs(){
		$this->set('mylayout', 'client');
 
		$this->load_model('Job');
 
		global $wpdb;

		$user_id = get_current_user_id();
		//echo $sqlJobs = "SELECT job.location * , b . * FROM `wp_jobs` a, wp_jobsessions b WHERE a.id = b.job_id LIMIT 0 , 30 

		//$Jobdetails = $wpdb->get_results($sqlJobs);
 		$user_id = get_current_user_id();

		$params = $this->params;
 		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['join_table'] = array('Jobsession');
		$params['include'] = array('Jobsession');
		$params['conditions'] = array('user_id' =>$user_id);
		$collection = $this->Job->paginate($params);
		$this->set('joblists', $collection['objects']);
		$this->set_pagination($collection);

	///echo "<pre>";print_r($collection['objects']); echo "</pre>";

 		//$this->set('joblists', $Jobdetails);
  	
	}
	
	public 	function  editjob(){
	
		$this->set('mylayout', 'client');
		global $wpdb;
 		$this->load_model('Jobsession');

		$job_id = $this->params['id'];
 
	 	global $wpdb;
 		$this->set('mylayout', 'client');
  		$this->load_model('Job');
 
	 	//echo "<pre>"; print_r($_POST); echo "</pre>";
 	  	//echo "SESSION Data";
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
 		
 	
	  	$user_id = get_current_user_id();
 
	if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
			
			
			$job_id = $_POST['job_id'];
 			$session_date_range = $_POST['session_date'][1]; // $_POST['session_date_range'];
			$session_description = $_POST['session_description'];
			$no_of_sessions = 1;
			$NHS_Pension_info = 0;			
			$location = "Hounslow, London";
			$postcode='SW13 9HB';
	
			$vallatlong = $this->getLatLong($postcode);
			// echo "Latitude: ".$vallatlong['lat']."<br>";
			//echo "Longitude: ".$vallatlong['lng']."<br>";

			$latitude  =  $vallatlong['lat'];  //51.475306'; ';
			$longitude =  $vallatlong['lng']; //'-0.375766';';
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
	 		 

			$number_of_patients = $_POST['number_of_patients'];
			$number_of_telephoneconsultations = $_POST['number_of_telephoneconsultations'];
			$paperwork = $_POST['paperwork'];
			$referrals = $_POST['referrals'];
			$home_visits = $_POST['home_visits'];
			$bloods = $_POST['bloods'];
			$pension_included = $_POST['pension_included'];



			$sqlJob = "Update  wp_jobs set  session_date_range = '$session_date_range', session_description = '$session_description', no_of_sessions = $no_of_sessions, NHS_Pension_info = '$NHS_Pension_info',  location = '$location', postcode = '$postcode', latitude = $latitude, longitude = $longitude, city_id = $city_id, state_id = $state_id, onejobormultiplesessions =$onejobormultiplesessions , required_it_systems = $required_it_systems, parking_facilities = $parking_facilities,number_of_patients='$number_of_patients',number_of_telephoneconsultations ='$number_of_telephoneconsultations', paperwork = $paperwork,referrals=$referrals, home_visits=$home_visits, bloods = $bloods, pension_included = $pension_included where id= $job_id ";
			//echo $sqlJob;
			$wpdb->query($sqlJob);
  			$count_no_of_sessions = 0;
			$session_date_count_primary = count($_POST['session_date']);
			$session_starttime_secondry = count($_POST['session_starttime']);
			for($x=1;$x<=$session_date_count_primary; $x++ ){
 			for($y=1; $y<=count($_POST['session_starttime'][$x]); $y++){
		
 			//int mktime ( [int $hour ] [, int $minute ] [, int $second ] [, int $month ] [, int $day ] [, int $year ] [, int $is_dst ] )
			$session_date =	$_POST['session_date'][$x];
			$session_date_array = explode('-',$session_date);
			//print_r($session_date);
			
			 $_POST['session_starttime'][$x][$y]  = str_replace("am","", $_POST['session_starttime'][$x][$y]);
			 $_POST['session_starttime'][$x][$y]  = str_replace("pm","", $_POST['session_starttime'][$x][$y]);

		  	 $_POST['session_endtime'][$x][$y]  = str_replace("am","", $_POST['session_endtime'][$x][$y]);
			 $_POST['session_endtime'][$x][$y]  = str_replace("pm","", $_POST['session_endtime'][$x][$y]);
 
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
 
			$hourlyrate = $_POST['hourlyrate'][$x][$y];
			$paytolocum = $_POST['paytolocum'][$x][$y];
			$medbidfee = $_POST['medbidfee'][$x][$y];
			$jobsession_id = $_POST['jobsession_id'][$y-1];
			 
  			//$paytolocums = $this->getlocumrate($diff->h,$diff->m,$hourlyrate);
			//$medbidfee  = ($paytolocums * 15)/100;			
			//echo "<pre>"; print_r($_POST);  echo "</pre>";
			if ($jobsession_id>0)
		     	$sql_jobsessions = "Update wp_jobsessions set session_date ='$session_date' , session_starttime = '$tmpdt1', session_endtime ='$tmpdt2',timediff='$timediff',hourlyrate = '$hourlyrate',paytolocum =$paytolocum,medbidfee=$medbidfee Where job_id=$job_id and id=$jobsession_id";
		 
		 	else 
 		   	  $sql_jobsessions = "INSERT INTO wp_jobsessions ( `job_id`, `session_date`, `session_starttime`, `session_endtime`,
				timediff, `hourlyrate`,paytolocum,medbidfee)
				 VALUES ($job_id, '$session_date', '$tmpdt1', '$tmpdt2','$timediff',$hourlyrate,$paytolocum,$medbidfee)";

				$wpdb->query($sql_jobsessions);
			
			 	
			$count_no_of_sessions = $count_no_of_sessions + 1;
		
			 } 
						
			
    
			}
		

		$sql_job_update = "Update wp_jobs set no_of_sessions = $count_no_of_sessions where id = $job_id";
		$wpdb->query($sql_job_update);
		
			
  		 $this->flash('success', 'Thanks for Updating job, your job will visible after admin approved');

			  // Email the user
 		unset($_POST['savejob']);
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
		
		$this->set('job_id',$job_id);


		$sqlJob = "Select * from wp_jobs where id = $job_id";
		$jobdetails = $wpdb->get_results($sqlJob);
 		$this->set('jobdetails',$jobdetails[0]);
		//echo "<pre>"; print_r($jobdetails); echo "</pre>";

		$jobsessions = $this->Jobsession->find(array('conditions' => array('Jobsession.job_id' =>$job_id)));
		//echo "<pre>"; print_r($jobsessions); echo "</pre>";
		 
		$this->set('jobsessions',$jobsessions);
 	
	
 	}
	
	public  function deletejob(){
  
		$this->set('mylayout', 'client');
 		$this->load_model('Jobsession');
		$job_id = $this->params['id'];
	 	$this->load_model('Job');
		$this->load_model('Jobsession');

		$this->Job->delete($job_id);
 		$sql_jobsessions = "Delete from wp_jobsessions Where  job_id=$job_id";
	
		global $wpdb;
		$wpdb->query($sql_jobsessions);
       		$this->flash('notice', 'Successfully deleted');

		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'myjobs'));
	        $this->redirect($url);

	}

	public function deletejobsession(){
		$this->set('mylayout', 'client');
		$jobsession_id = $this->params['id'];
		$sql_jobsessions = "Delete from wp_jobsessions Where  id=$jobsession_id";
	
		global $wpdb;
		$wpdb->query($sql_jobsessions);
       		$this->flash('notice', 'Successfully jobsession deleted');
		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'editjob'));
	        $this->redirect($url);
	}	
		
	public function viewjob(){
		$this->set('mylayout', 'client');
		$this->load_model('Job');
		$this->load_model('Jobsession');
		$job_id = $this->params['id'];
		global $wpdb;

		$sqlJob = "Select * from wp_jobs where id = $job_id";
		$jobdetails = $wpdb->get_results($sqlJob);
 		$this->set('jobdetails',$jobdetails[0]);

		$jobsessions = $this->Jobsession->find(array('conditions' => array('Jobsession.job_id' =>$job_id)));
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
	}

	public function postedjobs(){

		$this->set('mylayout', 'client');
			 
	 	$user_id = get_current_user_id();
 
		$this->load_model('Appliedsession');
 
		$user_id = get_current_user_id();

		$params = $this->params;
 		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['joins'] = array('Locum');
		$params['includes'] = array('Locum');
 		$params['conditions'] = array('practicer_id' =>$user_id);
  		 
 
		$collection = $this->Appliedsession->paginate($params);
		//echo "<pre>"; print_r($collection); echo "</pre>";
		//print_r($this->Appliedsession);
		$this->set('appliedjoblists', $collection['objects']); 
 		$this->set_pagination($collection);
 		//echo "<pre>"; print_r($objects); echo "</pre>";
		//$this->set('appliedjoblists', objects);
		$this->set_pagination($collection);

		$this->load_model("Appliedjob");
		$objects = $this->Appliedjob->find(array('conditions' => array('Appliedjob.practicer_id'=>$user_id )));
		$dataarryjobs = array();		
		foreach($objects as $object){
			$dataarryjobs[$object->job_id]  = $object;
		} 
	   	//echo "<pre>";print_r($dataarryjobs); echo "</pre>";
		
		$this->set('jobobjects', $dataarryjobs);
 	}
	
	public function applyedjobdetails(){
		

	}

	
	public function getjobs(){

		$this->set('mylayout', 'empty');	
 		 
		
		//echo "<pre>";	print_r($_POST); echo "</pre>";
	
		//echo $condStr;
		$zipcoderesults = 0;
 
		global $wpdb;	
 		$fquery="SELECT * FROM wp_jobs WHERE postcode = '$_POST[zipcode]'";
     		$rs =  $wpdb->get_results($fquery);
 		if(count($rs)>0) {		
		// echo "<pre>";print_r($rs); echo "</pre>"; 
            
                    //if found, set variables
                    $row =  $rs[0];
                    $lat1 = $row->latitude;
                    $lon1 = $row->longitude;
                    $d = $_POST['distance'];
                    //earth's radius in miles
                    $r = 3959;
 
                    //compute max and min latitudes / longitudes for search square
                    $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
                    $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
                    $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
                    $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
 
                    //display information about starting point
                    //provide max and min latitudes / longitudes
		 
 
                    //find all coordinates within the search square's area
	
		 $zipConditions =  " AND (job.latitude <= $latN AND job.latitude >= $latS AND job.longitude <= $lonE
				 AND job.longitude >= $lonW) AND (job.latitude != $lat1 AND job.longitude != $lon1) AND job.city_id != ''";
			$zipcoderesults=1;
  
            	}
      
   

		$queryConditionString = "";
	

		if (isset($_POST['hourlyrate'])){
			//echo 'hourlyrate ';

 			$phourlyrate = str_replace("£"," ",$_POST['hourlyrate']);
			$phourlyrate = trim($phourlyrate); 
			$phourlyrateArray = explode('-',$phourlyrate);
	
			 $queryConditionString = " WHERE jobsession.hourlyrate >= ".$phourlyrateArray[0] . " AND jobsession.hourlyrate <=".$phourlyrateArray[1];  
 		}
 
		if (isset($_POST['tariff'])){
			//echo ' tariff ';
  		 	 $queryConditionString .= " AND job.onejobormultiplesessions = ".$_POST['tariff'];
 		}

 
		$datepicker=0;
		$condStr="";
		if(strlen(trim($_POST['dateranges']))>0)
		$dateranges = explode(",",$_POST['dateranges']);
		else
		$dateranges = array();

		//print_r($dateranges);
		//echo count($dateranges);
		if(count($dateranges)>0){ 
			$condStr = " AND ( ";
	 		for($i=0;$i<count($dateranges)-1;$i++){
	 		 	$condStr = $condStr . "  DATE(job.session_date_range) = '$dateranges[$i]' ";
				$condStr = $condStr . " OR ";
 			}
			$condStr = $condStr . "  DATE(job.session_date_range) = '$dateranges[$i]' ";
			$datepicker=1;
			$condStr = $condStr. " ) ";
		}
		 
		
		if ( $zipcoderesults == 1  && $datepicker == 1 ){
		   $queryConditionString.=  $condStr . $zipConditions;
 		 //  echo  "zipcodes  and dates ";
 		} else if ( $datepicker == 1 && $zipcoderesults == 0 )  {
			//echo "date picker = 1";
			$queryConditionString .=  $condStr;
		} else if ( $zipcoderesults == 1  && $datepicker == 0 ){
			$queryConditionString .=   $zipConditions;
			//echo  "zipcodes ";
		}
		
		


       $queryLast = "SELECT job.postcode,job.location,job.city_id,job.state_id,job.no_of_sessions, jobsession.hourlyrate,jobsession.session_starttime,jobsession.session_endtime FROM wp_jobs AS job JOIN wp_jobsessions AS jobsession ON job.id = jobsession.job_id  $queryConditionString    ORDER BY job.session_date_range, job.state_id, job.city_id, job.latitude, job.longitude ";
 
	global $wpdb;
	$results =  $wpdb->get_results($queryLast);
	//echo "<pre>"; print_r($results); echo "</pre>";
	$this->set('joblists', $results);

 	}

	public function findjob(){


 		$this->load_model('Job');
		
		global $wpdb;

   
		//$_POST[zipcode]='35042';
		//echo "<pre>";
		$this->load_model('Job');
		$this->load_model('Jobsession');
		//echo "<pre>"; print_r($this->Jobsession); echo "</pre>";
		//print_r($_POST);

		//if(isset($_POST['submit'])) {
		$datepicker=0;
		$condStr="";
		$dateranges = explode(",",$_POST['dateranges']);
		//print_r($dateranges);
		//echo count($dateranges);
 	
		for($i=0;$i<count($dateranges);$i++){
 		 	$condStr = $condStr . "  DATE( createddate ) = '$dateranges[$i]' or ";
			$datepicker=1;
		}
	 	$condStr= $condStr . "  1 = 1  ";

		//echo $condStr;
		$zipcoderesults = 0;
				  
		//echo "</pre>";
		global $wpdb;	
 		$fquery="SELECT * FROM wp_jobs WHERE postcode = '$_POST[zipcode]'";
     		$rs =  $wpdb->get_results($fquery);
		if(count($rs)>0) {		
		   //echo "<pre>";print_r($rs); echo "</pre>"; 
            
                    //if found, set variables
                    $row =  $rs[0];
                    $lat1 = $row->latitude;
                    $lon1 = $row->longitude;
                    $d = $_POST['distance'];
                    //earth's radius in miles
                    $r = 3959;
 
                    //compute max and min latitudes / longitudes for search square
                    $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
                    $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
                    $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
                    $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
 
                    //display information about starting point
                    //provide max and min latitudes / longitudes
		 
 
                    //find all coordinates within the search square's area
                    //exclude the starting point and any empty city_id values
                    

		$this->load_model('Job');
		 
		global $wpdb;

		//echo $sqlJobs = "SELECT job.location,job. * , b . * FROM `wp_jobs` a, wp_jobsessions b WHERE a.id = b.job_id LIMIT 0 , 30 

		//$Jobdetails = $wpdb->get_results($sqlJobs);
 		
		$params = $this->params;

		//$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['joins'] = array('Jobsession');
		$params['includes'] = array('Jobsession');
	  
		if ( $zipcoderesults == 1 ){
		$params['conditions'] = "(Job.latitude <= $latN AND Job.latitude >= $latS AND Job.longitude <= $lonE AND Job.longitude >= $lonW) AND (Job.latitude != $lat1 AND Job.longitude != $lon1) AND Job.city_id != ''";
		}
		 
		if ( $datepicker == 1 )  {
			$params['conditions'] = $condStr;
		}
	
		

		$collection = $this->Job->find($params);
		$this->set('joblists', $collection);
		//$this->set_pagination($collection);
		echo "<pre>";	print_r($collection); echo "</pre>"; 

       
    		              //output all matches to screen
		}
		else {
		 	
 

			$params = $this->params;
			$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
			$params['order'] = 'Job.createddate DESC';
			// $params['conditions']  = 'Jobsession.hourlyrate=123';
			$params['includes'] = array('Jobsession');
			$params['join_table'] = array('Jobsession');


			//'selects' => array('Venue.id');

			//$params['conditions'] = array('is_public' => true);
			$collection = $this->Job->paginate($params);
			//echo "<pre>"; print_r($collection); echo "</pre>";

			$this->set('joblists', $collection['objects']);
			$this->set_pagination($collection);
		 
		}  
	}

	public function invitelocums(){

		$job_id = $this->params['id'];
		if(isset($_POST['job_id']))
			$job_id = $_POST['job_id'];

		$this->set('job_id',$job_id);


		//echo "<pre>"; print_r($_POST); echo "</pre>";
 		global $wpdb;
 		$zipcode = $_POST['zipcode'];
		$sqllocum="SELECT id,user_id, firstname,lastname FROM  wp_locums as locum  WHERE postcode like  '$zipcode' ";
		$rslocums = $wpdb->get_results($sqllocum);
		$this->set('listlocums',$rslocums);


		/*
 		if ( isset($zipcode) ){
 			
 	 		echo $fquery="SELECT * FROM  wp_locums as locum  WHERE postcode like  '$zipcode' ";
	     		$rs =  $wpdb->get_results($fquery);
			if(count($rs)>0) {

			    //if found, set variables
		            $row =  $rs[0];
		            $lat1 = $row->latitude;
		            $lon1 = $row->longitude;
		            $d = $_POST['distance'];
		            //earth's radius in miles
		            $r = 3959;
	  		   //compute max and min latitudes / longitudes for search square
		            $latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
		            $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
		            $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
		            $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
	 
 			 	  $paramsconditions = "(locum.latitude <= $latN AND locum.latitude >= $latS AND locum.longitude <= $lonE AND locum.longitude >= $lonW) AND (locum.latitude != $lat1 AND locum.longitude != $lon1) AND locum.city != ''";
			echo  $sqllocum = "Select id,user_id,firstname,lastname from wp_locums as locum where $paramsconditions";
			*/
			// }

		 //  }
 	
	}
	
	
}
?>
