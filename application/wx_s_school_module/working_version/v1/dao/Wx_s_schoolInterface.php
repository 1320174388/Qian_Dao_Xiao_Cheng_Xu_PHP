<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_schoolInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 14:34
 *  文件描述 :  教师学校_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_school_module\working_version\v1\dao;

interface Wx_s_schoolInterface
{
    /**
     * 名  称 : wx_s_schoolSelect()
     * 功  能 : 声明:获取教师申请学校信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 14:48
     */
    public function wx_s_schoolSelect($get);
}
