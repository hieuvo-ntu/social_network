function getDropdown(type){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var pagename;
    if(type=='notification'){
        pagename="getNotification";
    }

    $.post(pagename,function (data) {
        $('.detailNotifi').html(data);
    })
}