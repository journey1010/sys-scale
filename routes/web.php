<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('akdemic/login',[ 'uses' => 'Auth\LoginController@getLoginAkdemic' ]);
Route::get('akdemic/signin-oidc',[ 'uses' => 'Auth\LoginController@getSigninAkdemic' ]);
Route::get('akdemic/signout-callback-oidc',[ 'uses' => 'Auth\LoginController@getSignoutAkdemic' ]);
//Route::get('/profile', 'ProfileController@index');

Route::middleware(['role:admin'])->group(function () {
    Route::get('staff_management', 'Profile\StaffManagementController@index')->name('staffManagement');
    Route::post('staff_management', 'Profile\StaffManagementController@create')->name('addUser');
    Route::post('staff_management/edit', 'Profile\StaffManagementController@edit')->name('editUser');
    Route::get('delete/staff_management/{id}', 'Profile\StaffManagementController@delete')->name('deleteUser');
});


Route::group(['middleware' => ['role:admin|personal']], function () {



    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/index', 'HomeController@index')->name('/');

    Route::prefix('personal_identification')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'PersonalIdentificationController@index')->name('personalIdentificationIndex');
        Route::get('/sheet/{id?}', 'PersonalIdentificationController@sheet')->name('personalIdentificationSheet');

        Route::post('/submit','PersonalIdentificationController@postData')->name('personalIdentificationSubmit');

        Route::post('/open', 'PersonalIdentificationController@open')->name('personalIdentificationOpen');

        Route::post('/update', 'PersonalIdentificationController@update')->name('personalIdentificationUpdate');
        Route::get('/getProvinces', 'PersonalIdentificationController@getProvinces')->name('personalIdentificationGetProvinces');
        Route::get('/getDistricts', 'PersonalIdentificationController@getDistricts')->name('personalIdentificationGetDistricts');
    });

    Route::prefix('entries')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'EntryController@index')->name('entriesIndex');
        Route::get('/detail/{id?}', 'EntryController@detail')->name('entriesDetail');
        Route::get('/edit/{id?}', 'EntryController@edit')->name('entriesEdit');
        Route::post('/edit', 'EntryController@editPost')->name('entriesEditPost');
        Route::get('/create/{user_id?}', 'EntryController@create')->name('entriesCreate');
        Route::post('/create', 'EntryController@createPost')->name('entriesCreatePost');
    });

    Route::prefix('academic')->namespace('Profile')->group(function () {
        Route::get('/primary_education/{id?}', 'AcademicTrainingController@getPrimaryEducation')->name('primaryEducation');
        Route::get('/secondary_education/{id?}', 'AcademicTrainingController@getSecondaryEducation')->name('secondaryEducation');
        Route::get('/university_education/{id?}', 'AcademicTrainingController@getUniversityEducation')->name('universityEducation');
        Route::get('/professional_title/{id?}', 'AcademicTrainingController@getProfessionalTitle')->name('professionalTitle');
        Route::get('/tuition_information/{id?}', 'AcademicTrainingController@getTuitionInformation')->name('tuitionInformation');
        Route::get('/master_doctor_degree/{id?}', 'AcademicTrainingController@getMasterDoctorDegree')->name('masterDoctorDegree');
        Route::get('/postgraduate_information/{id?}', 'AcademicTrainingController@getPostgraduateInformation')->name('postgraduateInformation');
        Route::get('/other_studies/{id?}', 'AcademicTrainingController@getOtherStudies')->name('otherStudies');
        Route::get('/all_studies/{id?}', 'AcademicTrainingController@getAll')->name('allStudies');
    });

    Route::prefix('career')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'CareerPathController@index')->name('careerIndex');
    });

    Route::prefix('retirement')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'RetirementController@index')->name('retirementIndex');
        Route::get('/resolutions', 'RetirementController@resolutions')->name('retirementResolutionsIndex');
    });

    Route::prefix('permit')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'PermitController@index')->name('permitIndex');
    });

    Route::prefix('sanction')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'SanctionController@index')->name('sanctionIndex');
    });

    Route::prefix('license')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'LicenseController@index')->name('licenseIndex');
        Route::post('/post', 'LicenseController@create')->name('postLicence');

        Route::post('/vacation/delete', 'LicenseController@deleteVacation');
        Route::post('/vacation/post', 'LicenseController@postVacation')->name('postCreateVacation');
        Route::get('/vacation/detail/{id}', 'LicenseController@detailVacation')->name('vacation.detail.get');
        Route::get('/vacation/edit/{id}', 'LicenseController@editVacation')->name('vacation.edit.get');
        Route::post('/vacation/edit', 'LicenseController@editVacationPost')->name('vacation.edit.post');

        Route::post('/license/post', 'LicenseController@postLicense')->name('postCreateLicense');
        Route::get('/license/detail/{id}', 'LicenseController@detailLicense')->name('license.detail.get');
        Route::get('/license/edit/{id}', 'LicenseController@editLicense')->name('license.edit.get');
        Route::post('/license/edit', 'LicenseController@editLicensePost')->name('license.edit.post');
        Route::post('/license/delete', 'LicenseController@deleteLicense');

        Route::post('/permit/post', 'LicenseController@postPermit')->name('postCreatePermit');
        Route::get('/permit/detail/{id}', 'LicenseController@detailPermit')->name('permit.detail.get');
        Route::get('/permit/edit/{id}', 'LicenseController@editPermit')->name('permit.edit.get');
        Route::post('/permit/edit', 'LicenseController@editPermitPost')->name('permit.edit.post');
        Route::post('/permit/delete', 'LicenseController@deletePermit');

        Route::post('/suspension_vacation/delete', 'LicenseController@deleteSuspensionVacation');
        Route::post('/suspension_vacation/post', 'LicenseController@postSuspensionVacation')->name('postCreateSuspensionVacation');
        Route::get('/suspension_vacation/detail/{id}', 'LicenseController@detailSuspensionVacation')->name('suspensionvacation.detail.get');
        Route::get('/suspension_vacation/edit/{id}', 'LicenseController@editSuspensionVacation')->name('suspensionvacation.edit.get');
        Route::post('/suspension_vacation/edit', 'LicenseController@editSuspensionVacationPost')->name('suspensionvacation.edit.post');

        Route::post('/special_license/post', 'LicenseController@postSpecialLicense')->name('postCreateSpecialLicense');
        Route::get('/special_license/detail/{id}', 'LicenseController@detailSpecialLicense')->name('speciallicense.detail.get');
        Route::get('/special_license/edit/{id}', 'LicenseController@editSpecialLicense')->name('speciallicense.edit.get');
        Route::post('/special_license/edit', 'LicenseController@editSpecialLicensePost')->name('speciallicense.edit.post');
        Route::post('/special_license/delete', 'LicenseController@deleteSpecialLicense');
    });

    Route::prefix('other')->namespace('Profile')->group(function () {
        Route::get('/index/{id?}', 'OtherController@index')->name('otherIndex');
    });

    Route::prefix('resolution')->group(function () {
        Route::get('/list/{id_resolution_type}/{id_user?}/{id_section?}', 'ResolutionController@getResolutions')->name('getResolutions');
        Route::get('/detail/{id_resolution}', 'ResolutionController@detail')->name('detailResolution');

        Route::post('/create', 'ResolutionController@create')->name('createResolution');
        Route::get('/edit/{id_resolution}', 'ResolutionController@edit')->name('editResolution');
        Route::post('/update', 'ResolutionController@update')->name('updateResolution');
        Route::get('/delete/{id_resolution}', 'ResolutionController@delete')->name('deleteResolution');

        Route::get('/resignation/{id}', 'ResolutionController@resignationIndex')->name('renuncias');
        Route::get('/evaluation/{id}', 'ResolutionController@evaluationIndex')->name('evaluacion');
        Route::get('/production/{id}', 'ResolutionController@productionIndex')->name('produccionintelectual');
        Route::get('/displacement/{id}', 'ResolutionController@displacementIndex')->name('displacement');
    });

    Route::prefix('resolution_type')->group(function () {
        Route::get('/index', 'ResolutionTypeController@getAll')->name('getResolutionTypes');

        Route::post('/create', 'ResolutionTypeController@create')->name('createResolutionType');
        Route::get('/edit/{id_resolution_type}', 'ResolutionTypeController@edit')->name('editResolutionType');
        Route::post('/update', 'ResolutionTypeController@update')->name('updateResolutionType');
        Route::get('/delete/{id_resolution_type}', 'ResolutionTypeController@delete')->name('deleteResolutionType');

    });

    Route::prefix('section')->group(function () {
        Route::get('/index', 'SectionController@getAll')->name('getSections');
        Route::get('/detail/{id_section}', 'SectionController@detail')->name('detailSection');

        Route::post('/create', 'SectionController@create')->name('createSection');
        Route::get('/edit/{id_section}', 'SectionController@edit')->name('editSection');
        Route::post('/update', 'SectionController@update')->name('updateSection');
        Route::get('/delete/{id_section}', 'SectionController@delete')->name('deleteSection');

        Route::post('/create_annex', 'SectionController@createAnnex')->name('createSectionAnnex');
        Route::get('/delete_annex/{id_section_annex}', 'SectionController@deleteAnnex')->name('deleteSectionAnnex');

    });


});

Route::group(['middleware' => ['role:admin']], function () {

    Route::prefix('depcon')->group(function () {
        Route::get('laborconditional','ManageController@getIndexLaborConditional')->name('laborconditional');
        Route::get('dependence','ManageController@getIndexDependenc')->name('dependence');

        Route::post('savelaborconditional','ManageController@postLaborConditional')->name('savelaborconditional');
        Route::post('updatelaborconditional','ManageController@postLaborConditionalUpdate')->name('updatelaborconditional');
        Route::get('deletelaborconditional/{id}','ManageController@postLaborConditionalDelete')->name('deletelaborconditional');

        Route::post('savedependence','ManageController@postDependence')->name('savedependence');
        Route::post('updatedependence','ManageController@postDependenceUpdate')->name('updatedependence');
        Route::get('deletedependence/{id}','ManageController@postDependenceDelete')->name('deletedependence');


    });



    Route::prefix('admin')->namespace('Profile')->group(function () {
        Route::get('/primary_education/{id_user}', 'AcademicTrainingController@savePrimaryEducation')->name('savePrimaryEducation');
        Route::get('/secondary_education/{id_user}', 'AcademicTrainingController@saveSecondaryEducation')->name('saveSecondaryEducation');
        Route::get('/university_education/{id_user}/{id?}', 'AcademicTrainingController@saveUniversityEducation')->name('saveUniversityEducation');
        Route::get('/professional_title/{id_user}', 'AcademicTrainingController@saveProfessionalTitle')->name('saveProfessionalTitle');
        Route::get('/tuition_information/{id_user}', 'AcademicTrainingController@saveTuitionInformation')->name('saveTuitionInformation');
        Route::get('/master_doctor_degree/{id_user}/{id?}', 'AcademicTrainingController@saveMasterDoctorDegree')->name('saveMasterDoctorDegree');
        Route::get('/postgraduate_information/{id_user}/{id?}', 'AcademicTrainingController@savePostgraduateInformation')->name('savePostgraduateInformation');
        Route::get('/other_studies/{id_user}/{id?}', 'AcademicTrainingController@saveOtherStudies')->name('saveOtherStudies');

        Route::prefix('post')->group(function () {
            Route::post('/primary_education', 'AcademicTrainingController@postPrimaryEducation')->name('postPrimaryEducation');
            Route::post('/secondary_education', 'AcademicTrainingController@postSecondaryEducation')->name('postSecondaryEducation');
            Route::post('/university_education', 'AcademicTrainingController@postUniversityEducation')->name('postUniversityEducation');
            Route::post('/professional_title', 'AcademicTrainingController@postProfessionalTitle')->name('postProfessionalTitle');
            Route::post('/tuition_information', 'AcademicTrainingController@postTuitionInformation')->name('postTuitionInformation');
            Route::post('/master_doctor_degree', 'AcademicTrainingController@postMasterDoctorDegree')->name('postMasterDoctorDegree');
            Route::post('/postgraduate_information', 'AcademicTrainingController@postPostgraduateInformation')->name('postPostgraduateInformation');
            Route::post('/other_studies', 'AcademicTrainingController@postOtherStudies')->name('postOtherStudies');
        });

        Route::prefix('delete')->group(function () {
            Route::get('/university_education', 'AcademicTrainingController@deleteUniversityEducation')->name('deleteUniversityEducation');
            Route::get('/professional_title', 'AcademicTrainingController@deleteProfessionalTitle')->name('deleteProfessionalTitle');
            Route::get('/tuition_information', 'AcademicTrainingController@deleteTuitionInformation')->name('deleteTuitionInformation');
            Route::get('/master_doctor_degree', 'AcademicTrainingController@deleteMasterDoctorDegree')->name('deleteMasterDoctorDegree');
            Route::get('/postgraduate_information', 'AcademicTrainingController@deletePostgraduateInformation')->name('deletePostgraduateInformation');
            Route::get('/other_studies', 'AcademicTrainingController@deleteOtherStudies')->name('deleteOtherStudies');
        });

    });

    Route::prefix('assignment')->group(function () {
        Route::get('/index/{id?}', 'AssignmentController@index')->name('getAssignments');
        Route::get('/resolutions', 'AssignmentController@resolutions')->name('getAssignmentsResolutions');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/', function () { return redirect('reports/resolution'); })->name('reports');
        Route::get('/resolution', 'ReportController@index')->name('getReportsResolutions');
        Route::get('/employment', 'ReportController@employments')->name('getReportsEmployments');
        Route::get('/geographical', 'ReportController@geographical')->name('getReportsGeographical');
        Route::get('/license', 'ReportController@license')->name('getReportsVacation');
        Route::get('/escalafon', 'ReportController@escalafon')->name('getReportsEscalafon');
        Route::get('/escalafon/download/{id}', 'WordController@escalafonWord')->name('downloadEscalafonReport');
        Route::get('/authorities', 'ReportController@authorities')->name('getReportsAuthorities');
        Route::get('/displacements', 'ReportController@displacement')->name('getReportsDisplacements');
        Route::get('/constancy', 'ReportController@constancy')->name('getReportsConstancies');
        Route::get('/constancy/download/{id}', 'WordController@constancyWord')->name('downloadConstancyReport');
        Route::get('/escalafonpdf/download/{id}', 'PdfController@escalafonPdf')->name('downloadEscalafonReportpdf');

    });
});