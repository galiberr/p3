<?php

namespace App\Http\Controllers\rug;
use SoapBox\Formatter\Formatter;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RUG
 *
 * @author galiberr
 */
class RUG {

        public static $FIELD_NAMES = [
                'last_name',
                'first_name',
                'middle_initial',
                'DOB',
                'street',
                'city',
                'state',
                'zip',
                'country',
                'latitude',
                'longitude',
                'email',
                'userID',
                'password',
                'url',
                'landline',
                'mobile',
                'company',
                'job_title',
        ];

        const NUM_RECORDS_MIN = 1;
        const NUM_RECORDS_MAX = 100;
        
        /* Output types */
        const OUTPUT_JSON = 0;
        const OUTPUT_ARRAY = 1;
        const OUTPUT_CSV = 2;
        const OUTPUT_XML = 3;
        const OUTPUT_YAML = 4;
        const OUTPUT_MYSQL = 5;
        
        public static $available_fields = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18",];
        public static $selected_fields = [];
        
        public static function createDataScript($fields, $num_records, $output_type) {
                $data = generateData($fields, $num_records, $output_type);
        }
        
        private static function generateData($fields, $num_records, $output_type) {
                
        }
        
        private static function convertArrayToMySQL($array) {
                
        }

        private static function convertArrayToYAML($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toYaml();
        }

        private static function convertArrayToJSON($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toJson();
        }

        private static function convertArrayToString($array) {
                return var_export($array, true);
        }

        private static function convertArrayToCSV($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toCsv();
        }

        private static function convertArrayToXML($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toXml();
        }
        
        public static function availableFieldsHTML() {
                return self::fieldsHTML(self::$available_fields);
        }
        
        public static function selectedFieldsHTML() {
                return self::fieldsHTML(self::$selected_fields);
        }
        
        private static function fieldsHTML($array) {
                $html = "";
                $array_size = count($array);
                for ($i = 0; $i < $array_size; $i++) {
                        $html = $html."<option value=\"" . $array[$i] . "\">" .
                                RUG::$FIELD_NAMES[intval($array[$i])] .
                                "</option>\n";
                }
                return $html;
        }
}
