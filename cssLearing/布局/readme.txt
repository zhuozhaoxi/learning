margin 为负值 在布局上的影响

1、对于自身的影响
当元素不存在width属性或者（width：auto）的时候，负margin会增加元素的宽度。

注意：
margin-top为负值不会增加高度，只会产生向上位移
margin-bottom为负值不会产生位移，会减少自身的供css读取的高度

元素如果用了margin-left:-20px;毋庸置疑的自身会向左偏移20px;
和定位（position：relative）有点不一样的是，在其后面的元素会补位，也就是后面的行内元素会紧贴在此元素的之后。
总结，不脱离文档流不使用float的话，负margin元素是不会破坏页面的文档流。


所以如果你使用负margin上移一个元素，所有跟随的元素都会被上移。

2、对浮动元素的影响
负margin会改变浮动元素的显示位置，即使我的元素写在DOM的后面，我也能让它显示在最前面。


3、绝对定位的影响
// 是一个居中的box
<div class="absolute"></div>


.absolute{
    
position: absolute;
    
top:50%;
    
left:50%;
    
height: 200px;
    
width: 200px;
    
background-color: #ccc;
    
margin-top: -100px;
    
margin-left: -100px;

}




参考 ： https://www.jianshu.com/p/549aaa5fabaa