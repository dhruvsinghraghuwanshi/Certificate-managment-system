<?php
include "config.php";
session_start();
if (isset($_GET['cid'])) {
    require "admin/include/db.php";
    $query=$db->prepare('SELECT * from details where id=?');
    $query->execute(array(
        $_GET['cid']
    ));
    // $img_path = "certificate_of_merit.jpg");

    $data=$query->fetchall();
    $count=sizeof($data);
    if ($count<=0) {
        header('location:./');
        $_SESSION['no_record_found']=true;
    }
}
else {
    header('location:./');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Certificate |Shail Kumari Commercial Institute</title>
    <!-- seo tags start -->
    <meta name="description" content="This is certify that <?php echo $data[0]['name'] ?> has participated in <?php echo $data[0]['issuedFor'] ?> that was held on <?php echo date_format(date_create($data[0]['event_date']),"d-m-Y") ?> by Get certified by participating in different events organised at Shail Kumari Commercial Institute<?php if($data[0]['position']!="none"){?> and got <?php echo $data[0]['position'] ?> position."><?php } ?>
    <meta property="og:title" content="Verify Your Certificate |Shail Kumari Commercial Institute" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $base_url.$data[0]['id'] ?>" />
    <meta property="og:image" content="<?php echo $base_url?><?php if ($data[0]['type']=="Participation") {
        echo 'participation_certificate_ikgptu.php?cid='.$data[0]['id'];
    }elseif ($data[0]['type']=="Merit") {
        echo 'merit_certificate_ikgptu.php?cid='.$data[0]['id'];   
    } ?>" />
    <meta property="og:image:width" content="526" />
    <meta property="og:image:height" content="275" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:description" content="This is certify that <?php echo $data[0]['name'] ?> has participated in <?php echo $data[0]['issuedFor'] ?> that was held on <?php echo date_format(date_create($data[0]['event_date']),"d-m-Y") ?> by Get certified by participating in different events organised at Shail Kumari Commercial Institute<?php if($data[0]['position']!="none"){?> and got <?php echo $data[0]['position'] ?> position." /><?php } ?>
    <meta property="og:site_name" content="Verify Your Certificate |Shail Kumari Commercial Institute " />
    <!-- seo tags ends -->
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boot strap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- typing script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
</head>

<body>
    <div class="logo">
        <ul>
            <li>
                <img src="./assets/images/logo.png" alt="Shail Kumari Commercial Institute">
            </li>
        </ul>
    </div>
    <div class="main-container">
        <div class="main-heading">
            <h1>
            ShailKumari Commercial Institute
            </h1>
        </div>
        <div class="certificate-box col-lg-10">
            <div class="card">
                <div class="row g-0">
    <!-
                    <div class="col-md-12">
                        <div class="card-body">
                            <h2>Certificate of <?php echo $data[0]['type'] ?>
                            </h2>
                            <p>
                            This is to certify that <b><?php echo $data[0]['name'] ?></b> has participated in <b><?php echo $data[0]['issuedFor'] ?></b>
                            that was held on <b><?php echo date_format(date_create($data[0]['event_date']),"d-m-Y") ?></b>
                            by <b>ShailKumari Commercial Institute</b> <?php if ($data[0]['position']!="none") {?>
                                and got <b><?php echo $data[0]['position'] ?></b> position.
                            <?php } ?>
                            <p>Issue Date:
                                <?php echo date_format(date_create($data[0]['issuedOn']),"d-m-Y")?>
                            </p>
                            <div class="social-tray">
                                
                                <input type="text" id="link" value="<?php echo $base_url.$data[0]['id']?>" disabled> 
                                <!-- <input type="text" id="blah" value="<?php echo $img_path?>" disabled> -->
                                <span class="copy-link">
                                    <i class="fa-solid fa-clipboard"></i>
                                </span>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <footer class="footer">
        <p>
        © <?php echo date('Y')?> Copyright Reserved with <a href="https://tecetriz.com" target="_blank">tecentriz</a><br> </p>
    </footer>
    <!-- custom script file -->
    <script src="./assets/js/main.js"></script>
</body>

</html>