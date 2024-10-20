<?php

namespace Database\Seeders;

use App\Models\Circular;
use App\Models\Employer;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CircularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Real job data array
        $jobs = [
            [
                'title' => 'Senior Software Engineer',
                'description' => 'We are looking for a highly skilled Senior Software Engineer to join our team. As a Senior Software Engineer, you will play a key role in designing, developing, and maintaining software solutions that meet our clients\' needs and business objectives. You will collaborate with cross-functional teams to deliver high-quality software products.',
                'responsibilities' => 'Design, develop, and maintain software solutions that meet business requirements. Collaborate with product managers, designers, and other stakeholders to define project requirements and deliverables. Write clean, efficient, and maintainable code using best practices and design patterns. Conduct code reviews and provide constructive feedback to other team members. Troubleshoot and debug issues to ensure optimal performance and reliability. Stay up-to-date with emerging technologies and industry trends. Mentor junior developers and contribute to the continuous improvement of development processes and practices.',
                'educational_requirements' => 'Bachelor\'s degree in Computer Science or related field.',
                'experience' => '5+ years of experience in software development.',
                'availability' => 'Immediate',
                'slug' => 'senior-software-engineer',
                'location' => 'San Francisco',
                'location_type' => 'office',
                'vacancies' => 3,
                'employment_type' => 'full-time',
                'experience_level' => 'senior-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '120000',
                'deadline' => '2024-06-30',
            ],
            [
                'title' => 'Web Developer',
                'description' => 'We are seeking a talented Web Developer to join our dynamic team. As a Web Developer, you will be responsible for designing, coding, and modifying websites to enhance user experience and achieve business goals. You will work closely with designers, project managers, and other developers to deliver innovative web solutions.',
                'responsibilities' => 'Design, code, and modify websites, from layout to function, according to project specifications. Collaborate with designers and project managers to understand project requirements and objectives. Create wireframes, prototypes, and user interface designs using industry-standard tools and practices. Optimize websites for maximum speed, scalability, and performance. Ensure cross-browser compatibility and responsiveness through thorough testing and debugging. Stay updated on emerging technologies and best practices in web development. Communicate effectively with team members and stakeholders to ensure project success.',
                'educational_requirements' => 'Bachelor\'s degree in Computer Science or related field.',
                'experience' => '2+ years of experience in web development.',
                'availability' => 'Immediate',
                'slug' => 'web-developer',
                'location' => 'New York',
                'location_type' => 'office',
                'vacancies' => 2,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '90000',
                'deadline' => '2024-07-15',
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'We are looking for a talented Data Scientist to join our analytics team. As a Data Scientist, you will analyze large datasets, develop predictive models, and generate insights to drive business decisions and strategy. You will work closely with stakeholders to understand business requirements and develop data-driven solutions.',
                'responsibilities' => 'Analyze large datasets to extract actionable insights and identify trends and patterns. Develop predictive models and machine learning algorithms to solve business problems and optimize processes. Collaborate with cross-functional teams to define project objectives, deliverables, and timelines. Communicate findings and recommendations to stakeholders through reports, presentations, and visualizations. Stay updated on the latest tools, techniques, and best practices in data science and machine learning. Mentor junior team members and contribute to the continuous improvement of data science capabilities within the organization.',
                'educational_requirements' => 'Master\'s degree in Statistics, Mathematics, Computer Science or related field.',
                'experience' => '3+ years of experience in data analysis and machine learning.',
                'availability' => 'Immediate',
                'slug' => 'data-scientist',
                'location' => 'Seattle',
                'location_type' => 'office',
                'vacancies' => 1,
                'employment_type' => 'full-time',
                'experience_level' => 'senior-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '140000',
                'deadline' => '2024-07-30',
            ],
            [
                'title' => 'UX/UI Designer',
                'description' => 'We are seeking a creative and talented UX/UI Designer to join our design team. As a UX/UI Designer, you will create user-centered designs, wireframes, and prototypes that deliver exceptional user experiences. You will collaborate with product managers, developers, and other stakeholders to define and implement design solutions.',
                'responsibilities' => 'Create user-centered designs, wireframes, and prototypes that meet project requirements and objectives. Conduct user research and gather feedback to inform design decisions and improvements. Collaborate with cross-functional teams to define project scope, deliverables, and timelines. Iterate on designs based on feedback and usability testing results. Stay updated on industry trends, best practices, and emerging technologies in UX/UI design. Advocate for user-centric design principles and contribute to the evolution of design processes within the organization.',
                'educational_requirements' => 'Bachelor\'s degree in Design, Human-Computer Interaction or related field.',
                'experience' => '2+ years of experience in UX/UI design.',
                'availability' => 'Immediate',
                'slug' => 'ux-ui-designer',
                'location' => 'Los Angeles',
                'location_type' => 'office',
                'vacancies' => 2,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '100000',
                'deadline' => '2024-08-15',
            ],
            [
                'title' => 'Marketing Manager',
                'description' => 'We are looking for an experienced Marketing Manager to lead our marketing initiatives. As a Marketing Manager, you will develop and execute marketing strategies to promote our products and services, drive brand awareness, and generate leads. You will collaborate with cross-functional teams to achieve marketing objectives and targets.',
                'responsibilities' => 'Develop and execute marketing strategies to drive brand awareness, lead generation, and customer acquisition. Oversee marketing campaigns across various channels, including digital, social media, email, and events. Analyze campaign performance and optimize strategies to maximize ROI and effectiveness. Collaborate with product, sales, and design teams to ensure marketing initiatives align with business goals and objectives. Monitor market trends, competitor activities, and customer feedback to identify opportunities and challenges. Manage marketing budgets, resources, and timelines to ensure timely and successful execution of campaigns. Mentor and coach junior team members to develop their skills and capabilities in marketing.',
                'educational_requirements' => 'Bachelor\'s degree in Marketing, Business Administration or relatedfield.',
                'experience' => '5+ years of experience in marketing, with a focus on digital marketing.',
                'availability' => 'Immediate',
                'slug' => 'marketing-manager',
                'location' => 'London',
                'location_type' => 'office',
                'vacancies' => 1,
                'employment_type' => 'full-time',
                'experience_level' => 'senior-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '110000',
                'deadline' => '2024-09-01',
            ],
            [
                'title' => 'Financial Analyst',
                'description' => 'We are seeking a skilled Financial Analyst to join our finance team. As a Financial Analyst, you will be responsible for conducting financial analysis, forecasting financial performance, and providing insights to support strategic decision-making. You will work closely with stakeholders to analyze financial data and provide actionable recommendations.',
                'responsibilities' => 'Conduct financial analysis to assess financial performance, identify trends, and forecast future results. Prepare financial reports, budgets, and forecasts to support strategic decision-making and planning. Analyze variances and trends in financial data to identify opportunities and risks. Develop financial models and scenarios to evaluate potential outcomes and investments. Collaborate with stakeholders to provide insights and recommendations based on financial analysis. Monitor and evaluate financial performance against KPIs and targets. Stay updated on industry trends, regulatory changes, and best practices in financial analysis and reporting.',
                'educational_requirements' => 'Bachelor\'s degree in Finance, Accounting or related field.',
                'experience' => '3+ years of experience in financial analysis or related field.',
                'availability' => 'Immediate',
                'slug' => 'financial-analyst',
                'location' => 'Toronto',
                'location_type' => 'office',
                'vacancies' => 2,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '95000',
                'deadline' => '2024-08-30',
            ],
            [
                'title' => 'Software Developer',
                'description' => 'We are looking for a Software Developer to join our development team. As a Software Developer, you will be responsible for developing and implementing software solutions, debugging and troubleshooting issues, and collaborating with cross-functional teams to deliver high-quality software products.',
                'responsibilities' => 'Develop and implement software solutions that meet business requirements and objectives. Collaborate with product managers, designers, and other stakeholders to define project scope, deliverables, and timelines. Write clean, efficient, and maintainable code using best practices and design patterns. Debug and troubleshoot issues to ensure optimal performance and reliability. Conduct code reviews and provide constructive feedback to other team members. Stay updated on emerging technologies and industry trends. Contribute to the continuous improvement of development processes and practices.',
                'educational_requirements' => 'Bachelor\'s degree in Computer Science or related field.',
                'experience' => '1+ years of experience in software development.',
                'availability' => 'Immediate',
                'slug' => 'software-developer',
                'location' => 'Dhaka',
                'location_type' => 'office',
                'vacancies' => 3,
                'employment_type' => 'full-time',
                'experience_level' => 'entry-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '80000',
                'deadline' => '2024-09-15',
            ],
            [
                'title' => 'Graphic Designer',
                'description' => 'We are seeking a talented Graphic Designer to join our creative team. As a Graphic Designer, you will be responsible for creating visual concepts, graphics, and layouts for various projects, including advertisements, brochures, and websites. You will collaborate with clients and colleagues to deliver compelling visual solutions.',
                'responsibilities' => 'Create visual concepts, graphics, and layouts for various projects, including advertisements, brochures, websites, and presentations. Collaborate with clients and colleagues to understand project requirements and objectives. Use industry-standard design software and tools to create high-quality visual assets. Ensure consistency and adherence to brand guidelines across all design projects. Incorporate feedback and revisions to refine designs and deliver final products that meet client expectations. Stay updated on design trends, techniques, and best practices. Contribute to the creative process by sharing ideas and providing input on design concepts and strategies.',
                'educational_requirements' => 'Bachelor\'s degree in Graphic Design or related field.',
                'experience' => '2+ years of experience in graphic design.',
                'availability' => 'Immediate',
                'slug' => 'graphic-designer',
                'location' => 'Chittagong',
                'location_type' => 'office',
                'vacancies' => 2,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '70000',
                'deadline' => '2024-09-10',
            ],
            [
                'title' => 'HR Manager',
                'description' => 'We are looking for an experienced HR Manager to oversee our human resources department. As an HR Manager, you will be responsible for managing HR operations, developing and implementing HR strategies, and providing leadership and guidance to the HR team. You will work closely with senior management to support organizational goals and objectives.',
                'responsibilities' => 'Manage HR operations, including recruitment, onboarding, performance management, and employee relations. Develop and implement HR strategies, policies, and procedures to support organizational goals and objectives. Ensure compliance with labor laws, regulations, and company policies. Provide leadership and guidance to the HR team, including training and development, performance coaching, and mentoring. Collaborate with senior management to support workforce planning and talent acquisition initiatives. Handle employee relations issues and disputes in a fair and timely manner. Monitor and analyze HR metrics and trends to identify opportunities for improvement. Stay updated on HR best practices, industry trends, and legal requirements.',
                'educational_requirements' => 'Bachelor\'s degree in Human Resources or related field.',
                'experience' => '5+ years of experience in HR management.',
                'availability' => 'Immediate',
                'slug' => 'hr-manager',
                'location' => 'Sylhet',
                'location_type' => 'office',
                'vacancies' => 1,
                'employment_type' => 'full-time',
                'experience_level' => 'senior-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '100000',
                'deadline' => '2024-09-20',
            ],
            [
                'title' => 'Sales Executive',
                'description' => 'We are seeking a Sales Executive to join our sales team. As a Sales Executive, you will be responsible for identifying sales opportunities, building client relationships, and closing deals to achieve revenue targets. You will work closely with the sales manager and other team members to drive sales growth and expand market share.',
                'responsibilities' => 'Identify sales opportunities and potential clients through research, networking, and prospecting. Build and maintain relationships with clients by understanding their needs and offering tailored solutions. Present and demonstrate products or services to prospective clients. Negotiate terms and close sales to achieve revenue targets. Collaborate with the sales manager and other team members to develop sales strategies and tactics. Monitor market trends, competitor activities, and customer feedback to identify opportunities and challenges. Prepare and submit sales reports, forecasts, and other documentation as required. Stay updated on product knowledge, industry trends, and best practices in sales.',
                'educational_requirements' => "Bachelor's degree in Business Administration, Marketing, or related field.",
                'experience' => '2+ years of experience in sales, preferably in the relevant industry.',
                'availability' => 'Immediate',
                'slug' => 'sales-executive',
                'location' => 'Mumbai',
                'location_type' => 'office',
                'vacancies' => 3,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '80000',
                'deadline' => '2024-10-01',
                ],
                [
                'title' => 'Customer Service Representative',
                'description' => 'We are looking for a Customer Service Representative to join our customer support team. As a Customer Service Representative, you will be the first point of contact for customers, providing assistance, resolving inquiries, and ensuring a positive customer experience. You will handle a variety of tasks, including answering phone calls, responding to emails, and processing orders.',
                'responsibilities' => 'Respond to customer inquiries and provide assistance in a timely and professional manner. Handle customer complaints and escalate issues as needed to ensure resolution. Process orders, returns, and exchanges accurately and efficiently. Maintain customer records and update information as required. Collaborate with other team members to ensure customer satisfaction and retention. Stay updated on product knowledge, company policies, and industry trends. Provide feedback to management on customer concerns, trends, and opportunities for improvement.',
                'educational_requirements' => "High school diploma or equivalent. Bachelor's degree in Business Administration or related field is a plus.",
                'experience' => '1+ years of experience in customer service or related field.',
                'availability' => 'Immediate',
                'slug' => 'customer-service-representative',
                'location' => 'Singapore',
                'location_type' => 'office',
                'vacancies' => 2,
                'employment_type' => 'full-time',
                'experience_level' => 'entry-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '50000',
                'deadline' => '2024-10-15',
                ],
                [
                'title' => 'Content Writer',
                'description' => 'We are seeking a talented Content Writer to join our content team. As a Content Writer, you will be responsible for creating engaging and informative content for various channels, including websites, blogs, social media, and marketing materials. You will collaborate with other team members to develop content strategies and ensure consistency in tone and style.',
                'responsibilities' => 'Create engaging and informative content for various channels, including websites, blogs, social media, and marketing materials. Research topics and keywords to develop content ideas that resonate with target audiences. Write clear, concise, and grammatically correct copy that adheres to brand guidelines. Collaborate with designers and other team members to develop visual content that enhances written copy. Optimize content for search engines and social media platforms to increase visibility and engagement. Stay updated on industry trends, best practices, and emerging technologies in content creation and marketing. Proofread and edit content to ensure accuracy, consistency, and quality. Monitor and analyze content performance metrics to identify opportunities for improvement.',
                'educational_requirements' => "Bachelor's degree in English, Journalism, Communications, or related field.",
                'experience' => '2+ years of experience in content writing or related field.',
                'availability' => 'Immediate',
                'slug' => 'content-writer',
                'location' => 'Sydney',
                'location_type' => 'office',
                'vacancies' => 2,
                'employment_type' => 'full-time',
                'experience_level' => 'mid-level',
                'is_remote' => 0,
                'is_featured' => 0,
                'salary' => '60000',
                'deadline' => '2024-10-30',
                ],
                ];

        // Loop through the jobs array and create Circular instances
//        foreach ($jobs as $item) {
//            $employer = Employer::inRandomOrder()->first();
//            $item['company_id'] = $employer->company_id;
//            $item['category_id'] = Category::inRandomOrder()->first()->id;
//            $item['employer_id'] = $employer->id;
//            $item['is_featured'] = rand(0, 1);
//            Circular::create($item);
//        }
        Circular::factory(1000)->create();

    }
}


