/*
$('#insertDraft').submit(function(){
    return false;
});
$('#insert').click(function(){
    $.post(     
        $('#insertDraft').attr('action'),
        $('#insertDraft :input').serializeArray(),
        function(result){
            $('#result').html(result);
        }
    );
});
*/
/*
$(document).ready(function(){
    $("#insertDraft").submit(function(e){
        e.preventDefault();
        var title = $("#js_personal_title").val();;
        var decs= $("#js_personal_desc").val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/jobseeker/add_personal',
            data: {title:title,decs:decs},
            success:function(data)
            {
                alert('SUCCESS!!');
            },
            error:function()
            {
                alert('fail');
            }
        });
    });
});
*/
$(document).ready(function() {
 /*
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
 */
    $('#insertDraft').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);
            }
        })
        return false;
    });
})