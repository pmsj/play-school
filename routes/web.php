<?php


use App\Models\Article;
use App\Livewire\Website;
use App\Livewire\UserArticles;
use App\Livewire\CreateArticle;
use App\Livewire\Article\Articles;
use App\Livewire\Profile\Security;
use App\Livewire\User\ManageUsers;
use App\Livewire\Article\AllArticles;
use App\Livewire\Article\ArticleShow;
use App\Livewire\Article\EditArticle;
use Illuminate\Support\Facades\Route;
use App\Livewire\Carousel\CarouselItem;
use App\Livewire\Profile\DeleteUserForm;
use App\Livewire\AssignRolesAndPermissions;
use App\Livewire\Profile\UpdatePasswordForm;
use App\Livewire\Authorization\Role\AllRoles;
use App\Livewire\Authorization\Role\CreateRole;
use App\Livewire\Authorization\Role\ManageRole;
use App\Livewire\Profile\UpdateProfileInformationForm;
use App\Livewire\Authorization\Permission\EditPermission;
use App\Livewire\Authorization\Permission\ManagePermission;
use App\Livewire\Authorization\Assignment\UserToGroup\EditUserGroups;
use App\Livewire\Authorization\Assignment\UserToGroup\AssignUserGroups;
use App\Livewire\Authorization\Assignment\UserToGroup\EditUsersToGroup;
use App\Livewire\Authorization\Assignment\UserToGroup\ManageUserGroups;
use App\Livewire\Authorization\Assignment\UserToGroup\AssignUsersToGroup;
use App\Livewire\Authorization\Assignment\PermissionToGroup\EditPermissionsToGroup;
use App\Livewire\Authorization\Assignment\PermissionToGroup\ManageGroupPermissions;
use App\Livewire\Authorization\Assignment\PermissionToGroup\AssignPermissionsToGroup;

Route::get('/', Website::class)->name('home.website');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('user.dashboard');

    Route::get('/user/profile/info', UpdateProfileInformationForm::class)->name('profile.info');
    Route::get('/user/profile/password', UpdatePasswordForm::class)->name('profile.password');
    Route::get('/user/profile/security', Security::class)->name('profile.security');
    Route::get('/user/profile/delete', DeleteUserForm::class)->name('profile.delete');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/article/create', Articles::class)->name('create.article');
    // Route::get('/article/{article:slug}/edit', EditArticle::class)->name('edit.article');
    Route::get('/carousel/create', CarouselItem::class)->name('create.carousel');
    Route::get('/user/{user}/articles', UserArticles::class)->name('user.articles');

//     Route::get('/manage-users', ManageUsers::class)->name('index.user');

//     //Role
//     Route::get('/role/create', CreateRole::class)->name('create.role');
//     Route::get('/manage-roles', ManageRole::class)->name('index.role');

//    // Permission
//    Route::get('/manage-permissions', ManagePermission::class)->name('index.permission');


//    // assign roles and permissions
//    Route::get('/assign-roles-and-permissions', AssignRolesAndPermissions::class)->name('index.assignpermission');

//    Route::get('/assign-permissions-to-role', AssignPermissionsToRole::class)->name('assign-permission.to-role');
});
//Article ----> public links
Route::get('/articles', AllArticles::class)->name('index.article');
Route::get('/article/{article:slug}', ArticleShow::class)->name('show.article');

Route::middleware('can:manage-articles, \App\Models\Article')->group(function () {
    Route::get('/article/create', Articles::class)->name('create.article');
    Route::get('/article/{article:slug}/edit', EditArticle::class)->name('edit.article');
});

Route::middleware('can:manage-users')->group(function () {
   
    Route::get('/manage-users', ManageUsers::class)->name('index.user');
    // Route::get('/manage-users/edit/{user}', ManageUsers::class)->name('index.user');

    //Role
    Route::get('/role/create', CreateRole::class)->name('create.role');
    Route::get('/manage-roles', ManageRole::class)->name('index.role');

   // Permission
   Route::get('/manage-permissions', ManagePermission::class)->name('index.permission');
   Route::get('/manage-permissions/{permission}/edit', EditPermission::class)->name('edit.permission');



   Route::get('/assign-permissions-to-group', AssignPermissionsToGroup::class)->name('assign.group-permissions');
   Route::get('/assign-permissions-to-group/edit/{id}', EditPermissionsToGroup::class)->name('edit.group-permissions');
   Route::get('/manage-group-permissions', ManageGroupPermissions::class)->name('manage.group-permissions');


   Route::get('/assign-user-to-groups/edit/{id}', EditUserGroups::class)->name('edit.user-groups');
   Route::get('/manage-user-groups', ManageUserGroups::class)->name('manage.user-groups');

});





