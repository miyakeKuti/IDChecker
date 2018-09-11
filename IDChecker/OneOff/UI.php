<?php


class UI{



    //@検索データ(id)
    public function UI_SearchTarget($_tData)
    {
        echo "検索データ : "."'".$_tData."'";
    }

    //@検索結果
    public function UI_SearchResult($_file)
    {

        echo
        "該当項目あり=>> ".
        "該当数 : ".
        $_file->GetHitCnt();

        echo nl2br("\n");
        echo nl2br("\n");

        for($i=0;$i<$_file->GetHitCnt();$i++)
        {

            echo
            "列 : "      .$_file->GetHitRow($i)   .nl2br("\n").
            "行 : "      .$_file->GetHitLine($i)  .nl2br("\n");

            echo nl2br("\n");
        }



    }


}


class Debug{

    public function D_ServerDetail()
    {
       
        print "<PRE>";
        print_r($_SERVER);
        print "</PRE>";
    }
}