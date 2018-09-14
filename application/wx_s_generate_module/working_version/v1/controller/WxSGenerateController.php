<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  WxSGenerateController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/15 01:55
 *  文件描述 :  小程序码控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_generate_module\working_version\v1\controller;
use think\Controller;
use app\wx_s_generate_module\working_version\v1\service\Wx_s_generateService;

class WxSGenerateController extends Controller
{
    /**
     * 名  称 : wx_s_generatePost()
     * 功  能 : 生成小程序码接口
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserPhone']    => '用户手机号';
     * 输  入 : '$post['scene']'      => '发送携带的参数',
     * 输  入 : '$post['page']'       => '页面地址'
     * 输  入 : '$post['width']'      => '二维码尺寸'
     * 输  入 : '$post['auto_color']' => '二维码颜色'
     * 输  入 : '$post['line_color']' => '["r"=>0,"g"=>0,"b"=>0]'
     * 输  入 : '$post['is_hyaline']' => 'true'
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/15 02:02
     */
    public function wx_s_generatePost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_generateService = new Wx_s_generateService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $wx_s_generateService->wx_s_generateAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }
}
