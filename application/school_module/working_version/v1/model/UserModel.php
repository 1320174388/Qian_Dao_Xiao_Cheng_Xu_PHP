<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  UsersModel.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/12 09:50
 *  文件描述 :  用户数据模型层
 *  历史记录 :  -----------------------
 */
namespace app\school_module\working_version\v1\model;
use think\Model;

class UserModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '';

    // 设置当前模型对应数据表的主键
    protected $pk = 'user_id';

    // 加载配置数据表名
    protected function initialize()
    {
        $this->table = config('v1_tableName.userTable');
    }
}