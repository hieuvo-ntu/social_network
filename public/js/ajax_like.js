$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function ajax_like(id,css){
    $.post("like",
        {
            post_id:id,

        },
        function(data){
            css.html(data.count_like)
        });
}