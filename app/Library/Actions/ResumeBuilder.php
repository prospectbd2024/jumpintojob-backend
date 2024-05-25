<?php

namespace App\Library\Actions;
use Illuminate\Http\Request;
class ResumeBuilder {
    public $resume_data;
    public $educations;
    public $experiences;
    public $skills;
    public $languages;
    public $hobbies;
    public $personal_informations;
    public $projects;
    public $certificates;
    public $publications;
    public $others;
    public function __construct(Request $request) {
        $resume_data = $request->resume_data;
        $this->resume_data =  $resume_data;
        $this->educations = $resume_data['educations'];
        $this->experiences = $resume_data['experiences'];
        $this->skills = $resume_data['skills'];
        $this->languages = $resume_data['languages'];
        $this->hobbies = $resume_data['hobbies'];
        $this->personal_informations = $resume_data['personalInformation'];
        $this->projects = $this->get_items($resume_data,"Project");
        $this->certificates = $this->get_items($resume_data,"Certificate");
        $this->publications = $this->get_items($resume_data,"Publication");
        $this->others = $this->get_items($resume_data,"Other");
    }

    private function get_items($resume_data,$type){
        $others = $resume_data['others'];

        $items =[];
        foreach ($others as $item) {
             if($item['type']==$type){
                $items []= $item;
             }
        }
        return $items;

    }

     



}