<?php

namespace App\Http\Controllers\api\v1;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Library\Actions\ResumeBuilder;
use App\Library\Actions\Template as ActionsTemplate;

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
    public function templateGenerator(Request $request)
    {
         
        $template = ActionsTemplate::generateTemplate($request);
        $type = $request->output_type;
        // Return the HTML string as part of the response
        return response()->json([
            'data' => [
                'template' => $template,
                'type' => $type,
                'id' => $request->template_id
            ]
        ]);
    }
 

}
