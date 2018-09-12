<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplicationService.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/12 09:17
 *  文件描述 :  学校申请列表逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\application_module\working_version\v1\service;
use app\application_module\working_version\v1\dao\ApplicationDao;

class ApplicationService
{
    /**
     * 名  称 : applicationSel()
     * 功  能 : 学校申请列表查询
     * 输  入 : (string) $application => '状态';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationSel($application='')
    {
        // ApplicationDao
        $res=(new ApplicationDao)->applicationSel($application);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }

    /**
     * 名  称 : applicationUpd()
     * 功  能 : 更改学校申请状态
     * 输  入 : (string) $application => '状态';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function applicationUpd($applicationid,$application)
    {
        // ApplicationDao
        $res=(new ApplicationDao)->applicationUpd($applicationid,$application);
        if($res['msg']=='error') return returnData('error','修改失败');
        // 返回数据
        return returnData('success',true);

    }

    /**
     * 名  称 : tecacherSel()
     * 功  能 : 教师列表
     * 输  入 : (string) $schoolid => '学校ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function tecacherSel($schoolid)
    {
        // ApplicationDao
        $res=(new ApplicationDao)->tecacherSel($schoolid);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }


    /**
     * 名  称 : tecacherSelect()
     * 功  能 : 教师列表
     * 输  入 : (string) $teacherid => '教师ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function tecacherSelect($teacherid)
    {
        // ApplicationDao
        $res=(new ApplicationDao)->tecacherSelect($teacherid);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }

    /**
     * 名  称 : studentSel()
     * 功  能 : 学生列表
     * 输  入 : (string) $teacherid => '学生ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function studentSel($student='')
    {
        // ApplicationDao
        $res=(new ApplicationDao)->studentSel($student);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }
}
