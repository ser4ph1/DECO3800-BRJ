<?php
function check_password($password, $hash)
{
    return hash_equals($hash, crypt($password, $hash));
}

function logout_user(){
    try {
        session_unset();
    } catch (Exception $e) {
        return false;
    }
    return true;
}