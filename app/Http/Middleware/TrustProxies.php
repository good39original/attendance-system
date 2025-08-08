<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * どのプロキシを信頼するか
     *
     * @var array|string|null
     */
    protected $proxies = '*'; // 全プロキシを信頼

    /**
     * 受け取るヘッダーの種類
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
