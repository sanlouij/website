<?php
/** Copyright 2012 Hochschule Luzern - Technik & Architektur
 *
 * Shows the usage of the GuestbookAccess code.
 * @author Peter Sollberger <peter.sollberger@hslu.ch>
 */

echo "Demonstration on how to use GuestbookAccess class\n";
echo "-------------------------------------------------\n\n";

require_once 'includes/GuestbookAccess.php';

// Create an object of the GuestbookAccess class
$guestbook = new GuestbookAccess();

// Call the add entry methode
// The method itself adds a unique index and the date to the entry.
$id1 = $guestbook->addEntry("Hans", "hans@hslu", "Hi, I just want to add an new entry in your guest book");
echo "Added new entry with index $id1\n";
$id2 = $guestbook->addEntry("Fritz", "fritz@hslu", "It's me");
echo "Added new entry with index $id2\n";

// Get the second entry (with index $id2)
$row = $guestbook->getEntry($id2);
if ($row) {
    $index = $row["Index"];
    $name = $row["Name"];
    $date = $row["Date"];
    $email = $row["eMail"];
    $comment = $row["Comment"];

    echo "\nSecond entry is:\n";
    echo "Index: $index, ";
    echo "Name: $name, ";
    echo "Date: $date, ";
    echo "eMail: $email, ";
    echo "Comment: $comment\n";
}


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
}
else {
    echo "\nGuest book is empty\n";
}

// Remove the inserted entries
echo "\nRemoving the last two entries\n";
$guestbook->removeEntry($id1);
$guestbook->removeEntry($id2);

// Again get all remaining entries in the guestbook
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
} else {
    echo "\nGuest book is empty\n";
}
?>
