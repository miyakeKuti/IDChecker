$(document).ready(
    function()
    {
        var defo_col    ={color:'#999999'};
        var focus_col   ={color:'#000000'};
        var selector    =$('#ID_tFile');

        //初期色をセット
        selector.value
        selector.css(def_css);

        //フォーカス時
        selector.focus(
            function()
            {
                
                if($(this).val()==this.defaultValue)
                {
                    document.write("sample\n");
                    $(this).val('');
                    $(this).css(focus_col);
                }
            }
        );

        selector.blur(
            function()
            {
                if($(this).val()==this.defaultValue||($this).val()=='')
                {
                    $(this).val(this.defaultValue);
                    $(this).css(def_css);
                }
            }
        )

    }
);


 //マウスオーバーイベント
 $(function()
 {
    $('#ID_tFile').mouseover(function()
    {
        $(this).text("マウスが上に乗りました。");
        $(this).css('cursor','wait');
        $(this).css('font-size', '+=8');
    });
 });