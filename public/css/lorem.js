/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function()
{
        $("input[type=radio][name=lorem_format]").ready(function()
        {
                switch ($("input[type=radio][name=lorem_format]:checked").val()) {
                        case '0':
                                $('#lorem_num_sentences_div').show();
                                $('#lorem_num_paragraphs_div').show();
                                $('#lorem_num_items_div').hide();
                                break;
                        case '1':
                                $('#lorem_num_sentences_div').hide();
                                $('#lorem_num_paragraphs_div').hide();
                                $('#lorem_num_items_div').show();
                                break;
                        case '2':
                                $('#lorem_num_sentences_div').hide();
                                $('#lorem_num_paragraphs_div').hide();
                                $('#lorem_num_items_div').show();
                                break;
                }
        });
              
        $("input[type=radio][name=lorem_format]").change(function()
        {
                switch ($("input[type=radio][name=lorem_format]:checked").val()) {
                        case '0':
                                $('#lorem_num_sentences_div').show();
                                $('#lorem_num_paragraphs_div').show();
                                $('#lorem_num_items_div').hide();
                                break;
                        case '1':
                                $('#lorem_num_sentences_div').hide();
                                $('#lorem_num_paragraphs_div').hide();
                                $('#lorem_num_items_div').show();
                                break;
                        case '2':
                                $('#lorem_num_sentences_div').hide();
                                $('#lorem_num_paragraphs_div').hide();
                                $('#lorem_num_items_div').show();
                                break;
                }
        });
});