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
     * 输  入 : (string) $teacherid => '学校ID';
     * 输  出 : [ 'msg'=>'success' , 'data'=>true ]
     * 创  建 : 2018/09/12 10:03
     */
    public function studentSel($school)
    {
        // ApplicationDao
        $res=(new ApplicationDao)->studentSel($school);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }


    /**
     * 名  称 : modifySel()
     * 功  能 : 修改用户课程
     * 变  量 : --------------------------------------
     * 输  入 : (string) $teacherid => '用户手机号';
     * 输  入 : (string) $teacherid => '学校主键';
     * 输  入 : (string) $teacherid => '课程名称';
     * 输  入 : (string) $teacherid => '课程数量';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/12 10:03
     */
    public function modifySel($tel,$school,$course,$num)
    {
        // ApplicationDao
        $res=(new ApplicationDao)->modifySel($tel,$school,$course,$num);
        if($res['msg']=='error') return returnData('error','修改失败');
        // 返回数据
        return returnData('success',true);

    }

    /**
     * 名  称 : modifyAdd()
     * 功  能 : 添加用户课程
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
        // ApplicationDao
        $res=(new ApplicationDao)->modifyAdd($tel,$school,$course,$num);
        if($res['msg']=='error') return returnData('error','添加失败');
        // 返回数据
        return returnData('success',true);

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
        // ApplicationDao
        $res=(new ApplicationDao)->userSel($userstel);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

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
        // ApplicationDao
        $res=(new ApplicationDao)->signSel($school);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }
}
