<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location:/FacultyDev/index.html"); // Redirecting To Home Page
}
?>