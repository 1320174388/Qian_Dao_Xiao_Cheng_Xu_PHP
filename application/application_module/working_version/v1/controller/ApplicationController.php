<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplicationController.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/12 09:17
 *  文件描述 :  学校申请列表控制器
 *  历史记录 :  -----------------------
 */
namespace app\application_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\application_module\working_version\v1\service\ApplicationService;

class ApplicationController extends Controller
{
    /**
     * 名  称 : applicationSel()
     * 功  能 : 学校申请列表查询
     * 变  量 : --------------------------------------
     * 输  入 : (string) $application => '状态';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationSel(Request $request)
    {
        // 获取传值
        $application  = $request->post('school_state');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->applicationSel($application);
        if($res['msg']=='error') return returnResponse(3,$res['data']);
        // 返回数据
        return returnResponse(0,'查询成功',true);

    }

    /**
     * 名  称 : applicationUpd()
     * 功  能 : 更改学校申请状态
     * 变  量 : --------------------------------------
     * 输  入 : (string) $application => '状态';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationUpd(Request $request)
    {
        // 获取传值
        $applicationid  = $request->post('school_id');
        $application  = $request->post('school_state');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->applicationUpd($applicationid,$application);
        if($res['msg']=='error') return returnResponse(3,$res['data']);
        // 返回数据
        return returnResponse(0,'修改成功',true);

    }

    /**
     * 名  称 : tecacherSel()
     * 功  能 : 教师列表
     * 变  量 : --------------------------------------
     * 输  入 : (string) $schoolid => '学校ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function tecacherSel(Request $request)
    {
        // 获取传值
        $schoolid  = $request->post('school_id');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->tecacherSel($schoolid);
        if($res['msg']=='error') return returnResponse(3,$res['data']);
        // 返回数据
        return returnResponse(0,'查询成功',true);

    }


    /**
     * 名  称 : tecacherSelected()
     * 功  能 : 教师详情
     * 变  量 : --------------------------------------
     * 输  入 : (string) $teacherid => '教师ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function tecacherSelected(Request $request)
    {
        // 获取传值
        $teacherid  = $request->post('teacher_id');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->tecacherSelect($teacherid);
        if($res['msg']=='error') return returnResponse(3,$res['data']);
        // 返回数据
        return returnResponse(0,'查询成功',true);

    }

    /**
     * 名  称 : studentSel()
     * 功  能 : 学生列表
     * 变  量 : --------------------------------------
     * 输  入 : (string) $teacherid => '学生ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function studentSel(Request $request)
    {
        // 获取传值
        $student  = $request->post('student_id');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->studentSel($student);

        return \RSD::wxReponse($res,'S','请求成功',$res['data']);
    }


    /**
     * 名  称 : modifySel()
     * 功  能 : 修改用户课程
     * 变  量 : --------------------------------------
     * 输  入 : (string) $teacherid => '学生ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function modifySel(Request $request)
    {
        // 获取传值
        $student  = $request->post('student_id');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->studentSel($student);

        return \RSD::wxReponse($res,'S','请求成功',$res['data']);
    }


}
