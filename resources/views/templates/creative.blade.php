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
            max-width: 1000px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            color: white;
            background: linear-gradient(to bottom, #88a2a7 55%, transparent 50%);
        }

        .header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 90px;
            border: 10px solid white;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
            letter-spacing: 5px;
        }

        .header h2 {
            margin: 0;
            font-size: 1.5em;
            font-weight: normal;
            letter-spacing: 2px;
            margin-top: 5px;
            color: #666;
        }

        .main {
            display: flex;
            padding-left: 50px;
            padding-right: 40px;
            padding-bottom: 30px;
        }

        .left-column {
            text-align: right;
            width: 25%;
            padding-right: 30px;
        }

        .right-column {
            width: 70%;
            padding-left: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h3 {
            text-transform: uppercase;
            font-size: 1.6em;
            letter-spacing: 5px;
            margin-bottom: 10px;
            color: #6a6666;
            border-bottom: 4px solid #88a2a7;
            padding-bottom: 5px;
        }

        .section p {
            margin: 5px 0;
            color: #565353;
            font-size: large;
        }

        .skills ul {
            list-style: none;
            padding: 0;
        }

        .skills ul li {
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: large;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .experience .job {
            margin-bottom: 50px;
        }

        .experience .job h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
            text-transform: uppercase;
        }

        .experience .job p {
            margin-bottom: 10px;
        }

        .experience .job ul {
            list-style: disc inside;
            padding-left: 0;
            color: #666;
        }

        .experience .job ul li {
            padding: 5px;
            border-radius: 5px;
        }

        .icons {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .icons p {
            margin: 10px;
            font-size: 18px;
        }

        .icons a {
            color: rgb(40, 40, 40);
            text-decoration: none;
            margin-left: 10px;
        }

        .icons i {
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ $resume->personal_informations['cv_profile_image'] }}" alt="Profile Picture">
            <div>
                <h1>{{ $resume->personal_informations['firstName'] }} {{ $resume->personal_informations['lastName'] }}</h1>
                <h2>{{ $resume->personal_informations['title'] }}</h2>
            </div>
        </div>
        <div class="main">
            <div class="left-column">
                <div class="section contact">
                    <h3>Contact</h3>
                    <div class="icons">
                        <p>{{ $resume->personal_informations['phone'] }}</p>
                        <a href="tel:{{ $resume->personal_informations['phone'] }}"><i class="fa-solid fa-phone"></i></a>
                    </div>
                    <div class="icons">
                        <p>{{ $resume->personal_informations['email'] }}</p>
                        <a href="mailto:{{ $resume->personal_informations['email'] }}"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                    <div class="icons">
                        <p>{{ $resume->personal_informations['currentAddress']['city'] }}, {{ $resume->personal_informations['currentAddress']['country'] }}</p>
                        <a href="#"><i class="fa-solid fa-location-dot"></i></a>
                    </div>
                </div>
                <div class="section education {{ count($resume->educations) == 0 ? 'hide' : '' }}">
                    <h3>Education</h3>
                    @foreach ($resume->educations as $education)
                        <p>
                            <strong>{{ $education['degree'] }}</strong><br>
                            {{ $education['institution_name'] }}<br>
                            {{ $education['education_starting_year'] }} - {{ $education['education_graduation_year'] ? $education['education_graduation_year'] : 'Present' }}
                        </p>
                    @endforeach
                </div>
                <div class="section skills {{ count($resume->skills) == 0 ? 'hide' : '' }}">
                    <h3>Skills</h3>
                    <ul>
                        @foreach ($resume->skills as $skill)
                            <li>{{ $skill['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="right-column">
                <div class="section profile">
                    <h3>Profile</h3>
                    <p>{{$resume->personal_informations['summary']}}</p>
                </div>
                <div class="section experience {{ count($resume->experiences) == 0 ? 'hide' : '' }}">
                    <h3>Experience</h3>
                    @foreach ($resume->experiences as $experience)
                        <div class="job {{ $experience['visible_on_cv'] ? '' : 'hide' }}">
                            <h4>{{ $experience['job_title'] }}</h4>
                            <p>{{ $experience['company_name'] }} | {{ $experience['company_location'] }} | {{ $experience['start_date'] }} - {{ $experience['currently_working'] ? 'Present' : $experience['to_date'] }}</p>
                            <p>{{ $experience['responsibilities'] }}</p>
                            @if (count($experience['expertises']) > 0)
                                <ul>
                                    @foreach ($experience['expertises'] as $expertise)
                                        <li>{{ $expertise['name'] }} for {{ $expertise['months'] }} months</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="section projects {{ count($resume->projects) == 0 ? 'hide' : '' }}">
                    <h3>Projects</h3>
                    @foreach ($resume->projects as $project)
                   
                        <p><strong>{{ $project['title'] }}</strong><br>{{ $project['description'] }}</p>
                    @endforeach
                </div>
                <div class="section languages {{ count($resume->languages) == 0 ? 'hide' : '' }}">
                    <h3>Languages</h3>
                    <ul>
                        @foreach ($resume->languages as $language)
                            <li>{{ $language['language'] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
