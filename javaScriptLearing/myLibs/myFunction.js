// 回调栈,应用场景 ajax多重由横向解成竖向
var StackCallback = function(){
    var stack; //方法栈

    return {
        push : function(addFun){
            if (typeof addFun != 'function') {
                throw Error('参数类型错误');
            }
            
            var oldStack = stack;
            if(typeof oldStack == 'function'){
                stack = function(){
                    var tmpCallback = arguments[0];
                    var tmp = function(){
                        Array.prototype.unshift.call(arguments,tmpCallback);
                        addFun.apply(this,arguments);
                    };
                    arguments[0] = tmp;
                    oldStack.apply(this,arguments);
                }

            }else{
                stack = function(){
                    addFun.apply(this,arguments);
                };
            }
        },
        run : function(){
            if(typeof stack == 'function'){
                var tmp = function(){};
                Array.prototype.unshift.call(arguments,tmp);
                console.log(arguments);
                console.log('-------------------------');
                stack.apply(this,arguments);
            }
        }
    }
}

var stack = StackCallback();
stack.push(function(callback,a){
    var pArgument = arguments;
    setTimeout(function(){
        console.log('第1步');
        console.log('接受参数为：');
        console.log(pArgument);
        if (typeof callback == 'function') {
        console.log('传入下一步的参数:'+(a+1));
        console.log('-----------------------------');
            callback(a+1);
        }
    },1000);
});
stack.push(function(callback,a){
    var pArgument = arguments;
    setTimeout(function(){
        console.log('第2步');
        console.log('接受参数为：');
        console.log(pArgument);
        if (typeof callback == 'function') {
        console.log('传入下一步的参数:'+(a+1));
        console.log('-----------------------------');
            callback(a+1);
        }
    },1000);
});
stack.push(function(callback,a){
    var pArgument = arguments;
    setTimeout(function(){
        console.log('第3步');
        console.log('接受参数为：');
        console.log(pArgument);
        if (typeof callback == 'function') {
        console.log('传入下一步的参数:'+(a+1));
        console.log('-----------------------------');
            callback(a+1);
        }
    },1000);
});
stack.push(function(callback,a){
    var pArgument = arguments;
    setTimeout(function(){
        console.log('第4步');
        console.log('接受参数为：');
        console.log(pArgument);
        if (typeof callback == 'function') {
        console.log('传入下一步的参数:'+(a+1));
        console.log('-----------------------------');
            callback(a+1);
        }
    },1000);
});
stack.push(function(callback,a){
    var pArgument = arguments;
    setTimeout(function(){
        console.log('第5步');
        console.log('接受参数为：');
        console.log(pArgument);
        if (typeof callback == 'function') {
        console.log('传入下一步的参数:'+(a+1));
        console.log('-----------------------------');
            callback(a+1);
        }
    },1000);
});
stack.run(1);

/**********************************************************************************************/

// 方法栈
var StackFunction = function(){
    var stack;
    return {
        push : function(addFun){
            if (typeof addFun != 'function') {
                throw Error('参数类型错误');
            }

            var oldStack = stack;
            if(typeof oldStack == 'function'){
                stack = function(){
                    oldStack.apply(this,arguments);
                    addFun.apply(this,arguments);
                }
            }else{
                stack = addFun;
            }
        },
        run : function(){
            if(typeof stack == 'function'){
                stack.apply(this,arguments);
            }
        }
    }
}

var stack = StackFunction();
stack.push(function(a,b){
    console.log('我是第一个方法,输出b参数:'+b);
    console.log(b);
});
stack.push(function(a){
    setTimeout(function(){
        console.log('我是第2个方法,输出a参数:'+a);
        console.log(a);
    },1000);
});
stack.push(function(a,b,c){
    console.log('我是第3个方法,输出c参数:'+c);
    console.log(c);
});
stack.run({a:1},{b:2},4);


