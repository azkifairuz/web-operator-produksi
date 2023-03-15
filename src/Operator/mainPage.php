<?php
include("navbar.php")
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
          <div class="bg-pink-400 w-fit lg:h-full lg:w-full  flex justify-evenly gap-2 items-center h-5/6">
            <div class="profil hidden  gap-2  ">
              <div class="w-20 lg:w-52 bg-white">
                <img class="w-20 lg:w-52 text-center"
                  src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                  alt="profil" />
              </div>

              <div class="w-3/5  overflow-scroll">
                <table class="border-2  w-full text-left mx-auto table-auto">
                  <tr class="bg-black text-white">
                    <th class="border p-2">NIP</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">departemen</th>
                    <th class="border p-2">Hire_date</th>
                    <th class="border p-2">Lokasi</th>
                    <th class="border p-2">NPWP</th>
                    <th class="border p-2">Title</th>
                  </tr>
                  <tr class="bg-white">
                    <td class="border">tes</td>
                    <td class="border">tes</td>
                    <td class="border">tes</td>
                    <td class="border">tes</td>
                    <td class="border">tes</td>
                    <td class="border">tes</td>
                    <td class="border">tes</td>
                  </tr>
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
                
                <div >
                  <label for="name" class="text-white text-lg">NIP : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
                </div>
                <div>
                  <label for="name" class="text-white text-lg">Departemen : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
                </div>
                <div>
                  <label for="name" class="text-white text-lg">Hire_date : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
                </div>
                <div>
                  <label for="name" class="text-white text-lg">Lokasi : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
                </div>
                <div>
                  <label for="name" class="text-white text-lg">NPWP : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
                </div>
                <div>
                  <label for="name" class="text-white text-lg">Title : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
                </div>
                <div>
                  <label for="name" class="text-white text-lg">Nama : </label>
                  <input class="py-2 px-4 rounded-md" type="text" name="name" placeholder="Masukan Nama">
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