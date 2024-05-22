<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

       $templates = Template::all();

       return response()->json([ 'data' => $templates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        //
    }
    public function generateHtmlTemplate(Request $request)
    {
        // Render the Blade view to an HTML string
        // dd($request->template_id);
        $templateObject = Template::where('id',$request->template_id)->first();
        $resume_data =$request->resume_data;
        $view_path = $templateObject->view_path;
        $template =view($view_path , compact('resume_data'))->render();
        // Return the HTML string as part of the response
        return response()->json([
            'data' => [
                'template' => $template,
                'id' => $request->template_id
            ]
        ]);
    }
}
