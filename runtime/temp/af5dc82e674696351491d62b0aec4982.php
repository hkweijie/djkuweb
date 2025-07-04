<?php /*a:1:{s:55:"/www/wwwroot/api.djku.cn/public/install/view/step2.html";i:1724385701;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?> - <?php echo htmlentities((isset($powered) && ($powered !== '')?$powered:'')); ?></title>
    <link rel="stylesheet" href="css/install2.css"/>
    <link rel="stylesheet" href="css/step2.css?v=1.1"/>
    <link rel="stylesheet" href="css/theme-chalk.css"/>
</head>
<body>
<div class="wrap" id="step2">
    <div class="title">安装检测</div>
    <div class="content">
        <div class="menu">
            <div class="head">
                <h1>安装检测</h1>
                <a class="again" href="?step=2">重新检测
                    <img class="upload" src="./images/install/upload.png" alt="">
                </a>
            </div>
            <div class="p8">安装环境需满足系统运行要求</div>
            <div>
                <div class="tab" :class="{'on': index === 0}" @click="index = 0">
                    <div class="left-img">
                        <img class="env" src="./images/install/environment.png" alt="">
                        <img class="warring" src="./images/install/sure.png" alt="">

                    </div>
                    <div>
                        <div>环境及配置</div>
                        <div class="p8">基础的系统操作环境</div>
                    </div>
                </div>
                <div class="tab" :class="{'on': index === 1}" @click="index = 1">
                    <div class="left-img">
                        <img class="jur" src="./images/install/jurisdiction.png" alt="">
                        <img  class="warring btn-warning" src="./images/install/sure.png" alt="">
                    </div>
                    <div>
                        <div>权限检测</div>
                        <div class="p8">目录及文件权限检测</div>
                    </div>
                </div>
            </div>
        </div>
        <section class="config-list">
            <div class="server">
                <table width="100%" v-if="index === 0">
                    <tr>
                        <td class="td1">环境检测</td>
                        <td class="td1" width="25%">推荐配置</td>
                        <td class="td1" width="25%">最低要求</td>
                        <td class="td1" width="25%">当前状态</td>
                    </tr>
                    <tr>
                        <td>操作系统</td>
                        <td>类UNIX</td>
                        <td>不限制</td>
                        <td><div class="ls-td"><img class="yes" src="./images/install/yes.png" alt="对"><?php echo htmlentities($os); ?></div></td>
                    </tr>
                    <tr>
                        <td>PHP版本</td>
                        <td>8.0</td>
                        <td>8.0</td>
                        <td><div class="ls-td"><img class="yes" src="./images/install/yes.png" alt="对"><?php echo htmlentities($phpv); ?></div></td>
                    </tr>
                    <tr>
                        <td>附件上传</td>
                        <td>>2M</td>
                        <td>不限制</td>
                        <td><div class="ls-td"><img class="yes" src="./images/install/yes.png" alt="对"><?php echo $uploadSize; ?></div></td>
                    </tr>
                    <tr>
                        <td>session</td>
                        <td>启用</td>
                        <td>启用</td>
                        <td><div class="ls-td"><img class="yes" src="./images/install/yes.png" alt="对"><?php echo $session; ?></div></td>
                    </tr>
                    <tr>
                        <td>GD库</td>
                        <td>必须开启</td>
                        <td>1.0以上</td>
                        <td><?php echo $gd; ?></td>
                    </tr>
                    <tr>
                        <td>swoole_loader</td>
                        <td>必须开启</td>
                        <td>启用</td>
                        <td><?php echo $swoole; ?></td>
                    </tr>
                    <tr>
                        <td>redis</td>
                        <td>必须开启</td>
                        <td>启用</td>
                        <td><?php echo $redis; ?></td>
                    </tr>
                    <tr>
                        <td>mysql</td>
                        <td>必须开启</td>
                        <td>启用</td>
                        <td><?php echo $mysql; ?></td>
                    </tr>
                    <tr>
                        <td>curl_init</td>
                        <td>必须扩展</td>
                        <td>启用</td>
                        <td><?php echo $curl; ?></td>
                    </tr>
                    <tr>
                        <td>bcmath</td>
                        <td>必须扩展</td>
                        <td>启用</td>
                        <td><?php echo $bcmath; ?></td>
                    </tr>
                    <tr>
                        <td>openssl</td>
                        <td>必须扩展</td>
                        <td>启用</td>
                        <td><?php echo $openssl; ?></td>
                    </tr>
                    <tr>
                        <td>fileinfo</td>
                        <td>必须扩展</td>
                        <td>启用</td>
                        <td><?php echo $finfo_open; ?></td>
                    </tr>
                </table>
                <table width="100%" v-if="index === 1">
                    <tr>
                        <td class="td1">权限检查</td>
                        <td class="td1" width="25%">推荐配置</td>
                        <td class="td1" width="25%">写入</td>
                        <td class="td1" width="25%">读取</td>
                    </tr>
                    <?php echo $dirStr; ?>
                </table>
            </div>
        </section>
    </div>
    <div class="bottom-btn">
        <div class="bottom tac up-btn">
            <a href="?step=1" class="btn">上一步</a>
        </div>
        <div class="bottom tac"><?php echo $next; ?></div>
    </div>
</div>
<div class="footer"> &copy; 2014-2024 <a href="http://www.crmeb.com" target="_blank">www.crmeb.com</a> 西安众邦网络科技有限公司出品</div>
</body>
<script src="js/vue2.6.11.js"></script>
<script src="js/element-ui.js"></script>
<script>
    new Vue({
        el: '#step2',
        data() {
            return {
                index: 0
            }
        },
        methods:{
            next() {
                this.$message({
                    message: '安装环境检测未通过，请检查',
                    type: 'warning'
                });
            }
        }
    })
</script>
</html>
