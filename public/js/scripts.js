$(function(){
    var url = $('meta[name="base_url"]').attr('content');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $("#room_category_id").on("change", function(e){
        $.ajax({
            url: url+"/ajax/get_rooms_by_category",
            type:'POST',
            data: {"room_category_id":$(this).val(),"_token": CSRF_TOKEN},
            success:function(data) {
                $("#rooms_select option").remove();
                $.each(data, function(e){
                    let rooms = "<option value='"+data[e].id+"'>"+data[e].name+"</option>";
                    $(rooms).appendTo("#rooms_select");
                });
            }
        });
    })

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    
})


