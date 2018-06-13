const path = require("path");
publishPath = path.resolve('./publish');
pathName = "/";
console.log(path.resolve('./publish'));

let mPath = path.join(publishPath, pathName);

console.log(mPath);