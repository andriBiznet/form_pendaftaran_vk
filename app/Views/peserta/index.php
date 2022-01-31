<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

    <!-- Image -->
    <div class="row justify-content-center">
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>

        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
        <div class="col-2 clearfix justify-content-center">
            <img class="img-fluid" src="./images/download.png" alt="Jakarta">
        </div>
    </div>

    <hr class="mx-5">

    <div class="d-flex justify-content-center flex-column align-items-center">
        <img class="img-fluid mb-4" src="./images/download.png" alt="Jakarta">
        <h4>Selamat Datang!</h4>
        <p>Formulir Pendaftaran i-SERVE Vaccine Jakarta</p>
    </div>

    <hr class="mx-5">

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="duration_notif_error">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <strong><?php echo session()->getFlashdata('error'); ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="duration_notif_error">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </svg>
          <strong><?php echo session()->getFlashdata('message'); ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>    

    <form method="post" action="<?= base_url('peserta/add_data') ?>" class="px-2">
        <?= csrf_field(); ?>
            <div class="d-flex flex-row-reverse bd-highlight mt-1">
                <a href="<?= base_url('peserta/cek_data') ?>"><button type="button" class="btn btn-primary btn-sm">Cek Pendaftaran</button></a>
            </div><br>
        <div class="form-floating">
          <input type="text" class="form-control" name="kode_vaksin_3" id="kode_vaksin_3" placeholder="Masukkan Nama"
            autocomplete="off" maxlength="10" onchange="kodeVak()">
          <label class="floating-input" for="kode_vaksin_3">No Tiket Vaksin 3 (Booster)</label>
        </div>       
        <div class="mb-4">
            <span class="small text-muted mb-4">Cara melihat No Tiket Vaksin 3 klik <span role="button"
              class="text-decoration-underline text-primary" data-bs-toggle="modal"
              data-bs-target="#instructions">disini</span> | <span class="small text-danger mb-4">* Wajib Diisi</span></span><br>
            <span class="small text-muted mb-4">Untuk melihat rekomendasi vaksin booster klik <span role="button" class="text-decoration-underline text-primary" data-bs-toggle="modal" data-bs-target="#table-vaksin">disini</span></span>
        </div>

        <!-- Modal Table Vaksin -->
        <div class="modal fade" id="table-vaksin" tabindex="-1" aria-labelledby="table-vaksin" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="table-vaksin">Rekomendasi vaksin 3 (Booster)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table caption-top">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Vaksin 1</td>
                                    <td>Vaksin 2</td>
                                    <td>Vaksin 3 (Booster)</td>
                                    <td>Efektivitas</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <th>1</th>
                                  <th>Sinovac</th>
                                  <td>Sinovac</td>
                                  <td>Sinovac</td>
                                  <td>70,89%</td>
                                </tr>
                                <tr>
                                  <th>2</th>
                                  <th>Sinovac</th>
                                  <td>Sinovac</td>
                                  <td>AstraZeneva</td>
                                  <td>90,53%</td>
                                </tr>
                                <tr>
                                  <th>3</th>
                                  <th>Sinovac</th>
                                  <td>Sinovac</td>
                                  <td>Pfizer</td>
                                  <td>93,18%</td>
                                </tr>
                                <tr>
                                  <th>4</th>
                                  <th>AstraZeneca</th>
                                  <td>AstraZeneca</td>
                                  <td>AstraZeneca</td>
                                  <td>Antibodi 3x Lipat</td>
                                </tr>
                                <tr>
                                  <th>5</th>
                                  <th>AstraZeneca</th>
                                  <td>AstraZeneca</td>
                                  <td>Pfizer</td>
                                  <td>Antibodi 25x Lipat</td>
                                </tr>
                                <tr>
                                  <th>6</th>
                                  <th>AstraZeneca</th>
                                  <td>AstraZeneca</td>
                                  <td>Moderna</td>
                                  <td>Antibodi 32x Lipat</td>
                                </tr>
                                <tr>
                                  <th>7</th>
                                  <th>Pfizer</th>
                                  <td>Pfizer</td>
                                  <td>Pfizer</td>
                                  <td>Antibodi 5x Lipat</td>
                                </tr>
                                <tr>
                                  <th>8</th>
                                  <th>Pfizer</th>
                                  <td>Pfizer</td>
                                  <td>AstraZeneca</td>
                                  <td>Antibodi 8x Lipat</td>
                                </tr>
                                <tr>
                                  <th>9</th>
                                  <th>Pfizer</th>
                                  <td>Pfizer</td>
                                  <td>Moderna</td>
                                  <td>Antibodi 11x Lipat</td>
                                </tr>
                                <tr>
                                  <th>10</th>
                                  <th>Moderna</th>
                                  <td>Moderna</td>
                                  <td>Moderna</td>
                                  <td>Antibodi 8x Lipat</td>
                                </tr>
                                <tr>
                                  <th>11</th>
                                  <th>Moderna</th>
                                  <td>Moderna</td>
                                  <td>Pfizer</td>
                                  <td>Antibodi 10x Lipat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="instructions" tabindex="-1" aria-labelledby="kode_vaksin_3" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kode_vaksin_3">Cara melihat kode vaksin 3</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 clearfix">
                                <img class="img-fluid" src="./images/1.JPEG">
                            </div>
                            <div class="col-6 clearfix">
                                <p style="font-size: 14px;">
                                    <b>Buka aplikasi PeduliLindungi, dan masuk dengan akun yang sudah terdaftar.</b>
                                </p>
                            </div>
                        </div>
                
                        <hr class="mx-5">

                        <div class="row">
                            <div class="col-6 clearfix">
                                <img class="img-fluid" src="./images/2.PNG">
                            </div>
                            <div class="col-6 clearfix">
                                <p style="font-size: 14px;">
                                    <b>Setelah itu masuk ke profil dengan mengklik tulisan "Hai (nama lengkap)" di bagian atas.</b>
                                </p>
                            </div>
                        </div>  

                        <hr class="mx-5">

                        <div class="row">
                            <div class="col-6 clearfix">
                                <img class="img-fluid" src="./images/3.PNG">
                            </div>
                            <div class="col-6 clearfix">
                                <p style="font-size: 14px;">
                                    <b>Untuk informasi terkait vaksinasi dosis ketiga dan tiket vaksinasi yang berisi kode QR dapat dilihat di bagian "Riwayat dan Tiket Vaksin", kemudian klik nama akun.<br></b>
                                </p>
                            </div>
                        </div>    

                        <hr class="mx-5">

                        <div class="row">
                            <div class="col-6 clearfix">
                                <img class="img-fluid" src="./images/4.PNG">
                            </div>
                            <div class="col-6 clearfix">
                                <p style="font-size: 14px;">
                                    <b>Pilih nama peserta peduli lindungi yang muncul di handphone tersebut</b>
                                </p>
                            </div>
                        </div> 

                        <hr class="mx-5">

                        <div class="row">
                            <div class="col-6 clearfix">
                                <img class="img-fluid" src="./images/5.PNG">
                            </div>
                            <div class="col-6 clearfix">
                                <p style="font-size: 14px;">
                                    <b>Dan ini tampilan ketika peserta sudah mempunyai kode/barcode yang ada di aplikasi Peduli Lindungi. </b>
                                </p>
                            </div>
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="before_vaksin_3">

            <label for="tanggal_vaksin">Jenis Vaksin</label>
            <div class="form-group mb-4">
                <input type="radio" name="jenis_vaksin" id="pfizer" value="pfizer" onclick="jenisVaksin('pfizer')">
                <label for="pfizer">Pfizer</label><br>

                <input type="radio" name="jenis_vaksin" id="moderna" value="moderna" onclick="jenisVaksin('moderna')">
                <label for="moderna">Moderna</label><br>

                <input type="radio" name="jenis_vaksin" id="astrazeneca" value="astrazeneca" onclick="jenisVaksin('astrazeneca')">
                <label for="astrazeneca">Astrazeneca</label><br>
            </div>

            <div id="tanggal_vaksin_">
                <label for="tanggal_vaksin">Tanggal Vaksin</label>
                <div class="form-group mb-4">
                    <input id="tanggal_vaksin" readonly="true" name="tanggal_vaksin" autocomplete="off">
                    <span class="small text-danger mb-4">* Wajib Diisi</span>
                </div>
            </div>

            <div id="kedatangan_vaksin_">
                <label for="tanggal_vaksin">Pilih Sesi Kedatangan</label>
                <div class="form-group mb-4">
                    <input type="radio" name="sesi_kedatangan" id="sesi_1" value="Sesi 1">
                    <label for="sesi_1">Sesi 1</label><br>

                    <input type="radio" name="sesi_kedatangan" id="sesi_2" value="Sesi 2">
                    <label for="sesi_2">Sesi 2</label><br>

                    <span class="small text-danger mb-4">* Wajib Diisi</span>
                </div>
            </div>

            <!-- Name -->
            <div class="form-floating">
                <input type="text" class="form-control" name="nama" id="name" placeholder="Masukkan Nama" autocomplete="off">
                <label class="floating-input" for="name">Nama</label>
            </div>
            <div class="mb-4">
                <span class="small text-muted mb-4">Sesuai (e - KTP)</span> | <span class="small text-danger mb-4">* Wajib Diisi</span>
            </div>

            <!-- Tanggal Lahir -->
            <label for="tanggal-lahir">Tanggal Lahir: </label>         
            <div class="row mb-4">
                <!-- Tanggal -->
                <div class="col-4">
                    <select name="tanggal_lahir" id="tanggal-lahir" class="form-control">
                        <?php for ($x = 1; $x <= 31; $x++) { ?>
                            <option value="<?php echo $x ?>">
                               <?php echo $x ?>
                            </option>
                        <?php }?>  
                    </select>
                </div>
                <!-- Tanggal -->

                <!-- Bulan -->
                <div class="col-4">
                    <select name="bulan_lahir" id="bulan-lahir" class="form-control">
                        <?php
                            $bln = ['Januari', 'Februari' , 'Maret' , 'April' , 'Mei' , 'Juni' , 'Juli' , 'September' , 'Agustus' , 'Oktober' , 'November' , 'Desember'];
                            foreach($bln as $key => $val){ ?>
                                <option value="<?= $key + 1; ?>"><?= $val ?></option>
                            <?php }?>
                    </select>
                </div>
                <!-- Bulan -->

                <!-- Tahun -->
                <div class="col-4">
                    <input type="text" class="form-control" maxlength="4" size="4" name="tahun_lahir" id="tahun_lahir" placeholder="Masukkan Tahun Lahir" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                </div>
                <!-- Tahun -->

            </div>

            <!-- NIK -->
            <div class="form-floating">
                <input type="text" name="nik" maxlength="16" class="form-control" id="nik" placeholder="Masukkan NIK" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                <label class="form-floating-text" for="nik">NIK</label>
            </div>
            <div class="mb-4">
                <span class="small text-muted">NIK dari KK (12-17 tahun), NIK KTP (18+)</span> | <span class="small text-danger mb-4">* Wajib Diisi</span>
            </div>

            <!-- Nomor Telpon -->
            <div class="form-floating">
                <input type="text" class="form-control" maxlength="13" minlength="10" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                <label class="form-floating-text" for="no_hp">Nomor Telpon</label>
            </div>
            <div class="mb-4">
                <span class="small text-muted m-0">Nomor Handphone bisa WA dan SMS</span> | <span class="small text-danger mb-4">* Wajib Diisi</span>
            </div>

            <!-- Informasi -->
            <div class="mt-5">
                <h6>Mohon perhatikan poin-poin berikut sebelum datang ke lokasi vaksin :</h6>
                <ol>
                    <li>Wajib membawa dokumen:</li>
                    <ul>
                        <li>12 - 17 tahun: KK/KIA</li>
                        <li>18+ tahun: e-KTP</li>
                        <li>Untuk peserta vaksinasi dosis 2, wajib membawa bukti vaksinasi dosis 1</li>
                    </ul>
                    <li>Layanan akan dibuka sesuai jadwal:</li>
                    <ul>
                        <li>Sesi 1: pukul 08.00 - 12.00 WIB</li>
                        <li>Sesi 2: pukul 13.00 - 15.00 WIB</li>
                    </ul>
                    <li>Peserta yang tidak datang pada hari yang ditentukan, dianggap membatalkan pendaftaran secara otomatis</li>
                    <li>Vaksin hanya akan diberikan kepada peserta yang sudah mendaftar</li>
                    <li>Peserta wajib menjaga protokol kesehatan. Apabila tidak mematuhi, vaksin tidak dapat diberikan.</li>
                    <li>Peserta harus dalam kondisi sehat</li>
                    <li>Peserta penyandang disabilitas wajib disertai pendamping dan menginformasikan ke panitia</li>
                </ol>
            </div>

            <!-- Button -->
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary me-3">Daftar Vaksinasi</button>
            </div><br>
        </div>
    </form>

    <!-- Date Picker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>    

    <script type="text/javascript">
        let minDate = new Date(2022, 01, 08);
        let maxDate = new Date(2022, 02, 05);
        $('#tanggal_vaksin').datepicker({
          minDate,
          maxDate,
          disableDates: [
            "2022/02/13", "2022/02/14", "2022/02/20", "2022/02/21",
            "2022/02/27", "2022/02/28"],
          format: 'yyyy-mm-dd'
        });

        $("#before_vaksin_3").hide()
        $("#tanggal_vaksin_").hide()
        $("#kedatangan_vaksin_").hide()        

        const kodeVak = () => {
            const value = $("#kode_vaksin_3").val();

            const regex = /[a-zA-Z0-9][-]+/g
            if(value.match(regex) && value.length == `10`) {
                $("#before_vaksin_3").show()
            } else {
                $("#before_vaksin_3").hide()
            }
        }

        const jenisVaksin = (vaksin) => {
          const valJenisVaksin = $(`#${vaksin}`).val()
          if(valJenisVaksin) {
            $("#tanggal_vaksin_").show()
            $("#kedatangan_vaksin_").show()
          } else {
            $("#tanggal_vaksin_").hide()
            $("#kedatangan_vaksin_").hide()
          }
        }
        
        setTimeout(() => {
          let notif_error = $("#duration_notif_error")
          let notif_success = $("#duration_notif_success")
          if (notif_error){
            $("#duration_notif_error").remove()
          }
          if (notif_success){
            $("#duration_notif_success").remove()
          }
        },5000)

    </script>

<?= $this->endSection('content'); ?>