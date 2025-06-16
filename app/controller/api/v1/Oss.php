<?php
/*
 * @Author: 谭洁莹
 * @Date: 2025-03-11 16:25:27
 * @LastEditTime: 2025-03-12 09:25:24
 * @FilePath: /app/controller/api/v1/Oss.php
 * @Description: 文件上传到对象存储
 */

namespace app\controller\api\v1;

use think\Request;
use think\facade\Config;
use think\annotation\Inject;

class Oss
{
    /**
     * @description: 获取OSS上传签名
     * @return {object}
     */
    public function getUploadPolicy()
    {
        $config = Config::get('oss');
        if (!$config) {
            return app('json')->fail('OSS 配置不存在');
        }

        $accessKeyId = $config['access_key_id'];
        $accessKeySecret = $config['access_key_secret'];
        $bucket = $config['bucket'];
        $region = $config['region'];
        $uploadDir = $config['upload_dir'];
        $maxSize = $config['max_size'];
        $expireTime = $config['expire_time'];

        // 生成 OSS 访问地址
        $host = "https://{$bucket}.{$region}.aliyuncs.com";
        $expire = time() + $expireTime;

        // 生成 policy
        $policyArray = [
            'expiration' => gmdate('Y-m-d\TH:i:s\Z', $expire),
            'conditions' => [
                ['bucket' => $bucket],
                ['starts-with', '$key', $uploadDir],
                ['content-length-range', 0, $maxSize],
            ],
        ];
        $policyBase64 = base64_encode(json_encode($policyArray));

        // 计算签名
        $signature = base64_encode(hash_hmac('sha1', $policyBase64, $accessKeySecret, true));

        $data = [
            'accessid'  => $accessKeyId,
            'host'      => $host,
            'policy'    => $policyBase64,
            'signature' => $signature,
            'expire'    => $expire,
            'dir'       => $uploadDir,
        ];

        return app('json')->success($data);
    }
}
