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
<div class="main" style="margin: 0;float: inherit;width: inherit; overflow: hidden;" id="my_content_box">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">接诊
                <button type="button" class="btn btn-warning r moneyAdd">收费</button>
                <button type="button" class="btn btn-success r mr20" id="btn_save_all">保存</button>
                <button type="button" class="btn btn-primary r mr20" id="btn_history">历史</button>
            </h3>
            <div class="panel panel-profile">
                <div class="clearfix" style="">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <form id="form_patient">
                                <div class="profile-info" style="max-height:400px; overflow-y: auto;">
                                    <h4 class="heading blue">患者信息</h4>
                                    <ul class="list-unstyled list-justify" id="patient_box">
                                        <li class="clearfix">
                                            <div class="input-group listSeaForm l" style=" width: 50%;">
											<span class="input-group-btn">
												<span class="btn">姓名：</span>
											</span>
                                                <input id="patient_id" name="patient_id" type="hidden"
                                                       value="<?php echo ($patient["patient_id"]); ?>"/>
                                                <input class="form-control input_auto_cache"

                                                       type="text" name="name" maxlength="10"
                                                       data-data_to="patient" placeholder="" id="patient_name"
                                                       onkeyup="value=value.replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,'')"
                                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,''))"
                                                       value="<?php echo ($patient["name"]); ?>"

                                                >
                                                <i class="fa fa-user patientAdd"></i>
                                            </div>
                                            <div class="input-group listSeaForm r" style="width: 30%;">
											<span class="input-group-btn">
												<span class="btn">性别：</span>
											</span>
                                                <select class="form-control input_auto_cache" data-data_to="patient" id="patient_sex" name="sex">
                                                    <option value="1"
                                                    <?php if($patient['sex'] == 1): ?>selected<?php endif; ?>
                                                    >男</option>
                                                    <option value="2"
                                                    <?php if($patient['sex'] == 2): ?>selected<?php endif; ?>
                                                    >女</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="input-group listSeaForm l" style=" width: 50%;">
											<span class="input-group-btn">
												<span class="btn">生日：</span>
											</span>
                                                <input class="form-control dateTime input_auto_cache" type="text"  placeholder=""


                                                       data-data_to="patient"  id="birthday"
                                                       name="birthday" value="<?php echo ($patient["birthday"]); ?>"

                                                />
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group listSeaForm r" style="padding-right: 10px;">
                                                <span id="age_label"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="input-group listSeaForm">
											<span class="input-group-btn">
												<span class="btn">手机：</span>
											</span>
                                                <input class="form-control input_auto_cache" minlength="11" style="width: 150px;"
                                                       type="tel"
                                                       data-data_to="patient" id="patient_mobile" maxlength="11"
                                                       name="mobile" placeholder="" value="<?php echo ($patient["mobile"]); ?>"
                                                       onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                       onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                                />
                                            </div>
                                        </li>


                                        <li><span>住址：</span>
                                            <textarea class="form-control mb20 input_auto_cache" data-data_to="patient"
                                                      rows="2" maxlength="100" id="patient_address"
                                                      placeholder="填写当前住址（限100字）"
                                                      name="address"><?php echo ($patient["address"]); ?></textarea>
                                        </li>
                                        <li><span>过敏史：</span>
                                            <textarea class="form-control mb20 input_auto_cache" data-data_to="patient"
                                                      rows="2" maxlength="500" id="patient_allergy"
                                                      placeholder="填写本次诊断详情（限500字）" name="allergy_info"><?php echo ($patient["allergy_info"]); ?></textarea>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <ul class="tabBtn clearfix">
                                <li class="on">患者档案</li>
                                <li>历史病历</li>
                            </ul>
                            <ul class="tabBox" style="max-height: 240px; overflow-y:auto;">
                                <li class="on">
                                    <dl class="pInfoDl" id="user_file_box">

                                    </dl>
                                </li>
                                <li id="care_history_list_box">
                                    <div style="text-align: center;">暂无病历信息</div>
                                </li>
                            </ul>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <ul class="tabBtn clearfix headingTab bcb">
                            <li class="on">病历</li>
                            <li>处方</li>
                        </ul>
                        <ul class="tabBox" style="max-height:846px; overflow-y: auto;">
                            <li class="on" id="care_history_box">
                                <form id="form_care_history">
                                    <input type="hidden" id="care_history_id" value="0" name="id"/>
                                    <input type="hidden" id="care_patient_id" value="0" name="patient_id"/>
                                    <div class="mt20">
                                        <h3 class="heading"><span class="blue mr10">诊断信息</span>
                                            <span class="gray2">诊断编号：<span id="care_case_code">未生成</span></span><span
                                                    class="r red" id="pkg_status_label">未收费</span></h3>
                                        <div class="clearfix">
                                            <div class="fublBox mr20 mb20"><span class="mr10">发病日期</span><input
                                                    type="text" class="form-control form-itmeB input_auto_cache"
                                                    data-data_to="history" placeholder="" id="case_date"
                                                    name="case_date"><i class="fa fa-calendar"></i></div>
                                            <div class="fublBox mr20 mb20"><span class="mr10">接诊类型</span>
                                                <select class="form-control form-itmeB input_auto_cache"
                                                        data-data_to="history" name="type_id" id="care_history_type_id">
                                                    <option value="0">初诊</option>
                                                    <option value="1">复诊</option>
                                                    <option value="2">急诊</option>
                                                </select>
                                            </div>
                                            <div class="fublBox mb20"><span class="mr10">是否传染</span>
                                                <select class="form-control form-itmeB input_auto_cache"
                                                        data-data_to="history" name="is_contagious" id="care_history_is_contagious">
                                                    <option value="0">不是</option>
                                                    <option value="1">是</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h3 class="panel-title mb10">主诉</h3>
                                        <textarea name="case_title" class="form-control mb20 input_auto_cache"
                                                  data-data_to="history" rows="2" maxlength="500"
                                                  placeholder="填写主诉病状（限500字）" id="care_history_case_title"></textarea>
                                        <h3 class="heading blue">诊断详情</h3>
                                        <textarea name="case_result" class="form-control mb20 input_auto_cache"
                                                  data-data_to="history" rows="2" maxlength="500"
                                                  placeholder="填写本次诊断详情（限500字）" id="care_history_case_result"></textarea>
                                        <h3 class="heading blue">医生建议</h3>
                                        <textarea name="doctor_tips" class="form-control mb20 input_auto_cache"
                                                  data-data_to="history" rows="2" maxlength="500"
                                                  placeholder="医生建议（限500字）" id="care_history_doctor_tips"></textarea>
                                        <h3 class="heading blue">备注</h3>
                                        <textarea name="memo" class="form-control mb20 input_auto_cache"
                                                  data-data_to="history" rows="2" maxlength="500"
                                                  placeholder="填写备注（限500字）" id="care_history_memo"></textarea>
                                    </div>
                                </form>
                                <div>
                                <h3 class="heading blue">附件</h3>
                                <a href id="doc-pic"></a>
                                <form id="uploadForm">
                                    <div class="r mt10 headPortraitBox" align="left">
                                        <input type="file" name="file" id="file" />
                                        <input type="hidden" name="file_url" id="file_url">
                                        <button type="button" id="btn_upload_file" class="btn btn-primary r mr20" >上传</button>
                                    </div>
                                </form>
                                </div>
                            </li>
                            <li>
                                <div class="mt20">
                                    <ul class="tabBtn recipelbBtn clearfix l" id="care_order_tab_btn_box"></ul>
                                    <button type="button" class="btn btn-primary addRecipelBtn"><i
                                            class="fa fa-plus"></i></button>
                                    <div style="clear:both;"></div>
                                    <ul class="tabBox recipelBox" id="care_order_tab_content_box"></ul>
                                </div>
                            </li>
                        </ul>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<!--添加药品弹框 start-->
<div class="bombBox" id="drugBomb" style="display: none;">
    <div class="whiteBg drugBomb" style="padding-bottom: 68px;">
        <ul class="tabBtn clearfix">
            <li class="on medicine_item">中药处方</li>
            <li class="medicine_item">检查项目</li>
        </ul>
        <ul class="tabBox">
            <li class="on">
                <div class="input-group drugSeach">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">搜索</button>
						</span>
                    <input class="form-control" type="text" placeholder="药品检索" value="" id="medicines_search_in" />
                </div>
                <table class="table drugsTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>名称</th>
                        <th>规格</th>
                        <th>库存</th>
                        <th>单价</th>
                    </tr>
                    </thead>
                    <tbody id="medicines_list_box">
                    <tr>
                        <td colspan="5">加载中...</td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <div class="input-group drugSeach">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">搜索</button>
						</span>
                    <input class="form-control" type="text" placeholder="项目检索" id="inspectionfee_search_in" />
                </div>
                <table class="table drugsTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>名称</th>
                        <th>单价</th>
                        <th>最小单位</th>
                    </tr>
                    </thead>
                    <tbody id="inspectionfee_list_box">
                    <tr>
                        <td colspan="4">加载中...</td>
                    </tr>
                    </tbody>
                </table>
            </li>
        </ul>
        <div class="ftc addDrug">
            <button type="button" class="btn btn-primary addDrugBtn" id="btn_add_medicines">添加</button>
            <button type="button" class="btn btn-success addDrugBtn" id="btn_add_medicines_and_close">添加并关闭</button>
        </div>
    </div>
    <div class="bombMask"></div>
</div>
<!--添加药品弹框 end-->
<!--看诊记录 -->
<div class="bombBox" id="doctory_history_box" style="display: none;">
    <div class="whiteBg drugBomb" style="padding:0;padding-bottom: 68px;">
        <div class="input-group drugSeach" style="padding:6px 0 6px 6px;">
            <span class="input-group-btn">
							<button class="btn btn-primary" type="button">搜索</button>
						</span>
            <input class="form-control" type="text" placeholder="姓名或手机号" value="" id="history_search_in" style="width: 135px;" />

            <select class="form-control" style="width: 110px; margin-left: 6px;" title="收费状态" id="history_search_status">
                <option value="999">全部</option>
                <option value="0">未支付</option>
                <option value="1">已支付</option>
                <option value="2">确认收款</option>
                <option value="3">申请退款</option>
                <option value="4">已退款</option>
                <option value="5">部分支付</option>
            </select>
        </div>

        <ul class="tabBox">
            <li class="on">
                <table class="table drugsTable">
                    <thead>
                    <tr>
                        <th>姓名</th>
                        <th>手机号</th>
                        <th>时间</th>
                        <th>状态</th>
                    </tr>
                    </thead>
                    <tbody id="history_search_list_box">
                    <tr>
                        <td colspan="5">加载中...</td>
                    </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
    <div class="bombMask"></div>
</div>
<!--看诊记录 end-->
<!--选择患者弹框 start-->
<div class="bombBox" id="patientBomb" style="display: none;">
    <div class="tableContent whiteBg patientBomb" style="width: 50%; min-width: 300px; height: 500px;">
        <div class="bombTit ftc">选择患者<i class="fa fa-remove"></i></div>
        <ul class="tabBtn clearfix">
            <li class="on">挂号列表</li>
            <li>患者库</li>
        </ul>
        <ul class="tabBox pd20">
            <li class="on" style="height: 400px">
                <div class="input-group drugSeach" style="width: 50%; margin: auto;">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">搜索</button>
						</span>
                    <input class="form-control" type="text" placeholder="患者姓名" id="registration_search_in" />
                </div>
                <div style="height: 300px; overflow-y: auto;">
                    <table class="table mt10">
                        <thead>
                        <tr>
                            <th></th>
                            <th>患者姓名</th>
                            <th>性别</th>
                            <th>年龄</th>
                            <th>电话</th>
                            <th>挂号时间</th>
                            <th>挂号类型</th>
                        </tr>
                        </thead>
                        <tbody id="registration_box">
                        <tr>
                            <td colspan="7">加载中...</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bottomPageBox">
                    <div class="paging l mt10" id="registration_pager_box"></div>
                    <!--button type="button" class="btn btn-primary r">确认</button-->
                </div>
            </li>
            <li style="height: 400px">
                <div class="input-group drugSeach" style="width: 50%; margin: auto;">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">搜索</button>
						</span>
                    <input class="form-control" type="text" placeholder="患者姓名" id="patient_search_in" />
                </div>
                <div style="height: 300px; overflow-y: auto;">
                    <table class="table mt10">
                        <thead>
                        <tr>
                            <th></th>
                            <th>患者姓名</th>
                            <th>性别</th>
                            <th>年龄</th>
                            <th>电话</th>
                            <th>更新日期</th>
                        </tr>
                        </thead>
                        <tbody id="patient_list_box">
                        <tr>
                            <td colspan="6">加载中...</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bottomPageBox">
                    <div class="paging l mt10" id="patient_list_pager_box"></div>
                    <!--button type="button" class="btn btn-primary r">确认</button-->
                </div>
            </li>
        </ul>
    </div>
    <div class="bombMask"></div>
</div>
<!--选择患者弹框 end-->
<!--附加费弹框 start-->
<div class="bombBox" id="additionalBomb" style="display: none;">
    <div class="tableContent whiteBg additionalBomb" style=" width: 360px; height: 450px;">
        <div class="bombTit">附加费用<i class="fa fa-remove"></i></div>
        <div style="max-height: 350px; overflow-y: auto;">
            <table class="table mt10">
                <thead>
                <tr>
                    <th></th>
                    <th>名称</th>
                    <th>金额</th>
                </tr>
                </thead>
                <tbody id="extracharges_list_box">
                <tr>
                    <td colspan="3">加载中...</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="bottomPageBox">
            <button type="button" class="btn btn-primary r" id="btn_add_extracharges">确认</button>
        </div>
    </div>
    <div class="bombMask"></div>
</div>
<!--附加费弹框 end-->
<!--收费弹框 start-->
<div class="bombBox" id="moneyBomb" style="display: none;">
    <div class="tableContent whiteBg moneyBomb" style=" width: 560px; height: 450px;">
        <div class="bombTit">收费信息<i class="fa fa-remove"></i></div>
        <div class="pd20" style="height: 540px;background: #FFFFFF;">
            <ul class="list-unstyled list-justify" style=" max-height: 180px; overflow-y: auto;" id="pay_order_list"></ul>

            <div class="sPaymentBox ftc">
                <div class="green ftl">应收 <span class="r" id="pay_order_amount">0</span></div>
                <div class="tit1 bcb ftl mt10 mb10">支付方式</div>
                <table align="center" width="90%">
                    <tr>
                        <td width="50%" >
                            <form class="form-inline">
                            <div class="form-group" style="line-height: 34px;">
                                <input type="text" class="form-control" placeholder="" value="0" id="pay_cash" style="float: right;width: 120px; margin-left: 8px;"
                                       onkeyup="value=value.replace(/[^\0-9.]/g,'')"
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\0-9.]/g,''))"
                                />
                                <label for="pay_cash" style="float: left;">现金支付:</label>
                            </div>
                            <div class="form-group" style="margin: 8px 0;line-height: 34px;">
                                <input type="text" class="form-control" placeholder="" value="0" id="pay_ol_input" style="float: right;width:120px;margin-left: 8px;"
                                       onkeyup="value=value.replace(/[^\0-9.]/g,'')"
                                       onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\0-9.]/g,''))"
                                />
                                <label for="pay_ol_input" style="float: left;">在线支付:</label>
                            </div>

                            </form>
                        </td>
                        <td width="50%" id="ol_result_box">
                            <img src="/Public/his/img/load_icon.gif" id="pay_qr_img" />
                            <div>
                                <img src="/Public/assets/img/wx_ali.jpg" width="215" />
                            </div>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="bottomPageBox" style="bottom: -110px;">
            <button type="button" class="btn btn-primary wb100" id="btn_save_pay">收费完成</button>
        </div>
    </div>
    <div class="bombMask"></div>
</div>
<!--收费弹框 end-->
<style>
    .tr_registration_item,.tr_patient_list_item,.tr_medicines_list_item,.tr_inspection_list_item,.tr_extracharges_list_item,.history_list_item{cursor: pointer;}
    #registration_pager_box,#patient_list_pager_box{text-align: center;width: 100%;}
    #registration_box .on,#patient_list_box .on,#medicines_list_box .on,#inspectionfee_list_box .on,#extracharges_list_box .on,#history_search_list_box .on{background: #1a8cff;color: #FFFFFF;}
    #medicines_list_box .sel,#inspectionfee_list_box .sel,#extracharges_list_box .sel{background: #0CA818;color: #FFFFFF;}

    .care_order_sub_box{border: 1px solid #0E3460;min-height: 50px;padding: 12px; margin-bottom: 12px;}
    .care_order_sub_box span{display: inline-block;padding: 5px;margin-right: 2px;}
    .medicines_show{display: none;}

    .pay_status{padding: 6px 8px;}
    .unpay{background: #7C7C7C;color:#FF0000;}
    .payed{background:#0CA818;color: #FFFFFF;}
</style>
<!-- END WRAPPER -->
<script>
    var is_iframe=self!=top?true:false;
    var active_order_idx = 0;//当前活动处方
    var active_medicines_tab = 0;//当前活动药品标签，0药品，1检测项目,2附加费用
    var DATA={
        //患者信息
        'patient':{
            patient_id:<?php echo ($patient["patient_id"]); ?>,
            name:'<?php echo ($patient["name"]); ?>',
            mobile:'<?php echo ($patient["mobile"]); ?>',
            sex:<?php echo ($patient["sex"]); ?>,
            birthday:'<?php echo ($patient["birthday"]); ?>',
            address:'<?php echo ($patient["address"]); ?>',
            allergy_info:'<?php echo ($patient["allergy_info"]); ?>'
        },
        //患者病历
        'history':{
            id:0,
            type_id:0,
            is_contagious:0,
            case_date:'',
            case_code:'',
            case_title:'',
            case_result:'',
            doctor_tips:'',
            file1:'',
            memo:''
        },
        //药品及治疗项目
        care_order:[],
        pkg_id:0,
        pkg_status:0,
        pkg_amount:0,
        pkg_order_code:'',
        registration_id:<?php echo ($registration_id); ?>,
    save_type:0
    },_registration_page=1,_patient_list_page=1,UNSAVE_STATUS=0,stopPayStatus=0;
    var FLS_registration_item=['patient_id','birthday','allergy_info','address','name','sex','mobile','registeredfee_name','age'];
    var FLS_patient_list_item=['patient_id','birthday','allergy_info','address','name','sex','mobile','age'];
    var FLS_medicines_list_item=['medicines_id','medicines_name','inventory_num','inventory_unit','inventory_prescription_price'];
    var FLS_inspection_list_item=['ins_id','inspection_name','unit_price','unit','class'];
    var FLS_extracharges_list_item=['pre_id','extracharges_name','fee'];
    var care_order_data=[];
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();

    //选择发病日期
    $('#case_date').datetimepicker({
        lang:'ch',
        timepicker:false,
        format:'Y-m-d',
        onChangeDateTime:function(e){
            var case_date = e.dateFormat('Y-m-d');
            DATA['history']['case_date']=case_date;
        },
        maxDate:today
    });
    //选择生日
    $('#birthday').datetimepicker({
        onChangeDateTime: function (e) {
            var birthday = e.dateFormat('Y-m-d');
            var age = getAge(birthday);
            DATA['patient']['birthday']=birthday;
            $("#age_label").html('年龄：'+age);
        },
        lang:'ch',
        timepicker:false,
        format:'Y-m-d',
        maxDate:today,
        yearStart: d.getFullYear()-125,               // 设置最小的年份
        yearEnd: d.getFullYear(),                 // 设置最大的年份
    });

    $(function() {

        $("#btn_history").click(function () {


            $('#doctory_history_box').show().find('.drugBomb').animate({right:'0'},300);
            $('body').css('overflow', 'hidden');


            // 取消或者关闭
            $('#doctory_history_box .bombMask').one('click', function(event) {
                $(this).closest('#doctory_history_box').hide().find('.drugBomb').animate({right:'-100%'},300);
                $('body').removeAttr('style');
            });

        });

        //更新在线支付额度

        $("#pay_cash").on('input propertychange',function () {
            var val = $(this).val();
            if(val.length==0){
                $("#pay_ol_input").val(DATA.pkg_amount.toFixed(2));
                update_ol_amount();
                return false;
            }
            var ol = DATA.pkg_amount-parseFloat(val);
            if(ol<0){
                ol=0;
                $("#pay_cash").val(DATA.pkg_amount.toFixed(2));
            }
            $("#pay_ol_input").val(ol.toFixed(2));
            update_ol_amount();
        });

        $("#pay_ol_input").on('input propertychange',function () {
            var val = $(this).val();
            if(val.length==0){
                $("#pay_cash").val(DATA.pkg_amount.toFixed(2));
                update_ol_amount();
                return false;
            }
            var cash = DATA.pkg_amount-parseFloat(val);
            if(cash<0){
                cash=0;
                $("#pay_ol_input").val(DATA.pkg_amount.toFixed(2));
            }
            $("#pay_cash").val(cash.toFixed(2));
            update_ol_amount();
        });

        //保存订单
        $("#btn_save_pay").click(function () {

            save_pay_do();

        });



        //选项卡切换
        $(document).on('click', '.tabBtn > li', function(){

            if($(this).hasClass('medicine_item')){
                 if($(this).html()=='中药处方'){
                     active_medicines_tab=0;
                 }else{
                     active_medicines_tab=1;
                 }
            }else if($(this).hasClass('order_tab')){
                //切换处方
                active_order_idx = $(this).data('idx');
            }

            $(this).addClass('on').siblings('li').removeClass('on').closest('.tabBtn');
            $(this).closest('.tabBtn').siblings('.tabBox').find('> li').eq($(this).index()).addClass('on').siblings('li').removeClass('on');
        });
        //打开药品添加弹框
        $(document).on('click', '.drugAddBtn', function() {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            showMedicinWin();
        });
        //打开患者选择弹框
        $(document).on('click', '.patientAdd', function() {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            $('#patientBomb').show();
            $('body').css('overflow', 'hidden');
            // 取消或者关闭
            $('#patientBomb .bombMask, #patientBomb .fa-remove').one('click', function(event) {
                $(this).closest('#patientBomb').hide();
                $('body').removeAttr('style');
            });
        });
        // 添加处方
        $(document).on('click', '.addRecipelBtn', function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }

            addOrderHtml(active_order_idx+1,1);

        });
        //删除处方
        $('#care_order_tab_btn_box').on('click', '.fa-trash', function (){
            var __idx = $(this).parent().data('idx');
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            if(DATA.care_order.length>1){
                promptBox('确定删除处方吗？', function () {
                    delete DATA['care_order'][__idx];
                    //DATA.splice(__idx,1);
                    $("#btn_order_"+__idx).remove();
                    $("#care_order_box_"+__idx).remove();

                    for(var i=DATA.care_order.length;i>=0;i--){
                        if(DATA['care_order'][i]){
                            active_order_idx=i;
                            $("#btn_order_"+active_order_idx).addClass('on');
                            $("#care_order_box_"+active_order_idx).addClass('on');
                            break;
                        }
                    }
                });
            }else{
                remindBox('必需保留一个处方');
            }
        });
        //附加费弹框
        $(document).on('click', '.ypInfo .additionalAdd', function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }

            $('#additionalBomb').show();
            active_medicines_tab=2;
            // 取消或者关闭
            $('#patientBomb .bombMask, #additionalBomb .fa-remove').one('click', function(event) {
                $(this).closest('#additionalBomb').hide();
                $('body').removeAttr('style');
            });
        });
        //收费弹框
        $(document).on('click', '.moneyAdd', function () {
            if(DATA.pkg_status==1){
                getMain();
            }else{
                saveMain(function (res) {
                    getMain();
                });
            }
        });


        //删除小项
        $(document).on('click','.delete_item',function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            var id = $(this).data('id');
            var from = $(this).data('from');
            //console.log('form:%s,id:%s', from, id);
            switch (from){
                case 'medicines':
                    delete DATA['care_order'][active_order_idx]['order_sub'][id];

                    var chk=0;
                    $.each(DATA['care_order'][active_order_idx]['order_sub'],function (i,n) {
                       if(n){
                           chk=1;
                           return false;
                       }

                    });
                    DATA['care_order'][active_order_idx].order_status=chk;
                    break;
                case 'inspectionfee':
                    delete DATA['care_order'][active_order_idx]['order_inspectionfee'][id];

                    var chk=0;
                    $.each(DATA['care_order'][active_order_idx]['order_inspectionfee'],function (i,n) {
                        if(n){
                            chk=1;
                            return false;
                        }

                    });
                    DATA['care_order'][active_order_idx].order_status=chk;

                    break;
                case 'extracharges':
                    delete DATA['care_order'][active_order_idx]['order_extracharges'][id];

                    var chk=0;
                    $.each(DATA['care_order'][active_order_idx]['order_extracharges'],function (i,n) {
                        if(n){
                            chk=1;
                            return false;
                        }
                    });
                    DATA['care_order'][active_order_idx].order_status=chk;
                    break;
            }

            parseHtmlMedicines();

        });


        //挂号列表点击
        $('#registration_box').on('click','.tr_registration_item',function () {
            $('#patientBomb').hide();
            $('body').removeAttr('style');

            var id=$(this).data('patient_id');
            var o=getItemInfo(FLS_registration_item,'registration_item_'+id);
            DATA.registration_id = $(this).data('registration_id');
            //console.log(o);
            $("#patient_id").val(o.patient_id);
            $("#patient_name").val(o.name);
            $("#birthday").val(o.birthday);
            $("#patient_sex").val(o.sex);
            $("#patient_mobile").val(o.mobile);
            $("#patient_allergy").val(o.allergy_info);
            $("#patient_address").val(o.address);

            //更新DATA缓存
            $.each(DATA['patient'],function (i,n) {
                DATA['patient'][i]=o[i];
                if(i=='birthday')$("#age_label").html('年龄：'+getAge(DATA['patient'][i]));
            });

            //registration_id
            getUserInfo();
            getCareHistory();
        });
        $('#patient_list_box').on('click','.tr_patient_list_item',function () {
            $('#patientBomb').hide();
            $('body').removeAttr('style');

            var id=$(this).data('patient_id');
            var o=getItemInfo(FLS_patient_list_item,'patient_list_item_'+id);
            //console.log(o);return false;
            $("#patient_id").val(o.patient_id);
            $("#patient_name").val(o.name);
            $("#patient_sex").val(o.sex);
            $("#patient_mobile").val(o.mobile);
            $("#patient_allergy").val(o.allergy_info);
            $("#birthday").val(o.birthday);
            $("#patient_address").val(o.address);

            //更新DATA缓存
            $.each(DATA['patient'],function (i,n) {
                DATA['patient'][i]=o[i];
                if(i=='birthday')$("#age_label").html('年龄：'+getAge(DATA['patient'][i]));
            });

            getUserInfo();
            getCareHistory();

        });

        $("#medicines_list_box").on('click','.medicines_list_item',function () {

            var id = $(this).val();
            var o = $('#tr_medicines_list_item_'+id);

            var has = o.hasClass('sel');
            if(has){
                o.removeClass('sel');
            }else{
                o.addClass('sel');
            }

            $("#medicines_list_item_"+id).prop('checked',!has);
        });

         $("#inspectionfee_list_box").on('click','.inspection_list_item',function () {

            var id = $(this).val();

             var o = $(this).parent().parent().parent();

            var has = o.hasClass('sel');
            if(has){
                o.removeClass('sel');
            }else{
                o.addClass('sel');
            }

            $("#inspection_list_item_"+id).prop('checked',!has);
        });

        $("#extracharges_list_box").on('click','.extracharges_list_item',function () {

            var id = $(this).val();

             var o = $(this).parent().parent().parent();

            var has = o.hasClass('sel');
            if(has){
                o.removeClass('sel');
            }else{
                o.addClass('sel');
            }

            $("#extracharges_list_item_"+id).prop('checked',!has);
        });




        $('#medicines_list_box').on('click','.tr_medicines_list_item',function () {
            var id = $(this).data('id');
            var has = $(this).hasClass('sel');
            if(has){
                $(this).removeClass('sel');
            }else{
                $(this).addClass('sel');
            }

            $("#medicines_list_item_"+id).prop('checked',!has);

        });
        $('#inspectionfee_list_box').on('click','.tr_inspection_list_item',function () {
            var id = $(this).data('id');
            var has = $(this).hasClass('sel');
            if(has){
                $(this).removeClass('sel');
            }else{
                $(this).addClass('sel');
            }
            $("#inspection_list_item_"+id).prop('checked',!has);
        });
        $('#extracharges_list_box').on('click','.tr_extracharges_list_item',function () {
            var id = $(this).data('id');
            var has = $(this).hasClass('sel');
            if(has){
                $(this).removeClass('sel');
            }else{
                $(this).addClass('sel');
            }
            $("#extracharges_list_item_"+id).prop('checked',!has);
        });
        $('#history_search_list_box').on('click','.history_list_item',function(){

            if(UNSAVE_STATUS==1 && !confirm('您要载入记录，放弃页面未保存的内容？'))return false;

            DATA.patient.id = $(this).data('patient_id');

            loadHistory($(this).data('pkg_id'));
        });


        //挂号列表搜索
        $('#registration_search_in').bind('input propertychange', function() {
            var kw = $(this).val();
            //if(kw.length>0){
            getRegistrations(kw,1)
            //}
        });
        $('#medicines_search_in').bind('input propertychange', function() {
            var kw = $(this).val();
            //if(kw.length>0){
            getMedicines(kw)
            //}
        });
        $('#patient_search_in').bind('input propertychange', function() {
            var kw = $(this).val();
            //if(kw.length>0){
            getPatientList(kw,1)
            //}
        });
        $('#inspectionfee_search_in').bind('input propertychange', function() {
            var kw = $(this).val();
            //if(kw.length>0){
            getInspectionfee(kw)
            //}
        });

        $('#history_search_in').bind('input propertychange', function() {
            getLastPkg();
        });
        $("#history_search_status").change(function () {
            getLastPkg();
        });


        //挂号列表翻页
        $("#registration_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _registration_page=parseInt(_registration_page)+1;
                }else{
                    _registration_page=parseInt(_registration_page)-1;
                }
            }else{
                _registration_page=parseInt($(this).html());
            }
            var kw=$('#registration_search_in').val();
            getRegistrations(kw,_registration_page);
        });
        $("#patient_list_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _patient_list_page=parseInt(_patient_list_page)+1;
                }else{
                    _patient_list_page=parseInt(_patient_list_page)-1;
                }
            }else{
                _patient_list_page=parseInt($(this).html());
            }
            var kw=$('#patient_search_in').val();
            getPatientList(kw,_patient_list_page);
        });
        //挂号列表鼠标移入
        $("#registration_box").on("mouseover mouseout",'.tr_registration_item',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                $(this).addClass('on');
            }else if(event.type == "mouseout"){
                //鼠标离开
                $(this).removeClass('on');
            }
        });
        $("#patient_list_box").on("mouseover mouseout",'.tr_patient_list_item',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                $(this).addClass('on');
            }else if(event.type == "mouseout"){
                //鼠标离开
                $(this).removeClass('on');
            }
        });
        $("#medicines_list_box").on("mouseover mouseout",'.tr_medicines_list_item',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                $(this).addClass('on');
            }else if(event.type == "mouseout"){
                //鼠标离开
                $(this).removeClass('on');
            }
        });
        $("#inspectionfee_list_box").on("mouseover mouseout",'.tr_inspection_list_item',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                $(this).addClass('on');
            }else if(event.type == "mouseout"){
                //鼠标离开
                $(this).removeClass('on');
            }
        });
        $("#extracharges_list_box").on("mouseover mouseout",'.tr_extracharges_list_item',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                $(this).addClass('on');
            }else if(event.type == "mouseout"){
                //鼠标离开
                $(this).removeClass('on');
            }
        });
        $("#history_search_list_box").on("mouseover mouseout",'.history_list_item',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                $(this).addClass('on');
            }else if(event.type == "mouseout"){
                //鼠标离开
                $(this).removeClass('on');
            }
        });


        //挂号列表手机号搜索
        $('#patient_mobile').bind('input propertychange', function() {
            var kw = $(this).val();

            ///DATA.patient.mobile = kw;
            if(kw.length==11){
            searchPatientByMobile(kw)
            }
        });
        //挂号输入窗手机号必需填写？？
        /*$("#patient_mobile").blur(function () {
            if(validatemobile($(this))==false){
                return false;
            }
        });*/

        //自动缓存数据到DATA
        $(document).on('input propertychange','.input_auto_cache',function (e) {
            //console.log(e);
            var len=0;
            var val=$(this).val();
            var type = $(this).attr('type');
            if(type=='number'){
                val=val.replace(/[^\0-9.]/g,'');
                if(val.length==0)val=1;
                $(this).val(val);
            }


            val=$(this).val();
            if(val.length==0){
                val = 0;
                if(type=='number') $(this).val(0);
                len =1;
            }else{
                len = val.length;
            }

            var maxlength = $(this).attr('maxlength');
            if(maxlength>0){
                if(len>maxlength){
                    $(this).val(val.substr(0,maxlength));
                    val=$(this).val();
                    len = maxlength;
                }

                layer.tips(len+'/'+maxlength, this);

                console.log($(this).attr('id'));
            }


            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }

            var name=$(this).attr('name');
            var data_to=$(this).data('data_to');

            console.log('cache:%s,%s,%s',val,name,data_to);

            switch(data_to){
                case 'patient':
                    DATA[data_to][name]=val;
                    break;
                case 'history':
                    DATA[data_to][name]=val;
                    break;
                case 'order_sub':
                    var mid=$(this).data('medicines_id');
                    DATA['care_order'][active_order_idx]['order_sub'][mid][name]=val;
                    if(name=='num'){
                        var item_amount = DATA['care_order'][active_order_idx]['order_sub'][mid].info.inventory_prescription_price*parseFloat(val);
                        $("#sub_item_amount_"+mid).html(item_amount.toFixed(2));
                        //药品显示
                        showMedicines();
                    }
                    break;
                case 'order':
                    DATA['care_order'][active_order_idx]['order'][name]=val;
                    //总价计算
                    if(name=='num_a'||name=='num_b'||name=='num_c'){
                        count_d();
                    }

                    break;
                case 'order_extracharges':
                    var pre_id=$(this).data('pre_id');
                    DATA['care_order'][active_order_idx]['order_extracharges'][pre_id][name]=val;
                    if(name=='num'){
                        var item_amount3 = DATA['care_order'][active_order_idx]['order_extracharges'][pre_id].info.fee*parseFloat(val);
                        $("#sub_extracharges_item_amount_"+pre_id).html(item_amount3.toFixed(2));
                        //药品显示
                        showMedicines();
                    }

                    break;
                case 'order_inspectionfee':
                    var id=$(this).data('medicines_id');
                    DATA['care_order'][active_order_idx]['order_inspectionfee'][id][name]=val;
                    if(name=='num'){
                        var item_amount2 = DATA['care_order'][active_order_idx]['order_inspectionfee'][id].info.unit_price*parseFloat(val);
                        $("#sub_inspectionfee_item_amount_"+id).html(item_amount2.toFixed(2));
                        //药品显示
                        showMedicines();
                    }


                    break;
            }

            unsave_check(1);
        });

        //及时计算金额
        $("#care_order_tab_content_box").on('input propertychange','._chk_input_',function () {
            var mid;
            var val=$(this).val();
            var type=$(this).data('type');
            if(type=='num'){
                mid=$(this).data('medicines_id');
                if(val==''||val.length==0||val<=0){
                    $("#buy_m_num_"+mid).val(1);
                    val=1;
                }
                DATA['care_order'][active_order_idx]['order_sub'][mid].num=parseFloat(val);
                var item_amount = DATA['care_order'][active_order_idx]['order_sub'][mid].info.inventory_prescription_price*parseFloat(val);
                $("#sub_item_amount_"+mid).html(item_amount.toFixed(2));
            }else if(type=='tips'){
                mid=$(this).data('medicines_id');
                DATA['care_order'][active_order_idx]['order_sub'][mid].tips=val;
            }else{
                //每a天b剂 服用c天	共 d 剂
                var name=$(this).attr('name'); //name_a  name_b
                if(DATA['care_order'][active_order_idx]['order_sub'].length>0){
                    DATA['care_order'][active_order_idx]['order'][name]=val;
                }
            }
            ///parseHtmlMedicines();
        });

        //点击添加药品
        $("#btn_add_medicines").click(function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            addMedicines(0);
        });
        $("#btn_add_medicines_and_close").click(function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            addMedicines(1);
        });
        $("#btn_add_extracharges").click(function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            addMedicines(0);
        });

        //点击保存
        $("#btn_save_all").click(function () {
            if(check_pkg_status()==false){
                remindBox('状态不支持！');
                return false;
            }
            saveMain();
        });

        //初始化信息
        // 添加一个空处方
        addOrderHtml(0,0);
        //获取挂号列表
        getRegistrations('',1);
        //获取患者库列表
        getPatientList('',1);
        //药品
        getMedicines('');
        //检查项目
        getInspectionfee('');
        //获取附加费用
        getExtracharges();

        var patient_id = $("#patient_id").val();
        if(patient_id>0){
            getCareHistory();
            getUserInfo();
            var bd = $("#birthday").val();

            if(bd.length>6)$("#age_label").html('年龄：'+getAge(bd));
        }

        getLastPkg();
        /*
              var H = $(window).height();

                console.log('h:'+H);
                $("#drugBomb")ight(H-53);

                /*
                       console.log('$(window).height():'+$(window).height());
                       console.log('$(document).height():'+$(document).height());
                       console.log('window.screen.availHeight :'+window.screen.availHeight);
                       console.log('window.screen.height :'+window.screen.height);
                       console.log('document.body.offsetHeight :'+document.body.offsetHeight);
                       console.log('document.body.clientHeight :'+document.body.clientHeight);*/

        //
        //$("#my_content_box").css('height',H-80+'px');


        //case_date
        var case_date=$("#case_date").val();
        if(case_date.length<5){
            DATA.history.case_date = today;
            $("#case_date").val(today);

        }
    });

    function save_pay_do() {
        var cash = $("#pay_cash").val();
        var ol = $("#pay_ol_input").val();

        $.post('/Doctor/payOrder',{pkg_id:DATA.pkg_id,ol:ol,cash:cash,pkg_status:DATA.pkg_status,registration_id:DATA.registration_id},function (res) {
            if(res.status==0){

                remindBox('保存成功');
                $('#moneyBomb').hide();
                $('body').removeAttr('style');
                stopPayStatus=1;
                DATA.pkg_status=1;
                DATA.pkg_order_code=res.data.order_code;
                show_pay_status();
            }else{
                parent.layer.msg(res.msg);
            }
        });
    }

    function update_ol_amount() {
        var ol = $("#pay_ol_input").val();
        if(ol.length==0)ol=0;
        $.post('/Doctor/change_ol_pay_part',{pkg_id:DATA.pkg_id,ol:ol},function (res) {
            if(res.status==0){
                //remindBox('更新成功');
            }else{
                alert(res.msg);
            }
        });
    }

    function fix_height() {

    }

    //显示收费状态
    function show_pay_status() {
        //pkg_order_code

        var pkg_status_label = DATA.pkg_status==1?'已收费':'未收费';
        $("#pkg_status_label").html(pkg_status_label);
        $("#pkg_status_label").attr('title','￥'+DATA.pkg_amount);
        $("#care_case_code").html(DATA.pkg_order_code);

        if(DATA.pkg_status==1){
            $("#pay_qr_img").hide();
        }else{
            $("#pay_qr_img").show();
        }
    }



    //计算几剂药
    function count_d() {
        var a=parseInt($("#care_order_num_a_"+active_order_idx).val());
        var b=parseInt($("#care_order_num_b_"+active_order_idx).val());
        var c=parseInt($("#care_order_num_c_"+active_order_idx).val());

        //每a天b剂	服用c天	共 d 剂
        var d=Math.ceil(c*(b/a));
        //console.log('每%d天%d剂,服用%d天,共 %d 剂', a,b,c,d);
        $("#care_order_num_"+active_order_idx).html(d);
        $("#care_order_num_d_"+active_order_idx).val(d);
        if(DATA['care_order'][active_order_idx]['order'])DATA['care_order'][active_order_idx]['order']['num_d']=d;
    }


    //获取最近看病记录
    function getLastPkg() {
        var kw = $("#history_search_in").val();
        var status = $("#history_search_status").val();
        $.post('/Doctor/getPkgList',{kw:kw,status:status},function (res) {
            if(res.status==0){

                if(res.data.num>0){
                    var h,L=[
                        '未支付','已支付','确认收款','申请退款','已退款','部分支付','完成交易','部分退款'
                    ],LS=[
                        'unpay',
                        'payed',
                        '',
                        'pre_refund',
                        'refund',
                        'payed_part'
                    ];
                    $.each(res.data.list,function (i,n) {
                        h+='<tr' +
                            ' class="history_list_item" ' +
                            ' title="点击载入" ' +
                            ' id="history_list_item_'+n.id+'" ' +
                            ' data-pkg_id="'+n.id+'" ' +
                            ' data-care_history_id="'+n.care_history_id+'" ' +
                            ' data-patient_id="'+n.patient_id+'" ' +
                            ' data-order_code="'+n.order_code+'" ' +
                            ' data-status="'+n.status+'" ' +
                            ' data-amount="'+n.amount+'" ' +
                            '>\n' +
                            '<td>'+n.name+'</td>\n' +
                            '<td>'+n.mobile+'</td>\n' +
                            '<td title="'+n.addtime_str_full+'">'+n.addtime_str+'</td>\n' +
                            '<td title="金额：￥'+n.amount+'"><span class="pay_status '+LS[n.status]+'">'+L[n.status]+'</span></td>\n' +
                            '</tr>\n';
                    });

                    $("#history_search_list_box").html(h);
                }else{
                    $("#history_search_list_box").html('<tr><td colspan="5" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                }

            }else{
                alert(res.msg);
            }
        });
    }

    //加载看诊记录
    function loadHistory(pkg_id) {

        var o = $('#history_list_item_'+pkg_id);

        $("#patient_id").val(DATA.patient.id);
        DATA.patient.id = o.data('patient_id');
        DATA.history.id = o.data('care_history_id');
        DATA.pkg_status = o.data('status');
        DATA.pkg_order_code = o.data('order_code');
        DATA.pkg_amount = o.data('amount');
        DATA.pkg_id = pkg_id;
        searchPatientByMobile(DATA.patient.id);

        getUserInfo();
        getCareHistory();

        loadCareOrder(pkg_id);

        $('#doctory_history_box').hide().find('.drugBomb').animate({right:'-100%'},300);
        $('body').removeAttr('style');

        show_pay_status();
    }

    //加载用药详情
    function loadCareOrder(pkg_id) {
        $.post('/Doctor/getCareOrder',{pkg_id:pkg_id},function (res) {
            if(res.status==0){
                if(res.data.num>0){
                    //清除现有
                    if(DATA.care_order.length>0){
                        for(var __idx=DATA.care_order.length;__idx>=0;__idx--) {
                            delete DATA['care_order'][__idx];
                            $("#btn_order_"+__idx).remove();
                            $("#care_order_box_"+__idx).remove();
                        }
                        active_order_idx=-1;
                    }

                    care_order_data = res.data.list;

                    showCareOrderData();

                }
            }else{
                alert(res.msg);
            }
        });
    }

    //加载看诊方子
    function showCareOrderData() {

        if(care_order_data.length==0){
            return false;
        }
        active_order_idx++;
        addOrderHtml(active_order_idx,0);
        var o = care_order_data.shift();

        $("#care_order_num_a_"+active_order_idx).val(o.num_a);
        $("#care_order_num_b_"+active_order_idx).val(o.num_b);
        $("#care_order_num_c_"+active_order_idx).val(o.num_c);
        $("#care_order_num_d_"+active_order_idx).val(o.num_d);
        $("#care_order_num_"+active_order_idx).val(o.num_d);
        $("#care_order_use_tips_"+active_order_idx).val(o.use_tips);
        $("#care_order_memo_"+active_order_idx).val(o.memo);

        count_d();

        /*

        {
            'idx':idx,
            'label':'处方'+(idx+1),
            'order_status':0,
            'order':{
                'id':0,
                'num_a':1,
                'num_b':1,
                'num_c':1,
                'num_d':1,
                'amount':0,
                'case_code':'',
                'use_tips':'',
                'memo':''
            },
            'order_sub':[],//药品
            'order_inspectionfee':[],//检查项目
            'order_extracharges':[]//附加费用
        };
        */

        DATA['care_order'][active_order_idx]['idx']=active_order_idx;
        DATA['care_order'][active_order_idx]['label']=o.label;
        DATA['care_order'][active_order_idx]['order_status']=1;
        DATA['care_order'][active_order_idx]['order']= {
            id: o.id,
            num_a: o.num_a,
            num_b: o.num_b,
            num_c: o.num_c,
            num_d: o.num_d,
            amount: o.all_amount,
            case_code: o.case_code,
            use_tips: o.use_tips,
            memo: o.memo
        };

        //获取子项目
        $.post('/Doctor/getCareOrderSub',{fid:o.id},function (res) {
            if(res.status==0) {
                //分类：0药，1附加费，2检查项目
                if(res.data.num>0) {
                    $.each(res.data.list,function (i,n) {
                        parseCareOrderSub(n);
                    });
                }
                parseHtmlMedicines();

                showCareOrderData();
                count_d();
            }else{
                alert(res.msg);
            }
        });
    }

    //加载看诊方子明细
    function parseCareOrderSub(o){
        var id= o.goods_id;
        var type_id = parseInt(o.type_id);

        //console.log('type_id:%d,%o', type_id,o);

        if(type_id==0){
            //药
            DATA['care_order'][active_order_idx]['order_sub'][id]={id:o.id,num:o.num,tips:o.tips,amount:o.amount,info:{
                medicines_id:id,
                medicines_name:o.goods_name,
                inventory_unit:o.unit,
                inventory_num:o.num,
                inventory_prescription_price:o.price,
            }};
        }else if(type_id==2){
            //检查项目
            DATA['care_order'][active_order_idx]['order_inspectionfee'][id]={id:o.id,num:o.num,tips:o.tips,amount:o.amount,info:{
                ins_id:id,
                inspection_name:o.goods_name,
                unit:o.unit,
                unit_price:o.price,
                class:o.tips
            }};

        }else{
            //附加费用order_extracharges

            DATA['care_order'][active_order_idx]['order_extracharges'][id]={id:o.id,num:o.num,tips:o.tips,amount:o.amount,info:{
                pre_id:id,
                extracharges_name:o.goods_name,
                fee:o.price,
            }};
        }
    }


    function check_pkg_status(){
        show_pay_status();
        return DATA.pkg_status==0;
    }

    //显示右侧添加药品菜单
    function showMedicinWin() {
        //设置默认为药
        active_medicines_tab=0;
        $("#drugBomb .medicine_item").removeClass('on');
        $("#drugBomb .tabBox li").removeClass('on');
        $("#drugBomb .medicine_item:first").addClass('on');
        $("#drugBomb .tabBox li:first").addClass('on');


        $('#drugBomb').show().find('.drugBomb').animate({right:'0'},0);
        $('body').css('overflow', 'hidden');


        // 取消或者关闭
        $('#drugBomb .bombMask').one('click', function(event) {
            $(this).closest('#drugBomb').hide().find('.drugBomb').animate({right:'-100%'},300);
            $('body').removeAttr('style');
        });
    }


    //添加药品
    function addMedicines(close_win) {
        //console.log('active_medicines_tab:%s,active_order_idx:%s',active_medicines_tab,active_order_idx);
        var sel,id,tm,info,amount=0,i3,t_o,ck;

        if(active_medicines_tab==0){
            //药
            //判断检查
            if(DATA['care_order'][active_order_idx]['order_inspectionfee'].length>0){

                t_o = DATA['care_order'][active_order_idx]['order_inspectionfee'];

                ck=1;
                for(i3=0;i3<t_o.length;i3++){
                    if(typeof t_o[i3] !='undefined'){
                        ck=0;
                        break;
                    }
                }

                if(ck==0){
                    remindBox('药品和检查项目不能在同一处方，请使用其它处方');
                    return false;
                }

            }

            sel = $(".medicines_list_item:checked");
            if(sel.length==0)return false;

            $.each(sel,function () {
                id = $(this).val();
                if(!DATA['care_order'][active_order_idx]['order_sub'][id]){
                    info=getItemInfo(FLS_medicines_list_item,'medicines_list_item_'+id);
                    tm=info.inventory_prescription_price;
                    DATA['care_order'][active_order_idx]['order_sub'][id]={id:0,num:1,tips:'',amount:tm,info:info};
                }else{
                    DATA['care_order'][active_order_idx]['order_sub'][id].num+=1;
                    info=DATA['care_order'][active_order_idx]['order_sub'][id].info;
                    tm=info.inventory_prescription_price*DATA['care_order'][active_order_idx]['order_sub'][id].num;
                    DATA['care_order'][active_order_idx]['order_sub'][id].amount=tm;
                }
                amount+=tm;

                //取消选择
                $("#medicines_list_item_"+id).prop('checked',false);
                $("#tr_medicines_list_item_"+id).removeClass('sel');
            });

            DATA['care_order'][active_order_idx]['order']['amount'] = amount;


        }else if(active_medicines_tab==1){
            //检查项目
            //判断药品
            if(DATA['care_order'][active_order_idx]['order_sub'].length>0){

                t_o = DATA['care_order'][active_order_idx]['order_sub'];
                ck=1;
                for(i3=0;i3<t_o.length;i3++){
                    if(typeof t_o[i3] !='undefined'){
                        ck=0;
                        break;
                    }
                }

                if(ck==0) {
                    remindBox('药品和检查项目不能在同一处方，请使用其它处方');
                    return false;
                }
            }
            sel = $(".inspection_list_item:checked");
            if(sel.length==0)return false;
            $.each(sel,function () {
                id = $(this).val();

                    if(!DATA['care_order'][active_order_idx]['order_inspectionfee'][id]){
                        info=getItemInfo(FLS_inspection_list_item,'inspection_list_item_'+id);
                        tm=info.unit_price;
                        DATA['care_order'][active_order_idx]['order_inspectionfee'][id]={id:0,num:1,amount:tm,info:info};
                    }else{
                        DATA['care_order'][active_order_idx]['order_inspectionfee'][id].num+=1;
                        info=DATA['care_order'][active_order_idx]['order_inspectionfee'][id].info;
                        tm=info.unit_price*DATA['care_order'][active_order_idx]['order_inspectionfee'][id].num;
                        DATA['care_order'][active_order_idx]['order_inspectionfee'][id].amount=tm;
                    }
                    amount+=tm;
                    //取消选择
                    $("#inspection_list_item_"+id).prop('checked',false);
                });
                $(".tr_inspection_list_item").removeClass('sel');

                //DATA['care_order'][active_order_idx]['order']['amount'] = amount;

        }else{
            //附加费用
            sel = $(".extracharges_list_item:checked");
            if(sel.length==0)return false;
            amount=0;
            $.each(sel,function () {
                id = $(this).val();

                if(!DATA['care_order'][active_order_idx]['order_extracharges'][id]){
                    info=getItemInfo(FLS_extracharges_list_item,'extracharges_list_item_'+id);
                    tm=info.fee;
                    DATA['care_order'][active_order_idx]['order_extracharges'][id]={id:0,num:1,amount:tm,info:info};
                }else{
                    var num = DATA['care_order'][active_order_idx]['order_extracharges'][id].num;
                    DATA['care_order'][active_order_idx]['order_extracharges'][id].num=parseFloat(num)+1;
                    info=DATA['care_order'][active_order_idx]['order_extracharges'][id].info;
                    tm=info.fee*DATA['care_order'][active_order_idx]['order_extracharges'][id].num;
                    DATA['care_order'][active_order_idx]['order_extracharges'][id].amount=tm;
                }
                amount+=tm;

                //取消选择
                $("#extracharges_list_item_"+id).prop('checked',false);
            });
            $(".tr_extracharges_list_item").removeClass('sel');
            //关闭窗口
            $('#additionalBomb').hide();
            $('body').removeAttr('style');
        }

        DATA['care_order'][active_order_idx]['order_status']=1;

        unsave_check(1);
        parseHtmlMedicines();

        if(close_win>0){
            $('#drugBomb').hide().animate({right:'-100%'},300);
            $('body').removeAttr('style');
        }

    }

    //把数据用html显示出来
    function parseHtmlMedicines() {

        var data = DATA['care_order'][active_order_idx]['order_sub'];
        var s='',j=0,o,item_amount=0;
        //console.log(data);

            if(DATA.care_order.length>0){
                //j=0,item_amount=0;
                $.each(data,function (i,n) {
                    if(!n)return true;

                    j++;

                    o=n.info;
                    item_amount = o.inventory_prescription_price*n.num;

                    s+='<tr id="sub_item_'+o.medicines_id+'" data-id="'+o.medicines_id+'">' +
                        '<td>药'+j+'</td>\n' +
                        '<td>'+o.medicines_name+'</td>\n' +
                        '<td><input type="number" min="1" max="100000" maxlength="8" class="form-control form-itmeB formNumber ml10 mr10 input_auto_cache" data-data_to="order_sub" placeholder="数量" value="'+n.num+'" data-medicines_id="'+o.medicines_id+'" name="num" id="buy_m_num_'+o.medicines_id+'"  />'+o.inventory_unit+'</td>\n' +
                        '<td>'+o.inventory_prescription_price+'/'+o.inventory_unit+'</td>\n' +
                        '<td id="sub_item_amount_'+o.medicines_id+'">'+item_amount.toFixed(2)+'</td>\n' +
                        '<td><input type="text" value="'+n.tips+'" class="input_auto_cache" data-data_to="order_sub" placeholder="特殊要求" data-medicines_id="'+o.medicines_id+'" name="tips" maxlength="100" /></td>\n' +
                        '<td><a class="fa fa-trash delete_item" data-from="medicines" data-id="'+o.medicines_id+'"></a></td>\n' +
                        '</tr>';

                });


                $("._num_item_"+active_order_idx).show();
            }else{
                $("._num_item_"+active_order_idx).hide();
            }

        //检查项目放药品后面
        var data_order_inspectionfee = DATA['care_order'][active_order_idx]['order_inspectionfee'];

        //console.log(data);

        if(data_order_inspectionfee.length>0){
            j=0;item_amount=0;
            $.each(data_order_inspectionfee,function (i,n) {
                if(!n)return true;

                j++;

                o=n.info;
                item_amount = parseFloat(o.unit_price)*n.num;

                s+='<tr id="sub_inspectionfee_item_'+o.ins_id+'" data-id="'+o.ins_id+'">' +
                    '<td>检'+j+'</td>\n' +
                    '<td>'+o.inspection_name+'</td>\n' +
                    '<td><input type="number" min="1" max="100000" maxlength="8" class="form-control form-itmeB formNumber ml10 mr10 input_auto_cache" data-data_to="order_inspectionfee" placeholder="数量" value="'+n.num+'" data-medicines_id="'+o.ins_id+'" name="num" id="buy_inspectionfee_num_'+o.ins_id+'" />'+o.unit+'</td>\n' +
                    '<td>'+o.unit_price+'/'+o.unit+'</td>\n' +
                    '<td id="sub_inspectionfee_item_amount_'+o.ins_id+'">'+item_amount.toFixed(2)+'</td>\n' +
                    '<td>'+o.class+'</td>\n' +
                    '<td><a class="fa fa-trash delete_item" data-from="inspectionfee" data-id="'+o.ins_id+'"></a></td>\n' +
                    '</tr>';

            });
            $("._num_item_"+active_order_idx).hide();
        }

        //order_extracharges 附加费用
        var data_order_extracharges = DATA['care_order'][active_order_idx]['order_extracharges'];

        //console.log(data);

        if(data_order_extracharges.length>0){
            j=0;item_amount=0;
            $.each(data_order_extracharges,function (i,n) {
                if(!n)return true;

                j++;

                o=n.info;
                item_amount = parseFloat(o.fee)*n.num;

                s+='<tr id="sub_extracharges_item_'+o.pre_id+'" data-id="'+o.pre_id+'">' +
                    '<td>附'+j+'</td>\n' +
                    '<td>'+o.extracharges_name+'</td>\n' +
                    '<td><input type="number" min="1" max="100000" maxlength="8" class="form-control form-itmeB formNumber ml10 mr10 input_auto_cache" data-data_to="order_extracharges" placeholder="数量" value="'+n.num+'" data-pre_id="'+o.pre_id+'" name="num" id="buy_extracharges_num_'+o.pre_id+'" />次</td>\n' +
                    '<td>'+o.fee+'/'+'次</td>\n' +
                    '<td id="sub_extracharges_item_amount_'+o.pre_id+'">'+item_amount.toFixed(2)+'</td>\n' +
                    '<td>附加费</td>\n' +
                    '<td><a class="fa fa-trash delete_item" data-from="extracharges" data-id="'+o.pre_id+'"></a></td>\n' +
                    '</tr>';
            });
        }

        $("#care_order_medicines_list_box_"+active_order_idx).html(s);


        showMedicines();
    }

    //药品展示
    function showMedicines() {
        var data = DATA['care_order'][active_order_idx]['order_sub'];

        if(DATA.care_order.length>0){
            var s='',txt='',j=0,o,item_amount=0,order_maount=0;
            $.each(data,function (i,n) {
                if(!n)return true;

                j++;
                //console.log(n);

                o=n.info;
                item_amount = o.inventory_prescription_price*n.num;
                order_maount+=item_amount;

                txt+='<span>'+o.medicines_name+' '+n.num+o.inventory_unit+'</span>';
            });
            DATA['care_order'][active_order_idx]['order']['amount']=order_maount;

            $("#care_order_sub_box_"+active_order_idx).html(txt);

            if(txt.length>0){
                $(".medicines_show_"+active_order_idx).show();
            }else{
                $(".medicines_show_"+active_order_idx).hide();
            }

        }
    }


    //添加药方
    function addOrderHtml(idx,autoShowMedicinWin) {


        //判断空处方
        var chk__=1;
        for(var a=0;a<DATA.care_order.length;a++) {
            if(DATA['care_order'][a] && DATA['care_order'][a].order_status==0){

                //console.log(DATA['care_order'][a]);

                remindBox('请使用空处方！');
                return false;
            }/*else{

                for(var b=0;b<DATA['care_order'][a]['order_sub'].length;b++) {
                    if(DATA['care_order'][a]['order_sub'][b].num){
                        chk__=0;
                        break;
                    }
                }
            }*/
        }

        if(DATA.care_order.length>4){
            remindBox('系统限制同一患者病历，只可开5个处方！');
            return false;
        }

        active_order_idx = idx;


        DATA['care_order'][idx]={
            'idx':idx,
            'label':'处方'+(idx+1),
            'order_status':0,
            'order':{
                'id':0,
                'num_a':1,
                'num_b':1,
                'num_c':1,
                'num_d':1,
                'amount':0,
                'case_code':'',
                'use_tips':'',
                'memo':''
            },
            'order_sub':[],//药品
            'order_inspectionfee':[],//检查项目
            'order_extracharges':[]//附加费用
        };

        //console.log(DATA['care_order'][idx]);

        $('#care_order_tab_btn_box').find('li').removeClass('on');
        $('#care_order_tab_content_box').find('li').removeClass('on');


        $('#care_order_tab_btn_box').append('<li class="btn on order_tab"  id="btn_order_'+idx+'" data-idx="'+idx+'"><i class="fa fa-trash"></i> 处方'+(idx+1)+'</li>');

        $('#care_order_tab_content_box').append('<li class="on" id="care_order_box_'+idx+'">\
				<h3 class="panel-title mt20 fz14 gray2">处方编号：<span title="保存后可生成" id="care_order_case_code">未生成</span></h3>\
				<table class="table drugsTable">\
					<thead>\
						<tr>\
							<th>序号</th>\
							<th>药品名</th>\
							<th>数量</th>\
							<th>单价（元）</th>\
							<th>金额（元）</th>\
							<th>特殊要求</th>\
							<th>操作</th>\
						</tr>\
					</thead>\
					<tbody id="care_order_medicines_list_box_'+idx+'"></tbody>\
				</table>\
				<button type="button" class="btn btn-primary wb100 drugAddBtn">添加药品</button>\
				<div class="ftr ypInfo clearfix mb20">\
					<span class="btn btn-success l mt20 additionalAdd"><i class="fa fa-plus-circle"></i> 附加费用</span>\
					<div class="fublBox mr10 mt20 _num_item_'+idx+'">每<input type="number" maxlength="4" class="form-control form-itmeB formNumber ml10 mr10 input_auto_cache" data-data_to="order" placeholder="" value="1" name="num_a" id="care_order_num_a_'+idx+'" />天</div>\
					<div class="fublBox mr20 mt20 _num_item_'+idx+'"><input type="number"  maxlength="4" class="form-control form-itmeB formNumber mr10 input_auto_cache" data-data_to="order" value="1" name="num_b"  id="care_order_num_b_'+idx+'">剂</div>\
					<div class="fublBox mr20 mt20 _num_item_'+idx+'">服用<input type="number"  maxlength="4" class="form-control form-itmeB formNumber ml10 mr10 input_auto_cache" data-data_to="order" value="1" name="num_c"  id="care_order_num_c_'+idx+'">天</div>\
					<div class="fublBox mt20 _num_item_'+idx+'"><input type="hidden" name="num_d" id="care_order_num_d_'+idx+'" value="1" />共 <span id="care_order_num_'+idx+'">1</span> 剂</div>\
				</div>\
				<h3 class="heading blue medicines_show medicines_show_'+idx+'">药品展示</h3>\
				<div class="care_order_sub_box medicines_show medicines_show_'+idx+'" id="care_order_sub_box_'+idx+'"></div>\
				<h3 class="heading blue">服药要求</h3>\
				<textarea class="form-control mb20 input_auto_cache" data-data_to="order" rows="2" maxlength="500" placeholder="填写医生建议（限500字）" name="use_tips" id="care_order_use_tips_'+idx+'" ></textarea>\
				<h3 class="heading blue">中药备注</h3>\
				<textarea class="form-control mb20 input_auto_cache" data-data_to="order" rows="2" maxlength="500" placeholder="填写中药备注（限500字）" name="memo" id="care_order_memo_'+idx+'"></textarea>\
			</li>');

        if(autoShowMedicinWin>0)showMedicinWin();

        $("._num_item_"+idx).hide();
    }

    //主保存按钮
    function saveMain(rc) {
        var todo=0,isok=0;

        /*if(UNSAVE_STATUS==0){
            //remindBox('无需保存！');
            return false;
        }*/

        var patient_name = $("#patient_name").val();
        if(patient_name==''||patient_name.length==0){
            remindBox('患者姓名必填写');
            $("#patient_name").focus();
            return false;
        }

        var birthday = $("#birthday").val();
        if(birthday==''||birthday.length==0){
            remindBox('患者生日必填写');
            $("#birthday").focus();
            return false;
        }

        var patient_mobile = $("#patient_mobile").val();
        if(patient_mobile==''||patient_mobile.length==0){
            remindBox('患者手机号必填写');
            $("#patient_mobile").focus();
            return false;
        }

        //console.log(DATA);

        loadBox('保存中...');

        DATA.save_type = (typeof rc == 'function')?1:0;

        $.post('/Doctor/saveOrder',DATA,function (res) {
            closeLoadBox();
            if(res.status==0){
                if(res.data.pkg_id>0)DATA.pkg_id=res.data.pkg_id;
                if(res.data.care_history_id>0)DATA.history.id=res.data.care_history_id;
                if(res.data.patient_id>0)DATA.patient.id=res.data.patient_id;
                DATA.pkg_order_code = res.data.order_code;

                $("#care_case_code").html(DATA.pkg_order_code );

                if(typeof rc=='function'){
                    if(res.data.amount>0){
                        rc();
                    }else{
                        remindBox('完成');
                        window.location.reload();
                    }
                }
            }else if(res.status==6){
                if(typeof rc=='function')rc();
            }else{
                alert(res.msg);
            }
        });


        //if(todo==0)

        unsave_check(0);
    }


    //获取收费信息
    function getMain() {
        $.post('/Doctor/getOrder',{pkg_id:DATA.pkg_id},function (res) {
            //closeLoadBox();
            if(res.status==0){
                var d=res.data;
                DATA.pkg_status = res.data.pkg.status;
                DATA.pkg_order_code = res.data.pkg.order_code;

                if(d.num>0){
                    var all_amount=0,txt='';
                    $.each(d.list,function (i,n) {
                        all_amount+=parseFloat(n.all_amount);

                        txt+='<li>'+n.label+' <span class="r">'+n.all_amount+'元</span></li>'

                    });

                    if(all_amount>0){
                        $("#pay_order_list").html('<li>收费信息 <span class="r">门诊编号: '+res.data.pkg.order_code+'</span></li>'+txt);
                        $("#pay_order_amount").html(all_amount.toFixed(2)+'元');

                        $("#pay_ol_input").val(res.data.pkg.ol_pay_part);

                        var cash = res.data.pkg.amount - res.data.pkg.ol_pay_part;

                        $("#pay_cash").val(cash);

                        DATA.pkg_amount=all_amount;

                        //支付二维码
                        $("#pay_qr_img").attr('src','/qr?size=5&type=pay&id='+DATA.pkg_id);
                        getMainSub();
                    }else{
                        remindBox('暂无收费项目，无法收费');
                    }
                }
                show_pay_status();
            }else{
                alert(res.msg);
            }
        });


    }

    //显示收费弹窗
    function getMainSub() {
        stopPayStatus=0;
        $('#moneyBomb').show();
        // 取消或者关闭#moneyBomb .bombMask,
        $('#moneyBomb .fa-remove').on('click', function(event) {

            //询问框
            parent.layer.confirm('现金是否到账？', {title:'系统提示',
                btn: ['已到账','待支付'] //按钮
            }, function(){
                //保存
                save_pay_do();
            }, function(){
                $('#moneyBomb').hide();
                $('body').removeAttr('style');
                stopPayStatus=1;
            });
        });

       getOnLinePay();
    }

    //获取在线支付状态
    function getOnLinePay() {
        if(stopPayStatus!=0)return false;
        $.post('/Doctor/getOnLinePay',{pkg_id:DATA.pkg_id,pkg_status:DATA.pkg_status},function (res) {
            if(res.status==0){

                DATA.pkg_status = res.data.pkg.status;
                DATA.pkg_order_code = res.data.pkg.order_code;

                show_pay_status();

                if(res.data.num>0){
                    var all_amount=0,type;
                    $("#pay_ol_input").val(0);

                    $.each(res.data.list,function (i,n) {
                        all_amount+=parseFloat(n.pay_amount);
                        switch (n.payment_platform) {
                            case '0':
                                $("#pay_cash").val(n.pay_amount);
                                $("#btn_save_pay").hide();
                                break;
                            default:
                                $("#pay_ol_input").val(n.pay_amount);

                                var ss='<img src="/Public/assets/img/pay_done_'+n.payment_platform+'.png" />\n' +
                                    '<div>'+n.payment_platform_label+'到账:￥<span  style="color: #FF0000;font-size: 16px;font-weight: bold;">'+n.pay_amount+'</span></div>';
                                $('#ol_result_box').html(ss);
                        }

                        //type = n.payment_platform_label;

                    });
                    $("#pay_cash").attr('disabled',true);
                    $("#pay_ol_input").attr('disabled',true);

                    //var cash = DATA.pkg_amount-parseFloat(all_amount);
                    /*if(cash<0){
                        cash=0;
                        $("#pay_ol_input").val(DATA.pkg_amount.toFixed(2));
                    }*/

                    //$("#pay_ol_input").val(all_amount);

                   // $("#pay_cash").val(cash.toFixed(2));




                    //if(all_amount>=DATA.pkg_amount){
                       // $("#pay_ol_input").attr('disabled',true);
                    //}else{

                    ///}



                }else{
                    $("#btn_save_pay").show();
                    show_pay_status();
                    if(DATA.pkg_status==0)setTimeout(getOnLinePay,3000);
                }
            }else{
                alert(res.msg);
            }
        });
    }


    //获取挂号列表
    function getRegistrations(kw,p) {
        $.post('/Doctor/getRegistrations',{kw:kw,pagesize:7,p:p},function (res) {
            if(res.status==0){
                if(res.data.num>0){
                    var s='';
                    $.each(res.data.list,function (i,n) {

                        s+='<tr class="tr_registration_item" id="registration_item_'+n.patient_id+'" data-patient_id="'+n.patient_id+
                            '" data-name="'+n.name+
                            '" data-registration_id="'+n.registration_id+
                            '" data-sex="'+n.sex+
                            '" data-mobile="'+n.mobile+
                            '" data-birthday="'+n.birthday+
                            '" data-address="'+n.address+
                            '" data-allergy_info="'+n.allergy_info+
                            '" data-registeredfee_name="'+n.registeredfee_name+
                            '" title="'+n.registration_id+
                            '" >\n' +
                            '<td>\n' +
                            '<label class="fancy-checkbox">\n' +
                            '<input type="checkbox" value="'+n.patient_id+'" class=".registration_item">\n' +
                            '<span></span>\n' +
                            '</label>\n' +
                            '</td>\n' +
                            '<td>'+n.name+'</td>\n' +
                            '<td>'+n.sex_str+'</td>\n' +
                            '<td>';


                        if(n.age[0]>0){
                            s+=n.age[0];
                        }else if(n.age[1]>0){
                            s+=n.age[1]+'月';
                        }else if(n.age[2]>0){
                            s+=n.age[2]+'天';
                        }else{
                            s+='未知';
                        }

                        s+='</td>\n' +
                            '<td>'+n.mobile+'</td>\n' +
                            '<td>'+n.create_time_str+'</td>\n' +
                            '<td>'+n.registeredfee_name+'</td>\n' +
                            '</tr>';

                    });
                    _registration_page=res.data.page;
                    $("#registration_box").html(s);
                    if(res.data.pager_str.length>0){

                    $("#registration_pager_box").html(res.data.pager_str);
                    }else{
                    $("#registration_pager_box").html('');
                    }
                }else{
                    $("#registration_box").html('<tr><td colspan="7" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                    $("#registration_pager_box").html('');
                }
            }else{
                alert(res.msg);
            }
        },'json');
    }

    //获取患者库列表
    function getPatientList(kw,p) {
        $.post('/Doctor/getPatientList',{kw:kw,pagesize:7,p:p},function (res) {
            if(res.status==0){
                if(res.data.num>0){
                    var s='';
                    $.each(res.data.list,function (i,n) {

                        s+='<tr class="tr_patient_list_item" id="patient_list_item_'+n.patient_id+'" data-patient_id="'+n.patient_id+
                            '" data-name="'+n.name+
                            '" data-sex="'+n.sex+
                            '" data-mobile="'+n.mobile+
                            '" data-address="'+n.address+
                            '" data-birthday="'+n.birthday+
                            '" data-allergy_info="'+n.allergy_info+
                            '" data-age="'+
                            n.age[0]+'|'+
                            n.age[1]+'|'+
                            n.age[2]+
                            '" >\n' +
                            '<td>\n' +
                            '<label class="fancy-checkbox">\n' +
                            '<input type="checkbox" value="'+n.patient_id+'" class=".patient_list_item">\n' +
                            '<span></span>\n' +
                            '</label>\n' +
                            '</td>\n' +
                            '<td>'+n.name+'</td>\n' +
                            '<td>'+n.sex_str+'</td>\n' +
                            '<td>'+((n.age[0]?n.age[0]+'岁':'')+(n.age[1]?n.age[1]+'月':'')+(n.age[2]?n.age[2]+'天':''))+'</td>\n' +
                            '<td>'+n.mobile+'</td>\n' +
                            '<td>'+n.create_time_str+'</td>\n' +
                            '</tr>';

                    });
                    _patient_list_page=res.data.page;
                    $("#patient_list_box").html(s);
                    if(res.data.pager_str.length>0){

                    $("#patient_list_pager_box").html(res.data.pager_str);
                    }else{
                    $("#patient_list_pager_box").html('');
                    }
                }else{
                    $("#patient_list_box").html('<tr><td colspan="6" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                    $("#patient_list_pager_box").html('');
                }
            }else{
                alert(res.msg);
            }
        },'json');
    }

    //获取药品列表
    function getMedicines(kw) {
        $.post('/Doctor/getMedicines',{kw:kw},function (res) {
            if(res.status==0){
                if(res.data.num>0){
                    var s='';
                    $.each(res.data.list,function (i,n) {

                        s+='<tr ';

                        if(n.inventory_num>0){
                            s+='class="tr_medicines_list_item" id="tr_medicines_list_item_'+n.medicines_id+'" data-id="'+n.medicines_id+'"';
                        }

                        s+='>\n';

                            s+='<td>\n' +
                            '<label class="fancy-checkbox">\n' +
                            '<input type="checkbox" class="medicines_list_item" id="medicines_list_item_'+n.medicines_id+'" value="'+n.medicines_id+'" ';
                        if(!n.inventory_num||n.inventory_num<=0){
                            s+='disabled="disabled"';
                        }else {
                            s+=' data-medicines_id="'+n.medicines_id+
                            '" data-medicines_name="'+n.medicines_name+
                            '" data-inventory_num="'+n.inventory_num+
                            '" data-inventory_unit="'+n.inventory_unit+
                            '" data-inventory_prescription_price="'+n.inventory_prescription_price+'" ';
                        }
                            s+='>\n' +
                            '<span></span>\n' +
                            '</label>\n' +
                            '</td>\n' +
                            '<td>'+n.medicines_name+'</td>\n' +
                            '<td>1'+n.unit+'</td>\n';
                        if(n.inventory_num>0){
                            s+='    <td>'+n.inventory_num+' '+n.inventory_unit+'</td>\n' +
                                '    <td>'+n.inventory_prescription_price+'</td>\n';
                        }else{
                            s+='    <td style="color: red;">空</td>\n' +
                                '    <td>&nbsp</td>\n';
                        }

                            s+='</tr>';

                    });

                    $("#medicines_list_box").html(s);
                }else{
                    $("#medicines_list_box").html('<tr><td colspan="5" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                }
            }else{
                alert(res.msg);
            }
        },'json');
    }
    //获取检查项目
    function getInspectionfee(kw) {
        $.post('/Doctor/getInspectionfee',{kw:kw},function (res) {
            if(res.status==0){
                if(res.data.num>0){

                    var s='';
                    $.each(res.data.list,function (i,n) {

                        s+='<tr class="tr_inspection_list_item" data-id="'+n.ins_id+'">\n' +
                            '<td>\n' +
                            '<label class="fancy-checkbox">\n' +
                            '<input type="checkbox" class="inspection_list_item" id="inspection_list_item_'+n.ins_id+'" value="'+n.ins_id+'" ';

                        s+=' data-ins_id="'+n.ins_id+
                            '" data-inspection_name="'+n.inspection_name+
                            '" data-unit_price="'+n.unit_price+
                            '" data-class="'+n.class+
                            '" data-unit="'+n.unit+'" ';

                        s+=' />\n' +
                            '<span></span>\n' +
                            '</label>\n' +
                            '</td>\n' +
                            '<td>'+n.inspection_name+'</td>\n' +
                            '<td>'+n.unit_price+'</td>\n' +
                            '<td>'+n.unit+'</td>\n' +
                            '</tr>';

                    });

                    $("#inspectionfee_list_box").html(s);
                }else{
                    $("#inspectionfee_list_box").html('<tr><td colspan="4" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                }
            }else{
                alert(res.msg);
            }
        },'json');
    }

    //获取附加费用
    function getExtracharges() {
        $.post('/Doctor/getExtracharges',{type:0},function (res) {
            if(res.status==0){
                if(res.data.num>0){

                    var s='';
                    $.each(res.data.list,function (i,n) {

                        s+='<tr class="tr_extracharges_list_item" data-id="'+n.pre_id+'">\n' +
                            '<td><label class="fancy-checkbox">' +
                            '<input type="checkbox" class="extracharges_list_item" id="extracharges_list_item_'+n.pre_id+'" value="'+n.pre_id+'" data-pre_id="'+n.pre_id+
                                '" data-extracharges_name="'+n.extracharges_name+
                                '" data-fee="'+n.fee+'" >\n' +
                            '<span></span>\n' +
                            '</label></td>\n' +
                            '<td>'+n.extracharges_name+'</td>\n' +
                            '<td>'+n.fee+'</td>\n' +
                            '</tr>';
                    });

                    $("#extracharges_list_box").html(s);
                }else{
                    $("#extracharges_list_box").html('<tr><td colspan="4" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                }
            }else{
                alert(res.msg);
            }
        },'json');
    }


    //获取患者档案
    function getUserInfo() {
        var patient_id=$("#patient_id").val();
        if(patient_id>0){
            $.post('/Doctor/getUserInfo',{patient_id:patient_id},function (res) {
                if(res.status==0){
                    if(res.data.file_id>0){
                        var d=res.data;
                        var txt='<dt class="whiteBg">体重：'+d.weight+'kg<span class="r">身高：'+d.height+'cm</span><br>\n' +
                            '血型：'+d.blood_a+'<span class="r">RH'+d.blood_b+'</span><br>\n' +
                            '左耳听力：'+d.left_ear_hearing+'<span class="r">右耳听力：'+d.right_ear_hearing+'</span><br>\n' +
                            '左眼视力：'+d.left_vision+'<span class="r">右眼视力：'+d.right_vision+'</span></dt>\n' +
                            '<dd>个人史：'+d.personal_info+'</dd>\n' +
                            '<dd>家族史：'+d.family_info+'</dd>\n' +
                            '<dd>身份证：'+d.id_card+'</dd>\n' +
                            '<dd>紧急联系人：'+d.emergency_contact_name+'<span class="r">关系：'+
                            d.emergency_contact_relation_label+'</span></dd>\n' +
                            '<dd>电话：'+d.emergency_contact_mobile+'</dd>';

                        $("#user_file_box").html(txt);
                    }else{
                        $("#user_file_box").html('<div style="text-align: center;">暂无信息</div>');
                    }
                }else{
                    alert(res.msg);
                }
            });
        }else{
            console.log(patient_id);
        }
    }
    //获取患者病历
    function getCareHistory() {
        var patient_id=$("#patient_id").val();
        if(patient_id>0){
            $.post('/Doctor/getCareHistory',{patient_id:patient_id},function (res) {
                if(res.status==0){
                    if(res.data.num>0){
                        var s='';
                        $.each(res.data.list,function (i,n) {

                            if(n.id==DATA.history.id){
                                DATA.history.case_date = n.case_date;
                                DATA.history.case_code = n.case_code;
                                DATA.history.case_title = n.case_title;
                                DATA.history.case_result = n.case_result;
                                DATA.history.doctor_tips = n.doctor_tips;
                                DATA.history.file1 = n.file1;
                                DATA.history.memo = n.memo;
                                DATA.history.is_contagious = n.is_contagious;

                                $("#care_history_id").val(n.id);
                                $("#case_date").val(n.case_date);

                                $("#care_history_is_contagious").val(n.is_contagious);
                                $("#care_history_case_title").val(n.case_title);
                                $("#care_history_case_result").val(n.case_result);
                                $("#care_history_doctor_tips").val(n.doctor_tips);
                                $("#care_history_file1").val(n.file1);
                                $("#care_history_memo").val(n.memo);
                                $("#care_history_type_id").val(n.type_id);

                            }

                            s+='<dl class="pInfoDl">\n' +
                                '<dt class="whiteBg">'+n.addtime_str+'<br>'+n.type_label+'-'+n.hospital_name+'-'+n.patient_name+'</dt>\n' +
                                '<dd>发病日期：'+n.case_date+'</dd>\n' +
                                '<dd>主诉：'+n.case_title+'</dd>\n' +
                                '<dd>诊断信息：'+n.case_result+'</dd>\n' +
                                '<dd>医生建议：'+n.doctor_tips+'</dd>\n' +
                                '<dd>附件：'+n.file1+'</dd>\n' +
                                '</dl>';
                        });

                        $("#care_history_list_box").html(s);
                    }else{
                        $("#care_history_list_box").html('<div style="text-align: center;">暂无病历信息</div>');
                    }
                }else{
                    alert(res.msg);
                }
            });
        }
    }


    //用手机号获取患者信息
    function searchPatientByMobile(m) {
        $.post('/Doctor/searchPatientByMobile',{m:m},function (res) {
            if(res.status==0){
                var o=res.data;
                $("#patient_id").val(o.patient_id);
                $("#patient_name").val(o.name);
                $("#patient_sex").val(o.sex);
                $("#patient_mobile").val(o.mobile);
                $("#patient_allergy").val(o.allergy_info);
                $("#birthday").val(o.birthday);
                $("#patient_address").val(o.address);

                DATA['patient'] = {
                    patient_id:o.patient_id,
                    name:o.name,
                    mobile:o.mobile,
                    sex:o.sex,
                    birthday:o.birthday,
                    address:o.address,
                    allergy_info:o.allergy_info
                };

                getUserInfo();
                getCareHistory();
            }else{
                $("#patient_id").val(0);
            }
        });
    }

    //未保存
    function unsave_check(lock) {

        if(lock==1){
            if(UNSAVE_STATUS==0){
                UNSAVE_STATUS=1;
                //绑定beforeunload事件
                $(window).bind('beforeunload',function(){

                    return '页面未保存，你确定要离开吗 ?';
                });
            }

        }else{
            if(UNSAVE_STATUS==1){
                UNSAVE_STATUS=0;
                //解除绑定
                $(window).unbind('beforeunload');
            }
        }
    }

    //获取元素data
    function getItemInfo(FLS,id) {
        var s=$("#"+id),o={},t;

        $.each(FLS,function (i,n) {
            t=s.data(n);
            o[n]=t;
        });
        return o;
    }

    //js验证手机号
    function validatemobile(o)
    {
        var mobile=o.val();
        if(mobile.length==0)
        {
            remindBox('请输入手机号码！');
            //o.focus();
            return false;
        }else if(mobile.length!=11)
        {
            remindBox('请输入有效的手机号码(11位数字)！');
            o.val('');
            o.focus();
            return false;
        }else{
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            if(!myreg.test(mobile))
            {
                remindBox('请输入有效的手机号码！');
                o.focus();
                return false;
            }
        }

        return true;
    }

    //计算年龄
    function getAge(beginStr) {
        var reg = new RegExp(
            /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})(\s)(\d{1,2})(:)(\d{1,2})(:{0,1})(\d{0,2})$/);

        beginStr+=' 01:01:01';

        var beginArr = beginStr.match(reg);

        var d = new Date();
        var endStr = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();

        var endArr = endStr.match(reg);

        var days = 0;
        var month = 0;
        var year = 0;

        days = endArr[4] - beginArr[4];
        if (days < 0) {
            month = -1;
            days = 30 + days;
        }

        month = month + (endArr[3] - beginArr[3]);
        if (month < 0) {
            year = -1;
            month = 12 + month;
        }

        year = year + (endArr[1] - beginArr[1]);

        var yearString = year > 0 ? year + "岁" : "";
        var mnthString = month > 0 ? month + "月" : "";
        var dayString = days > 0 ? days + "天" : "";

        /*
         * 1 如果岁 大于等于1 那么年龄取 几岁
         * 2 如果 岁等于0 但是月大于1 那么如果天等于0
天小于3天 取小时
         * 例如出生2天 就取 48小时
         */
        var result = "";
        if (year >= 1) {
            result = yearString + mnthString;
        } else {
            if (month >= 1) {
                result = days > 0 ? mnthString + dayString : mnthString;
            } else {
                var begDate = new Date(beginArr[1], beginArr[3] - 1,
                    beginArr[4], beginArr[6], beginArr[8], beginArr[10]);
                var endDate = new Date(endArr[1], endArr[3] - 1, endArr[4],
                    endArr[6], endArr[8], endArr[10]);

                var between = (endDate.getTime() - begDate.getTime()) / 1000;
                days = Math.floor(between / (24 * 3600));
                var hours = Math.floor(between / 3600 - (days * 24));
                dayString = days > 0 ? days + "天" : "";
                result = days >= 3 ? dayString : days * 24 + hours + "小时";
            }
        }

        return result;
    }

    //用户图片修改
    $("input[type='file']").on('change',doUpload);
    function doUpload() {
        var file = this.files[0];
        //if(!/image\/\w+/.test(file.type)){
        //    remindBox('文件必须是图片');
        //    return false;
        //}
        var formData = new FormData($("#uploadForm")[0]);
        $.ajax({
            url:"<?php echo U('Doctor/uploadFile');?>",
            type:'POST',
            data:formData,
            async:false,
            cache:false,
            contentType:false,
            processData:false,
            dataType: "json",
            success:function (data) {
                alert(JSON.stringify(data));
                var picUrl = data.file.savepath+data.file.savename;
                $("#doc-pic").attr("href",picUrl);
                $("#doc-pic").text(data.file.savename);
            },
            error:function (data) {
                console.log(data);
            }

        })
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