<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_studentLibrary.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 10:37
 *  文件描述 :  学生管理自定义类
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_student_module\working_version\v1\library;

class Wx_s_studentLibrary
{
    /**
     * 名  称 : wx_s_studentLibPost()
     * 功  能 : 添加学生函数类
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['StudyName']  => '学生姓名';
     * 输  入 : $get['StudySex']   => '学生性别';
     * 输  入 : $get['StudyAge']   => '学生年龄';
     * 输  入 : $get['StudyNexu']  => '学生关系';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 10:42
     */
    public function wx_s_studentLibPost($post)
    {
        // TODO : 执行函数处理逻辑

        // TODO : 返回函数输出数据
        return ['msg'=>'success','data'=>'返回数据'];
    }
}
