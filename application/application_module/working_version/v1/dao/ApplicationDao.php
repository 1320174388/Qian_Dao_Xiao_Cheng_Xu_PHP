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
        return returnData('success',true);

    }

    /**
     * 名  称 : applicationUpd()
     * 功  能 : 声明：更改学校申请状态
     * 输  入 : (string) $application => '状态';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationUpd($applicationid,$application)
    {
        $ApplicationModel = new ApplicationModel();
        // 进行修改
        $res = $ApplicationModel->save([
            $ApplicationModel->school_state    = $application
        ],['school_id'=>$applicationid]);
        // 验证
        if(!$res){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',true);
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

    $list = $TeacherModel->field('users_tel')->where('school_id',$schoolid)->select();

    $res = UserModel::where('users_tel',$list)->select();
//     验证数据
    if(!$res) return returnData('error');
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
     * 输  入 : (string) $student => '学生ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function studentSel($student='')
    {
        $Student = new StudentModel();

        if($Student == ''){
            $list = $Student->select();
        }else{
            $list = $Student->where('student_id',$student)->find();
        }

        if(!$list){
            return returnData('error',false);
        }

        // 返回数据
        return returnData('success',true);
    }
}
