<?php
include("config.php");
    if (isset($_POST['login'])) {
        $log_email=$_POST['login_email'];
        $log_pass=$_POST['login_password'];

        $login="SELECT * from `register` where email='$log_email'";
        $run_reg=mysqli_query($connection,$login);

        if (mysqli_num_rows($run_reg)>0) {
            $log=mysqli_fetch_assoc($run_reg);
            $db_password=$log['password'];
            $pass_verify=password_verify($log_pass,$db_password);

            if ($pass_verify) {
                echo "<script>alert('Login Successfully')
                window.location.href='index.php'</script>
                ";
            }else{
                echo "<script>alert('login unsuccessfully')</script>";
            }
        }
        else{
            echo "<script>alert('Invaild password')</script>";
        }
    }
   
?>
<!-- login form -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login account</h2>

              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Email</label>
                  <input type="email" id="form3Example3cg" name="login_email" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg" >Password</label>
                    <input type="password" id="form3Example4cg" name="login_password" class="form-control form-control-lg" />
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body-white" name="login">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Create account? <a href="#!"
                    class="fw-bold text-body"><u>Register here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>