<?php

use Jenssegers\Agent\Agent;


function mobileTabletCheck(){  
$agent = new Agent();
$mobile=$agent->isMobile();
$tablet=$agent->isTablet();
if($mobile==1 || $tablet==1){
   
    return 1;
}else{
    return 0;  
}

}

function get_option($key)
{
    $result = DB::table('options')->select('option_value')->where('option_name', $key)->first();
    if ($result) {
        return $result->option_value;
    }
}
