<?php
class JobsController extends MvcPublicController {

 	public function index() {
		$this->isvaliduser();	

		$this->set('mylayout', 'client');	
  	}
 
	public function  publicjobcreate(){
		$this->isvaliduser();	

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

			 $practicerDetails = $this->Practice->find_by_user_id($user_id);
			 $this->set('practicerDetails',$practicerDetails);
 
		if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
		  
		if ( $user_id > 0 ) {

			$_POST['session_date_range']  = $_POST['session_date'][1];
  			$session_description = $_POST['session_description'];
			$no_of_sessions = 1;
			$NHS_Pension_info = 0;			
			

			 $_POST['user_id']  = $practicerDetails[0]->id;
   			 $_POST['postcode'] = $practicerDetails[0]->postcode;
		   	 $_POST['location'] = $practicerDetails[0]->address;
 			 $_POST['city_id']  = $practicerDetails[0]->city;
		 	 $_POST['state_id'] = $practicerDetails[0]->state;
			 $_POST['country']  = $practicerDetails[0]->country;
	
			// $vallatlong = $this->getLatLong($postcode+$address);
   
			//echo "Latitude: ".$vallatlong['lat']."<br>";
			//echo "Longitude: ".$vallatlong['lng']."<br>";
 
 			 $_POST['latitude']   =  $practicerDetails[0]->latitude;  //'51.475306';  //  $vallatlong['lat'];; 
			 $_POST['longitude']  =  $practicerDetails[0]->longitude; //'-0.375766'; // $vallatlong['lng'];
 			
			$_POST['is_public'] = 1;
 			$this->Job->save($_POST);		
 			$job_id = $this->Job->insert_id;
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
	 
		 
  		 $this->flash('success', 'Thanks for posting your job.');
		
		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'mypostedjobs'));
	        $this->redirect($url);


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
		$params['per_page'] = '20';

		//$params['conditions'] = array('is_public' => true);
		$collection = $this->Job->paginate($params);
		$this->set('joblists', $collection['objects']);

		$this->set_pagination($collection);

	///echo "<pre>";print_r($collection['objects']); echo "</pre>";

 		//$this->set('joblists', $Jobdetails);
  	
 	}
	 
	
	function temp() {

		$this->load_model('Job');
		$objects  = $this->Job->find(array('joins' =>  array(  'table' => 'wp_jobsessions',
								  	'on' => 'Job.id = Jobsession.job_id',
								  	'type' => 'LEFT JOIN',
									'alias'=>'Jobsession'
							      	),
						       'additional_selects' => array('Jobsession.session_date,Jobsession.session_starttime', 											'Jobsession.session_endtime','Jobsession.hourlyrate')
						));

 
		//echo "<pre>"; print_r($objects); echo "</pre>";	

		$this->set('mylayout', 'client');
		$postcode='SW13 9HB LONDON';		
		//$vallatlong = $this->getLatLong($postcode);

 	}
	
	function mypostedjobs(){

		$this->isvaliduser();	
		
		$this->set('mylayout', 'client');
  		$this->load_model('Job');
  
		$practicer_id = $_SESSION['practicer_id'];
  		$params = $this->params;
 		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
 		$params['joins'] =  array('table' => 'wp_jobsessions',
					     'on' => 'Job.id = Jobsession.job_id',
			 	  	    'type'=> 'LEFT JOIN',
				  	   'alias'=>'Jobsession');

		$params['additional_selects'] = array('Jobsession.session_date,Jobsession.session_starttime', 							      'Jobsession.session_endtime','Jobsession.hourlyrate');

  		$params['conditions'] = array('Job.user_id' =>$practicer_id);
		$params['order'] = "Job.createddate DESC";
		$params['per_page'] = '20';

 		$collection = $this->Job->paginate($params);
 		$this->set('joblists', $collection['objects']);
		$this->set_pagination($collection);
 
		//echo "<pre>"; print_r($collection); echo "</pre>";	
 		 
	}
	
	public 	function  editjob(){

		$this->isvaliduser();	
 	
		$this->set('mylayout', 'client');
		global $wpdb;
 		$this->load_model('Jobsession');

		$job_id = $this->params['id'];
 
	 	global $wpdb;
 		$this->set('mylayout', 'client');
  		$this->load_model('Job');
 
	 	//echo "<pre>"; print_r($_POST); echo "</pre>";
  
	  	$user_id = get_current_user_id();
 
	if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
			
			
			$job_id = $_POST['job_id'];
 			$session_date_range = $_POST['session_date'][1]; // $_POST['session_date_range'];
			$session_description = $_POST['session_description'];
 			$_POST['session_date_range']  = $_POST['session_date'][1];
			$session_description = $_POST['session_description'];
			$this->Job->update($job_id,$_POST); 
 

			$no_of_sessions = 1;
			$NHS_Pension_info = 0;			
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
		
			
  		 $this->flash('success', 'Your job Updated  successfully');

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
  
		$this->isvaliduser();	

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

		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'mypostedjobs'));
	        $this->redirect($url);

	}

	public function deletejobsession(){
		$this->isvaliduser();	

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
	 
		global $wpdb;	
		$job_id = $this->params['id'];
  	 	$params = $this->params;
  		$params['joins'][] =  array(  'table' => 'wp_jobsessions',
							'on' => 'Job.id = Jobsession.job_id',
							'type' => 'LEFT JOIN',
							'alias'=>'Jobsession'
		 			);

		$params['joins'][] =   array('table' =>'wp_practices',
					     'on' => 'practice.id = Job.user_id',
			 	  	    'type'=> 'JOIN',
				  	   'alias'=>'practice');
   		
  		$params['additional_selects'] = array('Jobsession.session_date,Jobsession.session_starttime', 							'Jobsession.session_endtime','Jobsession.paytolocum','Jobsession.hourlyrate',
						'practice.practicename','practice.practice_code');
 
 		$params['conditions'] =  array('Job.id' =>$job_id);
 
		 
  		$jobdetails = $this->Job->paginate($params);
  		//echo "<pre>"; print_r($jobdetails); echo"</pre>";
		$this->set('jobdetails',$jobdetails['objects']);

		$locum_id = $_SESSION['locum_id'];
		$sqlAppliedjob = "select id from  wp_appliedjobs where locum_id = $locum_id  and job_id = $job_id";
		$rsaplied =  $wpdb->get_results($sqlAppliedjob);
 		if(count($rsaplied)>0) 
			$this->set('appliedjob',1);
		else
			$this->set('appliedjob',0);
		
	
	
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

	public function jobapplications(){
	
		$this->isvaliduser();	


		$this->set('mylayout', 'client');
 		$this->load_model('Appliedjob');
 		$practicer_id =  $_SESSION['practicer_id'];
 
		$params = $this->params;
 		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
 		 
		$params['joins'][] =   array('table' =>'wp_locums',
					     'on' => 'Appliedjob.locum_id = locum.id ',
			 	  	    'type'=> 'LEFT JOIN',
				  	   'alias'=>'locum');
   		
  		$params['additional_selects'] = array('locum.firstname','locum.lastname');
 
 		$params['conditions'] = array('Appliedjob.practicer_id'=>$practicer_id);

		$params['per_page'] = '20';
		$params['order'] = "Appliedjob.applieddate ASC";
 		$collection = $this->Appliedjob->paginate($params);
 		$this->set('appliedjoblists', $collection['objects']);
		// echo "<pre>";print_r($collection); echo "</pre>";

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
	
			 $queryConditionString = " WHERE jobsession.hourlyrate >= ".$phourlyrateArray[0]."
						    AND jobsession.hourlyrate <=".$phourlyrateArray[1];  
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
	 
	  $queryLast = "SELECT job.id, job.postcode,job.location,job.city_id,job.state_id,job.no_of_sessions, jobsession.hourlyrate,jobsession.session_starttime,jobsession.session_endtime FROM wp_jobs AS job JOIN wp_jobsessions AS jobsession ON job.id = jobsession.job_id  $queryConditionString    ORDER BY job.session_date_range, job.state_id, job.city_id, job.latitude, job.longitude ";
 
	global $wpdb;
	$results =  $wpdb->get_results($queryLast);
	//echo "<pre>"; print_r($results); echo "</pre>";
	$this->set('joblists', $results);

 	}

	public function findjob(){
		$this->set('mylayout', 'client');	
		$this->load_model('Job');
 		$params = $this->params;
		$params['page'] = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['order'] = 'Job.createddate DESC';
		$params['includes'] = array('Jobsession');
		$params['joins']  = array(  'table' => 'wp_jobsessions',
					'on' => 'Job.id = Jobsession.job_id',
					'type' => 'LEFT JOIN',
					'alias'=>'Jobsession'
				    );

		$params['additional_selects'] = array('Jobsession.session_date,Jobsession.session_starttime', 
		'Jobsession.session_endtime','Jobsession.hourlyrate');
		
		$params['per_page'] = '20';

		//$params['conditions'] = array('is_public' => true);
		$collection = $this->Job->paginate($params);
	//	echo "<pre>"; print_r($collection); echo "</pre>";

		$this->set('joblists', $collection['objects']);
		$this->set_pagination($collection);
 	}


	function invitelocumsbymail(){
		// send mail to all locums invite with email_sent=0 by cronjob;
	}

	public function getlocums(){
		$this->isvaliduser();	

		$this->set('mylayout', 'empty');
 		global $wpdb;
 		$zipcode = $_POST['zipcode'];
		$sqllocum="SELECT id,firstname,lastname FROM  wp_locums as locum  WHERE postcode like  '$zipcode' ";
		$rslocums = $wpdb->get_results($sqllocum);
		$this->set('listlocums',$rslocums);

	}

	public function invitelocums(){
		$this->isvaliduser();	
  		$job_id = $this->params['id'];
		if(isset($_POST['job_id']))
			$job_id = $_POST['job_id'];

		$this->set('job_id',$job_id);


		//echo "<pre>"; print_r($_POST); echo "</pre>";
 		global $wpdb;
 		$zipcode = $_POST['zipcode'];
		$sqllocum="SELECT id,firstname,lastname FROM  wp_locums as locum  WHERE postcode like  '$zipcode' ";
		$rslocums = $wpdb->get_results($sqllocum);
		$this->set('listlocums',$rslocums);
		$user_id = get_current_user_id();
		$practicer_id = $_SESSION['practicer_id'];
		
		if (isset($_POST['submit'])){
			$locumcheck = $_POST['locumcheck'];
			for($z=0;$z<=count($locumcheck); $z++){
				if($locumcheck[$z]>0){
		 	$sqlinsert="INSERT INTO wp_invitedjobs (job_id,locum_id,practicer_id) values($job_id,$locumcheck[$z],$practicer_id)";
				$wpdb->query($sqlinsert);
 				}
 			}
			  $this->invitelocumsbymail();
			 $this->flash('success', 'We invited successfully all your Locums aswell as  we sent invitation mail also.');
			 $url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'mypostedjobs'));
	     		  $this->redirect($url);

		}

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
