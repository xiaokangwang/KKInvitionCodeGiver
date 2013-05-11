/*
KeyGet  -- a tool to give key to user.

==========================================================

In this file we proceed AJAX request in browser.

==========================================================
*/

kkgetkey_go=function(){
var  userchallenge =  sessionStorage.userchallenge;
var htmlobj=$.ajax({url:"proceedGetKey.php",
					async:true,
					cache:false,
					timeout:60000,
					type:"POST",
					data: "userchallenge="+userchallenge,
					success: function(datas){
						$("#result").text(datas);
						}
/*
					error: function (xhr, ajaxOptions, thrownError) {
						$("#result").val("ERROR :(");
						console.log( xhr.status + thrownError);
*/
      }
					);

$("#getbtn").attr("disabled", "disabled");
$("#result").text("WAIT...");
}

kkgetkey_init=function(){
$("#getbtn").click(function(){kkgetkey_go();});
}