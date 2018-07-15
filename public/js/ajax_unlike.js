$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function ajax_unlike(id,css){
    $.post("unlike",
        {
            post_id:id,

        },
        function(data){
            css.html(data.count_like)
        });
}