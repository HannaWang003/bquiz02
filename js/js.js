// JavaScript Document
function lo(th, url) {
  $.ajax(url, {
    cache: false,
    success: function (x) {
      $(th).html(x);
    },
  });
}
// function good(id,type,user)
// {
// 	$.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
// 	{
// 		if(type=="1")
// 		{
// 			$("#vie"+id).text($("#vie"+id).text()*1+1)
// 			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
// 		}
// 		else
// 		{
// 			$("#vie"+id).text($("#vie"+id).text()*1-1)
// 			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
// 		}
// 	})
// }
function good(news) {
  $.post(
    "./api/good.php",
    {
      news,
    },
    () => {
      location.reload();
      // switch ($("#n" + news).text()) {
      //   case "讚":
      //     $("#n" + news).text("收回讚");
      //     $("#g" + news).text($("#g" + news).text() * 1 + 1);
      //     break;
      //   case "收回讚":
      //     $("#n" + news).text("讚");
      //     $("#g" + news).text($("#g" + news).text() * 1 - 1);
      //     break;
      // }
    }
  );
}
