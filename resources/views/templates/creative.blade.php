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
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            background-color: #f7f7f7;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            width: 300px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
        }

        .sidebar p {
            margin: 5px 0;
            font-size: 14px;
        }

        .sidebar a {
            color: #ecf0f1;
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
            background-color: white;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-content h2 {
            font-size: 22px;
            color: #2980b9;
            margin-bottom: 15px;
        }

        .main-content p {
            margin: 5px 0;
        }

        .main-content ul {
            list-style-type: none;
            padding: 0;
        }

        .main-content li {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .main-content ul li ul {
            list-style-type: disc;
            margin-left: 20px;
        }
    </style>
    <title>Classic Resume</title>
</head>

<body>
    <div class="sidebar">
        <div>
            <div style="text-align: center;">
                <h1>{{ $resume['personalInformation']['firstName'] }} {{ $resume['personalInformation']['lastName'] }}</h1>
                <p>Email: {{ $resume['personalInformation']['email'] }}</p>
                <p>Phone: {{ $resume['personalInformation']['phone'] }}</p>
                <p>LinkedIn: <a href="{{ $resume['personalInformation']['mediaLinks'][0]['url'] }}">{{ $resume['personalInformation']['mediaLinks'][0]['url'] }}</a></p>
            </div>

            <div>
                <h2>Languages</h2>
                <ul>
                    @foreach ($resume['languages'] as $language)
                    <li>{{ $language['language'] }} - {{ $language['proficiency'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2>Hobbies</h2>
                <ul>
                    @foreach ($resume['hobbies'] as $hobby)
                    <li>{{ $hobby['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div>
            <h2>Summary</h2>
            <p>{{ $resume['personalInformation']['summary'] }}</p>
        </div>

        <div>
            <h2>Education</h2>
            <ul>
                @foreach ($resume['educations'] as $education)
                @if ($education['visible_on_cv'])
                <li>
                    <strong>{{ $education['degree'] }} in {{ $education['field_study'] }}</strong> - {{ $education['institution_name'] }}, {{ $education['institution_location'] }}<br>
                    {{ $education['education_starting_year'] }} - {{ $education['education_graduation_year'] }}<br>
                    Achievements: {{ $education['education_achievements'] }}
                </li>
                @endif
                @endforeach
            </ul>
        </div>

        <div>
            <h2>Experience</h2>
            <ul>
                @foreach ($resume['experiences'] as $experience)
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

        <div>
            <h2>Skills</h2>
            <ul>
                @foreach ($resume['skills'] as $skill)
                <li>{{ $skill['name'] }} - Rating: {{ $skill['rating'] }}/5</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
