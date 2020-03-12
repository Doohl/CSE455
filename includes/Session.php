<?php
/**
 * Description of Session
 *
 * @author Nex
 */
class Session 
{
    
    public static function start()
    {
        session_start();
        $_SESSION['loggedin'] = FALSE;
    }
    
    //Seassion Function for Login
    public static function login($userName)
    {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $userName;
        session_commit();
    }
    
    public static function logout()
    {
        session_start();
        $_SESSION['loggedin'] = false;
        $_SESSION['userName'] = '';
        session_commit();
    }   
    
    public static function isLoggedIn()
    {
        return $_SESSION['loggedin'];
    }
    
    public static function getUserName()
    {
        return $_SESSION['userName'];
    }
}
