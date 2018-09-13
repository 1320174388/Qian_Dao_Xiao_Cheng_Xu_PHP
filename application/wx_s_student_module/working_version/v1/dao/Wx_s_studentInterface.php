<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_studentInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 10:37
 *  文件描述 :  学生管理_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_student_module\working_version\v1\dao;

interface Wx_s_studentInterface
{
    /**
     * 名  称 : wx_s_studentCreate()
     * 功  能 : 声明:添加学生数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['StudyName']  => '学生姓名';
     * 输  入 : $get['StudySex']   => '学生性别';
     * 输  入 : $get['StudyAge']   => '学生年龄';
     * 输  入 : $get['StudyNexu']  => '学生关系';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 10:42
     */
    public function wx_s_studentCreate($post);

    /**
     * 名  称 : wx_s_studentSelect()
     * 功  能 : 声明:获取用户个人添加学生信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 17:37
     */
    public function wx_s_studentSelect($get);

    /**
     * 名  称 : wx_s_studentUpdate()
     * 功  能 : 声明:修改用户个人添加学生信息数据处理
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
    public function wx_s_studentUpdate($put);

    /**
     * 名  称 : wx_s_studentDelete()
     * 功  能 : 声明:删除用户个人添加学生信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $delete['StudyId']    => '学生ID';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:56
     */
    public function wx_s_studentDelete($delete);
}
