<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplicationDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/12 09:17
 *  文件描述 :  学校申请列表数据层
 *  历史记录 :  -----------------------
 */
namespace app\application_module\working_version\v1\dao;
use app\application_module\working_version\v1\model\ApplicationModel;
use app\application_module\working_version\v1\model\TeacherModel;
use app\application_module\working_version\v1\model\UserModel;
use app\application_module\working_version\v1\model\StudentModel;
use app\application_module\working_version\v1\model\UserscourseModel;
use app\application_module\working_version\v1\model\userSelModel;
use app\application_module\working_version\v1\service\ApplicationService;

class ApplicationDao
{
    /**
     * 名  称 : applicationSel()
     * 功  能 : 声明：学校申请列表查询
     * 输  入 : (string) $application => '状态';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationSel($application='')
    {
        $ApplicationModel = new ApplicationModel();
        if($application == ''){
            $list = $ApplicationModel->select();
        }else{
            $list = $ApplicationModel->where('school_state',$application)->find();
        }

        if(!$list){
            return returnData('error',false);
        }

        // 返回数据
        return returnData('success',$list);

    }

    /**
     * 名  称 : applicationUpd()
     * 功  能 : 声明：更改学校申请状态
     * 输  入 : (string) $application => '状态';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationUpd($applicationid,$application,$tel)
    {
        $ApplicationModel = new ApplicationModel();
        // 进行修改
        $res = $ApplicationModel->save([
            $ApplicationModel->school_state    = $application
        ],['school_id'=>$applicationid]);
        // 获取success_token
        $accessTokenArr = \AccessTokenRequest::wxRequest(
            config('wx_config.wx_AppID'),
            config('wx_config.wx_AppSecret'),
            './project_access_token/'
        );
        // 获取openid
        $tel = ApplicationModel::field('users_tel')
            ->where('users_tel',$tel)
            ->find();
        $token = UserModel::field('user_token')
            ->where('users_tel',$tel)
            ->find();
        $openid = userSelModel::field('user_openid')
            ->where('user_token',$token)
            ->find();
        $Formid = ApplicationModel::field('users_tel')
            ->where('form_id',$tel)
            ->find();
        // 发送模板消息
        if ($res['teacher_state'] == 0 && $res) {
            \TemplateMessagePushLibrary::sendTemplate(
                $accessTokenArr['data']['access_token'],
                [
                    'touser' => $openid,
                    'template_id' => config('wx_config.wx_Push_Apply'),
                    'page' => config('wx_config.wx_Apply_URL'),
                    'form_id' => $Formid,
                    'data' => [
                        'keyword1' => ['value' => '申请学校'],
                        'keyword2' => ['value' => '审核通过'],
                    ],
                ]
            );
        }else{
            \TemplateMessagePushLibrary::sendTemplate(
                $accessTokenArr['data']['access_token'],
                [
                    'touser' => $openid,
                    'template_id' => config('wx_config.wx_Push_Apply'),
                    'page' => config('wx_config.wx_Apply_URL'),
                    'form_id' => $Formid,
                    'data' => [
                        'keyword1' => ['value' => '申请学校'],
                        'keyword2' => ['value' => '审核失败'],
                    ],
                ]
            );
        }

        // 判断模板消息是否发送成功
        if($res['msg']=='error'){
            return returnData('error',$res['data']);
        }
        // 验证
        if(!$res){
            return returnData('error',false);
        }

        // 返回数据
        return returnData('success',$res);
    }

    /**
    * 名  称 : applicationUpd()
    * 功  能 : 声明：教师列表
    * 输  入 : (string) $schoolid => '学校ID';
    * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
    * 创  建 : 2018/09/12 10:03
    */
    public function tecacherSel($schoolid)
    {
        $TeacherModel = new TeacherModel();
        if($TeacherModel == ''){
            $list = $TeacherModel->select();
        }else{
            $list = $TeacherModel->where('teacher_id',$schoolid)->find();
        }

        if(!$list){
            return returnData('error',false);
        }

        // 返回数据
        return returnData('success',$list);
    }


    /**
     * 名  称 : applicationUpd()
     * 功  能 : 声明：教师列表
     * 输  入 : (string) $teacherid => '教师ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function tecacherSelect($teacherid)
    {
        $TeacherModel = new TeacherModel();

        $list = $TeacherModel->where('teacher_id',$teacherid)->find();
        // 验证数据
        if(!$list) return returnData('error');
        // 返回数据
        return returnData('success',$list);
    }
    /**
     * 名  称 : student()
     * 功  能 : 声明：学生列表
     * 输  入 : (string) $studen => '学生ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function studentSel($studen)
    {
        $StudentModel = new StudentModel();
        if($StudentModel == ''){
            $list = $StudentModel->select();
        }else{
            $list = $StudentModel->where('student_id',$studen)->find();
        }
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);
    }

    /**
     * 名  称 : modifyAdd()
     * 功  能 : 添加用户课程
     * 变  量 : --------------------------------------
     * 输  入 : (string) $tel => '用户手机号';
     * 输  入 : (string) $school => '学校主键';
     * 输  入 : (string) $course => '课程名称';
     * 输  入 : (string) $num => '课程数量';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function modifySel($tel,$school,$course,$num)
    {
        $Userscourse = new UserscourseModel();

        // 进行修改
        $res = $Userscourse->save([
            $Userscourse->school_id    = $school,
            $Userscourse->course_id    = $course,
            $Userscourse->course_num    = $num
        ],['user_tel'=>$tel]);
        // 验证
        if(!$res){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$res);

    }


    /**
     * 名  称 : modifyAdd()
     * 功  能 : 修改用户课程
     * 变  量 : --------------------------------------
     * 输  入 : (string) $tel => '用户手机号';
     * 输  入 : (string) $school => '学校主键';
     * 输  入 : (string) $course => '课程名称';
     * 输  入 : (string) $num => '课程数量';
     * 输  出 : {"errNum":0,"retMsg":"添加成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function modifyAdd($tel,$school,$course,$num)
    {
        $Userscourse = new UserscourseModel();

        $Userscourse->user_tel = $tel;
        $Userscourse->school_id = $school;
        $Userscourse->course_id = $course;
        $Userscourse->course_num = $num;
        // 保存数据
        $res = $Userscourse->save();
        if(!$res) return returnData('error');
        // 返回数据
        return returnData('success',$res);

    }



    /**
     * 名  称 : modifySeluse()
     * 功  能 : 搜索用户
     * 变  量 : --------------------------------------
     * 输  入 : (string) $userstel => '电话号';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function userSel($userstel='')
    {
        $UserModel = new UserModel();

        if($userstel == ''){
            $list = $UserModel->select();
        }else{
            $list = $UserModel->where('users_tel',$userstel)->find();
        }

        if(!$list){
            return returnData('error',false);
        }

        // 返回数据
        return returnData('success',$list);
    }



    /**
     * 名  称 : signSel()
     * 功  能 : 查询学校学生签到信息
     * 变  量 : --------------------------------------
     * 输  入 : (string) $school => '学校ID';
     * 输  出 : {"errNum":0,"retMsg":"查询成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function signSel($school)
    {
        $res = ApplicationModel::field(
            config('v1_tableName.Student').'.student_name,'.
            config('v1_tableName.Student').'.student_sex,'.
            config('v1_tableName.Student').'.student_age,'.
            config('v1_tableName.Student').'.student_nexus,'.
            config('v1_tableName.Student').'.users_tel,'.
            config('v1_tableName.choolUserSel').'.sign_time'
        )->leftJoin(
            config('v1_tableName.choolUserSel'),
            config('v1_tableName.choolUserSel').'.school_id = ' .
            config('v1_tableName.ApplicationSchool').'.school_id'
        )->leftJoin(
            config('v1_tableName.Student'),
            config('v1_tableName.Student').'.student_id = ' .
            config('v1_tableName.choolUserSel').'.student_id'
        )->where(
            config('v1_tableName.ApplicationSchool').'.school_id',
            $school
        )
//            ->limit(
//            $school['SigeNumb'],12
//        )
            ->select()->toArray();
        // 返回数据
        return returnData('success',$res);
    }
}
