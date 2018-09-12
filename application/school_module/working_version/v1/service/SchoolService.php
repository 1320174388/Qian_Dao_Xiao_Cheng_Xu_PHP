<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SchoolService.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/12 09:50
 *  文件描述 :  签到小程序学校端模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\school_module\working_version\v1\service;
use app\school_module\working_version\v1\dao\SchoolDao;
use app\school_module\working_version\v1\validator\SchoolDataValidator;
class SchoolService
{
    /**
     * 名  称 : schoolAdd()
     * 功  能 : 学校申请接口逻辑
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
    public function schoolAdd($post)
    {
        //验证数据
        $validator = new SchoolDataValidator();
        //返回错误提示
        if (!$validator->check($post)) {
            return returnData('error',$validator->getError());
        }
        // 实例化Dao层数据类
        $schoolDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $schoolDao->schoolCreate($post);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : teacherApplyShow()
     * 功  能 : 获取教师申请列表逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $school_id        =>  学校主键  【必填】
     * 输  入 : (string) $teacher_state    =>  申请状态  【必填】
     * 输  出 : ['msg'=>'success','data'=>'返回数据']
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherApplyShow($get)
    {
        //验证数据
        $validate = new \think\Validate([
            'school_id'         => 'require',
            'teacher_state'     => 'require'
        ],[
            'school_id'         => '缺少school_id参数',
            'teacher_state'     => '缺少teacher_state参数'
        ]);
        if (!$validate->check($get)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $teacherApplyDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $teacherApplyDao->teacherApplySelect($get);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
    /**
     * 名  称 : teacherStatePut()
     * 功  能 : 更改教师申请状态
     * 变  量 : --------------------------------------
     * 输  入 : (int)    $teacher_id        =>  教师主键  【必填】
     * 输  入 : (int)    $teacher_state    =>  申请状态  【必填】
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"请求数据"}
     * 创  建 : 2018/09/12 17:22
     */
    public function teacherStateEdit($put)
    {
        //验证数据
        $validate = new \think\Validate([
            'teacher_id'        => 'require',
            'teacher_state'     => 'require'
        ],[
            'teacher_id'         => '缺少teacher_id参数',
            'teacher_state'     => '缺少teacher_state参数'
        ]);
        if (!$validate->check($put)) {
            return returnData('error',$validate->getError());
        }
        // 实例化Dao层数据类
        $teacherApplyDao = new SchoolDao();

        // 执行Dao层逻辑
        $res = $teacherApplyDao->teacherStateUpdate($put);

        // 处理函数返回值
        return \RSD::wxReponse($res,'D');

    }
}
