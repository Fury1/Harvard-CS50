/**
 * scripts.js
 *
 * Automotive Toolbox
 * 
 *
 * Form Scripts
 */
 

$(function() {
     
     // gear ratio call
    $('#gearratio').submit(function () {
        $.post('gearratio.php', 
        $('#gearratio').serialize(),         
            function (data, textStatus) {
                $('#result-gear').html(data);
            });
        return false;
    });

    // mph correct call
    $('#mphcorrect').submit(function () {
        $.post('mphcorrect.php', 
        $('#mphcorrect').serialize(),         
            function (data, textStatus) {
                $('#result-mph').html(data);
            });
        return false;
    });
        
        // rpm call
        $('#rpm').submit(function () {
        $.post('rpm.php', 
        $('#rpm').serialize(),         
            function (data, textStatus) {
                $('#result-rpm').html(data);
            });
        return false;
    });
});
