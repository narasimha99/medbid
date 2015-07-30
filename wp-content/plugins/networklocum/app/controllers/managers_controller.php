<?php
class ManagersController extends MvcPublicController {

 	public function index() {
		$this->set('mylayout', 'client');
   	}

	public function  manageitsystems(){

 		$this->set('mylayout', 'client');
		
		global $wpdb;	
		//echo "<pre>";		print_r($this->params); echo "</pre>";

		$this->load_model('itsystem');
 		if(isset($this->params['data']['itsystem'])){
	  		  $this->itsystem->save($this->params['data']['itsystem']);
			  $this->flash('success', 'Successfully Saved');
		}
	
 
		$id = $this->params['id'];
		$sql = "select id,itname From wp_itsystems where id=$id";
		$edititsystem=$wpdb->get_results($sql);
		$this->set('edititsystem',$edititsystem['0']);
 		
		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Itsystem.*');
	 	 
		$collection = $this->itsystem->paginate($params);
		 
		$this->set('itsystemlist', $collection['objects']);
		$this->set_pagination($collection);
	 		  
 	}



	public function  managecgcodes(){

 		$this->set('mylayout', 'client');
		
		global $wpdb;	
		$this->load_model('cgcode');
 		if(isset($this->params['data']['cgcode']['ccg_name'])){
	  		  $this->cgcode->save($this->params['data']['cgcode'])				;
			  $this->flash('success', 'Successfully Saved');
		}
	
		$id = $this->params['id'];
	  	$sql = "select id,ccg_name From wp_cgcodes where id=$id";
		$editccgcode=$wpdb->get_results($sql);
		//echo "<pre>";print_r($editccgcode);
		$this->set('editccgcode',$editccgcode['0']);

 		
		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Cgcode.*');
  		$this->load_model('cgcode');
		$cgcodelist = $this->cgcode->find();
 		//$this->set('cgcodelist',$cgcodelist);
	 
		$collection = $this->cgcode->paginate($params);
  		$this->set('ccgcodelist', $collection['objects']);
 		$this->set_pagination($collection);
 
 	}
 	

	public function  manageuploadfiles(){

 		$this->set('mylayout', 'client');

		$this->load_model('Masterdocument');		
		$masterDocuments = $this->Masterdocument->find();
		$this->set('masterDocuments',$masterDocuments);
  
 		$this->load_model('Locumdocument');
	  	$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
 		$params['includes']       = array('Locum');
		$params['joins'] = array('Locum');
  		$params['additional_selects'] = array('Locum.firstname','Locum.lastname');
		$collection = $this->Locumdocument->paginate($params);
  		$this->set('Locumdocuments', $collection['objects']);
		//echo "<pre>"; print_r($collection); echo "</pre>";
 		$this->set_pagination($collection);
 
 	}
	public function checkemail(){

		$this->set('mylayout', 'empty');	
		global $wpdb;
		$email_address = $_POST['email'];
		if(email_exists($email_address)) {
	  		$this->flash('error', '     Email already used please choose another email to continue!');
		}

	}

	public function locums(){
	
		$this->set('mylayout', 'client');

		$this->load_model('Locum');
 		if(isset($_POST['submit'])){
	  		  $this->cgcode->save($_POST);
			  $this->flash('success', 'Successfully Saved');
		}
		
  		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('locums.*');
 
		$this->load_model('locum');
		$locumlist = $this->locum->find();
		//echo "<pre>"; 		print_r($locumlist);
 		$this->set('locumlist',$locumlist);
 
	}

	public function practices(){
	
		$this->set('mylayout', 'client');

		$this->load_model('Practice');
 		if(isset($_POST['submit'])){
	  		  $this->cgcode->save($_POST);
			  $this->flash('success', 'Successfully Saved');
		}
	
  		$params               = $this->params;
		$params['page']       = empty($this->params['page']) ? 1 : $this->params['page'];
		$params['selects']    = array('Practice.*');
 
		$this->load_model('Practice');
		$practiceslist = $this->Practice->find();
 		$this->set('practiceslist',$practiceslist);
 
	}

 	public function verifydocuments(){

		$this->set('mylayout', 'client');
		
		$this->load_model('Masterdocument');		
		$masterDocuments = $this->Masterdocument->find();
		$this->set('masterDocuments',$masterDocuments);
		
		$locum_id = $this->params['id'];
		$this->set('locum_id',$locum_id);	
		$this->load_model('Locumdocument');

		$sql= "SELECT `Locumdocument`.*, Locum.firstname, Locum.lastname FROM `wp_locumdocuments` `Locumdocument` JOIN wp_locums Locum ON Locum.id = Locumdocument.user_id WHERE Locumdocument.user_id IN ($locum_id)  ";
		global $wpdb;	
		$locumDocuments = $wpdb->get_results($sql);
		//echo "<pre>"; print_r($locumDocuments); echo "</pre>";exit;
		$this->set('locumDocuments',$locumDocuments);


		$this->load_model('Locumfile');
		$locumFiles = $this->Locumfile->find_by_user_id($locum_id);
		//echo "<pre>"; print_r($locumFiles); echo "</pre>";
		$this->set('locumFiles',$locumFiles[0]);
				
		
		if (isset($_POST['documentstatus'])){
		$documentStatus = $_POST['documentstatus'];
		//accept -  2
		//Reject - 3
			
		foreach($documentStatus as  $key=>$val){
		
			$selectedfileName  = $masterDocuments[$key-1]->document_filename;
			$sqlUpdate = "update  wp_locumdocuments set $selectedfileName = $val where user_id = $locum_id ";
			$wpdb->query($sqlUpdate); 
 		}
		
		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'manageuploadfiles'));
	        $this->redirect($url);			
				
		}
 	
	
 	}

	public function verifylocums(){

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
		//echo "<pre>";print_r($_POST);echo"</pre>";
		if(isset($_POST['verifiedlocum'])){
			
			$locum_id = $_POST['id']; 
			$verifiedlocum = $_POST['verifiedlocum'];
			$this->Locum->update($locum_id,$_POST);

			$locumName = $Locumobject->firstname.' '.$Locumobject->lastname;
			$locumemail = $Locumobject->email;
			$url = esc_url(home_url('/'));
			
			 
			if( $verifiedlocum == 1 ){
				$message  ="<tr><td>";
 				$message .= "Dear $locumName, <br><br>
				Congratulations, your succefully verified  by our team,<br> 
				Please click here to confirm once to know your availablity. <br>
				<a href='"."$url/locum'> Click here to view your profile </a> <br><br>
				Regards, <br>
				Docum. ";
				$message .= "</td></tr>";
			 
				sendlocummail($locumemail,'Congratulations your account verified  by Docum',$message);
				$this->flash('success', 'You have succesfully varified our locums.');
 
			}
			if( $verifiedlocum == 2){
				$message  ="<tr><td>";
				$message .= "Dear $locumName, <br><br>
				your profile rejected due to invalid details  verified  by our team,<br> 
				Please click here to update your profile. <br>
				<a href='"."$url/locum'> Click here to view your profile </a> <br><br>
				Regards, <br>
				Docum. ";
				$message .= "</td></tr>";
				//echo $message;
				 
				sendlocummail($locumemail,'Your profile varified by our Docum',$message);
				$this->flash('success', 'Your rejected current locums.');	
			}
			
		$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'locums'));
	        $this->redirect($url);		
			
		}
 
	}


	public function verifypracticer(){

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

				//echo "<pre>";print_r($_POST);echo"</pre>";
		if(isset($_POST['verifiedpracticer'])){
			
			$practicer_id = $_POST['id']; 
			$verifiedpracticer = $_POST['verifiedpracticer'];
			$this->Practice->update($practicer_id,$_POST);

			$PracticeName = $practicerobject->firstname.' '.$practicerobject->lastname;
			$Practiceemail = $practicerobject->email;
			$url = esc_url(home_url('/'));
			
			 
			if( $verifiedpracticer == 1 ){
				$message  ="<tr><td>";
 				$message .= "Dear $PracticeName, <br><br>
				Congratulations, your succefully verified  by our team,<br> 
				Please click here to confirm once to know your availablity. <br>
				<a href='"."$url/practices'> Click here to view your profile </a> <br><br>
				Regards, <br>
				Docum. ";
				$message .= "</td></tr>";
			 
				sendlocummail($Practiceemail,'Congratulations your account verified  by Docum',$message);
				$this->flash('success', 'You have succesfully varified our locums.');
 
			}
			if( $verifiedpracticer == 2){

				$message  ="<tr><td>";
				$message .= "Dear $locumName, <br><br>
				your profile rejected due to invalid details  verified  by our team,<br> 
				Please click here to update your profile. <br>
				<a href='"."$url/practices'> Click here to view your profile </a> <br><br>
				Regards, <br>
				Docum. ";
				$message .= "</td></tr>";
				//echo $message;
				 
				sendlocummail($Practiceemail,'Your profile varified by our Docum',$message);
				$this->flash('success', 'Your rejected current locums.');	
			}
			
			$url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'practices'));
		        $this->redirect($url);		
			
		}
		

		
 	}


	public function jobs(){

	}
	
	 
}
?>
