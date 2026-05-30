<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\CandidateController;

use App\Http\Controllers\Recruiter\JobController;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\Candidate\JobApplyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {

    $user = auth()->user();

    if($user->role == 'admin'){
        return redirect('/admin/dashboard');
    }

    if($user->role == 'recruiter'){
        return redirect('/recruiter/dashboard');
    }

    return redirect('/  /dashboard');

})->middleware('auth');



Route::middleware(['auth','role:admin'])->group(function () {

    Route::get('/admin/dashboard',
        [AdminController::class,'dashboard']);

});

// Route::middleware(['auth','role:recruiter'])->group(function () {

//     Route::get('/recruiter/dashboard',
//         [RecruiterController::class,'dashboard']);

// });

// Route::middleware(['auth','role:candidate'])->group(function () {

//     Route::get('/candidate/dashboard',
//         [CandidateController::class,'dashboard']);

// });



Route::middleware(['auth','role:recruiter'])->prefix('recruiter')->group(function () {
    Route::get('/dashboard', [RecruiterController::class,'dashboard']);
    Route::resource('jobs', JobController::class);

});





Route::middleware(['auth','role:candidate'])->prefix('candidate')->group(function () {
    Route::get('/dashboard', [CandidateController::class,'dashboard']);
    Route::get('/resume/upload', [ResumeController::class,'create'])->name('resume.create');
    Route::post('/resume/upload', [ResumeController::class,'store'])->name('resume.store');
    Route::get('/my-resume', [ResumeController::class,'index'])->name('resume.index');
    
    Route::get('/jobs', [JobApplyController::class,'jobs'])->name('candidate.jobs');
    Route::post('/jobs/apply/{jobId}', [JobApplyController::class,'apply'])->name('candidate.apply');
});




require __DIR__.'/auth.php';
