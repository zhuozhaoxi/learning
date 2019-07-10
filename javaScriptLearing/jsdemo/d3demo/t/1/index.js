// index.js
// 1、基础的dom选择和操作
//d3.select();
//d3.selectAll();
//
//d3.select('h1').style('color', 'red')
//    .attr('class', 'heading')
//    .text('Updated h1 tag');
//
//d3.select('body').append('p').text('First Paragraph');
//d3.select('body').append('p').text('Second Paragraph');
//d3.select('body').append('p').text('Third Paragraph');
//
//d3.selectAll('p').style('')

// 2、数据加载和绑定
let dataset = [1, 2, 3, 4, 5];

d3.select('body')
    .selectAll('p')
    .data(dataset)
    .enter()
    .append('p') // appends paragraph for each data element
    .text('D3 is awesome!!');
    //.text(function(d) { return d; });