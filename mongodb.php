<?php
	try
{
	$mdb = new MongoDB\Driver\Manager("mongodb://root:password@ds161630.mlab.com:61630/library");	
	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand('db', $command);
	$servers = $mdb->getServers();
	print_r($servers);
	$filter = array('name'=>'stumpy');
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("635.it635",$query);
	print_r($results->toArray());
}
catch(exception $e)
{
	print_r($e);
}
?>