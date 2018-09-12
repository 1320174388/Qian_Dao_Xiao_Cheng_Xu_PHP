<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_loginDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:43
 *  文件描述 :  用户登录注册模块数据层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_login_module\working_version\v1\dao;
use think\facade\Cache;
use app\wx_s_login_module\working_version\v1\model\Wx_s_loginModel;

class Wx_s_loginDao implements Wx_s_loginInterface
{
    /**
     * 名  称 : wx_s_loginCreate()
     * 功  能 : 用户注册数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserToken']  => '用户Token标识';
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['UserPass']   => '用户密码';
     * 输  入 : $post['UserRePass'] => '用户确认密码';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 11:58
     */
    public function wx_s_loginCreate($post)
    {
        // TODO :  获取数据
        $res = Wx_s_loginModel::where(
            'users_tel',$post['UserPhone']
        )->select()->toArray();
        // 验证数据
        if($res){
            return returnData('error','手机号已经注册');
        }
        // TODO :  Wx_s_loginModel 模型
        $wx_s_loginModel =  new Wx_s_loginModel();
        // TODO :  处理数据
        $wx_s_loginModel->user_token = $post['UserToken'];
        $wx_s_loginModel->users_tel   = $post['UserPhone'];
        $wx_s_loginModel->users_pass  = md5($post['UserPass']);
        $wx_s_loginModel->users_state = 1;
        // TODO :  保存数据
        $res = $wx_s_loginModel->save();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','注册成功','注册失败');
    }

    /**
     * 名  称 : login_codeSelect()
     * 功  能 : 发送验证码数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserToken']  => '用户Token标识';
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserFormid'] => '表单提交ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 13:33
     */
    public function login_codeSelect($get)
    {
        // TODO :  Login_codeModel 模型
        $res = Cache::set($get['UserPhone'],$get['UserCode'],7200);
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','发送成功','发送失败');
    }

    /**
     * 名  称 : wx_s_loginSelect()
     * 功  能 : 用户登录数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['UserPass']   => '用户密码';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 17:16
     */
    public function wx_s_loginSelect($get)
    {
        // TODO :  获取数据
        $res = Wx_s_loginModel::where(
            'users_tel',$get['UserPhone']
        )->find();
        // 验证数据
        if(!$res){
            return returnData('error','账号不存在');
        }
        // 修改登录KEY
        $uniqidIndex = uniqidIndex();
        $res->users_key  = $uniqidIndex;
        $r = $res->save();
        // 判断是否修改成功
        if(!$r) return returnData('error','登录令牌获取失败');
        // TODO :  Wx_s_loginModel 模型
        if(md5($get['UserPass'])===$res['users_pass']){
            return returnData('success',$uniqidIndex);
        }
        // 返回错误数据
        return returnData('error','登录失败');
    }

    /**
     * 名  称 : wx_s_loginUpdate()
     * 功  能 : 修改账号密码数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserToken']  => '用户Token标识'
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['UserPass']   => '用户密码';
     * 输  入 : $put['UserRePass'] => '用户确认密码';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 17:26
     */
    public function wx_s_loginUpdate($put)
    {
        // TODO :  获取数据
        $res = Wx_s_loginModel::where(
            'users_tel',$put['UserPhone']
        )->select()->toArray();
        // 验证数据
        if(!$res){
            return returnData('error','账号不存在');
        }
        // TODO :  Wx_s_loginModel 模型
        $wx_s_loginModel =  Wx_s_loginModel::where(
            'users_tel',$put['UserPhone']
        )->find();
        // TODO :  处理数据
        $wx_s_loginModel->user_token = $put['UserToken'];
        $wx_s_loginModel->users_tel   = $put['UserPhone'];
        $wx_s_loginModel->users_pass  = md5($put['UserPass']);
        $wx_s_loginModel->users_key  = uniqidIndex();
        // TODO :  保存数据
        $res = $wx_s_loginModel->save();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','修改成功','修改失败');
    }

    /**
     * 名  称 : wx_user_keySelect()
     * 功  能 : 判断用户登录Key是否失效数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone'] => '用户手机号';
     * 输  入 : $get['UserKey']   => '用户登录Key';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 19:58
     */
    public function wx_user_keySelect($get)
    {
        // TODO :  Wx_user_keyModel 模型
        $user = Wx_s_loginModel::where(
            'users_tel',$get['UserPhone']
        )->find();
        // TODO :  判断是否有用户
        if(!$user){
            return returnData('error','身份信息错误');
        }
        // TODO :  验证登录令牌是否失效
        if($user['users_key']!==$get['UserKey']){
            return returnData('error','登录信息过期');
        }
        // TODO :  返回正确数据
        return returnData('success','登录信息正确');
    }
}
