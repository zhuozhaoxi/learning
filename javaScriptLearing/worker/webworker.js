var i = 0;  
  
function timeCount(){  
    i = i + 1;  
    postMessage(i);//postMessage是Worker对象的方法，用于向html页面回传一段消息  
    setTimeout("timeCount()",500);//定时任务  
}  
  
timeCount();//加1计数,每500毫秒调用一次  

addEventListener('message',function(e){		// 接收从主线程（html页面）得到的消息。
	console.log('页面传递:'+e.data);
	i = e.data;
});

/*
onmessage = function(e){	// 效果同上 addEventListener('message') = onmessage，
	console.log(e.data);
	i = e.data;
}
*/

// close(); // 关闭工作线程