<?php
$valRedirectPage = "displayDirectory/";
header( "HTTP/1.1 301 Moved Permanently" ); 
header( "Location: ".$valRedirectPage."" ); 
?>