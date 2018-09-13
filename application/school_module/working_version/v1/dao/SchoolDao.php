<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SchoolDao.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/12 09:50
 *  文件描述 :  签到小程序学校端模块数据层
 *  历史记录 :  -----------------------
 */
namespace app\school_module\working_version\v1\dao;
use app\school_module\working_version\v1\model\CourseModel;
use app\school_module\working_version\v1\model\SchoolModel;
use app\school_module\working_version\v1\model\UsersModel;
use app\school_module\working_version\v1\model\TeacherModel;
use app\school_module\working_version\v1\model\PeriodModel;
use app\school_module\working_version\v1\model\SchoolStudentModel;

class SchoolDao implements SchoolInterface
{
    /**
     * 名  称 : schoolCreate()
     * 功  能 : 学校申请接口数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (string) $user_token      =>  用户token
     * 输  入 : (string) $school_name     =>  学校名称
     * 输  入 : (string) $firm_name       =>  公司名称
     * 输  入 : (string) $firm_man        =>  公司法人
     * 输  入 : (string) $school_address  =>  学校地址
     * 输  入 : (string) $school_man      =>  学校负责人
     * 输  入 : (string) $school_phone    =>  负责人电话
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/12 12:18
     */
    public function schoolCreate($post)
    {
        //查询用户实名状态
        $usersOpject = new UsersModel();
        $state = $usersOpject->where('user_token',$post['user_token'])
                            ->field('users_state')
                            ->find();
        //返回未实名状态
        if ($state['users_state'] == '1'){
            return returnData('error','请先实名认证');
        }
        // SchoolModel 模型
        $schoolOpject = new SchoolModel();
        //查询学校名称
        $schoolName = $schoolOpject->where('school_name',$post['school_name'])
                                    ->find();
        //返回学校名称重复
        if ($schoolName){
            return returnData('error','学校名称重复');
        }
        //添加数据
        $schoolOpject->data($post);
        //过滤非数据字段
        $reusult = $schoolOpject->allowField(true)->save();
        //返回结果
        return \RSD::wxReponse($reusult,'M','提交成功,等待审核','提交失败');
    }
    /**
     * 名  称 : teacherApplySelect()
     * 功  能 : 获取教师申请列表数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  入 : (string) $teacher_state    =>  申请状态  【选填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherApplySelect($get)
    {
        // TeacherModel 模型
        $teacherOpject = new TeacherModel();

        // 查询状态
        switch ($get['teacher_state'])
        {
            //查询学校端的所有教师
            case 'all':
               $res = $teacherOpject->where('school_id',$get['school_id'])
                                    ->select();
                return \RSD::wxReponse($res->toArray(),'M',$res->toArray(),'没有数据');
                break;
            default:
                $res = $teacherOpject->where([
                    'school_id'    => $get['school_id'],
                    'teacher_state'=> $get['teacher_state']
                ])->select();
                return \RSD::wxReponse($res->toArray(),'M',$res->toArray(),'没有数据');
        }
    }
    /**
     * 名  称 : teacherStateUpdate()
     * 功  能 : 更改教师申请状态
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $teacher_id        =>  教师主键  【必填】
     * 输  入 : (int)    $teacher_state    =>  申请状态  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherStateUpdate($put)
    {
        // TeacherModel 模型
        $teacherOpject = new TeacherModel();
        // 更新状态
       $res = $teacherOpject->save([
            'teacher_state' => $put['teacher_state']
        ],['teacher_id' => $put['teacher_id']]);
        // 返回结果
        return \RSD::wxReponse($res,'M','更新成功','更新失败');
    }
    /**
     * 名  称 : schoolCourseCreate()
     * 功  能 : 学校添加课程
     * 变  量 : --------------------------------------
     * 输  入 : (int)     $school_id          =>  学校主键  【必填】
     * 输  入 : (string)     $course_name     =>  课程名称  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function schoolCourseCreate($post)
    {
        //Course 模型
        $course = new CourseModel();
        //查询课程名称
        $courseName = $course->where(['school_id'=>$post['school_id'],
                                      'course_name'=>$post['course_name'],
                                      'course_status'=> 1])
                                ->find();
        //返回课程名称重复
        if ($courseName){
           return returnData('error','课程名称重复');
        }
        //添加课程
        $course->data($post);
        $res = $course->save();
        return \RSD::wxReponse($res,'M','添加成功','添加失败');
    }
    /**
     * 名  称 : schoolCourseUpdate()
     * 功  能 : 修改学校课程
     * 变  量 : --------------------------------------
     * 输  入 : (int)     $course_id       =>  课程主键  【必填】
     * 输  入 : (int)     $school_id       =>  学校主键  【必填】
     * 输  入 : (string)  $course_name     =>  课程名称  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function schoolCourseUpdate($put)
    {
        //course 模型
        $course = new CourseModel();

        //查询课程名称
        $courseName = $course->where(['school_id'=>$put['school_id'],
                                      'course_name'=>$put['course_name'],
                                      'course_status'=> 1])
                                ->find();
        //返回课程名称重复
        if ($courseName){
            return returnData('error','课程名称重复');
        }
        //执行修改
       $res = $course->save(['course_name'=> $put['course_name']],
                            ['course_id'=> $put['course_id']]);
        return \RSD::wxReponse($res,'M','更新成功','更新失败');
    }
    /**
     * 名  称 : schoolCourseDelete()
     * 功  能 : 删除学校课程数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 14:12
     */
    public function schoolCourseDelete($delete)
    {
        //  CourseModel 模型
        $course = new CourseModel();
        //更改课程删除状态 实现软删除
       $res = $course->save(['course_status'=>0],
                            ['course_id'=> $delete['course_id']]);
        return \RSD::wxReponse($res,'M','删除成功','删除失败');
    }
    /**
     * 名  称 : schoolCourseSelect()
     * 功  能 : 获取学校课程数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 14:56
     */
    public function schoolCourseSelect($get)
    {
        //CourseModel 模型
        $course = new CourseModel();
        //执行查询
        $res = $course->where(['school_id' => $get['school_id'],
                                'course_status' => 1])
                        ->select();
        return \RSD::wxReponse($res->toArray(),'M',$res->toArray(),'没有数据');
    }
    /**
     * 名  称 : schoolStudentSelect()
     * 功  能 : 获取学校学生信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 15:21
     */
    public function schoolStudentSelect($get)
    {
        // SchoolModel 模型
        $schoolStudent = SchoolModel::get($get['school_id']);
        //关联查询
        $res = $schoolStudent->roles;
        return \RSD::wxReponse($res->toArray(),'M',$res->toArray(),'没有数据');
    }
    /**
     * 名  称 : periodCreate()
     * 功  能 : 添加课程课时数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  入 : (int)    $teacher_id       =>  教师主键  【必填】
     * 输  入 : (string) $start_time       =>  开始时间  【必填】
     * 输  入 : (string) $end_time         =>  结束时间  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:53
     */
    public function periodCreate($post)
    {
        //PeriodModel 模型
        $period = new PeriodModel();
        //执行添加
        $period->data($post);
        $res = $period->save();
        return \RSD::wxReponse($res,'M','添加成功','添加失败');
    }
    /**
     * 名  称 : periodUpdate()
     * 功  能 : 修改课程课时数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $period_id        =>  课时主键  【必填】
     * 输  入 : (int)    $course_id        =>  课程主键  【必填】
     * 输  入 : (int)    $teacher_id       =>  教师主键  【必填】
     * 输  入 : (string) $start_time       =>  开始时间  【必填】
     * 输  入 : (string) $end_time         =>  结束时间  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 19:25
     */
    public function periodUpdate($put)
    {
        // PeriodModel 模型
        $period = new PeriodModel();
        //执行修改
        $res = $period->save($put,['period_id' => $put['period_id']]);
        return \RSD::wxReponse($res,'M','修改成功','修改失败');
    }
    /**
     * 名  称 : periodDelete()
     * 功  能 : 删除课程课时数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $period_id        =>  课时主键  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 20:01
     */
    public function periodDelete($delete)
    {
        //执行删除
        $res = PeriodModel::destroy($delete['period_id']);
        return \RSD::wxReponse($res,'M','删除成功','删除失败');
    }

}
