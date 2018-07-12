
/*
function getSearchUser(value){
    var s=value;
    alert(s);
    $.post("ajaxSearchUser",{query:s},function(data){
        console.log("3223");
       if($(".search_results_footer_empty")[0]){
           $(".search_results_footer_empty").toggleClass("search_results_footer");
           $(".search_results_footer_empty").toggleClass("search_results_footer_empty");
       }
       $('.search_results').html(data);
       $('.search_results_footer').html("<a href='search"+value+"'>Xem tất cả</a>");
       if(data==""){
           $('.search_results_footer').html("");
           $('.search_results_footer').toggle("search_results_footer_empty");
           $('.search_results_footer').toggleClass("search_results_footer");
       }
    });
}*/
function getSearchUser(s) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url:'ajaxSearchUser',
        data:{search:s},
        success:function (data) {
            if($(".search_results_footer_empty")[0]){
                $(".search_results_footer_empty").toggleClass("search_results_footer");
                $(".search_results_footer_empty").toggleClass("search_results_footer_empty");
            }
            $('.search_results').html(data);
            $('.search_results_footer').html("<a href='search"+s+"'>Xem tất cả</a>");
            if(data==""){
                $('.search_results_footer').html("");
                $('.search_results_footer').toggle("search_results_footer_empty");
                $('.search_results_footer').toggleClass("search_results_footer");
            }
        }

    });
}