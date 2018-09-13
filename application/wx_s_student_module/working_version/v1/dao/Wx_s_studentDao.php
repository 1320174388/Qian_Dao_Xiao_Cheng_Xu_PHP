<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_studentDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 10:37
 *  文件描述 :  学生管理数据层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_student_module\working_version\v1\dao;
use app\wx_s_student_module\working_version\v1\model\Wx_s_studentModel;

class Wx_s_studentDao implements Wx_s_studentInterface
{
    /**
     * 名  称 : wx_s_studentCreate()
     * 功  能 : 添加学生数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $post['UserPhone']  => '用户手机号';
     * 输  入 : $post['StudyName']  => '学生姓名';
     * 输  入 : $post['StudySex']   => '学生性别';
     * 输  入 : $post['StudyAge']   => '学生年龄';
     * 输  入 : $post['StudyNexu']  => '学生关系';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 10:42
     */
    public function wx_s_studentCreate($post)
    {
        // TODO :  获取数据
        $D = Wx_s_studentModel::where(
            'users_tel',$post['UserPhone']
        )->where(
            'student_name',$post['StudyName']
        )->select()->toArray();
        // TODO :  判断数据
        if($D){
            return returnData('error','学生已存在');
        }
        // TODO :  Wx_s_studentModel 模型
        $Wx_s_studentModel = new Wx_s_studentModel();
        // TODO :  处理数据
        $Wx_s_studentModel->users_tel     = $post['UserPhone'];
        $Wx_s_studentModel->student_name  = $post['StudyName'];
        $Wx_s_studentModel->student_sex   = $post['StudySex'];
        $Wx_s_studentModel->student_age   = $post['StudyAge'];
        $Wx_s_studentModel->student_nexus = $post['StudyNexu'];
        // TODO :  保存数据
        $res = $Wx_s_studentModel->save();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','添加成功','添加失败');
    }

    /**
     * 名  称 : wx_s_studentSelect()
     * 功  能 : 获取用户个人添加学生信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/13 17:37
     */
    public function wx_s_studentSelect($get)
    {
        // TODO :  Wx_s_studentModel 模型
        $res = Wx_s_studentModel::where(
            'users_tel',$get['UserPhone']
        )->select()->toArray();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M',$res,'请求失败');
    }

    /**
     * 名  称 : wx_s_studentUpdate()
     * 功  能 : 修改用户个人添加学生信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $put['UserPhone']  => '用户手机号';
     * 输  入 : $put['StudyId']    => '学生ID';
     * 输  入 : $put['StudyName']  => '学生姓名';
     * 输  入 : $put['StudySex']   => '学生性别';
     * 输  入 : $put['StudyAge']   => '学生年龄';
     * 输  入 : $put['StudyNexu']  => '学生关系';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:44
     */
    public function wx_s_studentUpdate($put)
    {
        // TODO :  获取数据
        $study = Wx_s_studentModel::where(
            'users_tel',$put['UserPhone']
        )->where(
            'student_id',$put['StudyId']
        )->find();
        // TODO :  判断数据
        if(!$study){
            return returnData('error','学生不存在');
        }

        // TODO :  获取数据
        $D = Wx_s_studentModel::where(
            'users_tel',$put['UserPhone']
        )->where(
            'student_name',$put['StudyName']
        )->find();
        // TODO :  判断数据
        if(($D)&&($D['student_id']!=$put['StudyId'])){
            return returnData('error','学生已存在');
        }

        // TODO :  Wx_s_studentModel 模型
        $study->student_name  = $put['StudyName'];
        $study->student_sex   = $put['StudySex'];
        $study->student_age   = $put['StudyAge'];
        $study->student_nexus = $put['StudyNexu'];
        // TODO :  保存数据
        $res = $study->save();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','修改成功','修改失败');
    }

    /**
     * 名  称 : wx_s_studentDelete()
     * 功  能 : 删除用户个人添加学生信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $delete['UserPhone']  => '用户手机号';
     * 输  入 : $delete['StudyId']    => '学生ID';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/13 17:56
     */
    public function wx_s_studentDelete($delete)
    {
        // TODO :  获取数据
        $study = Wx_s_studentModel::where(
            'users_tel',$delete['UserPhone']
        )->where(
            'student_id',$delete['StudyId']
        )->find();
        // TODO :  判断数据
        if(!$study){
            return returnData('error','学生不存在');
        }
        // TODO :  删除数据
        $res = $study->delete();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M','删除成功','删除失败');
    }
}
