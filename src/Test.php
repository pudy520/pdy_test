<?php

namespace Vvv\Test;

class Test
{

    /**
     * @return string
     * 订单号生成
     */
    public function orderSn()
    {
        $str = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        return $str;
    }

}
