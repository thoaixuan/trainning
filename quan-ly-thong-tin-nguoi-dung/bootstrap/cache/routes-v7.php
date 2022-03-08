<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.index.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.getdata.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/any-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.anydata.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.signin.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'guest.post_signin.home',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.logout.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/edit-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.update.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'guest.update_data.user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/delete-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.delete.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.get_room.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.post.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin-logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logout.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/anydata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.datatables.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/insert-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.insert.user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/edit-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update_data.user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/delete-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.delete.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/get-room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.get_room.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/check-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guest.check_login.user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index.room',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room/getdata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.get_data.room',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room/anydata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.datatables.room',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room/insert-room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.insert.room',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room/edit-room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update.room',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update_data.room',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room/delete-room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.delete.room',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/room/permision-room' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.get_permision.room',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission/getdata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.get_data.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission/anydata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.datatables.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission/insert-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.insert.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission/edit-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update_data.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission/delete-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.delete.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission/permision-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.get_permision.permission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NlPZrVElqD09911T',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'guest.index.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.index.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.getdata.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@getdata',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@getdata',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.getdata.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.anydata.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'any-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@anydata',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@anydata',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.anydata.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.signin.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\LoginController@index',
        'controller' => 'App\\Http\\Controllers\\guest\\LoginController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.signin.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.logout.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\guest\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.logout.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.post_signin.home' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\guest\\LoginController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.post_signin.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.update.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@getUpdate',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@getUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.update.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.update_data.user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'edit-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@postUpdate',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@postUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.update_data.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.delete.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delete-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@delete',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@delete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.delete.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.get_room.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\guest\\HomeController@getRoom',
        'controller' => 'App\\Http\\Controllers\\guest\\HomeController@getRoom',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guest.get_room.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\admin\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.index.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\SigninController@index',
        'controller' => 'App\\Http\\Controllers\\admin\\SigninController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.index.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.post.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\SigninController@login',
        'controller' => 'App\\Http\\Controllers\\admin\\SigninController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.post.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logout.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin-logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\SigninController@logout',
        'controller' => 'App\\Http\\Controllers\\admin\\SigninController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.logout.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@index',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.index.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.datatables.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/anydata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@anyData',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@anyData',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.datatables.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.insert.user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user/insert-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@add',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@add',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.insert.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/edit-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@getUpdate',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@getUpdate',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.update.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update_data.user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user/edit-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@postUpdate',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@postUpdate',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.update_data.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.delete.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/delete-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@delete',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@delete',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.delete.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.get_room.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/get-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@getRoom',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@getRoom',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'admin.get_room.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guest.check_login.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/check-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\UserController@checkLogin',
        'controller' => 'App\\Http\\Controllers\\admin\\UserController@checkLogin',
        'namespace' => NULL,
        'prefix' => 'admin/user',
        'where' => 
        array (
        ),
        'as' => 'guest.check_login.user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index.room' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@index',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@index',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.index.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.get_data.room' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/room/getdata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@getDate',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@getDate',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.get_data.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.datatables.room' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/room/anydata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@anyData',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@anyData',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.datatables.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.insert.room' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/room/insert-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@add',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@add',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.insert.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update.room' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/room/edit-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@getUpdate',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@getUpdate',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.update.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update_data.room' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/room/edit-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@postUpdate',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@postUpdate',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.update_data.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.delete.room' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/room/delete-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@delete',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@delete',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.delete.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.get_permision.room' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/room/permision-room',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
          2 => 'checkGroup',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\RoomController@getPermision',
        'controller' => 'App\\Http\\Controllers\\admin\\RoomController@getPermision',
        'namespace' => NULL,
        'prefix' => 'admin/room',
        'where' => 
        array (
        ),
        'as' => 'admin.get_permision.room',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@index',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@index',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.index.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.get_data.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission/getdata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@getDate',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@getDate',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.get_data.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.datatables.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission/anydata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@anyData',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@anyData',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.datatables.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.insert.permission' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permission/insert-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@add',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@add',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.insert.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission/edit-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@getUpdate',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@getUpdate',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.update.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update_data.permission' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/permission/edit-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@postUpdate',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@postUpdate',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.update_data.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.delete.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission/delete-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@delete',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@delete',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.delete.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.get_permision.permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission/permision-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'admin',
          1 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\admin\\PermissionController@getPermision',
        'controller' => 'App\\Http\\Controllers\\admin\\PermissionController@getPermision',
        'namespace' => NULL,
        'prefix' => 'admin/permission',
        'where' => 
        array (
        ),
        'as' => 'admin.get_permision.permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NlPZrVElqD09911T' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000003f1914e70000000065fae6ac";}";s:4:"hash";s:44:"LrYEFI8+tgMQnqiEUpVDERwoaCmjdrv03nY2AGBg2B0=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::NlPZrVElqD09911T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
