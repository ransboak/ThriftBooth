<?php
require 'config/constants.php';

//destroy all sessions and redirect user to log in page
session_destroy();
header('location: ' . ROOT_URL);
die();
