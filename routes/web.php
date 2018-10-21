<?php
//ADMIN SIDE
	// Login
	Route::resource('/admin','adminLoginController');
	
	// Dashboard
	Route::resource('/adminDashboard', 'adminDashboardController');

	// Maintenance
		//Dogs
		Route::resource('/adminDogs', 'adminDogsController');
		Route::post('/adminSearchedDogs', 'adminDogsController@searchDog');
		Route::post('/adminDogs/insertDog', 'adminDogsController@insertDog');
		Route::post('/adminDogs/editDog', 'adminDogsController@editDog');
		Route::post('/adminDogs/deleteDog', 'adminDogsController@deleteDog');

		//Adoption Request
		Route::resource('/adminAdoptionRequest', 'adminAdoptionRequestController');
		Route::post('/adminSearchedAdoptionRequest', 'adminApprovedApplicationController@search');
		Route::post('/adminAdoptionRequest/deleteApplication', 'adminAdoptionRequestController@deleteApplication');
		Route::post('/adminAdoptionRequest/approveApplication', 'adminAdoptionRequestController@approveApplication');

		//Approved Application
		Route::resource('/adminApprovedApplication', 'adminApprovedApplicationController');
		Route::post('/adminSearchedApprovedApplication', 'adminApprovedApplicationController@search');
		Route::post('/adminApprovedApplication/approve', 'adminApprovedApplicationController@approve');
		Route::post('/adminApprovedApplication/disapprove', 'adminApprovedApplicationController@disapprove');

		//Missing Reports
		Route::resource('/adminMissingReports', 'adminMissingReportsController');
		Route::post('/adminSearchedMissingReports', 'adminMissingReportsController@searchReport');
		Route::post('/adminMissingReports/deleteReport', 'adminMissingReportsController@deleteReport');
		Route::post('/adminMissingReports/approveReport', 'adminMissingReportsController@approveReport');

	//Messages
		//Stray Reports
		Route::resource('/adminStrayReports', 'adminStrayReportsController');
		Route::post('/adminSearchedStrayReports', 'adminStrayReportsController@searchStrayReport');
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

	//Form
	Route::post('/contact/new','customerContactController@insert');

	//Adopt
	Route::resource('/adopt','customerAdoptController');
		Route::get('/adopt/{id}','customerAdoptController@show');
		Route::post('/adopt/{id}/submit','customerAdoptController@submit');

	//Missing
	Route::resource('/missing','customerMissingController');
		//File a report
		Route::get('/missing/file','customerReportMissingController@index');
		Route::post('/missing/file/submit','customerReportMissingController@submit');

	//About
	Route::resource('/about','customerAboutController');
