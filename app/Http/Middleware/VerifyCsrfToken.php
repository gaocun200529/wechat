<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 注册
        '/redsadd',
        // 登陆
        '/loginsadd',

        // 加入购物车
        '/goods_cart',
        // post请求
        "post/test",
        // 微信消息
        "/event"
    ];
}
