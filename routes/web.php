<?php
//ADMIN SIDE
	// Dashboard
	Route::resource('/', 'adminDashboardController');

	// Maintenance
		//Dogs
		Route::resource('/adminDogs', 'adminDogsController');
		Route::post('/adminDogs/insertDog', 'adminDogsController@insertDog');
		Route::post('/adminDogs/deleteDog', 'adminDogsController@deleteDog');

		//Adoption Request
		Route::resource('/adminAdoptionRequest', 'adminAdoptionRequestController');

		//Missing Reports
		Route::resource('/adminMissingReports', 'adminMissingReportsController');

	//Messages
		//Stray Reports
		Route::resource('/adminStrayReports', 'adminStrayReportsController');

	//Account
		//Account Setting
		Route::resource('/adminAccountSettings', 'adminAccountSettingsController');