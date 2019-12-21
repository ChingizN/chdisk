$('#check').click(function() {
    var id = 2;
    $.ajax({
        dataType: 'json',
        url: '/cticket',
        success: function(){
            console.log('test');
        },
        error: function (){
            $(this).addAttr(checked);
        }
    });
});