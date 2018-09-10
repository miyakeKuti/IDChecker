<?php

class Generic
{

    //=====================
    // 関数
    //=====================

    //@改行コードを返す関数
    public function Br($num=1){

        for($i=0;$i<$num;$i++) echo nl2br("\n");
    }
}