<?php
    include_once 'includes/dbverbindung.php'
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo "PHP Generierter Titel"; ?></title>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/gästebuch.css">
  </head>

  <body>



        <ul>
          <li><a href="0_index.html">Home</a></li>
          <li><a href="1_geschichte.html">Geschichte</a></li>
          <li><a href="2_überuns.html">Über uns</a></li>
          <li><a href="3_gästebuch.html">Gästebuch</a></li>
        </ul>

        <div>
        <h1>Das Gästebuch</h1>
<?php


        // Get all entries in the guestbook
        $table = $guestbook->getEntries();

        if ($table) { // Check if there are enrtries
            echo "\nThe guestbook contains:\n";
            foreach ($table as $row) {
                // Output each element
                $index = $row["Index"];
                $name = $row["Name"];
                $date = $row["Date"];
                $email = $row["eMail"];
                $comment = $row["Comment"];

                echo "Index: $index, ";
                echo "Name: $name, ";
                echo "Date: $date, ";
                echo "eMail: $email, ";
                echo "Comment: $comment\n";
            }
?>


        <h2>Hinterlassen Sie der Community eine Nachricht</h2>
          <p>

              <label for="fname">Vorname: </label>
              <input id="fname" type="text" value="" maxlength="20" size="15" name="New_Name">
              <label for="lname">Nachname: </label>
              <input id="lname" type="text" value="" maxlength="40" size="30" name="New_Name"><br>

              <label for="email">Email Adresse: </label>
              <input id="email"type="text" name="New_Email" maxlength="50" size="30">
              <form class="form" action="eintrag.php" method="post">
              <textarea name="comment" rows="10" cols="50"></textarea>
              <br>
              <input type="submit" name="" value="abschicken">
              </form>
          </p>
        </div>

  </body>
</html>
