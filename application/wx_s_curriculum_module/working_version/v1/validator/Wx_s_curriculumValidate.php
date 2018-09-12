<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_curriculumValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 19:52
 *  文件描述 :  个人课程模块验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_curriculum_module\working_version\v1\validator;
use think\Validate;

class Wx_s_curriculumValidate extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['ListNumber'] => '已获取到的课程数量';
     * 创  建 : 2018/09/12 20:18
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'ListNumber' => 'require|number',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/12 20:18
     */
    protected $message  =   [
        'UserPhone.require'  => '请正确输入用户账号',
        'UserPhone.min'      => '请正确输入用户账号',
        'UserPhone.max'      => '请正确输入用户账号',
        'UserPhone.number'   => '请正确输入用户账号',
        'ListNumber.require' => '请正确发送课程数量',
        'ListNumber.number'  => '请正确发送课程数量',
    ];
}
