<?php
/* 
    ./main/public/index.php
    DISPATCHER CENTRAL
*/

// 1. Charger l'initialisation 
require_once '../core/init.php';

// 2. Charger le routeur principal
require_once '../app/routeurs/web.php';

// 3. Charger le template
require_once '../app/views/templates/index.php';