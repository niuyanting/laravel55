<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //echo "hello Laravel";exit;
    return view('welcome');
});
//抽奖页面
Route::get('lottery/index','lottery\LotteryController@index')->name('lottery.index');
//执行抽奖
Route::any('lottery/do','lottery\LotteryController@doLottery')->name('lottery.do');

Route::any('article/detail/{id}',function($id){
   return $id;
})->name('article_detail');


Route::get('/index',function(){
    //生成URL地址
    $url = route('article_detail',['id'=>1]);
    //echo $url;exit;
    return redirect()->route('article_detail');
});
//管理后台的路由分组
Route::prefix('admin')->group(function(){
    Route::get('login',function(){
        return '登录成功';
    })->middleware('admin_auth');
});
//测试一个路由组
Route::middleware('check_age')->group(function(){
   Route::get('young',function(){
      return "I'm young";
   });
});

Route::get('student/index','StudentController@index');

//抢红包路由配置
Route::prefix('study')->group(function(){
    //Route::any('sign','SignController@index');
    //红包首页路由
    Route::get('bonus/index','Study\BonusController@index');
    //红包添加路由
    Route::post('bonus/add','Study\BonusController@addBonus');
    //红包列表
    Route::get('bonus/list','Study\BonusController@getList');
    Route::get('bonus/record/list','Study\BonusController@getBonusRecord');
    Route::any('get/bonus', 'Study\BonusController@getBonus'); //获取红包的路由

});

//登录页面
Route::get('admin/login','Admin\LoginController@index');
//执行登录
Route::post('admin/doLogin','Admin\LoginController@doLogin');
//用户退出
Route::get('admin/logout','Admin\LoginController@logout');
Route::get('403',function(){
   return view('403');
});
//管理后台RBAC路由组
Route::middleware(['permission_auth','admin_auth'])->prefix('admin')->group(function() {
    //管理后台首页
    Route::get('home', 'Admin\HomeController@home')->name('admin.home');

    /*##########权限相关##########*/
    //权限列表
    Route::get('/permission/lists', 'Admin\PermissionController@lists')->name('admin.permission.lists');
    //获取权限的数据
    Route::any('/get/permission/lists/{fid?}', 'Admin\PermissionController@getPermissionLists')->name('admin.get.permission.lists');
    //权限添加
    Route::get('/permission/create', 'Admin\PermissionController@create')->name('admin.permission.create');
    //执行权限添加
    Route::post('/permission/doCreate','Admin\PermissionController@doCreate')->name('admin.permission.doCreate');
    //删除权限的操作
    Route::get('/permission/del/{id}','Admin\PermissionController@del')->name('admin.permission.del');

    /*##########用户相关##########*/
    Route::get('/user/add','Admin\AdminUserController@create')->name('admin.user.add');
    //执行用户添加
    Route::post('/user/store','Admin\AdminUserController@store')->name('admin.user.store');
    //用户列表页面
    Route::get('/user/lists','Admin\AdminUserController@lists')->name('admin.user.lists');
    //用户删除操作
    Route::get('/user/del/{id}','Admin\AdminUserController@delUser')->name('admin.user.del');
    //用户编辑页面
    Route::get('/user/edit/{id}','Admin\AdminUserController@edit')->name('admin.user.edit');
    //用户执行编辑页面
    Route::post('/user/doEdit','Admin\AdminUserController@doEdit')->name('admin.user.doEdit');
    /*##########角色相关##########*/
    //角色列表
    Route::get('/role/lists','Admin\RoleController@lists')->name('admin.role.lists');
    //角色删除
    Route::get('/role/del/{id}','Admin\RoleController@delRole')->name('admin.role.del');
    //角色添加
    Route::get('/role/create','Admin\RoleController@create')->name('admin.role.create');
    //角色执行添加
    Route::post('/role/store','Admin\RoleController@store')->name('admin.role.store');
    //角色编辑
    Route::get('/role/edit/{id}','Admin\RoleController@edit')->name('admin.role.edit');
    //角色执行编辑
    Route::any('/role/doEdit','Admin\RoleController@doEdit')->name('admin.role.doEdit');
    //角色权限编辑
    Route::get('/role/permission/{id}','Admin\RoleController@rolePermission')->name('admin.role.permission');
    //角色权限执行编辑
    Route::any('/role/permission/save','Admin\RoleController@saveRolePermission')->name('admin.role.permission.save');

    /*##############小说相关#################*/
    //作者列表
    Route::get('author/list','Admin\AuthorController@list')->name('admin.author.list');
    //作者添加
    Route::get('author/create','Admin\AuthorController@create')->name('admin.author.create');
    //作者执行添加
    Route::post('author/store','Admin\AuthorController@store')->name('admin.author.store');
    //作者执行删除
    Route::get('author/del/{id}','Admin\AuthorController@del')->name('admin.author.del');

    //分类列表
    Route::get('category/list','Admin\CategoryController@list')->name('admin.category.list');
    //分类添加
    Route::get('category/create','Admin\CategoryController@create')->name('admin.category.create');
    //分类执行添加
    Route::post('category/store','Admin\CategoryController@store')->name('admin.category.store');
    //分类删除
    Route::get('category/del/{id}','Admin\CategoryController@del')->name('admin.category.del');

    //小说添加
    Route::get('novel/create','Admin\NovelController@create')->name('admin.novel.create');
    //小说执行添加
    Route::post('novel/store','Admin\NovelController@store')->name('admin.novel.store');
    //小说列表
    Route::get('novel/list','Admin\NovelController@list')->name('admin.novel.list');
    //小说编辑
    Route::get('nove/edit/{id}','Admin\NovelController@edit')->name('admin.novel.edit');
    //执行小说编辑
    Route::post('nove/doEdit','Admin\NovelController@doEdit')->name('admin.novel.doEdit');
    //小说的删除
    Route::get('novel/del/{id}','Admin\NovelController@del')->name('admin.novel.del');

    //添加小说章节页面
    Route::get('chapter/add/{novel_id}','Admin\ChapterController@create')->name('admin.chapter.create');
    //保存小说的章节
    Route::post('chapter/store','Admin\ChapterController@store')->name('admin.chapter.store');
    //小说章节列表
    Route::get('chapter/list/{novel_id?}','Admin\ChapterController@list')->name('admin.chapter.list');
    //章节删除
    Route::get('chapter/del/{id}','Admin\ChapterController@del')->name('admin.chapter.del');
    //章节编辑
    Route::get('chapter/edit/{id}','Admin\ChapterController@edit')->name('admin.chapter.edit');
    //执行章节编辑
    Route::post('chapter/doEdit','Admin\ChapterController@doEdit')->name('admin.chapter.doEdit');


    //小说评论列表页面
    Route::get('novel/comment/list','Admin\CommentController@list')->name('admin.novel.comment.list');
    //小说数据
    Route::get('novel/comment/data','Admin\CommentController@getComment')->name('admin.novel.comment.data');
    //小说评论审核
    Route::get('novel/comment/check/{id}','Admin\CommentController@check')->name('admin.novel.comment.check');

    //小说评论删除
    Route::get('novel/comment/del/{id}','Admin\CommentController@del')->name('admin.novel.comment.del');

    /*########################[商品品牌相关]########################*/
    //品牌列表页面
    Route::get('brand/list','Admin\BrandController@list')->name('admin.brand.list');
    //品牌列表数据
    Route::any('brand/data/list','Admin\BrandController@getListData')->name('admin.brand.data.list');
    //品牌添加页面
    Route::get('brand/add','Admin\BrandController@add')->name('admin.brand.add');
    //执行商品品牌添加
    Route::post('brand/doAdd','Admin\BrandController@doAdd')->name('admin.brand.doAdd');
    //执行删除的操作
    Route::get('brand/del/{id}','Admin\BrandController@del')->name('admin.brand.del');
    //品牌编辑页面
    Route::any('brand/edit/{id}','Admin\BrandController@edit')->name('admin.brand.edit');
    //执行商品品牌编辑
    Route::post('brand/doEdit','Admin\BrandController@doEdit')->name('admin.brand.doEdit');
    //修改品牌的属性值
    Route::post('brand/change/attr','Admin\BrandController@changeAttr')->name('admin.brand.change.attr');

});