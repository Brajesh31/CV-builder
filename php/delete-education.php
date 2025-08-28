<?php
    include "connection.php";
    $cv_id = $_GET['cv_id'];

    if(isset($_POST['submit'])) {
        $cert_title = htmlspecialchars(trim($_POST['cert_title']));
        $description = htmlspecialchars(trim($_POST['description']));
        
        // Insert certification for specific CV
        $sql = "INSERT INTO certifications (cv_id, title, description) VALUES (?, ?, ?)";
                
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "iss", $cv_id, $cert_title, $description);
        
        if(mysqli_stmt_execute($stmt)) {
            header("location: index3.php");
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
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
        <!-- custom css -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../css/create-certifications.css">
        <link rel="stylesheet" href="../css/edit-resume.css">
        <style>
            .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 55%;
        /* margin-left: 2.4em; */
        margin-top: 2em;
        padding-bottom: 1em;
        border-radius: 0.5em;
        }

        .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card2 {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 90%;
        margin-left: -12em;
        margin-top: 1.4em;
        padding-bottom: 1em;
        border-radius: 0.5em;
        }

        .card2:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card3 {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 95%;
        margin-left: -12em;
        margin-top: 2.5em;
        padding-bottom: 1em;
        border-radius: 0.5em;
        }

        .card3:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
        padding: 2px 16px;
        }

        .buat-flex{
            display: flex;
            margin-left: 2.5em;
        }

        .dua{
            margin-left: 1em;
        }

        .tiga{
            margin-left: -0.5em; 
        }

        #customers {
  font-family: 'Poppins', Helvetica, sans-serif;
  border-collapse: collapse;
  width: 95%;
  margin-left: 3em;
  margin-top: 6em;
}

#customers td, #customers th {
  /* border: 1px solid #ddd; */
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #002e63;
  color: white;
  border: none;
  text-align: center;
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

.button3{
    background-color: red;
    border-radius: 0.5em;
}

.button4{
    background-color: #002e63;
    border-radius: 0.5em;
}

.main-content h3{
    margin-left: 2em; 
    margin-top: 1em;
}

.desc{
    margin-left: 2.3em;
}

.desc2{
    margin-left: 2.3em;
}

.swal-medium {
    width: 400px !important;
    font-size: 1em !important;
}

.swal-title {
    font-size: 1em !important;
}

.swal-text {
    font-size: 1em !important;
}

@media (max-width: 768px) {
    .main-content {
        margin-left: 0;
        padding: 10px;
    }

    .card, .card2, .card3 {
        width: 100%;
        margin: 1em auto;
    }

    .buat-flex {
        flex-direction: column;
        align-items: center;
    }

    #customers {
        width: 100%;
        /* margin: 1em 0; */
        margin-top: 5em;
        margin-left: 0;
    }

    .button {
        padding: 8px 16px;
        font-size: 0.9em;
    }

    .main-content h3{
        margin-left: 1em; 
        margin-top: 3em;
    }

    .desc{
        width: 75%;
        margin-left: 1.2em;
    }

    .desc2{
        width: 80%;
        margin-left: 1.2em;
    }

    .satu{
        margin-left: -5em;
        width: 80%;
    }

    .dua{
        margin-left: -5em;
        width: 80%;
    }

    .tiga{
        margin-left: -5em;
        width: 80%;
    }

    .h3{
        margin-left: 0.1em;
        margin-top: -1em; 
    }

}

@media (max-width: 480px) {
    .container h4 {
        font-size: 1.1em;
    }

    .container p {
        font-size: 0.9em;
    }

    #customers td, #customers th {
        padding: 6px;
        font-size: 0.9em;
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
            <!-- <div class="dropdown">
                <button class="dropbtn">Add 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="#">Add Certification</a>
                <a href="create-educations.php?cv_id=<?php echo $cv_id ?>">Add Educations</a>
                <a href="create-experiences.php?cv_id=<?php echo $cv_id ?>">Add Experiences</a>
                <a href="create-skill.php?cv_id=<?php echo $id_cv; ?>">Add Skill</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Delete 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="edit-certifications.php?cv_id=<?php echo $id_cv; ?>">Delete Certification</a>
                    <a href="#">Delete Educations</a>
                    <a href="#">Delete Experiences</a>
                    <a href="#">Delete Skills</a>
                </div>
            </div> -->
            <li><a href="create-educations.php?cv_id=<?php echo $cv_id; ?>">Back</a></li>
        </ul>
  </nav>
        <section id = "about-sc" class = "" style="margin-top: -3.5em;">
        <div style="overflow-x:auto;">
            <table id="customers">
                <tr>
                  <th>No</th>
                  <th>School</th>
                  <th>Degree</th>
                  <th>City</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM education WHERE cv_id = ?";
                    $stmt = mysqli_prepare($connection, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $cv_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if (!$result) {
                        die("Error: " . mysqli_error($connection));
                    }
                    
                    $no = 1;
                    
                    while($data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($data['school']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['degree']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['city']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['start_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['end_date']) . "</td>";
                        echo "<td style='text-align: justify;'>" . htmlspecialchars($data['description']) . "</td>";
                        echo "<td>";
                        echo "<button onclick='deleteCertification(" . $data['id'] . ")' class='button button3'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    
                    ?>
              </table>
        </div>
        </section>

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- jquery repeater cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "../js/script.js"></script>
        <!-- app js -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteCertification(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            popup: 'swal-medium',
            title: 'swal-title',
            content: 'swal-text'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('delete_education.php?id=' + id, {
                method: 'DELETE'
            })
            .then(response => {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Education deleted successfully.',
                    icon: 'success',
                    customClass: {
                        popup: 'swal-medium',
                        title: 'swal-title',
                        content: 'swal-text',
                        confirmButton: 'swal-confirm-button'
                    }
                }).then(() => {
                    document.querySelector(`button[onclick="deleteCertification(${id})"]`).closest('tr').remove();
                });
            });
        }
    });
}
</script>
    </body>
</html>