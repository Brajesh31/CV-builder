<?php
    include "connection.php";
        $id_cv = $_GET['id'];
        $sql = "SELECT * FROM creative WHERE id='".$id_cv."'";
        $query = mysqli_query($connection, $sql);
        $data = mysqli_fetch_array($query);

        if (isset($_POST['firstname'])) {
            $full_name = mysqli_real_escape_string($connection, $_POST['firstname']);
            $designation = mysqli_real_escape_string($connection, $_POST['designation']);
            $address = mysqli_real_escape_string($connection, $_POST['address']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $mobileno = mysqli_real_escape_string($connection, $_POST['mobileno']);
            $selfDescription = mysqli_real_escape_string($connection, $_POST['summary']);
            
            function handlePhotoUpload($file) {
                $target_dir = "images/";
                $target_file = $target_dir . basename($file["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                $check = getimagesize($file["tmp_name"]);
                if($check !== false) {
                    if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                        if (move_uploaded_file($file["tmp_name"], $target_file)) {
                            return $target_file;
                        }
                    }
                }
                return false;
            }
            
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);

                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    $photoPath = $target_file;
                    $sql = "UPDATE creative SET full_name = '$full_name', designation = '$designation', address = '$address', email = '$email', mobileno = '$mobileno', selfDescription = '$selfDescription', photo = '$target_file' WHERE id = '$id_cv'";
                    
                    mysqli_query($connection, $sql);
                }
            }
        
            $sql = "UPDATE creative SET full_name = '$full_name', designation = '$designation',  address = '$address', email = '$email', mobileno = '$mobileno', selfDescription = '$selfDescription' WHERE id = '$id_cv'";
                    
            if($photoPath) {
                $sql = "UPDATE creative SET full_name = '$full_name', designation = '$designation',  address = '$address', email = '$email', mobileno = '$mobileno', selfDescription = '$selfDescription', photo = '$photoPath' WHERE id = '$id_cv'";
            }
        
            mysqli_query($connection, $sql);
            header('location: index3.php');
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
                    <a href="create-certifications.php?cv_id=<?php echo $id_cv; ?>">Add Certification</a>
                    <a href="create-educations.php?cv_id=<?php echo $id_cv; ?>">Add Educations</a>
                    <a href="create-experiences.php?cv_id=<?php echo $id_cv; ?>">Add Experiences</a>
                    <a href="create-skill.php?cv_id=<?php echo $id_cv; ?>">Add Skill</a>
                </div>
            </div>
            <li><a href="index3.php">Back</a></li>
        </ul>
  </nav>
        <section id = "about-sc" class = "" style="margin-top: -3.5em;">
            <div class = "container">
                <div class = "about-cnt">
                <form id="cv-form" action="edit-resume.php?id=<?= $id_cv; ?>" method="POST" enctype="multipart/form-data" class="cv-form">

                <input type="hidden" name="id" value="<?php echo $id_cv; ?>">

                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>Edit basic information</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Full Name</label>
                                        <input name="firstname" type="text" class="form-control firstname" id="firstname" value="<?= $data['full_name'] ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="" class="form-label">Your Image</label>
                                        <input name="photo" type="file" class="form-control image" id="image">
                                        <script>
                                            const imageFile = new File([""], "<?= basename($data['photo']) ?>", {
                                                type: "image/*",
                                            });
                                            const dataTransfer = new DataTransfer();
                                            dataTransfer.items.add(imageFile);

                                            document.getElementById('image').files = dataTransfer.files;
                                        </script>
                                    </div>


                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Designation</label>
                                        <input name = "designation" type = "text" class = "form-control designation" id = "designation" value="<?= $data['designation'] ?>">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-2">
                                <div class = "form-elem">
                                        <label for = "" class = "form-label">Address</label>
                                        <input name = "address" type = "text" class = "form-control address" id = "address" value="<?= $data['address'] ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Email</label>
                                        <input name = "email" type = "text" class = "form-control email" id = "email" placeholder="e.g. ariva02zweena@gmail.com" value="<?= $data['email'] ?>">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-2">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Phone number:</label>
                                        <input name = "mobileno" type = "text" class = "form-control mobileno" id = "mobileno" placeholder="e.g. +62 123-456-7890" value="<?= $data['mobileno'] ?>">
                                        <span class="form-text" style="margin-top: -1.8em; margin-left: 0.2em;">Attention : There's no edit menu in navbar</span>
                                        </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Self description</label>
                                        <textarea name="summary" class="form-control summary" id="summary" style="width: 100%;" rows="2"><?= $data['selfDescription'] ?></textarea>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Save CV" class="btn btn-primary"></input>
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
            document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const fileName = imageInput.dataset.value;
            imageInput.value = fileName;
        });

        </script>
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