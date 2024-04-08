<?php

namespace Database\Seeders;

use App\Models\Languages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            'English',
            'Spanish',
            'French',
            'Chinese',
            'Hindi',
            'Arabic',
            'Bengali',
            'Portuguese',
            'Russian',
            'Japanese',
            'German',
            'Korean',
            'Turkish',
            'Italian',
            'Vietnamese',
            'Tamil',
            'Urdu',
            'Persian',
            'Polish',
            'Dutch',
            'Thai',
            'Swedish',
            'Greek',
            'Indonesian',
            'Romanian',
            'Hungarian',
            'Czech',
            'Swahili',
            'Danish',
            'Finnish',
            'Norwegian',
            'Slovak',
            'Malay',
            'Ukrainian',
            'Catalan',
            'Bulgarian',
            'Lithuanian',
            'Slovenian',
            'Latvian',
            'Estonian',
            'Icelandic',
            'Maltese',
            'Irish',
            'Albanian',
            'Macedonian',
            'Luxembourgish',
            'Georgian',
            'Basque',
            'Faroese',
            'Bosnian',
            'Corsican',
            'Kurdish',
            'Haitian Creole',
            'Galician',
            'Manx',
            'Azerbaijani',
            'Armenian',
            'Telugu',
            'Marathi',
            'Kannada',
            'Gujarati',
            'Odia',
            'Malayalam',
            'Punjabi',
            'Sinhala',
            'Nepali',
            'Assamese',
            'Maithili',
            'Sundanese',
            'Burmese',
            'Amharic',
            'Pashto',
            'Oromo',
            'Malagasy',
            'Sesotho',
            'Zulu',
            'Xhosa',
            'Somali',
            'Chichewa',
            'Tigrinya',
            'Shona',
            'Yoruba',
            'Igbo',
            'Hausa',
            'Fula',
            'Swati',
            'Tsonga',
            'Tswana',
            'Kinyarwanda',
            'Kirundi',
            'Sango',
            'Wolof',
            'Kikuyu',
            'Twi',
            'Kinyamwezi',
        ];

        // Seed the languages table with the defined languages
        foreach ($languages as $language) {
            Languages::create([
                'language' => $language,
            ]);
        }
    }
}
