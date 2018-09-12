<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_curriculumInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 19:52
 *  文件描述 :  个人课程模块_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_curriculum_module\working_version\v1\dao;

interface Wx_s_curriculumInterface
{
    /**
     * 名  称 : wx_s_curriculumSelect()
     * 功  能 : 声明:查询我的所有课程数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['ListNumber'] => '已获取到的课程数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 20:18
     */
    public function wx_s_curriculumSelect($get);
}
