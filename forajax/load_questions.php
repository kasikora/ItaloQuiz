<?php
session_start();
include "../connection.php";

$question_no = "";
$question = "";
$options = array();
$answer = "";
$count = 0;
$ans = "";

$queno = $_GET["questionno"];
if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}

$res = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[categories]' && question_no=$_GET[questionno]");
$count = mysqli_num_rows($res);

if ($count == 0) {
    echo "over";
} 
else {
    while ($row = mysqli_fetch_array($res)) {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $options[] = $row["opt1"];
        $options[] = $row["opt2"];
        $options[] = $row["opt3"];
        $options[] = $row["opt4"];
        $options[] = $row["opt5"];
        $answer = $row["answer"];
    }
    ?>
    <br>
    <table>
        <tr>
            <td style="font-weight: bold; font-size: 20px; padding-left: 5px" colspan="2">
                <?php echo "<span style='color: gray;'>Question nr. </span>" . $question_no . "<span style='color: gray;'>:  </span>" . $question; ?>
            </td>
        </tr>
    </table>

    <table style="margin-left: 10px">
        <?php
        $maxOptions = 5;
        $openEnded = true;
        for ($i = 0; $i < count($options); $i++) {
            $option = $options[$i];
            if (!empty($option) && $i < $maxOptions) {
                $openEnded = false;
                ?>
                <tr>
                    <td>
                        <input type="radio" name="r1" id="r1" value="<?php echo $option; ?>"
                               onclick="radioclick(this.value, <?php echo $question_no ?>)"
                            <?php
                            if ($ans == $option) {
                                echo "checked";
                            }
                            ?>>
                    </td>
                    <td>
                        <td style="padding-left: 10px">
                            <?php
                            echo $option;
                            ?>
                        </td>
                    </td>
                </tr>
                <?php
            }
        }
        if ($openEnded) {
            ?>
            <tr>
                <td>
                    <input type="text" name="open_answer" id="open_answer" placeholder="Enter your answer" oninput="save_answer(<?php echo $question_no; ?>)" >
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>