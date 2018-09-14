<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Wx_s_teacherService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/13 19:46
 *  文件描述 :  教师模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\wx_s_teacher_module\working_version\v1\service;
use app\wx_s_teacher_module\working_version\v1\dao\Wx_s_teacherDao;
use app\wx_s_teacher_module\working_version\v1\library\Wx_s_teacherLibrary;
use app\wx_s_teacher_module\working_version\v1\validator\Wx_s_teacherValidate;
use app\wx_s_teacher_module\working_version\v1\validator\Wx_s_teacherValidate1;
use app\wx_s_teacher_module\working_version\v1\validator\Wx_s_teacherValidate2;
use app\wx_s_teacher_module\working_version\v1\validator\Wx_s_teacherValidate3;

class Wx_s_teacherService
{
    /**
     * 名  称 : wx_s_teacherAdd()
     * 功  能 : 教师申请接口逻辑
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
    public function wx_s_teacherAdd($post)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_teacherValidate();

        // 验证数据
        if (!$validate->scene('edit')->check($post)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        // 判断文件资源是否上传
        $imageUploads = imageUploads(
            'TeachFile',
            './uploads/w_s_teacher/',
            '/uploads/w_s_teacher/'
        );
        if($imageUploads['msg']=='error'){
            return returnData('error','请发送文件数据');
        }
        $post['TeachFile'] = $imageUploads['data'];

        // 实例化Dao层数据类
        $wx_s_teacherDao = new Wx_s_teacherDao();

        // 执行Dao层逻辑
        $res = $wx_s_teacherDao->wx_s_teacherCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_teacherShow()
     * 功  能 : 获取教师授课及课时接口逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['SchoolID']  => '学校ID';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 15:29
     */
    public function wx_s_teacherShow($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_teacherValidate1();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        if(empty($get['SchoolID'])){
            $get['SchoolID'] = '0';
        }

        // 实例化Dao层数据类
        $wx_s_teacherDao = new Wx_s_teacherDao();

        // 执行Dao层逻辑
        $res = $wx_s_teacherDao->wx_s_teacherSelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : Wx_s_teacherValidate2()
     * 功  能 : 二次获取教师课时逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['SchoolID']  => '学校ID';
     * 输  入 : ( int ) $get['PeriodNum'] => '课时数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 15:29
     */
    public function wx_s_teacherShow2($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_teacherValidate2();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }

        if(empty($get['SchoolID'])){
            $get['SchoolID'] = '0';
        }

        if(empty($get['PeriodNum'])){
            $get['PeriodNum'] = '0';
        }

        // 实例化Dao层数据类
        $wx_s_teacherDao = new Wx_s_teacherDao();

        // 执行Dao层逻辑
        $res = $wx_s_teacherDao->wx_s_teacherSelect2($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

    /**
     * 名  称 : wx_s_teacherShow3()
     * 功  能 : 获取课时签到学生信息
     * 变  量 : --------------------------------------
     * 输  入 : (String)$get['UserPhone'] => '用户手机号';
     * 输  入 : ( int ) $get['PeriodID']  => '课时ID';
     * 输  入 : ( int ) $get['SigeNumb']  => '签到数量';
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/14 15:29
     */
    public function wx_s_teacherShow3($get)
    {
        // 实例化验证器代码
        $validate  = new Wx_s_teacherValidate3();

        // 验证数据
        if (!$validate->scene('edit')->check($get)) {
            return ['msg'=>'error','data'=>$validate->getError()];
        }
        if(empty($get['PeriodID'])){
            $get['PeriodID'] = '0';
        }
        if(empty($get['SigeNumb'])){
            $get['SigeNumb'] = '0';
        }
        // 实例化Dao层数据类
        $wx_s_teacherDao = new Wx_s_teacherDao();

        // 执行Dao层逻辑
        $res = $wx_s_teacherDao->wx_s_teacherSelect3($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }

}
