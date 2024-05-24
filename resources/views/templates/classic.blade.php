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
            padding-inline: 100px;
            padding-block: 40px;
            font-family: Arial, Helvetica, sans-serif;
            user-select: none;
        }

        header {
            margin-bottom: 40px;
        }

        .header-title {
            margin-bottom: 4px;
        }

        .header-subtitle {
            color: #d49548;
            font-size: 15px;
            font-weight: bold;
            padding-block: 4px 2px;
            margin-bottom: 3px;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            width: 600px;
        }

        .contact-item {
            color: #d49548;
        }

        h2 {
            margin-bottom: 5px;
        }

        h3 {
            margin-bottom: 2px;
        }

        .highlight {
            color: #d49548;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .experience-period {
            display: flex;
            margin-bottom: 5px;
        }

        .experience-details,
        .education-details {
            list-style: none;
            margin-bottom: 20px;
            padding-left: 10px;
        }

        .experience-details li,
        .education-details li {
            position: relative;
            padding-left: 20px;
        }

        .experience-details li::before,
        .education-details li::before {
            content: "•";
            /* Bullet symbol */
            position: absolute;
            left: 0;
            top: 0;
            transform: translateX(-100%);

        }

        hr {
            height: 3px;
            background: black;
            border: none;
            margin-bottom: 20px;
        }

        .subsection-end-hr {
            border: none;
            border-top: 1px dashed grey;
            margin-bottom: 20px;
            height: 0px;
            background-color: transparent;
            margin-top: 10px;
        }

        main {
            display: grid;
            grid-template-columns: 3fr 2fr;
            gap: 0 20px;
        }
        .certificate-section{
            margin-bottom: 20px;
        }
        .publication-subtitle{
            font-size: 17px;
        }
        .right-side{
            display: flex;
            flex-direction: column;
            gap: 20px 0px;
        }
        .left-side{
            display: flex;
            flex-direction: column;
            gap: 20px 0px;
        }
        .skills-container {
    width: 70%; /* Adjust width as needed */
    text-align: center;
    }

    .skills-container h2 {
        margin-bottom: 10px;
    }

    .skills-container hr {
        margin-bottom: 20px;
    }

    .skills-container ul {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* Adjust gap as needed */
    }

    .skills-container li {
        /* background-color: lightblue; */
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
        font-weight: bold;
    }

    .education-container{
        display: flex;
    }
    .vertical-row{

    }
    .education-gpa-container{

        flex: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    </style>
    <title>classic</title>
</head>

<body>

    <header>
        <h2 class="header-title">AIDEN KELLY</h2>
        <div class="header-subtitle">High School Teacher | Sciences</div>
        <div class="contact-info">
            <div>
                <i class="fa fa-phone contact-item"></i> +3598888888888
            </div>
            <div>
                <span class="contact-item">@</span> name@gmail.com
            </div>
            <div>
                <i class="fa fa-map-marker contact-item"></i> Queens,NY
            </div>
        </div>
    </header>
    <main>
        <div class="left-side">
            <div class="experience-section">
                <h2>EXPERIENCE</h2>
                <hr>
                <div>
                    <h3>Teacher</h3>
                    <p class="highlight">Hudson High School of Learning Technologies</p>
                    <div class="experience-period">
                        <span><i class="fa fa-calendar"></i> 01/2015- Present</span>
                        <span style="margin-left: 10px;"><i class="fa fa-map-marker"></i> NYC</span>
                    </div>
                    <ul class="experience-details">
                        <li>Teaching classes of 25+ on biology and chemistry topics</li>
                        <li>Participated in student recruitment, registration and placement activities</li>
                        <li>Coordinated School Information Night each year</li>
                        <li>Contributed to raising retention rate from 75% - 89% through running extracurricular
                            sessions</li>
                        <li>Received two outstanding reports from classroom inspections from the city central education
                            board</li>
                        <li>Ran 100+ school information sessions</li>
                    </ul>
                    <hr class="subsection-end-hr">
                </div>

                <div>
                    <h3>Biology Teacher</h3>
                    <p class="highlight">Boston High School</p>
                    <div class="experience-period">
                        <span><i class="fa fa-calendar"></i> 01/2013 - 12/2015</span>
                        <span style="margin-left: 10px;"><i class="fa fa-map-marker"></i> Boston,MA</span>
                    </div>
                    <ul class="experience-details">
                        <li>Developed and executed daily lesson plans to engage and challenge student understanding and
                            involvement, including 30+ international students (ESL) and students with specialized
                            educational needs.</li>
                        <li>Increased the number of A+ to C grades from 60% to 90% over 2 years</li>
                        <li>Taught and mentored 100+ students over the two years, and led 5 extra learning classes
                            outside of school hours</li>
                        <li>Engaged in peer collaboration and instruction during staff development opportunities as well
                            as peer observation of classroom strategies and assessment.</li>
                        <li>Designed original student learning plans centered on the curriculum with corresponding
                            lectures and lab activities which aligned with the Next Generation Science Standards.</li>
                    </ul>
                    <hr class="subsection-end-hr">
                </div>

                <div>
                    <h3>Teaching Assistant</h3>
                    <p class="highlight">Boston High School</p>
                    <div class="experience-period">
                        <span><i class="fa fa-calendar"></i> 2009-2013</span>
                        <span style="margin-left: 10px;">Boston, MA</span>
                    </div>
                    <ul class="experience-details">
                        <li>Implemented lesson plans independently for classrooms of 25+ students</li>
                        <li>Provide educational materials, including daily lesson plans and weekly homework packets that
                            averaged 95% completion rate</li>
                        <li>Lectured weekly in tutorials, and regularly in courses over 8 semesters</li>
                        <li>Assist professor and a class of 25 students with the course related needs</li>
                    </ul>
                </div>
            </div>

            <div class="education-section">
                <h2>EDUCATION</h2>
                <hr>
                <div>
                    <div class="education-container">
                        <div >
                            <h3>Doctorate of Education in Educational Administration</h3>
                            <p class="highlight">South Carolina State University</p>
                            <div class="experience-period">
                                <span><i class="fa fa-calendar"></i> 2011-2013</span>
                                <span style="margin-left: 10px;">Orangeburg, SC</span>
                            </div>
                            <ul class="education-details">
                                <li>Excellence Award(2013)</li>
                            </ul>
                        </div>
                        <div class="education-gpa-container">
 
                            <div style="font-size: 14px; text-align: center; border-left: 2px solid grey; padding-left: 15px;">
       
                                    <p>GPA</p>
                                     <span style="color: #d49548;">4.0</span>/4.0
           
                            </div>
                        </div>
                    </div>

                    <hr class="subsection-end-hr">
                </div>

                <div>
                    <h3>Certificate of Education(Career Development)</h3>
                    <p class="highlight">South Carolina State University</p>
                    <div class="experience-period">
                        <span><i class="fa fa-calendar"></i> 2010-2011</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-side">
            <div class="certificate-section">
                <h2>CERTIFICATION</h2>
                <hr>
                <div>
                    <h3 class="header-subtitle">Professional Registration</h3>
                    <p>Career Development Association of UNited States</p>
                    <hr class="subsection-end-hr">
                </div>
                <div>
                    <h3 class="header-subtitle">Proficient Teacher</h3>
                    <p>NY Education Standards Authority</p>
                    <hr class="subsection-end-hr">
                </div>
                <div>
                    <h3 class="header-subtitle">White Card & Asbestos Awareness</h3>
                    <p>MIT</p>
                    <br>
                </div>
                <div>
                    <h3 class="header-subtitle">Senior First Aid</h3>
                    <p>Ablaze Training Solutions</p>
                    <hr class="subsection-end-hr">
                </div>
                <div>
                    <h3  class="header-subtitle">Anaphylaxis Training</h3>
                    <p>ACSIA</p>
                </div>
            </div>


            <div>
                <h2>PUBLICATIONS</h2>
                <hr>
                <div>
                    <h3 class="publication-subtitle">Project: Issues/Benefits in a Blended Biology Course</h3>
                    <p class="header-subtitle">Global Science and Technology Forum</p>
                    <p><span> <i class="fa fa-calendar"></i> 09/2014 </span></p>
                    <hr>
                </div>
                <div>
                    <h3 class="publication-subtitle">Biology Models & Mechanisms</h3>
                    <p class="header-subtitle">Burgmann Journal(ANU Press)</p>
                    <p><span> <i class="fa fa-calendar"></i> 09/2012 </span></p>
                </div>

            </div>

            <div class="skills-container">
                <h2>SKILLS</h2>
                <hr>
                <ul>
                    <li>PowerPoint</li>
                    <li>Photoshop</li>
                    <li>Cloud Storage</li>
                    <li>Trello</li>
                    <li>Microsoft Teams</li>
                    <li>Blackboard</li>
                </ul>

            </div>



            <div>
                <h2>VOLUNTEERING</h2>
                <h3 class="publication-subtitle">Volunteer</h3>
                <p class="header-subtitle">Peace Corps</p>
                <p><span> <i class="fa fa-calendar"></i> 2007 -2008 </span></p>
                <p style="margin-top: 2px;">Organized Kitchen Welcome for people in need in Queens, NYC</p>
            </div>



        </div>
    </main>

</body>

</html>