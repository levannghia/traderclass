<script>
    $(function(){
        $(".btn_subcribe").click(function(){
            var _token = $('meta[name="csrf-token"]').attr('content');
            var data_form = $("#form_subcribe").serialize();
            $.ajax({
                url: "/subcribe",
                type: "POST",
                data: "_token="+_token + "&" + data_form,
                beforeSend:function(){
                    console.log("da gui post len")
                    $(".error_cate").hide();
                    $(".error_input").hide();
                    $(".error_agree").hide();
                },
                success:function(data){
                    console.log(data)
                    if(!data.status){
                        data.error.course_category_id!=undefined?$(".error_cate").html(data.error.course_category_id).show():"";
                        data.error.email!=undefined?$(".error_input").html(data.error.email).show():"";
                        data.error.agree_chk!=undefined?$(".error_agree").html(data.error.agree_chk).show():"";
                    }else{
                        swal("Sucessfuly, Thank you!", "We're will contact soon!", "success").then((value) => {
                            if (value) {
                                location.reload();
                            }
                            if (value == null) {
                                location.reload();
                            }
                        });
                    }
                },
            });
        });
    });
</script>