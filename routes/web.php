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
    return view('welcome');
});
Route::get('/','pagescontroller@index')->name('index');
Route::get('/about','pagescontroller@about')->name('about');
Route::get('/services','pagescontroller@services')->name('services');
Route::get('/portfolio','pagescontroller@portfolio')->name('portfolio');
Route::get('/blog','pagescontroller@blog')->name('blog');
Route::get('/contact','pagescontroller@contact')->name('contact');
Route::post('/send','pagescontroller@send')->name('send');
Route::get('/single_post/{id}','pagescontroller@single_post')->name('single_post');
Route::get('/search','pagescontroller@search')->name('search');
Route::get('/blog/category/{name}','pagescontroller@category')->name('category');
Route::get('/blog/tag/{name}','pagescontroller@tag')->name('tag');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog_categories', 'CategoryController@blog_categories')->name('admin.blog_categories');
Route::post('/add_category', 'CategoryController@add_category')->name('add_category');
Route::post('/update_category', 'CategoryController@update_category')->name('update_category');
Route::get('/delete_category/{id}', 'CategoryController@delete_category')->name('delete_category');
Route::get('/blog_tags', 'TagController@blog_tags')->name('admin.blog_tags');
Route::post('/add_tag', 'TagController@add_tag')->name('add_tag');
Route::post('/update_tag', 'TagController@update_tag')->name('update_tag');
Route::get('/delete_tag/{id}', 'TagController@delete_tag')->name('delete_tag');
Route::get('/blogs', 'BlogController@blogs')->name('admin.blogs');
Route::get('/skills', 'SkillController@skills')->name('admin.skills');
Route::post('/add_skill', 'SkillController@add_skill')->name('add_skill');
Route::post('/update_skill', 'SkillController@update_skill')->name('update_skill');
Route::get('/delete_skill/{id}', 'SkillController@delete_skill')->name('delete_skill');

Route::get('/admin_services', 'ServiceController@services')->name('admin.services');
Route::post('/add_service', 'ServiceController@add_service')->name('add_service');
Route::post('/update_service', 'ServiceController@update_service')->name('update_service');
Route::get('/delete_service/{id}', 'ServiceController@delete_service')->name('delete_service');

Route::get('/features', 'FeatureController@features')->name('admin.features');
Route::post('/add_feature', 'FeatureController@add_feature')->name('add_feature');
Route::post('/update_feature', 'FeatureController@update_feature')->name('update_feature');
Route::get('/delete_feature/{id}', 'FeatureController@delete_feature')->name('delete_feature');

Route::get('/footer', 'FooterController@footer')->name('admin.footer');
Route::post('/add_footer', 'FooterController@add_footer')->name('add_footer');
Route::post('/update_footer', 'FooterController@update_footer')->name('update_footer');
Route::get('/delete_footer/{id}', 'FooterController@delete_footer')->name('delete_footer');

Route::get('/project_type', 'ProjectTypeController@project_type')->name('admin.project_type');
Route::post('/add_project_type', 'ProjectTypeController@add_project_type')->name('add_project_type');
Route::post('/update_project_type', 'ProjectTypeController@update_project_type')->name('update_project_type');
Route::get('/delete_project_type/{id}', 'ProjectTypeController@delete_project_type')->name('delete_project_type');

Route::get('/partner', 'PartnerController@partner')->name('admin.partner');
Route::post('/add_partner', 'PartnerController@add_partner')->name('add_partner');
Route::post('/update_partner', 'PartnerController@update_partner')->name('update_partner');
Route::get('/delete_partner/{id}', 'PartnerController@delete_partner')->name('delete_partner');

Route::get('/team', 'TeamController@team')->name('admin.team');
Route::post('/add_team', 'TeamController@add_team')->name('add_team');
Route::post('/update_team', 'TeamController@update_team')->name('update_team');
Route::get('/delete_team/{id}', 'TeamController@delete_team')->name('delete_team');

Route::get('/siteinfos', 'SiteinfoController@siteinfo')->name('admin.siteinfo');
Route::post('/update_siteinfo', 'SiteinfoController@update_siteinfo')->name('update_siteinfo');
Route::get('/delete_siteinfo/{id}', 'SiteinfoController@delete_siteinfo')->name('delete_siteinfo');

Route::get('/project', 'ProjectController@project')->name('admin.project');
Route::post('/add_project', 'ProjectController@add_project')->name('add_project');
Route::post('/update_project', 'ProjectController@update_project')->name('update_project');
Route::get('/delete_project/{id}', 'ProjectController@delete_project')->name('delete_project');

Route::get('/admin_blog', 'BlogController@blog')->name('admin.blog');
Route::post('/add_blog', 'BlogController@add_blog')->name('add_blog');
Route::post('/update_blog', 'BlogController@update_blog')->name('update_blog');
Route::get('/delete_blog/{id}', 'BlogController@delete_blog')->name('delete_blog');

Route::get('/admin_site_name', 'SiteinfoController@site_name')->name('admin.site_name');
Route::post('/admin_site_name', 'SiteinfoController@update_site_name')->name('update_site_name');
Route::get('/admin_site_name/{id}', 'SiteinfoController@delete_site_name')->name('delete_site_name');
