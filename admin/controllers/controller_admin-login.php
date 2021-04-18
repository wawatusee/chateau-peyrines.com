<?php
if(isset($_POST["disconnect"])){
    disconnectModel();
    require_once './views/view_'.$page.'.php';
}else {
require_once './views/view_admin-disconnect.php';
};