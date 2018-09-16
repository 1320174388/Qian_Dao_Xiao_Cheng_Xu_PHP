<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  LoginService *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:43
 *  文件描述 :  用户登录注册模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_login_module\working_version\v1\service;
use app\wx_s_login_module\working_version\v1\dao\WxSLoginDao;
use  app\login_module\working_version\v1\model\UserModel;
use app\wx_s_login_module\working_version\v1\library\WxSLoginLibrary;
use app\wx_s_login_module\working_version\v1\validator\WxSLoginValidate;
use app\wx_s_login_module\working_version\v1\validator\WxSLoginValidate2;
use app\wx_s_login_module\working_version\v1\validator\WxSLoginValidate3;
use app\wx_s_login_module\working_version\v1\validator\LoginCodeValidate;

class WxSLoginService
{
    /**
     * 名  称 : wx_s_loginAdd()
     * 功  能 : 用户注册逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['UserPass']   => '用户密码';
     * 输  入 : $post['UserRePass'] => '用户确认密码';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 11:58
     */
    public function wx_s_loginAdd($post)
    {
        // 实例化验证器代码
        $validate  = new WxSLoginValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($post)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $WxSLoginDao = new WxSLoginDao();

        // 执行Dao层逻辑
        $res = $WxSLoginDao->wx_s_loginCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : login_codeShow()
     * 功  能 : 发送验证码逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserFormid'] => '表单提交ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 13:33
     */
    public function login_codeShow($get)
    {
        // 实例化验证器代码
        $validate  = new LoginCodeValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 获取success_token
        $accessTokenArr = \AccessTokenRequest::wxRequest(
            config('wx_config.wx_AppID'),
            config('wx_config.wx_AppSecret'),
            './project_access_token/'
        );

        // 生产验证码
        $get['UserCode'] = mt_rand(1000,9999);
        // 获取openid
        $user = UserModel::field('user_openid')->where(
            'user_token',$get['UserToken']
        )->select()->toArray();

        // 发送模板消息
        $res = \TemplateMessagePushLibrary::sendTemplate(
            $accessTokenArr['data']['access_token'],
            [
                'touser'      => $user[0]['user_openid'],
                'template_id' => config('wx_config.wx_Push_Code'),
                'page'        => config('wx_config.wx_Code_URL'),
                'form_id'     => $get['UserFormid'],
                'data'        => [
                    'keyword1' => ['value'=>$get['UserPhone']],
                    'keyword2' => ['value'=>$get['UserCode']],
                ],
            ]
        );
        // 判断模板消息是否发送成功
        if($res['msg']=='error'){
            return returnData('error',$res['data']);
        }

        // 实例化Dao层数据类
        $login_codeDao = new WxSLoginDao();
        // 执行Dao层逻辑
        $res = $login_codeDao->login_codeSelect($get);
        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_loginShow()
     * 功  能 : 用户登录逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserPass']   => '用户密码';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 17:16
     */
    public function wx_s_loginShow($get)
    {
        // 实例化验证器代码
        $validate  = new WxSLoginValidate2();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $WxSLoginDao = new WxSLoginDao();

        // 执行Dao层逻辑
        $res = $WxSLoginDao->wx_s_loginSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_loginEdit()
     * 功  能 : 修改账号密码逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserToken']  => '用户Token标识'
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['UserPass']   => '用户密码';
     * 输  入 : $put['UserRePass'] => '用户确认密码';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 17:26
     */
    public function wx_s_loginEdit($put)
    {
        // 实例化验证器代码
        $validate  = new WxSLoginValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($put)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $WxSLoginDao = new WxSLoginDao();

        // 执行Dao层逻辑
        $res = $WxSLoginDao->wx_s_loginUpdate($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_user_keyShow()
     * 功  能 : 判断用户登录Key是否失效逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone'] => '用户手机号';
     * 输  入 : $get['UserKey']   => '用户登录Key';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 19:58
     */
    public function wx_user_keyShow($get)
    {
        // 实例化验证器代码
        $validate  = new WxSLoginValidate3();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_user_keyDao = new WxSLoginDao();

        // 执行Dao层逻辑
        $res = $wx_user_keyDao->wx_user_keySelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
