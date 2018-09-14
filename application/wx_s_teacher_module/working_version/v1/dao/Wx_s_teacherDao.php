<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_teacherDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 19:46
 *  文件描述 :  教师模块数据层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_teacher_module\working_version\v1\dao;
use app\wx_s_teacher_module\working_version\v1\model\Wx_s_teacherModel;

class Wx_s_teacherDao implements Wx_s_teacherInterface
{
    /**
     * 名  称 : wx_s_teacherCreate()
     * 功  能 : 教师申请接口数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$post['UserPhone']   => '用户手机号';
     * 输  入 : ( Int ) $post['SchoolId']    => '学校ID';
     * 输  入 : ( File )$post['TeachFile']   => '头像URL';
     * 输  入 : (String)$post['TeachName']   => '教师姓名';
     * 输  入 : ( Int ) $post['TeachSex']    => '教师性别';
     * 输  入 : ( Int ) $post['TeachAge']    => '教师年龄';
     * 输  入 : (String)$post['TeachBirT']   => '教师生日';
     * 输  入 : (String)$post['TeachTime']   => '申请时间';
     * 输  入 : (String)$post['TeachFormId'] => '申请时间';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 20:10
     */
    public function wx_s_teacherCreate($post)
    {
        // TODO :  获取数据
        $D = Wx_s_teacherModel::where(
            'users_tel',$post['UserPhone']
        )->where(
            'school_id',$post['SchoolId']
        );
        $D1 = clone($D);
        $D1 = $D1->where('teacher_state','1')->find();
        // TODO :  判断数据
        if($D1){return returnData('error','以申请本学校');}
        $D2 = clone($D);
        $D2 = $D2->where('teacher_state','0')->find();
        // TODO :  判断数据
        if($D2){return returnData('error','以申请为本学校老师');}
        // TODO :  判断数据
        $D3 = clone($D);
        $D3 = $D3->find();
        // TODO :  判断数据
        if($D3){
            $D3->users_tel        = $post['UserPhone'];
            $D3->teacher_photo    = $post['TeachFile'];
            $D3->teacher_name     = $post['TeachName'];
            $D3->teacher_sex      = $post['TeachSex'];
            $D3->teacher_age      = $post['TeachAge'];
            $D3->teacher_birthday = $post['TeachBirT'];
            $D3->teacher_state    = 1;
            $D3->teacher_time     = time();
            $D3->form_id          = $post['TeachFormId'];
            // TODO :  保存数据
            $res = $D3->save();
            // TODO :  返回数据
            return \RSD::wxReponse($res,'M','申请成功','申请失败');
        }
        // TODO :  Wx_s_teacherModel 模型
        $Wx_s_teacherModel = new Wx_s_teacherModel();
        // TODO :  处理数据
        $Wx_s_teacherModel->school_id        = $post['SchoolId'];
        $Wx_s_teacherModel->users_tel        = $post['UserPhone'];
        $Wx_s_teacherModel->teacher_photo    = $post['TeachFile'];
        $Wx_s_teacherModel->teacher_name     = $post['TeachName'];
        $Wx_s_teacherModel->teacher_sex      = $post['TeachSex'];
        $Wx_s_teacherModel->teacher_age      = $post['TeachAge'];
        $Wx_s_teacherModel->teacher_birthday = $post['TeachBirT'];
        $Wx_s_teacherModel->teacher_state    = 1;
        $Wx_s_teacherModel->teacher_time     = time();
        $Wx_s_teacherModel->form_id          = $post['TeachFormId'];
        // TODO :  保存数据
        $res = $Wx_s_teacherModel->save();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','申请成功','申请失败');
    }

    /**
     * 名  称 : wx_s_teacherSelect()
     * 功  能 : 获取教师授课及课时接口数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['SchoolID']  => '学校ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 15:29
     */
    public function wx_s_teacherSelect($get)
    {
        // TODO :  Wx_s_teacherModel 模型
        $wxSteacherModel = Wx_s_teacherModel::field(
            config('v1_tableName.I_Course_Lists').'.course_id,'.
            config('v1_tableName.I_Period_Lists').'.period_id,'.
            config('v1_tableName.I_Course_Lists').'.course_name,'.
            config('v1_tableName.I_Course_Lists').'.school_id,'.
            config('v1_tableName.I_Period_Lists').'.start_time,'.
            config('v1_tableName.I_Period_Lists').'.end_time'
        )->leftJoin(
            config('v1_tableName.I_Period_Lists'),
            config('v1_tableName.I_Teacher_Lists').'.teacher_id = '.
            config('v1_tableName.I_Period_Lists').'.teacher_id'
        )->leftJoin(
            config('v1_tableName.I_Course_Lists'),
            config('v1_tableName.I_Period_Lists').'.course_id = '.
            config('v1_tableName.I_Course_Lists').'.course_id'
        )->where(
            config('v1_tableName.I_Teacher_Lists').'.users_tel',
            $get['UserPhone']
        );
        // TODO :  判断是否有学校条件;
        $wxSteacherModel = $wxSteacherModel->where(
            config('v1_tableName.I_Period_Lists').'.school_id',
            ($get['SchoolID']=='0')? '>' : '=',
            $get['SchoolID']
        );
        // TODO :  获取授课数据
        $wxSteacherModel1 = clone($wxSteacherModel);
        $course = $wxSteacherModel1->where(
            config('v1_tableName.I_Period_Lists').'.end_time',
            '>',time()
        )->select()->toArray();
        // TODO :  获取课时数据
        $wxSteacherModel2 = clone($wxSteacherModel);
        $period = $wxSteacherModel2->where(
            config('v1_tableName.I_Period_Lists').'.end_time',
            '<=',time()
        )->limit(0,12)->select()->toArray();
        // TODO :  返回数据
        return \RSD::wxReponse(true,'M',[
            'course'=>$course,
            'period'=>$period
        ]);
    }

    /**
     * 名  称 : wx_s_teacherSelect2()
     * 功  能 : 二次获取教师课时
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['SchoolID']  => '学校ID';
     * 输  入 : ( int ) $get['PeriodNum'] => '课时数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 15:29
     */
    public function wx_s_teacherSelect2($get)
    {
        // TODO :  Wx_s_teacherModel 模型
        $wxSteacherModel = Wx_s_teacherModel::field(
            config('v1_tableName.I_Course_Lists').'.course_id,'.
            config('v1_tableName.I_Period_Lists').'.period_id,'.
            config('v1_tableName.I_Course_Lists').'.course_name,'.
            config('v1_tableName.I_Course_Lists').'.school_id,'.
            config('v1_tableName.I_Period_Lists').'.start_time,'.
            config('v1_tableName.I_Period_Lists').'.end_time'
        )->leftJoin(
            config('v1_tableName.I_Period_Lists'),
            config('v1_tableName.I_Teacher_Lists').'.teacher_id = '.
            config('v1_tableName.I_Period_Lists').'.teacher_id'
        )->leftJoin(
            config('v1_tableName.I_Course_Lists'),
            config('v1_tableName.I_Period_Lists').'.course_id = '.
            config('v1_tableName.I_Course_Lists').'.course_id'
        )->where(
            config('v1_tableName.I_Teacher_Lists').'.users_tel',
            $get['UserPhone']
        );
        // TODO :  判断是否有学校条件;
        $wxSteacherModel = $wxSteacherModel->where(
            config('v1_tableName.I_Period_Lists').'.school_id',
            ($get['SchoolID']=='0')? '>' : '=',
            $get['SchoolID']
        );
        // TODO :  获取授课数据
        $period = $wxSteacherModel->where(
            config('v1_tableName.I_Period_Lists').'.end_time',
            '<=',time()
        )->limit($get['PeriodNum'],12)->select()->toArray();
        // TODO :  返回数据
        return \RSD::wxReponse(true,'M',[
            'period'=>$period
        ]);
    }

    /**
     * 名  称 : wx_s_teacherSelect3()
     * 功  能 : 获取课时签到学生信息
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['PeriodID']  => '课时ID';
     * 输  入 : ( int ) $get['SigeNumb']  => '签到数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 15:29
     */
    public function wx_s_teacherSelect3($get)
    {
        // TODO :  Wx_s_teacherModel 模型
        $res = Wx_s_teacherModel::field(
            config('v1_tableName.I_Student_Lists').'.student_name,'.
            config('v1_tableName.I_Student_Lists').'.student_sex,'.
            config('v1_tableName.I_Student_Lists').'.student_age,'.
            config('v1_tableName.I_Student_Lists').'.student_nexus,'.
            config('v1_tableName.I_Student_Lists').'.users_tel,'.
            config('v1_tableName.I_Sign_Lists').'.sign_time'
        )->leftJoin(
            config('v1_tableName.I_Period_Lists'),
            config('v1_tableName.I_Teacher_Lists').'.teacher_id = ' .
            config('v1_tableName.I_Period_Lists').'.teacher_id'
        )->leftJoin(
            config('v1_tableName.I_Sign_Lists'),
            config('v1_tableName.I_Period_Lists').'.period_id = ' .
            config('v1_tableName.I_Sign_Lists').'.period_id'
        )->leftJoin(
            config('v1_tableName.I_Student_Lists'),
            config('v1_tableName.I_Sign_Lists').'.student_id = ' .
            config('v1_tableName.I_Student_Lists').'.student_id'
        )->where(
            config('v1_tableName.I_Period_Lists').'.period_id',
            ($get['PeriodID']=='0')? '>' : '=',
            $get['PeriodID']
        )->limit(
            $get['SigeNumb'],12
        )->select()->toArray();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M',$res,'没有签到信息');
    }
}
