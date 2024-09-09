<?php

namespace App\Http\Controllers\api\v1;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Library\Actions\ResumeBuilder;
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
        $view_path = $templateObject->view_path;
        $resume = new  ResumeBuilder($request);

        $template =view($view_path , compact('resume'))->render();

        // Return the HTML string as part of the response
        return response()->json([
            'data' => [
                'template' => $template,
                'id' => $request->template_id
            ]
        ]);
    }
    public function generateTemplateImg(Request $request)
    {
        // Render the Blade view to an HTML string
        // dd($request->template_id);
        $templateObject = Template::where('id',$request->template_id)->first();
        $view_path = $templateObject->view_path;
        $resume = new  ResumeBuilder($request);

        $template =view($view_path , compact('resume'))->render();

        // Return the HTML string as part of the response

        return $this->convertHTML($template,'jpg','','');
        
    }
    public function generateTemplatePdf(Request $request)
    {
        // Retrieve the template
        $templateObject = Template::where('id', $request->template_id)->first();
        $view_path = $templateObject->view_path;
    
        // Create the resume data
        $resume = new ResumeBuilder($request);
    
        // Render the Blade view to HTML string
        $template = view($view_path, compact('resume'))->render();
    
        // Generate the PDF from the view
        $pdf = Pdf::loadHTML($template);
    
        // Return the PDF as a download response
        return $pdf->download('template.pdf');
    }
    public function convertHTML($content,$format,$options,$output)
    {
        $url = 'http://htmltoimage:3033/'; // URL of the service
        $data = [
            'source' => $content,
            'format' => $format
        ];

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if(curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => $error], 500);
        }

        // Close cURL session
        curl_close($ch);

        // Define the path to save the image
        $path = public_path('helloworld.jpg');

        // Save the image file to the public folder
        file_put_contents($path, $response);

        return response()->json(['message' => 'Image saved successfully', 'path' => $path]);
    }
}
