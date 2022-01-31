<!doctype html>
<html lang="en" class="h-100">
 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
        <title>Form Pendaftaran Vaksin YCAB</title>
    </head>
   
    <body class="d-flex flex-column h-100">
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
        <div class="container my-5">
            <div class="card p-2">
                <!-- Image -->
                <div class="row justify-content-center">
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>

                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                    <div class="col-2 clearfix justify-content-center">
                        <img class="img-fluid" src="../images/download.png" alt="Jakarta">
                    </div>
                </div>

                <hr class="mx-5">

                <div class="d-flex justify-content-center flex-column align-items-center">
                    <img class="img-fluid mb-4" src="../images/download.png" alt="Jakarta">
                    <h4>Selamat Datang!</h4>
                    <p>Formulir Pendaftaran i-SERVE Vaccine Jakarta</p>
                    <p>Silahkan Cek Data Anda!</p>
                </div>

                <hr class="mx-5">

                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="duration_notif_error">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <strong><?php echo session()->getFlashdata('message'); ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>    

                <form method="post" action="<?= base_url('peserta/result_cek_data') ?>" class="px-2">
                    <?= csrf_field(); ?>
                    <!-- NIK -->
                    <div class="form-floating">
                        <input type="text" name="nik" maxlength="16" class="form-control" id="nik" placeholder="Masukkan NIK" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        <label class="form-floating-text" for="nik">NIK</label>
                    </div>
                    <div class="mb-4">
                        <span class="small text-muted">NIK dari KK (12-17 tahun), NIK KTP (18+)</span> 
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-3">Cek Data</button>
                        <a href="<?= base_url('peserta') ?>"><button type="button" class="btn btn-primary me-3">Kembali</button></a>
                    </div>
                </form>

                <!-- Date Picker -->
                <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>    

                <script type="text/javascript">
                    
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
            </div>
      </div>

      <footer class="footer mt-auto py-3" style="background-color: #e4e4e4">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>
   
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    </body>
 
</html>