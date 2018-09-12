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
use app\school_module\working_version\v1\model\SchoolModel;
use app\school_module\working_version\v1\model\UsersModel;
use app\school_module\working_version\v1\model\TeacherModel;
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
        return \RSD::wxReponse($res,'M',$res,'更新失败');
    }

}
