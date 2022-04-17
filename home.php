<?php
    session_start();
    $_SESSION['actb'] = 'homie';
    require 'homeheader.php';
?>
    <main>
        <section class="home">
            <center><img src="logggo.png" class="img-fluid" alt=""></center>
            <center><img src="img/logoa.png" class="img-fluid" alt=""></center>
        </section>
        <section class="mandate">
            <h1 class="text-center" style="color:white;">Mandate</h1><br>
            <p class="text-justify text-center" style="color:white;">- The Early Childhood Education Division (ECED) shall be responsible for the development, integration and implementation of policies and programs, projects and activities concerning early childhood education in the City, basic holistic needs and optimum growth and development of zero (0) to four (4) year - old children through the Early Childhood Care and Development (ECCD) Programs (RA10410, Early Years Act of 2013). In addition, Early Childhood Education Division (ECED) is also responsible in the Registration, Granting of Permit and Recognition of Public Child Development Centers and Private Learning Centers.</p>
        </section>
        <section class="mission">
            <div class="row justify-content-around g-2">
                <div class="col-md-4 p-4 mb-2 text-center border rounded" data-aos="fade-up">
                    <i class="fa-solid fa-star border rounded-circle p-3 abouticon" style="color:white;"></i>
                    <h3>Mission</h3><hr>
                    <p style="color:white;" class="text-justify"> > Develop zero (0) to four (4) year-old Muntinlupeño children through the Center-Based and Home-based programs with developmentally appropriate practices, meaningful experiences and integrative services for Early Childhood Education, Health, Nutrition, Culture, Environmental Care and Social Services Development Programs;</p>
                    <p style="color:white;" class="text-justify"> > Provide Parent Education and support systems that will assist parents in their roles as primary caregivers and first teachers of their children;</p>
                    <p style="color:white;" class="text-justify"> > Develop competent and committed Child Development Teachers and Workers and Service Providers;</p>
                    <p style="color:white;" class="text-justify"> > Improve the quality standards of Public and Private ECCD programs; and</p>
                    <p style="color:white;" class="text-justify"> > Promote child awareness in every community.</p>
                    <hr>
                </div>
                <div class="col-md-4 p-4 mb-2 text-center border rounded" data-aos="fade-up">
                    <i class="fa-solid fa-eye border rounded-circle p-3 abouticon" style="color:white;"></i>
                    <h3>Vision</h3><hr>
                    <p style="color:white;" class="text-justify"> > Holistically developed zero (0) to four (4) year-old Muntinlupeño children, who are adequately prepared for the Kindergarten, equipped with life-long learning and whose rights and welfare are promoted and protected.</p><hr>
                </div>
            </div>
        </section>
        <section class="cont">
            <h1 class="text-center" style="color:white;">Contact</h1><br>
            <div class="row justify-content-center" data-aos="fade-up">
                <h4 class="text-white text-center">Division Chief : Ms. JENNY DEUDA-MERCADO</h4><br>
            </div>
            <div class="row justify-content-center" data-aos="fade-up">
                <p class="text-center"><small>2F Laguerta Bulilit Center, Centennial Avenue, Leguerta, Tunansan, Muntinlupa City</small></p>
            </div>
            <div class="row justify-content-center" data-aos="fade-up">
                <p><strong>Tel. No. : 8 810-9962</strong></p>
            </div>
            <div class="row justify-content-center" data-aos="fade-up">
                <p class="text-center"><strong>E-mail: ecedmuntinlupa@gmail.com<br>Facebook Page: ECED Muntinlupa</strong></p>
            </div>
        </section>
        <section class="orgchart">
            <center><img src="images/orgchart.png" class="img-fluid rounded" alt=""></center><br>
            <p style="color:white;">LIST OF CHILD DEVELOPMENT CENTERS <a href="pdfile/lcdc.pdf">(click here to view file)</a></p>
            <p style="color:white;">LIST OF SERVICES AND PROCESS FLOW <a href="pdfile/LSRF.pdf">(click here to view file)</a></p>
        </section>
    </main>

    <style>
        .home{
            /*background-image: url("img/bodybg1.jpg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;*/
            background-color: #f9d575;
        }
        .home{
            padding: 2em 4em 1em;
        }
        .mandate{
            padding: 4em 4em 2em;
            background-color: #008E89;
        }
        .mission{
            padding: 4em 4em 2em;
            color:white;
            background-color: #085E7D;
        }
        .cont{
            padding: 4em 4em 2em;
            background-color: #FF6363;
        }
        .orgchart{
            padding: 4em 4em 2em;
            background-color: #084594;
        }
    </style>
<?php
    require 'homefooter.php';
?>