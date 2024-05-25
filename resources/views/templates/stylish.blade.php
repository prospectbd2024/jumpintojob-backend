<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .container {
            max-width: 800px;
            background: #fff;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #f4b400;
        }

        .header-title {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .header-subtitle {
            font-size: 20px;
            color: #f4b400;
            margin-bottom: 10px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            color: #666;
        }

        .contact-info div {
            margin: 0 10px;
        }

        .contact-info i {
            color: #f4b400;
            margin-right: 5px;
        }

        .main-content {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .main-content .section {
            width: 48%;
        }

        h2 {
            font-size: 24px;
            color: #f4b400;
            margin-bottom: 10px;
            border-bottom: 1px solid #f4b400;
            padding-bottom: 5px;
        }

        h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }

        .highlight {
            color: #f4b400;
            font-weight: bold;
        }

        .experience, .education {
            margin-bottom: 20px;
        }

        .experience .job-title, .education .degree {
            font-weight: bold;
            color: #333;
        }

        .experience .company, .education .institution {
            color: #666;
        }

        .experience .period, .education .period {
            color: #999;
        }

        .experience ul, .education ul {
            list-style: disc;
            padding-left: 20px;
            color: #555;
        }

        .skills, .languages, .hobbies, .certificates {
            margin-bottom: 20px;
        }

        .skills ul, .languages ul, .hobbies ul, .certificates ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .skills li, .languages li, .hobbies li, .certificates li {
            background: #f4f4f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin: 5px;
            flex: 1 1 45%;
            text-align: center;
            color: #333;
        }
    </style>
    <title>Stylish CV</title>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="header-title">{{ $resume->personal_informations['firstName'] }} {{ $resume->personal_informations['lastName'] }}</h1>
            <div class="header-subtitle">{{ $resume->personal_informations['title'] }}</div>
            <div class="contact-info">
                <div><i class="fa fa-phone"></i>{{$resume->personal_informations['phone']}}</div>
                <div><i class="fa fa-envelope"></i>{{$resume->personal_informations['email']}}</div>
                <div><i class="fa fa-map-marker"></i>{{ $resume->personal_informations['currentAddress']['city'] }}, {{ $resume->personal_informations['currentAddress']['state'] }}, {{ $resume->personal_informations['currentAddress']['country'] }}</div>
            </div>
        </header>
        <div class="main-content">
            <div class="section">
                <div class="experience">
                    <h2>Experience</h2>
                    @foreach ($resume->experiences as $experience)
                    <div class="{{ $experience['visible_on_cv'] ? '' : 'hide' }}">
                        <div class="job-title">{{ $experience['job_title'] }}</div>
                        <div class="company">{{ $experience['company_name'] }}</div>
                        <div class="period">
                            <i class="fa fa-calendar"></i>
                            @php
                                echo $experience['start_date'];
                                echo $experience['currently_working'] ? ' - Present' : ' - ' . $experience['to_date'];
                            @endphp
                        </div>
                        <ul>
                            <li>{{ $experience['responsibilities'] }}</li>
                            <li>Expertise:
                                <ul>
                                    @foreach ($experience['expertises'] as $expertise)
                                    <li>{{ $expertise['name'] }} for {{ $expertise['months'] }} months</li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="education">
                    <h2>Education</h2>
                    @foreach ($resume->educations as $education)
                    <div class="{{ $education['visible_on_cv'] ? '' : 'hide' }}">
                        <div class="degree">{{ $education['degree'] }} in {{ $education['field_study'] }}</div>
                        <div class="institution">{{ $education['institution_name'] }}</div>
                        <div class="period">
                            <i class="fa fa-calendar"></i>
                            @php
                                echo $education['education_starting_year'];
                                echo $education['education_graduation_year'] ? ' - ' . $education['education_graduation_year'] : ' - Present';
                            @endphp
                        </div>
                        <ul>
                            <li>{{ $education['education_achievements'] }}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="section">
                <div class="skills">
                    <h2>Skills</h2>
                    <ul>
                        @foreach ($resume->skills as $skill)
                        <li>{{ $skill['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="languages">
                    <h2>Languages</h2>
                    <ul>
                        @foreach ($resume->languages as $language)
                        <li>{{ $language['language'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="hobbies">
                    <h2>Hobbies</h2>
                    <ul>
                        @foreach ($resume->hobbies as $hobby)
                        <li>{{ $hobby['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="certificates">
                    <h2>Certificates</h2>
                    <ul>
                        @foreach ($resume->certificates as $certificate)
                        <li>{{ $certificate['title'] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
