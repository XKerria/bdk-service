<?php


namespace App\Exceptions;


use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class ExceptionFactory {
    private $default = ['status' => 500, 'code' => 500];
    private $map = [
        AuthenticationException::class => ['status' => 401, 'code' => 40101],
        IncorrectPasswordException::class => ['status' => 401, 'code' => 40102],
        RouteNotFoundException::class => ['status' => 404, 'code' => 40402],
        NotFoundHttpException::class => ['status' => 404, 'code' => 40403],
        ValidationException::class => ['status' => 422, 'code' => 422],
        TimeoutException::class => ['status' => 408, 'code' => 408],
    ];

    private $exception;

    public function __construct(Exception $e) {
        $this->exception = $e;
        $this->class = get_class($e);
    }

    public function respond() {
        $data = array_merge($this->mapping(), [
            'message' => $this->getMessage(),
        ]);
        if ($data['status'] == 422) {
            $validator = $this->exception->validator;
            $data['invalid'] = $validator->messages();
        }
        if (env('APP_DEBUG')) $data['exception'] = $this->jsonify();
        return Response::json($data, $data['status']);
    }

    private function mapping() {
        return Arr::get($this->map, $this->class, $this->default);
    }

    private function jsonify() {
        return [
            'class' => $this->class,
            'code' => $this->exception->getCode(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine(),
            'message' => $this->exception->getMessage(),
            'previous' => $this->exception->getPrevious(),
            'trace' => $this->exception->getTrace(),
        ];
    }

    private function getMessage() {
        if ($this->class == NotFoundHttpException::class) {
            $previous = $this->exception->getPrevious();
            if (!$previous) return '路径不存在';
            $model = __('model.'. $previous->getModel());
            if (Str::startsWith($model, 'model.')) $model = '对象';
            return __('exception.'.$this->class, ['model' => $model]);
        }
        $message = __('exception.' . $this->class);
        if (Str::startsWith($message, 'exception.')) $message = $this->exception->getMessage();
        return $message;
    }
}
