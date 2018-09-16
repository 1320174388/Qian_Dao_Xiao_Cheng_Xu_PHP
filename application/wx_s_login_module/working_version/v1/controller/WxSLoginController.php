<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_loginController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:43
 *  文件描述 :  用户登录注册模块控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_login_module\working_version\v1\controller;
use think\Controller;
use think\facade\Cache;
use app\wx_s_login_module\working_version\v1\service\WxSLoginService;

class WxSLoginController extends Controller
{
    /**
     * 名  称 : wx_s_loginPost()
     * 功  能 : 用户注册接口
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['UserPass']   => '用户密码';
     * 输  入 : $post['UserRePass'] => '用户确认密码';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/12 11:58
     */
    public function wx_s_loginPost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $WxSLoginService = new WxSLoginService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $WxSLoginService->wx_s_loginAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }

    /**
     * 名  称 : login_codeGet()
     * 功  能 : 发送验证码接口
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserFormid'] => '表单提交ID';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 13:33
     */
    public function login_codeGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $login_codeService = new WxSLoginService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $login_codeService->login_codeShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }

    /**
     * 名  称 : login_codePost()
     * 功  能 : 验证验证码
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserPhone'] => '用户手机号';
     * 输  入 : $post['UserCode']  => '用户验证码';
     * 输  出 : {"errNum":0,"retMsg":"验证成功","retData":true}
     * 创  建 : 2018/09/12 13:33
     */
    public function login_codePost(\think\Request $request)
    {
        // 判断数据是否正确
        if(!$request->post('UserCode')){
            return returnResponse(1,'请输入验证码',false);
        }
        // 判断数据是否正确
        if(!$request->post('UserPhone')){
            return returnResponse(1,'请输入手机号',false);
        }
        // 验证验证码
        if(Cache::get($request->post('UserPhone'))!==$request->post('UserCode')){
            return returnResponse(1,'验证码错误',false);
        };
        Cache::set($request->post('UserPhone'),'',1);
        // 返回数据
        return returnResponse(0,'验证成功',true);
    }

    /**
     * 名  称 : wx_s_loginGet()
     * 功  能 : 用户登录接口
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserPass']   => '用户密码';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:16
     */
    public function wx_s_loginGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $WxSLoginService = new WxSLoginService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $WxSLoginService->wx_s_loginShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }

    /**
     * 名  称 : wx_s_loginPut()
     * 功  能 : 修改账号密码接口
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserToken']  => '用户Token标识'
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['UserPass']   => '用户密码';
     * 输  入 : $put['UserRePass'] => '用户确认密码';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/12 17:26
     */
    public function wx_s_loginPut(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $WxSLoginService = new WxSLoginService();

        // 获取传入参数
        $put = $request->put();

        // 执行Service逻辑
        $res = $WxSLoginService->wx_s_loginEdit($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }

    /**
     * 名  称 : wx_user_keyGet()
     * 功  能 : 判断用户登录Key是否失效接口
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone'] => '用户手机号';
     * 输  入 : $get['UserKey']   => '用户登录Key';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 19:58
     */
    public function wx_user_keyGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_user_keyService = new WxSLoginService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $wx_user_keyService->wx_user_keyShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }

}
