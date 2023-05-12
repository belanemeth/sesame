<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$id = $_POST["id"] ?? null; // ha az "id" nem érkezik meg a kéréssel, akkor a $id változó értéke null lesz


$servername = "localhost";
$username = "root";
$password = "Password.1";
$dbname = "Babacuccok";

// Kapcsolódás az adatbázishoz
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Ellenőrizzük a kapcsolatot
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ha az űrlapot elküldték
if(isset($_POST["submit"])) {
    $target_dir = "/media/babacuccok/";
    $target_file = $target_dir . basename($_FILES["kep"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Ellenőrizzük, hogy a fájl valóban kép-e
    $check = getimagesize($_FILES["kep"]["tmp_name"]);
    if($check === false) {
        echo "A fájl nem kép.";
        $uploadOk = 0;
    }

    // Ellenőrizzük, hogy a fájl már létezik-e
    if (file_exists($target_file)) {
        echo "A fájl már létezik.";
        $uploadOk = 0;
    }

    // Ellenőrizzük, hogy a fájl mérete megfelelő-e
    if ($_FILES["kep"]["size"] > 500000) {
        echo "A fájl túl nagy.";
        $uploadOk = 0;
    }

    // Engedélyezzük csak bizonyos fájltípusokat
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Csak JPG, JPEG, PNG & GIF fájlok engedélyezettek.";
        $uploadOk = 0;
    }

    // Feltöltjük a fájlt a szerverre, és elmentjük az elérési utat az adatbázisba
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file)) {
            $picturePath = mysqli_real_escape_string($conn, $target_file);
            $sql = "INSERT INTO ITEM (PicturePath) VALUES ('$picturePath')";
            if (mysqli_query($conn, $sql)) {
                echo "A fájl sikeresen feltöltve.";
            } else {
                echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Hiba a fájl feltöltése közben.";
        }
    }
}
?>
