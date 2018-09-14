<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_sigeInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 23:51
 *  文件描述 :  学生签到_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_sige_module\working_version\v1\dao;

interface Wx_s_sigeInterface
{
    /**
     * 名  称 : wx_s_sigeSelect()
     * 功  能 : 声明:获取签到信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['PeriodID']  => '课时ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 23:57
     */
    public function wx_s_sigeSelect($get);

    /**
     * 名  称 : wx_s_sigeCreate()
     * 功  能 : 声明:学生签到数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 输  入 : (String)$get['StudyStr']  => '学生ID字符串';
     * 输  入 : ( int ) $get['CourseNum'] => '消耗课程数量';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 00:41
     */
    public function wx_s_sigeCreate($post);
}
