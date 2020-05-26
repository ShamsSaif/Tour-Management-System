<?php
session_start();
$db = new mysqli('localhost', 'root', "", "assistant accounts") or die("unable to connect");
