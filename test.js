//ブラウザに文字表示
document.write("sample\n");

 //クリックイベントテスト
 $(function()
 {
     $('#testJS').click(function()
     {
         $(this).text("クリックされました。");
     });
 });


 //マウスオーバーイベント
 $(function()
 {
    $('#testJS').mouseover(function()
    {
        $(this).text("マウスが上に乗りました。");
        $(this).css('cursor','wait');
        $(this).css('font-size', '+=8');
    });
 });


 //マウスアウトイベント
 $(function()
 {
    $('#testJS').mouseout(function()
    {
        $(this).text("マウスが外れました。");
        $(this).css('font-size', '-=8');
    });
 });

 
 //phpからデータを取得
 $(function()
 {
     $("#buttonID").click(
         function()
         {

            //$(this).text("クリックされたZEEEEE");

             //phpからのデータを受け取る
            $.get(
            'http://localhost:24576/?XDEBUG_SESSION_START=5DFA3D08\index.php',                    //url
            {hoge:"共有のデータ"},
            function(data,testStatus)       //phpからのデータを受け取る
            {
                //通信成功
                // if(testStatus=='success')
                // {
                //     $('#GetPHP').text('読み込み成功');
                // }
                // else $('#GetPHP').text('読み込み失敗');
                 $('#buttonID').html(data);
                
                //$("#buttonID").text(data);
            } );
            

         }
     )
 })

