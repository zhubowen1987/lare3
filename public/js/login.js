$("input[type='submit']").click(function(){//login  and  register  submit ajax
    var datau = $(this).attr("datau");
    var postattr = new Array();
    var ajaxurl = "/users/login";
    if(datau == "register"){//if register
        ajaxurl = "/users/register";
        postattr = {username:$("input[name='username']").val(),
            password:$("input[name='password']").val(),
            _token:$("input[name='_token']").val()};//json字符串即可
    }else {//if login
        postattr = {username:$("input[name='username']").val(),
                    password:$("input[name='password']").val(),
                    _token:$("input[name='_token']").val()};//json字符串即可
    //postattr = JSON.parse(postattr);
    }
        $.ajax({
        type:"post",
        url:ajaxurl,
        data:postattr,
        dataType: 'json',
        success:function (data){
            if(data.status === 0){
                location.href = "/show/index";
            }else if(data.status === 1){
                var field = data.field;
                $("input[name='"+field+"']").next().html(data.msg);
            }
        }
    })
})
$(".login_register").click(function(){//login and register  click  submit button
    var href = $(this).attr("hrefu");
    location.href=host+href;})