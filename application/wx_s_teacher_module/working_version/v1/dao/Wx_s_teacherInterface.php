<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_teacherInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 19:46
 *  文件描述 :  教师模块_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_teacher_module\working_version\v1\dao;

interface Wx_s_teacherInterface
{
    /**
     * 名  称 : wx_s_teacherCreate()
     * 功  能 : 声明:教师申请接口数据处理
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
    public function wx_s_teacherCreate($post);
}
