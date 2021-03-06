<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama Harus Di isi";
        } else {
            $nama = test_input($_POST["nama"]);
        }


        if (empty($_POST["email"])) {
            $emailErr = "Email harus Di isi";
        } else {
            $email = test_input($_POST["email"]);


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email Tidak Sesuai Format";
            }
        }

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender Harus di Pilih";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <h2>Posting Komentar</h2>

    <p><span class="error">*Harus Diisi.</span></p>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama">
                    <span class="error">* <?php echo $namaErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Email :</td>
                <td><input type="text" name="email">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Website :</td>
                <td><input type="text" name="website">
                    <span class="error">* <?php echo $websiteErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Komentar :</td>
                <td><textarea name="comment" cols="40" rows="5"></textarea>
                </td>
            </tr>

            <tr>
                <td>Gender :</td>
                <td><input type="radio" name="gender" value="L">Laki-Laki
                <td><input type="radio" name="gender" value="P">Perempuan
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>

            <td><input type="submit" name="submit" value="Submit">
            </td>
        </table>

    </form>

    <?php
    echo "<h2>Data yang anda isi :</h2>";
    echo $nama;
    echo "<br>";

    echo $email;
    echo "<br>";

    echo $website;
    echo "<br>";

    echo $comment;
    echo "<br>";

    echo $gender;
    ?>
</body>

</html>