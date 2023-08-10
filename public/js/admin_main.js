// $('.btn_login').on('click',function(){
//    alert('ssss')
//     var user_name = $(".user_name").val().trim();
//     var pass = $(".pass").val().trim();
//
//     $.ajax({
//         url:'http://localhost:8000/admin/login',
//         type: 'post',
//         data:{'user_name':user_name,'pass':pass},
//         dataType:'json',
//         success:function(res){
//             //console.log(res.empty_fields);
//             if(res.empty_fields.length > 0){
//                 for(let i=0; i<res.empty_fields.length; i++){
//                      $('.' + res.empty_fields[i]).addClass("border-danger");
//                 }
//                 $(".error_mes").html("<div class = 'alert alert-danger'>" + res.error_mes + "</div>");
//             } else{
//                 if(res["success_mes"] !== undefined){
//                     $(".error_mes").html("<div class = 'alert alert-success'>" + res.success_mes + "</div>");
//                     setTimeout(function(){
//                         window.location.href = res.url
//                     },500)
//                 }
//                 else{
//                     $(".error_mes").html("<div class = 'alert alert-danger'>" + res.error_mes + "</div>");
//                 }
//             }
//         }
//     })
// })
//
// $('.user_name').on('keyup',function(){
//     $('.user_name').removeClass("border-danger");
// })
// $('.pass').on('keyup',function(){
//     $('.pass').removeClass("border-danger");
// })
//
