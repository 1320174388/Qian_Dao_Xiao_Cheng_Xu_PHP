<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_studentValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 10:37
 *  文件描述 :  学生管理验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_student_module\working_version\v1\validator;
use think\Validate;

class Wx_s_studentValidate3 extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 创  建 : 2018/09/13 10:42
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'StudyId'    => 'require|number',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/13 10:42
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
        'StudyId.require'      => '请正确输入学生ID',
        'StudyId.number'       => '请正确输入学生ID',
    ];
}
