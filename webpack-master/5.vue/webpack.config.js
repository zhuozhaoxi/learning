var path = require('path');
var ROOT_PATH = path.resolve(__dirname);
var SRC_PATH = path.resolve(ROOT_PATH,'src');
var DIST_PATH = path.resolve(ROOT_PATH,'dist');

module.exports = {
	entry: {bunld: SRC_PATH+'/main',bunld2: SRC_PATH+'/sub'}
	,output: {
		path: DIST_PATH,
		filename : '[name].js'
	}
	,module: {
		loaders : [
			{ test: /\.css$/, loader: "style!css" },
			{ test: /\.(jpg|png)$/, loader: "url?limit=8192&name=./image/[name].[ext]"}
		]
	}
}