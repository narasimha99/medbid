<?php
class Appliedjob extends MvcModel {
// var $has_many = array('Appliedsession');
 //var $includes = array('Jobsession');
 //var $Joins = array('Jobsession');
var $has_many = array('Appliedsession' => array('local_key' => 'id', 'foreign_key' => 'job_id'));
}
?>
