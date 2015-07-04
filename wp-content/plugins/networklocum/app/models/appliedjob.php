<?php
class Appliedjob extends MvcModel {
// var $has_many = array('Appliedsession');
 // var $includes = array('Locum');
 //var $Joins = array('Jobsession');
//var $belongs_to = array('Locum');
var $has_many = array('Appliedsession' => array('local_key' => 'id', 'foreign_key' => 'job_id'));
}
?>
