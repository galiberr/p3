<?php
/*
 * Author:      Roland Galibert
 * Date:        March 31, 2016
 * For:         CSCI E-15 Dynamic Web Applications, Spring 2016 - Project 3
 * Purpose:     Controller for XKCD password tool
 */

namespace App\Http\Controllers\xkcd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\xkcd\XKCD;

class XKCDController extends Controller {

        /*
         * Validation rules
         */
        private static $rules = [
                        'xkcd_min_length' => 'required|integer|min:8|max:32',
                        'xkcd_num_words' => 'required|integer|min:3|max:8',
                        'xkcd_add_this_num' => 'required_if:xkcd_end_num,specific|integer|min:0|max:9',
                        'xkcd_add_this_char' => array (
                            'required_if:xkcd_end_special,specific',
                            'regex:|^[\!\@\$\%\^\&\*\-\_\+\=\:\|\~\?\/\.\;]$|',
                            )
        ];
        
        /*
         * Validation error messages
         */
        private static $messages = [
                        'xkcd_min_length.required' => 'Please enter a minimum length for your password.',
                        'xkcd_min_length.integer' => 'Minimum password length must be an integer between 8 and 32.',
                        'xkcd_min_length.min' => 'Minimum password length must be an integer between 8 and 32.',
                        'xkcd_min_length.max' => 'Minimum password length must be an integer between 8 and 32.',
                        'xkcd_num_words.required' => 'Please enter the number of words in your password.',
                        'xkcd_num_words.integer' => 'Number of words must be an integer between 3 and 8',
                        'xkcd_num_words.min' => 'Number of words must be an integer between 3 and 8',
                        'xkcd_num_words.max' => 'Number of words must be an integer between 3 and 8',
                        'xkcd_add_this_num.required_if' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_num.integer' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_num.min' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_num.max' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_char.required_if' => 'Please enter a one of the chars !@$%^&*-_+=:|~?/.;',
                        'xkcd_add_this_char.regex' => 'Please enter a one of the chars !@$%^&*-_+=:|~?/.;',
                ];

        /*
         * Get method for XKCD password generation application
         */
        public function getIndex() {
                $output = "";
                return view('xkcd.index', ['output' => $output]);
        }
        
        /*
         * Post method for XKCD password generation application
         */
        public function postIndex(Request $request) {
                $this->validate($request, self::$rules, self::$messages);
                
                /*
                 * Call static XKCD method to generate password
                 */
                $output = XKCD::generatePassword(       $request->input('xkcd_min_length'),
                                                        $request->input('xkcd_num_words'),
                                                        $request->input('xkcd_separator'),
                                                        $request->input('xkcd_case'),
                                                        $request->input('xkcd_end_num'),
                                                        $request->input('xkcd_add_this_num'),
                                                        $request->input('xkcd_end_special'),
                                                        $request->input('xkcd_add_this_char'));
                return view('xkcd.index', ['output' => $output]);
        }

}