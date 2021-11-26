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