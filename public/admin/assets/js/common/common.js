var $rows = $('.table .data ');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});


// Delete Confirm Modal
$('.myBtn').click(function(){
    $('#myModal').css('display','block')
    $('#customerId').val($(this).attr('data'))
})
$('.close').click(function(){
    $('#myModal').css('display','none');
});
window.onclick = function(event) {
    if (event.target == $('#myModal')) {
        $('#myModal').css('display','none');
    }
}

$('table.table tr.data').click(function(e){
    if(e.target.tagName == "TD"){
        window.location.href = $(this).data('url');
    }
})
