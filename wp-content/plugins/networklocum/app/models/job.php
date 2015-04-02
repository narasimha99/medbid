<?php
class Job extends MvcModel {
 var $has_many = array('Jobsession');
 //var $includes = array('Jobsession');
 //var $Joins = array('Jobsession');
//var $has_many = array('Jobsession' => array('local_key' => 'id', 'foreign_key' => 'job_id'));
}
?>
