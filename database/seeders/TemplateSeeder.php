<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Template;
class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'classic',
                'image' => 'https://cdn.enhancv.com/images/1098/i/aHR0cHM6Ly9jZG4uZW5oYW5jdi5jb20vcmVzdW1lcy90ZWFjaGVyLXJlc3VtZS5wbmc~..png',
                'view_path' => 'templates.classic',
                'type' => 'resume',
                'template_type' => 'html'
            ],
            [
                'name' => 'modern',
                'image' => 'https://i.ibb.co/P1crN2n/resumetemplate2.png',
                'view_path' => 'templates.modern',
                'type' => 'resume',
                'template_type' => 'html'
            ],
            [
                'name' => 'creative',
                'image' => 'https://gosumo-cvtemplate.com/wp-content/uploads/2019/06/Word-CV-Template-Dublin.png',
                'view_path' => 'templates.creative',
                'type' => 'cv',
                'template_type' => 'html'
            ],
            [
                'name' => 'fancy',
                'image' => 'https://techguruplus.com/wp-content/uploads/2022/12/Resume-CV-Templates-Word-doc-023.jpg',
                'view_path' => 'templates.fancy',
                'type' => 'cv',
                'template_type' => 'html'
            ],
            [
                'name' => 'stylish',
                'image' => 'https://blog.hubspot.com/hs-fs/hubfs/resume-templates-word_2.webp?width=650&height=841&name=resume-templates-word_2.webp',
                'view_path' => 'templates.stylish',
                'type' => 'resume',
                'template_type' => 'html'
            ]
        ];
        
        foreach ($templates as $template) {
            Template::create([
                'name' => $template['name'],
                'image' => $template['image'],
                'view_path' => $template['view_path'],
                'type' => $template['type'],
                'template_type' => $template['template_type']
            ]);
        }
    }
}
