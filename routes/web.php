<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest', 'namespace' => 'Authorization'], function(){
    Route::get('/', 'IndexController')->name('firstpage');

    Route::get('/registration', 'RegisterCreateController')->name('regCreate');
    Route::get('/authorization', 'LoginCreateController')->name('authCreate');

    Route::post('/registration', 'RegisterStoreController')->name('regStore');
    Route::post('/authorization', 'LoginStoreController')->name('authStore');
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('/logout', 'Authorization\LogoutController')->name('logout');

    Route::group(['namespace' => 'Page', 'prefix' => '/page' ], function(){
        Route::get('/', 'ShowController')->name('personalPage');
        Route::get('/editData', 'DataEditController')->name('pageEditData');
        Route::patch('/update', 'DataUpdateController')->name('pageUpdateData');
        Route::get('/editPassword', 'PasswordEditController')->name('pageEditPassword');
        Route::patch('/', 'PasswordUpdateController')->name('pageUpdatePassword');
    });

    Route::group(['prefix' => '/posts', ], function(){
        
        Route::group(['namespace' => 'Post'], function(){
            Route::get('/', 'MainPageController')->name('postIndex');  
            Route::get('/{post}/show', 'ShowController')->name('postShow');
            Route::patch('/{post}/show/like', 'LikeController')->name('postLike');
            Route::get('/your-likes', 'UserLikesController')->name('likedPosts'); 
            Route::get('/more-likes', 'MoreLikesController')->name('moreLikes');
            Route::get('/filters', 'FiltersController')->name('filters');
        });
        
        Route::group(['namespace' => 'Comment'], function(){
            Route::post('/{post}/show', 'StoreController')->name('commentStore');
            Route::delete('/{comment}/show/','DeleteController' )->name('commentDelete');
        });

        Route::group(['prefix' => '/suggest', 'namespace' => 'Suggest'], function(){
            Route::get('/', 'CreateController')->name('suggestPost');
            Route::post('/', 'StoreController')->name('postSuggestStore');
        });
    });

    Route::group(['middleware' => 'manager', 'prefix' => '/panel'], function(){   

        Route::get('/welcome', 'Adminpanel\FirstpageController')->name('welcome');

        Route::group(['namespace' => 'Post', 'prefix' => '/posts'], function(){
            Route::get('/', 'IndexController')->name('postIndexPanel');
            Route::get('/create', 'CreateController')->name('postCreate');
            Route::post('/', 'StoreController')->name('postStore');
            Route::get('/{post}/edit', 'EditController')->name('postEdit');
            Route::patch('/{post}', 'UpdateController')->name('postUpdate');
            Route::delete('/{post}', 'DeleteController')->name('postDelete');
        });
    
        Route::group(['prefix' => '/suggested-posts', 'namespace' => 'Suggest'], function(){
            Route::get('/{post}/edit', 'EditController')->name('suggestedPostEdit');
            Route::get('/', 'IndexController')->name('suggestedPosts');
            Route::delete('/{post}', 'DeleteController')->name('deleteSuggestedPost');
        });

        Route::group(['middleware' => 'moderator'], function(){
            
            Route::group(['prefix' => '/users', 'namespace' => 'Adminpanel'], function(){
                Route::get('/', 'UserIndexController')->name('indexUsers');
                Route::delete('/{user}', 'UserDeleteController')->name('deleteUser');
                Route::get('/{user}/edit', 'UserEditController')->name('changeRole');
                Route::patch('/{user}', 'UserUpdateController')->name('updateRole');
            });
            
            Route::group(['namespace' => 'Category', 'prefix' => '/categories'], function(){
                Route::get('/', 'IndexController')->name('catIndex');
                Route::get('/create', 'CreateController')->name('catCreate');    
                Route::get('/{category}/edit', 'EditController')->name('catEdit');
                Route::post('/', 'StoreController')->name('catStore');
                Route::patch('/{category}', 'UpdateController')->name('catUpdate');
                Route::delete('/{category}', 'DeleteController')->name('catDelete');
            });

            Route::group(['namespace' => 'Tag', 'prefix' => '/tags'], function(){
                Route::get('/', 'IndexController')->name('tagIndex');
                Route::get('/create', 'CreateController')->name('tagCreate');
                Route::post('/', 'StoreController')->name('tagStore');
                Route::get('/{tag}/edit', 'EditController')->name('tagEdit');
                Route::patch('/{tag}', 'UpdateController')->name('tagUpdate');
                Route::delete('/{tag}', 'DeleteController')->name('tagDelete');
            });

        });     
    });
});