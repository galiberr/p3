/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function()
{
        $("input[type=text][name=xkcd_add_this_num]").focus(function()
        {
                $("input[type=radio][name=xkcd_end_num]")[2].checked = true;
        });

        $("input[type=text][name=xkcd_add_this_char]").focus(function()
        {
                $("input[type=radio][name=xkcd_end_special]")[2].checked = true;
        });

});