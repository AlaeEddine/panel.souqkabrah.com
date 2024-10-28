<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [SettingController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/contact', [ContactController::class, 'contact'])->name('contact')->can('view-contact');
    Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit')->can('update-contact');
    Route::post('/contact/edit/{id}', [ContactController::class, 'editsubmit'])->name('contact.edit.submit')->can('update-contact');
    Route::get('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete')->can('delete-contact');

    Route::get('/roles', [RoleController::class, 'roles'])->name('roles')->can('view-roles');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->can('update-roles');
    Route::post('/roles/edit/{id}', [RoleController::class, 'editsubmit'])->name('roles.edit.submit')->can('update-roles');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete')->can('delete-roles');

    Route::get('/categories', [CategoryController::class, 'categories'])->name('categories')->can('view-categories');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->can('update-categories');
    Route::post('/categories/edit/{id}', [CategoryController::class, 'editsubmit'])->name('categories.edit.submit')->can('update-categories');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete')->can('delete-categories');
    Route::post('/categories/icons/upload', [CategoryController::class, 'uploadiconssubmit'])->name('categories.icons.upload.submit')->can('update-categories');

    Route::get('/subcategories', [SubCategoryController::class, 'subcategories'])->name('subcategories')->can('view-subcategories');
    Route::get('/subcategories/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategories.edit')->can('update-subcategories');
    Route::post('/subcategories/edit/{id}', [SubCategoryController::class, 'editsubmit'])->name('subcategories.edit.submit')->can('update-subcategories');
    Route::get('/subcategories/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategories.delete')->can('delete-subcategories');

    Route::get('/subsubcategories', [SubSubCategoryController::class, 'subsubcategories'])->name('subsubcategories')->can('view-subsubcategories');
    Route::get('/subsubcategories/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('subsubcategories.edit')->can('update-subsubcategories');
    Route::post('/subsubcategories/edit/{id}', [SubSubCategoryController::class, 'editsubmit'])->name('subsubcategories.edit.submit')->can('update-subsubcategories');
    Route::get('/subsubcategories/delete/{id}', [SubSubCategoryController::class, 'delete'])->name('subsubcategories.delete')->can('delete-subsubcategories');

    Route::get('/cities', [CityController::class, 'cities'])->name('cities')->can('view-cities');
    Route::get('/cities/edit/{id}', [CityController::class, 'edit'])->name('cities.edit')->can('update-cities');
    Route::post('/cities/edit/{id}', [CityController::class, 'editsubmit'])->name('cities.edit.submit')->can('update-cities');
    Route::get('/cities/delete/{id}', [CityController::class, 'delete'])->name('cities.delete')->can('delete-cities');


    Route::get('/users', [UserController::class, 'users'])->name('users')->can('view-users');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->can('update-users');
    Route::post('/users/edit/{id}', [UserController::class, 'editsubmit'])->name('users.edit.submit')->can('update-users');
    Route::get('/users/ban/{id}', [UserController::class, 'ban'])->name('users.ban')->can('update-users');
    Route::get('/users/unban/{id}', [UserController::class, 'unban'])->name('users.unban')->can('update-users');
    Route::get('/users/enable/email/{id}', [UserController::class, 'enableemail'])->name('users.enable.email')->can('update-email-users');
    Route::get('/users/enable/mobile/{id}', [UserController::class, 'enablemobile'])->name('users.enable.mobile')->can('update-mobile-users');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->can('delete-users');

    Route::get('/privatemessages', [PrivateMessageController::class, 'privatemessages'])->name('privatemessages')->can('view-private-messages');
    Route::get('/privatemessages/edit/{id}', [PrivateMessageController::class, 'edit'])->name('privatemessages.edit')->can('update-private-messages');
    Route::post('/privatemessages/edit/{id}', [PrivateMessageController::class, 'editsubmit'])->name('privatemessages.edit.submit')->can('update-private-messages');
    Route::get('/privatemessages/delete/{id}', [PrivateMessageController::class, 'delete'])->name('privatemessages.delete')->can('delete-private-messages');

    Route::get('/ratings', [RatingController::class, 'ratings'])->name('ratings')->can('view-ratings');
    Route::get('/ratings/edit/{id}', [RatingController::class, 'edit'])->name('ratings.edit')->can('update-ratings');
    Route::post('/ratings/edit/{id}', [RatingController::class, 'editsubmit'])->name('ratings.edit.submit')->can('update-ratings');
    Route::get('/ratings/delete/{id}', [RatingController::class, 'delete'])->name('ratings.delete')->can('delete-ratings');

    Route::get('/likes', [LikeController::class, 'likes'])->name('likes')->can('view-likes');
    Route::get('/likes/edit/{id}', [LikeController::class, 'edit'])->name('likes.edit')->can('update-likes');
    Route::post('/likes/edit/{id}', [LikeController::class, 'editsubmit'])->name('likes.edit.submit')->can('update-likes');
    Route::get('/likes/delete/{id}', [LikeController::class, 'delete'])->name('likes.delete')->can('delete-likes');

    Route::get('/likers', [LikeController::class, 'likers'])->name('likers')->can('view-likers');
    Route::get('/likers/edit/{id}', [LikeController::class, 'edit'])->name('likers.edit')->can('update-likers');
    Route::post('/likers/edit/{id}', [LikeController::class, 'editsubmit'])->name('likers.edit.submit')->can('update-likers');
    Route::get('/likers/delete/{id}', [LikeController::class, 'delete'])->name('likers.delete')->can('delete-likers');

    Route::get('/categories/liked', [LikeController::class, 'categoriesliked'])->name('categories.liked')->can('view-categories-liked');
    Route::get('/categories/liked/edit/{id}', [LikeController::class, 'edit'])->name('categories.liked.edit')->can('update-categories-liked');
    Route::post('/categories/liked/edit/{id}', [LikeController::class, 'editsubmit'])->name('categories.liked.edit.submit')->can('update-categories-liked');
    Route::get('/categories/liked/delete/{id}', [LikeController::class, 'delete'])->name('categories.liked.delete')->can('delete-categories-liked');

    Route::get('/ads', [AdController::class, 'ads'])->name('ads')->can('view-ads');
    Route::post('/upload', [AdController::class, 'upload'])->name('ads.upload')->can('create-ads');
    Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create')->can('create-ads');
    Route::post('/ads/create', [AdController::class, 'createsubmit'])->name('ads.create.submit')->can('create-ads');
    Route::get('/ads/edit/{id}', [AdController::class, 'edit'])->name('ads.edit')->can('update-ads');
    Route::post('/ads/edit/{id}', [AdController::class, 'editsubmit'])->name('ads.edit.submit')->can('update-ads');
    Route::get('/ads/delete/{id}', [AdController::class, 'delete'])->name('ads.delete')->can('delete-ads');

    Route::get('/bannedads', [AdController::class, 'bannedads'])->name('bannedads')->can('view-banned-ads');
    Route::get('/bannedads/edit/{id}', [AdController::class, 'edit'])->name('bannedads.edit')->can('update-banned-ads');
    Route::post('/bannedads/edit/{id}', [AdController::class, 'editsubmit'])->name('bannedads.edit.submit')->can('update-banned-ads');
    Route::get('/bannedads/delete/{id}', [AdController::class, 'delete'])->name('bannedads.delete')->can('delete-banned-ads');

    Route::get('/filterads', [AdController::class, 'filterads'])->name('filterads')->can('view-filter-ads');
    Route::get('/filterads/create', [AdController::class, 'filtercreate'])->name('filterads.create')->can('create-filter-ads');
    Route::post('/filterads/create', [AdController::class, 'filtercreatesubmit'])->name('filterads.create.submit')->can('create-filter-ads');
    Route::get('/filterads/edit/{id}', [AdController::class, 'filteredit'])->name('filterads.edit')->can('update-filter-ads');
    Route::post('/filterads/edit/{id}', [AdController::class, 'filtereditsubmit'])->name('filterads.edit.submit')->can('update-filter-ads');
    Route::get('/filterads/delete/{id}', [AdController::class, 'filterdelete'])->name('filterads.delete')->can('delete-filter-ads');

    Route::get('/comments', [CommentController::class, 'comments'])->name('comments')->can('view-comments');
    Route::get('/comments/edit/{id}', [CommentController::class, 'edit'])->name('comments.edit')->can('update-comments');
    Route::post('/comments/edit/{id}', [CommentController::class, 'editsubmit'])->name('comments.edit.submit')->can('update-comments');
    Route::get('/comments/delete/{id}', [CommentController::class, 'delete'])->name('comments.delete')->can('delete-comments');

    Route::get('/bannedcomments', [CommentController::class, 'bannedcomments'])->name('bannedcomments')->can('view-banned-comments');
    Route::get('/bannedcomments/edit/{id}', [CommentController::class, 'edit'])->name('bannedcomments.edit')->can('update-banned-comments');
    Route::post('/bannedcomments/edit/{id}', [CommentController::class, 'editsubmit'])->name('bannedcomments.edit.submit')->can('update-banned-comments');
    Route::get('/bannedcomments/delete/{id}', [CommentController::class, 'delete'])->name('bannedcomments.delete')->can('delete-banned-comments');

    Route::get('/stores', [StoreController::class, 'stores'])->name('stores')->can('view-stores');
    Route::get('/stores/edit/{id}', [StoreController::class, 'edit'])->name('stores.edit')->can('update-stores');
    Route::post('/stores/edit/{id}', [StoreController::class, 'editsubmit'])->name('stores.edit.submit')->can('update-stores');
    Route::get('/stores/delete/{id}', [StoreController::class, 'delete'])->name('stores.delete')->can('delete-stores');

    Route::get('/paymentgateways', [PaymentGatewayController::class, 'paymentgateways'])->name('paymentgateways')->can('view-payment-gateways');
    Route::get('/paymentgateways/create', [PaymentGatewayController::class, 'create'])->name('paymentgateways.create')->can('create-payment-gateways');
    Route::post('/paymentgateways/create', [PaymentGatewayController::class, 'createsubmit'])->name('paymentgateways.create.submit')->can('create-payment-gateways');
    Route::get('/paymentgateways/edit/{id}', [PaymentGatewayController::class, 'edit'])->name('paymentgateways.edit')->can('update-payment-gateways');
    Route::post('/paymentgateways/edit/{id}', [PaymentGatewayController::class, 'editsubmit'])->name('paymentgateways.edit.submit')->can('update-payment-gateways');
    Route::get('/paymentgateways/delete/{id}', [PaymentGatewayController::class, 'delete'])->name('paymentgateways.delete')->can('delete-payment-gateways');

    Route::get('/moneytransferts', [MoneyTransfertController::class, 'moneytransferts'])->name('moneytransferts')->can('view-money-transferts');
    Route::get('/moneytransferts/edit/{id}', [MoneyTransfertController::class, 'edit'])->name('moneytransferts.edit')->can('update-money-transferts');
    Route::post('/moneytransferts/edit/{id}', [MoneyTransfertController::class, 'editsubmit'])->name('moneytransferts.edit.submit')->can('update-money-transferts');
    Route::get('/moneytransferts/delete/{id}', [MoneyTransfertController::class, 'delete'])->name('moneytransferts.delete')->can('delete-money-transferts');

    Route::get('/banks', [BankController::class, 'banks'])->name('banks')->can('view-banks');
    Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create')->can('create-banks');
    Route::post('/banks/create', [BankController::class, 'createsubmit'])->name('banks.create.submit')->can('create-banks');
    Route::get('/banks/edit/{id}', [BankController::class, 'edit'])->name('banks.edit')->can('update-banks');
    Route::post('/banks/edit/{id}', [BankController::class, 'editsubmit'])->name('banks.edit.submit')->can('update-banks');
    Route::get('/banks/delete/{id}', [BankController::class, 'delete'])->name('banks.delete')->can('delete-banks');

    Route::get('/banktransferts', [BankTransfertController::class, 'banktransferts'])->name('banktransferts')->can('view-bank-transferts');
    Route::get('/banktransferts/edit/{id}', [BankTransfertController::class, 'edit'])->name('banktransferts.edit')->can('update-bank-transferts');
    Route::post('/banktransferts/edit/{id}', [BankTransfertController::class, 'editsubmit'])->name('banktransferts.edit.submit')->can('update-bank-transferts');
    Route::get('/banktransferts/delete/{id}', [BankTransfertController::class, 'delete'])->name('banktransferts.delete')->can('delete-bank-transferts');

    Route::get('/blacklist', [UserController::class, 'blacklists'])->name('blacklist')->can('view-blacklist');


    Route::get('/banners', [BannerController::class, 'banners'])->name('banners')->can('view-banners');
    Route::post('/banners/upload', [BannerController::class, 'upload'])->name('banners.upload')->can('create-banners');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create')->can('create-banners');
    Route::post('/banners/create', [BannerController::class, 'createsubmit'])->name('banners.create.submit')->can('create-banners');
    Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('banners.edit')->can('update-banners');
    Route::post('/banners/edit/{id}', [BannerController::class, 'editsubmit'])->name('banners.edit.submit')->can('update-banners');
    Route::get('/banners/delete/{id}', [BannerController::class, 'delete'])->name('banners.delete')->can('delete-banners');

    Route::get('/googleads', [GoogleAdController::class, 'googleads'])->name('googleads')->can('view-google-ads');
    Route::get('/googleads/create', [GoogleAdController::class, 'create'])->name('googleads.create')->can('create-google-ads');
    Route::post('/googleads/create', [GoogleAdController::class, 'createsubmit'])->name('googleads.create.submit')->can('create-google-ads');
    Route::get('/googleads/edit/{id}', [GoogleAdController::class, 'edit'])->name('googleads.edit')->can('update-google-ads');
    Route::post('/googleads/edit/{id}', [GoogleAdController::class, 'editsubmit'])->name('googleads.edit.submit')->can('update-google-ads');
    Route::get('/googleads/delete/{id}', [GoogleAdController::class, 'delete'])->name('googleads.delete')->can('delete-google-ads');

    Route::get('/pages', [PageController::class, 'pages'])->name('pages')->can('view-pages');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create')->can('create-pages');
    Route::post('/pages/create', [PageController::class, 'createsubmit'])->name('pages.create.submit')->can('create-pages');
    Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit')->can('update-pages');
    Route::post('/pages/edit/{id}', [PageController::class, 'editsubmit'])->name('pages.edit.submit')->can('update-pages');
    Route::get('/pages/delete/{id}', [PageController::class, 'delete'])->name('pages.delete')->can('delete-pages');

    Route::get('/mobiledata', [MobileDataController::class, 'mobiledata'])->name('mobiledata')->can('view-mobile-data');
    Route::get('/mobiledata/create', [MobileDataController::class, 'create'])->name('mobiledata.create')->can('create-mobile-data');
    Route::post('/mobiledata/create', [MobileDataController::class, 'createsubmit'])->name('mobiledata.create.submit')->can('create-mobile-data');
    Route::get('/mobiledata/edit/{id}', [MobileDataController::class, 'edit'])->name('mobiledata.edit')->can('update-mobile-data');
    Route::post('/mobiledata/edit/{id}', [MobileDataController::class, 'editsubmit'])->name('mobiledata.edit.submit')->can('update-mobile-data');
    Route::get('/mobiledata/delete/{id}', [MobileDataController::class, 'delete'])->name('mobiledata.delete')->can('delete-mobile-data');

    Route::get('/smsgroups', [SmsGroupController::class, 'smsgroups'])->name('smsgroups')->can('view-sms-groups');
    Route::get('/smsgroups/create', [SmsGroupController::class, 'create'])->name('smsgroups.create')->can('create-sms-groups');
    Route::post('/smsgroups/create', [SmsGroupController::class, 'createsubmit'])->name('smsgroups.create.submit')->can('create-sms-groups');
    Route::get('/smsgroups/edit/{id}', [SmsGroupController::class, 'edit'])->name('smsgroups.edit')->can('update-sms-groups');
    Route::post('/smsgroups/edit/{id}', [SmsGroupController::class, 'editsubmit'])->name('smsgroups.edit.submit')->can('update-sms-groups');
    Route::get('/smsgroups/delete/{id}', [SmsGroupController::class, 'delete'])->name('smsgroups.delete')->can('delete-sms-groups');

    Route::get('/sms', [SmsController::class, 'sms'])->name('sms')->can('view-sms');
    Route::get('/sms/create/to/{id}', [SmsController::class, 'send'])->name('sms.create')->can('create-sms');
    Route::post('/sms/send', [SmsController::class, 'send'])->name('sms.send')->can('create-sms');
    Route::post('/sms/create/to/{id}', [SmsController::class, 'createsubmit'])->name('sms.create.submit')->can('create-sms');
    Route::get('/sms/edit/{id}', [SmsController::class, 'edit'])->name('sms.edit')->can('update-sms');
    Route::post('/sms/edit/{id}', [SmsController::class, 'editsubmit'])->name('sms.edit.submit')->can('update-sms');
    Route::get('/sms/delete/{id}', [SmsController::class, 'delete'])->name('sms.delete')->can('delete-sms');


    Route::get('/contactusers', [ContactUserController::class, 'contactusers'])->name('contactusers')->can('view-contact-users');
    Route::post('/contactusers', [ContactUserController::class, 'send'])->name('contactusers.submit')->can('create-contact-users');

    Route::get('/plans', [PlanController::class, 'plans'])->name('plans')->can('view-plans');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create')->can('create-plans');
    Route::post('/plans/create', [PlanController::class, 'createsubmit'])->name('plans.create.submit')->can('create-plans');
    Route::get('/plans/edit/{id}', [PlanController::class, 'edit'])->name('plans.edit')->can('update-plans');
    Route::post('/plans/edit/{id}', [PlanController::class, 'editsubmit'])->name('plans.edit.submit')->can('update-plans');
    Route::get('/plans/delete/{id}', [PlanController::class, 'delete'])->name('plans.delete')->can('delete-plans');

    Route::get('/socialmedia', [SocialMediaController::class, 'socialmedia'])->name('socialmedia')->can('view-social-media');
    Route::post('/socialmedia', [SocialMediaController::class, 'socialmediasubmit'])->name('socialmedia.submit')->can('update-social-media');

    Route::get('/html', [HtmlController::class, 'html'])->name('html')->can('view-html');
    Route::get('/html/create', [HtmlController::class, 'create'])->name('html.create')->can('create-html');
    Route::post('/html/create', [HtmlController::class, 'createsubmit'])->name('html.create.submit')->can('create-html');
    Route::get('/html/edit/{id}', [HtmlController::class, 'edit'])->name('html.edit')->can('update-html');
    Route::post('/html/edit/{id}', [HtmlController::class, 'editsubmit'])->name('html.edit.submit')->can('update-html');
    Route::get('/html/delete/{id}', [HtmlController::class, 'delete'])->name('html.delete')->can('delete-html');


    Route::get('/settings', [SettingController::class, 'settings'])->name('settings')->can('view-settings');
    Route::post('/settings', [SettingController::class, 'settingssubmit'])->name('settings.submit')->can('update-settings');


    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
