参数特性

lazy

在默认情况下，v-model 在input 事件中同步输入框值与数据，可以添加一个特性 lazy，从而改到在 change 事件中同步：

<!-- 在 "change" 而不是 "input" 事件中更新 -->
<input v-model="msg" lazy>
number

如果想自动将用户的输入保持为数字，可以添加一个特性 number：

<input v-model="age" number>


debounce 设置一个最小的延时，在每次敲击之后延时同步输入框的值与数据。如果每次更新都要进行高耗操作（例如在输入提示中 Ajax 请求），它较为有用。

<input v-model="msg" debounce="500">

注意 debounce 参数不会延迟 input 事件：它延迟“写入”底层数据。因此在使用 debounce 时应当用 vm.$watch() 响应数据的变化。若想延迟 DOM 事件，应当使用 debounce 过滤器。