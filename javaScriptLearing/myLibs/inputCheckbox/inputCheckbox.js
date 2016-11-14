$(function() {
    // 下拉多选输入框
    $('body').on("mouseout",".checkboxContent",function() {
        $(this).parent().find('.checkboxInput').focus();
    });

    // 全选
    $('body').on("click",".checkboxCheckAll",function(){
        var arr = [];
        $(this).parent().siblings('label').find('input.checkboxItem[type=checkbox]').each(function(){
            this.checked = true;
            if( arr.indexOf($(this).val()) === -1 ){
                arr.push($(this).val());
            }
        });
        var input = $(this).parent().parent().siblings('.checkboxInput');
        $(input).val( arr.join(';')).focus();
        return false;
    });

    // 清空
    $('body').on('click',".checkboxClearCheck",function() {
        $(this).parent().siblings('label').find('input.checkboxItem[type=checkbox]').each(function(){
            this.checked = false;
        });
        var input = $(this).parent().parent().siblings('.checkboxInput');
        $(input).val("").focus();
        return false;
    });

    // 反选
    $('body').on('click',".checkboxCheckAgainst",function() {
        var arr = [];
        $(this).parent().siblings('label').find('input.checkboxItem[type=checkbox]').each(function(){
            this.checked = !this.checked;
            if( true == this.checked && -1 === arr.indexOf($(this).val())){
                arr.push($(this).val());
            }
        });
        var input = $(this).parent().parent().siblings('.checkboxInput');
        $(input).val( arr.join(';')).focus();
        return false;
    });

    $('body').on("change",".checkboxItem",function(){
        var chosenVal = $(this).val();
        var input = $(this).parent().parent().siblings('.checkboxInput');
        // 如果为空且选择，直接输入
        if ( $.trim($(input).val()) === "" && this.checked){
            $(input).val(chosenVal);
            return ;
        }
        var valList = $(input).val().split(';');
        if (this.checked && valList.indexOf(chosenVal) == -1 ){// 当前选中了,且没有值
            // 插入值
            valList.push(chosenVal);
        }else if (!this.checked){
            // 移除某个值
            valList.splice( valList.indexOf(chosenVal),1 );
        }
        $(input).val( valList.join(';') );
    });

    // 手动输入时,输入框合理性检测
    $('body').on("change",".checkboxInput",function(){
        var valList = $(this).val().split(';');
        var arr = [];
        $(this).siblings('.checkboxContent').find('.checkboxItem').each(function(){
            var optionVal = $(this).val();
            if ( valList.indexOf( optionVal ) === -1 ){
                this.checked = false;
            }else{
                this.checked = true;
                if(arr.indexOf(optionVal) === -1){
                    arr.push( optionVal );
                }
            }
        });
        $(this).val( arr.join(';') );
    });
});