
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" href="css/form.css">
  <title>UIU Event Management</title>
</head>

<body>
  <!-- Navigation Bar -->
  <?php require 'includes/nav.php'; ?>

  <section class="book-event" style="background-color: white;padding-top: 110px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          
          <div class="content"> 
 
          <form action="login_help.php" method="POST" >
            <div class="title"><h3>Login</h3></div>
              <div class="user-details">
                <div id="center" style = "padding-left: 35%;width: 100%;">
                <div class="form-group">
                  <span class="details"  style="font-size: 16px;font-weight: 600;">Email</span>
                  <input type="text" name="email" class="form-control" placeholder="User Email" style = "text-transform: none;"required>
                </div>
                
                <div class="form-group">
                  <span class="details "  style="font-size: 16px;font-weight: 600;">Password</span>
                  <input type="password" name="password" class="form-control" placeholder="Password" style = "text-transform: none;" required>
                </div>
                </div>
                
                
                
              </div>
              <div class="button">
              <input type="submit" value="Login" >
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- --------------------------- Footer ------------------------------- -->

  <?php require 'includes/footer.php'; ?>


  <!-- ---------------------------Footer Close------------------------------- -->
</body>

</html>