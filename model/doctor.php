<?php
class Doctor {
    private $id;
    private $credentials;
    private $first_name;
    private $last_name;
    private $care_level;
    private $country_code;
    private $titles = Array();

    public function __construct() {

    }

    function getId() {
        return $this->id;
    }

    function getCredentials() {
        return $this->credentials;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }
    function getCare_level(){
        return $this->care_level;
    }

    function getCountry_code() {
        return $this->country_code;
    }
    
    function getFullName(){
        return  $this->first_name . ' ' .  $this->last_name . ' ' . $this->credentials ;
    }
    function getTitles(){
        return $this->titles;
    }
    function getTitle($pos){
        $idx = intval($pos);

        $title = "";
        //$title = $this->titles[0];
        $count = 0;
        foreach($this->titles as $key=>$value){
            if ($key === $idx){
                $title = $value;
                break;
                
            }
        }   
          return $title;  
        }
//        if (array_key_exists($idx,$this->titles))
//        {
//            $title = $this->titles[0];
//        }
//        else
//        {
//             $title = "";
//        }   
//        return $title;
//    }

    function setId($id) {
        $this->id = $id;
    }

    function setCredentials($credentials) {
        $this->credentials = $credentials;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }
    
    function setCare_level($care_level){
        $this->care_level = $care_level;
    }

    function setCountry_code($country_code) {
        $this->country_code = $country_code;
    }
    /**
     * 
     * @param type $titles (Array)
     */
    function setTitles($titles){
        $this->titles = $titles;
    }


}
?>