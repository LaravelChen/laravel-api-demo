<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Transformers\UserTransformer;
use Dingo\Api\Routing\Helpers;
use App\User;

/**
 * Class UsersController
 * @package App\Api\V1\Controllers
 */
class UsersController extends Controller
{
    use Helpers;

    /**
     * 简单的测试路由
     * @return \Dingo\Api\Http\Response
     */
    public function show()
    {
        return 'success';
    }

    /**
     * 显示用户所有信息
     * @return \Dingo\Api\Http\Response
     */
    public function show_user_info()
    {
        $user = User::all();

        //采用Laravel自带的json形式的返回方式
//        return response()->json([
//            'data'=>$user
//        ]);

        //采用dingo的json返回形式
        //response的详细讲解:https://github.com/dingo/api/wiki/Responses
        return $this->response->collection($user, new UserTransformer());
    }


}