<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_curriculumService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 19:52
 *  文件描述 :  个人课程模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_curriculum_module\working_version\v1\service;
use app\wx_s_curriculum_module\working_version\v1\dao\Wx_s_curriculumDao;
use app\wx_s_curriculum_module\working_version\v1\library\Wx_s_curriculumLibrary;
use app\wx_s_curriculum_module\working_version\v1\validator\Wx_s_curriculumValidate;

class Wx_s_curriculumService
{
    /**
     * 名  称 : wx_s_curriculumShow()
     * 功  能 : 查询我的所有课程逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['ListNumber'] => '已获取到的课程数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 20:18
     */
    public function wx_s_curriculumShow($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_curriculumValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_curriculumDao = new Wx_s_curriculumDao();

        // 执行Dao层逻辑
        $res = $wx_s_curriculumDao->wx_s_curriculumSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
