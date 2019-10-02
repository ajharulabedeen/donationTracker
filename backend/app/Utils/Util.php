<?php 
namespace App\Utils;
class Util{
    public static function getCurrentUserName(){
        /**
         * for this moment a dummy value sent, later current logged user name will be 
         * taken form the auth.
         */
        return "tst";
    }

    public static function getCurrentDate(){
        $date = date("h:i:sa D d-m-y");
        echo "\n" . $date;
        return $date;
    }

}//clas




