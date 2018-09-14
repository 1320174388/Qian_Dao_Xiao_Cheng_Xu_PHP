<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SchoolController.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/12 09:50
 *  文件描述 :  签到小程序学校端模块控制器
 *  历史记录 :  -----------------------
 */
namespace app\school_module\working_version\v1\controller;
use think\Controller;
use app\school_module\working_version\v1\service\SchoolService;

class SchoolController extends Controller
{
    /**
     * 名  称 : schoolPost()
     * 功  能 : 学校申请接口
     * 变  量 : --------------------------------------
     * 输  入 : (string) $users_tel       =>  用户手机号
     * 输  入 : (string) $school_name     =>  学校名称
     * 输  入 : (string) $firm_name       =>  公司名称
     * 输  入 : (string) $firm_man        =>  公司法人
     * 输  入 : (string) $school_address  =>  学校地址
     * 输  入 : (string) $school_man      =>  学校负责人
     * 输  入 : (string) $school_phone    =>  负责人电话
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/12 12:18
     */
    public function schoolPost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $schoolService = new SchoolService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $schoolService->schoolAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }
    /**
     * 名  称 : teacherApplyGet()
     * 功  能 : 获取教师申请列表接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  入 : (string) $teacher_state    =>  申请状态  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherApplyGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $teacherApplyService = new SchoolService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $teacherApplyService->teacherApplyShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
    /**
     * 名  称 : teacherStatePut()
     * 功  能 : 更改教师申请状态
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $teacher_id        =>  教师主键  【必填】
     * 输  入 : (string) $users_tel       =>  用户手机号  【必填】
     * 输  入 : (string) $UserFormid       =>  formId  【必填】
     * 输  入 : (int)     $teacher_state    =>  申请状态  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherStatePut(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $teacherStateService = new SchoolService();

        // 获取传入参数
        $put = $request->put();

        // 执行Service逻辑
        $res = $teacherStateService->teacherStateEdit($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
    /**
     * 名  称 : schoolCoursePost()
     * 功  能 : 学校添加课程
     * 变  量 : --------------------------------------
     * 输  入 : (int)     $school_id          =>  学校主键  【必填】
     * 输  入 : (string)     $course_name     =>  课程名称  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function schoolCoursePost(\think\Request $request)
    {

        // 实例化Service层逻辑类
        $teacherStateService = new SchoolService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $teacherStateService->schoolCourseAdd($post);
        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
    /**
     * 名  称 : schoolCoursePut()
     * 功  能 : 修改学校课程
     * 变  量 : --------------------------------------
     * 输  入 : (int)     $course_id       =>  课程主键  【必填】
     * 输  入 : (int)     $school_id       =>  学校主键  【必填】
     * 输  入 : (string)  $course_name     =>  课程名称  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function schoolCoursePut(\think\Request $request)
    {

        // 实例化Service层逻辑类
        $teacherStateService = new SchoolService();

        // 获取传入参数
        $put = $request->put();

        // 执行Service逻辑
        $res = $teacherStateService->schoolCourseEdit($put);
        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
    /**
     * 名  称 : schoolCourseDelete()
     * 功  能 : 删除学校课程接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 14:12
     */
    public function schoolCourseDelete(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $schoolCourseService = new SchoolService();

        // 获取传入参数
        $delete = $request->delete();

        // 执行Service逻辑
        $res = $schoolCourseService->schoolCourseDel($delete);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }
    /**
     * 名  称 : schoolCourseGet()
     * 功  能 : 获取学校课程接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/13 14:56
     */
    public function schoolCourseGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $schoolCourseService = new SchoolService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $schoolCourseService->schoolCourseShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
    /**
     * 名  称 : schoolStudentGet()
     * 功  能 : 获取学校学生信息接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/13 15:21
     */
    public function schoolStudentGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $schoolStudentService = new SchoolService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $schoolStudentService->schoolStudentShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S','请求成功');
    }
    /**
     * 名  称 : periodPost()
     * 功  能 : 添加课程课时接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  入 : (int)    $teacher_id       =>  教师主键  【必填】
     * 输  入 : (string) $start_time       =>  开始时间  【必填】
     * 输  入 : (string) $end_time         =>  结束时间  【必填】
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 17:53
     */
    public function periodPost(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $periodService = new SchoolService();

        // 获取传入参数
        $post = $request->post();

        // 执行Service逻辑
        $res = $periodService->periodAdd($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }
    /**
     * 名  称 : periodPut()
     * 功  能 : 修改课程课时接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $period_id        =>  课时主键  【必填】
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  入 : (int)    $teacher_id       =>  教师主键  【必填】
     * 输  入 : (string) $start_time       =>  开始时间  【必填】
     * 输  入 : (string) $end_time         =>  结束时间  【必填】
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 19:25
     */
    public function periodPut(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $periodService = new SchoolService();

        // 获取传入参数
        $put = $request->put();

        // 执行Service逻辑
        $res = $periodService->periodEdit($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }
    /**
     * 名  称 : periodDelete()
     * 功  能 : 删除课程课时接口
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $period_id        =>  课时主键  【必填】
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 20:01
     */
    public function periodDelete(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $periodService = new SchoolService();

        // 获取传入参数
        $delete = $request->delete();

        // 执行Service逻辑
        $res = $periodService->periodDel($delete);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }
    /**
     * 名  称 : periodGet()
     * 功  能 : 获取学校课程课时列表
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/13 20:01
     */
    public function periodGet(\think\Request $request)
    {
        // 实例化Service层逻辑类
        $periodService = new SchoolService();

        // 获取传入参数
        $get = $request->get();

        // 执行Service逻辑
        $res = $periodService->periodShow($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'S');
    }
}
