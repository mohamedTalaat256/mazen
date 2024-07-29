<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmenityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompoundController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompoundAmenityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PropertyAmenityController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyGalleryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TopCompoundsController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


//admin only
Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');



    /* top compounds */
    Route::get('top_compounds/index', [TopCompoundsController::class, 'index'])->name('admin.top_compounds.index');
    Route::get('top_compounds/create', [TopCompoundsController::class, 'create'])->name('admin.top_compounds.create');
    Route::post('top_compounds/save', [TopCompoundsController::class, 'save'])->name('admin.top_compounds.save');
    Route::get('top_compounds/edit/{id}', [TopCompoundsController::class, 'edit'])->name('admin.top_compounds.edit');
    Route::post('top_compounds/updat/{id}', [TopCompoundsController::class, 'update'])->name('admin.top_compounds.update');
    Route::get('top_compounds/delete/{id}', [TopCompoundsController::class, 'delete'])->name('admin.top_compounds.delete');

    /************************************************* compounds ***************************************************/
    Route::get('compounds/index', [CompoundController::class, 'index'])->name('admin.compounds.index');
    Route::get('compounds/create', [CompoundController::class, 'create'])->name('admin.compounds.create');
    Route::post('compounds/save', [CompoundController::class, 'save'])->name('admin.compounds.save');
    Route::get('compounds/edit/{id}', [CompoundController::class, 'edit'])->name('admin.compounds.edit');
    Route::post('compounds/updat/{id}', [CompoundController::class, 'update'])->name('admin.compounds.update');
    Route::get('compounds/delete/{id}', [CompoundController::class, 'delete'])->name('admin.compounds.delete');

    /* compound amenities */
    Route::get('compound_amenities/index/{compound_id}', [CompoundAmenityController::class, 'index'])->name('admin.compound_amenities.index');
    Route::post('compound_amenities/save', [CompoundAmenityController::class, 'save'])->name('admin.compound_amenities.save');
    Route::get('compound_amenities/delete/{compound_id}/{amenity_id}', [CompoundAmenityController::class, 'delete'])->name('admin.compound_amenities.delete');

    /* compound gallery */
    Route::get('compound_gallery/index/{id}', [GalleryController::class, 'index'])->name('admin.compound_gallery.index');
    Route::post('compound_gallery/save', [GalleryController::class, 'save'])->name('admin.compound_gallery.save');
    Route::get('compound_gallery/delete/{id}/{compound_name}', [GalleryController::class, 'delete'])->name('admin.compound_gallery.delete');

    /************************************************  properties *************************************************/
    Route::get('properties/index', [PropertyController::class, 'index'])->name('admin.properties.index');
    Route::get('properties/create', [PropertyController::class, 'create'])->name('admin.properties.create');
    Route::post('properties/save', [PropertyController::class, 'save'])->name('admin.properties.save');
    Route::get('properties/edit/{id}', [PropertyController::class, 'edit'])->name('admin.properties.edit');
    Route::post('properties/update', [PropertyController::class, 'update'])->name('admin.properties.update');
    Route::get('properties/delete/{id}', [PropertyController::class, 'delete'])->name('admin.properties.delete');

    /* property amenities */
    Route::get('property_amenities/index/{property_id}', [PropertyAmenityController::class, 'index'])->name('admin.property_amenities.index');
    Route::post('property_amenities/save', [PropertyAmenityController::class, 'save'])->name('admin.property_amenities.save');
    Route::get('property_amenities/delete/{property_id}/{amenity_id}', [PropertyAmenityController::class, 'delete'])->name('admin.property_amenities.delete');

    /* property gallery */
    Route::get('property_gallery/{id}', [PropertyGalleryController::class, 'index'])->name('admin.property_galleries.index');
    Route::post('property_gallery/add_new_property_gallery_image/', [PropertyGalleryController::class, 'store'])->name('add_new_gallery_image');
    Route::get('property_gallery/delete/{id}/{proprty_name}', [PropertyGalleryController::class, 'destroy'])->name('delete_property_gallery');



    /////////////////////////////////////
    Route::resource('clients', ClientController::class);

    Route::get('all_clients', [ClientController::class, 'index'])->name('all_clients');
    Route::get('delete_client/{id}', [ClientController::class, 'delete'])->name('delete_client');

    Route::get('main_projects/', [ProjectController::class, 'mainProjects'])->name('main_projects');
    Route::get('edit_project/{id}', [ProjectController::class, 'editProject'])->name('edit_project');
    Route::post('update_project/', [ProjectController::class, 'updateProject'])->name('update_project');


    Route::get('site_setting', [SiteController::class, 'siteSettings'])->name('site_setting');
    Route::post('update_site_settings', [SiteController::class, 'UpdateSiteSettings'])->name('update_site_settings');

    Route::get('all_slider_images', [SiteController::class, 'sliderImages'])->name('all_slider_images');
    Route::get('create_home_slider', [SiteController::class, 'createSliderImages'])->name('create_home_slider');
    Route::post('store_slider_image', [SiteController::class, 'storeSliderImages'])->name('store_slider_image');

    Route::get('edit_slider_images/{id}', [SiteController::class, 'EditsliderImages'])->name('edit_slider_images');

    Route::post('update_slider_images', [SiteController::class, 'updateSliderImages'])->name('update_slider_images');
    Route::get('delete_slider_image/{id}', [SiteController::class, 'deleteSliderImage'])->name('delete_slider_image');

    Route::get('account', [AdminController::class, 'profile'])->name('account');
    Route::post('update_account', [AdminController::class, 'updateAccount'])->name('update_account');

    Route::resource('locations', LocationController::class);

    Route::get('/backup_now', [SiteController::class, 'backup'])->name('backup_now');

    /* ******************************************************************************************************************** */
    /* amenities */
    Route::get('amenities/index', [AmenityController::class, 'index'])->name('admin.amenities.index');
    Route::post('amenities/save', [AmenityController::class, 'save'])->name('admin.amenities.save');
    Route::get('amenities/edit/{id}', [AmenityController::class, 'edit'])->name('admin.amenities.edit');
    Route::post('amenities/update', [AmenityController::class, 'update'])->name('admin.amenities.update');
});
