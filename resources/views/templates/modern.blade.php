<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 10px;
            color: #524e4e;
        }

        .container {
            max-width: 800px;
            height: 970px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .header .contact-info {
            text-align: left;
            width: 35%;
            font-size: large;
            font-weight: 550;
        }

        .section {
            margin-bottom: 0px;
        }

        .section h2 {
            font-size: 1.6em;
            color: skyblue;
        }

        .column-container {
            display: flex;
            justify-content: space-between;
        }

        .left-column {
            width: 60%;
        }

        .right-column {
            width: 35%;
        }

        .right-column .section {
            margin-bottom: 10px;
        }

        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            margin-bottom: 15px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="name-title">
                <h1>{{ $resume->personal_informations['firstName'] }} {{ $resume->personal_informations['lastName'] }}</h1>
                <p style="font-size: large; font-weight: 550;">{{ $resume->personal_informations['title'] }}</p>
            </div>
            <div class="contact-info">
                <p>
                    {{ $resume->personal_informations['currentAddress']['postalCode'] }}, {{ $resume->personal_informations['currentAddress']['city'] }}, {{ $resume->personal_informations['currentAddress']['state'] }}, {{ $resume->personal_informations['currentAddress']['country'] }}<br>
                    {{ $resume->personal_informations['email'] }}<br>
                    {{ $resume->personal_informations['phone'] }}<br>
                </p>
            </div>
        </div>
        <div class="column-container">
            <div class="left-column">
                <div class="summary section">
                    <h2>Summary</h2>
                    <p>Lorem ipsum In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>
                </div>
                <div class="education section {{ count($resume->educations)==0 ? 'hide' : ''}}">
                    <h2>Education</h2>
                    <ul>
                        @foreach ($resume->educations as $education)
                        <li class="{{ $education['visible_on_cv'] ? '' : 'hide' }}">
                            <strong>{{ $education['institution_name'] }}, {{ $education['institution_location'] }} — {{ $education['degree'] }} in {{ $education['field_study'] }}</strong><br>
                            @php
                                echo $education['education_starting_year'];
                                echo $education['education_graduation_year'] ? '-' . $education['education_graduation_year'] : '- Present';
                            @endphp
                            <br>{{ $education['education_achievements'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="projects section {{ count($resume->projects)==0 ? 'hide' : ''}}">
                    <h2>Projects</h2>
                    <ul>
                        @foreach ($resume->projects as $project)
                        <li class="{{ $project['visible_on_cv'] ? '' : 'hide' }}">
                            <strong>{{ $project['title'] }} — Detail</strong><br>
                            {{ $project['description'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="right-column">
                <div class="skills section {{ count($resume->skills)==0 ? 'hide' : ''}}">
                    <h2>Skills</h2>
                    <ul style="list-style: circle; margin-left: 15px;">
                        @foreach ($resume->skills as $skill)
                        <li>{{ $skill['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="awards section {{ count($resume->awards)==0 ? 'hide' : ''}}">
                    <h2>Awards</h2>
                    <ul>
                        @foreach ($resume->awards as $award)
                        <li>
                            {{ $award['title'] }}<br>
                            {{ $award['description'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="languages section {{ count($resume->languages)==0 ? 'hide' : ''}}">
                    <h2>Languages</h2>
                    <ul style="list-style: circle; margin-left: 15px;">
                        @foreach ($resume->languages as $language)
                        <li>{{ $language['language'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="experience section {{ count($resume->experiences)==0 ? 'hide' : ''}}">
                    <h2>Experience</h2>
                    <ul>
                        @foreach ($resume->experiences as $experience)
                        <li class="{{ $experience['visible_on_cv'] ? '' : 'hide' }}">
                            <strong>{{ $experience['job_title'] }} - {{ $experience['company_name'] }}</strong><br>
                            @php
                                echo $experience['start_date'];
                                echo $experience['currently_working'] ? '- Present' : $experience['to_date'];
                            @endphp
                            <br>{{ $experience['responsibilities'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</body>

</html>
