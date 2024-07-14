<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
      body {
        font-family: Arial, sans-serif;
        color: #698389;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }

      .container {
        width: 800px;
        height: 1000px;        
        margin: 20px auto;
        padding: 40px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      header {
        text-align: left;
        padding-bottom: 20px;
        margin-bottom: 20px;
      }

      h1 {
        font-size: 36px;
        margin: 0;
      }

      hr {
        border: 0;
        height: 2px;
        background-color: #11c8d5;
        margin: 10px 0;
      }

      .contact-info {
        font-size: 14px;
        margin-top: 10px;
      }

      .contact-info span {
        margin: 0 10px;
      }

      .social-media {
        text-align: right;
        margin-top: 20px;
      }

      .social-media a {
        text-decoration: none;
        margin: 0 5px;
      }

      .social-media i {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #ff5722;
        color: white;
        padding: 10px;
        font-size: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }

      .profile,
      .experience,
      .skills,
      .education,
      .projects {
        margin-bottom: 20px;
      }

      h2 {
        font-size: 24px;
        color: #5a959e;
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 10px;
      }

      h2::after {
        content: "";
        display: block;
        width: 20%;
        border-bottom: 2px solid #5a959e;
        position: absolute;
        left: 0;
        bottom: 0;
      }

      .content {
        display: flex;
        justify-content: space-between;
      }

      .left-column,
      .right-column {
        width: 48%;
      }

      .experience .job,
      .education .education-item,
      .projects .project {
        margin-bottom: 20px;
      }

      .experience .job h3,
      .education .education-item h3,
      .projects .project h3 {
        font-size: 18px;
        margin: 5px 0;
      }

      .experience .job p,
      .education .education-item p,
      .projects .project p {
        font-size: 14px;
        margin: 10px 0;
      }

      .experience .job ul,
      .projects .project ul {
        margin: 0;
        padding-left: 20px;
      }

      .experience .job ul li,
      .projects .project ul li {
        font-size: 14px;
        margin-bottom: 5px;
        list-style-type: disc;
      }

      .skills p {
        font-size: 14px;
        margin-left: 30px;
      }

      .blob-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
        pointer-events: none;
      }

      .blob {
        width: 20vw;
        height: 40vh;
        position: absolute;
      }

      .blob-1 {
        top: 15%;
        left: 57%;
        opacity: 0.5;
      }

      .blob-2 {
        top: 70%;
        left: 23%;
        opacity: 0.2;
      }

      .blob-3 {
        top: 20%;
        left: 25%;
        opacity: 0.2;
      }

      @media (max-width: 768px) {
        .container {
          width: 95%;
          padding: 20px;
        }

        .content {
          flex-direction: column;
        }

        .left-column,
        .right-column {
          width: 100%;
        }

        .blob {
          width: 60vw;
          height: 60vh;
        }

        .blob-1 {
          top: 5%;
          left: 5%;
        }

        .blob-2 {
          top: 40%;
          left: 20%;
        }

        .blob-3 {
          top: 15%;
          left: 55%;
        }
      }

      @media (max-width: 480px) {
        .container {
          padding: 10px;
        }

        .blob {
          width: 80vw;
          height: 80vh;
        }

        .blob-1 {
          top: 2%;
          left: 2%;
        }

        .blob-2 {
          top: 30%;
          left: 10%;
        }

        .blob-3 {
          top: 10%;
          left: 35%;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <h1>{{ $resume->personal_informations['firstName'] }} {{ $resume->personal_informations['lastName'] }}</h1>
        <hr />
        <div class="contact-info">
          <span>{{ $resume->personal_informations['currentAddress']['city'] }}, {{ $resume->personal_informations['currentAddress']['country'] }}</span>
          <span>|</span>
          <span>{{ $resume->personal_informations['phone'] }}</span>
          <span>|</span>
          <span>{{ $resume->personal_informations['email'] }}</span>
        </div>
      </header>

      <section class="profile">
        <h2>Professional Profile</h2>
        <p style="margin-left: 30px">
            {{ $resume->personal_informations['summary'] }}
        </p>
      </section>

      <div class="content">
        <div class="blob-wrapper">
          <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="blob blob-1">
            <path
              fill="#FFAA44"
              d="M43.2,25.1C29.3,49,-27.1,48.6,-41.3,24.5C-55.6,0.3,-27.8,-47.5,0.4,-47.3C28.5,-47,57.1,1.2,43.2,25.1Z"
              transform="translate(100 100)" />
          </svg>
          <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="blob blob-2">
            <path
              fill="#77DD"
              d="M43.2,25.1C29.3,49,-27.1,48.6,-41.3,24.5C-55.6,0.3,-27.8,-47.5,0.4,-47.3C28.5,-47,57.1,1.2,43.2,25.1Z"
              transform="translate(100 100)" />
          </svg>
          <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="blob blob-3">
            <path
              fill="#698389"
              d="M43.2,25.1C29.3,49,-27.1,48.6,-41.3,24.5C-55.6,0.3,-27.8,-47.5,0.4,-47.3C28.5,-47,57.1,1.2,43.2,25.1Z"
              transform="translate(100 100)" />
          </svg>
        </div>

        <section class="left-column">
          <section class="experience {{ count($resume->experiences) == 0 ? 'hide' : '' }}">
            <h2>Experience</h2>
            @foreach ($resume->experiences as $experience)
              <div class="job {{ $experience['visible_on_cv'] ? '' : 'hide' }}">
                <h3>{{ $experience['job_title'] }}, {{ $experience['company_name'] }}</h3>
                <p>
                  @php
                    echo $experience['start_date'];
                    echo $experience['currently_working'] ? '- Present' : ' - ' . $experience['to_date'];
                  @endphp
                </p>
                @if (count($experience['expertises']) > 0)
                  <ul>
                    @foreach ($experience['expertises'] as $expertise)
                      <li>{{ $expertise['name'] }} for {{ $expertise['months'] }} months</li>
                    @endforeach
                  </ul>
                @endif
              </div>
            @endforeach
          </section>

          <section class="skills">
            <h2>Skills</h2>
            <p style="margin-left: 30px">
              @foreach ($resume->skills as $skill)
                {{ $skill['name'] }}{{ $loop->last ? '' : ', ' }}
              @endforeach
            </p>
          </section>
        </section>

        <section class="right-column">
          <section class="education">
            <h2>Education</h2>
            @foreach ($resume->educations as $education)
              <div class="education-item">
                <h3>{{ $education['institution_name'] }}</h3>
                <p>{{ $education['field_study'] }}</p>
                <p>{{ $education['education_starting_year'] }} - {{ $education['education_graduation_year'] ? $education['education_graduation_year'] : 'Present' }}</p>
              </div>
            @endforeach
          </section>

          <section class="projects">
            <h2>Projects & Volunteer</h2>
            @foreach ($resume->projects as $project)
              <div class="project">
                <h3>{{ $project['title'] }}</h3>
                <p>{{ $project['startDate'] }} - {{ $project['present'] ? 'Present' : $project['endDate'] }}</p>
                <p>{{ $project['description'] }}</p>
              </div>
            @endforeach
          </section>
        </section>
      </div>

      <div class="social-media">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
      </div>
    </div>
  </body>
</html>

