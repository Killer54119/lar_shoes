/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Common = {
    showError: function(errorMessages) {
        if(errorMessages) {
            for (msg in errorMessages) {
                obj = $("input[name='" + msg + "']").parent('td');
                $(obj).addClass('control-group error');
                $(obj).append(' <span class="help-inline">' + errorMessages[msg] + '</span>');
            }
        }
    },
    
}
        
/**
 * Validate data
 * @returns {undefined}
 */
$(function(){
    $('.numbersOnly input').keyup(function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
});
