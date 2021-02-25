<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * verification
     * 英 [ˌverɪfɪˈkeɪʃn]美 [ˌverɪfɪˈkeɪʃn]
     * n.	验证；检验；证明；【法】诉状[答辩书]结尾的举证说明
     * 网络	证实；确认；检定
     * @var array
     */
    // 如果不是刚需建议不排除
    protected $except = [
        // 格式：
        // 'admin/test6',
        // 'admin/test7',

        // 排除所有：
        // '*'

    ];
}
