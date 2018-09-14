<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_generateDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/15 01:55
 *  文件描述 :  小程序码数据层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_generate_module\working_version\v1\dao;
use app\wx_s_generate_module\working_version\v1\model\Wx_s_generateModel;

class Wx_s_generateDao implements Wx_s_generateInterface
{
    /**
     * 名  称 : wx_s_generateCreate()
     * 功  能 : 生成小程序码数据处理
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
    public function wx_s_generateCreate($post)
    {
        // 获取success_token
        $accessTokenArr = \AccessTokenRequest::wxRequest(
            config('wx_config.wx_AppID'),
            config('wx_config.wx_AppSecret'),
            './project_access_token/'
        );
        // 保存小程序码
        $res = \Small_Program_Generate::SmallRequest(
            $accessTokenArr['data']['access_token'],
            [
                // 发送携带的参数
                'scene'      => $post['scene'],
                // 页面地址
                'page'       => $post['page'],
                // 二维码尺寸
                'width'      => $post['width'],
                // 二维码颜色
                'auto_color' => $post['auto_color']=='true'?true:false,
                'line_color' => json_decode($post['line_color'],true),
                'is_hyaline' => $post['is_hyaline']=='true'?true:false,
            ],
            // 二维吗保存路径
            './uploads/wx_code/',
            // 用户Token标识
            $post['UserPhone']
        );
        // 处理函数返回值
        return \RSD::wxReponse($res,'M',$res['data'],$res['data']);
    }
}
