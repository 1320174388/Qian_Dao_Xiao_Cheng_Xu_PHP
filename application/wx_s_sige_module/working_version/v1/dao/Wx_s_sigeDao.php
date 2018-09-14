<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_sigeDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/14 23:51
 *  文件描述 :  学生签到数据层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_sige_module\working_version\v1\dao;
use app\wx_s_sige_module\working_version\v1\model\Wx_s_sigeModel;
use app\wx_s_sige_module\working_version\v1\model\Wx_s_studyModel;
use app\wx_s_sige_module\working_version\v1\model\Wx_s_SchoolStudyModel;
use app\wx_s_sige_module\working_version\v1\model\Wx_s_periodModel;
use app\wx_s_sige_module\working_version\v1\model\Wx_s_courseModel;
use app\wx_s_sige_module\working_version\v1\model\Wx_s_userCourseModel;

class Wx_s_sigeDao implements Wx_s_sigeInterface
{
    /**
     * 名  称 : wx_s_sigeSelect()
     * 功  能 : 获取签到信息数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['CourseID']  => '课程ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 23:57
     */
    public function wx_s_sigeSelect($get)
    {
        // TODO :  Wx_s_courseModel 模型
        $course_init = Wx_s_courseModel::field(
            'course_id,course_name'
        )->where(
            'course_id',$get['CourseID']
        )->where(
            'course_status',1
        )->find()->toArray();
        if(!$course_init){
            $course_init = '课程已被校方删除';
        }
        // TODO :  Wx_s_courseModel 模型
        $course_num = Wx_s_userCourseModel::field(
            'course_num'
        )->where(
            'user_tel',$get['UserPhone']
        )->where(
            'course_id',$get['CourseID']
        )->find()->toArray();
        // TODO :  处理函数返回值
        return \RSD::wxReponse(true,'M',array_merge(
            $course_init,$course_num
        ),'请求失败');
    }

    /**
     * 名  称 : wx_s_sigeCreate()
     * 功  能 : 学生签到数据处理
     * 变  量 : --------------------------------------
     * 输  入 : (String)$post['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $post['CourseID']  => '课程ID';
     * 输  入 : ( int ) $post['PeriodID']  => '课时ID';
     * 输  入 : (String)$post['StudyStr']  => '学生ID字符串';
     * 输  入 : ( int ) $post['CourseNum'] => '消耗课程数量';
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 00:41
     */
    public function wx_s_sigeCreate($post)
    {
        // TODO :  Wx_s_courseModel 模型
        $course = Wx_s_courseModel::field(
            'course_id,course_name'
        )->where(
            'course_id', $post['CourseID']
        )->where(
            'course_status', 1
        )->find()->toArray();
        if (!$course) {
            return returnData('error', '签到失败,课程已被校方删除');
        }
        // TODO :  Wx_s_courseModel 模型
        $course_num = Wx_s_userCourseModel::field(
            'course_num'
        )->where(
            'user_tel', $post['UserPhone']
        )->where(
            'course_id', $post['CourseID']
        )->find();
        if (!$course_num) {
            return returnData('error', '请联系校方购买课程');
        }
        // TODO :  拆分数组
        $post['StudyArr'] = explode(',',$post['StudyStr']);
        // TODO :  计算课程
        $num = math_mul(count($post['StudyArr']),$post['CourseNum'],0);
        // TODO :  判断数据
        if($num>$course_num['course_num']){
            return returnData('error', '对不起，您的课程不足了');
        }
        // TODO :  启动事务
        \think\Db::startTrans();
        try {

            // TODO :  修改课程数量
            $course_num->course_num = math_sub($course_num['course_num'],$num,0);
            // TODO :  写入修改
            $course_num->save();

            // TODO : 获取课时信息
            $period = Wx_s_periodModel::get($post['PeriodID']);
            // TODO :  写入学生签到数据,及学校学生表中
            foreach($post['StudyArr'] as $k=>$v){
                $this->createSign(
                    $v,
                    $post['PeriodID'],
                    $period['school_id']
                );
                $this->createStudy(
                    $v,$period['school_id']
                );
            }
            // TODO :  提交事务
            \think\Db::commit();
            return returnData('success','签到成功');
        } catch (\Exception $e) {
            // TODO :  回滚事务
            \think\Db::rollback();
            return returnData('error','签到失败');
        }
    }

    /**
     * 写入学生签到数据函数
     */
    private function createSign($studyId,$periodId,$schoolId){
        // TODO :  Wx_s_sigeModel 模型
        $sigeModel = new Wx_s_sigeModel();
        // 处理数据
        $sigeModel->school_id  = $schoolId;
        $sigeModel->period_id  = $periodId;
        $sigeModel->student_id = $studyId;
        $sigeModel->sign_time  = time();
        // 保存数据
        return  $sigeModel->save();
    }

    /**
     * 写入学生入学表中
     */
    private function createStudy($studyId,$schoolId){
        $res = Wx_s_SchoolStudyModel::where(
            'school_id',$schoolId
        )->where(
            'student_id',$studyId
        )->find();
        if($res){
            return true;
        }
        // TODO :  Wx_s_SchoolStudyModel 模型
        $SchoolStudyModel = new Wx_s_SchoolStudyModel();
        // 处理数据
        $SchoolStudyModel->school_id  = $schoolId;
        $SchoolStudyModel->student_id = $studyId;
        // 保存数据
        return  $SchoolStudyModel->save();
    }
}
