<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_schoolService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 14:34
 *  文件描述 :  教师学校逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_school_module\working_version\v1\service;
use app\wx_s_school_module\working_version\v1\dao\Wx_s_schoolDao;
use app\wx_s_school_module\working_version\v1\library\Wx_s_schoolLibrary;
use app\wx_s_school_module\working_version\v1\validator\Wx_s_schoolValidate;

class Wx_s_schoolService
{
    /**
     * 名  称 : wx_s_schoolShow()
     * 功  能 : 获取教师申请学校信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 14:48
     */
    public function wx_s_schoolShow($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_schoolValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_schoolDao = new Wx_s_schoolDao();

        // 执行Dao层逻辑
        $res = $wx_s_schoolDao->wx_s_schoolSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
