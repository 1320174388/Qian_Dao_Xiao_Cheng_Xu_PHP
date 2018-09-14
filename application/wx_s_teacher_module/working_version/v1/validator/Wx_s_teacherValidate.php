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

class Wx_s_teacherValidate extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : (String)$post['UserPhone']   => '用户手机号';
     * 输  入 : ( Int ) $post['SchoolId']    => '学校ID';
     * 输  入 : ( File )$post['TeachFile']   => '头像URL';
     * 输  入 : (String)$post['TeachName']   => '教师姓名';
     * 输  入 : ( Int ) $post['TeachSex']    => '教师性别';
     * 输  入 : ( Int ) $post['TeachAge']    => '教师年龄';
     * 输  入 : (String)$post['TeachBirT']   => '教师生日';
     * 输  入 : (String)$post['TeachTime']   => '申请时间';
     * 输  入 : (String)$post['TeachFormId'] => '申请时间';
     * 创  建 : 2018/09/13 20:10
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'SchoolId'   => 'require|number',
        'TeachName'  => 'require|min:2|max:32',
        'TeachSex'   => 'require|number',
        'TeachAge'   => 'require|min:1|max:3|number',
        'TeachBirT'  => 'require|number',
        'TeachFormId'=> 'require',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/13 20:10
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
        'SchoolId.require'     => '请正确学校标识ID',
        'SchoolId.number'      => '请正确学校标识ID',
        'TeachName.require'    => '请输入2~32字教会名称',
        'TeachName.min'        => '请输入2~32字教会名称',
        'TeachName.max'        => '请输入2~32字教会名称',
        'TeachSex.require'     => '请正确输入性别标识',
        'TeachSex.number'      => '请正确输入性别标识',
        'TeachAge.require'     => '请正确输入年龄',
        'TeachAge.min'         => '请正确输入年龄',
        'TeachAge.max'         => '请正确输入年龄',
        'TeachAge.number'      => '请正确输入年龄',
        'TeachBirT.require'    => '请输入日期时间戳',
        'TeachBirT.number'     => '请输入日期时间戳',
        'TeachFormId.require'  => '请输入教师FormID',
    ];
}
