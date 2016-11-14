define('./require',function (require,exports,module) {
  console.log('require入口');
  console.log('id:'+module.id);
  function Require(container) {
    this.container = container;
    console.log(container);
  }
// exports只是module.exports的一个引用
  module.exports = Require;
  // console.log(module.id);
  // 模块标识，缺省情况下，默认为文件路径
  Require.prototype.say = function() {
    console.log(this.container);
  }
  console.log('require出口');
});
