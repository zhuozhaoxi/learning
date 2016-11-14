require.config({
	baseUrl: '/another/path',	// 基路径， 
	// 默认以baseUrl+paths的方式加载文件，当moduleID 以 ".js" 结束. 以 "/" 开始. 包含 URL 协议, 如 "http:" or "https:". 就直接将其加载为一个相对于当前HTML文档的脚本：
	paths:{
		some : "some/v1.0"
	},			// 定义路径缩写
	// 设置path时起始位置是相对于baseUrl的，除非该path设置以"/"开头或含有URL协议（如http:）。
	// 在上述的配置下，"some/module"的script标签src值是"/another/path/some/v1.0/module.js"。
    // paths备错配置,paths配置项允许数组值
    // enforceDefine: true,
    // paths: {
    //     jquery: [
    //         'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min',
    //         //If the CDN location fails, load from this location
    //         'lib/jquery'
    //     ]
    // }

// shim: 为那些没有使用define()来声明依赖关系、设置模块的"浏览器全局变量注入"型脚本做依赖和导出配置。
    shim: {},

    // map,对于给定的模块前缀，使用一个不同的模块ID来加载该模块。解决加载不同版本的框架问题
    map: {},
	
    waitSeconds: 15,//在放弃加载一个脚本之前等待的秒数。设为0禁用等待超时。默认为7秒。

    // config:常常需要将配置信息传给一个模块。
    config : {
        'bar': {
            size: 'large'
        },
        'baz': {
            color: 'blue'
        }
    },
    //bar.js which uses simplified CJS wrapping:
    // define(function (require, exports, module) {
    //     //Will be the value 'large'
    //     var size = module.config().size;    //color
    // });

    //baz.js which uses a dependency array,
    // define(['module'], function (module) {
    //     //Will be the value 'blue'
    //     var color = module.config().color;  //blue
    // });

    // urlArgs: RequireJS获取资源时附加在URL后面的额外的query参数。作为浏览器或服务器未正确配置时的“cache bust”手段很有用。使用cache bust配置的一个示例：
    urlArgs: "bust=" +  (new Date()).getTime()
});
	// 在文本模版之类的场景中使用require.toUrl()时它也会添加合适的后缀。





requirejs.config({
    //Remember: only use shim config for non-AMD scripts,
    //scripts that do not already call define(). The shim
    //config will not work correctly if used on AMD scripts,
    //in particular, the exports and init config will not
    //be triggered, and the deps config will be confusing
    //for those cases.
    shim: {
        'backbone': {
            //These script dependencies should be loaded before loading
            //backbone.js
            deps: ['underscore', 'jquery'],
            //Once loaded, use the global 'Backbone' as the
            //module value.
            exports: 'Backbone'
        },
        'underscore': {
            exports: '_'
        },
        'foo': {
            deps: ['bar'],
            exports: 'Foo',
            init: function (bar) {
                //Using a function allows you to call noConflict for
                //libraries that support it, and do other cleanup.
                //However, plugins for those libraries may still want
                //a global. "this" for the function will be the global
                //object. The dependencies will be passed in as
                //function arguments. If this function returns a value,
                //then that value is used as the module export value
                //instead of the object found via the 'exports' string.
                //Note: jQuery registers as an AMD module via define(),
                //so this will not work for jQuery. See notes section
                //below for an approach for jQuery.
                return this.Foo.noConflict();
            }
        }
    }
});

//Then, later in a separate file, call it 'MyModel.js', a module is
//defined, specifying 'backbone' as a dependency. RequireJS will use
//the shim config to properly load 'backbone' and give a local
//reference to this module. The global Backbone will still exist on
//the page too.
define(['backbone'], function (Backbone) {
  return Backbone.Model.extend({});
});