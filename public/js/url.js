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
           success:function(html){
                //返回带有状态码的json
                var messageinfo=JSON.parse(html);
               // alert(messageinfo['code']);
               if(messageinfo['code']==1){
                   $("#shorturl").html('您的短链:<a target="_blank"' +
                       ' href='+ messageinfo["message"]+'>'+messageinfo["message"]+'</a>');
               }else{
                   $("#errorInfo").html(messageinfo["message"]).css('display','block');
                   $("#shorturl").html('');
               }
           }

       });
   });

    $("#url").focus(function(){
        $("#errorInfo").html('').css('display','none');
       // $("#shorturl").html('');
    });
});