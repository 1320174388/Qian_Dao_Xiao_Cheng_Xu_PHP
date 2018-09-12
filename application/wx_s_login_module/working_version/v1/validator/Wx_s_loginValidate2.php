<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_loginValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:43
 *  文件描述 :  用户登录注册模块验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_login_module\working_version\v1\validator;
use think\Validate;

class Wx_s_loginValidate2 extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['UserPass']   => '用户密码';
     * 创  建 : 2018/09/12 11:58
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'UserPass'   => 'require|min:6|max:18',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/12 11:58
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
        'UserPass.require'     => '请输入6~18位账号密码',
        'UserPass.min'         => '请输入6~18位账号密码',
        'UserPass.max'         => '请输入6~18位账号密码',
    ];
}
