<?php

/**
 * Authentication class
 */
class Auth
{
    public static function authenticate($row)
    {
        if (is_object($row)) {
            $_SESSION['USER_DATA'] = $row;
        }
    }

    public static function logout()
    {

        if (!empty($_SESSION['USER_DATA'])) {
            unset($_SESSION['USER_DATA']);
        }
    }
    public static function logged_in()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            return true;
        }

        return false;
    }

    //check if the user is admin or not
    public static function is_admin()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'admin') {
                return true;
            }
            return false;
        }
    }

    //check if the user is dr or not
    public static function is_dr()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'dr') {
                return true;
            }
            return false;
        }
    }

    //check if the user is sar or not
    public static function is_sar()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'sar') {
                return true;
            }
            return false;
        }
    }

    //check if the user is director or not
    public static function is_director()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'director') {
                return true;
            }
            return false;
        }
    }

    public static function is_clerk()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'clerk') {
                return true;
            }
            return false;
        }
    }

    public static function is_asar()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'asar') {
                return true;
            }
            return false;
        }
    }

    public static function __callStatics($funcname, $args)
    {
        $key = str_replace("get", "", strtolower($funcname));
        if (!empty($_SESSION['USER_DATA']->$key)) {

            return $_SESSION['USER_DATA']->$key;
        }
        return '';
    }
}
