<?php
/*
 * Author:      Roland Galibert
 * Date:        March 31, 2016
 * For:         CSCI E-15 Dynamic Web Applications, Spring 2016 - Project 3
 * Purpose:     RUG class for random user generator tool
 */

namespace App\Http\Controllers\rug;
use SoapBox\Formatter\Formatter;
use \Faker\Factory;

class RUG {

        /* 
         * Data field positions
         */
        const LAST_NAME = 0;
        const FIRST_NAME = 1;
        const MIDDLE_INITIAL = 2;
        const DOB = 3;
        const STREET = 4;
        const CITY = 5;
        const STATE = 6;
        const ZIP = 7;
        const COUNTRY = 8;
        const LATITUDE = 9;
        const LONGITUDE = 10;
        const EMAIL = 11;
        const USER_ID = 12;
        const PASSWORD = 13;
        const URL = 14;
        const LANDLINE = 15;
        const MOBILE = 16;
        const COMPANY = 17;
        const JOB_TITLE = 18;
        
        /* 
         * Record count minimum/maximum values
         */
        const NUM_RECORDS_MIN = 1;
        const NUM_RECORDS_MAX = 100;

        /* 
         * Array containing field names and corresponding MySQL data types
         */
        public static $FIELD_NAMES = [
            ['last_name', 'VARCHAR(20)'],
            ['first_name', 'VARCHAR(20)'],
            ['middle_initial', 'VARCHAR(1)'],
            ['DOB', 'DATE'],
            ['street', 'VARCHAR(20)'],
            ['city', 'VARCHAR(20)'],
            ['state', 'VARCHAR(2)'],
            ['zip', 'VARCHAR(10)'],
            ['country', 'VARCHAR(20)'],
            ['latitude', 'DECIMAL(9,6)'],
            ['longitude','DECIMAL(9,6)'],
            ['email', 'VARCHAR(20)'],
            ['userID', 'VARCHAR(20)'],
            ['password', 'VARCHAR(20)'],
            ['url', 'VARCHAR(20)'],
            ['landline', 'VARCHAR(10)'],
            ['mobile', 'VARCHAR(10)'],
            ['company', 'VARCHAR(20)'],
            ['job_title', 'VARCHAR(20)'],
        ];

        /*
         *  Output formats
         */
        const OUTPUT_JSON = 0;
        const OUTPUT_ARRAY = 1;
        const OUTPUT_CSV = 2;
        const OUTPUT_XML = 3;
        const OUTPUT_YAML = 4;
        const OUTPUT_MYSQL = 5;

        /*
         *  Name of table to be used in MySQL data generation script
         */
        const MYSQL_TABLE = "users";
        
        /*
         * Currently available (non-selected) fields, will change over the
         * course of application interaction.
         */
        public static $available_fields = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18",];

        /*
         * Currently selected fields, will change over the
         * course of application interaction.
         */
        public static $selected_fields = [];

        /* 
         * fzaninotto/faker object
         */
        private static $faker;
        
        /* 
         * Public method to return generated user data in form of code/script
         */
        public static function generateDataScript($fields, $num_records, $output_type) {

                /*
                 * Create fzaninotto/faker object if necessary
                 */
                if (is_null(self::$faker)) {
                        self::$faker = Factory::create();
                }
                
                /*
                 * Generate data
                 */
                $data = self::generateData($fields, $num_records);
                
                /*
                 * Return generated data in selectd format
                 */
                switch ($output_type) {
                        case self::OUTPUT_JSON:
                                return self::convertArrayToJSON($data);
                        case self::OUTPUT_ARRAY:
                                return self::convertArrayToString($data);
                        case self::OUTPUT_CSV:
                                return self::convertArrayToCSV($data);
                        case self::OUTPUT_XML:
                                return self::convertArrayToXML($data);
                        case self::OUTPUT_YAML:
                                return self::convertArrayToYAML($data);
                        case self::OUTPUT_MYSQL:
                                return self::convertArrayToMySQL($fields, $data, self::MYSQL_TABLE);
                }
        }

        /* 
         * Loops to generate required number of records, passing array of 
         * selected fields to generateRecord()
         */
        private static function generateData($fields, $num_records) {
                $data = array();
                for ($i = 0; $i < $num_records; $i++) {
                        $data[] = self::generateRecord($fields);
                }
                return $data;
        }

        /* 
         * Loops to generate single record of desired fields, calling
         * generateField() to create sample data for current specified field
         */
        private static function generateRecord($fields) {
                $record = [];
                $num_fields = count($fields);
                for ($i = 0; $i < $num_fields; $i++) {
                        $record[self::$FIELD_NAMES[intval($fields[$i])][0]] = self::generateField(intval($fields[$i]));
                }
                return $record;
        }

        /* 
         * Calls appropriate fzaninotto/faker object methods to create sample 
         * data for a specific field type
         */
        private static function generateField($fieldType) {
                switch ($fieldType) {
                        case self::LAST_NAME:
                                return self::$faker->lastName;
                        case self::FIRST_NAME:
                                return self::$faker->firstName;
                        case self::MIDDLE_INITIAL:
                                return self::$faker->randomLetter;
                        case self::DOB:
                                return self::$faker->date('Y-m-d', 'now');
                        case self::STREET:
                                return self::$faker->streetAddress;
                        case self::CITY:
                                return self::$faker->city;
                        case self::STATE:
                                return self::$faker->stateAbbr;
                        case self::ZIP:
                                return self::$faker->postcode;
                        case self::COUNTRY:
                                return self::$faker->country;
                        case self::LATITUDE:
                                return self::$faker->latitude;
                        case self::LONGITUDE:
                                return self::$faker->longitude;
                        case self::EMAIL:
                                return self::$faker->email;
                        case self::USER_ID:
                                return self::$faker->userName;
                        case self::PASSWORD:
                                return self::$faker->password;
                        case self::URL:
                                return self::$faker->url;
                        case self::LANDLINE:
                                return self::$faker->phoneNumber;
                        case self::MOBILE:
                                return self::$faker->phoneNumber;
                        case self::COMPANY:
                                return self::$faker->company;
                        case self::JOB_TITLE:
                                return self::$faker->jobTitle;
                }
        }

        /* 
         * Calls soapbox/Formatter methods to convert given array
         * to JSON notation
         */
        private static function convertArrayToJSON($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toJson();
        }

        /* 
         * Converts given array into string format
         */
        private static function convertArrayToString($array) {
                return var_export($array, true);
        }

        /* 
         * Calls soapbox/Formatter methods to convert given array
         * to CSV notation
         */
        private static function convertArrayToCSV($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toCsv();
        }

        /* 
         * Calls soapbox/Formatter methods to convert given array
         * to XML notation
         */
        private static function convertArrayToXML($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toXml();
        }

        /* 
         * Calls soapbox/Formatter methods to convert given array
         * to YAML notation
         */
        private static function convertArrayToYAML($array) {
                $formatter = Formatter::make($array, Formatter::ARR);
                return $formatter->toYaml();
        }

        /* 
         * Creates a MySQL script that will create a table with the given
         * $table name that contain the elements in the given $array
         * 
         * It is expected that the array is a set of associative arrays each
         * with the same keys/values in the same order
         */
        private static function convertArrayToMySQL($fields, $array, $table_name) {
                
                /*
                 * Create table
                 */
                $mysql_stmt = "CREATE TABLE IF NOT EXISTS " . $table_name . " (";
                $field_count = count($fields);
                for ($i = 0; $i < $field_count; $i++) {
                        if ($i > 0) {
                                $mysql_stmt = $mysql_stmt . ", ";
                        }
                        $mysql_stmt = $mysql_stmt . self::$FIELD_NAMES[intval($fields[$i])][0] . " ";
                        $mysql_stmt = $mysql_stmt . self::$FIELD_NAMES[intval($fields[$i])][1];
                }
                $mysql_stmt = $mysql_stmt . "); INSERT INTO " . $table_name . " (";
                
                /*
                 * Insert data - field names
                 */
                $field_count = count($fields);
                for ($i = 0; $i < $field_count; $i++) {
                        if ($i > 0) {
                                $mysql_stmt = $mysql_stmt . ", ";
                        }
                        $mysql_stmt = $mysql_stmt . self::$FIELD_NAMES[intval($fields[$i])][0];
                }
                $mysql_stmt = $mysql_stmt . ") VALUES ";
                        
                /*
                 * Insert data - actual data
                 */
                $record_count = count($array);
                for ($i = 0; $i < $record_count; $i++) {
                        if ($i > 0) {
                                $mysql_stmt = $mysql_stmt . ", ";
                        }
                        $mysql_stmt = $mysql_stmt . "(";
                        $field_count = count($array[$i]);
                        for ($j = 0; $j < $field_count; $j++) {
                                if ($j > 0) {
                                        $mysql_stmt = $mysql_stmt . ", ";
                                }
                                $key_index = array_search(self::$FIELD_NAMES[$j], self::$FIELD_NAMES);
                                if (($key_index == self::LATITUDE) || ($key_index == self::LONGITUDE)) {
                                        $mysql_stmt = $mysql_stmt . $array[$i][self::$FIELD_NAMES[$j][0]];
                                } else {
                                        $mysql_stmt = $mysql_stmt . "'" . $array[$i][self::$FIELD_NAMES[$j][0]] . "'";
                                }
                        }
                        $mysql_stmt = $mysql_stmt . ")";
                }
                $mysql_stmt = $mysql_stmt . ";";
                return $mysql_stmt;
        }

        /* 
         * Calls fieldsHTML to convert currently available fields into an
         * HTML multiselect box option/value list.
         */
        public static function availableFieldsHTML() {
                return self::fieldsHTML(self::$available_fields);
        }

        /* 
         * Calls fieldsHTML to convert currently selected fields into an
         * HTML multiselect box option/value list.
         */
        public static function selectedFieldsHTML() {
                return self::fieldsHTML(self::$selected_fields);
        }

        /* 
         * Converts  the given array of values into an
         * HTML multiselect box option/value list.
         */
        private static function fieldsHTML($array) {
                $html = "";
                $array_size = count($array);
                for ($i = 0; $i < $array_size; $i++) {
                        $html = $html . "<option value=\"" . $array[$i] . "\">" .
                                RUG::$FIELD_NAMES[intval($array[$i])][0] .
                                "</option>\n";
                }
                return $html;
        }
}
