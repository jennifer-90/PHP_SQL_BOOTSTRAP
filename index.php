<?php

include_once 'config.php';
include_once 'lib/output.php';

require_once 'view/header.html';
require_once 'view/menu.php';




if(!empty($_GET['view'])) {
    getContent($_GET['view']);
}


require_once 'view/footer.html';