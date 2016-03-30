/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function()
{
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
        
        $("button[type=submit][name=rug_submit]").click(function()
        {
                $.each($("select[id=rug_available_fields] option"), function(){
                        $(this).attr('selected', true);
                });
                $.each($("select[id=rug_selected_fields] option"), function(){
                        $(this).attr('selected', true);
                });
        });
});