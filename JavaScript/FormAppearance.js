//============================
//イベント
//============================

//常時
$(document).ready(
    function()
    {

        Form_Extend('#ID_tData');
        Form_Extend('#ID_tFile');

        Form_AutoSelect('#ID_tData');
        Form_AutoSelect('#ID_tFile');
    }
);




//=============================
//関数
//=============================

//@formの機能を拡張した関数
function Form_Extend(_id)
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

//formにマウスカーソルを当てる自動で選択状態に
function Form_AutoSelect(_id)
{
    $(_id).mouseover(
        function()
        {
            $(this).select();
        }
    );
}
