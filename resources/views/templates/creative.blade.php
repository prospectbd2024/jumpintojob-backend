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
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            padding: 40px 80px;
            background-color: #ffffff;
            color: #333;
        }

        header {
            margin-bottom: 40px;
            text-align: center;
            border-bottom: 2px solid #d49548;
            padding-bottom: 10px;
        }

        .header-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .header-subtitle {
            color: #d49548;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 20px;
            color: #666;
        }

        .contact-info div {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .contact-info i {
            color: #d49548;
        }

        main {
            display: flex;
            justify-content: space-between;
        }

        .main-section {
            width: 48%;
        }

        h2 {
            color: #2c3e50;
            font-size: 22px;
            border-bottom: 1px solid #d49548;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .highlight {
            color: #d49548;
            font-weight: bold;
        }

        .experience-period,
        .education-period {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #666;
        }

        .experience-details,
        .education-details {
            list-style: none;
            margin-bottom: 20px;
            padding-left: 20px;
            color: #444;
        }

        .experience-details li::before,
        .education-details li::before {
            content: "•";
            color: #d49548;
            position: absolute;
            left: -15px;
        }

        .skills-container ul,
        .languages-container ul,
        .hobbies-container ul,
        .certificates-container ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skills-container li,
        .languages-container li,
        .hobbies-container li,
        .certificates-container li {
            background-color: #f7f7f7;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-weight: bold;
            flex-grow: 1;
            text-align: center;
        }
    </style>
    <title>Resume</title>
</head>

<body>
    <header>
        <h2 class="header-title">{{ $resume->personal_informations['firstName'] }} {{ $resume->personal_informations['lastName'] }}</h2>
        <div class="header-subtitle">{{ $resume->personal_informations['title'] }}</div>
        <div class="contact-info">
            <div><i class="fa fa-phone"></i>{{$resume->personal_informations['phone']}}</div>
            <div><span>@</span>{{$resume->personal_informations['email']}}</div>
            <div><i class="fa fa-map-marker"></i> {{ $resume->personal_informations['currentAddress']['postalCode'] }}, {{ $resume->personal_informations['currentAddress']['city'] }}, {{ $resume->personal_informations['currentAddress']['state'] }}, {{ $resume->personal_informations['currentAddress']['country'] }}</div>
        </div>
    </header>
    <main>
        <div class="main-section">
            <div class="experience-section {{ count($resume->experiences)==0 ? 'hide' : ''}}">
                <h2>Experience</h2>
                @foreach ($resume->experiences as $experience)
                <div class="{{ $experience['visible_on_cv'] ? '' : 'hide' }}">
                    <h3>{{ $experience['job_title'] }}</h3>
                    <p class="highlight">{{ $experience['company_name'] }}</p>
                    <div class="experience-period">
                        <span><i class="fa fa-calendar"></i>
                        @php
                            echo $experience['start_date'];
                            echo $experience['currently_working'] ? '- Present' : $experience['to_date'];
                        @endphp
                        </span>
                        <span><i class="fa fa-map-marker"></i> {{$experience['company_location']}}</span>
                    </div>
                    <ul class="experience-details">
                        <li>{{$experience['responsibilities']}}</li>
                        <li>
                            <p>Expertise</p>
                            <ul class="experties-list">
                                @foreach ($experience['expertises'] as $expertise)
                                <li>{{ $expertise['name'] }} for {{ $expertise['months'] }} months</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>

            <div class="education-section {{ count($resume->educations)==0 ? 'hide' : ''}}">
                <h2>Education</h2>
                @foreach ($resume->educations as $education)
                <div class="{{ $education['visible_on_cv'] ? '' : 'hide' }}">
                    <h3>{{ $education['degree'] }} in {{ $education['field_study'] }}</h3>
                    <p class="highlight">{{ $education['institution_name'] }}</p>
                    <div class="education-period">
                        <span><i class="fa fa-calendar"></i>
                        @php
                            echo $education['education_starting_year'];
                            echo $education['education_graduation_year'] ? '-' . $education['education_graduation_year'] : '- Present';
                        @endphp
                        </span>
                        <span>{{ $education['institution_location'] }}</span>
                    </div>
                    <ul class="education-details">
                        <li>{{ $education['education_achievements'] }}</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="main-section">
            <div class="skills-container {{ count($resume->skills)==0 ? 'hide' : ''}}">
                <h2>Skills</h2>
                <ul>
                    @foreach ($resume->skills as $skill)
                    <li>{{ $skill['name'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="languages-container {{ count($resume->languages)==0 ? 'hide' : ''}}">
                <h2>Languages</h2>
                <ul>
                    @foreach ($resume->languages as $language)
                    <li>{{ $language['language'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="hobbies-container {{ count($resume->hobbies)==0 ? 'hide' : ''}}">
                <h2>Hobbies</h2>
                <ul>
                    @foreach ($resume->hobbies as $hobby)
                    <li>{{ $hobby['name'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="certificates-container {{ count($resume->certificates)==0 ? 'hide' : ''}}">
                <h2>Certificates</h2>
                <ul>
                    @foreach ($resume->certificates as $certificate)
                    <li>{{ $certificate['title'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
</body>

</html>
