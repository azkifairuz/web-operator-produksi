<?php
session_start();
if (!isset($_SESSION['NIP'])){
    header("Location: ../login.php");
}
$userNip = $_SESSION['NIP'];
include("navbar.php");
include("../koneksi.php");
$getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$getOldPassword = mysqli_query($con, "SELECT `user_password` FROM `user` WHERE `user_nip` ='$userNip' ");
$oldPassword = mysqli_fetch_array($getOldPassword);
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

      <div class="mainPage container w-1/2 ml-20 mt-20">
        <h1 class="md:text-5xl mb-2 -ml-10 text-purple-700 font-bold">
          Halaman Utama
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnProfil bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                profil
              </li>
              <li
                class="btnUbah bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Ubah Profil
              </li>
              <li
                class="btnPassword bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Ubah Sandi
              </li>
            </ul>
          </div>
          <div class="bg-pink-400 w-fit lg:h-full lg:w-full flex  gap-2 items-center h-5/6">
            <section class="profil ">
              <div class=" w-full m-10 flex justify-around gap-5  ">
                <div class="w-20 lg:w-52 lg:h-20 h-20 bg-white">
                  <img class="w-20 lg:w-52 lg:h-52 h-20 text-center"
                    src="../../item/<?php echo $data['gambar'] ?>"
                    alt="profil" />
                </div>
                <div class="bg-white  w-1/2">
                  <table class="border-2 w-ful text-left  table-auto">
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
                        <td class="p-2 ">
                          <?php echo $data['NIP'] ?>
                        </td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">Nama</th>
                        <td class="p-2 w-full ">
                          <?php echo $data['nama'] ?>
                        </td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">Departemen</th>
                        <td class="p-2">
                          <?php echo $data['departemen'] ?>
                        </td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border w-fit p-2 bg-black text-white">Hire_date</th>
                        <td class="p-2">
                          <?php echo $data['hire_date'] ?>
                        </td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border  p-2 bg-black text-white">Lokasi</th>
                        <td class="p-2">
                          <?php echo $data['lokasi'] ?>
                        </td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border p-2 bg-black text-white">NPWP</th>
                        <td class="p-2">
                          <?php echo $data['NPWP'] ?>
                        </td>
                      </tr>
                      <tr class="border border-black">
                        <th class="border p-2 bg-black text-white">title</th>
                        <td class="p-2">
                          <?php echo $data['title'] ?>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </table>
                </div>
              </div>
            </section>
            <section class="ubahProfil hidden ">
              <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <form action="" method="post" enctype="multipart/form-data"
                  class="form auto flex w-full  justify-around  gap-4">

                  <div class="w-20 h-20 lg:w-52 lg:h-52 bg-white">
                    <img class="w-20 h-20 lg:w-52 lg:h-52 text-center" src="../../item/<?php echo $data['gambar'] ?>"
                      alt="profil" />
                    <label for="foto"></label>
                    <input type="file" name="foto" id="foto" class="block border-2 border-black rounded-md w-full"
                      value="<?php echo $dataProduk["gambar"] ?>">
                  </div>

                  <div class="grid grid-cols-2  gap-4">
                    <div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="NIP">NIP</label>
                        <input class="py-2 text-black px-4 rounded-md" type="text" name="NIP" readonly
                          value="<?php echo $data["NIP"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="nama">Nama</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="nama"
                          value="<?php echo $data["nama"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="departemen">Departemen</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="departemen" readonly
                          value="<?php echo $data["departemen"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="hire_date">hire_date</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="hire_date" readonly
                          value="<?php echo $data["hire_date"] ?>">
                      </div>
                    </div>
                    <div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="lokasi">lokasi</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="lokasi" readonly
                          value="<?php echo $data["lokasi"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="NPWP">NPWP</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="NPWP" readonly
                          value="<?php echo $data["NPWP"] ?>">
                      </div>
                      <div class="flex flex-col capitalize text-white">
                        <label for="title">title</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="title" readonly
                          value="<?php echo $data["title"] ?>">
                      </div>
                    </div>
                    <button name="btn-simpan" id="btn-simpan" class="bg-blue-500  text-white px-4 py-2"> Ubah</button>
                  </div>
                </form>
              </div>
            </section>
            <section class="ubahPassword hidden w-full">
              <div class="mx-auto w-1/2">
                <form action="" method="post" class="flex flex-col gap-4">
                  <h1 class="text-white text-4xl mb-5 -mt-10 font-bold text-center capitalize ">reset password</h1>
                  <div class="flex flex-col text-white">
                    <label for="old">Masukan Sandi Lama</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="old" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Masukan Sandi Baru</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="new" value="">
                  </div>
                  <button name="btn-reset" class="py-2 px-4 text-white bg-blue-500">Ubah</button>
                </form>
              </div>
            </section>

          </div>
          <?php
          if (isset($_POST['btn-reset'])) {
            $old = htmlspecialchars($_POST['old']);
            $new = htmlspecialchars($_POST['new']);
            if ($old === $oldPassword['user_password']) {
              $queryUpdate = mysqli_query($con, "UPDATE `user` SET `user_password` = '$new' WHERE `user_nip` = '$userNip'; ");
              ?>
              <div
                class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                role="alert">
                <strong class="font-bold"> password berhasil direset</strong>
              </div>

              <?php
            } else {
              ?>
              <div
                class="bg-red-100 mx-auto border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                role="alert">
                <strong class="font-bold"> password lama salah</strong>
              </div>
              <?php
            }
          }
          ?>
          <?php
          if (isset($_POST['btn-simpan'])) {
            $nama = htmlspecialchars($_POST['nama']);

            //validasi gambar    
            $fileSize = $_FILES["foto"]["size"];
            $target_dir = "../../item/";
            $nama_file = basename($_FILES["foto"]["name"]);
            $target_file = $target_dir . $nama_file;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $image_size = $_FILES["foto"]["size"];
            $RandomAccountNumber = uniqid();


            $new_name = $RandomAccountNumber . "." . $imageFileType;
            if ($nama == "") {
              ?>
              <div
                class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Nama Tidak boleh kosong</strong>
              </div>
              <?php
            } else {
              $queryUpdate = mysqli_query($con, "UPDATE `data_operator_produksi` SET `nama` = '$nama' WHERE `NIP` = '$userNip'; ");
              if ($nama_file != "") {
                if ($image_size > 5000000) {
                  ?>
                  <div
                    class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">file lebih dri 50mb</strong>
                  </div>
                  <?php
                } else {
                  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "svg" && $imageFileType != "gif" && $imageFileType != "jpeg") {
                    ?>
                    <div
                      class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                      role="alert">
                      <strong class="font-bold">tipe file tidak sesuai</strong>
                    </div>
                    <?php
                  } else {
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                    $queryUpdate = mysqli_query($con, "UPDATE `data_operator_produksi` SET `gambar` = '$new_name' WHERE `data_operator_produksi`.`NIP` = '$userNip'; ");

                  }
                }

              }
              if ($queryUpdate) {
                ?>
                <div
                  class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                  role="alert">
                  <strong class="font-bold"> Profil berhasil diupdate</strong>
                </div>

                <?php
              }
            }
          }

          ?>
        </div>
      </div>
    </div>
  </div>

  <script>

    const btnProfil = document.querySelector(".btnProfil")
    const btnUbah = document.querySelector(".btnUbah")
    const btnPassword = document.querySelector(".btnPassword")

    const profilPage = document.querySelector(".profil")
    const ubahProfilPage = document.querySelector(".ubahProfil")
    const ubahPasswordPage = document.querySelector(".ubahPassword")

    btnProfil.addEventListener("click", () => {
      profilPage.classList.remove("hidden")
      ubahProfilPage.classList.add("hidden")
      ubahPasswordPage.classList.add("hidden")
    })
    btnUbah.addEventListener("click", () => {
      profilPage.classList.add("hidden")
      ubahProfilPage.classList.remove("hidden")
      ubahPasswordPage.classList.add("hidden")
    })
    btnPassword.addEventListener("click", () => {
      profilPage.classList.add("hidden")
      ubahProfilPage.classList.add("hidden")
      ubahPasswordPage.classList.remove("hidden")
    })
  </script>
</body>

</html>