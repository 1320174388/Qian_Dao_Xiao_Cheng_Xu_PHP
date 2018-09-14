<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  WxSSchoolController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 14:34
 *  文件描述 :  教师学校控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_school_module\working_version\v1\controller;
use think\Controller;
use app\wx_s_school_module\working_version\v1\service\Wx_s_schoolService;

class WxSSchoolController extends Controller
{
    /**
     * 名  称 : wx_s_schoolGet()
     * 功  能 : 获取教师申请学校信息接口
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/14 14:48
     */
    public function wx_s_schoolGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_schoolService = new Wx_s_schoolService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $wx_s_schoolService->wx_s_schoolShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
}
