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
     * 输  入 : (String)$post['UserPhone'] => '用户手机号';
     * 输  入 : ( File )$post['TeachFile'] => '头像URL';
     * 输  入 : (String)$post['TeachName'] => '教师姓名';
     * 输  入 : ( Int ) $post['TeachSex']  => '教师性别';
     * 输  入 : ( Int ) $post['TeachAge']  => '教师年龄';
     * 输  入 : (String)$post['TeachBirT'] => '教师生日';
     * 输  入 : (String)$post['TeachTime'] => '申请时间';
     * 创  建 : 2018/09/13 20:10
     */
    protected $rule =   [
        'UserPhone'  => 'require|max:25',
        'TeachName'  => 'email',
        'TeachSex'   => 'email',
        'TeachAge'   => 'email',
        'TeachBirT'  => 'email',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/13 20:10
     */
    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过25个字符',
        'age.number'   => '年龄必须是数字',
        'age.between'  => '年龄只能在1-120之间',
        'email'        => '邮箱格式错误',
    ];
}
