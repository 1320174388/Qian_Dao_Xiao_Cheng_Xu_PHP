<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SchoolService.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/12 09:50
 *  文件描述 :  签到小程序学校端模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\school_module\working_version\v1\service;
use app\school_module\working_version\v1\dao\SchoolDao;
use app\school_module\working_version\v1\validator\SchoolDataValidator;
class SchoolService
{
    /**
     * 名  称 : schoolAdd()
     * 功  能 : 学校申请接口逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (string) $users_tel       =>  用户手机号
     * 输  入 : (string) $school_name     =>  学校名称
     * 输  入 : (string) $firm_name       =>  公司名称
     * 输  入 : (string) $firm_man        =>  公司法人
     * 输  入 : (string) $school_address  =>  学校地址
     * 输  入 : (string) $school_man      =>  学校负责人
     * 输  入 : (string) $school_phone    =>  负责人电话
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 12:18
     */
    public function schoolAdd($post)
    {
        //验证数据
        $validator = new SchoolDataValidator();
        //返回错误提示
        if (!$validator->check($post)) {
            return returnData('error',$validator->getError());
        }
        // 实例化Dao层数据类
        $schoolDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $schoolDao->schoolCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : teacherApplyShow()
     * 功  能 : 获取教师申请列表逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  入 : (string) $teacher_state    =>  申请状态  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherApplyShow($get)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'         => 'require',
            'teacher_state'     => 'require'
        ],[
            'school_id.require'         => '缺少school_id参数',
            'teacher_state.require'     => '缺少teacher_state参数'
        ]);
        if (!$validate->check($get)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $teacherApplyDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $teacherApplyDao->teacherApplySelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : teacherStatePut()
     * 功  能 : 更改教师申请状态
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $teacher_id        =>  教师主键  【必填】
     * 输  入 : (string) $users_tel       =>  用户手机号  【必填】
     * 输  入 : (string) $UserFormid       =>  formId  【必填】
     * 输  入 : (int)    $teacher_state    =>  申请状态  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherStateEdit($put)
    {
        //验证数据
        $validate = new \think\Validate([
            'teacher_id'        => 'require',
            'users_tel'         => 'require',
            'UserFormid'        => 'require',
            'teacher_state'     => 'require'
        ],[
            'teacher_id.require'         => '缺少teacher_id参数',
            'users_tel.require'         => '缺少users_tel参数',
            'UserFormid.require'         => '缺少UserFormid参数',
            'teacher_state.require'     => '缺少teacher_state参数'
        ]);
        if (!$validate->check($put)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $teacherApplyDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $teacherApplyDao->teacherStateUpdate($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');

    }
    /**
     * 名  称 : schoolCourseAdd()
     * 功  能 : 学校添加课程
     * 变  量 : --------------------------------------
     * 输  入 : (int)     $school_id          =>  学校主键  【必填】
     * 输  入 : (string)     $course_name     =>  课程名称  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function schoolCourseAdd($post)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'       => 'require',
            'course_name'     => 'require'
        ],[
            'school_id.require'       => '缺少school_id参数',
            'course_name.require'     => '缺少course_name参数'
        ]);
        if (!$validate->check($post)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $teacherApplyDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $teacherApplyDao->schoolCourseCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : schoolCourseEdit()
     * 功  能 : 修改学校课程
     * 变  量 : --------------------------------------
     * 输  入 : (int)     $course_id       =>  课程主键  【必填】
     * 输  入 : (int)     $school_id       =>  学校主键  【必填】
     * 输  入 : (string)  $course_name     =>  课程名称  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function schoolCourseEdit($put)
    {
        //验证数据
        $validate = new \think\Validate([
            'course_id'       => 'require',
            'school_id'       => 'require',
            'course_name'     => 'require'
        ],[
            'course_id.require'       => '缺少course_id参数',
            'school_id.require'       => '缺少school_id参数',
            'course_name.require'     => '缺少course_name参数'
        ]);
        if (!$validate->check($put)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $teacherApplyDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $teacherApplyDao->schoolCourseUpdate($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : schoolCourseDel()
     * 功  能 : 删除学校课程逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 14:12
     */
    public function schoolCourseDel($delete)
    {
        //验证数据
        $validate = new \think\Validate([
            'course_id'       => 'require',
        ],[
            'course_id.require'       => '缺少course_id参数',
        ]);
        if (!$validate->check($delete)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $schoolCourseDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $schoolCourseDao->schoolCourseDelete($delete);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : schoolCourseShow()
     * 功  能 : 获取学校课程逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 14:56
     */
    public function schoolCourseShow($get)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'       => 'require',
        ],[
            'school_id.require'       => '缺少school_id参数',
        ]);
        if (!$validate->check($get)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $schoolCourseDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $schoolCourseDao->schoolCourseSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : schoolStudentShow()
     * 功  能 : 获取学校学生信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 15:21
     */
    public function schoolStudentShow($get)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'       => 'require',
        ],[
            'school_id.require'       => '缺少school_id参数',
        ]);
        if (!$validate->check($get)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $schoolStudentDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $schoolStudentDao->schoolStudentSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : periodAdd()
     * 功  能 : 添加课程课时逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  入 : (int)    $teacher_id       =>  教师主键  【必填】
     * 输  入 : (string) $start_time       =>  开始时间  【必填】
     * 输  入 : (string) $end_time         =>  结束时间  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:53
     */
    public function periodAdd($post)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'      => 'require',
            'course_id'      => 'require',
            'teacher_id'     => 'require',
            'start_time'     => 'require',
            'end_time'       => 'require',
        ],[
            'school_id.require'      => '缺少school_id参数',
            'course_id.require'      => '缺少course_id参数',
            'teacher_id.require'     => '缺少teacher_id参数',
            'start_time.require'     => '缺少start_time参数',
            'end_time.require'       => '缺少end_time参数',
        ]);
        if (!$validate->check($post)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $periodDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $periodDao->periodCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : periodEdit()
     * 功  能 : 修改课程课时逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $period_id        =>  课时主键  【必填】
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  入 : (int)    $teacher_id       =>  教师主键  【必填】
     * 输  入 : (string) $start_time       =>  开始时间  【必填】
     * 输  入 : (string) $end_time         =>  结束时间  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 19:25
     */
    public function periodEdit($put)
    {
        //验证数据
        $validate = new \think\Validate([
            'period_id'      => 'require',
            'course_id'      => 'require',
            'teacher_id'     => 'require',
            'start_time'     => 'require',
            'end_time'       => 'require',
        ],[
            'period_id.require'      => '缺少period_id参数',
            'course_id.require'      => '缺少course_id参数',
            'teacher_id.require'     => '缺少teacher_id参数',
            'start_time.require'     => '缺少start_time参数',
            'end_time.require'       => '缺少end_time参数',
        ]);
        if (!$validate->check($put)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $periodDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $periodDao->periodUpdate($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : periodDel()
     * 功  能 : 删除课程课时逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $period_id        =>  课时主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 20:01
     */
    public function periodDel($delete)
    {
        //验证数据
        $validate = new \think\Validate([
            'period_id'       => 'require',
        ],[
            'period_id.require'       => '缺少period_id参数',
        ]);
        if (!$validate->check($delete)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $periodDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $periodDao->periodDelete($delete);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : periodShow()
     * 功  能 : 获取学校课程课时
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 15:21
     */
    public function periodShow($get)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'       => 'require',
        ],[
            'school_id.require'       => '缺少school_id参数',
        ]);
        if (!$validate->check($get)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $periodDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $periodDao->periodSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
