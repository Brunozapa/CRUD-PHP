<?php

namespace App\Controller;

require_once '../../vendor/autoload.php';
use App\Controller\SessionController;
$sessao = new SessionController();
$sessao->logout();

