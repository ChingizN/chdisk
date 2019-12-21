console.log('Hello World');

$('.status').click(function() {
    var id = $(this).attr('value');
    $.ajax({
        dataType: 'json',
        url: '/ticket/status-change/' + id,
        success: function(value){
            $('#status\\.'+id).removeAttr('class').html(['Тикет закрыт']).addClass('text-success pull-xs-right');
        },
        error: function (){
            alert('error!');
        }
    });
});