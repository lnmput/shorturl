/**
 * Created by Administrator on 2016/1/9.
 */

$(document).ready(function(){
   $("#submit").click(function(){
       var url=$("#url").val();
       var token=$('input[name="_token"]').val();
       $.ajax({
           type:'post',
           url:'short',
           data:{url:url,_token:token},
           beforeSend:function(){$("#submit").html("生成中");},
           success:function(html){
                //返回带有状态码的json
                var messageinfo=JSON.parse(html);
               // alert(messageinfo['code']);
               if(messageinfo['code']==1){
                   $("#shorturl").html(messageinfo["message"]);
               }else{
                   $("#errorInfo").html(messageinfo["message"]).css('display','block');
                   $("#shorturl").html('');
               }
           },
           complete: function(){
               $("#submit").html("生成");
           },

       });
   });

    $("#url").focus(function(){
        $("#errorInfo").html('').css('display','none');
       // $("#shorturl").html('');
    });

    $("#shorturl").click(function(){
         var text= $("#shorturl").html();
         window.prompt("复制到剪贴版: Ctrl+C, Enter", text);
    });


    function copyToClipboard(text) {
        window.prompt("复制到剪贴板: Ctrl+C, Enter", text);
    }
});