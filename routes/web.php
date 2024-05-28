<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AdminBlogpostController;
use App\Http\Controllers\FileDownloadController;

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

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/project', [PageController::class, 'index'])->name('project');
Route::get('/skills', [PageController::class, 'index'])->name('skills');
Route::get('/about', [PageController::class, 'index'])->name('about');
Route::get('/contact', [PageController::class, 'index'])->name('contact');

Route::redirect('dashboard', 'admin/dashboard', 301);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard');
    });

    Route::controller(SkillController::class)->group(function () {
        Route::get('skills', 'index')->name('admin.skills');
        Route::post('newskill', 'store')->name('skill.store');
        Route::put('skill/edit/{skill}', 'update')->name('skill.update');
        Route::get('skill/edit/{id}', 'edit')->name('skill.edit');
        route::delete('skill/delete/{id}', 'destroy')->name('skill.destroy');
    });

    Route::controller(LanguageController::class)->group(function () {
        Route::get('languages', 'index')->name('admin.languages');
        Route::get('languages/edit/{id}', 'edit')->name('language.edit');
        Route::delete('languages/delete/{language}', 'destroy')->name('language.destroy');
        Route::post('languages/store/', 'store')->name('language.store');
        Route::get('languages/get/', 'get')->name('GetLanguage')->withoutMiddleware(['auth']);
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('project', 'index')->name('admin.project');
        Route::get('project/edit/{project}', 'edit')->name('project.edit');
        Route::put('project/edit/{project}', 'update')->name('project.update');
        Route::delete('project/delete/{project}', 'destroy')->name('project.destroy');
        Route::post('project/store', 'store')->name('project.store');
        Route::get('project/get/', 'get')->name('Geproject')->withoutMiddleware(['auth']);
    });

    Route::controller(AdminBlogpostController::class)->group(function () {
        Route::get('blog/create', 'create')->name('admin.blogpost.create');
        Route::get('blog/edit/{blogpost}', 'edit')->name('admin.blogpost.edit');
        Route::post('blog/create/new', 'store')->name('admin.blogpost.store');
        Route::post('blog/edit/{blogpost}', 'update')->name('admin.blogpost.update');
        Route::delete('blog/delete/{blogpost}', 'destroy')->name('admin.blogpost.delete');
        Route::get('blog', 'index')->name('admin.blogpost.index');
        Route::get('blog/post/{blogpost}', 'show')->name('blogpost.show');
    });
});;
Route::controller(BlogpostController::class)->middleware('auth')->group(function () {
    Route::get('/blog/create', 'create')->name('blog.create');
    Route::get('blog', 'index')->name('blogpost.index')->withoutMiddleware('auth');
    Route::get('blog/post/{title}', 'show')->name('blogpost.show');
});

Route::post('/keep-updated',[EmailController::class,'saveemail'])->name('keep-updated');
Route::post('/contact',[EmailController::class, 'processcontactform'])->name('processcontactform');
Route::get('/download/cv',[FileDownloadController::class,'downloadcv'])->name('downloadcv');
Route::get('/download/resume',[FileDownloadController::class,'downloadresume'])->name('downloadresume');


require __DIR__ . '/auth.php';
