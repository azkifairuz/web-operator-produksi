<?php
session_start();
$userNip = $_SESSION['NIP'];
include("navbar.php");
include("../koneksi.php");
$getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$cekUser = mysqli_num_rows($getDataOperator);
$data = mysqli_fetch_array($getDataOperator);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../dist/output.css" />
</head>

<body>
  <div>
    <div class="flex">
      <?php
      include("sidebar.php");
      ?>

      <div class="mainPage container w-1/2 ml-20 mt-2">
        <h1 class="md:text-5xl mb-2 -ml-10 text-purple-700 font-bold">
          Halaman Utama
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                profil
              </li>
              <li
                class="bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Ubah Profil
              </li>
              <li
                class="bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Ubah Sandi
              </li>
            </ul>
          </div>
          <div class="bg-pink-400 w-fit lg:h-full lg:w-full flex  gap-2 items-center h-5/6">
            <div class="profil w-full m-10 hidden justify-around gap-5  ">
              <div class="w-20 lg:w-52 lg:h-20 h-20 bg-white">
                <img class="w-20 lg:w-52 lg:h-52 h-20 text-center"
                  src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                  alt="profil" />
              </div>

              <div class="bg-white  w-1/2">
                <table class="border-2   w-fit text-left  table-auto">
                  <?php
                  if ($cekUser == 0) {
                    ?>
                    <tr rowspan=5>
                      <td colspan=5>Belum Memiliki Data</td>
                    </tr>
                    <?php
                  } else {
                    
                      ?>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">NIP</th>
                        <td class="p-2"><?php echo $data['NIP'] ?></td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">Nama</th>
                        <td class="p-2 w-full "><?php echo $data['nama'] ?></td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">Departemen</th>
                        <td class="p-2"><?php echo $data['departemen'] ?></td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">Hire_date</th>
                        <td class="p-2"><?php echo $data['hire_date'] ?></td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border  p-2 bg-black text-white">Lokasi</th>
                        <td class="p-2"><?php echo $data['lokasi'] ?></td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border p-2 bg-black text-white">NPWP</th>
                        <td class="p-2"><?php echo $data['NPWP'] ?></td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border p-2 bg-black text-white">title</th>
                        <td class="p-2"><?php echo $data['title'] ?></td>
                      </tr>
                      <?php
                    
                  }
                  ?>
                </table>
              </div>
            </div>
            <div class="ubah-profil flex  items-center justify-evenly gap-4 w-full">
              <div class="w-20 h-20 lg:w-52 lg:h-52 bg-white">
                <img class="w-20 h-20 lg:w-52 lg:h-52 text-center"
                  src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                  alt="profil" />
              </div>
              <form action="" method="post" class="form auto flex w-1/2  justify-start flex-col gap-4">

                <div class="grid grid-cols-2  gap-4">
                    <div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="NIP">NIP</label>
                        <input class="py-2 text-black px-4 rounded-md" type="text" name="NIP" readonly value="<?php echo $data["NIP"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="nama">Nama</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="Nama"  value="<?php echo $data["nama"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="departemen">Departemen</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="departemen" readonly value="<?php echo $data["departemen"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="hire_date">hire_date</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="hire_date" readonly value="<?php echo $data["hire_date"] ?>">
                      </div>
                  </div>
                  <div>
                    <div class="flex flex-col capitalize text-white">
                      <label for="lokasi">lokasi</label>
                      <input class="py-2 px-4 text-black rounded-md" type="text" name="lokasi" readonly value="<?php echo $data["lokasi"] ?>">
                    </div>
                    <div class="flex flex-col capitalize text-white">
                      <label for="NPWP">NPWP</label>
                      <input class="py-2 px-4 text-black rounded-md" type="text" name="NPWP" readonly value="<?php echo $data["NPWP"] ?>">
                    </div>
                    <div class="flex flex-col capitalize text-white">
                      <label for="title">title</label>
                      <input class="py-2 px-4 text-black rounded-md" type="text" name="title" readonly value="<?php echo $data["title"] ?>">
                    </div>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="index.js"></script>
</body>

</html>