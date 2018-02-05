<?php
    class AGMDTypes{
        const HOME_ADDRESS =1;
        const OFFICE_ADDRESS = 2;
        const FACILITY_ADDRESS = 3;
        
        const PHONE_CELL = 'C';
        const PHONE_LAND = 'L';
        const PHONE_FAX = 'F';
        
        public static function getAddressType($type){
            $return_type = '';
            switch($type){
                case self::HOME_ADDRESS :
                    $return_type="Home";
                    break;
                case self::OFFICE_ADDRESS :
                    $return_type="Office";
                    break;
                case self::FACILITY_ADDRESS :
                    $return_type="Facility";
                    break;    
                default:
                    $return_type = 'UNKNOWN';
            }
            return $return_type;
        }
        
        public static function getPhoneType($type){
            $return_type = '';
            switch($type){
                case self::PHONE_CELL :
                    $return_type="CELL";
                    break;
                case self::PHONE_LAND :
                    $return_type="LAND";
                    break; 
                case self::PHONE_FAX :
                    $return_type="FAX";
                    break;                 
                default:
                    $return_type = 'UNKNOWN';
            }
            return $return_type;
        }        
    }
?>

