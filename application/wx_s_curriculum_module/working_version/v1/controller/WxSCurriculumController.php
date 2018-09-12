<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  WxSCurriculumController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 19:52
 *  文件描述 :  个人课程模块控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_curriculum_module\working_version\v1\controller;
use think\Controller;
use app\wx_s_curriculum_module\working_version\v1\service\Wx_s_curriculumService;

class WxSCurriculumController extends Controller
{
    /**
     * 名  称 : wx_s_curriculumGet()
     * 功  能 : 查询我的所有课程接口
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['ListNumber'] => '已获取到的课程数量';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 20:18
     */
    public function wx_s_curriculumGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_curriculumService = new Wx_s_curriculumService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $wx_s_curriculumService->wx_s_curriculumShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
}
