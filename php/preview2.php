<?php
    include("connection.php");
    $cv_id = $_GET['id'];

        $sql = "SELECT creative.*, certifications.title AS certification_title, certifications.description AS certification_description, education.school, education.degree, education.city AS education_city, education.start_date AS education_start_date, education.end_date AS education_end_date, education.description AS education_description, experiences.title AS experience_title, experiences.organization, experiences.location AS experience_location, experiences.start_date AS experience_start_date, experiences.end_date AS experience_end_date, experiences.description AS experience_description, projects.title AS project_title, projects.description AS project_description, skills.skill_name FROM creative LEFT JOIN certifications ON creative.id = certifications.cv_id LEFT JOIN education ON creative.id = education.cv_id LEFT JOIN experiences ON creative.id = experiences.cv_id LEFT JOIN projects ON creative.id = projects.cv_id LEFT JOIN skills ON creative.id = skills.cv_id WHERE creative.id = ?";

        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "i", $cv_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $datacv = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS CV</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f4;
}

.cv-container {
    background-color: white;
    padding: 20px;
    margin: 0 auto;
    width: 800px;
    /* box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); */
}

.cv-container {
    width: 100%;
    max-width: 800px;
    padding: 15px;
    margin: 0 auto;
    background-color: white;
}

header {
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    font-size: 28px;
    margin-bottom: 5px;
}

p {
    margin: 5px 0;
}

.cv-section {
    margin-bottom: 20px;
}

h2 {
    font-size: 20px;
    border-bottom: 1px solid #000;
    padding-bottom: 5px;
}

h3 {
    font-size: 18px;
    margin: 10px 0 5px;
}

ul {
    padding-left: 20px;
}

ul li {
    margin-bottom: 8px;
}

.experience-item, .education-item {
    margin-bottom: 15px;
}

.cv-section ul, .cv-section p {
    font-size: 16px;
}

.cv-container p, .cv-container ul {
    line-height: 1.5;
}

header h1 {
    font-weight: bold;
}

header p {
    font-size: 14px;
    color: #555;
}

.make-flex{
    display: flex;
}

@media print {
        body * {
            visibility: hidden;
        }
        .cv-container, .cv-container * {
            visibility: visible;
        }
        .cv-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .print-btn-sc {
            display: none;
        }
    }

    .export-btn {
        background-color: #1A91F0;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin: 20px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 11.5em;
    }

    .export-btn:hover {
        background-color: #1170CD;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .go-back{
        margin-left: 16em;
        margin-bottom: 1em;
    }

    /* Responsive text sizing */
@media screen and (max-width: 768px) {
    body {
        padding: 10px;
    }

    h1 {
        font-size: 24px;
    }

    h2 {
        font-size: 18px;
    }

    h3, h4 {
        font-size: 16px;
    }

    p, ul li {
        font-size: 14px;
    }

    .make-flex {
        flex-direction: column;
    }

    .make-flex > div {
        margin: 2px 0;
    }

    header p {
        font-size: 13px;
    }
}

/* Small phones */
@media screen and (max-width: 480px) {
    .cv-container {
        padding: 10px;
        width: 100%;
        margin-left: -1px;
    }

    .cv-section {
        margin-bottom: 15px;
    }

    .experience-item, .education-item {
        margin-bottom: 12px;
    }

    .export-btn {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        margin-left: 0;
    }

    .go-back {
        margin-left: 1em;
    }
}
    </style>
</head>
<body>
<div class="cv-container">
        <header>
            <h1><?= $datacv['full_name']?></h1>
            <p>Email: <?= $datacv['email']?> | Phone: <?= $datacv['mobileno']?></p>
            <p>Address: <?= $datacv['address'] ?></p>
        </header>

        <section class="cv-section">
            <h2>Self description</h2>
            <p style="text-align: justify;">
                <?= $datacv['selfDescription']?>
            </p>
        </section>

        <section class="cv-section">
            <h2>Work Experience</h2>

            <div class="experience-item">
                <?php
                                    $sql_experience = "SELECT * FROM experiences WHERE cv_id = ?";
                                    $stmt_experience = mysqli_prepare($connection, $sql_experience);
                                    mysqli_stmt_bind_param($stmt_experience, "i", $cv_id);
                                    mysqli_stmt_execute($stmt_experience);
                                    $result_experience = mysqli_stmt_get_result($stmt_experience);

                                    if (mysqli_num_rows($result_experience) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_experience)) {
                                            echo "<div class='make-flex' style='margin-bottom: 8px; margin-top: 10px;'>";

                                            echo "<div class='one'>";
                                            echo "<p style='font-weight: 600;'>";
                                            echo htmlspecialchars($row['organization']);
                                            echo "</p>";
                                            echo "</div>";

                                            echo "<div class='three' style='margin-left: 5px; margin-right: 5px;'>";
                                            echo "<p>- </p>";
                                            echo "</div>";

                                            echo "<div class='two'>";
                                            echo "<p style='font-weight: 600;'>";
                                            echo htmlspecialchars($row['location']);
                                            echo "</p>";
                                            echo "</div>";

                                            echo "</div>";

                                        echo "<div class='make-flex'>";

                                        echo "<div class='one'>";
                                        echo "<h4 style='margin-top: -5px;'>";
                                        echo htmlspecialchars($row['title']);
                                        echo "</h4>";
                                        echo "</div>";

                                        echo "<div class='two' style='margin-top: -12px; margin-left: 4px;'>";
                                        echo "<p>(</p>";
                                        echo "</div>";

                                        echo "<div class='three' style='margin-top: -11px;'>";
                                        echo "<p>";
                                        echo htmlspecialchars($row['start_date']);
                                        echo "</p>";
                                        echo "</div>";

                                        echo "<div class='four' style='margin-top: -11px; margin-left: 5px;'>";
                                        echo "<p>-</p>";
                                        echo "</div>";

                                        echo "<div class='five' style='margin-top: -11px; margin-left: 5px;'>";
                                        echo "<p>";
                                        echo htmlspecialchars($row['end_date']);
                                        echo "</p>";
                                        echo "</div>";

                                        echo "<div class='six' style='margin-top: -11px;'>";
                                        echo "<p>)</p>";
                                        echo "</div>";

                                        echo "</div>";

                                        echo "<p style='text-align: justify; margin-top: -7px;'>";
                                        echo htmlspecialchars($row['description']);
                                        echo "</p>";
                                    }
                                        } else {
                                            echo "No experience found for this CV.";
                                        }
                                            // mysqli_stmt_close($stmt_certificate);
                                ?>
            </div>

            </section>

        <section class="cv-section">
            <h2>Education</h2>
            <div class="education-item">
            <?php
                                    $sql_experience = "SELECT * FROM education WHERE cv_id = ?";
                                    $stmt_experience = mysqli_prepare($connection, $sql_experience);
                                    mysqli_stmt_bind_param($stmt_experience, "i", $cv_id);
                                    mysqli_stmt_execute($stmt_experience);
                                    $result_experience = mysqli_stmt_get_result($stmt_experience);

                                    if (mysqli_num_rows($result_experience) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_experience)) {
                                            echo "<div class='make-flex' style='margin-bottom: 8px; margin-top: 10px;'>";

                                            echo "<div class='one'>";
                                            echo "<p style='font-weight: 600;'>";
                                            echo htmlspecialchars($row['school']);
                                            echo "</p>";
                                            echo "</div>";

                                            echo "<div class='three' style='margin-left: 2px; margin-right: 5px;'>";
                                            echo "<p>,</p>";
                                            echo "</div>";

                                            echo "<div class='two'>";
                                            echo "<p style='font-weight: 600;'>";
                                            echo htmlspecialchars($row['start_date']);
                                            echo "</p>";
                                            echo "</div>";

                                            echo "<div class='four' style='margin-left: 5px; margin-right: 5px;'>";
                                            echo "<p>-</p>";
                                            echo "</div>";

                                            echo "<div class='two'>";
                                            echo "<p style='font-weight: 600;'>";
                                            echo htmlspecialchars($row['end_date']);
                                            echo "</p>";
                                            echo "</div>";

                                            echo "</div>";

                                        echo "<div class='make-flex'>";

                                        echo "<div class='one'>";
                                        echo "<h4 style='margin-top: -5px;'>";
                                        echo htmlspecialchars($row['degree']);
                                        echo "</h4>";
                                        echo "</div>";

                                        echo "</div>";

                                        echo "<p style='text-align: justify;'>";
                                        echo htmlspecialchars($row['description']);
                                        echo "</p>";
                                    }
                                        } else {
                                            echo "No education found for this CV.";
                                        }
                                            // mysqli_stmt_close($stmt_certificate);
                                ?>
            </div>
        </section>

        <section class="cv-section">
            <h2>Skills</h2>
            <ul>
            <?php
                                    $sql_experience = "SELECT * FROM skills WHERE cv_id = ?";
                                    $stmt_experience = mysqli_prepare($connection, $sql_experience);
                                    mysqli_stmt_bind_param($stmt_experience, "i", $cv_id);
                                    mysqli_stmt_execute($stmt_experience);
                                    $result_experience = mysqli_stmt_get_result($stmt_experience);

                                    if (mysqli_num_rows($result_experience) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_experience)) {
                                           echo "<li>";
                                            echo htmlspecialchars($row['skill_name']);
                                            echo "</li>";
                                    }
                                        } else {
                                            echo "No skills found for this CV.";
                                        }
                                            // mysqli_stmt_close($stmt_certificate);
                                ?>
            </ul>
        </section>

        <section class="cv-section">
            <h2>Certifications</h2>
            <ul>
            <?php
                                    $sql_experience = "SELECT * FROM certifications WHERE cv_id = ?";
                                    $stmt_experience = mysqli_prepare($connection, $sql_experience);
                                    mysqli_stmt_bind_param($stmt_experience, "i", $cv_id);
                                    mysqli_stmt_execute($stmt_experience);
                                    $result_experience = mysqli_stmt_get_result($stmt_experience);

                                    if (mysqli_num_rows($result_experience) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_experience)) {
                                           echo "<p style='margin-left: -15px; font-weight: 600; text-align: justify;'>";
                                            echo htmlspecialchars($row['title']);
                                            echo "</p>";
                                            echo "<p style='margin-left: -15px; margin-bottom: 10px; text-align: justify;'>";
                                            echo htmlspecialchars($row['description']);
                                            echo "</p>";
                                    }
                                        } else {
                                            echo "No skills found for this CV.";
                                        }
                                            // mysqli_stmt_close($stmt_certificate);
                                ?>
            </ul>
                                    </section>

    </div>
    <section class="print-btn-sc">
    <div class="container">
        <button type="button" onclick="window.print()" class="export-btn">
            <span class="material-symbols-outlined" style="margin-right: 8px;">Download as PDF</span>
        </button>
    </div>
</section>
</body>
</html>