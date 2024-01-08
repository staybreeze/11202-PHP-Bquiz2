// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}

// 方法一:透過reload重整畫面，重新讀取資料庫的資料(流量需求大)
// function good(news){
// 	$.post("./api/good.php",{news},()=>{
// 		location.reload();
// 	})
// }

// 方法二:不透過AJAX修改資料，並且不用透過RELOAD重整畫面(流量需求小)
function good(news){
	$.post("./api/good.php",{news},()=>{

		switch($("#n"+news).text()){
			case "讚":
				$("#n"+news).text("收回讚")
				$("#g"+news).text($("#g"+news).text()*1+1)
			break;
			case "收回讚":
				$("#n"+news).text("讚")
				$("#g"+news).text($("#g"+news).text()*1-1)
			break;
		} 
	})
}