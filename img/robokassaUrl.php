<?php
$mrh_login = "test";      // your login here
$mrh_pass1 = "securepass1";   // merchant pass1 here

// order properties
$inv_id    = time();        // shop's invoice number
// (unique for shop's lifetime)
$inv_desc  = $_POST['desc'];   // invoice desc
$out_summ  = $_POST['price'];   // invoice summ

// build CRC value
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

// build URL
echo "https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&".
    "OutSum=$out_summ&InvId=$inv_id&Desc=$inv_desc&SignatureValue=$crc";