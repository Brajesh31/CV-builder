<?php
    include "connection.php";
    $cv_id = $_GET['cv_id'];

    if(isset($_POST['submit'])) {
        $school = htmlspecialchars(trim($_POST['edu_school']));
        $degree = htmlspecialchars(trim($_POST['edu_degree']));
        $city = htmlspecialchars(trim($_POST['edu_city']));

        $start_date = htmlspecialchars(trim($_POST['edu_start_date']));
        $end_date = htmlspecialchars(trim($_POST['edu_graduation_date']));
        $description = htmlspecialchars(trim($_POST['edu_description']));
        
        $sql = "INSERT INTO education (cv_id, school, degree, city, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
                
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "issssss", $cv_id, $school, $degree, $city, $start_date, $end_date, $description);
        
        if(mysqli_stmt_execute($stmt)) {
            // header("location: index3.php");
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    }

    if(isset($_POST['view'])) {
        header("location:delete-education.php?cv_id=" . $cv_id);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Resume Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../css/edit-resume.css">
        <style>
            .edu_description{
                width: 204%;
            }

            @media screen and (max-width: 600px) {
                .edu_description{
                    width: 100%;
                }

            }

            .button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1em;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 0.5em;
}

.button4{
    background-color: #002e63;
    border-radius: 0.5em;
}

.two{
    margin-left: 23em;
}

.one{
    margin-top: 1em;
}

@media screen and (max-width: 600px) {
        .make-flex{
            display: block;
        }

        .one{
            margin-top: 1em;
        }

        .two{
            margin-left: 0;
            margin-top: 1em;
        }
    }
        </style>
    </head>
    <body>
    <nav>
    <div class="hamburger" onclick="toggleMenu()">
    <span></span>
    <span></span>
    <span></span>
</div>
        <input type="checkbox" id="check">

        <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
        </label>

        <label class="logo">Resume builder</label>

        <ul>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="create-certifications.php?cv_id=<?php echo $cv_id; ?>">Add Certification</a>
                <a href="#">Add Educations</a>
                <a href="create-experiences.php?cv_id=<?php echo $cv_id ?>">Add Experiences</a>
                <a href="create-skill.php?cv_id=<?php echo $cv_id; ?>">Add Skill</a>
                </div>
            </div>
            <li><a href="index3.php">Back</a></li>
        </ul>
  </nav>
        <section id = "about-sc" class = "" style="margin-top: -3.5em;">
            <div class = "container">
                <div class = "about-cnt">
                <form id="cv-form" action="" method="POST" class="cv-form">
                <input type="hidden" name="cv_id" value="<?php echo $cv_id; ?>">

                <div class="cv-form-blk">
                <div class = "cv-form-row-title">
                                <h3>Add educations</h3>
                            </div>

                                        <div class = "cv-form-row">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()" placeholder="e.g SMK INFORMATIKA PESAT">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class="form-elem">
                                                    <label for="edu_degree_input" class="form-label">Majors</label>
                                                    <input name="edu_degree" type="text" class="form-control edu_degree" id="" placeholder="e.g Software Engineering">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">City</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()" placeholder="e.g Bogor, Indonesia">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start year</label>
                                                    <input name = "edu_start_date" type = "text" class = "form-control edu_start_date" id = "edu_start_date" onkeyup="generateCV()" placeholder="2013">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End year</label>
                                                    <input name = "edu_graduation_date" type = "text" class = "form-control edu_graduation_date" id = "edu_graduation_date" onkeyup="generateCV()" placeholder="2040">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name="edu_description" class="form-control edu_description" id="edu_description" rows="2" placeholder="e.g Lorem ipsum odor amet, consectetuer adipiscing elit. Mattis pharetra inceptos leo suscipit, condimentum aliquet enim praesent. Auctor facilisi aliquam accumsan non ultrices iaculis felis lectus senectus. Suscipit velit aptent tristique lobortis sagittis conubia senectus commodo."></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save Education</button>
                        </form>
                    </div>
                            <form action="" method="post">
                                <input type="hidden" name="cv_id" value="<?php echo $cv_id; ?>">
                                    <div class="make-flex" style="margin-top: 1em;">

                                    <div class="one">
                                        <h3>Fancy seeing the education you have added?</h3>
                                        <div class="desc">
                                            <p>Click the button to behold the educations thou hast most nobly conferred</p>
                                        </div>
                                    </div>

                                    <div class="two">
                                        <button class='button button4' name="view">View education</button>
                                    </div>

                                    </div>
                            </form>
                        </div>
                    </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src = "../js/script.js"></script>
        <script src="../js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.min.js"></script>
        <script>
function toggleMenu() {
    const navUl = document.querySelector('nav ul');
    const hamburger = document.querySelector('.hamburger');
    const dropdowns = document.querySelectorAll('.dropdown');
    
    navUl.classList.toggle('active');
    hamburger.classList.toggle('active');
    
    // Make dropdowns visible when menu is active
    dropdowns.forEach(dropdown => {
        if(navUl.classList.contains('active')) {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = '';
        }
    });
}

</script>
    </body>
</html>