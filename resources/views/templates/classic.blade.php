
<style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
    .header { text-align: center; }
    .header h1 { margin: 0; }
    .section { margin-bottom: 20px; }
    .section h2 { border-bottom: 2px solid #000; padding-bottom: 5px; margin-bottom: 10px; }
    .section ul { list-style-type: none; padding: 0; }
    .section ul li { margin-bottom: 5px; }
    .section p { margin: 5px 0; }
</style>


<div class="header">
    <h1>{{ $resume_data['personalInformation']['firstName'] }} {{ $resume_data['personalInformation']['lastName'] }}</h1>
    <p>Email: {{ $resume_data['personalInformation']['email'] }}</p>
    <p>Phone: {{ $resume_data['personalInformation']['phone'] }}</p>
    <p>LinkedIn: <a href="{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}">{{ $resume_data['personalInformation']['mediaLinks'][0]['url'] }}</a></p>
</div>

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
                    <strong>{{ $education['degree'] }} in {{ $education['field_study'] }}</strong> - {{ $education['institution_name'] }}, {{ $education['institution_location'] }}<br>
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

<div class="section">
    <h2>Languages</h2>
    <ul>
        @foreach ($resume_data['languages'] as $language)
            <li>{{ $language['language'] }} - Proficiency: {{ $language['proficiency'] }}</li>
        @endforeach
    </ul>
</div>

<div class="section">
    <h2>Hobbies</h2>
    <ul>
        @foreach ($resume_data['hobbies'] as $hobby)
            <li>{{ $hobby['name'] }}</li>
        @endforeach
    </ul>
</div>

