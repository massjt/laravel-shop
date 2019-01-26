## Laravel 电商

- model中
    $casts 属性提供了一个便利的方法来将数据库字段值转换为常见的数据类型，$casts 属性应是一个数组，且数组的键是那些需要被转换的字段名，值则是你希望转换的数据类型。支持转换的数据类型有： integer，real，float，double，string，boolean，object，array，collection，date，datetime 和 timestamp。

    protected $casts = [
        'email_verified' => 'boolean',
    ];

- expectsJson() ajax异常处理
    判断是否返回json格式
    if ($request->expectsJson()) {
        return response()->json(['msg' => '请先验证邮箱'], 400);
    }
- 新生成的中间件要注册
    在 app\http\kernel.php中
    如生成名为email_verified的中间件
    protected $routeMiddleware = [
        'email_verified' => \App\Http\Middleware\CheckIfEmailVerified::class,
    ];