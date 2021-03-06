<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RealnameService.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/15 00:00
 *  文件描述 :  实名认证模块逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\realname_module\working_version\v1\service;
use app\realname_module\working_version\v1\dao\RealnameDao;
use app\realname_module\working_version\v1\library\RealnameLibrary;

class RealnameService
{
    /**
     * 名  称 : realnameAdd()
     * 功  能 : 用户实名认证逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (string)    $users_tel        =>  用户手机号  【必填】
     * 输  入 : (string)    $idcard        =>  身份证号  【必填】
     * 输  入 : (string)    $realname       =>  真实姓名  【必填】
     * 输  出 : ['msg'=>'success','data'=>'提示信息']
     * 创  建 : 2018/09/15 00:06
     */
    public function realnameAdd($post)
    {
        //验证数据
        $validate = new \think\Validate([
            'users_tel'    => 'require',
            'idcard'       => 'require',
            'realname'     => 'require'
        ],[
            'users_tel.require'    => '缺少users_tel参数',
            'idcard.require'       => '缺少idcard参数',
            'realname.require'     => '缺少realname参数'
        ]);
        if (!$validate->check($post)) {
            return returnData('error',$validate->getError());
        }

        //处理实名认证数据
        $realname = new RealnameLibrary();

       $params = [
           'idcard'     => $post['idcard'],
           'realname'   => $post['realname'],
           'key'        => config('v1_config.key')
       ];

        $paramstring = http_build_query($params);
        $content = $realname->juhecurl(config('v1_config.nameApiUrl'),$paramstring);
        $result = json_decode($content,true);
        //返回数据错误
        if($result){
            if($result['error_code']=='0'){
                if($result['result']['res'] == '1'){
                    // 实例化Dao层数据类
                    $realnameDao = new RealnameDao();
                    // 执行Dao层逻辑
                    $res = $realnameDao->realnameCreate($post);
                    // 处理函数返回值
                    return \RSD::wxReponse($res,'D');
                }else{
                    return returnData('error','身份证号码和真实姓名不一致');
                }
            }else{
                return returnData('error',$result['error_code'].":".$result['reason']);
            }
        }else{
          return returnData('error','请求失败');
        }
    }
    /**
     * 名  称 : realnameShow()
     * 功  能 : 查询实名制状态
     * 变  量 : --------------------------------------
     * 输  入 : (string)    $users_tel        =>  用户手机号  【必填】
     * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":true}
     * 创  建 : 2018/09/15 00:06
     */
    public function realnameShow($get)
    {
        //验证数据
        $validate = new \think\Validate([
            'users_tel'    => 'require',
        ],[
            'users_tel.require'    => '缺少users_tel参数',
        ]);
        if (!$validate->check($get)) {
            return returnData('error',$validate->getError());
        }

        // 实例化Dao层数据类
        $realnameDao = new RealnameDao();
        // 执行Dao层逻辑
        $res = $realnameDao->realnameSelect($get);
        // 处理函数返回值
        return \RSD::wxReponse($res,'D');
    }
}
