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
 * 路由功能 : 学校申请接口
 */
Route::post(
    ':v/school_module/school_route',
    'school_module/:v.controller.SchoolController/schoolPost'
);
/**
 * 传值方式 : GET
 * 路由功能 : 获取教师申请列表
 */
Route::get(
    ':v/school_module/teacherApply_route',
    'school_module/:v.controller.SchoolController/teacherApplyGet'
);
/**
 * 传值方式 : PUT
 * 路由功能 : 获取教师申请列表
 */
Route::put(
    ':v/school_module/teacherState_route',
    'school_module/:v.controller.SchoolController/teacherStatePut'
);

