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
        "該当数 : ".$_file->GetHitCnt()." , ".
        "列 : ".$_file->GetHitRow(0)." , ".
        "行 : ".$_file->GetHitLine(0);


    }


}