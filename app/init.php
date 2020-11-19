<?php
function __autoload($files){
    require_once "core/$files.php";
}
require_once "../env.php";
