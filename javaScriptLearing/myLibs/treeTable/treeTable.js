var treeTable = function(targetTable,option,data){
        targetTable = $(targetTable);
        // 记录当前数据
        var currentData = data || null;
        var defaultOption = {
            computed : {},  // 计算数据
            attr: {},       // 定义html属性 e.g  'key' : { class : 'text-center' }
            indent: true,  // 首格是否按层级缩进
            treeBeginFlag : null // 闭合树开始标识，null:说明是普通表格
        };
        option = $.extend(defaultOption,option);
        // 切换显示
        function toggleChild(event){
            var targetTr = $(this).parents('tr');
            if (targetTr.attr('data-show') == 0){
                targetTr.attr('data-show',1);
                $(targetTr).find('i').removeClass('icon-plus').addClass('icon-minus');
                showChild(targetTr);
            }else {
                targetTr.attr('data-show',0);
                $(targetTr).find('i').removeClass('icon-minus').addClass('icon-plus');
                hideChild(targetTr);
            }
        }

        /**
         * 隐藏目标行的子行
         * @param targetTr  目标行
         */
        function hideChild(targetTr){
            var trId = $(targetTr).data('id');
            var childTrs = $(targetTr).parent().find('tr[data-parent='+trId+']');
            Array.prototype.forEach.call(childTrs,function(tr){
                $(tr).hide();
                hideChild(tr);
            })
        }

        /**
         * 显示目标行的子行
         * @param targetTr 目标行
         */
        function showChild(targetTr){
            var trId = $(targetTr).data('id');
            var childTrs = $(targetTr).parent().find('tr[data-parent='+trId+']');
            Array.prototype.forEach.call(childTrs,function(tr){
                $(tr).show();
                if($(tr).attr('data-show') == 1){
                    showChild(tr);
                }
            });
        }
        // 添加头部内容
        function createHead(){
            $(targetTable).html(''); // 清空原来的内容
            var tr = $("<tr></tr>");
            for (var key in option.fields){
                var value = option.fields[key];
                var th = $("<th></th>");
                $(th).html(value);
                $(tr).append(th);
            }
            var thead = $("<thead></thead>");
            thead.append(tr);
            targetTable.append(thead);
            // 添加内容体
            targetTable.append($("<tbody></tbody>"));
        }
        function clearTree(){
            $(targetTable).find('tbody').html('');
        }
        function createTree(parentId,targetTr,level){
            targetTr = targetTr || null;
            level = level || 1; // 当前层级
            // 筛选数据
            var childData =  option.treeBeginFlag !== null && currentData && currentData.filter(function (value){ return value.parent_id == parentId }) ||  currentData || [];

            if(childData.length > 0){
                childData.reverse();
                childData.forEach(function(row){
                    var tr = $("<tr data-id="+row.id+" data-parent="+row.parent_id+" data-level="+level+" data-show=0></tr>");
                    var i = 1;
                    for (var key in option.fields){
                        var td = $("<td name="+key+"></td>");
                        var html = '';
                        if(option.attr[key]){
                            var attrObject = option.attr[key];
                            for(var attrKey in attrObject){
                                $(td).attr(attrKey,attrObject[attrKey]);
                            }
                        }

                        if(option.computed[key]){
                            html = option.computed[key](row,level);
                        }else{
                            html = row[key];
                        }
                        if (option.indent === true){
                            var indentStr = new String("&nbsp;").repeat(level);
                        }
                        // 如果是表格首行
                        if( i++ == 1){
                            $(td).html(indentStr+'<i class="icon-plus tree-table-toggle"></i> '+html);
                            $(td).css('text-align','left');
                        }else{
                            $(td).html(html);
                        }
                        $(tr).append(td);
                    };
                    if (targetTr === null){
                        $(targetTable).find('tbody').append(tr);
                        tr.onclick = hideChild;
                    }else{
                        $(tr).insertAfter(targetTr);
                        $(tr).hide();
                    }

                    if(option.treeBeginFlag !== null){
                        // 递归
                        createTree(row.id,tr,level+1);
                    }else{
                        $(targetTable).find('tr td:first-child i.tree-table-toggle').remove();
                    }
                });
            }else if(targetTr !== null){
                $(targetTr).find('td').first().find('i.tree-table-toggle').remove();
            }
        }
        // 监听切换按钮
        $(targetTable).on('click','tr td i',toggleChild);
        // 默认自动加载数据
        createHead();
        if (currentData !== null){
            createTree(option.treeBeginFlag);
        }
        return {
            setData : function(data){
                //清空原数据
                currentData = data;
                clearTree();
                createTree(option.treeBeginFlag);
            },
            setOption : function(newOption){
                option = $.extend(option,newOption);
                createHead();
                this.setData(currentData);
            }
        };
    }