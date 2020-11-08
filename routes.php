<?php

$matches=[];

define('URL_MAIN', 'platzi\/api-rest');
if(preg_match("/".URL_MAIN."\/([^\/]+)\/([^\/]+)/",$_SERVER["REQUEST_URI"],$matches))
{   
    $_GET['resource_type']=$matches[1];    
    $_GET['resource_id']=$matches[2];
    error_log(print_r($matches,1),3,__DIR__.'/log.txt');
    require 'server.php';
}elseif(preg_match("/".URL_MAIN."\/([^\/]+)\/?/",$_SERVER["REQUEST_URI"],$matches))
{   
    $_GET['resource_type']=$matches[1];        
    error_log(print_r($matches,1),3,__DIR__.'/log.txt');
    require 'server.php';
}else
{
    error_log('No matches');
    http_response_code(404);
}