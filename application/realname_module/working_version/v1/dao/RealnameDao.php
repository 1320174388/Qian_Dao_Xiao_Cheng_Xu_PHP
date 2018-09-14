<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RealnameDao.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/15 00:00
 *  文件描述 :  实名认证模块数据层
 *  历史记录 :  -----------------------
 */
namespace app\realname_module\working_version\v1\dao;
use app\realname_module\working_version\v1\model\UsersModel;

class RealnameDao implements RealnameInterface
{
    /**
     * 名  称 : realnameCreate()
     * 功  能 : 用户实名认证数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (string)    $idcard        =>  身份证号  【必填】
     * 输  入 : (string)    $realname       =>  真实姓名  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 00:06
     */
    public function realnameCreate($post)
    {
        // UsersModel 模型
        $users = new UsersModel();
        $res = $users->save(['users_number'=>md5($post['idcard']),
                        'users_name'=>$post['realname'],
                        'users_state'=>0],
                        ['users_tel'=>$post['users_tel']]);
        return \RSD::wxReponse($res,'M','认证成功','认证失败');
    }

}
