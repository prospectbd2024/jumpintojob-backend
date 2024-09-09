<?php

namespace App\Library\Actions;

use App\Models\Template as ModelsTemplate;
use Illuminate\Http\Request;
class Template {
   
 
    
    public static function generateTemplate(Request $request){

        $templateObject = ModelsTemplate::where('id',$request->template_id)->first();
        $view_path = $templateObject->view_path;
        $resume = new  ResumeBuilder($request);

        $template =view($view_path , compact('resume'))->render();

        $output_type = $request->output_type;
        if ($output_type=='html'){
            return $template;
        }
        $options = $request->options??[];

        return self::convertHTML($template,$output_type, $options);
    }

    private static function convertHTML($content, $format, $options)
    {
        $url = 'http://htmltoimage:3033/'; // URL of the service
        $data = [
            'source' => $content,
            'format' => $format,
            ...$options
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
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => $error], 500);
        }
    
        // Close cURL session
        curl_close($ch);
    
        // Define MIME type and file name based on the format
        $mimeType = $format === 'pdf' ? 'application/pdf' : 'image/' . $format;
        $fileName = 'file.' . $format;
    
        // Convert the file data to base64
        $base64Data = base64_encode($response);
        $base64File = "data:{$mimeType};base64,{$base64Data}";
    
        return $base64File;
    }
    

    



}