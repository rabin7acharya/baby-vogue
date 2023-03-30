<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact US</title>
    <script src="https://kit.fontawesome.com/b7ad2a2652.js" crossorigin="anonymous"></script>

    <style>
        .container {
            position: relative;
        }

        .text-block {
            position: absolute;
            vertical-align: middle;
            width: 45%;
        }

        .text-block h1 {
            margin-top: 70px;
            font-size: 50px;
            font-weight: bold;
            text-align: center;
        }



        .img-block {
            position: absolute;
            width: 50%;
            height: 80%;
            left: 50%;
        }

        .para {
            position: absolute;
            line-height: 35px;
            display: table;
            width: 110%;
            box-shadow: 2px 2px 7px #cbcecf, -2px -2px 7px #ffffff;
        }

        .col {
            display: table-column;

        }

        .row {
            display: table-row;
        }

        .para p {
            display: table-cell;
            margin-right: 10px;
            padding-bottom: 20px;
        }

        .para i {
            color: #34D69F;
            text-align: center;
            font-size: xx-large;
            display: table-cell;
            padding: 20px 0px 20px 50px;

        }

        .footer {
            position: relative;
            margin-top: 40%;
        }
    </style>
</head>

<body>
    <?php require 'header.php' ?>

    <div class="container">
        <div class="img-block">
            <img src="source/images/contact-us.png" alt="About Us" style="width: 90%; float: left;" />
        </div>
        <div class="text-block">
            <h1>Contact Us</h1>
            <div class="para">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="row">

                    <div style="padding-left: 50px;"><i class="fas fa-map-marker-alt"></i></div>
                    <i class="fas fa-phone"></i>
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="row" style="text-align: center;">
                    <p>
                    New Road 
                        <br />New Road Complex first floor, 33770
                        <br />
                    </p>
                    <p style="padding-left: 50px;">
                        <abbr title="Phone"><b>Phone</b></abbr>: (123) 456-7890
                    </p>
                    <p style="text-decoration: none; padding-left: 50px;">
                        <abbr title="Email"><b>Email</b></abbr>:
                        <a href="mailto:name@example.com" style="color: #355D94;">contactus@MamasZone.com </a>
                    </p>
                </div>
            </div>
            <iframe style="position: static; margin:200px 0px 0px 50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.7494361634435!2d83.98346261744385!3d28.2149243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39959587f0afa59d%3A0xb3d840968dae5ee6!2sNew%20Road%20Complex!5e0!3m2!1sen!2snp!4v1680012070224!5m2!1sen!2snp" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
    </div>
    </div>
    </div>
</body>

</html>