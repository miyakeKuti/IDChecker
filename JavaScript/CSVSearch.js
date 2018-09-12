 //phpからデータを取得
 $(function()
 {
     $("#ID_button").click(
         function()
         {

            //formの要素を受け取る
            var $inputTFData=$('#ID_tData');
            var $inputTFile=$('#ID_tFile');

             //phpからのデータを受け取る
            $.post(
            'http://localhost:24576/?XDEBUG_SESSION_START=5DFA3D08\index.php'   ,                    //url
            {tData:$inputTFData.val(),tFile:$inputTFile.val()}                  ,                    //(PHPに)送信データ
            function(_data,_testStatus)                                                                //phpからのコールバック（PHPでechoしたものが返ってくる）
            {
                //通信成功
                // if(testStatus=='success')
                // {
                //     $('#GetPHP').text('読み込み成功');
                // }
                // else $('#GetPHP').text('読み込み失敗');
                 $('#ID_result').html(_data);
                
                //$("#ID_button").text(data);
            } );
            

         } );
 });

