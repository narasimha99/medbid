<?php
class groupdata extends MvcModel {
var $hasMany = array('ledger' => array('foreign_key' => 'group_id'));
}

?>
