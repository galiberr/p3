/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function()
{
        $("input[type=radio][name=lorem_format]").change(function()
        {
                switch ($("input[type=radio][name=lorem_format]:checked").val()) {
                        case 'paragraph':
                                $('#lorem_num_sentences_div').show();
                                $('#lorem_num_paragraphs_div').show();
                                $('#lorem_num_items_div').hide();
                                break;
                        case 'unordered_list':
                                $('#lorem_num_sentences_div').hide();
                                $('#lorem_num_paragraphs_div').hide();
                                $('#lorem_num_items_div').show();
                                break;
                        case 'ordered_list':
                                $('#lorem_num_sentences_div').hide();
                                $('#lorem_num_paragraphs_div').hide();
                                $('#lorem_num_items_div').show();
                                break;
                }
        });
        
        $("input[type=radio][name=rug_output]").change(function()
        {
                switch ($("input[type=radio][name=rug_output]:checked").val()) {
                        case 'mysql':
                                $('#rug_csv_parm_div').hide();
                                break;
                        case 'yaml':
                                $('#rug_csv_parm_div').hide();
                                break;
                        case 'json':
                                $('#rug_csv_parm_div').hide();
                                break;
                        case 'php':
                                $('#rug_csv_parm_div').hide();
                                break;
                        case 'csv':
                                $('#rug_csv_parm_div').show();
                                break;
                }
        });
        
        
});