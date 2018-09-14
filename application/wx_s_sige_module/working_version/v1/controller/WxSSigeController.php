<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  WxSSigeController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 23:51
 *  文件描述 :  学生签到控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_sige_module\working_version\v1\controller;
use think\Controller;
use app\wx_s_sige_module\working_version\v1\service\Wx_s_sigeService;

class WxSSigeController extends Controller
{
    /**
     * 名  称 : wx_s_sigeGet()
     * 功  能 : 获取签到信息接口
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/14 23:57
     */
    public function wx_s_sigeGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_sigeService = new Wx_s_sigeService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $wx_s_sigeService->wx_s_sigeShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }

    /**
     * 名  称 : wx_s_sigePost()
     * 功  能 : 学生签到接口
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 输  入 : ( int ) $get['PeriodID']  => '课时ID';
     * 输  入 : (String)$get['StudyStr']  => '学生ID字符串';
     * 输  入 : ( int ) $get['CourseNum'] => '消耗课程数量';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/15 00:41
     */
    public function wx_s_sigePost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_sigeService = new Wx_s_sigeService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $wx_s_sigeService->wx_s_sigeAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }
}
