<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  wx_s_curriculum_routr_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/09/12 19:54
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */

// ------ 个人课程模块路由 ------

/**
 * 传值方式 : GET
 * 路由功能 : 查询我的所有课程
 */
Route::get(
    ':v/wx_s_curriculum_module/wx_s_curriculum_route',
    'wx_s_curriculum_module/:v.controller.Wx_s_curriculumController/wx_s_curriculumGet'
);
