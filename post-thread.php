<!DOCTYPE html>
<html lang="en">
  <head>
      <?php
          require_once('Includes/metadata.php');
          require_once('Includes/dbConnection.php');
      ?>
      <title>Posts - GrizzChat</title>
      <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

      <!-- Styles -->
      <link href="Styles/style.css" rel="stylesheet">

      <script src="https://cdn.tiny.cloud/1/26v69f623t0meob0dymzvh6pyniv2h43rpmw08c9z1pae1sh/tinymce/5/tinymce.min.js" 
      referrerpolicy="origin">
      </script>
      <script>
      tinymce.init({
        selector: '#forumPost'

      });
      </script>
  </head>
  <body>
    <section id="background-gradient"></section>
    <?php
        require_once('Includes/page_elements.php');
        displayHeader();
        displaySidebarNavigation();
        loginCheckRedirect(); // Not intended to be in final release
    ?>

    <section id="page-content">
      <section id="page-container">
        <main>
          <h1 class="thread-title">Create A New Thread on GrizzChat</h1>

          <form class = "post" action="Includes/postAct.php" class="POST" method ="POST">
          <label for="forumPost"></label>
          <br>
          <textarea id="title" name="title" placeholder="Enter your thread title here." cols="35"></textarea>
          <br>
          <br>
          <textarea id="forumPost" name="forumPost" rows="4" cols="50">
            </textarea>
            <br><br>
            <button type="submit" class="btn btn-secondary thread-reply" name ="submit">Submit</button>
          </form>
          <?php
            if(isset($_GET["error"])){
              if ($_GET["error"] == "emptyPost"){
                echo"<p style='color: #B22222;'>Fill in all fields</p>";

              }
            }
          ?>
        </main>
      </section>
    </section>
  </body>
</html>
