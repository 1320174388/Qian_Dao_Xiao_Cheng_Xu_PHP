<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_generateService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/15 01:55
 *  文件描述 :  小程序码逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_generate_module\working_version\v1\service;
use app\wx_s_generate_module\working_version\v1\dao\Wx_s_generateDao;
use app\wx_s_generate_module\working_version\v1\library\Wx_s_generateLibrary;
use app\wx_s_generate_module\working_version\v1\validator\Wx_s_generateValidate;

class Wx_s_generateService
{
    /**
     * 名  称 : wx_s_generateAdd()
     * 功  能 : 生成小程序码逻辑
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserPhone']    => '用户手机号';
     * 输  入 : '$post['scene']'      => '发送携带的参数',
     * 输  入 : '$post['page']'       => '页面地址'
     * 输  入 : '$post['width']'      => '二维码尺寸'
     * 输  入 : '$post['auto_color']' => '二维码颜色'
     * 输  入 : '$post['line_color']' => '["r"=>0,"g"=>0,"b"=>0]'
     * 输  入 : '$post['is_hyaline']' => 'true'
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 02:02
     */
    public function wx_s_generateAdd($post)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_generateValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($post)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 实例化Dao层数据类
        $wx_s_generateDao = new Wx_s_generateDao();

        // 执行Dao层逻辑
        $res = $wx_s_generateDao->wx_s_generateCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
