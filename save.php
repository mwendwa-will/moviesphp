<?php
require 'security.php';

if (isset($_POST["price"]))
{
    require "DB.php";
    extract($_POST);
   // echo "$title $price $quantity $genre";
    $target_dir = "uploads/";
    $unik= rand(1000000,20000000);
    $unik_2= rand(5000000,10000000);
    $joined = $unik."_".$unik_2;
    $ext = pathinfo(basename($_FILES["cover"]["name"]), 4);

    /*if ($ext !="png" or $ext !="jpeg" or $ext !="jpg" or $ext !="webg")
    {
        echo "Invalid File Type";
        die();
    }*/
   // echo $ext;
    //die();
    $target_file = $target_dir .$joined. ".".$ext;
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
    //Save to db
        $sql="INSERT INTO `movies`(`movie_id`, `title`, `genre`, `quantity`, `price`, `cover`, `user_id`) VALUES 
                                    (null ,'$title','$genre',$quantity,$price,'$target_file',1)";
        mysqli_query($conn,$sql);
    }else{
        //error msg
        echo "Failed To Upload Movie";
    }





}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Movie</title>
    8
</head>
<body>
<?php
require 'navbar.php';
?>
<div class="container">
<div class="row justify-content-center">
    <div class="col-sm-6">


        <div class="card">
            <div class="card-header">
                Add A New Movie
            </div>
            <div class="card-body">
                <?php
                if(isset($message))
                    echo "<p class='text-danger'>$message</p>";
                ?>
                <form action="save.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Genre</label>
                        <select name="genre"  class="form-control">
                            <option value="Horror">Horror</option>
                            <option value="Documentary">Documentary</option>
                            <option value="Action">Action</option>
                            <option value="Romance">Romance</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Quantity</label>
                        <input class="form-control" type="number" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input class="form-control" type="number" step="0.5" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Cover Photo</label>
                        <input class="form-control" type="file" accept="image/jpeg,image/x-png,image/jpg" name="cover" required>
                    </div>

                    <button class="btn btn-info btn-block">Save Movie</button>

                </form>

            </div>
        </div>

    </div>
</div>


</div>
</body>
</html>