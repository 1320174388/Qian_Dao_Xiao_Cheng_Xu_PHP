<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  WxSTeacherController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 19:46
 *  文件描述 :  教师模块控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_teacher_module\working_version\v1\controller;
use think\Controller;
use app\wx_s_teacher_module\working_version\v1\service\Wx_s_teacherService;

class WxSTeacherController extends Controller
{
    /**
     * 名  称 : wx_s_teacherPost()
     * 功  能 : 教师申请接口接口
     * 变  量 : --------------------------------------
     * 输  入 : (String)$post['UserPhone'] => '用户手机号';
     * 输  入 : ( File )$post['TeachFile'] => '头像URL';
     * 输  入 : (String)$post['TeachName'] => '教师姓名';
     * 输  入 : ( Int ) $post['TeachSex']  => '教师性别';
     * 输  入 : ( Int ) $post['TeachAge']  => '教师年龄';
     * 输  入 : (String)$post['TeachBirT'] => '教师生日';
     * 输  入 : (String)$post['TeachTime'] => '申请时间';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 20:10
     */
    public function wx_s_teacherPost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_teacherService = new Wx_s_teacherService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $wx_s_teacherService->wx_s_teacherAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }
}
