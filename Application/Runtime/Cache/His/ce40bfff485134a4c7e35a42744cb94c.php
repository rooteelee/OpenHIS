<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <link href="/Upload/groupPic/favicon.ico" rel="shortcut icon">
    <title><?php echo C('TITLE');?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/Public/his/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/his/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/his/vendor/linearicons/style.css">
    <link rel="stylesheet" href="/Public/his/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/Public/his/css/main.css?<?php echo time();?>">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="/Public/his/css/demo.css?<?php echo time();?>">
    <!-- public -->
    <link rel="stylesheet" href="/Public/his/css/public.css?<?php echo time();?>">

    <!-- ICONS >
    <link rel="apple-touch-icon" sizes="76x76" href="/Public/his/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="__PUBLIC_ROBOT__/img/favicon.png"-->
    <link rel="stylesheet" type="text/css" href="/Public/his/vendor/datetimepicker/jquery.datetimepicker.css"/>

    <script src="/Public/his/vendor/jquery/jquery.min.js"></script>
    <script src="/Public/his/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/his/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/his/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="/Public/his/vendor/chartist/js/chartist.min.js"></script>
    <script src="/Public/his/scripts/klorofil-common.js"></script>
    <script src="/Public/his/vendor/datetimepicker/jquery.datetimepicker.js"></script>
    <script src="/Public/his/js/public.js?<?php echo time();?>"></script>
    <script src="/Public/his/js/check.form.js?<?php echo time();?>"></script>
    <script src="/Public/his/vendor/layer/layer.js"></script>
    <script src="/Public/his/vendor/three/three.min.js"></script>
    <!--<script src="/Public/his/js/echarts.min.js"></script>-->


</head>
<body>


<!-- WRAPPER -->
    <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">字典表
                <button type="button" class="btn btn-primary r dictionariesAddBtn">新增</button>
            </h3>
            <div class="row">
                <div class="col-md-2 ftc flh30">
                    <ul class="tabBtn clearfix" id="ulApp">
                        <?php if(is_array($firstLists)): foreach($firstLists as $key=>$first): ?><li style="width: 100%;font-weight:bold"><?php echo ($first['dictionary_name']); ?></li>
                            <?php if(is_array($secondLists)): foreach($secondLists as $key=>$second): if(is_array($second)): foreach($second as $key=>$vo): if($vo['parent_id'] == $first['did']) { ?>
                                        <li style="width: 100%;" data-pid="<?php echo ($vo['did']); ?>" class="menu"><?php echo ($vo['dictionary_name']); ?></li>
                                    <?php } endforeach; endif; endforeach; endif; endforeach; endif; ?>
                    </ul>
                </div>
                <div class="col-md-10">
                    <!-- PANEL NO PADDING -->
                    <div class="panel pd10">
                        <ul class="tabBox">
                            <li class="on">
                                <table class="table drugsTable ftc">
                                    <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>名称</th>
                                        <th>来源</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbodyApp">

                                    </tbody>
                                </table>
                                <div class="paging l mt20 mb20" id="dictionary_pager_box"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- END PANEL NO PADDING -->
                </div>
            </div>
        </div>

    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<!-- 添加项目弹框 start -->
<div class="bombBox" id="dictionariesAddBomb" style="display: none;">
    <div class="bombContent dictionariesAddBomb whiteBg">
        <div class="bombTit">添加字典表<i class="fa fa-remove"></i></div>
        <div class="ftc pd10">
            <div class="input-group listSeaForm wb100">
				<span class="input-group-btn">
					<span class="btn">名称：</span>
				</span>
                <input class="form-control" id="addName" name="dictionary_name" type="text" placeholder="">
            </div>
            <a class="btn btn-primary wb100 mt20 add">保存</a>
        </div>
    </div>
    <a><div class="bombMask"></div></a>
</div>
<!-- 添加项目弹框 end -->
<!-- 编辑项目弹框 start -->
<div class="bombBox" id="dictionariesEditBomb" style="display: none;">
    <div class="bombContent dictionariesEditBomb whiteBg">
        <div class="bombTit">编辑字典表<i class="fa fa-remove"></i></div>
        <div class="ftc pd10" id="diagnosis">
            <div class="input-group listSeaForm wb100">
				<span class="input-group-btn">
					<span class="btn">名称：</span>
				</span>
                <input class="form-control" id="editName" name="dictionary_name" type="text" value="" placeholder="">
                <input id="editDid" name="did" type="hidden">
            </div>
            <a class="btn btn-default wb100 mt10 btn-sm addSub"><i class="fa fa-plus mr10"></i>添加诊断名称</a>
            <table id="editTable">

            </table>
            <a class="btn btn-primary wb100 mt20 edit">保存</a>
        </div>
    </div>
    <a><div class="bombMask"></div></a>
</div>
<!-- 编辑项目弹框 end -->
<!-- Javascript -->
<style>
    #dictionary_pager_box{text-align: center;width: 100%;}
</style>
<script>
    var _dictionary_page=1;
    $(function() {
        //选项卡切换
        $(document).on('click', '.menu', function(){
            $(this).addClass('on').siblings('li').removeClass('on').closest('.menu');
            $('.tabBox').find('> li').eq($(this).index()).addClass('on').siblings('li').removeClass('on');
        });
        //首次进入页面显示列表
        $(document).ready(function(){
            $("#ulApp li:eq(1)").addClass('on');
            $('.dictionariesAddBtn').attr('add-pid', $("#ulApp li:eq(1)").attr('data-pid'));
            getDictionaryLists('', 1);
        });
        //点击菜单显示列表
        $(document).on('click', '.menu', function(){
            var pid = $(this).attr('data-pid');
            $('.dictionariesAddBtn').attr('add-pid', $(this).attr('data-pid'));
            getDictionaryLists(pid, 1);
        });
        //字典列表分页
        $("#dictionary_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _dictionary_page=parseInt(_dictionary_page)+1;
                }else{
                    _dictionary_page=parseInt(_dictionary_page)-1;
                }
            }else{
                _dictionary_page=parseInt($(this).html());
            }
            var pid = $(".on").attr('data-pid');
            getDictionaryLists(pid,_dictionary_page);
        });

        //字典添加弹框
        $(document).on('click', '.dictionariesAddBtn', function () {
            $("#addName").val('');
            $('#dictionariesAddBomb').show(0);
            // 取消或者关闭
            $('#dictionariesAddBomb .bombMask, #dictionariesAddBomb .fa-remove').one('click', function(event) {
                $(this).closest('#dictionariesAddBomb').hide(0);
                $('body').removeAttr('style');
            });
        });
        //字典添加保存
        $(document).on('click', '.add', function(){
            var dictionary_name = $("#addName").val();
            var pid = $('.dictionariesAddBtn').attr('add-pid');
            $.post("<?php echo U('/Dictionary/addDictionary');?>",
                { "dictionary_name": dictionary_name,"parent_id":pid},
                function (data) {
                    if (data.status=='success') {
                        getDictionaryLists(pid,_dictionary_page);
                        $('#dictionariesAddBomb').hide(0);
                        $("#addName").val('');
                    }
                    remindBox(data.msg);
                },
                "json");
        });

        //字典编辑弹框
        $(document).on('click', '.dictionariesEditBtn', function () {
            var pid = $('.dictionariesAddBtn').attr('add-pid');
            var did = $(this).attr('data-did');
            getSubLists(pid, did);
            $("#editName").val($(this).attr('data-name'));
            $("#editDid").val($(this).attr('data-did'));
            $('#dictionariesEditBomb').show(0);
            // 取消或者关闭
            $('#dictionariesEditBomb .bombMask, #dictionariesEditBomb .fa-remove').one('click', function(event) {
                $(this).closest('#dictionariesEditBomb').hide(0);
                $('body').removeAttr('style');
            });
        });
        //字典编辑保存
        $(document).on('click', '.edit', function(){
            var pid = $('.dictionariesAddBtn').attr('add-pid');
            var dictionary_name = $("#editName").val();
            var did = $("#editDid").val();
            $.post("<?php echo U('/Dictionary/editDictionary');?>",
                { "dictionary_name": dictionary_name,"did":did,"parent_id":pid},
                function (data) {
                    if (data.status=='success') {
                        $("#"+did).html(dictionary_name);
                        $("#edit"+did).attr('data-name', dictionary_name);
                        $('#dictionariesEditBomb').hide(0);
                    }
                    remindBox(data.msg);
                },
                "json");
        });
        //字典删除
        $(document).on('click', '.dictionaryDelete', function() {
            var did = $(this).attr('data-did');
            var pid = $('.dictionariesAddBtn').attr('add-pid');
            promptBox('是否确定删除？', function () {
                $.post("<?php echo U('/Dictionary/deleteDictionary');?>",
                    {'did': did},
                    function (data) {
                        if (data.status == 'success') {
                            getDictionaryLists(pid, _dictionary_page);
                            getSubLists(pid, did);
                        }
                        remindBox(data.msg);
                    },
                    "json");
            });
        });

        //添加诊断信息子分类
        $(document).on('click', '.addSub', function () {
            var subName = [];
            $(":input[name='subName']").each(function(index,item){
                subName.push($(this).val());
            });
            if (subName.indexOf('')) {
                var html = '<tr>' +
                    '<td></td>' +
                    '<td><input class="form-control addSubInput" maxlength="10" name="subName" type="text" value="" placeholder="" disabled></td>' +
                    '<td><span class="fa fa-pencil fz18 mr10 blue addSubSave" style="cursor:pointer">' +
                    '</span> <span class="fa fa-trash fz18 addDeleteSub" style="cursor:pointer"></span></td>' +
                    '</tr>';
                $(this).siblings('table').find('tbody').prepend(html);
                lioder();
            } else {
                remindBox('诊断信息不能为空');
            }
        });
        //添加诊断信息子分类保存
        $(document).on('click', '.addSubSave', function(){
            var pid = $("#editDid").val();
            var id = $(this).attr('data-id');
            var dictionary_name = $("#addSubName"+id).val();
            if ($("#addSubName"+id).is(':disabled')) {
                $("#addSubName"+id).removeAttr('disabled');
                $(this).removeClass('blue');
            } else {
                $.post("<?php echo U('/Dictionary/addDictionary');?>",
                    {'dictionary_name':dictionary_name,'parent_id':pid},
                    function(data){
                        if (data.status == 'success') {
                            var html = '<span class="fa fa-pencil fz18 mr10 blue editSub" data-did="'+data.data+'" style="cursor:pointer"></span>';
                            var str = '<input class="form-control" maxlength="10" name="subName" type="text" id="editSub'+data.data+'" value="'+dictionary_name+'" placeholder="" disabled>';
                            var delStr = '<span class="fa fa-trash fz18 deleteSub" data-did="'+data.data+'" style="cursor:pointer"></span>';
                            $("#id"+id).replaceWith(html);
                            $("#addSubName"+id).replaceWith(str);
                            $("#delete"+id).replaceWith(delStr);
                        }
                        remindBox(data.msg);
                    },
                    "json");
            }
        });

        //编辑添加诊断信息保存
        $(document).on('click', '.editSub', function(){
            var did = $(this).attr('data-did');
            var pid = $("#editDid").val();
            var dictionary_name = $('#editSub'+did).val();
            if ($("#editSub"+did).is(':disabled')) {
                $("#editSub"+did).removeAttr('disabled');
                $(this).removeClass('blue');
            } else {
                $.post("<?php echo U('/Dictionary/editDictionary');?>",
                    {'dictionary_name':dictionary_name,'did':did,'parent_id':pid},
                    function (data) {
                        if (data.status == 'success') {
                            $("#editSub"+did).val(dictionary_name);
                            $("#editSub"+did).attr('disabled', true);
                        }
                        remindBox(data.msg);
                    },
                    'json');
                $(this).addClass('blue');
            }
        });
        //删除诊断信息子类
        $(document).on('click', '.fa-trash',function () {
            var _self = $(this);
            var did  = $(this).attr('data-did');
            promptBox('是否确定删除？', function () {
                if (did) {
                    $.post("<?php echo U('/Dictionary/deleteDictionary');?>",
                        {'did':did},
                        function (data) {
                            if (data.status == 'success') {
                                _self.closest('tr').remove();
                                lioder();
                            }
                            remindBox(data.msg);
                        },
                        'json');
                } else {
                    _self.closest('tr').remove();
                }
                lioder();
            });
        });
    });
    //分类列表页
    function getDictionaryLists(pid, page){
        $.post("<?php echo U('/Dictionary/dictionaryLists');?>",
            { "pid": pid, 'p':page, 'pagesize':10},
            function (data) {
                if (data.status=='success') {
                    if (data.data.count > 0) {
                        var html = '';
                        $.each(data.data.list,function (i,item) {
                            var id = i + 1;
                            html += '<tr><td>'+id+'</td><td id="'+item.did+'">'+item.dictionary_name+'</td><td>';
                            if (item.type == 0) {
                                html += '系统';
                            } else {
                                html += '自建';
                            }
                            html += '</td><td>';
                            if (item.type == 1) {
                                html += '<button type="button" class="btn btn-success btn-sm dictionariesEditBtn" data-did="'+item.did+'" data-name="'+item.dictionary_name+'" id="edit'+item.did+'">编辑</button> ' +
                                    '<button type="button" class="btn btn-default btn-sm deleteBtn dictionaryDelete" data-did="'+item.did+'">删除</button>';;
                            }
                            html += '</td></tr>';
                        });
                        _dictionary_page=data.data.page;
                        $("#tbodyApp").html(html);
                        if(data.data.pager_str.length>0){
                            $("#dictionary_pager_box").html(data.data.pager_str);
                        }else{
                            $("#dictionary_pager_box").html('');
                        }
                    } else {
                        $("#tbodyApp").html('<tr><td colspan="7" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $("#dictionary_pager_box").html('');
                    }
                } else {
                    remindBox(data.msg);
                }
            },
            "json");
    }
    //诊断信息子列表
    function getSubLists(pid, did){
        if (pid == 14) {
            $.get("<?php echo U('/Dictionary/getSubDictionary');?>",
                {'pid':did},
                function (data) {
                    if (data.status == 'success') {
                        $(".addSub").css('display','block');
                        $("#diagnosis").css({
                            'min-width':'500px',
                            'max-height': '500px',
                            'overflow-y': 'auto'
                        });
                        var html = '<table id="editTable" class="table table-striped ftc mt10"><thead><tr>' +
                            '<th>序号</th>' +
                            '<th>诊断名称</th>' +
                            '<th>操作</th>' +
                            '</tr></thead><tbody id="editTbodyApp">';
                            $.each(data.data, function(i,item){
                                var id = i + 1;
                                html += '<tr>' +
                                    '<td>'+id+'</td>' +
                                    '<td><input class="form-control" maxlength="10" name="subName" type="text" id="editSub'+item.did+'" value="'+item.dictionary_name+'" placeholder="" disabled></td>' +
                                    '<td><span class="fa fa-pencil fz18 mr10 blue editSub" data-did="'+item.did+'" style="cursor:pointer"></span> ' +
                                    '<span class="fa fa-trash fz18 deleteSub" data-did="'+item.did+'" style="cursor:pointer"></span></td>' +
                                    '</tr>';
                            });
                        html += '</tbody></table>';
                        $("#editTable").replaceWith(html);
                    }
                },
                'json');
        } else {
            var html = '<table id="editTable"></table>';
            $("#editTable").replaceWith(html);
            $(".addSub").css('display','none');
            $("#diagnosis").removeAttr('style');
        }
    }
    //表格添加删除从新排序
    function lioder () {
        var tableObj = $('#dictionariesEditBomb').find('table').find('tbody');
        for (var i = 0;i < tableObj.find('tr').length;i++) {
            var id = i+1;
            tableObj.find('tr').eq(i).find('td').eq(0).text(i+1);
            tableObj.find('tr').eq(i).find('.addSubInput').attr('id', 'addSubName'+id);
            tableObj.find('tr').eq(i).find('.addSubSave').attr('data-id', id);
            tableObj.find('tr').eq(i).find('.addSubSave').attr('id', 'id'+id);
            tableObj.find('tr').eq(i).find('.addDeleteSub').attr('id', 'delete'+id);
        }
    }
</script>

<!-- END WRAPPER -->

<script type="text/javascript">
    if(parent.endLoad){
        parent.endLoad();
    }
</script>
</body>
</html>