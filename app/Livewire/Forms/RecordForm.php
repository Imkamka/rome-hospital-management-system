<?php

namespace App\Livewire\Forms;

use App\Models\Attachment;
use App\Models\Diagnostic;
use App\Models\General;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordHistory;
use App\Models\PhysicalExam;
use App\Models\SkinExam;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecordForm extends Form
{

    public $record_id;
    //Record
    #[Validate('required|unique:medical_records,record_number,except,record_number|string|max:255')]
    public $record_number;

    #[Validate('nullable|string')]
    public $consultation_type;

    #[Validate('nullable|string|max:255')]
    public $referred_by;

    #[Validate('nullable|date')]
    public $record_date;

    #[Validate('nullable|string|max:255')]
    public $clinic;

    #[Validate('nullable|string|max:255')]
    public $habits;

    #[Validate('nullable|email|max:255')]
    public $email;

    #[Validate('nullable|in:Male,Female')]
    public $gender;

    #[Validate('nullable|string|max:255')]
    public $place_of_residence;

    #[Validate('nullable|string|max:255')]
    public $socio_economic_status;

    #[Validate('nullable|string|max:255')]
    public $education_level;

    #[Validate('nullable|string|max:15')]
    public $phone;

    public function storeRecord(int $patient_id)
    {
        $medical_record = MedicalRecord::create([
            "patient_id" => $patient_id,
            "doctor_id" => auth()->id(),
            "record_number" => $this->record_number,
            "consultation_type" => $this->consultation_type,
            "referred_by" => $this->referred_by,
            "record_date" => $this->record_date,
            "clinic" => $this->clinic,
            "habits" => $this->habits,
            "email" => $this->email,
            "gender" => $this->gender,
            "place_of_residence" => $this->place_of_residence,
            "socio_economic_status" => $this->socio_economic_status,
            "education_level" => $this->education_level,
            "phone" => $this->phone,
        ]);

        $this->record_id = $medical_record->id;
    }

    // Record Medical History Fields
    #[Validate('nullable|in:Yes,No')]
    public $pathologies;

    #[Validate('nullable|required_if:pathologies,Yes|string|max:255')]
    public $pathologies_comments;

    #[Validate('nullable|in:Yes,No')]
    public $allergies;

    #[Validate('nullable|required_if:allergies,Yes|string|max:255')]
    public $allergy_comments;

    #[Validate('nullable|in:Yes,No')]
    public $surgeries_hospitalizations;

    #[Validate('nullable|required_if:surgeries_hospitalizations,Yes|string|max:255')]
    public $surgeries_hospitalizations_comments;

    #[Validate('nullable|in:Yes,No')]
    public $pre_plastic_surgeries;

    #[Validate('nullable|required_if:pre_plastic_surgeries,Yes|string|max:255')]
    public $pre_plastic_surgeries_comments;

    #[Validate('nullable|in:Yes,No')]
    public $smoking;

    #[Validate('nullable|required_if:smoking,Yes|string|max:255')]
    public $smoking_comments;

    #[Validate('nullable|in:Yes,No')]
    public $alcohol;

    #[Validate('nullable|required_if:alcohol,Yes|string|max:255')]
    public $alcohol_comments;

    #[Validate('nullable|in:Yes,No')]
    public $phy_activity;

    #[Validate('nullable|required_if:phy_activity,Yes|string|max:255')]
    public $phy_activity_comments;

    public function storeMedicalHistory()
    {
        MedicalRecordHistory::create([
            'medical_record_id' => $this->record_id,
            'pathologies' => $this->pathologies,
            'pathologies_comments' => $this->pathologies_comments,
            'allergies' => $this->allergies,
            'allergy_comments' => $this->allergy_comments,
            'surgeries_hospitalizations' => $this->surgeries_hospitalizations,
            'surgeries_hospitalizations_comments' => $this->surgeries_hospitalizations_comments,
            'pre_plastic_surgeries' => $this->pre_plastic_surgeries,
            'pre_plastic_surgeries_comments' => $this->pre_plastic_surgeries_comments,
            'smoking' => $this->smoking,
            'smoking_comments' => $this->smoking_comments,
            'alcohol' => $this->alcohol,
            'alcohol_comments' => $this->alcohol_comments,
            'phy_activity' => $this->phy_activity,
            'phy_activity_comments' => $this->phy_activity_comments,
        ]);
    }
    // General Form Fields with Validation Attributes

    #[Validate('nullable|string|max:255')]
    public $consultation_for;

    #[Validate('nullable|string')]
    public $current_illness;

    #[Validate('nullable|date')]
    public $date;

    #[Validate('nullable|date_format:H:i')]
    public $time;

    #[Validate('nullable|integer|min:0|max:300')]
    public $heart_rate;

    #[Validate('nullable|integer')]
    public $respiratory_rate;

    #[Validate('nullable|string|max:255')]
    public $bp;

    #[Validate('nullable|numeric')]
    public $temperature;

    #[Validate('nullable|integer|min:0|max:100')]
    public $spo2_saturation;

    #[Validate('nullable|integer|min:0|max:500')]
    public $capillary_glucose;

    #[Validate('nullable|string')]
    public $system_review;

    public function storeGeneral()
    {
        General::create([
            'medical_record_id' => $this->record_id,
            'consultation_for' => $this->consultation_for,
            'current_illness' => $this->current_illness,
            'date' => $this->date,
            'time' => $this->time,
            'heart_rate' => $this->heart_rate,
            'respiratory_rate' => $this->respiratory_rate,
            'bp' => $this->bp,
            'temperature' => $this->temperature,
            'spo2_saturation' => $this->spo2_saturation,
            'capillary_glucose' => $this->capillary_glucose,
            'system_review' => $this->system_review,
        ]);
    }

    //Diagnostics form fields
    #[Validate('nullable|string|max:255')]
    public $general;

    #[Validate('nullable|string|max:255')]
    public $facial;

    #[Validate('nullable|string|max:255')]
    public $dermatological_facial;

    #[Validate('nullable|string|max:255')]
    public $physiotherapy;

    public function storeDiagnostics()
    {
        Diagnostic::create([
            'medical_record_id' => $this->record_id,
            'general' => $this->general,
            'facial' => $this->facial,
            'dermatological_facial' => $this->dermatological_facial,
            'physiotherapy' => $this->physiotherapy,
        ]);
    }

    // Physical Exam form fields

    // Head Front Comment
    #[Validate('nullable|string|max:255')]
    public $head_front_comment;

    // Head Side Comment
    #[Validate('nullable|string|max:255')]
    public $head_side_comment;

    // Head Back Comment
    #[Validate('nullable|string|max:255')]
    public $head_back_comment;

    // Upper Limbs Comment
    #[Validate('nullable|string|max:255')]
    public $upper_limbs;

    // Torso and Abdomen Comment
    #[Validate('nullable|string|max:255')]
    public $torso_abdomen;

    // Lower Limbs Comment
    #[Validate('nullable|string|max:255')]
    public $lower_limbs;

    // Back and Glutes Comment
    #[Validate('nullable|string|max:255')]
    public $back_glutes;

    public function storePhyExam()
    {
        PhysicalExam::create([
            'medical_record_id' => $this->record_id,
            'head_front_comment' => $this->head_front_comment,
            'head_side_comment' => $this->head_side_comment,
            'head_back_comment' => $this->head_back_comment,
            'upper_limbs' => $this->upper_limbs,
            'torso_abdomen' => $this->torso_abdomen,
            'lower_limbs' => $this->lower_limbs,
            'back_glutes' => $this->back_glutes,
        ]);
    }

    // Skin Exam form fields

    #[Validate('nullable|integer|min:1|max:6')]
    public $score;
    // Wrinkle Analysis Comment
    #[Validate('nullable|string|max:255')]
    public $wrinkle_comment;

    // Fitzpatrick Scale Comment
    #[Validate('nullable|string|max:255')]
    public $fitz_comment;

    // Sun Exposure Time Comment
    #[Validate('nullable|string|max:255')]
    public $sun_exposure;

    // Dermatological Lesion and Type Comment
    #[Validate('nullable|string|max:255')]
    public $dermatological_lesion_type;

    // Sunscreen Use Comment
    #[Validate('nullable|string|max:255')]
    public $sun_screen;



    public function storeSkinExam()
    {
        SkinExam::create([
            'medical_record_id' => $this->record_id,
            'score' => $this->score,
            'wrinkle_comment' => $this->wrinkle_comment,
            'fitz_comment' => $this->fitz_comment,
            'sun_exposure' => $this->sun_exposure,
            'dermatological_lesion_type' => $this->dermatological_lesion_type,
            'sun_screen' => $this->sun_screen,
        ]);
    }

    //Attachments
    // Image upload (handling multiple files)
    #[Validate(['images' => 'nullable|array|max:5'])]
    #[Validate(['images.*' => 'file|mimes:jpg,jpeg,png,gif|max:5120'])]

    public $images;

    public function storeAttachments()
    {
        if ($this->images) {
            foreach ($this->images as $key => $image) {
                $attachment = new Attachment();
                $attachment->medical_record_id = $this->record_id;
                $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
                $this->images[$key]->storeAs('uploads/images', $imageName, 'public');
                $attachment->image = $imageName;
                $attachment->save();
            }
        }
    }
}
