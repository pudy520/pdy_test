

微信小程序授权获取信息
## 运行环境

- php >= 7.0
- composer

## 安装

```Shell
$ composer require vvv/test
```
##使用
```
  $wechat = new  WxLogin($appid, $secret);
  return   $wechat->wxLogin($code, $encryptedData, $iv);
```

## License

MIT
