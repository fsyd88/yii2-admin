/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 4000
    };

    //*************************************刷新页面*******************************////
    $(document).on('click', '#grid-refresh', function () {
        location.reload();
        toastr.success('刷新成功 !');
    });


    //******************************************更新排序***********************************///
    $(document).on('click', '#resort', function () {
        var ids = Array();
        var val = Array();
        $('table .sort-box').each(function () {
            ids.push($(this).attr('ids'));
            val.push($(this).val());
        })
        $.post($(this).attr('to'), {ids: ids, val: val}, function (data) {
            if (data == 'y') {
                preload();
                toastr.success('更新排序成功 !');
            } else {
                toastr.error('更新排序失败 !');
            }
        })
    })
    //*******************//删除多个提交***********************************///

    $(document).on('click', '#removeAll', function () {
        $this = $(this);
        if (!confirm('确定要删除这些数据？')) {
            return false;
        }
        var chks = $(".grid-row-checkbox:checked");
        if (chks.length <= 0) {
            toastr.error('没有选择任何数据 !');
            return false;
        }
        var ids = Array();
        chks.each(function () {
            ids.push($(this).val());
        });
        $.post($this.attr('to'), {ids: ids}, function (data) {
            if (data == 'y') {
                $.pjax.reload('#container');
                toastr.success('删除成功');
            } else {
                toastr.error('删除失败');
            }
        })
    });
});