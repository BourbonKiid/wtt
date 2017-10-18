<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ".$_GET['curpage'].""); // Redirecting To Home Page
}
?>