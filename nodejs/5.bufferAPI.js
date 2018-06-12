/**
 * Created by zhuozhaoxi on 2018/6/12.
 */
/**
 * 缓存区合并
 * Buffer.concat(list[, totalLength])
 * 参数:
 * list - 用于合并的 Buffer 对象数组列表。
 * totalLength - 指定合并后Buffer对象的总长度。
 * -------
 * 返回一个多个成员合并的新 Buffer 对象
 */
var buffer1 = Buffer.from(('菜鸟教程'));
var buffer2 = Buffer.from(('www.runoob.com'));
var buffer3 = Buffer.concat([buffer1,buffer2]);
console.log("buffer3 内容: " + buffer3.toString());   // buffer3 内容: 菜鸟教程 www.runoob.com

/**
 * 缓冲区比较
 * buf.compare(otherBuffer);
 * -------
 * 返回一个数字，表示 buf 在 otherBuffer 之前，之后或相同。
 */
var buffer4 = Buffer.from('ABC');
var buffer5 = Buffer.from('ABCD');
var result = buffer4.compare(buffer5);

if(result < 0) {
    console.log(buffer4 + " 在 " + buffer5 + "之前");
}else if(result == 0){
    console.log(buffer4 + " 与 " + buffer5 + "相同");
}else {
    console.log(buffer4 + " 在 " + buffer5 + "之后");
}

/**
 * 拷贝缓冲区, 将buf拷贝到targetBuffer上
 * buf.copy(targetBuffer[, targetStart[, sourceStart[, sourceEnd]]])
 *  targetBuffer - 要拷贝的 Buffer 对象。
 *  targetStart - 数字, 可选, 默认: 0
 *  sourceStart - 数字, 可选, 默认: 0
 *  sourceEnd - 数字, 可选, 默认: buffer.length
 */
var buff1 = Buffer.from('abcdefghijkl');
var buff2 = Buffer.from('RUNOOB');

//将 buf2 插入到 buf1 指定位置上
buff2.copy(buff1, 10);

console.log(buff1.toString());

/**
 *  缓冲区裁剪
 *  buf.slice([start[, end]])
 *  ------
 *  返回一个新的缓冲区，它和旧缓冲区指向同一块内存，但是从索引 start 到 end 的位置剪切。
 *  -----------------
 *  tips : 因为使用的同一块内存，所以 对返回值的修改会影响到原来的值
 **/
var buff3 = Buffer.from('runoob');
// 剪切缓冲区
var buff4 = buff3.slice(0,2);
console.log("buffer4 content: " + buff4.toString());    // ru
buff4.write('ha');
// buff3    =>  hanoob
