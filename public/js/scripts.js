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


    $('#room_id').on('change', function(e){
        // console.log( $(this).val());
        $.ajax({
            url: url+"/ajax/get_rooms_rent/"+$(this).val(),
            type:'GET',
            // data: {"room_id": $(this).val()},
            success: function(data){
                console.log(data);
                $("#rent").val(data);
            }
        })
    })

    $(".payments").on("click", function(e){
        console.log(this.id);
        $.ajax({
            url: url+'/ajax/get_tenant_bill',
            type: 'POST',
            data: {"tenant_bill_id": this.id, "_token": CSRF_TOKEN},
            success: function(result){
                $("#amount").val(result.amount)
                $("#tenant_id").val(result.tenant_id)
            }
        })
    })

    $(".make_payment").on("click", function(e){
        // console.log($("#discount").val());
        // console.log($("#amount").val());

        $.ajax({
            url: url+'/ajax/post_tenant_bill',
            type: 'POST',
            data: {
                "amount": $("#amount").val(), 
                "discount": $("#discount").val(), 
                "tenant_id": $("#tenant_id").val(),
                "_token": CSRF_TOKEN 
            },
            success: function(result){
                if(result.status == 1){
                    $(".btn-default").click();
                    alert(result.message);
                }
            }
        })
    })

    $("#edit_settings").on("click", function(e){
        
    })
    
})


