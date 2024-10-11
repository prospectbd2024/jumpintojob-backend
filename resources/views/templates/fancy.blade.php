<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .sidebar{
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100px;
            height: 100%;
            background-color: #222a35;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .sidebar h1{
            transform: rotate(270deg);
            color: white;
            letter-spacing: 23px;
            font-weight: bold;
            font-size: 20px;
        }
        body{
            padding-left: 100px;
            margin-top: 50px;
        }
        header{
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }
        header .profile-image-container{
            position: relative;
            background-color: white;
        }
        header .profile-image-container img{
            width: 150px;
            position: absolute;
            height: 100%;
            left: -75px;
            z-index: 10;
            clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
        }
         
        .header-right-side {
            width: 10px;
            height: 100%;
            background-color: red;
            clip-path:  polygon(0 15%, 100% 0, 100% 100%, 0 85%);
            border: 5px solid red; /* Border around the hexagon */
        }
        .header-left-side {
             
             display: flex;
             gap: 0px 110px;
        }
        .first-name, .last-name{
            font-size: 40px;
            padding-bottom: 3px;
        }
        .last-name{
            color: rgb(219, 0, 0);
        }
        .title{
            font-size: 20px;
            padding-top: 5px;
            padding-bottom: 10px;
        }
        .main-section{
            display: flex;
            gap: 100px 0px;
            margin-top: 100px;
            flex-direction: column;
        }
        .main-section .details-container {
            display: flex;
            gap: 0px 80px;
       
            
        }
        .main-section .details-container:nth-of-type(1) {
   
            gap: 0px 50px;
            color: rgb(83, 83, 83);
 
        }
        .main-section .details-container .details-type {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: rotate(270deg);
        }
        .main-section .details-container .details-type div{
            width: fit-content;
            position: absolute;
            white-space: nowrap;
            z-index: 10;
            background-color: red;
            padding: 5px 20px;
            color: white;
            border-radius: 20px;
        }
        .contact-info{
            color: grey;
            font-size: 12px;
        }
        .details ul  {
            list-style: none;          
            
            padding-left: 20px;
        }
        .details ul li{
            padding-bottom: 15px;
            padding-left: 10px;
            border-left: 1px solid black;
            position: relative;
        }
        .details ul li::before{
            content: "\25CF";
            position: absolute;
            top: -7px;
            transform: translateX(-158%);
             
        }
        .details ul li p{
            color: grey;
            
        }
        .hide{
            display: none !important;
        }
        
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy</title>
</head>
<body>
    <header>
        <div class="header-left-side">
            <div class="profile-image-container"  >
                <img src="{{ $resume->personal_informations['cv_profile_image'] }}"  alt="profile">
            </div>
            <div>
                <p class="first-name">{{$resume->personal_informations['firstName'] }}</h2>
                <p class="last-name"  >{{$resume->personal_informations['lastName'] }}</h2>
                <p class="title"> {{$resume->personal_informations['title'] }}</p>
                <p class="contact-info">P: {{$resume->personal_informations['phone'] }}| E: {{$resume->personal_informations['email'] }}</p>
            </div>
        </div>
        <div>
            <div class="header-right-side">

            </div>
        </div>
    </header>
    <sidebar class="sidebar">
        <h1>RESUME</h1> 
    </sidebar>
    <main class="main-section">
        <div class="details-container {{$resume->personal_informations['summary']==''?'hide': '' }}" >
            <div class="details-type">
                <div>
                    PROFILE
                </div>
            </div>
            <div class="details">
                {{$resume->personal_informations['summary'] }}
            </div>
        </div>
        <div class="details-container {{count($resume->educations) ==0 ?'hide': '' }}">
            <div class="details-type">
                <div>
                    EDUCATION
                </div>
                
            </div>
            <div class="details">
                <ul>
                    @foreach ($resume->educations as $education)
                        
                    @endforeach
                    <li>
                        <h4>{{$education['field_study']}}</h4>
                        <p>
                        @php
                            echo   $education['education_starting_year'];
                            echo   $education['education_graduation_year']!=""?$education['education_graduation_year']:"- Present";
                        @endphp
                        </p>
                        <p>{{ $education['education_achievements']}}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="details-container {{count($resume->experiences) ==0 ?'hide': '' }}">
            <div class="details-type"> 
                <div>
                    WORK EXPERIENCE
                </div>
            </div>
            <div class="details">
                <ul>
                    @foreach ($resume->experiences as $experience)                        
                    <li>
                        <h4>{{  $experience['company_name'] }}</h4>
                        <p>{{  $experience['job_title'] }} /                       
                        @php
                            echo $experience['start_date'] ;
                            echo  $experience['currently_working'] ? '- Present' : $experience['to_date']; 
                        @endphp
                        </p>
                        <p>{{$experience['responsibilities']}}</p>
                        <p>
                            @foreach ($experience['expertises'] as $expertise)
                                     
                            <li>
                                {{$expertise['name']}} for {{$expertise['months']}} months
                            </li>   
                            @endforeach
                        </p>

                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="details-container {{count($resume->skills) ==0 ?'hide': '' }}">
            <div class="details-type"> 
                <div>
                    SKILLS
                </div>
            </div>
            <div class="details">
                <ul>
                    @foreach ($resume->skills as $skill)                        
                    <li>
                       <h3>{{$skill['name']}}</h3> 
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="details-container {{count($resume->languages) ==0 ?'hide': '' }}">
            <div class="details-type"> 
                <div>
                    LANGUAGES
                </div>
            </div>
            <div class="details">
                <ul>
                    @foreach ($resume->languages as $language) 
                    <li>                        
                        <h3>
    
                            {{$language['language']}}
                        </h3>
                    </li>                      
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="details-container {{count($resume->hobbies) ==0 ?'hide': '' }}">
            <div class="details-type"> 
                <div>
                    HOBBIES
                </div>
            </div>
            <div class="details">
                <ul>
                    @foreach ($resume->hobbies as $hobby) 
                    <li>    
                        <h3>
                            {{$hobby['name']}}
                        </h3>
                    </li>                       
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="details-container {{count($resume->certificates) ==0 ?'hide': '' }}">
            <div class="details-type"> 
                <div>
                    Certificates
                </div>
            </div>
            <div class="details">
                <ul>
                    @foreach ($resume->certificates as $certificate)                        
                    <li>
                        <h3>{{$certificate['title']}}</h3>
                        <p>{{ $certificate['description']}}</p>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </main>
</body>
</html>