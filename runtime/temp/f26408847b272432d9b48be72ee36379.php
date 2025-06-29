<?php /*a:1:{s:55:"/www/wwwroot/api.djku.cn/public/install/view/step4.html";i:1720857040;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?> - <?php echo htmlentities((isset($powered) && ($powered !== '')?$powered:'')); ?></title>
    <link rel="stylesheet" href="css/install2.css"/>
    <link rel="stylesheet" href="css/step4.css"/>
    <link rel="stylesheet" href="css/theme-chalk.css"/>
</head>
<body>
<div class="wrap" id="step4">
    <div class="title">安装进度</div>
    <section class="section">
        <div class="title">
            <h1>系统安装中，请稍等片刻...</h1>
        </div>
        <div class="progress">
            <el-progress :percentage="percentage" color="#37CA71" define-back-color="rgba(255,255,255,0.5)"
                         :stroke-width="8"
                         status="success"></el-progress>
            <div class="progress-msg" v-if="!isShow">
                <div id="loginner_item" class="msg p8">{{installList[installList.length]}}</div>
            </div>
        </div>
        <div class="bottom tac">
            <a href="javascript:;" class="btn_old mid">
                <img class="shuaxin" src="./images/install/shuaxin.png" align="absmiddle"/>&nbsp;正在安装...
            </a>
        </div>
    </section>
</div>
<div class="footer"> &copy; 2014-2022 <a href="http://www.crmeb.com" target="_blank">www.crmeb.com</a> 西安众邦网络科技有限公司出品
</div>
</body>
<script src="js/vue2.6.11.js"></script>
<script src="js/element-ui.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript">
    var n = -1;
    var data = <?php echo $data;?>;
    $.ajaxSetup({cache: false});

    new Vue({
        el: '#step4',
        data() {
            return {
                percentage: 0,
                isShow: 0,
                installList: []
            }
        },
        mounted() {
            this.reloads(n);
        },
        methods: {
            reloads(n) {
                var url = "?step=4&install=1&n=" + n;
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    beforeSend: function () {
                    },
                    success: (msg)=> {
                        this.percentage = Math.round((msg.n / msg.count) * 100) > 100 ? 100 : Math.round((msg.n / msg.count) * 100)
                        if (msg.n >= 0) {
                            $('#loginner_item').html(msg.msg);
                            if (msg.n == '999999') {
                                setTimeout(e => {
                                    this.gonext()
                                }, 1000);
                                return false;
                            } else {
                                this.reloads(msg.n);
                            }
                        } else {
                            //alert('指定的数据库不存在，系统也无法创建，请先通过其他方式建立好数据库！');
                            alert(msg.msg);
                        }
                    }
                });
            },
            gonext() {
                window.location.href = '?step=5';
            }
        },

    })
</script>
</html>
