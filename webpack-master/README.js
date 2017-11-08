// ----------------------------------------------------------------------------------
// 基本步骤
// ----------------------------------------------------------------------------------
1、创建目录，进去目录内，npm init命令 配置 package.json文件

// 必须要在目录安装webpack
2、安装webpack npm install webpack --save-dev

//安装插件html-webpack-plugin，可以自动快速的帮我们生成HTML。
3、命令 npm install html-webpack-plugin --save-dev

4、创建 webpack.config.js 文件，写config文件
// 有了webpack.config.js 目录才会识别webpack命令
// 配置多入口 
entry: {bunld: SRC_PATH+'/main',bunld2: SRC_PATH+'/sub'}
  ,output: {
    path: DIST_PATH,
    filename : '[name].js'
  }

(到2.loader)
5、添加loader 解析 css等
//  要解析什么文件，就安装相应的loader,如 npm install css-loader style-loader --save-dev
//  使用scss写css  安装 scss-loader css-loader style-loader
module: {
  loaders: [
      {
      test: /\.scss$/,
      loaders: ['style', 'css', 'sass'],
      include: APP_PATH
    },
  ]
}

(到3.loader2)
6、处理图片和其他静态文件
file-loader , url-loader

(到5.vue)(5.1.vue使用index.html文件作为模板自动生成html文件)
7、多文件入口，vue起步

// ----------------------------------------------------------------------------------
// something 关于package.json 和 webpack.config.js
// ----------------------------------------------------------------------------------
package.json   npm配置,包含项目基本信息（项目入口及框架依赖等）以及自定义的快捷命令
webpack.config.js webpack配置,包含项目配置信息，插件，loader等的配置

// 项目拷贝
// 拷贝 app目录,json 及 config 文件， 启动npm install  会自动根据json文件安装相关module


// ----------------------------------------------------------------------------------
// 插件
// ----------------------------------------------------------------------------------
1、webpack-dev-server （自动刷新页面）
命令：npm install webpack-dev-server --save-dev  也可以安装在全局 -g
config： 
module.exports = {
  ....
  devServer: {
    historyApiFallback: true,
    hot: true,
    inline: true,
    progress: true,
  },
  ...
}

json:
运行的命令,npm支持自定义一些命令 调用 npm start
"scripts": {
  "start": "webpack-dev-server --hot --inline"
},


2、html-webpack-plugin （自动生成页面）
// 此插件依赖于webpack（必须在项目内安装webpack，全局安装没用）
var HtmlwebpackPlugin = require('html-webpack-plugin');
module.exports = {
.....
plugins: [
    new HtmlwebpackPlugin({
      title: 'Hello World app'
    })
  ]
.....
};


