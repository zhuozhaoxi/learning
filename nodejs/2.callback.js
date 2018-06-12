/**
 * Created by zhuozhaoxi on 2018/6/12.
 */

// 同步
var fs = require("fs");

var data = fs.readFileSync('input.txt');

console.log(data.toString());
console.log("程序执行结束!");
// 文件内容
// 程序执行结束

// 执行异步操作的函数将回调函数作为最后一个参数， 回调函数接收错误对象作为第一个参数。

// 异步
var fs = require("fs");

fs.readFile('input.txt', function (err, data) {
    if (err) return console.error(err);
    console.log(data.toString());
});

console.log("程序执行结束!");

// 程序执行结束
// 错误/文件内容