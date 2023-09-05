<?php
session_start();
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+ $_SESSION[quiz_time] minutes"));
include "header.php";
include "connection.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-8 col-lg-offset-2" style="min-height: 500px; background-color: white;">
        <?php
        $correct = 0;
        $wrong = 0;

        if (isset($_SESSION["answer"])) {
            for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
                $answer = "";
                $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[categories]' && question_no=$i");

                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        foreach ($row as $key => $value) {
                            if ($key != "id" && $key != "question_no" && $key != "category" && $value != "") {
                                // Usuń "opt" z klucza
                                $keyWithoutOpt = str_replace("opt", "Answer ", $key);
                                
                                // Wyświetl treść pytania i odpowiedź użytkownika
                                if ($keyWithoutOpt == "question") {
                                    echo "<strong>Question:</strong> $value<br>";
                                } else {
                                    $displayKey = ($keyWithoutOpt == "answer") ? "Correct answer" : $keyWithoutOpt;
                                    echo "<strong>$displayKey:</strong> $value<br>";
                                }
                            }
                        }
                        echo "<strong>Your answer:</strong> " . $_SESSION["answer"][$i] . "<br><br>";
                    }
                    mysqli_free_result($res);
                }

                if (isset($_SESSION["answer"][$i])) {
                    $correctAnswer = ""; // Zmienna przechowująca poprawną odpowiedź
                
                    // Pobierz poprawną odpowiedź z bazy danych
                    $res = mysqli_query($link, "SELECT answer FROM questions WHERE category='$_SESSION[categories]' && question_no=$i");
                    if ($res) {
                        $row = mysqli_fetch_assoc($res);
                        $correctAnswer = $row["answer"];
                    }
                
                    // Porównaj odpowiedź użytkownika z poprawną odpowiedzią
                    if ($correctAnswer == $_SESSION["answer"][$i]) {
                        $correct = $correct + 1;
                    } else {
                        $wrong = $wrong + 1;
                    }
                } else {
                    $wrong = $wrong + 1;
                }
                
            }
        }

        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[categories]'");
        $count = mysqli_num_rows($res);
        $wrong = $count - $correct;
        ?>
        <br><br>
        <div class="text-center">
            <h3>Quiz Results</h3>
            <p>Total Questions: <?= $count ?></p>
            <p>Correct Answers: <?= $correct ?></p>
            <p>Wrong Answers: <?= $wrong ?></p>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION["quiz_start"])) {
    $date = date("Y-m-d");
    mysqli_query($link, "INSERT INTO quiz_results(id,email,type,total_question,correct_answer,wrong_answer,time) VALUES (NULL,'$_SESSION[email]','$_SESSION[categories]','$count','$correct','$wrong','$date')");
}
if (isset($_SESSION["type"])) {
    unset($_SESSION["quiz_start"]);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
<?php
}

include "footer.php";
?>
