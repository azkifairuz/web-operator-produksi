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
    <title>Register</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body>
    <div class="flex p-5 items-center flex-col bg-slate-400 w-[500px] mt-20 h-fit m-auto gap-10 mb-5">
        <div class="mt-5 mb-5">
            <img class="w-24 h-24 rounded-full text-center bg-cover bg-white" src="../item/logo.jpeg" alt="">
        </div>
        <div class="flex flex-col w-10/12 gap-5">
            <h1 class="bg-purple-500 p-1 text-center text-white">REGISTER.</h1>
            <h1 class="bg-purple-500 p-1 text-white">PT Sewu Sentral Primatama.</h1>
            <form method="post" class="flex w-full justify-between  gap-5 flex-col">
                <input type="text" name="NIP" placeholder="NIP" class="text-purple-500 font-bold p-2 w-full rounded-md">
                <input type="password" name="password" placeholder="Password"
                    class="text-purple-500 font-bold p-2 w-full rounded-md">
                <select name="status" class="p-2 w-full rounded-md">
                    <option value="Operator">Operator</option>
                    <option value="Leader">Leader</option>   
                </select>
                <button type="submit" name="registerButton" class="text-white mt-10 w-24 text-2xl py-2 px-4 rounded-full justify-self-end self-end bg-gradient-to-t from-purple-700 to-purple-400">Login</button>
            </form>
           
        </div>
      
    </div>
    <div class="w-[500px] text-center m-auto">
            <?php
            if (isset($_POST["registerButton"])) {
                function guidv4($data)
                {
                    assert(strlen($data) == 16);

                    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
                    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

                    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
                }
                // menambil inputan dari user
                $NIP = htmlspecialchars($_POST["NIP"]);
                $password = htmlspecialchars($_POST["password"]);
                $status = htmlspecialchars($_POST["status"]);
                $uuid =  guidv4(openssl_random_pseudo_bytes(16));
                //mengambil data user dri database
                $getData = mysqli_query($con, "SELECT * FROM user WHERE user_nip='$$NIP' ");
              
                //mengecek apakah usernya ada
                $checkData = mysqli_num_rows($getData);
                if ($checkData > 0) {
                    ?>
                    <div class="bg-green-100 border border-red-400 w-full text-red-700 px-10 py-3 rounded relative" role="alert">
                        <strong class="font-bold">username sudah  ada</strong>
                    </div>
                    <?php
                    } else {
                        $query = mysqli_query($con, "INSERT INTO `user`(`user_id`, `user_nip`, `user_password`, `user_status`) VALUES ('$uuid','$NIP','$password','$status') ");
                        $tambahKeDataOperator = mysqli_query($con,"INSERT INTO `data_operator_produksi`(`NIP`) VALUES ('$NIP')");
                        if ($tambahKeDataOperator) {
                            
                        ?>
                            <div class="bg-green-100 border border-green-400 w-full text-green-700 px-10 py-3 rounded relative" role="alert">
                                <strong class="font-bold">kamu berhasil daftar</strong>
                            </div>
                        <?php
                        }
                    }
                
                    
                  
                
            }
            ?>
        </div>
</body>

</html>