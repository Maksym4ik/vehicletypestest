<?php
    //basic libs for project
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Database.php';

//    session start
    require_once 'helpers/session_helper.php';

//    config db and links
    require_once 'config/config.php';

    //Instantiate core class
    $init = new Core();
