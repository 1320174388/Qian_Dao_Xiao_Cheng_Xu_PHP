<?php
namespace app\school_module\working_version\v1\validator;
use think\Validate;
// +----------------------------------------------------------------------
// | 检测数据
// +----------------------------------------------------------------------
// | (string) `user_token`      => `用户token`
// | (string) `form_id`         => `formid`
// | (string) `school_name`     => `学校名称`
// | (string) `firm_name`       => `公司名称`
// | (string) `firm_man`        => `公司法人`
// | (string) `school_address`  => `学校地址`
// | (string) `school_man`      => `学校负责人`
// | (string) `school_phone`    => `负责人电话`
// +----------------------------------------------------------------------
class SchoolDataValidator extends Validate
{
    protected $rule = [
        'form_id'        => 'require',
        'users_tel'      => 'require',
        'school_name'    => 'require',
        'firm_name'      => 'require',
        'firm_man'       => 'require',
        'school_address' => 'require',
        'school_man'     => 'require',
        'school_phone'   => 'require'
    ];
    protected $message = [
        'form_id.require'        => '缺少form_id参数',
        'users_tel.require'      => '缺少users_tel参数',
        'school_name.require'    => '缺少school_name参数',
        'firm_name.require'      => '缺少firm_name参数',
        'firm_man.require'       => '缺少firm_man参数',
        'school_address.require' => '缺少school_address参数',
        'school_man.require'     => '缺少school_man参数',
        'school_phone.require'   => '缺少school_phone参数'
    ];
}
