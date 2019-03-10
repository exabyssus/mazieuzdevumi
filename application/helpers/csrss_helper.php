<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('thhashit')) {

    function thhashit($text)
    {

        return hash('gost', $text);
    }

}

if (!function_exists('get_th_isauth')) {

    function get_th_isauth()
    {
        $ci = & get_instance();
        $isuauth = $ci->users_model->authuser();
        return $isuauth;
    }

}

if (!function_exists('get_th_user')) {

    /**
     * get user data field by ID
     * @param string $field
     * @param string|int $id
     * @return object|array
     */
    function get_th_user($field = 'id', $id = false)
    {
        $user = false;
        /** try to get user id from session */
        $uid  = $id ? $id : get_th_isauth();
        if ($uid) {
            $ci = & get_instance();

            $user = $ci->users_model->getUser($uid, $field);
        }
        return $user;
    }

}
