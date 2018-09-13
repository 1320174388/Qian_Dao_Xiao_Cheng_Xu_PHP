<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  WxSStudentController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 10:37
 *  文件描述 :  学生管理控制器
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_student_module\working_version\v1\controller;
use think\Controller;
use app\wx_s_student_module\working_version\v1\service\Wx_s_studentService;

class WxSStudentController extends Controller
{
    /**
     * 名  称 : wx_s_studentPost()
     * 功  能 : 添加学生接口
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['StudyName']  => '学生姓名';
     * 输  入 : $post['StudySex']   => '学生性别';
     * 输  入 : $post['StudyAge']   => '学生年龄';
     * 输  入 : $post['StudyNexu']  => '学生关系';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 10:42
     */
    public function wx_s_studentPost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_studentService = new Wx_s_studentService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $wx_s_studentService->wx_s_studentAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }

    /**
     * 名  称 : wx_s_studentGet()
     * 功  能 : 获取用户个人添加学生信息接口
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/13 17:37
     */
    public function wx_s_studentGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_studentService = new Wx_s_studentService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $wx_s_studentService->wx_s_studentShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }

    /**
     * 名  称 : wx_s_studentPut()
     * 功  能 : 修改用户个人添加学生信息接口
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['StudyId']    => '学生ID';
     * 输  入 : $put['StudyName']  => '学生姓名';
     * 输  入 : $put['StudySex']   => '学生性别';
     * 输  入 : $put['StudyAge']   => '学生年龄';
     * 输  入 : $put['StudyNexu']  => '学生关系';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 17:44
     */
    public function wx_s_studentPut(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_studentService = new Wx_s_studentService();

        // 获取传入参数
        $put = $request->put();

        // 执行Service逻辑
        $res = $wx_s_studentService->wx_s_studentEdit($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }

    /**
     * 名  称 : wx_s_studentDelete()
     * 功  能 : 删除用户个人添加学生信息接口
     * 变  量 : --------------------------------------
     * 输  入 : $delete['UserPhone']  => '用户手机号';
     * 输  入 : $delete['StudyId']    => '学生ID';
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 17:56
     */
    public function wx_s_studentDelete(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $wx_s_studentService = new Wx_s_studentService();

        // 获取传入参数
        $delete = $request->delete();

        // 执行Service逻辑
        $res = $wx_s_studentService->wx_s_studentDel($delete);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','');
    }
}
