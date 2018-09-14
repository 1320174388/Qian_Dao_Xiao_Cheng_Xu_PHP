<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_teacherValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 19:46
 *  文件描述 :  教师模块验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_teacher_module\working_version\v1\validator;
use think\Validate;

class Wx_s_teacherValidate1 extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['SchoolID']  => '学校ID';
     * 创  建 : 2018/09/14 15:29
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'SchoolId'   => 'number|min:1|max:1',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/14 15:29
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
        'SchoolId.number'      => '请正确发送学校标识ID',
        'SchoolId.min'         => '请正确发送学校标识ID',
        'SchoolId.max'         => '请正确发送学校标识ID',
    ];
}
