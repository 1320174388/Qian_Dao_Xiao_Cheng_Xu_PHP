<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_curriculumDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 19:52
 *  文件描述 :  个人课程模块数据层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_curriculum_module\working_version\v1\dao;
use app\wx_s_curriculum_module\working_version\v1\model\Wx_s_curriculumModel;

class Wx_s_curriculumDao implements Wx_s_curriculumInterface
{
    /**
     * 名  称 : wx_s_curriculumSelect()
     * 功  能 : 查询我的所有课程数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $get['UserPhone']  => '用户手机号';
     * 输  入 : $get['ListNumber'] => '已获取到的课程数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 20:18
     */
    public function wx_s_curriculumSelect($get)
    {
        // TODO :  Wx_s_curriculumModel 模型
        $res = Wx_s_curriculumModel::field(
            'user_tel,school_name,course_name,course_num'
        )->leftJoin(
            config('v1_tableName.I_Data_School'),
            config('v1_tableName.I_CurriclumLists').'.school_id = '.
            config('v1_tableName.I_Data_School').'.school_id'
        )->leftJoin(
            config('v1_tableName.I_Data_Course'),
            config('v1_tableName.I_CurriclumLists').'.course_id = '.
            config('v1_tableName.I_Data_Course').'.course_id'
        )->where(
            'user_tel',$get['UserPhone']
        )->limit(
            $get['ListNumber'],'12'
        )->select()->toArray();
        // TODO :  返回数据
        return \RSD::wxReponse($res,'M',$res,'请求失败');
    }
}
