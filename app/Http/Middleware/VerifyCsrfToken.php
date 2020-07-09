<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    //form提交不需要 {{csrf_field()}}的路由
    protected $except = [
        'shoucang','phone','email'
    ];
}
