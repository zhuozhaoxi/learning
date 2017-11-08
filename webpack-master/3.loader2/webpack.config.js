var path = require('path');
var HtmlwebpackPlugin = require('html-webpack-plugin');
var ROOT_PATH = path.resolve(__dirname);
var APP_PATH = path.resolve(ROOT_PATH, 'app');
var BUILD_PATH = path.resolve(ROOT_PATH, 'build');

module.exports = {
  entry: APP_PATH,
  output: {
    path: BUILD_PATH,
    filename: 'bundle.js'
  },
  module: {
    loaders: [
      {
        test: /\.css$/,
        loaders: ['style', 'css'],
        include: APP_PATH
      },
      {
        test: /\.(png|jpg)$/,
        // loaders: ['url']
        loader: 'url?limit=40000&name=.image/[name].[ext]'
      }
      /* 读取图片  url-loader 或者 file-loader */
      // url 会对图片进行base编码,不用拷贝文件到build  
      // ==> limit参数，当图片大小小于这个限制的时候，会自动启用base64编码图片,(本示例图片超过限制), 
      // ==> &name=./[name].[ext] 指定文件目录 [name]根据文件本身生成的名字
      // file 会正常拷贝文件
    ]
  },
  plugins: [
    new HtmlwebpackPlugin({
      title: 'Hello World app'
    })
  ],
  devServer: {
    historyApiFallback: true,
    hot: true,
    inline: true,
    progress: true,
  },
};