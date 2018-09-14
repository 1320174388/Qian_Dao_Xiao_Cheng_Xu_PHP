<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_sigeValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 23:51
 *  文件描述 :  学生签到验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_sige_module\working_version\v1\validator;
use think\Validate;

class Wx_s_sigeValidate extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 创  建 : 2018/09/14 23:57
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'CourseID'   => 'require|number',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/14 23:57
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
        'CourseID.require'     => '请正确发送课程ID',
        'CourseID.number'      => '请正确发送课程ID',
    ];
}
