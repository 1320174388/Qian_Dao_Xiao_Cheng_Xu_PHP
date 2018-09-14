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
 * 路由功能 : 修改教师申请状态
 */
Route::put(
    ':v/school_module/teacherState_route',
    'school_module/:v.controller.SchoolController/teacherStatePut'
);
/**
 * 传值方式 : POST
 * 路由功能 : 学校端添加课程
 */
Route::post(
    ':v/school_module/schoolCourse_route',
    'school_module/:v.controller.SchoolController/schoolCoursePost'
);
/**
 * 传值方式 : PUT
 * 路由功能 : 修改学校端课程
 */
Route::put(
    ':v/school_module/course_route',
    'school_module/:v.controller.SchoolController/schoolCoursePut'
);
/**
 * 传值方式 : DELETE
 * 路由功能 : 删除学校课程
 */
Route::delete(
    ':v/school_module/schoolCourse_route',
    'school_module/:v.controller.SchoolController/schoolCourseDelete'
);
/**
 * 传值方式 : GET
 * 路由功能 : 获取学校课程
 */
Route::get(
    ':v/school_module/schoolCourse_route',
    'school_module/:v.controller.SchoolController/schoolCourseGet'
);
/**
 * 传值方式 : GET
 * 路由功能 : 获取学校学生信息
 */
Route::get(
    ':v/school_module/schoolStudent_route',
    'school_module/:v.controller.SchoolController/schoolStudentGet'
);
/**
 * 传值方式 : POST
 * 路由功能 : 添加课程课时
 */
Route::post(
    ':v/school_module/period_route',
    'school_module/:v.controller.SchoolController/periodPost'
);
/**
 * 传值方式 : PUT
 * 路由功能 : 修改课程课时
 */
Route::put(
    ':v/school_module/period_route',
    'school_module/:v.controller.SchoolController/periodPut'
);
/**
 * 传值方式 : DELETE
 * 路由功能 : 删除课程课时
 */
Route::delete(
    ':v/school_module/period_route',
    'school_module/:v.controller.SchoolController/periodDelete'
);
/**
 * 传值方式 : GET
 * 路由功能 : 获取学校课程课时
 */
Route::GET(
    ':v/school_module/period_route',
    'school_module/:v.controller.SchoolController/periodGet'
);






