<?php
//ADMIN SIDE
	// Login
	Route::resource('/admin','adminLoginController');
	// Dashboard
	Route::resource('/adminDashboard', 'adminDashboardController');

	// Maintenance
		//Dogs
		Route::resource('/adminDogs', 'adminDogsController');
		Route::post('/adminDogs/insertDog', 'adminDogsController@insertDog');
		Route::post('/adminDogs/editDog', 'adminDogsController@editDog');
		Route::post('/adminDogs/deleteDog', 'adminDogsController@deleteDog');

		//Adoption Request
		Route::resource('/adminAdoptionRequest', 'adminAdoptionRequestController');

		//Missing Reports
		Route::resource('/adminMissingReports', 'adminMissingReportsController');

	//Messages
		//Stray Reports
		Route::resource('/adminStrayReports', 'adminStrayReportsController');
		Route::post('/adminStrayReports/sendReply', 'adminStrayReportsController@replyStrayReport');
		Route::post('/adminStrayReports/deleteReport', 'adminStrayReportsController@deleteReport');

	//Account
		//Account Setting
		Route::resource('/adminAccountSettings', 'adminAccountSettingsController');

//CUSTOMER SIDE
	//Home
	Route::resource('/','customerHomeController');

	//Contact
	Route::resource('/contact','customerContactController');

	//Adopt
	Route::resource('/adopt','customerAdoptController');

	//Missing
	Route::resource('/missing','customerMissingController');

	//About
	Route::resource('/about','customerAboutController');
