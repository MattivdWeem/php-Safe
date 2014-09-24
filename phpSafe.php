<?php

/*
*
* PHP SAFE
*
*/

error_reporting(E_ALL);
ini_set('display_errors', '1');

class phpSafe{

    private $token = NULL; // the token is used for hashing, and crypting
    private $hash = 'sha512'; // used to set up the hash

    public function __construct($token = false){
        if($token):
            $this->token = $token;
            return true;
        else:
            // of there is no token given, we have to give one this causes some problems so return with an error
            $this->token = $this->randomString;
            return false;
        endif;
    }

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

    /**
     *
     * Hashes an input
     *
     * @param string / array $string  Will be hashed into the password
     * @return string
     */
    public function hash($input, $token = false){
        if(!$token): $token = $this->token; endif;

        if(is_array($input)): $input = serialize($input); endif;

        return hash($this->hash,$this->token.$input);
    }

    /**
     *
     * Checks string for strengt
     *
     * @param string $input the string to be checked
     * @param array $settings the settings for checking the string
     * @return int with strenght points
     */
    public function strenght($input,$settings = array()){
        if(is_array($input)): $input = serialize($input); endif;

        // defaults
        $modifiers = array(
                'lowercase' =>  0.2,
                'uppercase' =>  0.3,
                'specials'  =>  0.4,
                'lenght'    =>  0.1,
                'dubble'    => -0.3,
                'start'     =>  0
            );

        if(!empty($settings)):
            foreach($settings as $key => $setting):
                if(isset($modifiers[$key]) && $modifiers[$key] != ''):
                    $modifiers[$key] = $setting;
                endif;
            endforeach;
        endif;

        $usedChars = array();
        $count = $modifiers['start'];
        foreach(str_split($input) as $char):
            $count+=$modifiers['lenght'];
            if(ctype_upper($char)):
                $count += $modifiers['uppercase'];
            elseif(ctype_lower($char)):
                $count += $modifiers['lowercase'];
            else:
                $count += $modifiers['specials'];
            endif;

            if(in_array($char, $usedChars)):
                $count += $modifiers['dubble'];
            endif;
            array_push($usedChars, $char);
        endforeach;
        return $count;
    }







}

// Make the world a better place.
function p($v){echo'<pre>';print_r($v);echo'</pre>';}