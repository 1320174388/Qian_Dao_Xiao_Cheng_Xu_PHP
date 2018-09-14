<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_generateValidator.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/15 01:55
 *  文件描述 :  小程序码验证器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_generate_module\working_version\v1\validator;
use think\Validate;

class Wx_s_generateValidate extends Validate
{
    /**
     * 名  称 : $rule
     * 功  能 : 验证规则
     * 输  入 : $post['UserPhone']    => '用户手机号';
     * 输  入 : '$post['scene']'      => '发送携带的参数',
     * 输  入 : '$post['page']'       => '页面地址'
     * 输  入 : '$post['width']'      => '二维码尺寸'
     * 输  入 : '$post['auto_color']' => '二维码颜色'
     * 输  入 : '$post['line_color']' => '["r"=>0,"g"=>0,"b"=>0]'
     * 输  入 : '$post['is_hyaline']' => 'true'
     * 创  建 : 2018/09/15 02:02
     */
    protected $rule =   [
        'UserPhone'  => 'require|number|min:11|max:11',
        'scene'      => 'require|max:32|min:1',
        'page'       => 'require',
        'width'      => 'require|number',
        'auto_color' => 'require',
        'line_color' => 'require',
        'is_hyaline' => 'require',
    ];

    /**
     * 名  称 : $message()
     * 功  能 : 设置验证信息
     * 创  建 : 2018/09/15 02:02
     */
    protected $message  =   [
        'UserPhone.require'    => '请正确输入手机号',
        'UserPhone.min'        => '请正确输入手机号',
        'UserPhone.max'        => '请正确输入手机号',
        'UserPhone.number'     => '请正确输入手机号',
        'scene.require'      => '请输入发送1~32字携带的参数',
        'scene.max'          => '请输入发送1~32字携带的参数',
        'scene.min'          => '请输入发送1~32字携带的参数',
        'page.require'       => '请输入页面地址',
        'width.require'      => '请输二维码尺寸',
        'auto_color.require' => '请输二维码颜色状态',
        'line_color.require' => '{"r":0,"g":0,"b":0}',
        'is_hyaline.require' => 'is_hyaline请根据文档输入',
    ];
}
