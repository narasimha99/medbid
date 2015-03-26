<?php
class JobsController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');	
  	}

	public function  publicjobcreate(){

		global $wpdb;
 		$this->set('mylayout', 'client');

		$this->load_model('Job');
 	/* echo "<pre>"; print_r($_POST); echo "</pre>";
 							
	 
   		 


		//$_SESSION['post_data'] = $_POST;
		//echo "SESSION Data";
		//echo "<pre>"; print_r($_SESSION); 
	 
		//echo "<pre>"; print_r($_POST); echo "</pre>";
 	
	if(isset($_POST['savejob']) && $_POST['savejob'] == 'savejob' ){
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


			//$session_starttime = mktime($start_Hours_minutes[0],$start_Hours_minutes[1],0,$session_date_array[1],$session_date_array[2],$session_date_array[0]);
 			//echo "<pre>"; print_r($session_date_array);
			
			$start_Hours_minutes[0] = ($start_Hours_minutes[0]=='') ? 0:$start_Hours_minutes[0];
 			$start_Hours_minutes[1] = ($start_Hours_minutes[1]=='') ? 0:$start_Hours_minutes[1];

			$end_Hours_minutes[0] = ($end_Hours_minutes[0]=='') ? 0:$end_Hours_minutes[0];
 			$end_Hours_minutes[1] = ($end_Hours_minutes[1]=='') ? 0:$end_Hours_minutes[1];
 			

		echo	$tmpdt1 = $session_date.' '.$start_Hours_minutes[0].':'.$start_Hours_minutes[1].':0';
		echo	$tmpdt2 = $session_date.' '.$end_Hours_minutes[0].':'.$end_Hours_minutes[1].':0';

			$session_starttime = new DateTime($tmpdt1);
  			$session_endtime = new DateTime($tmpdt2);
 

 
			$diff=$session_endtime->diff($session_starttime);
 		 	
			$hourlyrate = $_POST['hourlyrate'][$x][$y];
  			//print_r($diff);			
			$timediff = $diff->h.':'.$diff->m;
			$paytolocums = $this->getlocumrate($diff->h,$diff->m,$hourlyrate);
			$medbidfee  = ($paytolocums * 15)/100;			

		  echo	$sql_jobsessions = "INSERT INTO wp_jobsessions ( `job_id`, `session_date`, `session_starttime`, `session_endtime`,
				timediff, `Hourlyrate`,paytolocums,medbidfee) VALUES ('1', '$session_date', '$tmpdt1', '$tmpdt2','$timediff',$hourlyrate,$paytolocums,$medbidfee)";
			$wpdb->query($sql_jobsessions);
			
		
			}
			}
			
	
			$user_id = 0;
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
			
			


			 
		echo $sqlJob = "INSERT INTO wp_jobs (`user_id`, `session_date_range`, `session_description`, `no_of_sessions`, `NHS_Pension_info`,  `location`, `postcode`, `latitude`, `longitude`, `city_id`, `state_id`, `onejobormultiplesessions`, `required_it_systems`, `parking_facilities`, `grandtotallocumpay`, `grandmedbidfee`, `estimatedsavingvat`, `vatonmedbidfee`, `pmtotalcost` ) 
			                     VALUES ($user_id, '$session_date_range', '$session_description', $no_of_sessions, '$NHS_Pension_info','$location', '$postcode',$latitude, $longitude, $city_id, $state_id,$onejobormultiplesessions, $required_it_systems, $parking_facilities,  $grandtotallocumpay, $grandmedbidfee, $estimatedsavingvat,$vatonmedbidfee, $pmtotalcost)";
		$wpdb->query($sqlJob);
			



$sqlPractice= "INSERT INTO `networklocum`.`wp_practices` (`id`, `user_id`, `email`, `firstname`, `lastname`, `practicename`, `practice_code`, `pct`, `ccg_id`, `postcode`, `direct_line`, `it_systems`, `parking`, `address`, `city`, `state`, `howdidyouhear`, `aboutusandourpatients`, `locum_pack`, `phone_number`, `mobile_number`, `payment_mode`, `NHS_Pension`, `howoftendoyoupaystaffinvoices`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');";

		$wpdb->query($sqlPractice);

 
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
	*/
		
   	}
 
		
	
 

 


	public function  settimerates(){

	 	$this->set('mylayout', 'empty');
		 
		if (isset($_REQUEST['dateranges']))
		$dateranges = $_REQUEST['dateranges'];
	
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
