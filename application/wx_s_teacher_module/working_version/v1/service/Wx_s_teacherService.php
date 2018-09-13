<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_teacherService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 19:46
 *  文件描述 :  教师模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_teacher_module\working_version\v1\service;
use app\wx_s_teacher_module\working_version\v1\dao\Wx_s_teacherDao;
use app\wx_s_teacher_module\working_version\v1\library\Wx_s_teacherLibrary;
use app\wx_s_teacher_module\working_version\v1\validator\Wx_s_teacherValidate;

class Wx_s_teacherService
{
    /**
     * 名  称 : wx_s_teacherAdd()
     * 功  能 : 教师申请接口逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (String)$post['UserPhone'] => '用户手机号';
     * 输  入 : ( File )$post['TeachFile'] => '头像URL';
     * 输  入 : (String)$post['TeachName'] => '教师姓名';
     * 输  入 : ( Int ) $post['TeachSex']  => '教师性别';
     * 输  入 : ( Int ) $post['TeachAge']  => '教师年龄';
     * 输  入 : (String)$post['TeachBirT'] => '教师生日';
     * 输  入 : (String)$post['TeachTime'] => '申请时间';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 20:10
     */
    public function wx_s_teacherAdd($post)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_teacherValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($post)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_teacherDao = new Wx_s_teacherDao();

        // 执行Dao层逻辑
        $res = $wx_s_teacherDao->wx_s_teacherCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
