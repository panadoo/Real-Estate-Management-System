<?php

function getCookie($cookieName){
    if(isset($_COOKIE[$cookieName]))
        return $_COOKIE[$cookieName];
    
    return false;
}