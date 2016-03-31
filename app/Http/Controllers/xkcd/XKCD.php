<?php
/*
 * Author:      Roland Galibert
 * Date:        February 18, 2016
 * For:         CSCI E-15 Dynamic Web Applications, Spring 2016 - Project 2
 * Purpose:     xkcd controller file for xkcd Password Generator
 */
namespace App\Http\Controllers\xkcd;

use App\Http\Controllers\xkcd\Words;

class XKCD {
        
        private static $words;
        
        /*
         * Default, min/max values
         */
        const MIN_CHAR_DEFAULT = 8;
        const MIN_CHAR_MAX = 32;
        const NUM_WORDS_DEFAULT = 4;
        const NUM_WORDS_MIN = 3;
        const NUM_WORDS_MAX = 8;
        const SEPARATOR_DEFAULT = "dash";
        const CASE_DEFAULT = "lower";
        const END_NUM_DEFAULT = "none";
        const ADD_THIS_NUM_DEFAULT = "";
        const END_SPECIAL_DEFAULT = "none";
        const ADD_THIS_CHAR_DEFAULT = "";
        
        private static $separators = [
                "dash" => "-",
                "underscore" => "_",
                "period" => ".",
                "hash" => "#",
                "none" => ""
        ];
        
        private static $specialChars = [
                "!",
                "@",
                "$",
                "%",
                "^",
                "&",
                "*",
                "-",
                "_",
                "+",
                "=",
                ":",
                "|",
                "~",
                "?",
                "/",
                ".",
                ","
        ];
        /*
         * This is the actual function to generate a password based on
         * parameters
         */
        public static function generatePassword(      $input_min_length,
                                                        $input_num_words,
                                                        $input_separator,
                                                        $input_case,
                                                        $input_end_num,
                                                        $input_add_this_num,
                                                        $input_end_special,
                                                        $input_add_this_char) {
                /*
                 * If word array is empty, fill it
                 */
                if (is_null(self::$words)) {
                        self::$words = Words::word_array();
                }
                
                /*
                 * Calculate actual minimum length required in consideration of
                 * minimum length, number of separators required, and
                 * final digit/special character specifications
                 */
                $min_length = (int) $input_min_length;
                $min_length = $min_length - (int) $input_num_words + 1;
                $min_length = $min_length - (strcmp($input_separator, "none") == 0 ? 0 : 1);
                $min_length = $min_length - (strcmp($input_end_num, "none") == 0 ? 0 : 1);
                $min_length = $min_length - (strcmp($input_end_special, "none") == 0 ? 0 : 1);
                
                /*
                 * Initiate separator, final digit, final special characters.
                 */
                $separator = self::getSeparator($input_separator);
                $end_num = self::getEndNum($input_end_num, $input_add_this_num);
                $end_special = self::getEndSpecial($input_end_special, $input_add_this_char);
                
                /*
                 * Create array of new words. These will be indices
                 * to the words array, and not the actual words
                 */
                $new_words = self::generate_words($min_length, (int) $input_num_words);
                
                /*
                 * Loop to generate password (kept in $_SESSION['password']), applying
                 * case.
                 */
                $password = "";
                for ($i = 0; $i < count($new_words); $i++) {
                        if (strlen($password) == 0) {
                                $password = self::applyCase($input_case, self::$words[$new_words[$i]]);
                        } else {
                                $password = $password.$separator.self::applyCase($input_case, self::$words[$new_words[$i]]);
                        }
                }
                
                /*
                 * Add any end values required
                 */
                if (strlen($end_num) > 0) {
                        $password = $password.$end_num;
                }
                if (strlen($end_special) > 0) {
                        $password = $password.$end_special;
                }
                return $password;
        }
        
        /*
         * This function accepts a word string and applies case to it
         * (lower, upper, camel case) on the basis of the value in
         * $_POST['case']
         */
        private static function applyCase($caseSpec, $word) {
                switch ($caseSpec) {
                        case "lower":
                                return strtolower($word);
                        case "upper":
                                return strtoupper($word);
                        case "camel":
                                return ucfirst($word);
                }
        }
        
        /*
         * This function returns an actual separator character on the basis
         * of the specification in $_POST['separator']
         */
        private static function getSeparator($separatorSpec) {
                return self::$separators[$separatorSpec];
        }
        
        /*
         * This function generates or returns a final digit on the basis
         * of the specification in $_POST['end_num'].
         * In the case of a user-specified digit, this is stored in
         * $_POST['add_this_num']
         */
        private static function getEndNum($endNumSpec, $addThisNum) {
                switch ($endNumSpec) {
                        case "none":
                                return "";
                        case "random":
                                return strval(rand(0, 9));
                        case "specific":
                                return $addThisNum;
                }
        }
        /*
         * This function generates or returns a final special end character
         * on the basis of the specification in $_POST['end_special'].
         * In the case of a user-specified digit, this is stored in
         * $_POST['add_this_char']
         */
        private static function getEndSpecial($endCharSpec, $addThisChar) {
                switch ($endCharSpec) {
                        case "none":
                                return "";
                        case "random":
                                $index = rand(0, 17);
                                return self::$specialChars[$index];
                        case "specific":
                                return $addThisChar;
                }
        }
        
        /*
         * This function generates words for use in the password on the basis
         * of the input parameters $min_length and $num_words. Note that it
         * returns an array of indices to the $_SESSION['words'] array and not
         * the actual words themselves.
         * 
         * The function will call itself recursively if the words it found in
         * its current while loop are not large enough to accommodate the
         * $min_length.
         * 
         */
         private static function generate_words($min_length, $num_words) {
             $total_words = count(self::$words);
             $word_index = [];
             $total_length = 0;
             while (count($word_index) < $num_words) {
                     $new_index = rand(0, $total_words - 1);
                     if (!in_array($new_index, $word_index)) {
                             $word_index[] = $new_index;
                             $total_length = $total_length + strlen(self::$words[$new_index]);
                     }
             }
             if ($total_length < ($min_length - $num_words + 1)) {
                     return self::generate_words($min_length, $num_words);
             } else {
                     return $word_index;
             }
        }
}
?>