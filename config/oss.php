<?php
/*
 * @Author: 谭洁莹
 * @Date: 2025-03-11 16:34:20
 * @LastEditTime: 2025-03-11 16:51:32
 * @FilePath: /config/oss.php
 * @Description: 对象存储配置
 */

return [
    'access_key_id'     => env('OSS_ACCESS_KEY_ID', 'LTAI5tQuKqeubz9AK2mbYDmU'),
    'access_key_secret' => env('OSS_ACCESS_KEY_SECRET', 'YWTO0acuz0vVvgRFnAOnDE657WyRRn'),
    'bucket'            => env('OSS_BUCKET', 'djku'),
    'region'            => env('OSS_REGION', 'oss-cn-guangzhou'),
    'upload_dir'        => 'upload/', // 上传目录
    'max_size'          => 1024 * 1024 * 1024, // 最大上传大小 1G
    'expire_time'       => 1800, // 签名有效期（秒）30分钟
];
