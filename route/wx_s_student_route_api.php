<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  wx_s_student_route_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 11:44
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */

// ------ 学生管理接口 ------

/**
 * 传值方式 : POST
 * 路由功能 : 添加学生
 */
Route::post(
    ':v/wx_s_student_module/wx_s_student_route',
    'wx_s_student_module/:v.controller.Wx_s_studentController/wx_s_studentPost'
);

/**
 * 传值方式 : GET
 * 路由功能 : 获取用户个人添加学生信息
 */
Route::get(
    ':v/wx_s_student_module/wx_s_student_route',
    'wx_s_student_module/:v.controller.Wx_s_studentController/wx_s_studentGet'
);

/**
 * 传值方式 : PUT
 * 路由功能 : 修改用户个人添加学生信息
 */
Route::put(
    ':v/wx_s_student_module/wx_s_student_route',
    'wx_s_student_module/:v.controller.Wx_s_studentController/wx_s_studentPut'
);

/**
 * 传值方式 : DELETE
 * 路由功能 : 删除用户个人添加学生信息
 */
Route::delete(
    ':v/wx_s_student_module/wx_s_student_route',
    'wx_s_student_module/:v.controller.Wx_s_studentController/wx_s_studentDelete'
);
