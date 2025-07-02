<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('home');
});
Route::resource('formateurs', FormateurController::class);
Route::match(['get', 'post'], '/site', [App\Http\Controllers\SiteController::class, 'index'])->name('siteweb');
Route::get('/cv/download/{id}', [App\Http\Controllers\FormateurController::class, 'downloadCV'])->name('cv.downloadCV');
Route::get('/attes/download/{id}', [App\Http\Controllers\FormateurController::class, 'downloadAttes'])->name('attes.downloadAttes');
Route::get('/diplome/download/{id}', [App\Http\Controllers\FormateurController::class, 'downloadDiplome'])->name('diplome.downloadDiplome');


Route::match(['get', 'post'], 'candidat/approve/{id}',  [App\Http\Controllers\CandidatController::class, 'approve'])->name('candidat.approve');


Route::get('/delete/candidat/{id}', [App\Http\Controllers\CandidatController::class, 'delete'])->name('candidat.delete'); //route de bouton supprimer

Route::get('/cv/download/{id}', [App\Http\Controllers\CandidatController::class, 'downloadCV'])->name('cv.downloadCV');


Route::get('/candidat/show/{id}', [App\Http\Controllers\CandidatController::class, 'show'])->name('candidat.show');

Route::match(['get', 'post'], '/candidat/index', [App\Http\Controllers\CandidatController::class, 'index'])->name('candidat.index');


Route::match(['get', 'post'], '/recrutement/ajouterCandidat', [App\Http\Controllers\CandidatController::class, 'ajouterCandidat'])->name('candidat.ajouterCandidat');
Route::match(['get', 'post'], '/addCandidat/recrutement', [App\Http\Controllers\CandidatController::class, 'storeCandidat'])->name('candidat.storeCandidat');

Route::resource('user', UserController::class);
Route::post('user/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');




Route::match(['get', 'post'], '/recrutement/index', [App\Http\Controllers\RecrutementController::class, 'index'])->name('recrutement.index');

// Route::match(['get', 'post'],'/recrutement/createCand', [App\Http\Controllers\ShowRecrutementController::class, 'createCand'])->name('recrutement.createCand');
Route::match(['get', 'post'], '/recrutement/createCand/{recrutement_id}', [App\Http\Controllers\ShowRecrutementController::class, 'createCand'])->name('recrutement.createCand');


Route::match(['get', 'post'], '/recrutement/candidat/{id}', [App\Http\Controllers\RecrutementController::class, 'indexcand'])->name('recrutement.indexcand');

Route::match(['get', 'post'], '/recrutement/create', [App\Http\Controllers\RecrutementController::class, 'create'])->name('recrutement.create');
Route::match(['get', 'post'], '/add/recrutement', [App\Http\Controllers\RecrutementController::class, 'store'])->name('recrutement.store');

Route::match(['get', 'post'], '/edit/recrutement/{id}', [App\Http\Controllers\RecrutementController::class, 'edit'])->name('recrutement.edit'); //route de bouton modifier
Route::match(['get', 'post'], '/update/recrutement/{id}', [App\Http\Controllers\RecrutementController::class, 'update'])->name('recrutement.update'); //route de bouton modifier2



Route::get('/delete/recrutement/{id}', [App\Http\Controllers\RecrutementController::class, 'delete'])->name('recrutement.delete'); //route de bouton supprimer
Route::get('/recrutement/show', [App\Http\Controllers\ShowRecrutementController::class, 'show'])->name('recrutement.show');



/*stage */
Route::match(['get', 'post'], 'candidatStage/approve/{id}',  [App\Http\Controllers\CandidatStageController::class, 'approve'])->name('candidatStage.approve');


Route::get('/delete/candidatStage/{id}', [App\Http\Controllers\CandidatStageController::class, 'delete'])->name('candidatStage.delete'); //route de bouton supprimer

Route::get('/cv/downloadStage/{id}', [App\Http\Controllers\CandidatStageController::class, 'downloadCVStage'])->name('cv.downloadCVStage');


Route::get('/candidatStage/show/{id}', [App\Http\Controllers\CandidatStageController::class, 'show'])->name('candidatStage.show');

Route::match(['get', 'post'], '/candidatStage/index', [App\Http\Controllers\CandidatStageController::class, 'index'])->name('candidatStage.index');


Route::match(['get', 'post'], '/recrutementStage/ajoutercandidatStage', [App\Http\Controllers\CandidatStageController::class, 'ajoutercandidatStage'])->name('candidatStage.ajoutercandidatStage');
Route::match(['get', 'post'], '/addcandidatStage/recrutementStage', [App\Http\Controllers\CandidatStageController::class, 'storecandidatStage'])->name('candidatStage.storecandidatStage');





Route::match(['get', 'post'], '/recrutementStage/index', [App\Http\Controllers\RecrutementStageController::class, 'index'])->name('recrutementStage.index');

// Route::match(['get', 'post'],'/recrutementStage/createCand', [App\Http\Controllers\ShowrecrutementStageController::class, 'createCand'])->name('recrutementStage.createCand');
Route::match(['get', 'post'], '/recrutementStage/createCand/{recrutement_id}', [App\Http\Controllers\ShowRecrutementStageController::class, 'createCand'])->name('recrutementStage.createCand');


Route::match(['get', 'post'], '/recrutementStage/candidatStage/{id}', [App\Http\Controllers\RecrutementStageController::class, 'indexcand'])->name('recrutementStage.indexcand');

Route::match(['get', 'post'], '/recrutementStage/create', [App\Http\Controllers\RecrutementStageController::class, 'create'])->name('recrutementStage.create');
Route::match(['get', 'post'], '/add/recrutementStage', [App\Http\Controllers\RecrutementStageController::class, 'store'])->name('recrutementStage.store');

Route::match(['get', 'post'], '/edit/recrutementStage/{id}', [App\Http\Controllers\RecrutementStageController::class, 'edit'])->name('recrutementStage.edit'); //route de bouton modifier
Route::match(['get', 'post'], '/update/recrutementStage/{id}', [App\Http\Controllers\RecrutementStageController::class, 'update'])->name('recrutementStage.update'); //route de bouton modifier2



Route::get('/delete/recrutementStage/{id}', [App\Http\Controllers\RecrutementStageController::class, 'delete'])->name('recrutementStage.delete'); //route de bouton supprimer
Route::get('/recrutementStage/show', [App\Http\Controllers\ShowRecrutementStageController::class, 'show'])->name('recrutementStage.show');

//formation


Route::match(['get', 'post'], '/recrutementFormation/index', [App\Http\Controllers\RecrutementFormationController::class, 'index'])->name('recrutementFormation.index');


Route::match(['get', 'post'], '/recrutementFormation/candidatFormation/{id}', [App\Http\Controllers\RecrutementFormationController::class, 'indexcand'])->name('recrutementFormation.indexcand');

Route::match(['get', 'post'], '/recrutementFormation/create', [App\Http\Controllers\RecrutementFormationController::class, 'create'])->name('recrutementFormation.create');
Route::match(['get', 'post'], '/add/recrutementFormation', [App\Http\Controllers\RecrutementFormationController::class, 'store'])->name('recrutementFormation.store');

Route::match(['get', 'post'], '/edit/recrutementFormation/{id}', [App\Http\Controllers\RecrutementFormationController::class, 'edit'])->name('recrutementFormation.edit'); //route de bouton modifier
Route::match(['get', 'post'], '/update/recrutementFormation/{id}', [App\Http\Controllers\RecrutementFormationController::class, 'update'])->name('recrutementFormation.update'); //route de bouton modifier2



Route::get('/delete/recrutementFormation/{id}', [App\Http\Controllers\RecrutementFormationController::class, 'delete'])->name('recrutementFormation.delete'); //route de bouton supprimer
Route::get('/recrutementFormation/show', [App\Http\Controllers\ShowRecrutementFormationController::class, 'show'])->name('recrutementFormation.show');


Route::match(['get', 'post'], '/formateur/crate/{recrutement_id}', [App\Http\Controllers\ShowRecrutementFormationController::class, 'create'])->name('home');
Route::match(['get', 'post'], '/recrutementFormation/formateur/{id}', [App\Http\Controllers\RecrutementFormationController::class, 'indexcand'])->name('recrutementFormation.indexcand');

Route::match(['get', 'post'], '/recrutementFormation/ajoutercandidatFormation', [App\Http\Controllers\FormateurController::class, 'create'])->name('formateur.create');
Route::match(['get', 'post'], '/addcandidatFormation/recrutementFormation', [App\Http\Controllers\FormateurController::class, 'store'])->name('formateur.store');



Route::get('profile',[ProfileController::class,'index'])->name('admin.profile');
Route::post('update-profile-info',[ProfileController::class,'updateInfo'])->name('adminUpdateInfo');
Route::post('change-profile-picture',[ProfileController::class,'updatePicture'])->name('adminPictureUpdate');
Route::post('change-password',[ProfileController::class,'changePassword'])->name('adminChangePassword');


Auth::routes();

