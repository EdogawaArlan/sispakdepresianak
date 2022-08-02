<?php
function array_every(array $arr, callable $user_func)
{
    foreach ($arr as $a) {
        if (!call_user_func($user_func, $a)) {
            return false;
        }
    }
    return true;
}
