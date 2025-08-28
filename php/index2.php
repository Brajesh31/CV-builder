<?php
    session_start();
    include 'connection.php';
    // if (!isset($_SESSION['username'])) {
    //     header("Location: login.php");
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Resume builder
  </title>
  <!--     Fonts and icons     -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../css/afterlogin.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
<!-- <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button> -->
<div class="sidebar" id="sidebar">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-blue" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index2.php">
        <img src="../images/logo2.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Resume builder</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="index2.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">My resumes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="create-resume.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Create resume</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">More about this web</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://smkpesat.sch.id/" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <span class="material-symbols-outlined"> public </span>
            </div>
            <span class="nav-link-text ms-1">Sites</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://smkpesat.sch.id/contact/" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined"> Call </span>
            </div>
            <span class="nav-link-text ms-1">Contact</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://www.instagram.com/smkpesat_itxpro?igsh=ZnVldWUzZjN5bWJx" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined"> apartment </span>
            </div>
            <span class="nav-link-text ms-1">Instagram</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Other menu</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://smkpesat.sch.id/civitas/" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <span class="material-symbols-outlined"> person </span>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <span class="material-symbols-outlined"> logout </span>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>

</aside>
    </div>
    <div class="main-content" style="margin-left: 18em;">
        <!-- Your main page content here -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume builder | Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" type='text/css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <h4 class="mt-5 ms-4">Resume sample</h4>
  <p class="ms-4">Here are some sample resumes that you can follow</p>
  <div class="d-flex flex-row mb-2" style="margin-left: -9em;">
    <div class="p-2 ms-n5">
    <div class="card ms-n5" style="width: 15rem;">
    <a href="https://asset.velvetjobs.com/resume-sample-examples/images/graduate-software-engineer-v1.png"><img src="../images/image.png" class="card-img-top"></a>
    <div class="card-body">
      <p class="card-text fw-semibold">Software development engineering</p>
      <p class="card-text mt-n2">Problem solver creating efficient, scalable software solutions.</p>
    </div>
</div>
    </div>
    <div class="p-2">
    <div class="card ms-n1" style="width: 15rem;">
    <a href="https://asset.velvetjobs.com/resume-sample-examples/images/visual-communications-v1.png"><img src="../images/image2.png" class="card-img-top"></a>
    <div class="card-body">
      <p class="card-text fw-semibold">Visual communication design</p>
      <p class="card-text mt-n2">Crafting engaging visuals to communicate complex messages.</p>
    </div>
</div>
    </div>
    <div class="p-2">
          <div class="card ms-1" style="width: 15rem;">
          <a href="https://d25zcttzf44i59.cloudfront.net/senior-network-engineer-resume-example.png"><img src="../images/image3.png" class="card-img-top"></a>
          <div class="card-body">
            <p class="card-text fw-semibold">Network computer engineering</p>
            <p class="card-text mt-n2">Efficient data transmission strategies.</p>
          </div>
      </div>
    </div>
    <!-- <div class="p-2">
          <div class="card ms-1" style="width: 15rem;">
          <a href="https://i.pinimg.com/736x/fc/7e/3e/fc7e3eecb7d8b373df00fd125458318b.jpg"><img src="../images/creative.png" class="card-img-top"></a>
          <div class="card-body">
            <p class="card-text fw-semibold">Stylish career overview</p>
            <p class="card-text mt-n2">Concise summary showcasing professional journey and achievements.</p>
          </div>
      </div>
    </div> -->
</div>
<h4 class="mt-4 ms-4">My resume</h4>
  <p class="ms-4">Take the time to design your own personalized resume that highlights your unique skills</p>
  <table class="table table-striped ms-4 w-95">
  <thead class="text-center">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Designation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
      $sql = "SELECT id, full_name, designation FROM creative";
      $query = mysqli_query($connection, $sql);
      
      if (!$query) {
          die("Error: " . mysqli_error($connection));
      }

      $no = 1;
      
      while($data = mysqli_fetch_assoc($query)){
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . htmlspecialchars($data['full_name']) . "</td>";
          echo "<td>" . htmlspecialchars($data['designation']) . "</td>";
          echo "<td>";
          echo "<a class='btn btn-danger btn-sm' href='delete.php?id=" . $data['id'] . "'>Delete</a>";
          echo "<button class='btn btn-primary btn-sm ms-1' onclick='showEditAlert(" . $data['id'] . ")'>Edit</button>";
          echo "<button class='btn btn-success btn-sm ms-1' onclick='showPreviewChoice(" . $data['id'] . ")'>Preview</button>";
          echo "</td>";
          echo "</tr>";
      }
      
    ?>
  </tbody>
  </table>

  <!-- Alert -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">What would you like to edit?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-wrap gap-2 justify-content-center">
    <button class="btn btn-primary" onclick="showForm('basic', currentCvId)">Basic information</button>
    <button class="btn btn-secondary" onclick="showForm('experience', currentCvId)">Experiences</button>
    <button class="btn btn-success" onclick="showForm('skills', currentCvId)">Skills</button>
    <button class="btn btn-info" onclick="showForm('certifications', currentCvId)">Certifications</button>
    <button class="btn btn-warning" onclick="showForm('education', currentCvId)">Educations</button>
</div>

    </div>
  </div>
</div>

<!-- Edit basic info -->
<div class="modal fade" id="basicFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Basic Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_basic.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" class="form-control" id="basic_full_name" name="full_name">
                    </div>
                    <div class="mb-3">
                        <label>Designation</label>
                        <input type="text" class="form-control" id="basic_designation" name="designation">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="basic_email" name="email">
                    </div>
                    <div class="mb-3">
                        <label>Mobile Number</label>
                        <input type="tel" class="form-control" id="basic_mobileno" name="mobileno">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" id="basic_address" name="address" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Self Description</label>
                        <textarea class="form-control" id="basic_selfDescription" name="selfDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Photo</label>
                        <input type="file" class="form-control" id="basic_photo" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Experience Choice -->
<div class="modal fade" id="experienceChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What would you like to do?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-3">
                <button class="btn btn-primary" onclick="showExperienceForm('add')">Add New</button>
                <button class="btn btn-danger" onclick="showExperienceForm('edit')">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="experienceFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex flex-row mb-n3">
                    <div class="p-2">
                        <h5 class="modal-title">Add Experience</h5>
                    </div>
                    <div class="p-2">
                        <p class="text-danger mt-1">This action is irreversible</p>
                    </div>
                </div>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_experience.php" method="POST">
                    <input type="hidden" name="cv_id" id="exp_cv_id">
                    <input type="hidden" name="exp_id" value=""> 
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="exp_title" required placeholder="UI / UX Designer">
                    </div>
                    <div class="mb-3">
                        <label>Organization</label>
                        <input type="text" class="form-control" name="exp_organization" required placeholder="Google">
                    </div>
                    <div class="mb-3">
                        <label>Location</label>
                        <input type="text" class="form-control" name="exp_location" required placeholder="Cilandak, Jakarta">
                    </div>
                    <div class="mb-3">
                        <label>Start Date</label>
                        <input type="text" class="form-control" name="exp_start_date" required placeholder="August">
                    </div>
                    <div class="mb-3">
                        <label>End Date</label>
                        <input type="text" class="form-control" name="exp_end_date" placeholder="November 2024">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="exp_description" rows="3" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vitae quae esse cupiditate officiis molestiae ducimus ab nihil, incidunt recusandae quidem praesentium consequuntur nesciunt ipsum labore quaerat in totam alias."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Experience</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Experience List Modal -->
<div class="modal fade" id="experienceListModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select experience to delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="experienceList" class="list-group">
                    <!-- Experiences will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Choice Modal -->
<div class="modal fade" id="previewChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Which one?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-3">
                <a id="creativePreviewBtn" class="btn btn-primary">Creative</a>
                <a id="atsPreviewBtn" class="btn btn-secondary">ATS</a>
            </div>
        </div>
    </div>
</div>

<!-- Skills Choice Modal -->
<div class="modal fade" id="skillsChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What would you like to do?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-3">
                <button class="btn btn-primary" onclick="showSkillsForm('add')">Add New</button>
                <button class="btn btn-danger" onclick="showSkillsForm('edit')">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Skills Form Modal -->
<div class="modal fade" id="skillsFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <div class="d-flex flex-row mb-n3">
                    <div class="p-2">
                    <h5 class="modal-title">Add Skill</h5>
                    </div>
                    <div class="p-2">
                        <p class="text-danger mt-1">This action is irreversible</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_skills.php" method="POST">
                    <input type="hidden" name="cv_id" id="skill_cv_id">
                    <div class="mb-3">
                        <label>Skill Name</label>
                        <input type="text" class="form-control" name="skill_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Skill</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Skills List Modal -->
<div class="modal fade" id="skillsListModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select skill to delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="skillsList" class="list-group">
                    <!-- Skills nanti disini dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Certifications Choice Modal -->
<div class="modal fade" id="certificationsChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What would you like to do?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-3">
                <button class="btn btn-primary" onclick="showCertificationsForm('add')">Add New</button>
                <button class="btn btn-danger" onclick="showCertificationsForm('edit')">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Certifications Form Modal -->
<div class="modal fade" id="certificationsFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <div class="d-flex flex-row mb-n3">
                    <div class="p-2">
                    <h5 class="modal-title">Add Certification</h5>
                    </div>
                    <div class="p-2">
                        <p class="text-danger mt-1">This action is irreversible</p>
                    </div>
            </div>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_certifications.php" method="POST">
                    <input type="hidden" name="cv_id" id="cert_cv_id">
                    <div class="mb-3">
                        <label>Certification Name</label>
                        <input type="text" class="form-control" name="cert_name" required placeholder="Python, 2022">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" class="form-control" name="cert_date" required placeholder="Lorem ipsum">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Certification</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Certifications List Modal -->
<div class="modal fade" id="certificationsListModal" tabindex="-1">
    <!-- Content will be dynamically inserted here -->
</div>

<!-- Education Choice Modal -->
<div class="modal fade" id="educationChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What would you like to do?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-3">
                <button class="btn btn-primary" onclick="showEducationForm('add')">Add New</button>
                <button class="btn btn-danger" onclick="showEducationForm('edit')">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Education Form Modal -->
<div class="modal fade" id="educationFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <div class="d-flex flex-row mb-n3">
                    <div class="p-2">
                        <h5 class="modal-title">Add Education</h5>
                    </div>
                    <div class="p-2">
                        <p class="text-danger mt-1">This action is irreversible</p>
                    </div>
            </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_education.php" method="POST">
                    <input type="hidden" name="cv_id" id="edu_cv_id">
                    <div class="mb-3">
                        <label>School Name</label>
                        <input type="text" class="form-control" name="edu_school" required>
                    </div>
                    <div class="mb-3">
                        <label>Major</label>
                        <input type="text" class="form-control" name="edu_degree" required>
                    </div>
                    <div class="mb-3">
                        <label>City</label>
                        <input type="text" class="form-control" name="edu_city" required>
                    </div>
                    <div class="mb-3">
                        <label>Start Date</label>
                        <input type="text" class="form-control" name="edu_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label>End Date</label>
                        <input type="" class="form-control" name="edu_end_date">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="edu_description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Education</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Education List Modal -->
    <div class="modal fade" id="educationListModal" tabindex="-1">
        <!-- Content will be dynamically inserted here -->
    </div>
</div>
</body>
</html>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
  let currentCvId = null;

  function showEditAlert(id) {
      currentCvId = id;
      new bootstrap.Modal(document.getElementById('editModal')).show();
  }
  function showForm(type, id) {
      bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    
      if (type === 'experience') {
          document.getElementById('exp_cv_id').value = id;
          new bootstrap.Modal(document.getElementById('experienceChoiceModal')).show();
          return;
      }

      if (type === 'skills') {
        document.getElementById('skill_cv_id').value = id;
        new bootstrap.Modal(document.getElementById('skillsChoiceModal')).show();
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
        return;
    }

    if (type === 'certifications') {
        document.getElementById('cert_cv_id').value = id;
        new bootstrap.Modal(document.getElementById('certificationsChoiceModal')).show();
        return;
    }

    if (type === 'education') {
        document.getElementById('edu_cv_id').value = id;
        new bootstrap.Modal(document.getElementById('educationChoiceModal')).show();
        return;
    }
    
      const formModal = new bootstrap.Modal(document.getElementById(`${type}FormModal`));
      document.querySelector('#basicFormModal input[name="id"]').value = id;
    
      fetch(`get_form_data.php?type=${type}&id=${id}`)
          .then(response => response.json())
          .then(data => {
              document.getElementById('basic_full_name').value = data.full_name;
              document.getElementById('basic_designation').value = data.designation;
              document.getElementById('basic_email').value = data.email;
              document.getElementById('basic_mobileno').value = data.mobileno;
              document.getElementById('basic_address').value = data.address;
              document.getElementById('basic_selfDescription').value = data.selfDescription;
              formModal.show();
          });
  }

  function showCertificationsForm(action) {
    const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
    if (editModal) {
        editModal.hide();
    }

    if (action === 'edit') {
        fetch(`get_certifications.php?cv_id=${currentCvId}`)
            .then(response => response.json())
            .then(certifications => {
                const certificationsList = document.getElementById('certificationsListModal');
                const modalContent = `
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Select certification to delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="list-group">
                                    ${certifications.length > 0 ? 
                                        certifications.map(cert => `
                                            <div class="list-group-item list-group-item-action" data-cert-id="${cert.id}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6 class="mb-1">${cert.title || ''}</h6>
                                                        <p class="mb-1 text-muted">${cert.description || ''}</p>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm" 
                                                        onclick="deleteCertification(${cert.id})">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        `).join('')
                                        : '<div class="list-group-item">No certifications found</div>'
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                certificationsList.innerHTML = modalContent;
                new bootstrap.Modal(certificationsList).show();
            })
            .catch(error => {
                console.error('Error fetching certifications:', error);
                alert('Error loading certifications');
            });
    } else {
        document.getElementById('cert_cv_id').value = currentCvId;
        new bootstrap.Modal(document.getElementById('certificationsFormModal')).show();
    }
}

function deleteCertification(certId) {
    if (confirm('Are you sure you want to delete this certification?')) {
        fetch('delete_certification.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `cert_id=${certId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const certElement = document.querySelector(`[data-cert-id="${certId}"]`);
                if (certElement) {
                    certElement.remove();
                }
                
                showCertificationsForm('edit');
                
                alert('Certification deleted successfully');
                location.reload();
            } else {
                alert('Error deleting certification');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting certification');
        });
    }
}

function showEducationForm(action) {
    const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
    if (editModal) {
        editModal.hide();
    }

    if (action === 'edit') {
        fetch(`get_education.php?cv_id=${currentCvId}`)
            .then(response => response.json())
            .then(educations => {
                const modalContent = `
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Select education to delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="list-group">
                                    ${educations.length > 0 ? 
                                        educations.map(edu => `
                                            <div class="list-group-item list-group-item-action" data-edu-id="${edu.id}">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6 class="mb-1">${edu.school}</h6>
                                                        <p class="mb-1 text-muted">${edu.degree}</p>
                                                        <small>${edu.start_date} - ${edu.end_date}</small>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm" 
                                                        onclick="deleteEducation(${edu.id})">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        `).join('')
                                        : '<div class="list-group-item">No education entries found</div>'
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                const educationListModal = document.getElementById('educationListModal');
                educationListModal.innerHTML = modalContent;
                new bootstrap.Modal(educationListModal).show();
            })
            .catch(error => {
                console.error('Error fetching education:', error);
                alert('Error loading education entries');
            });
    } else {
        document.getElementById('edu_cv_id').value = currentCvId;
        new bootstrap.Modal(document.getElementById('educationFormModal')).show();
    }
}
function deleteEducation(eduId) {
    if (confirm('Are you sure you want to delete this education entry?')) {
        fetch('delete_education.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `edu_id=${eduId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const eduElement = document.querySelector(`[data-edu-id="${eduId}"]`);
                if (eduElement) {
                    eduElement.remove();
                }
    
                showEducationForm('edit');
                
                alert('Education entry deleted successfully');
                location.reload();
            } else {
                alert('Error deleting education entry');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting education entry');
        });
    }
}


function showExperienceForm(action) {
    const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
    if (editModal) {
        editModal.hide();
    }

    if (action === 'edit') {
        fetch(`get_experiences.php?cv_id=${currentCvId}`)
            .then(response => response.json())
            .then(experiences => {
                const experienceList = document.getElementById('experienceList');
                experienceList.innerHTML = experiences.map(exp => `
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">${exp.title}</h6>
                                <p class="mb-1 text-muted">${exp.organization}</p>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm me-2" 
                                    onclick="deleteExperience(${exp.id})">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('') || '<div class="list-group-item">No experiences found</div>';
                
                const experienceListModal = new bootstrap.Modal(document.getElementById('experienceListModal'));
                experienceListModal.show();
            });
    } else {
        const form = document.querySelector('#experienceFormModal form');
        form.reset();
        form.querySelector('[name="cv_id"]').value = currentCvId;
        
        const experienceFormModal = new bootstrap.Modal(document.getElementById('experienceFormModal'));
        experienceFormModal.show();
    }
}

function deleteExperience(expId) {
    if (confirm('Are you sure you want to delete this experience?')) {
        fetch('delete_experience.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `exp_id=${expId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const expElement = document.querySelector(`[data-exp-id="${expId}"]`);
                if (expElement) {
                    expElement.remove();
                }
                
                showExperienceForm('edit');
                alert('Experience deleted successfully');
            } else {
                alert('Error deleting experience');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting experience');
        });
    }
}

function editExperience(expId) {
    fetch(`get_experience.php?id=${expId}`)
        .then(response => response.json())
        .then(data => {
            const form = document.querySelector('#experienceFormModal form');
        
            form.querySelector('[name="exp_id"]').value = data.id;
            form.querySelector('[name="exp_title"]').value = data.title;
            form.querySelector('[name="exp_organization"]').value = data.organization;
            form.querySelector('[name="exp_location"]').value = data.location;
            form.querySelector('[name="exp_start_date"]').value = data.start_date;
            form.querySelector('[name="exp_end_date"]').value = data.end_date;
            form.querySelector('[name="exp_description"]').value = data.description;
            
            const listModal = bootstrap.Modal.getInstance(document.getElementById('experienceListModal'));
            listModal.hide();
            
            const formModal = new bootstrap.Modal(document.getElementById('experienceFormModal'));
            formModal.show();
        });
}



function loadExperienceData(expId) {
    const experienceListModal = bootstrap.Modal.getInstance(document.getElementById('experienceListModal'));
    
    fetch(`get_experience.php?id=${expId}`)
        .then(response => response.json())
        .then(data => {
            const form = document.querySelector('#experienceFormModal form');
            
            form.querySelector('[name="cv_id"]').value = currentCvId;
            form.querySelector('[name="exp_id"]').value = data.id;
            form.querySelector('[name="exp_title"]').value = data.title;
            form.querySelector('[name="exp_organization"]').value = data.organization;
            form.querySelector('[name="exp_location"]').value = data.location;
            form.querySelector('[name="exp_start_date"]').value = data.start_date;
            form.querySelector('[name="exp_end_date"]').value = data.end_date;
            form.querySelector('[name="exp_description"]').value = data.description;
            
            experienceListModal.hide();
            
            const formModal = new bootstrap.Modal(document.getElementById('experienceFormModal'));
            formModal.show();
        });
}
</script>
<script>
  function showPreviewChoice(id) {
    const modal = new bootstrap.Modal(document.getElementById('previewChoiceModal'));
    const creativeBtn = document.getElementById('creativePreviewBtn');
    const atsBtn = document.getElementById('atsPreviewBtn');
    
    creativeBtn.href = 'preview.php?id=' + id + '&type=creative';
    atsBtn.href = 'preview2.php?id=' + id + '&type=ats';
    
    modal.show();
}

</script>
<script>
  function showSkillsForm(action) {
    const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
    if (editModal) {
        editModal.hide();
    }

    if (action === 'edit') {
        fetch(`get_skills.php?cv_id=${currentCvId}`)
            .then(response => response.json())
            .then(skills => {
                const skillsList = document.getElementById('skillsList');
                skillsList.innerHTML = skills.map(skill => `
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">${skill.skill_name}</h6>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm" 
                                    onclick="deleteSkill(${skill.id})">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('') || '<div class="list-group-item">No skills found</div>';
                
                new bootstrap.Modal(document.getElementById('skillsListModal')).show();
            });
    } else {
        document.getElementById('skill_cv_id').value = currentCvId;
        new bootstrap.Modal(document.getElementById('skillsFormModal')).show();
    }
}

function deleteSkill(skillId) {
    if (confirm('Are you sure you want to delete this skill?')) {
        fetch('delete_skill.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `skill_id=${skillId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const skillElement = document.querySelector(`[data-skill-id="${skillId}"]`);
                if (skillElement) {
                    skillElement.remove();
                }
                
                showSkillsForm('edit');
                alert('Skill deleted successfully');
            } else {
                alert('Error deleting skill');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting skill');
        });
    }
}


</script>

    <!-- bootstrap :3  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <!-- Add this before closing body tag -->
<script>
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.querySelector('.sidebar-toggle').classList.toggle('active');
  }
</script>

</body>

</html>
</body>
</html>