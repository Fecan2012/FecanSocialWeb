<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './includes/class-insert.php';
session_start();

$description = $_POST["description"];
$location = $_POST["location"];
$eventDate = $_POST["date"];
$eventId = $_POST["eventId"];

$insert->updateEvent($eventDate,$description,$location,$eventId);
header("Location: events.php");

