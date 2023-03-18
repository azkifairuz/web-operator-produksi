<?php
session_start();
require("koneksi.php")
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body>
    <div class="flex p-5 items-center flex-col bg-slate-400 w-[500px] mt-20 h-[500px] m-auto gap-10 mb-5">
        <div class="mt-5 mb-5">
            <img class="w-24 h-24 rounded-full text-center bg-white" src="" alt="">
        </div>
        <div class="flex flex-col w-10/12 gap-5">
            <h1 class="bg-purple-500 p-1 text-white">PT Sewu Sentral Primatama.</h1>
            <form method="post" class="flex w-full justify-between  gap-5 flex-col">
                <input type="text" name="NIP" placeholder="NIP" class="text-purple-500 font-bold p-2 w-full rounded-md">
                <input type="password" name="password" placeholder="Password"
                    class="text-purple-500 font-bold p-2 w-full rounded-md">
                <button type="submit" name="loginbutton" class="text-white mt-10 w-24 text-2xl py-2 px-4 rounded-full justify-self-end self-end bg-gradient-to-t from-purple-700 to-purple-400">Login</button>
            </form>
           
        </div>
      
    </div>
    <div class="w-[500px] text-center m-auto">
            <?php
            if (isset($_POST["loginbutton"])) {
                // menambil inputan dari user
                $NIP = htmlspecialchars($_POST["NIP"]);
                $password = htmlspecialchars($_POST["password"]);
                //mengambil data user dri database
                $query = mysqli_query($con, "SELECT * FROM `user` WHERE user_nip='$NIP' ");
                //mengecek apakah usernya ada
                $isUser = mysqli_num_rows($query);
                $user = mysqli_fetch_array($query);

                if ($isUser > 0) {
                    if ($password === $user['user_password']) {
                        $_SESSION['NIP'] = $user['user_nip'];
                        $_SESSION['login'] = true;
                        $_SESSION['status'] = $user['user_status'];

                        if ($user['user_status'] === 'Operator') {
                            ?>
                            <div class="bg-green-100 border border-green-400 w-full text-green-700 px-10 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">kamu login sebagai operator</strong>
                            </div>
                            <meta http-equiv="refresh" content="2; url=./Operator/index.php" />
                            <?php


                        } else {
                            ?>
                            <div class="bg-green-100 border border-green-400 w-full text-green-700 px-10 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">kamu login sebagai Leader</strong>
                            </div>
                            <meta http-equiv="refresh" content="2; url=./Leader/index.php" />
                            <?php
                        }

                    } else {
                        ?>
                        <div class="bg-red-100 border border-red-400 w-full text-red-700 px-10 py-3 rounded relative" role="alert">
                            <strong class="font-bold">password salah</strong>
                        </div>
                        <?php
                    }
                }
                else {
                    ?>
                    <div class="bg-red-100 border border-red-400 w-full text-red-700 px-10 py-3 rounded relative" role="alert">
                        <strong class="font-bold">kamu tidak terdaftar</strong>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
</body>

</html>