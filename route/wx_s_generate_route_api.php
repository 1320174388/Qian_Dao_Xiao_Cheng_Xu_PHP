<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  wx_s_generate_route_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:44
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */

// ------ 小程序码生成路由 ------

/**
 * 传值方式 : POST
 * 路由功能 : 生成小程序码
 */
Route::post(
    ':v/wx_s_generate_module/wx_s_generate_route',
    'wx_s_generate_module/:v.controller.Wx_s_generateController/wx_s_generatePost'
);