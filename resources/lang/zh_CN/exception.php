<?php

use App\Exceptions\IncorrectPasswordException;
use App\Exceptions\TimeoutException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


return [
    AccessDeniedHttpException::class => '未授权',
    AuthenticationException::class => '未登录',
    AuthorizationException::class => '未授权',
    IncorrectPasswordException::class => '密码错误',
    NotFoundHttpException::class => ':model不存在',
    ValidationException::class => '数据未通过验证',
    TimeoutException::class => '请求超时',
];
