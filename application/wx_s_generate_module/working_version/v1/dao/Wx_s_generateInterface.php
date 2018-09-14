<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_generateInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/15 01:55
 *  文件描述 :  小程序码_数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_generate_module\working_version\v1\dao;

interface Wx_s_generateInterface
{
    /**
     * 名  称 : wx_s_generateCreate()
     * 功  能 : 声明:生成小程序码数据处理
     * 变  量 : --------------------------------------
     * 输  入 : '$post['scene']'      => '发送携带的参数',
     * 输  入 : '$post['page']'       => '页面地址'
     * 输  入 : '$post['width']'      => '二维码尺寸'
     * 输  入 : '$post['auto_color']' => '二维码颜色'
     * 输  入 : '$post['line_color']' => '["r"=>0,"g"=>0,"b"=>0]'
     * 输  入 : '$post['line_color']' => '["r"=>0,"g"=>0,"b"=>0]'
     * 输  入 : '$post['is_hyaline']' => 'true'
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 02:02
     */
    public function wx_s_generateCreate($post);
}
