<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  wx_s_school_route_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:44
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */

// ------ 教师端学校接口 ------

/**
 * 传值方式 : GET
 * 路由功能 : 获取教师申请学校信息
 */
Route::get(
    ':v/wx_s_school_module/wx_s_school_route',
    'wx_s_school_module/:v.controller.Wx_s_schoolController/wx_s_schoolGet'
);