<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  wx_s_sige_route_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:44
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */

// ------ 学生签到接口 ------

/**
 * 传值方式 : GET
 * 路由功能 : 获取签到信息
 */
Route::get(
    ':v/wx_s_sige_module/wx_s_sige_route',
    'wx_s_sige_module/:v.controller.Wx_s_sigeController/wx_s_sigeGet'
);

/**
 * 传值方式 : POST
 * 路由功能 : 学生签到
 */
Route::post(
    ':v/wx_s_sige_module/wx_s_sige_route',
    'wx_s_sige_module/:v.controller.Wx_s_sigeController/wx_s_sigePost'
);