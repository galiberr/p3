<?php
/*
 * Author:      Roland Galibert
 * Date:        March 31, 2016
 * For:         CSCI E-15 Dynamic Web Applications, Spring 2016 - Project 3
 * Purpose:     Lorem class for Lorem Ipsum generator tool
 */

namespace App\Http\Controllers\lorem;
use \Faker\Factory;

class Lorem {

        /* 
         * Theme radio button values
         */
        const THEME_LATIN = 0;
        const THEME_PYTHON = 1;
        const THEME_MOVIE = 2;
        const THEME_LYRICS = 3;

        /* 
         * Lorem Ipsum form radio button values
         */
        const FORMAT_PARAGRAPH = 0;
        const FORMAT_UNORDERED_LIST = 1;
        const FORMAT_ORDERED_LIST = 2;
        
        /* 
         * Paragraph form parameter minimum/maximum values
         */
        const SENTENCE_MIN = 1;
        const SENTENCE_MAX = 40;
        const PARAGRAPH_MIN = 1;
        const PARAGRAPH_MAX = 40;

        /* 
         * Unordered/ordered list form parameter minimum/maximum values
         */
        const LIST_MIN = 5;
        const LIST_MAX = 100;
        const OUTPUT_TEXT = 0;
        const OUTPUT_HTML = 1;
        
        /* 
         * Theme file locations
         */
        const FILE_DIR = "./files/lorem";
        const FILE_LATIN = "latin.txt";
        const FILE_PYTHON = "python.txt";
        const FILE_MOVIE = "movie.txt";
        const FILE_LYRICS = "lyrics.txt";

        /* 
         * Current theme and related array of source sentences
         */
        public static $current_theme;
        private static $sentenceBase;

        /* 
         * fzaninotto/faker object
         */
        private static $faker;

        /* 
         * Public method to return generated text
         */
        public static function generateLorem($theme, $format, $num_sentences, $num_paragraphs, $num_items) {
                switch($format) {
                        case self::FORMAT_PARAGRAPH:
                                return self::generateParagraphs($theme, $num_sentences, $num_paragraphs);
                        case self::FORMAT_UNORDERED_LIST:
                                return self::generateUnorderedList($theme, $num_items);
                        case self::FORMAT_ORDERED_LIST:
                                return self::generateOrderedList($theme, $num_items);
                }
        }

        /* 
         * Method to call paragraph generation functions (Latin text handled
         * differently from other themes)
         */
        private static function generateParagraphs($theme, $num_sentences, $num_paragraphs) {
                if ($theme == self::THEME_LATIN) {
                        return self::generateLatinParagraphs($num_sentences, $num_paragraphs);
                } else {
                        return self::generateThemeParagraphs($theme, $num_sentences, $num_paragraphs);
                }
        }
        
        /* 
         * Method to generate tradition Latin paragraphs using fzaninotto/faker
         */
        private static function generateLatinParagraphs($num_sentences, $num_paragraphs) {
                if (is_null(self::$faker)) {
                        $faker = Factory::create();
                }
                $text = "";
                for ($i = 0; $i < $num_paragraphs; $i++) {
                        $text = $text . "<p>";
                        $text = $text . $faker->paragraph($num_sentences, true);
                        $text = $text . "</p>";
                }
                return $text;
        }
        
        /* 
         * Method to generate paragraphs based on specific (non-Latin) theme, using
         * sentenceBase array of sentences for currently selected theme.
         */
        private static function generateThemeParagraphs($theme, $num_sentences, $num_paragraphs) {
                self::loadTheme($theme);
                $text = "";
                for ($i = 0; $i < $num_paragraphs; $i++) {
                        $text = $text . "<p>";
                        for ($j = 0; $j < $num_sentences; $j++) {
                                if ($j > 0) {
                                        $text = $text . " ";
                                }
                                $text = $text . self::getThemeSentence(self::$sentenceBase);
                        }
                        $text = $text . "</p>";
                }
                return $text;
        }
        
        /* 
         * Method to call unordered list generation functions (Latin text handled
         * differently from other themes)
         */
        private static function generateUnorderedList($theme, $num_items) {
                if ($theme == self::THEME_LATIN) {
                        return self::generateLatinUnorderedList($num_items);
                } else {
                        return self::generateThemeUnorderedList($theme, $num_items);
                }
        }
        
        /* 
         * Method to generate tradition Latin unordered lists using fzaninotto/faker
         */
        private static function generateLatinUnorderedList($num_items) {
                if (is_null(self::$faker)) {
                        $faker = Factory::create();
                }
                $text = "<ul>";
                for ($i = 0; $i < $num_items; $i++) {
                        $text = $text . "<li>";
                        $text = $text . $faker->sentence(10, true);
                        $text = $text . "</li>";
                }
                $text = $text . "</ul>";
                return $text;
        }
        
        /* 
         * Method to generate unordered lists based on specific (non-Latin) theme, using
         * sentenceBase array of sentences for currently selected theme.
         */
        private static function generateThemeUnorderedList($theme, $num_items) {
                self::loadTheme($theme);
                $text = "<ul>";
                for ($i = 0; $i < $num_items; $i++) {
                        $text = $text . "<li>";
                                $text = $text . self::getThemeSentence(self::$sentenceBase);
                        $text = $text . "</li>";
                }
                $text = $text . "</ul>";
                return $text;
        }
        
        /* 
         * Method to call ordered list generation functions (Latin text handled
         * differently from other themes)
         */
        private static function generateOrderedList($theme, $num_items) {
                if ($theme == self::THEME_LATIN) {
                        return self::generateLatinOrderedList($num_items);
                } else {
                        return self::generateThemeOrderedList($theme, $num_items);
                }
        }
        
        /* 
         * Method to generate tradition Latin ordered lists using fzaninotto/faker
         */
        private static function generateLatinOrderedList($num_items) {
                if (is_null(self::$faker)) {
                        $faker = Factory::create();
                }
                $text = "<ol>";
                for ($i = 0; $i < $num_items; $i++) {
                        $text = $text . "<li>";
                        $text = $text . $faker->sentence(10, true);
                        $text = $text . "</li>";
                }
                $text = $text . "</ol>";
                return $text;
        }
        
        /* 
         * Method to generate ordered lists based on specific (non-Latin) theme, using
         * sentenceBase array of sentences for currently selected theme.
         */
        private static function generateThemeOrderedList($theme, $num_items) {
                self::loadTheme($theme);
                $text = "<ol>";
                for ($i = 0; $i < $num_items; $i++) {
                        $text = $text . "<li>";
                                $text = $text . self::getThemeSentence(self::$sentenceBase);
                        $text = $text . "</li>";
                }
                $text = $text . "</ol>";
                return $text;
        }
        
        /* 
         * Calls methods to reset self::$current_theme and load self::$sentenceBase
         * array of sentences from corresponding theme file, if newly selected 
         * (non-Latin) theme is different from currently selected theme.
         */
        private static function loadTheme($theme) {
                if (!is_null(self::$current_theme) || ($theme != self::$current_theme)) {
                        switch ($theme) {
                                case self::THEME_LATIN:
                                        break;
                                case self::THEME_PYTHON:
                                        self::$current_theme = self::THEME_PYTHON;
                                        self::$sentenceBase = self::createThemeArray(self::FILE_DIR, self::FILE_PYTHON);
                                        break;
                                case self::THEME_MOVIE:
                                        self::$current_theme = self::THEME_MOVIE;
                                        self::$sentenceBase = self::createThemeArray(self::FILE_DIR, self::FILE_MOVIE);
                                        break;
                                case self::THEME_LYRICS:
                                        self::$current_theme = self::THEME_LYRICS;
                                        self::$sentenceBase = self::createThemeArray(self::FILE_DIR, self::FILE_LYRICS);
                                        break;
                        }
                }
        }
        
        /* 
         * Creates self::$sentenceBase array of sentences from given theme
         * file. Skips comment line (those beginning with #)
         */
        private static function createThemeArray($fileDir, $fileName) {
                $new_theme_array = [];
                $new_sentence = "";
                if (strlen($fileDir) == 0) {
                        $theme_file = $fileName;
                } else {
                        $theme_file = $fileDir . "/" . $fileName;
                }
                $theme_file_ptr = fopen($theme_file, 'r') or die('Unable to open theme initialization file ' . $theme_file . ".");
                while (!feof($theme_file_ptr)) {
                        $new_sentence = trim(fgets($theme_file_ptr));
                        if ((strlen($new_sentence) > 0) && ((strpos($new_sentence, "#") === false) || (strpos($new_sentence, "#") != 0))) {
                                $new_theme_array[] = $new_sentence;
                        }
                }
                fclose($theme_file_ptr);
                return $new_theme_array;                
        }
        
        /* 
         * Returns random sentence from self::$sentenceBase array of sentences
         */
        private static function getThemeSentence($sentenceBase) {
                $total_sentences = count($sentenceBase);
                $random_index = rand(0, $total_sentences - 1);
                return $sentenceBase[$random_index];
        }
}
