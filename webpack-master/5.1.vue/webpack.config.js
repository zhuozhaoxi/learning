var path = require('path');
var ROOT_PATH = path.resolve(__dirname);
var SRC_PATH = path.resolve(ROOT_PATH,'src');
var DIST_PATH = path.resolve(ROOT_PATH,'dist');
var HtmlWebpackPlugin = require('html-webpack-plugin');
module.exports = {
	entry: {bunld: SRC_PATH+'/main',bunld2: SRC_PATH+'/sub'}
	// bunld 作为[name]实际值
	,output: {
		path: DIST_PATH,
		filename : '[name].js'
	}
	,module: {
		loaders : [
			{ test: /\.css$/, loader: "style!css" },
			{ test: /\.(jpg|png)$/, loader: "url?limit=8192&name=./image/[name].[ext]"}
		]
	},
	plugins: [
		new HtmlWebpackPlugin({
      		// favicon:path.join(__dirname,'src/favicon.ico'),  //网址icon
			title: 'Hello Vue',
			template: path.join(__dirname,'index.html'),	// 模板文本路径
      		// inject: false   // 是否需要自动引用 生成的js文件,默认true
		})
	]
}