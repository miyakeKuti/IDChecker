//============================
//イベント
//============================
$(document).ready(
    function()
    {

        FormExtend('#ID_tData');
        FormExtend('#ID_tFile');
    }
);


//=============================
//関数
//=============================

//@formの機能を拡張した関数
function FormExtend(_id)
{
    var defo_col    ={color:'#cccccc'};
    var focus_col   ={color:'#000000'};
    var selector    =$(_id);

    //初期色をセット
    selector.value;
    selector.css(defo_col);

    //フォーカスが当たったとき
    selector.focus(
        function()
        {
            
            //初回のみ
            if($(this).val()==this.defaultValue)
            {
               
                $(this).val('');        //valueを空に
                $(this).css(focus_col); //formに表示する文字の色を変更
            }
        }
    );

    //フォーカスが外れたとき
    selector.blur(
        function()
        {
           
            if($(this).val()==this.defaultValue||$(this).val()=='')
            {
                //$(this).css('font-size', '+=8');
                $(this).val(this.defaultValue);
                $(this).css(defo_col);
            }
        }
    );

}

 //スクリプトエラーが出てる模様
