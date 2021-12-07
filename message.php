<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>

        <!-- Styles  border: 2px solid #dedede; -->
        <link href="Styles/style.css" rel="stylesheet">
        <style>


        .container {
          background-color: #f1f1f1;
          border-radius: 5px;
          padding: 10px;
          margin: 10px 0;
          text-align: right;
          width:100%;
        }



        .container::after {
          content: "";
          clear: both;
          display: table;

        }
        .time-right {
          float: right;
          color: #aaa;
        }

        .time-left {
          float: left;
          color: #999;
        }

        .message{
          
          border: 2px solid #dedede;
          display: inline-block;
          padding:5px;
          border-radius: 10px;
          max width: 70%;
        }
        .darker{
          
          padding: 10px;
          margin: 10px 0;
          border-color: #ccc;
          text-align: left;



        }

    </style>
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

                <h2>Chat Messages</h2>

                <div class="container">
                  <?php
                  $uid = $_GET['userid'];
                  $sql = "SELECT * FROM messages 
                  Where SENDER_ID = {$_SESSION["id"]} AND RECIEVER_ID = $uid or SENDER_ID = $uid AND RECIEVER_ID = {$_SESSION["id"]}";
                    $result = $dbConnection-> query($sql);
                      if ($result-> num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            if ($row['SENDER_ID'] == $_SESSION["id"]){
                            echo "<div class='container'>  <p class ='message'>"
                            . $row['MESSAGE_CONTENT']. "<br>". "<span class='time-right'>". $row['MESSAGE_TIME'] ."</span></p>
                            
                            </div>
                          ";
                            } else   {
                              echo "<div class='container darker'> <p class ='message darker'>"
                              . $row['MESSAGE_CONTENT']."<br> ".  " <span class='time-left'>". $row['MESSAGE_TIME'] ."</span></p>
                              
                              </div>
                            ";
                            }
                          }

                      }       
                      
                      echo '<form class = "post" action="Includes/messageAct.php?userid='.$uid.'" class="POST" method ="POST">
                      <label for="forumPost"></label>
                      <br>
                      <br>
                      <textarea id="forumPost" name="forumPost" rows="4" cols="50">
                      </textarea>
                      <br><br>
                      <button type="submit" name ="submit" class="thread-reply">Reply</button>
                      </form>';
                  ?>

                  
                </div>

   
                </main>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
