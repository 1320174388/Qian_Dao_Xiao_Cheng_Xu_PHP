<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_sigeService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 23:51
 *  文件描述 :  学生签到逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_sige_module\working_version\v1\service;
use app\wx_s_sige_module\working_version\v1\dao\Wx_s_sigeDao;
use app\wx_s_sige_module\working_version\v1\library\Wx_s_sigeLibrary;
use app\wx_s_sige_module\working_version\v1\validator\Wx_s_sigeValidate;
use app\wx_s_sige_module\working_version\v1\validator\Wx_s_sigeValidate1;

class Wx_s_sigeService
{
    /**
     * 名  称 : wx_s_sigeShow()
     * 功  能 : 获取签到信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 23:57
     */
    public function wx_s_sigeShow($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_sigeValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_sigeDao = new Wx_s_sigeDao();

        // 执行Dao层逻辑
        $res = $wx_s_sigeDao->wx_s_sigeSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_sigeAdd()
     * 功  能 : 学生签到逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 输  入 : ( int ) $get['PeriodID']  => '课时ID';
     * 输  入 : (String)$get['StudyStr']  => '学生ID字符串';
     * 输  入 : ( int ) $get['CourseNum'] => '消耗课程数量';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 00:41
     */
    public function wx_s_sigeAdd($post)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_sigeValidate1();

        // 验证数据
        if (!$validate->scene('edit')->check($post)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_sigeDao = new Wx_s_sigeDao();

        // 执行Dao层逻辑
        $res = $wx_s_sigeDao->wx_s_sigeCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
