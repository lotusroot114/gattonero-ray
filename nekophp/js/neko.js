    //DocumentFragmentを作る（追加するli要素の塊を作って一回で追加する）
    var df = document.createDocumentFragment();

    //　　　　　ピンクpadとグレーpadの数が$counterの数によって可変になるロジック                
    //$counterの数だけli要素を作ってdfに追加
    for (var i = 0; i < 5; i++) {
      var li = document.createElement('li');
//      li.id = 'padpad' + i;
      //         タグとして認識させるためにinnerHTMLを指定 
      if (n > 0) {
        li.innerHTML = '<img src="image/pinkpad.png" alt="" width="80" height="80">';
        n--;
      } else {
        li.innerHTML = '<img src="image/graypad.png" alt="" width="80" height="80">';
      }
      df.appendChild(li); //dfに追加
    }

    //        ピンクpadだけ増えるロジック
    //        while(i > 0){
    //        var li = document.createElement('li');
    ////         タグとして認識させるためにinnerHTMLを指定 
    //        li.innerHTML = '<img src="image/pinkpad.png" alt="" width="80" height="80">' ;	
    //        df.appendChild(li);//dfに追加
    //        i--
    //     }

    //liを追加するul要素を取得
    var padNode = document.getElementById("padlist");
    //原本のDocumentFragmentでなく、同じものを作って追加
    var result = padNode.appendChild(df.cloneNode(true));


    //submit()でフォームの内容を送信

    //気分ゲージが5つ以上の場合
      
    if (k >= 5) {
        
        //    ３つの選択肢のボタン自体を消す
        //    pc表示用のaタグもformクラスに含まれているので消える
        var elements = document.getElementsByClassName("form");
        for (var i = 0; i < elements.length; i++) {
//            console.log(elements.length);
            var e = elements[i];
        if (e) {
            e.parentNode.removeChild(e);
            }
        };
                
      //イベントをキャンセル クリックできないようにする
//      document.getElementById("form1").addEventListener("click", function(e) {
//        e.preventDefault();
//      }, false);
//      document.getElementById("form2").addEventListener("click", function(e) {
//        e.preventDefault(); //同上
//      }, false);
//      document.getElementById("form3").addEventListener("click", function(e) {
//        e.preventDefault(); //同上
//      }, false);
      //見た目もグレーアウト
//      document.getElementById("op1").style.opacity = 0.7;
//      document.getElementById("op2").style.opacity = 0.7;
//      document.getElementById("op3").style.opacity = 0.7;

        //pタグを消す
        //while内の処理のみだとなぜか2つ目の<p>タグの取得をスキップしてしまう
        //removeChildを挟まずcolsole.logのみだと2つ目も表示されるので原因不明
        //そのためwhile1ループ目で1つ目と3つ目の<p>タグ、while2ループ目で2つ目の<p>タグを削除している
    var count = 0;
    while(count < 2){
        var elements = document.getElementsByTagName("p");
//        var j = elements.length;
        for (var i = 0; i < elements.length; i++) {
        var e = elements[i];
//      console.log(e.parentNode.tagName);
//      console.log(j);
//      console.log(i);
//      console.log(elements[i]);
//      console.log(elements[i].innerHTML); 
        if (e) {e.parentNode.removeChild(e);}
        };
    count++    
    }

        //スマホ、タブレット用aタグを消す getElementsByTagNameだとスキップされるのでクラス名で取得
        var elements = document.getElementsByClassName("smartphone");
        for (var i = 0; i < elements.length; i++) {
        var e = elements[i];
        if (e) {e.parentNode.removeChild(e);}
        };
        
//      遷移前にゲージをアニメーションさせる                
        var obj = document.getElementById("padlist");  
        obj.classList.add('padClass');
//        var list = obj.classList;
//        console.log(list);
        
//        3秒後に遷移
       setTimeout(function() {
        document.myform.submit();
      }, 3000);
    }
    //    })
