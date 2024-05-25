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
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .container {
            display: flex;
            margin: 20px;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            width: 300px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid white;
        }

        .sidebar h1 {
            font-size: 28px;
            margin: 0 0 10px 0;
        }

        .sidebar p {
            font-size: 14px;
            margin: 5px 0;
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
        }

        .sidebar h2 {
            font-size: 18px;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .main-content {
            padding: 40px;
            flex-grow: 1;
            background-color: #ffffff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-content h2 {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .main-content ul {
            list-style-type: none;
            padding: 0;
        }

        .main-content li {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .main-content li strong {
            display: block;
        }

        .main-content ul ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .main-content .section {
            margin-bottom: 30px;
        }
    </style>
    <title>Resume</title>
</head>

<body>

    <div class="container">
        <div class="sidebar">
            <div style="text-align: center;">
                <img src="{{ $resume_data['personalInformation']['cv_profile_image'] ?? 'http://localhost:3001/_next/static/media/default-user.f478f928.jpg' }}" alt="Profile Picture">
                <h1>{{ $resume_data['personalInformation']['firstName'] }} {{ $resume_data['personalInformation']['lastName'] }}</h1>
                <p>Email: {{ $resume_data['personalInformation']['email'] }}</p>
                <p>Phone: {{ $resume_data['personalInformation']['phone'] }}</p>
                <p>LinkedIn: <a href="{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}">{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}</a></p>
            </div>

            <div>
                <h2>Languages</h2>
                <ul>
                    @foreach ($resume_data['languages'] as $language)
                    <li>{{ $language['language'] }} - {{ $language['proficiency'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2>Hobbies</h2>
                <ul>
                    @foreach ($resume_data['hobbies'] as $hobby)
                    <li>{{ $hobby['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="section">
                <h2>Summary</h2>
                <p>{{ $resume_data['personalInformation']['summary'] }}</p>
            </div>

            <div class="section">
                <h2>Education</h2>
                <ul>
                    @foreach ($resume_data['educations'] as $education)
                    @if ($education['visible_on_cv'])
                    <li>
                        <strong>{{ $education['degree'] }} in {{ $education['field_study'] }}</strong>
                        {{ $education['institution_name'] }}, {{ $education['institution_location'] }}<br>
                        {{ $education['education_starting_year'] }} - {{ $education['education_graduation_year'] }}<br>
                        Achievements: {{ $education['education_achievements'] }}
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="section">
                <h2>Experience</h2>
                <ul>
                    @foreach ($resume_data['experiences'] as $experience)
                    @if ($experience['visible_on_cv'])
                    <li>
                        <strong>{{ $experience['job_title'] }}</strong> at {{ $experience['company_name'] }}, {{ $experience['company_location'] }}<br>
                        {{ $experience['start_date'] }} - {{ $experience['currently_working'] ? 'Present' : $experience['to_date'] }}<br>
                        <em>{{ $experience['designation'] }}, {{ $experience['department'] }}</em><br>
                        Responsibilities:
                        <ul>
                            <li>{{ $experience['responsibilities'] }}</li>
                        </ul>
                        Expertises:
                        <ul>
                            @foreach ($experience['expertises'] as $expertise)
                            <li>{{ $expertise['name'] }}: {{ $expertise['months'] }} months</li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="section">
                <h2>Skills</h2>
                <ul>
                    @foreach ($resume_data['skills'] as $skill)
                    <li>{{ $skill['name'] }} - Rating: {{ $skill['rating'] }}/5</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
