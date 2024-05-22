<div style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; display: flex; background-color: #f7f7f7;">
    <div style="background-color: #2c3e50; color: white; padding: 20px; width: 300px; box-shadow: 2px 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center;">
            <img src="{{ $resume_data['personalInformation']['cv_profile_image']??'http://localhost:3001/_next/static/media/default-user.f478f928.jpg' }}" alt="Profile Picture" style="width: 150px; border-radius: 50%; margin-bottom: 20px;">
            <h1 style="margin: 0 0 10px 0; font-size: 28px;">{{ $resume_data['personalInformation']['firstName'] }} {{ $resume_data['personalInformation']['lastName'] }}</h1>
            <p style="margin: 5px 0; font-size: 14px;">Email: {{ $resume_data['personalInformation']['email'] }}</p>
            <p style="margin: 5px 0; font-size: 14px;">Phone: {{ $resume_data['personalInformation']['phone'] }}</p>
            <p style="margin: 5px 0; font-size: 14px;">LinkedIn: <a href="{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}" style="color: #ecf0f1;">{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}</a></p>
        </div>

        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; border-bottom: 2px solid #ecf0f1; padding-bottom: 5px; margin-bottom: 20px;">Languages</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['languages'] as $language)
                    <li style="margin-bottom: 10px;">{{ $language['language'] }} - {{ $language['proficiency'] }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 style="font-size: 18px; border-bottom: 2px solid #ecf0f1; padding-bottom: 5px; margin-bottom: 20px;">Hobbies</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['hobbies'] as $hobby)
                    <li style="margin-bottom: 10px;">{{ $hobby['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div style="padding: 40px; flex-grow: 1; background-color: white; box-shadow: -2px 0 10px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 22px; color: #2980b9; margin-bottom: 15px;">Summary</h2>
            <p style="margin: 5px 0;">{{ $resume_data['personalInformation']['summary'] }}</p>
        </div>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 22px; color: #2980b9; margin-bottom: 15px;">Education</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['educations'] as $education)
                    @if ($education['visible_on_cv'])
                        <li style="margin-bottom: 15px; line-height: 1.6;">
                            <strong>{{ $education['degree'] }} in {{ $education['field_study'] }}</strong> - {{ $education['institution_name'] }}, {{ $education['institution_location'] }}<br>
                            {{ $education['education_starting_year'] }} - {{ $education['education_graduation_year'] }}<br>
                            Achievements: {{ $education['education_achievements'] }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 22px; color: #2980b9; margin-bottom: 15px;">Experience</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['experiences'] as $experience)
                    @if ($experience['visible_on_cv'])
                        <li style="margin-bottom: 15px; line-height: 1.6;">
                            <strong>{{ $experience['job_title'] }}</strong> at {{ $experience['company_name'] }}, {{ $experience['company_location'] }}<br>
                            {{ $experience['start_date'] }} - {{ $experience['currently_working'] ? 'Present' : $experience['to_date'] }}<br>
                            <em>{{ $experience['designation'] }}, {{ $experience['department'] }}</em><br>
                            Responsibilities:
                            <ul style="list-style-type: disc; margin-left: 20px;">
                                <li>{{ $experience['responsibilities'] }}</li>
                            </ul>
                            Expertises:
                            <ul style="list-style-type: disc; margin-left: 20px;">
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
            <h2 style="font-size: 22px; color: #2980b9; margin-bottom: 15px;">Skills</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($resume_data['skills'] as $skill)
                    <li style="margin-bottom: 15px; line-height: 1.6;">{{ $skill['name'] }} - Rating: {{ $skill['rating'] }}/5</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>