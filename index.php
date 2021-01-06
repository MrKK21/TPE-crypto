<?php

    if(isset($_POST["validate"])){
        $code = $_POST["text"];
        $key = openssl_random_pseudo_bytes(64);
        
        
        $plaintext = $code;
        $cipher = "aes-256-gcm";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
            //store $cipher, $iv, and $tag for decryption later
            $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
            //echo $original_plaintext."\n";
            //echo $ciphertext."\n";
        }
                
            }

?>

<html>
    <head>
       <title>Encryption and Decryption User Data using Crypt class in Laravel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
  <style>
    h2.title {
        background: #104880;
        padding: 10px;
        text-align: center;
        color: #fff;
        border-radius: 5px;
        border-bottom: solid 7px #112233;
    }
    .my-form {
        border: solid 1px #123;
        padding: 30px;
        border-radius: 5px;
        margin: 5px;
    }
    .a {
        margin: 10px;
    }
    li.error {
        color: #e60e0e;
        font-weight: 600;
        list-style: none;
    }
    .has-error .form-control {
        border-color: #e41814;
    }
    
  </style> 
    </head>
    <body>
            <div class="container">
              <h2 class="title">Encryption and Decryption User Data</h2>
              <div class="row">
                <div class="col-md-4 my-form">
                <form method="post">
                    <div class="a">
                        <label for="file">Chiffrez vos fichier</label>
                        <input type="file" class="form-control" name="text" id="text">
                    </div>  
                    <button type="submit" class="btn btn-primary" name="validate">Submit</button>
                </form>
                <form method="post">
                    <div class="a">
                        <label for="text">Chiffrez un texte</label>
                        <label for="text">Entrez votre texte</label>
                        <input type="text" class="form-control" name="text" id="text">
                    </div>  
                    <button type="submit" class="btn btn-primary" name="validate">Submit</button>
                </form>
                </div>  
              </div>
            </div>
            <h2 class="title">
            <?php
            echo $ciphertext."\n";
            ?>
            </h2>
    </body>
</html>
