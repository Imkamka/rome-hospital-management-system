<?php

use App\Livewire\Auth\Login;
use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\Doctor;
use App\Livewire\Frontend\AboutUs;
use App\Livewire\Frontend\Contact;
use App\Livewire\Backend\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\DoctorRegister;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Frontend\DoctorView;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\PatientRegister;
use App\Livewire\Backend\Admin\Web\WebPage;
use App\Livewire\Backend\Patient\Upcomming;
use App\Livewire\Backend\Records\ViewRecord;
use App\Livewire\Backend\Appointments\Create;
use App\Livewire\Backend\Patient\EditPatient;
use App\Livewire\Backend\Patient\ViewPatient;
use App\Livewire\Backend\Admin\Users\UserList;
use App\Livewire\Backend\Patient\HealthRecord;
use App\Livewire\Backend\Records\CreateRecord;
use App\Livewire\Backend\Records\ManageRecord;
use App\Livewire\Backend\Search\PatientSearch;
use App\Livewire\Backend\Appointments\FollowUp;
use App\Livewire\Backend\Patient\CreatePatient;
use App\Livewire\Backend\Patient\FollowUpNotes;
use App\Livewire\Backend\Patient\ManagePatient;
use App\Livewire\Backend\Patient\RecordDetails;
use App\Livewire\Backend\Profile\ProfileUpdate;
use App\Livewire\Backend\Reports\PatientReport;
use App\Livewire\Backend\Appointments\Completed;
use App\Livewire\Backend\Appointments\Scheduled;
use App\Livewire\Backend\Profile\PasswordUpdate;
use App\Livewire\Backend\Admin\Doctors\DoctorList;
use App\Livewire\Backend\Search\AppointmentSearch;
use App\Livewire\Backend\Reports\AppointmentReport;
use App\Livewire\Backend\Admin\Doctors\DoctorDetail;
use App\Livewire\Backend\Admin\Doctors\DoctorReport;
use App\Livewire\Backend\Appointments\AppointmentAll;
use App\Livewire\Backend\Admin\Doctors\DoctorPatients;
use App\Livewire\Backend\Admin\Users\UsersAppointment;
use App\Livewire\Backend\Admin\Specialization\SpecEdit;
use App\Livewire\Backend\Patient\PatientMedicalRecords;
use App\Livewire\Backend\Admin\Users\UserMedicalRecords;
use App\Livewire\Backend\Appointments\AppointmentAssign;
use App\Livewire\Backend\Appointments\AppointmentDetail;
use App\Livewire\Backend\Appointments\AppointmentRecent;
use App\Livewire\Backend\Admin\Specialization\SpecCreate;
use App\Livewire\Backend\Admin\Specialization\SpecManage;
use App\Livewire\Backend\Appointments\AppointmentHistory;
use App\Livewire\Backend\Admin\Doctors\DoctorAppointments;
use App\Livewire\Backend\Admin\Notifications\NotificationsComponent;
use App\Livewire\Backend\Appointments\AppointmentApproved;
use App\Livewire\Backend\Patient\PatientMedicalRecordView;
use App\Livewire\Backend\Appointments\AppointmentCancelled;

Route::view('/test', 'test');
//Login and Registrations

Route::get('/doctor-register', DoctorRegister::class)->name('doctor.register');
Route::get('/patient-register', PatientRegister::class)->name('patient.register');
Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

//Frontend
Route::get('/', Home::class)->name('home.page');
Route::get('/frontend/doctor', Doctor::class)->name('doctor.page');
Route::get('/frontend/doctor/{id}', DoctorView::class)->name('doctor.view');
Route::get('/frontend/about-us', AboutUs::class)->name('about.page');
Route::get('/frontend/contact', Contact::class)->name('contact.page');

Route::middleware('auth')->group(function () {

    //Admin
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/create', SpecCreate::class)->name('admin.spec-create');
        Route::get('/manage', SpecManage::class)->name('admin.spec-manage');
        Route::get('/edit/{id}', SpecEdit::class)->name('admin.spec-edit');

        Route::get('/doctors-list', DoctorList::class)->name('admin.doctors-list');
        Route::get('/doctor/{id}/show', DoctorDetail::class)->name('admin.doctors-detail');
        Route::get('/doctor/{id}/appointments', DoctorAppointments::class)->name('admin.doctors-appointment');
        Route::get('/doctor/{id}/patients', DoctorPatients::class)->name('admin.doctors-patient');
        Route::get('/doctors-report', DoctorReport::class)->name('admin.doctors-report');

        Route::get('/record/{id}/manage', UserMedicalRecords::class)->name('admin.patient-record');


        Route::get('/users-list', UserList::class)->name('admin.users-list');
        Route::get('/patient/{id}/appointments', UsersAppointment::class)->name('admin.user-appointment');

        Route::get('/web-page', WebPage::class)->name('admin.web-page');

        Route::get("/notifications", NotificationsComponent::class)->name("notification.index");
    });

    //Backend
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    //Patient Management
    Route::middleware('doctor')->group(function () {
        //Lab test Records
        Route::get('/record/create/{id}', CreateRecord::class)->name('record.create');
        Route::get('/record/manage', ManageRecord::class)->name('record.manage');
        Route::get('/record/{id}', ViewRecord::class)->name('record.view');

        Route::get('/patient/manage', ManagePatient::class)->name('patient.manage');
        Route::get('/patient/create', CreatePatient::class)->name('patient.create');
        Route::get('/patient/edit/{id}', EditPatient::class)->name('patient.edit');
        Route::get('/patient/details/{id}', ViewPatient::class)->name('patient.detail');

        Route::get('/appointment/recent', AppointmentRecent::class)->name('appointment.recent');
        Route::get('/appointment/approved', AppointmentApproved::class)->name('appointment.approved');
        Route::get('/appointment/cancelled', AppointmentCancelled::class)->name('appointment.cancelled');
        Route::get('/appointment/details/{id}', AppointmentDetail::class)->name('appointment.detail');
        Route::get('/appointment/all', AppointmentAll::class)->name('appointment.all');
        Route::get('/appointment/assign', AppointmentAssign::class)->name('appointment.assign');
        Route::get('/appointment/follow-up', FollowUp::class)->name('appointment.follow-up');
        Route::get('/appointment/completed', Completed::class)->name('appointment.completed');
        Route::get('/appointment/scheduled', Scheduled::class)->name('appointment.scheduled');

        //Reports Management
        Route::get('/reports/appointments', AppointmentReport::class)->name('report.appointment');
        Route::get('/reports/patients', PatientReport::class)->name('report.patient');

        //Search Management
        Route::get('/search/appointments', AppointmentSearch::class)->name('appointment.search');
        Route::get('/search/patients', PatientSearch::class)->name('patient.search');
    });

    //Appointment Management
    Route::middleware('patient')->group(function () {
        Route::get('/appointment/create', Create::class)->name('appointment.create');
        Route::get('/appointment/history', AppointmentHistory::class)->name('appointment.history');

        Route::get('/patient/follow-up', FollowUpNotes::class)->name('patient.follow-up-notes');
        Route::get('/patient/upcomming', Upcomming::class)->name('patient.upcomming');
        Route::get('/patient/health-records', HealthRecord::class)->name('patient.health-records');
        Route::get('/patient/record-detail/{id}', RecordDetails::class)->name('patient.record-detail');
        Route::get('/patient/medical-records', PatientMedicalRecords::class)->name('patient.medical-record');
        Route::get('/patient/medical-records/{id}/detail', PatientMedicalRecordView::class)->name('patient.medical-record-detail');
    });

    //Profile Management
    Route::get('/profile/update/{id}', ProfileUpdate::class)->name('profile.update')->middleware('own.data');
    Route::get('/profile/update-password/{id}', PasswordUpdate::class)->name('profile.password.update')->middleware('own.data');
});
Auth::routes(["register" => false, "login" => false]);

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
