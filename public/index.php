<?php

include_once('../config/costants.php');

include_once('../inc/routes.php');
include_once('../inc/controller.php');
include_once('../inc/render.php');
include_once('../inc/model.php');

$route = $_GET['main_route'] ?? "";
new Routes($route);