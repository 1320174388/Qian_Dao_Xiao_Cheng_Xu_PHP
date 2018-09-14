<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_schoolValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 14:34
 *  文件描述 :  教师学校验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_school_module\working_version\v1\validator;
use think\Validate;

class Wx_s_schoolValidate extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 创  建 : 2018/09/14 14:48
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/14 14:48
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
    ];
}
