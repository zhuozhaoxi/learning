字面量语法 vs. 动态语法

初学者常犯的一个错误是使用字面量语法传递数值：

<!-- 传递了一个字符串 "1" -->
<comp some-prop="1"></comp>
因为它是一个字面 prop，它的值以字符串 "1" 而不是以实际的数字传下去。
如果想传递一个实际的 JavaScript 数字，需要使用动态语法，从而让它的值被当作 JavaScript 表达式计算：

<!-- 传递实际的数字  -->
<comp :some-prop="1"></comp>


Prop 绑定类型
http://cn.vuejs.org/guide/components.html#Prop__u7ED1_u5B9A_u7C7B_u578B

prop 默认是单向绑定：当父组件的属性变化时，将传导给子组件，但是反过来不会。这是为了防止子组件无意修改了父组件的状态——这会让应用的数据流难以理解。不过，也可以使用 .sync 或 .once 绑定修饰符显式地强制双向或单次绑定：

比较语法：

<!-- 默认为单向绑定 -->
<child :msg="parentMsg"></child>

<!-- 双向绑定 -->
<child :msg.sync="parentMsg"></child>

<!-- 单次绑定 -->
<child :msg.once="parentMsg"></child>
双向绑定会把子组件的 msg 属性同步回父组件的 parentMsg 属性。单次绑定在建立之后不会同步之后的变化。

注意如果 prop 是一个对象或数组，是按引用传递。在子组件内修改它会影响父组件的状态，不管是使用哪种绑定类型。