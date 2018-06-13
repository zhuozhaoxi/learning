
// 当前脚本名称
console.log("__filename\t" + __filename);
// 当前脚本所在目录
console.log("__dirname\t" + __dirname);

/**
 * process  用于描述当前Node.js 进程状态的对象，提供了一个与操作系统的简单接口
 */

/**
 * 1.使用process监听程序执行周期
 * exit  beforeExit uncaughtException Signal事件
 */
process.on('exit', function(code) {

    // 以下代码永远不会执行
    setTimeout(function() {
        console.log("该代码不会执行");
    }, 0);

    console.log('退出码为:', code);
});


/**
 * 2.使用process属性
 */
// 输出到终端
process.stdout.write("Hello World from stdout!" + "\n");

// 通过参数读取
process.argv.forEach(function(val, index, array) {
    console.log(index + ': ' + val);
});

// 获取执行路径
console.log("执行路径process.execPath：",process.execPath);

// 平台信息
console.log("平台信息process.platform：",process.platform);

/**
 * 3.使用process方法
 */
// 输出当前目录
console.log('当前目录: ',process.cwd());

// 输出当前版本
console.log('当前版本: ',process.version);
// 输出内存使用情况
console.log("内容使用：",process.memoryUsage());

console.log("程序执行结束");

