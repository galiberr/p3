<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\xkcd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XKCDController extends Controller {

        private static $rules = [
                        'xkcd_min_length' => 'required|integer|min:8|max:32',
                        'xkcd_num_words' => 'required|integer|min:3|max:8',
                        'xkcd_add_this_num' => 'required_if:xkcd_end_num,specific|integer|min:0|max:9',
                        'xkcd_add_this_char' => array (
                            'required_if:xkcd_end_special,specific',
                            'regex:|^[\!\@\$\%\^\&\*\-\_\+\=\:\|\~\?\/\.\;]$|',
                            )
        ];
        
        private static $messages = [
                        'xkcd_min_length.required' => 'Please enter a minimum length for your password.',
                        'xkcd_min_length.integer' => 'Minimum password length must be an integer between 8 and 32.',
                        'xkcd_min_length.min' => 'Minimum password length must be an integer between 8 and 32.',
                        'xkcd_min_length.max' => 'Minimum password length must be an integer between 8 and 32.',
                        'xkcd_num_words.required' => 'Please enter the number of words in your password.',
                        'xkcd_num_words.integer' => 'Number of words must be an integer between 8 and 32.',
                        'xkcd_num_words.min' => 'Number of words must be an integer between 8 and 32.',
                        'xkcd_num_words.max' => 'Number of words must be an integer between 8 and 32.',
                        'xkcd_add_this_num.required_if' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_num.integer' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_num.min' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_num.max' => 'Please enter a digit between 0 and 9.',
                        'xkcd_add_this_char.required_if' => 'Please enter a one of the chars !@$%^&*-_+=:|~?/.;',
                        'xkcd_add_this_char.regex' => 'Please enter a one of the chars !@$%^&*-_+=:|~?/.;',
                ];

        public function getIndex() {
                $output = "from xkcd get";
                return view('xkcd.index', ['output' => $output]);
        }
        
        public function postIndex(Request $request) {
                $this->validate($request, self::$rules, self::$messages);
                $output = $request->input('xkcd_add_this_char');
                return view('xkcd.index', ['output' => $output]);
        }

}