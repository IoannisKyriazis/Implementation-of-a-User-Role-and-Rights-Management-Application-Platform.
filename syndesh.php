<?php

 
$conf['db']['db_Host'] = 'localhost';
$conf['db']['db_Login'] = 'ergasia2';
$conf['db']['db_PWord'] = '12345';
$conf['db']['db_Name'] = 'ergasia2';
$conf['db']['db_Port'] = '3306';

$link = mysqli_connect($conf['db']['db_Host'], $conf['db']['db_Login'], $conf['db']['db_PWord'], $conf['db']['db_Name'], $conf['db']['db_Port']);
mysqli_query($link, 'SET NAMES utf8');



if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
?>
