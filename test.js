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
    });
 });

