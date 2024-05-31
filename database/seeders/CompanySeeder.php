<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Microsoft Corporation',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1200px-Microsoft_logo.svg.png',
                'email' => 'contact@microsoft.com',
                'phone' => '+1 (425) 882-8080',
                'cover_image' => 'https://www.microsoft.com/en-us/BrandStore/Content/images/hero/hero_brand_microsoft_1x.jpg',
                'description' => 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports, and sells computer software, consumer electronics, personal computers, and related services.',
                'category_id' => 1, // Assuming category_id 1 corresponds to Technology
                'location' => 'Redmond, Washington, United States',
                'company_type' => 'public',
                'slug' => 'microsoft-corporation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oracle Corporation',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/50/Oracle_logo.svg',
                'email' => 'contact@oracle.com',
                'phone' => '+1 (650) 506-7000',
                'cover_image' => 'https://images.idgesg.net/images/article/2020/09/oracle-cloud-platform-nocloud-100857485-large.jpg',
                'description' => 'Oracle Corporation is an American multinational computer technology corporation headquartered in Redwood Shores, California. The company sells database software and technology, cloud engineered systems, and enterprise software products—particularly its own brands of database management systems.',
                'category_id' => 1, // Assuming category_id 1 corresponds to Technology
                'location' => 'Redwood Shores, California, United States',
                'company_type' => 'public',
                'slug' => 'oracle-corporation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adobe Inc.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/7b/Adobe_Systems_logo_and_wordmark.svg',
                'email' => 'contact@adobe.com',
                'phone' => '+1 (408) 536-6000',
                'cover_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Adobe_HQ_building.jpg/1200px-Adobe_HQ_building.jpg',
                'description' => 'Adobe Inc. is an American multinational computer software company headquartered in San Jose, California. It has historically focused upon the creation of multimedia and creativity software products, with a more recent foray towards digital marketing software.',
                'category_id' => 1, // Assuming category_id 1 corresponds to Technology
                'location' => 'San Jose, California, United States',
                'company_type' => 'public',
                'slug' => 'adobe-inc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salesforce.com, Inc.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/f9/Salesforce.com_logo.svg',
                'email' => 'contact@salesforce.com',
                'phone' => '+1 (415) 901-7000',
                'cover_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Salesforce_Tower%2C_San_Francisco.jpg/1200px-Salesforce_Tower%2C_San_Francisco.jpg',
                'description' => 'Salesforce.com, Inc. is an American cloud-based software company headquartered in San Francisco, California. It provides customer relationship management (CRM) service and also sells a complementary suite of enterprise applications focused on customer service, marketing automation, analytics, and application development.',
                'category_id' => 1, // Assuming category_id 1 corresponds to Technology
                'location' => 'San Francisco, California, United States',
                'company_type' => 'public',
                'slug' => 'salesforce-com-inc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SAP SE',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg',
                'email' => 'contact@sap.com',
                'phone' => '+1 (800) 872-1727',
                'cover_image' => 'https://images.idgesg.net/images/article/2019/01/04_SAP_HQ_Plastic.jpg',
                'description' => 'SAP SE is a German multinational software corporation that makes enterprise software to manage business operations and customer relations. SAP is headquartered in Walldorf, Baden-Württemberg, Germany with regional offices in 180 countries.',
                'category_id' => 1, // Assuming category_id 1 corresponds to Technology
                'location' => 'Walldorf, Baden-Württemberg, Germany',
                'company_type' => 'public',
                'slug' => 'sap-se',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grameenphone Ltd.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/98/Grameenphone_Logo_GP_Logo.svg',
                'email' => 'info@grameenphone.com',
                'phone' => '+880 17 11 300 300',
                'cover_image' => 'https://www.grameenphone.com/sites/default/files/2021-01/Banner-Main_V1_1_0.jpg',
                'description' => 'Grameenphone Ltd. is the leading telecommunications service provider in Bangladesh. With more than 80 million subscribers, Grameenphone is the largest mobile phone operator in the country.',
                'category_id' => 2, // Assuming category_id 2 corresponds to Telecommunications
                'location' => 'Dhaka, Bangladesh',
                'company_type' => 'public',
                'slug' => 'grameenphone-ltd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BRAC Bank Limited',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/4/4c/BRAC_Bank_Limited_Logo.svg',
                'email' => 'info@bracbank.com',
                'phone' => '+880 2 883 3003',
                'cover_image' => 'https://www.bracbank.com/media/2770/one-bank-web-banner-3-30042021.png',
                'description' => 'BRAC Bank Limited is a private commercial bank in Bangladesh. It is a fully owned subsidiary of BRAC, a global development organization.',
                'category_id' => 3, // Assuming category_id 3 corresponds to Banking
                'location' => 'Dhaka, Bangladesh',
                'company_type' => 'public',
                'slug' => 'brac-bank-limited',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'bKash Limited',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/6/68/BKash_logo.svg',
                'email' => 'info@bkash.com',
                'phone' => '+880 192 556 6222',
                'cover_image' => 'https://www.bkash.com/sites/default/files/2021-08/ONE%20Bkash%20-%20Comms%20Banner-1.png',
                'description' => 'bKash Limited is a mobile financial service provider in Bangladesh. It offers various financial services, including money transfer, bill payment, and mobile recharge, through a mobile phone.',
                'category_id' => 4, // Assuming category_id 4 corresponds to Financial Services
                'location' => 'Dhaka, Bangladesh',
                'company_type' => 'public',
                'slug' => 'bkash-limited',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Square Pharmaceuticals Ltd.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/b/bb/Square_pharma80.png',
                'email' => 'info@squarepharma.com',
                'phone' => '+880 2 9859007',
                'cover_image' => 'https://squarepharma.com.bd/assets/images/slider/HP-Slider-1.jpg',
                'description' => 'Square Pharmaceuticals Ltd. is a pharmaceutical company in Bangladesh. It is one of the largest pharmaceutical companies in the country, manufacturing and marketing a wide range of pharmaceutical products.',
                'category_id' => 5, // Assuming category_id 5 corresponds to Pharmaceuticals
                'location' => 'Dhaka, Bangladesh',
                'company_type' => 'public',
                'slug' => 'square-pharmaceuticals-ltd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robi Axiata Limited',
                'logo' => 'https://en.wikipedia.org/wiki/Robi_(company)#/media/File:Logo_of_Robi_Axiata.svg',
                'email' => 'info@robi.com',
                'phone' => '+880 1819-400-400',
                'cover_image' => 'https://robi.com.bd/images/elementor-pro/thumbs/slide-1-149i4hh55an4gb3wgp6gdv.png',
                'description' => 'Robi Axiata Limited is a telecommunications service provider in Bangladesh. It is a joint venture between Axiata Group Berhad of Malaysia and NTT DoCoMo Inc. of Japan.',
                'category_id' => 2, // Assuming category_id 2 corresponds to Telecommunications
                'location' => 'Dhaka, Bangladesh',
                'company_type' => 'public',
                'slug' => 'robi-axiata-limited',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gojek',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/18/Gojek_logo_2022.svg',
                'email' => 'info@gojek.com',
                'phone' => '+62 21 50258888',
                'cover_image' => 'https://assets.gojekapi.com/assets/og_image-689a0b7ad02d06bbf6fbb1b375f4d39f0d5046078d93bcb37c38ad398ca588f2.png',
                'description' => 'Gojek is a technology startup based in Indonesia that specializes in ride-hailing, logistics, and digital payments. It offers various services, including transportation, food delivery, and online shopping.',
                'category_id' => 6, // Assuming category_id 6 corresponds to Technology
                'location' => 'Jakarta, Indonesia',
                'company_type' => 'private',
                'slug' => 'gojek',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Traveloka',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/5/51/Traveloka_Primary_Logo.png',
                'email' => 'info@traveloka.com',
                'phone' => '+62 21 39730488',
                'cover_image' => 'https://image4.owler.com/logo/traveloka_owler_20190410_175536_original.png',
                'description' => 'Traveloka is an Indonesian online travel company that provides booking services for flights, hotels, trains, and activities. It operates in several countries across Southeast Asia.',
                'category_id' => 6, // Assuming category_id 6 corresponds to Technology
                'location' => 'Jakarta, Indonesia',
                'company_type' => 'private',
                'slug' => 'traveloka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tokopedia',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a7/Tokopedia.svg',
                'email' => 'info@tokopedia.com',
                'phone' => '+62 21 50505400',
                'cover_image' => 'https://media-exp1.licdn.com/dms/image/C4D1BAQEji9EJfzA-Fw/feedshare-shrink_800-alternative/0/1614396121918?e=1637798400&v=beta&t=fT6yzvNZWBKTBWJ5OH_jNpWbvT9sGtLQuNf4KvbuMP4',
                'description' => 'Tokopedia is an Indonesian e-commerce platform that allows individuals and businesses to sell products online. It offers a wide range of products, including electronics, fashion, and groceries.',
                'category_id' => 7, // Assuming category_id 7 corresponds to E-commerce
                'location' => 'Jakarta, Indonesia',
                'company_type' => 'private',
                'slug' => 'tokopedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bukalapak',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/5b/Bukalapak_%282020%29.svg',
                'email' => 'info@bukalapak.com',
                'phone' => '+62 21 12345678',
                'cover_image' => 'https://image.freepik.com/free-vector/online-shop-promotion-banner-template_52683-55578.jpg',
                'description' => 'Bukalapak is an Indonesian e-commerce company that provides a platform for individuals and businesses to buy and sell goods online. It offers various products, including electronics, fashion, and home goods.',
                'category_id' => 7, // Assuming category_id 7 corresponds to E-commerce
                'location' => 'Jakarta, Indonesia',
                'company_type' => 'private',
                'slug' => 'bukalapak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grab',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/1/12/Grab_%28application%29_logo.svg',
                'email' => 'info@grab.com',
                'phone' => '+62 21 12345679',
                'cover_image' => 'https://media-exp1.licdn.com/dms/image/C4D1BAQE-F11Mph0_gw/profile-displaybackgroundimage-shrink_200_800/0/1609940658152?e=1637193600&v=beta&t=zBbJ03y1rKfykZZjmOw4QeQKTdBpVf2R-ihYl8ygav4',
                'description' => 'Grab is a technology company based in Singapore that offers ride-hailing, food delivery, and financial services. It operates in several countries in Southeast Asia, including Indonesia.',
                'category_id' => 6, // Assuming category_id 6 corresponds to Technology
                'location' => 'Jakarta, Indonesia',
                'company_type' => 'private',
                'slug' => 'grab',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more companies here
        ];

        // Insert the companies into the database
        foreach ($companies as $company) {
            $company['is_featured'] = rand(0, 1);
            Company::create($company);
        }
    }
}
