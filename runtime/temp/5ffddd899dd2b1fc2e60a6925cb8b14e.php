<?php /*a:1:{s:55:"/www/wwwroot/api.djku.cn/public/install/view/step5.html";i:1720857040;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?> - <?php echo htmlentities((isset($powered) && ($powered !== '')?$powered:'')); ?></title>
    <link rel="stylesheet" href="css/install2.css"/>
    <link rel="stylesheet" href="css/step5.css"/>
</head>
<body>
<div class="wrap">
    <div class="title">
        <img class="yes" src="./images/install/success.png" alt="对">
        安装完成</div>
    <div class="progress">
        <div class="trip p8 mt-10 tip">
            请【重启守护进程】后再访问
        </div>
    </div>
    <div class="bottom-btn">
        <div class="pre btn">
            <a href="/" class="btn mid">进入前台</a>
        </div>
        <div class="admin btn">
            <a href="/admin" class="btn btn_submit J_install_btn mid">进入后台</a>
        </div>
    </div>
</div>
</body>
<script src="js/jquery.js"></script>
<script>
    $(function () {
        $.ajax({
            type: "POST",
            url: "http://shop.crmeb.net/index.php/admin/server.upgrade_api/updatewebinfo",
            header: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': 'X-Requested-With',
                'Access-Control-Allow-Methods': 'PUT,POST,GET,DELETE,OPTIONS'
            },
            data: {
                host: '<?php echo $host;?>',
                https: '<?php echo "http://".$host;?>',
                version: '<?php echo $version;?>',
                ip: <?php echo json_encode($ip); ?>
    },
        dataType: 'json',
            success:function () {}
    })
    });
</script>
</html>
