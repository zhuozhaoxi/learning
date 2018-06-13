const path = require("path");
publishPath = path.resolve('./public');
pathName = "/";
console.log(path.resolve('./public'));

let mPath = path.join(publishPath, pathName);

console.log(mPath);