<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\rug;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\rug\RUG;

class RUGController extends Controller {

        private static $rules = [
                        'rug_selected_fields' => 'required',
                        'rug_num_records' => 'required|integer|min:' . RUG::NUM_RECORDS_MIN . '|max:' . RUG::NUM_RECORDS_MAX,
                ];
        private static $messages = [
                        'rug_selected_fields.required' => 'Please select at least one data field.',
                        'rug_num_records.required' => 'Please enter the number of records you want.',
                        'rug_num_records.integer' => 'Number of records must be an integer between ' . RUG::NUM_RECORDS_MIN . ' and ' . RUG::NUM_RECORDS_MAX .'.',
                        'rug_num_records.min' => 'Number of records must be an integer between ' . RUG::NUM_RECORDS_MIN . ' and ' . RUG::NUM_RECORDS_MAX .'.',
                        'rug_num_records.max' => 'Number of records must be an integer between ' . RUG::NUM_RECORDS_MIN . ' and ' . RUG::NUM_RECORDS_MAX .'.',
                ];

        public function getIndex() {
                $output = "";
                $available_fields = RUG::availableFieldsHTML();
                $selected_fields = RUG::selectedFieldsHTML();
                return view('rug.index', [
                                'output' => $output,
                                'available_fields' => $available_fields,
                                'selected_fields' => $selected_fields
                        ]);
        }
        
        public function postIndex(Request $request) {
                RUG::$available_fields = $request->input('rug_available_fields');
                RUG::$selected_fields = $request->input('rug_selected_fields');
                $available_fields = RUG::availableFieldsHTML();
                $selected_fields = RUG::selectedFieldsHTML();
                $this->validate($request, self::$rules, self::$messages);
                $output = RUG::generateDataScript($request->input('rug_selected_fields'),
                        intval($request->input('rug_num_records')),
                        intval($request->input('rug_output')));
                return view('rug.index', [
                                'output' => $output,
                                'available_fields' => $available_fields,
                                'selected_fields' => $selected_fields
                        ]);
        }

}