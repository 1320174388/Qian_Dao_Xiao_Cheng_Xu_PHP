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
     * 输  入 : (string) $school => '学校ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function studentSel(Request $request)
    {
        // 获取传值
        $school  = $request->post('school_id');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->studentSel($school);
        return \RSD::wxReponse($res,'S','查找成功',$res['data']);
    }


    /**
     * 名  称 : modifySel()
     * 功  能 : 修改用户课程
     * 变  量 : --------------------------------------
     * 输  入 : (string) $teacherid => '用户手机号';
     * 输  入 : (string) $teacherid => '学校主键';
     * 输  入 : (string) $teacherid => '课程名称';
     * 输  入 : (string) $teacherid => '课程数量';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function modifySel(Request $request)
    {
        // 获取传值
        $tel  = $request->post('user_tel');
        $school  = $request->post('school_id');
        $course  = $request->post('course_id');
        $num  = $request->post('course_num');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->modifySel($tel,$school,$course,$num);

        return \RSD::wxReponse($res,'S','修改成功',$res['data']);
    }


    /**输入：
     * 名  称 : modifyAdd()
     * 功  能 : 添加用户课程
     * 变  量 : --------------------------------------
     * 输  入 : (string) $teacherid => '用户手机号';
     * 输  入 : (string) $teacherid => '学校主键';
     * 输  入 : (string) $teacherid => '课程名称';
     * 输  入 : (string) $teacherid => '课程数量';
     * 输  出 : {"errNum":0,"retMsg":"添加成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function modifyAdd(Request $request)
    {
        // 获取传值
        $tel  = $request->post('user_tel');
        $school  = $request->post('school_id');
        $course  = $request->post('course_id');
        $num  = $request->post('course_num');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->modifyAdd($tel,$school,$course,$num);

        return \RSD::wxReponse($res,'S','添加成功',$res['data']);
    }


    /**
     * 名  称 : userSel()
     * 功  能 : 搜索用户
     * 变  量 : --------------------------------------
     * 输  入 : (string) $userstel => '电话号';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function userSel(Request $request)
    {
        // 获取传值
        $userstel  = $request->post('users_tel');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->userSel($userstel);

        return \RSD::wxReponse($res,'S','查询成功',$res['data']);
    }


    /**
     * 名  称 : signSel()
     * 功  能 : 查询学校学生签到信息
     * 变  量 : --------------------------------------
     * 输  入 : (string) $school => '学校ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function signSel(Request $request)
    {
        // 获取传值
        $school  = $request->post('school_id');
        // 引入Service逻辑层代码
        $res = (new ApplicationService())->signSel($school);

        return \RSD::wxReponse($res,'S','查询成功',$res['data']);
    }


}
