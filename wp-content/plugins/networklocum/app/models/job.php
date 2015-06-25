<?php
class Job extends MvcModel {
  var $has_and_belongs_to_many = array('Jobsession');
  var $includes = array('Jobsession');
}
?>
