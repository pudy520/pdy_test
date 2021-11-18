<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/11/18
 * Time: 14:42
 * YY: 294963672@qq.com
 */

namespace Vvv\Test;


class WxLogin
{
    use \Api;

    protected $config;
    public $appid;
    public $secret;

    public function __construct()
    {
        $this->config = [
            'url' => "https://api.weixin.qq.com/sns/jscode2session", //微信获取session_key接口url
            'appid' => $this->appid, // APPId
            'secret' => $this->secret, // 秘钥
            'grant_type' => 'authorization_code', // grant_type
        ];
    }

    /**
     * @param $code
     * @param $encryptedData
     * @param $iv
     * @return array|int|mixed
     * 获取token接口, 传入code, , , encryptData,$iv
     */
    public function wxLogin($code, $encryptedData, $iv): array
    {
        $params = [
            'appid' => $this->config['appid'],
            'secret' => $this->config['secret'],
            'js_code' => $code,
            'grant_type' => $this->config['grant_type']
        ];

        $res = self::makeRequest($this->config['url'], $params);
        $reqData = json_decode($res['result'], true);
        $sessionKey = $reqData['session_key'];
        $res = self::decryptData($this->config['appid'], $sessionKey, $encryptedData, $iv);
        return $res;
    }
}