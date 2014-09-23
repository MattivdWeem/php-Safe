<?php

/*
*
* PHP SAFE
*
*/

error_reporting(E_ALL);
ini_set('display_errors', '1');

class phpSafe{


    public function __construct(){}

    /**
     * Creates a random string
     *
     *
     * @param string $lenght The lenght of the returned string
     * @param string $available, might be a given array, string or boolean
     *
     * @return string off characters
     */
    public function randomString($lenght = 20, $available = false){
        if(!$available):
            $available = array_merge(range('a','z'), range('A','Z') , range('0','9') );
        else:
            if(!is_array($available)):
                $available = str_split($available);
            endif;
        endif;
        $arrayCount = count($available);
        $i = 0;
        $return = '';

        do {
            $random = rand(0,$arrayCount);
            if(isset($available[$random]) && $available[$random] != ''):
                $return.= $available[$random];
            endif;
        ++$i;
        } while ($i < $lenght);

        return $return;
    }





}

// Make the world a better place.
function p($v){echo'<pre>';print_r($v);echo'</pre>';}