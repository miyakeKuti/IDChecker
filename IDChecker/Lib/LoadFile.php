<?php

class LoadFile{

    private $fileData;      //ファイルから読み込んだデータを格納
    private $csvList;       //csv形式の２次元配列を格納
    private $hitList;       //該当項目の列/行を格納
    private $hitCnt;        //該当項目の数を格納
    private $hitLineData;   //該当項目の属する行すべてのデータを格納
    private $fileNameList;      //ファイル名の一覧を格納


    //=====================
    // 関数
    //=====================

    //@ファイル読み込み
    public function Load($_fileName)
    {

        //Lib階層までの絶対パスになるので、一階層上にあげている
        $hoge=__DIR__."\..\Res"."\\".$_fileName;
        $this->fileData = file_get_contents(__DIR__."\..\Res"."\\".$_fileName);

        //BOMデータの削除
        if (ord($this->fileData{0}) == 0xef &&
            ord($this->fileData{1}) == 0xbb &&
            ord($this->fileData{2}) == 0xbf)
        {
            $this->fileData = substr($this->fileData, 3);
        }

        //読み込み結果を返す
        if(!$this->fileData)
        {
            echo "ファイル読み込み : 失敗";
            return false;
        }

        echo "ファイル読み込み : 成功";
        return true;

    }

    //@指定ディレクトリにあるファイル名をすべて取得
    public function LoadFileList($_fileExtension=NULL)
    {
        foreach(glob(__DIR__."\..\Res\*".$_fileExtension)as $it_file)
        {
            if(!$it_file)   $this->fileNameList=$it_file;
        }
    }


    //@読み込んだデータ(csv形式のみ対応)を分割
    public function SplitCSV()
    {

        //改行コードが複数種類あるので統一
        //(\r\nの場合、スプリットした結果'\r'だけが残ってしまうので)
        $this->fileData = str_replace(array("\r\n","\r","\n"), "\n", $this->fileData);

        //1,改行でデータを分割
        $rowList = explode("\n",$this->fileData);

        //2,さらに','でデータを分割し配列に格納
        foreach($rowList as $it)
        {

            $lineList = explode(',',$it);
            $this->csvList[]=$lineList;
        }
        unset($it);

    }


    //@対象のデータを検索する
    //(読み込んだファイルがbom付きの形式で保存されている場合は、
    //[0][0]の判定でバグが起こるので注意)
    public function SearchData($tData)
    {

        //データクリア
        $this->ClearData();

        //検索開始
        for($i=0;$i<count($this->csvList);$i++)
        {
            for($j=0;$j<count($this->csvList[$i]);$j++)
            {
                //該当項目があれば、列/行を保存しカウント
                if($this->csvList[$i][$j]!=$tData)continue;

                $this->hitList[]=array($i,$j);
                $this->hitCnt++;

            }
        }

        //該当データの属する１行分のデータを検索
        for($i=0 ;$i<$this->hitCnt;$i++)//該当データの数分
        {
            $tmpLine=array();
            for($j=0;$j<count($this->csvList[$this->GetHitRow($i)]);$j++)//該当データの属する行の列分
            {
                $tmpLine[]
                    =$this->GetCSVData()[$this->GetHitRow($i)][$j];
            }
            $this->hitLineData[]=$tmpLine;
        }




        //Y : 対象のデータが見つかられば
        //N :             　見つからなければ
        if($this->hitCnt>0) return true;
        else                return false;
    }

    //@検索済みデータをクリア
    private function ClearData()
    {
        //unset($hitList);
        $this->hitList =array();

        $this->hitLineData=array();

        $this->hitCnt=0;
    }





    //<<<<<<<<<<<<<<<<<
    // getter/setter
    //<<<<<<<<<<<<<<<<<

    //@ファイル名の一覧を取得
    public function GetFileNameList()
    {
        return $this->fileNameList;
    }

    //@ファイルデータを取得
    public function GetFileData()
    {
        return $this->fileData;
    }

    //@csv形式を分割した２次元配列を取得
    public function GetCSVData()
    {
        return $this->csvList;
    }

    //@該当項目の'列/行番号'を取得
    public function GetHitData()
    {
        return $this->hitList;
    }

    //@該当のデータの'列'番号のみを取得
    public function GetHitRow($_num)
    {
        return $this->hitList[$_num][1];
    }

    //@該当のデータの'行'番号のみを取得
    public function GetHitLine($_num)
    {
        return $this->hitList[$_num][0];
    }

    //@該当数を取得
    public function GetHitCnt()
    {
        return $this->hitCnt;
    }

    //@該当のデータが属する行データを取得
    public function GetHitLineData()
    {
        return $this->hitLineData;
    }


}