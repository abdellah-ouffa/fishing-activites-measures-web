<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudyCaseElementContent;
use App\Http\Controllers\Controller;
use App\Models\StudyCaseElement;
use Illuminate\Http\Request;
use App\Models\StudyCase;

class RulesAdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studyCases = StudyCase::all();
        $studyCaseElements = StudyCaseElement::all();

        return view('admin.rules.index', [
            'studyCases' => $studyCases,
            'studyCaseElements' => $studyCaseElements,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Remove all records of study_case_element_content table
        StudyCaseElementContent::truncate();

        foreach ($request->content as $case => $elements) {
            foreach ($elements as $element => $content) {
                if(!empty($content)) {
                    StudyCaseElementContent::create([
                        'study_case_id' => $case, 
                        'study_case_element_id' => $element, 
                        'content' => $content
                    ]);
                }
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
