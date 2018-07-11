/**
 *  使用 superagent 与 cheerio 完成简单爬虫
 *  1、使用 superagent 抓取网页
 *  2、使用 cheerio 分析网页
 *  superagent(http://visionmedia.github.io/superagent/ ) 是个 http 方面的库，可以发起 get 或 post 请求。
 *  cheerio(https://github.com/cheeriojs/cheerio )
 *  大家可以理解成一个 Node.js 版的 jquery，用来从网页中以 css selector 取数据，使用方式跟 jquery 一样的。
 *
 *  主要使用方法
 *  superagent.get(url).end(function(err,sres){   sres.text : 网页的内容  })
 *  var $ = cheerio.load(sres.text);  // 获取根据text实例化出来的html实体
 *  $(".selector").html();  // 可以使用jquery类似的语法
 **/
var express = require("express");
var superagent = require("superagent");
var cheerio = require("cheerio");
var url = require("url");
var app = express();

// 第一版 superagent + cheerio 简单的拉取标题，链接和作者
app.get('/',function(request,response,next){
    var cnodeUrl = "https://cnodejs.org/";
    superagent.get(cnodeUrl)
        .end(function(err, res){
            // 常规的错误处理
            if(err){
                next(err);
            }

            var items = [];
            var $ = cheerio.load(res.text);
            $('#topic_list .cell').each(function(index,row){
                var $element = $(row);
                var $title = $element.find('.topic_title');
                var $user = $element.find('.user_avatar img');
                items.push({
                    title: $title.attr('title'),
                    href: url.resolve(cnodeUrl, $title.attr('href') ),
                    author : $user.attr('title')
                });
            });
            response.send(items);
        });
});

// 第二版 进阶， 使用eventproxy 获取每篇文章的第一条评论
/**
 * git API : https://github.com/JacksonTian/eventproxy
 *  使用方式,
 *  1、多种类型的异步协作
 *  EventProxy.create(eventList... , callback)  or  eventProxyObj.all([],callback)   等到指定的所有事件触发后，调用回调
 *  var ep = EventProxy.create("event1", "event2", "event3", function (event1Data, event2Data, event3Data) {
 *      _.template(event1Data, event2Data, event3Data);
 *  });
 *  $.get("template1", function (template) {
 *      // something
 *      ep.emit("event1", template);
 *  });
 *  $.get("template2", function (template) {
 *      // something
 *      ep.emit("event2", template);
 *  });
 *
 *  2、同种类型的多次重复协作
 *  epObj.after( event, emitTime, callback)
 *  // someThing事件被emit 10次之后 调用回调函数, lists 是一个包含了前面10次emit事件参数的数组
 *  epObj.after( 'someThing', 10, function(lists){} )
 **/
var eventproxy = require("eventproxy");
var ep = new eventproxy();
app.get('/comment',function(request,response,next){
    var cnodeUrl = "https://cnodejs.org/";
    superagent.get(cnodeUrl)
        .end(function(err, res){
            // 常规的错误处理
            if(err){
                next(err);
            }

            var items = [];
            var $ = cheerio.load(res.text);
            $('#topic_list .cell').each(function(index,row){
                var $element = $(row);
                var $title = $element.find('.topic_title');
                var $user = $element.find('.user_avatar img');
                items.push({
                    title: $title.attr('title'),
                    href: url.resolve(cnodeUrl, $title.attr('href') ),
                    author : $user.attr('title')
                });
            });

            // 这里有个问题。并发数太多的话。服务器会返回503  反爬虫机制??
            // 要想法办法控制并发数
            items = items.slice(0,2);

            ep.after( 'detail', items.length, function(lists){
                lists.forEach(function(detail, idx){
                    $ = cheerio.load(detail.text);
                    var $comment = $(".reply_content .markdown-text").eq(0);
                    items[idx] && (items[idx]['comment'] = $comment.text());
                });
                response.send(items);
            });

            // 进入文章详情页，获取第一条评论内容
            // group秉承done函数的设计，它包含异常的传递。同时它还隐含了对返回数据进行编号，在结束时，按顺序返回。
            items.forEach(function(item){
                superagent.get(item.href).end(ep.group("detail"));
            });

            ep.fail(function(err){
                next(err);
            });
        });
});


app.listen(8080,function(){});
