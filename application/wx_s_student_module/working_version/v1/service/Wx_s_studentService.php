<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_studentService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 10:37
 *  文件描述 :  学生管理逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_student_module\working_version\v1\service;
use app\wx_s_student_module\working_version\v1\dao\Wx_s_studentDao;
use app\wx_s_student_module\working_version\v1\library\Wx_s_studentLibrary;
use app\wx_s_student_module\working_version\v1\validator\Wx_s_studentValidate;
use app\wx_s_student_module\working_version\v1\validator\Wx_s_studentValidate1;
use app\wx_s_student_module\working_version\v1\validator\Wx_s_studentValidate2;
use app\wx_s_student_module\working_version\v1\validator\Wx_s_studentValidate3;

class Wx_s_studentService
{
    /**
     * 名  称 : wx_s_studentAdd()
     * 功  能 : 添加学生逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['StudyName']  => '学生姓名';
     * 输  入 : $post['StudySex']   => '学生性别';
     * 输  入 : $post['StudyAge']   => '学生年龄';
     * 输  入 : $post['StudyNexu']  => '学生关系';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 10:42
     */
    public function wx_s_studentAdd($post)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_studentValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($post)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_studentDao = new Wx_s_studentDao();

        // 执行Dao层逻辑
        $res = $wx_s_studentDao->wx_s_studentCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_studentShow()
     * 功  能 : 获取用户个人添加学生信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 17:37
     */
    public function wx_s_studentShow($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_studentValidate1();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_studentDao = new Wx_s_studentDao();

        // 执行Dao层逻辑
        $res = $wx_s_studentDao->wx_s_studentSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_studentEdit()
     * 功  能 : 修改用户个人添加学生信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['StudyId']    => '学生ID';
     * 输  入 : $put['StudyName']  => '学生姓名';
     * 输  入 : $put['StudySex']   => '学生性别';
     * 输  入 : $put['StudyAge']   => '学生年龄';
     * 输  入 : $put['StudyNexu']  => '学生关系';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:44
     */
    public function wx_s_studentEdit($put)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_studentValidate2();

        // 验证数据
        if (!$validate->scene('edit')->check($put)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_studentDao = new Wx_s_studentDao();

        // 执行Dao层逻辑
        $res = $wx_s_studentDao->wx_s_studentUpdate($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_studentDel()
     * 功  能 : 删除用户个人添加学生信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $delete['UserPhone']  => '用户手机号';
     * 输  入 : $delete['StudyId']    => '学生ID';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:56
     */
    public function wx_s_studentDel($delete)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_studentValidate3();

        // 验证数据
        if (!$validate->scene('edit')->check($delete)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_studentDao = new Wx_s_studentDao();

        // 执行Dao层逻辑
        $res = $wx_s_studentDao->wx_s_studentDelete($delete);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
