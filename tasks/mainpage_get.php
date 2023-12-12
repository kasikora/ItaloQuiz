<?php 
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"posting");

if(!isset($_SESSION["name"]))
{
    ?>
    <script type="text/javascript">
        window.location="loginpage.php";
    </script>
    <?php
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add post</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="form1" id="form1" action="" method="get">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Here</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">New Post</label>
                                            <input type="text" placeholder="e.g. grammar" class="form-control form-control-lg" name="post">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Create" class="btn btn-success">
                                        </div>               
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Posts</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Number of post</th>
                                                <th scope="col">Content</th>
                                                <th scope="col">Creator</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count=0;
                                            $res=mysqli_query($link,"select * from posts");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $count=$count+1;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["postcontent"]; ?></td>
                                                    <td><?php echo $row["creator"]; ?></td>
                                                    <td><a href="deletepage.php?id=<?php echo $row["id"]; ?>">Delete me</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET["submit1"]))
{
    $creator = $_SESSION["name"];
    mysqli_query($link,"insert into posts values(NULL,'$_GET[post]', '$creator')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        window.location.href="mainpage_get.php";
    </script>
    <?php
}
?>
