<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_loginInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:43
 *  文件描述 :  用户登录注册模块_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_login_module\working_version\v1\dao;

interface Wx_s_loginInterface
{
    /**
     * 名  称 : wx_s_loginCreate()
     * 功  能 : 声明:用户注册数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['UserPass']   => '用户密码';
     * 输  入 : $post['UserRePass'] => '用户确认密码';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 11:58
     */
    public function wx_s_loginCreate($post);

    /**
     * 名  称 : login_codeSelect()
     * 功  能 : 声明:发送验证码数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserFormid'] => '表单提交ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 13:33
     */
    public function login_codeSelect($get);

    /**
     * 名  称 : wx_s_loginSelect()
     * 功  能 : 声明:用户登录数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserPass']   => '用户密码';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 17:16
     */
    public function wx_s_loginSelect($get);

    /**
     * 名  称 : wx_s_loginUpdate()
     * 功  能 : 声明:修改账号密码数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserToken']  => '用户Token标识'
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['UserPass']   => '用户密码';
     * 输  入 : $put['UserRePass'] => '用户确认密码';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 17:26
     */
    public function wx_s_loginUpdate($put);

    /**
     * 名  称 : wx_user_keySelect()
     * 功  能 : 声明:判断用户登录Key是否失效数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone'] => '用户手机号';
     * 输  入 : $get['UserKey']   => '用户登录Key';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 19:58
     */
    public function wx_user_keySelect($get);

}
