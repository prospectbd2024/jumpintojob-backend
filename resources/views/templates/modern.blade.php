<div style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; display: flex;">
    <div style="background-color: #f4f4f4; padding: 20px; width: 250px; box-shadow: 2px 0 5px rgba(0,0,0,0.1);">
        <div style="text-align: center;">
            <h1 style="margin: 0 0 10px 0; font-size: 24px;">{{ $resume_data['personalInformation']['firstName'] }} {{ $resume_data['personalInformation']['lastName'] }}</h1>
            <p style="margin: 5px 0; font-size: 14px;">Email: {{ $resume_data['personalInformation']['email'] }}</p>
            <p style="margin: 5px 0; font-size: 14px;">Phone: {{ $resume_data['personalInformation']['phone'] }}</p>
            <p style="margin: 5px 0; font-size: 14px;">LinkedIn: <a href="{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}">{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}</a></p>
        </div>

        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px;">Languages</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['languages'] as $language)
                    <li style="margin-bottom: 10px;">{{ $language['language'] }} - {{ $language['proficiency'] }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 style="font-size: 18px; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px;">Hobbies</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['hobbies'] as $hobby)
                    <li style="margin-bottom: 10px;">{{ $hobby['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div style="padding: 20px; flex-grow: 1;">
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px;">Summary</h2>
            <p style="margin: 5px 0;">{{ $resume_data['personalInformation']['summary'] }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px;">Education</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['educations'] as $education)
                    @if ($education['visible_on_cv'])
                        <li style="margin-bottom: 10px;">
                            <strong>{{ $education['degree'] }} in {{ $education['field_study'] }}</strong> - {{ $education['institution_name'] }}, {{ $education['institution_location'] }}<br>
                            {{ $education['education_starting_year'] }} - {{ $education['education_graduation_year'] }}<br>
                            Achievements: {{ $education['education_achievements'] }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px;">Experience</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['experiences'] as $experience)
                    @if ($experience['visible_on_cv'])
                        <li style="margin-bottom: 10px;">
                            <strong>{{ $experience['job_title'] }}</strong> at {{ $experience['company_name'] }}, {{ $experience['company_location'] }}<br>
                            {{ $experience['start_date'] }} - {{ $experience['currently_working'] ? 'Present' : $experience['to_date'] }}<br>
                            <em>{{ $experience['designation'] }}, {{ $experience['department'] }}</em><br>
                            Responsibilities:
                            <ul style="list-style-type: none; padding-left: 20px;">
                                <li>{{ $experience['responsibilities'] }}</li>
                            </ul>
                            Expertises:
                            <ul style="list-style-type: none; padding-left: 20px;">
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
            <h2 style="font-size: 18px; border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px;">Skills</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['skills'] as $skill)
                    <li style="margin-bottom: 10px;">{{ $skill['name'] }} - Rating: {{ $skill['rating'] }}/5</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>