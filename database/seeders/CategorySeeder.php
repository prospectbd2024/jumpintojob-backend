<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Software Development',
            'Web Development',
            'Mobile App Development',
            'UI/UX Design',
            'Data Science',
            'Machine Learning',
            'Artificial Intelligence',
            'Cybersecurity',
            'Cloud Computing',
            'DevOps',
            'Project Management',
            'Quality Assurance',
            'Database Administration',
            'Network Engineering',
            'Frontend Development',
            'Backend Development',
            'Full Stack Development',
            'Game Development',
            'Embedded Systems',
            'Internet of Things (IoT)',
            'Blockchain Development',
            'Digital Marketing',
            'Content Writing',
            'Graphic Design',
            'Video Editing',
            'Photography',
            'Animation',
            'Music Production',
            'Sales',
            'Customer Support',
            'Human Resources',
            'Finance',
            'Accounting',
            'Legal',
            'Healthcare',
            'Education',
            'Research',
            'Consulting',
            'Architecture',
            'Real Estate',
            'Construction',
            'Logistics',
            'Supply Chain Management',
            'Manufacturing',
            'Retail',
            'Hospitality',
            'Travel and Tourism',
            'Fitness and Wellness',
        ];


        // Seed the categories
        foreach ($categories as $categoryName) {
            Category::create([
                'category_name' => $categoryName,
            ]);
        }
    }
}
