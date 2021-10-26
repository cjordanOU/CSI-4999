<!DOCTYPE html>
<html>
<body>

<head>
<link rel="stylesheet" href="style.css">
</head>

<script src="https://cdn.tiny.cloud/1/26v69f623t0meob0dymzvh6pyniv2h43rpmw08c9z1pae1sh/tinymce/5/tinymce.min.js" 
referrerpolicy="origin">
</script>

<script>
    tinymce.init({
      selector: '#forumPost'

    });
</script>


<h1>Forum Post Test</h1>

<form class = "post" action="Includes/postAct.php" class="POST" method ="POST">
<label for="forumPost"></label>
<br>
<textarea id="title" name = "title" ></textarea>
<br>
<br>
<textarea id="forumPost" name="forumPost" rows="4" cols="50">
  </textarea>
  <br><br>
  <button type="submit" class="btn btn-secondary" name ="submit">Submit</button>
</form>
    <?php
      if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyPost"){
          echo"<p style='color: #B22222;'>Fill in all fields</p>";

        }
      }
    ?>
</body>
</html>
