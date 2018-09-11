<?php

//Lib
include __DIR__.'\Lib\LoadFile.php';
include __DIR__.'\Lib\Generic.php';

//OneOff
include __DIR__."\OneOff\UI.php";


$m_file =new LoadFile;
$m_g    =new Generic;
$m_ui   =new UI;



//ファイル読み込み
$m_file->Load($_POST["tFile"]);
$hoge=$_POST["tFile"];

$m_g->Br(3);

//データ分割
$m_file->SplitCSV();

//検索(結果込み)
SearchData($inputData=$_POST["tData"],$m_file,$m_ui,$m_g);

//該当の属する行を表示
if($m_file->GetHitLineData()) print_r($m_file->GetHitLineData());
else                          print('検索結果なし');

$m_g->Br(3);


//@検索関数
function SearchData($_tData,$_file,$_ui,$_general)
{

$_ui->UI_SearchTarget($_tData);

$_general->Br();

$result=$_file->SearchData($_tData);

if($result) $_ui->UI_SearchResult($_file);
else        echo "該当項目なし";

$_general->Br(2);

}