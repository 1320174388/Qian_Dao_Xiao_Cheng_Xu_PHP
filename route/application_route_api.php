<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  application_route_api
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/12 10:49
 *  文件描述 :  路由文件
 *  历史记录 :  -----------------------
 */

/**
 * 路由名称: application_post
 * 传值方式: POST
 * 路由功能: 学校申请列表接口
 */
Route::post(
    'v1/application_module/application_Sel',
    'application_module/v1.controller.ApplicationController/applicationSel'
);

/**
 * 路由名称: application_Upd
 * 传值方式: POST
 * 路由功能: 更改学校申请状态接口
 */
Route::post(
    'v1/application_module/application_Upd',
    'application_module/v1.controller.ApplicationController/applicationUpd'
);

/**
 * 路由名称: tecacher_Sel
 * 传值方式: POST
 * 路由功能: 教师列表接口
 */
Route::post(
    'v1/application_module/tecacher_Sel',
    'application_module/v1.controller.ApplicationController/tecacherSel'
);

/**
 * 路由名称: tecacherSelected
 * 传值方式: POST
 * 路由功能: 教师详情接口
 */
Route::post(
    'v1/application_module/tecacherSelected',
    'application_module/v1.controller.ApplicationController/tecacherSelected'
);

/**
 * 路由名称: studentSel
 * 传值方式: POST
 * 路由功能: 学生列表
 */
Route::post(
    'v1/application_module/studentSel',
    'application_module/v1.controller.ApplicationController/studentSel'
);

/**
 * 路由名称: modifySel
 * 传值方式: POST
 * 路由功能: 修改用户课程
 */
Route::post(
    'v1/application_module/modifySel',
    'application_module/v1.controller.ApplicationController/modifySel'
);