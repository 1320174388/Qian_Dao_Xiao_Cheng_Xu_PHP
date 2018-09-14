<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  school_module_v1_route.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/09/12 09:50
 *  文件描述 :  签到小程序学校端模块路由文件
 *  历史记录 :  -----------------------
 */
/**
 * 传值方式 : POST
 * 路由功能 : 用户实名认证
 */
Route::post(
    ':v/realname_module/realname_route',
    'realname_module/:v.controller.RealnameController/realnamePost'
);
