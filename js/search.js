$(document).ready(function() {
    $("#btnThings").click(function() {
        var things = $("#txtThings").val();
        $.ajax({
            url:"../process-search.php",
            type:'post',
            data:{guiDi: things},
            success: function(traVe) {
                alert('Tôi đã nhận được:'+traVe);
            }
        })
    })

})