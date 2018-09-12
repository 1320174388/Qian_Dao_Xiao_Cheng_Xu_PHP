<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  wx_s_login_route_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:44
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */

// ------ 用户接口 ------

/**
 * 传值方式 : POST
 * 路由功能 : 用户注册
 */
Route::post(
    ':v/wx_s_login_module/wx_s_login_route',
    'wx_s_login_module/:v.controller.Wx_s_loginController/wx_s_loginPost'
);

/**
 * 传值方式 : GET
 * 路由功能 : 发送验证码
 */
Route::get(
    ':v/wx_s_login_module/login_code_route',
    'wx_s_login_module/:v.controller.Wx_s_loginController/login_codeGet'
);

/**
 * 传值方式 : POST
 * 路由功能 : 验证用户验证码
 */
Route::POST(
    ':v/wx_s_login_module/login_code_route',
    'wx_s_login_module/:v.controller.Wx_s_loginController/login_codePost'
);

/**
 * 传值方式 : GET
 * 路由功能 : 用户登录
 */
Route::get(
    ':v/wx_s_login_module/wx_s_login_route',
    'wx_s_login_module/:v.controller.Wx_s_loginController/wx_s_loginGet'
);

/**
 * 传值方式 : PUT
 * 路由功能 : 修改账号密码
 */
Route::put(
    ':v/wx_s_login_module/wx_s_login_route',
    'wx_s_login_module/:v.controller.Wx_s_loginController/wx_s_loginPut'
);

/**
 * 传值方式 : GET
 * 路由功能 : 判断用户登录Key是否失效
 */
Route::get(
    ':v/wx_s_login_module/wx_user_key_route',
    'wx_s_login_module/:v.controller.Wx_s_loginController/wx_user_keyGet'
);