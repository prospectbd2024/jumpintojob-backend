<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            padding-inline: 100px;
            padding-block: 40px;
            font-family: Arial, Helvetica, sans-serif;
            user-select: none;
        }

        header {
            margin-bottom: 40px;
        }

        .header-title {
            margin-bottom: 4px;
        }

        .header-subtitle {
            color: #d49548;
            font-size: 15px;
            font-weight: bold;
            padding-block: 4px 2px;
            margin-bottom: 3px;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
        }

        .contact-item {
            color: #d49548;
        }

        h2 {
            margin-bottom: 5px;
        }

        h3 {
            margin-bottom: 2px;
        }

        .highlight {
            color: #d49548;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .experience-period {
            display: flex;
            margin-bottom: 5px;
        }

        .experience-details,
        .education-details {
            list-style: none;
            margin-bottom: 20px;
            padding-left: 10px;
        }

        .experience-details li,
        .education-details li {
            position: relative;
            padding-left: 20px;
        }
        .experties-list{
            list-style: circle;
        }
     
        .experience-details li::before,
        .education-details li::before {
            content: "•";
            /* Bullet symbol */
            position: absolute;
            left: 0;
            top: 0;
            transform: translateX(-100%);

        }
        .experties-list li::before{
            content: none;
        }
        hr {
            height: 3px;
            background: black;
            border: none;
            margin-bottom: 20px;
        }

        .subsection-end-hr {
            border: none;
            border-top: 1px dashed grey;
            margin-bottom: 20px;
            height: 0px;
            background-color: transparent;
            margin-top: 10px;
        }

        main {
            display: grid;
            grid-template-columns: 3fr 2fr;
            gap: 0 20px;
        }
        .certificate-section{
            margin-bottom: 20px;
        }
        .publication-subtitle{
            font-size: 17px;
        }
        .right-side{
            display: flex;
            flex-direction: column;
            gap: 20px 0px;
        }
        .left-side{
            display: flex;
            flex-direction: column;
            gap: 20px 0px;
        }
        .skills-container {
    width: 70%; /* Adjust width as needed */

    }

    .skills-container h2 {
        margin-bottom: 10px;
    }

    .skills-container hr {
        margin-bottom: 20px;
    }

    .skills-container ul {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* Adjust gap as needed */
    }

    .skills-container li {
        /* background-color: lightblue; */
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
        font-weight: bold;
    }

    .education-container{
        display: flex;
    }
    .vertical-row{

    }
    .education-gpa-container{

        flex: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

        .hide {
            display: none;
        }
    </style>
    <title>classic</title>
</head>

<body>

    <header>
        <h2 class="header-title">{{ $resume_data['personalInformation']['firstName'] }} {{ $resume_data['personalInformation']['lastName'] }}</h2>
        <div class="header-subtitle">{{ $resume_data['personalInformation']['title'] }}</div>
        <div class="contact-info">
            <div>
                <i class="fa fa-phone contact-item"></i>{{$resume_data['personalInformation']['phone']}}
            </div>
            <div>
                <span class="contact-item">@</span>{{$resume_data['personalInformation']['email']}}
            </div>
            <div>
                <i class="fa fa-map-marker contact-item"></i>  
                {{ $resume_data['personalInformation']['currentAddress']['postalCode'] }},
                {{ $resume_data['personalInformation']['currentAddress']['city'] }},
                {{ $resume_data['personalInformation']['currentAddress']['state'] }},
                {{ $resume_data['personalInformation']['currentAddress']['country'] }}
            </div>
        </div>
    </header>
    <main>
        <div class="left-side">
            <div class="experience-section">
                <h2>EXPERIENCE</h2>
                <hr>
                @foreach ($resume_data['experiences']  as $experience)
                <div class="{{$experience['visible_on_cv']? '' : 'hide' }}">
                    <h3>{{ $experience['job_title'] }}</h3>
                    <p class="highlight">{{ $experience['company_name']}}</p>
                    <div class="experience-period">
                        <span><i class="fa fa-calendar"></i> 
                        @php
                            echo $experience['start_date'] ;
                            echo  $experience['currently_working'] ? '- Present' : $experience['to_date']; 
                        @endphp
                        
                        </span>
                        <span style="margin-left: 10px;"><i class="fa fa-map-marker"></i> {{$experience['company_location']}}</span>
                    </div>
                    <ul class="experience-details">
                        <li>{{$experience['responsibilities']}}</li>
                        <li>
                            <p>Experties</p>
                            <ul class="experties-list">
                                @foreach ($experience['expertises'] as $expertise)
                                     
                                <li>
                                    {{$expertise['name']}} for {{$expertise['months']}} months
                                </li>   
                                @endforeach
                            </ul>
                            </li>
                    </ul>
                    <hr class="subsection-end-hr {{ $loop->last ? 'hide' : '' }}">
                </div>             
                @endforeach
            </div>

            <div class="education-section">
                <h2>EDUCATION</h2>
                <hr>

                @foreach  ($resume_data['educations']  as $education)
                <div class=" {{$education['visible_on_cv']? '' : 'hide' }}"> 
                    <div class="education-container ">
                        <div >
                            <h2>{{$education['field_study']}}</h2>
                            <h3>{{$education['degree']}}</h3>
                            <p class="highlight">{{$education['institution_name']}}</p>
                            <div class="experience-period">
                                <span><i class="fa fa-calendar"></i>
                                
                                @php
                                    echo   $education['education_starting_year'];
                                    echo   $education['education_graduation_year']!=""?$education['education_graduation_year']:"- Present";
                                @endphp
                                
                                </span>
                                <span style="margin-left: 10px;">{{ $education['institution_location']}} </span>
                            </div>
                            <ul class="education-details">
                                <li>{{ $education['education_achievements']}}</li>
                            </ul>
                        </div>
                        <div class="education-gpa-container">
 
                            <div style="font-size: 14px; text-align: center; border-left: 2px solid grey; padding-left: 15px;">
       
                                    <p>GPA</p>
                                     <span style="color: #d49548;">4.0</span>/4.0
           
                            </div>
                        </div>
                    </div>

                    <hr class="subsection-end-hr {{ $loop->last ? 'hide' : '' }}">
                </div>
                @endforeach

            </div>
        </div>

        <div class="right-side">
            <div class="certificate-section">
                <h2>CERTIFICATION</h2>
                <hr>
                
                @foreach ($resume_data['others'] as $other)
                @if ($other['type'] =='Certificate')                    
                <div>
                    <h3 class="header-subtitle">{{$other['title']}}</h3>
                    <p>{{$other['description']}}</p>
                    <hr class="subsection-end-hr">
                </div>
                @endif
                    
                @endforeach
            </div>


            <div>
                <h2>PUBLICATIONS</h2>
                <hr>
                
                @foreach ($resume_data['others'] as $other)
                @if ($other['type'] =='Publication')      
                <div>
                    <h3 class="publication-subtitle">Project: {{$other['title']}}</h3>
                    <p class="header-subtitle">{{$other['journal']}}</p>
                    <p><span> <i class="fa fa-calendar"></i> {{$other['date']}}</span></p>
                    <p>{{$other['abstract']}}</p>
                    <hr class="subsection-end-hr">
                </div>

                @endif
                @endforeach


            </div>

            <div class="skills-container">
                <h2>SKILLS</h2>
                <hr>
                <ul>
                     @foreach ($resume_data['skills'] as $skill)
                         <li>{{$skill['name']}}</li>
                     @endforeach
                </ul>

            </div>
            <div class="skills-container">
                <h2>LANGUAGES</h2>
                <hr>
                <ul>
                     @foreach ($resume_data['languages'] as $language)
                         <li>{{$language['language']}}</li>
                     @endforeach
                </ul>

            </div>
            <div class="skills-container">
                <h2>HOBBIES</h2>
                <hr>
                <ul>
                     @foreach ($resume_data['hobbies'] as $hobby)
                         <li>{{$hobby['name']}}</li>
                     @endforeach
                </ul>

            </div>


            <div>
                <h2>OTHERS</h2>
                @foreach ($resume_data['others'] as $other)
                @if ($other['type'] =='Other')      
                <div>
                    <h3 class="publication-subtitle"> {{$other['title']}}</h3>
                    <p style="margin-top: 2px;"> {{$other['description']}}</p>
                    <hr class="subsection-end-hr">
                </div>
                @endif
                @endforeach
            </div>



        </div>
    </main>

</body>

</html>