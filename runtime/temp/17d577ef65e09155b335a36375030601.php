<?php /*a:1:{s:55:"/www/wwwroot/api.djku.cn/public/install/view/step3.html";i:1731577740;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?> - <?php echo htmlentities((isset($powered) && ($powered !== '')?$powered:'')); ?></title>
    <link rel="stylesheet" href="css/install2.css"/>
    <link rel="stylesheet" href="css/step3.css?v=1.1"/>
    <link rel="stylesheet" href="css/theme-chalk.css"/>
</head>
<body>
<div class="wrap" id="step3">
    <div class="title">创建数据</div>
    <section class="section">
        <form id="J_install_form" action="index?step=4" method="post">
            <div class="server"  ref="mianscroll">
                <table width="100%">
                    <tr>
                        <td class="td1" width="100">数据库信息</td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="tar">数据库服务器：</td>
                        <td><input type="text" name="dbhost" id="dbhost" value="127.0.0.1" class="input"></td>
                        <td><div id="J_install_tip_dbhost"><span class="gray">数据库服务器地址，一般为127.0.0.1</span></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库端口：</td>
                        <td><input type="text" name="dbport" id="dbport" value="3306" class="input"></td>
                        <td><div id="J_install_tip_dbport"><span class="gray">数据库服务器端口，一般为3306</span></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库用户名：</td>
                        <td><input type="text" name="dbuser" id="dbuser" value="root" class="input"></td>
                        <td><div id="J_install_tip_dbuser"></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库密码：</td>
                        <td><input type="password" name="dbpw" id="dbpw" value="" class="input" autoComplete="off" onBlur="TestDbPwd(0)"></td>
                        <td><div id="J_install_tip_dbpw"></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库名：</td>
                        <td><input type="text" name="dbname" id="dbname" value="crmeb" class="input" onBlur="TestDbPwd(0)"></td>
                        <td><div id="J_install_tip_dbname"></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库表前缀：</td>
                        <td><input type="text" name="dbprefix" id="dbprefix" value="eb_" class="input" ></td>
                        <td><div id="J_install_tip_dbprefix"><span class="gray">建议使用默认，同一数据库安装多个CRMEB时需修改</span></div></td>
                    </tr>
<!--                    <tr>-->
<!--                        <td class="tar">演示数据：</td>-->
<!--                        <td colspan="2"><input style="width:14px;height:14px;" type="checkbox" id="demo" name="demo" value="demo" checked></td>-->
<!--                    </tr>-->
                </table>
                <table width="100%">
                    <tr>
                        <td class="td1" width="100">redis信息</td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="tar">服务器地址：</td>
                        <td><input type="text" name="rbhost" id="rbhost" value="127.0.0.1" class="input"></td>
                        <td><div id="J_install_rbhost"><span class="gray">redis服务器地址，一般为127.0.0.1</span></div></td>
                    </tr>
                    <tr>
                        <td class="tar">端口号：</td>
                        <td><input type="text" name="rbport" id="rbport" value="6379" class="input" autoComplete="off"></td>
                        <td><div id="J_install_tip_manager_pwd"><span class="gray">redis端口,默认为6379</span></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库：</td>
                        <td><input type="text" name="rbselect" id="rbselect" value="0" class="input" autoComplete="off"></td>
                        <td><div id="J_install_tip_manager_ckpwd"><span class="gray">redis数据库，默认为0,一般不做更改</span></div></td>
                    </tr>
                    <tr>
                        <td class="tar">数据库密码：</td>
                        <td><input type="password" name="rbpw" onBlur="TestDbPwd(0)" id="rbpw" value="" class="input" autoComplete="off"></td>
                        <td><div id="J_install_tip_dbpw"></div><span class="gray">redis数据库密码</span></td>
                    </tr>

                </table>
                <table width="100%">
                    <tr>
                        <td class="td1" width="100">管理员信息</td>
                        <td class="td1" width="200">&nbsp;</td>
                        <td class="td1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="tar">管理员帐号：</td>
                        <td><input type="text" name="manager" id="manager" value="admin" class="input"></td>
                        <td><div id="J_install_tip_manager"></div></td>
                    </tr>
                    <tr>
                        <td class="tar">管理员密码：</td>
                        <td><input type="password" name="manager_pwd" id="manager_pwd" class="input" value="" autoComplete="off"></td>
                        <td><div id="J_install_tip_manager_pwd"></div></td>
                    </tr>
                    <tr>
                        <td class="tar">重复密码：</td>
                        <td><input type="password" name="manager_ckpwd" id="manager_ckpwd" class="input" value="" autoComplete="off"></td>
                        <td><div id="J_install_tip_manager_ckpwd"></div></td>
                    </tr>
                </table>
            </div>
            <div class="bottom-btn">
                <div class="bottom tac up-btn">
                    <a href="./index?step=2" class="btn">上一步</a>
                </div>
                <div class="bottom tac next">
                    <a onClick="checkForm();" class="btn">下一步</a>
                </div>
            </div>
        </form>
    </section>

    <div style="width:0;height:0;overflow:hidden;"><img src="images/install/pop_loading.gif"></div>
    <script src="js/jquery.js?v=9.0"></script>
    <script src="js/validate.js?v=9.0"></script>
    <script src="js/ajaxForm.js?v=9.0"></script>
    <script>
        $('.on-other').click(function () {
            $('.other').toggle();
        }).mouseover(function () {
            $(this).css('color','#417b9d');
        }).mouseout(function () {
            $(this).css('color','#ccc');
        });
        function TestDbPwd(connect_db)
        {
            var dbHost = $('#dbhost').val();
            var dbUser = $('#dbuser').val();
            var dbPwd = $('#dbpw').val();
            var dbName = $('#dbname').val();
            var dbport = $('#dbport').val();
            // var demo  =  $('#demo').val();
            var data={
                'dbHost': dbHost,
                'dbUser': dbUser,
                'dbPwd': dbPwd,
                'dbName': dbName,
                'dbport': dbport,
                // 'demo': demo,
                rbhost: $('#rbhost').val(),
                rbport: $("#rbport").val(),
                rbselect: $("#rbselect").val(),
                rbpw: $('#rbpw').val(),
                cache_prefix:$('#cache_prefix').val(),
                cache_tag_prefix:$('#cache_tag_prefix').val(),
                workerman_admin_port:$('#workerman_admin_port').val(),
                workerman_chat_port:$('#workerman_chat_port').val(),
                workerman_channel_port:$('#workerman_channel_port').val(),
            };
            var url =  "?step=3&testdbpwd=1";
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType:'JSON',
                beforeSend:function(){
                },
                success: function(msg){
                    if(msg == 1){

                        if(connect_db == 1)
                        {
                            $("#J_install_form").submit(); // ajax 验证通过后再提交表单
                        }
                        $('#J_install_tip_dbpw').html('');
                        $('#J_install_tip_dbname').html('');
                        $('#J_install_rbhost').html('');
                    }
                    else if(msg == -1)
                    {
                        $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">请在mysql配置文件修sql-mode或sql_mode为NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION</span>');
                    }
                    else if(msg == -2)
                    {
                        $('#J_install_tip_dbname').html('<span for="dbname" generated="true" class="tips_error" style="">你的不是空数据库, 请更换一个数据库名字</span>');
                    } else if(msg == -3){
                        $('#J_install_tip_dbpw').html('');
                        $('#J_install_tip_dbname').html('');
                        $('#J_install_rbhost').html('<span for="dbname" generated="true" class="tips_error" style="">Redis数据库没有启动或者密码错误</span>');
                    }else{
                        $('#dbpw').val("");
                        $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
                    }
                },
                complete:function(){
                },
                error:function(){
                    $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
                    $('#dbpw').val("");
                }
            });
        }
        function checkForm() {
            manager = $.trim($('#manager').val());				//用户名表单
            manager_pwd = $.trim($('#manager_pwd').val());				//密码表单
            manager_ckpwd = $.trim($('#manager_ckpwd').val());		//密码提示区

            if (manager.length == 0) {
                alert('管理员账号不能为空');
                return false;
            }
            if (!/^[0-9a-zA-Z]{3,20}$/.test(manager)) {
                alert('管理员账号应为3-20位数字和字母');
                return false;
            }
            if (manager_pwd.length < 6) {
                alert('管理员密码必须6位数以上');
                return false;
            }
            if (manager_ckpwd != manager_pwd) {
                alert('两次密码不一致');
                return false;
            }

            TestDbPwd(1);
        }
    </script>
</div>
<div class="footer"> &copy; 2014-2022 <a href="http://www.crmeb.com" target="_blank">www.crmeb.com</a> 西安众邦网络科技有限公司出品
</div>
</body>
</html>
