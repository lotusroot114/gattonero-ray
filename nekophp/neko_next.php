<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>ねことあそぶ</title>
<!--        <meta name="viewport"  content="width=750">-->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

</head>

<body>
  <div class="wrapper">
    <div class="main">
      <div class="gauge">
        <?php
//        echo "<p>ねこのきぶんゲージ　";
      $counter = $_POST['count'];
//          値取得確認用
//          if( $counter == 0 && $_POST['firsttime'] == 1){
//            echo $counter;
        echo "<p>きげんがいいとゲージがふえるよ！5つたまると...?</p>";
//          }
//          else{
//            echo $counter;  
//              echo "</p>";
//          }
    ?>
        <div class="pad">
          <ul id="padlist">
            <!--
          <li><img src="image/graypad.png" alt="" width="80" height="80"><li>
         <li><img src="image/graypad.png" alt="" width="80" height="80"><li>
          <li><img src="image/graypad.png" alt="" width="80" height="80"><li>
-->
          </ul>
        </div>

        <?php

    if ( $_POST['play'] == 1 ) {
      echo "<p>おもちゃをふった";
    }else if ( $_POST['play'] == 2 ) {
      echo "<p>えさをあげた";
    }else{
      echo "<p>なでた";
    }    
    echo "　";
            
///////////////////////////////////
//        重み付け抽選を採用する    
//                              
//        $neko_kibun 
//        10% とてもいい
//        20% わるい
//        30% ふつう
//        40% いい
//////////////////////////////////
        
        
function array_rand_weighted($entries){
        
    $sum      = array_sum($entries);
    $rand     = mt_rand(1, $sum);
  
    foreach($entries as $weight) {
        if (($sum -= $weight) < $rand) return $weight;
    }
}
        
        
$targets  = array(4,3,2,1); 
$neko_kibun = array_rand_weighted($targets);
//確認用
//echo $neko_kibun;
        

        
//$result = array();
//for($i=0; $i<1000; $i++){
//    $key = array_rand_weighted($targets);
//    @$result[$key]++;
//}
//print_r($result);
//        
//動作確認結果　確率通りに分布していることを確認
//  Array ( [4] => 387 [3] => 301 [2] => 197 [1] => 115 )
              
              
              
    echo "きげんは";      
        
    if ( $neko_kibun == 1 ) {
            echo "とてもいいみたい！</p>";  
             
    }else if ( $neko_kibun == 2 ) {
            echo "わるいみたい...シャー！！</p>";

    }else if ( $neko_kibun == 3 ) {
            echo "ふつうみたい</p>";
    }else { //$neko_kibun ==4
            echo "いいみたい！</p>";

    }
          
    ?>
      </div>

  <div class="mainimg">
   <div class="gazou">
          <?php
//    気分がとてもよいor よいとき
    if ( $neko_kibun == 1 || $neko_kibun == 4 ) {       
      if( $neko_kibun == 1 ){
        $counter = $counter + 2;    
      }else{                
        $counter = $counter + 1;           
      }
      if( $_POST['play'] == 1 ){
        echo "<img src='image/DSCN2237.jpg' class='tateimg' height='458' width='336'>";
      }else if($_POST['play'] == 2){
        echo "<img src='image/IMG_2023.JPG' class='yokoimg' width='458' height='336'>";
      }else{
        echo "<img src='image/s-DSCN1988.jpg' class='yokoimg' width='458' height='336'>";
      }
      
//    気分がふつうのとき
    }else if( $neko_kibun == 3){
      if( $_POST['play'] == 1 ){
        echo "<img src='image/small_DSC05627.jpg' class='yokoimg' width='458' height='336'>";
//      }else if($_POST['play'] == 2){
//        echo "<img src='image/IMG_0833.JPG' class='tateimg'>";
      }else{
        echo "<img src='image/IMG_0833.JPG' class='tateimg' height='458' width='336'>";
      }
//    気分がわるいとき 
    }else{  //$neko_kibun == 2
//    カウンターが1以上の時だけ-１  
        if( $counter > 0){ 
            $counter = $counter - 1;
        }
        echo "<img src='image/IMG_0942.JPG' class='yokoimg' width='458' height='336'>";
    }
    
    echo "<br />";

    //$counterの内容に応じて処理を変更 下部のscript参照        
    //ケージが満タンになったら最終ページへリダイレクト 
    ?>
    </div>
        <p>つぎはどうする？</p><br class="pcbr">
    </div>
  </div>

    <div class="form">
      <!--    aタグでpostする-->
      <div id="op1">
        <form name="form_name1" method="POST" action="neko_next.php">
          <input type="hidden" name="play" value=1>
          <!--            値のPOSTではechoをつける-->
          <input type="hidden" name="count" value="<?php echo $counter ?>">
          <!--            <input type="hidden" name="firsttime" value=0>-->
          <a href="javascript:form_name1.submit()" id="form1"><img src="image/238039.png" width="100" height="100" alt=""></a>
        </form>
        <p>おもちゃをふる</p>
      </div>
      <div id="op2">
        <form name="form_name2" method="POST" action="neko_next.php">
          <input type="hidden" name="play" value=2>
          <!--            値のPOSTではechoをつける-->
          <input type="hidden" name="count" value="<?php echo $counter ?>">
          <!--            <input type="hidden" name="firsttime" value=0>-->
          <a href="javascript:form_name2.submit()" id="form2"><img src="image/1571426.png" width="100" height="100" alt=""></a>
        </form>
        <p>えさをあげる</p>
      </div>
      <div id="op3">
        <form name="form_name3" method="POST" action="neko_next.php">
          <input type="hidden" name="play" value=3>
          <!--            値のPOSTではechoをつける-->
          <input type="hidden" name="count" value="<?php echo $counter ?>">
          <!--            <input type="hidden" name="firsttime" value=0>-->
          <a href="javascript:form_name3.submit()" id="form3"><img src="image/tukamu_free.png" width="100" height="100" alt=""></a>
        </form>
        <p>なでる</p>
      </div>
      <br>
      <a href="index.html" class="pc">さいしょからやる</a>
    </div>
    <a href="index.html" class="smartphone">さいしょからやる</a>
    <form name="myform" action="neko_last.php">
      <!--      <input type="hidden" name="mytext">-->
    </form>
    <br>

  </div>

  <script>
    //        ねこのきぶんゲージ

    //phpの$counterをjavascriptへ渡す
    var j = "<?php echo $counter ?>";
    //値の取得とstringであることを確認
    //        console.log(typeof j);
    //        console.log(j);
    //stringからnumberに変換
    var k = Number(j);
    //        console.log(typeof k);
    //        console.log(k);
    //loop カウント用
    if (k > 5) {
      var n = 5;
    } else {
      var n = k;
    }
    //あとはデバッグのため外だし

  </script>
    <script src="js/neko.js">
    </script>
    

</body>

</html>
