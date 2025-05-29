<?php

class View
{
    function __construct()
    {
        //echo 'This view page<br>
    }

    public function render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            ob_start();
            require 'views/' . $name . '.php';
            $children = ob_get_clean();
          
          //  if (isset($_SESSION['cis-admin-exist'])) {
                if (isset($_SESSION['cis-admin-islogin'])) {
                    require 'layouts/admin/index.php';
                } else {
                    require 'layouts/users/index.php';
                }
            // } else {
            //     require 'layouts/setup/index.php';
            // }
        }
    }
}
