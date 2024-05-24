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
        .main-section .details-container {
            display: flex;
            gap: 0px 60px;
            margin-bottom: 20px;
            
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
        
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy</title>
</head>
<body>
    <header>
        <div class="header-left-side">
            <div class="profile-image-container"  >
                <img src="https://images.pexels.com/photos/697509/pexels-photo-697509.jpeg"  alt="profile">
            </div>
            <div>
                <p class="first-name">DAVID</h2>
                <p class="last-name"  >ANDERON</h2>
                <p class="title">WEB DESIGNER</p>
                <p class="contact-info">P: +048 253 8568 58554 | E: youremail@gmail.com</p>
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
        <div class="details-container">
            <div class="details-type">
                <div>
                    PROFILE
                </div>
            </div>
            <div class="details">
               My Name is Isabella lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum hase been the industry's standard dummy text ever since the 1500s,
               when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
               but also the leap into electronic typesetting, remaining essentially unchanged.
            </div>
        </div>
        <div class="details-container">
            <div class="details-type">
                <div>
                    EDUCATION
                </div>
                
            </div>
            <div class="details">
                <ul>
                    <li>
                        <h4>DEGREE EDUCATION</h4>
                        <p>JUNE 2008 - DEC 2014</p>
                        <p>Lorem ipsum dolor sit. amet consectet gelit.</p>
                    </li>
                    <li>
                        <h4>HIGHER SECIBDARY</h4>
                        <p>JUNE 2008 - DEC 2014</p>
                        <p>Lorem ipsum dolor sit. amet consectet gelit.</p>
                    </li>
                    <li>
                        <h4>HIGH SCHOOL</h4>
                        <p>JUNE 2008 - DEC 2014</p>
                        <p>Lorem ipsum dolor sit. amet consectet gelit.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="details-container">
            <div class="details-type"> 
                <div>
                    WORK EXPERIENCE
                </div>
            </div>
            <div class="details">
                <ul>
                    <li>
                        <h4>ENTER YOUR POSITION TITLE HERE</h4>
                        <p>Company Name / 2014 - Present</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, nam fugiat. Sit odio debitis ex amet architecto explicabo sunt ipsa.</p>

                    </li>
                    <li>
                        <h4>ENTER YOUR POSITION TITLE HERE</h4>
                        <p>Company Name / 2014 - Present</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, nam fugiat. Sit odio debitis ex amet architecto explicabo sunt ipsa.</p>
                    </li>
                </ul>

            </div>
        </div>
    </main>
</body>
</html>