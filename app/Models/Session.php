<?php
class Session
{
    public static function init()
    {
        if (version_compare(phpversion(), '8.2.4', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }
    public static function set($key, $val)
    {
        $_SESSION[$key]  = $val;
    }
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    public static function destroy()
    {
        session_destroy();
        header("Location: login.php");
    }

    public static function checkSession()
    {
        self::init();
        if (self::get("login") == false) {
            self::destroy();
            header("Location: login.php");
        }
    }
    public static function checkLogin()
    {
        self::init();
        if (self::get("login") == true) {
            self::destroy();
            header("Location: index.php");
        }
    }
}
