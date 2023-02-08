<?php 
interface NameListSerializer {
    function output(NameList $nameList);
}

class NameList {
    public $names;
    public function __construct(Array $names) {
        $this->names = $names;
    }

}

class JsonListSerializer implements NameListSerializer {
    public function output(NameList $nameList) {
        return json_encode($nameList->names);
    }
}

class CsvListSerializer implements NameListSerializer {
    public function output(NameList $nameList) {
        return implode(',', $nameList->names);
    }
}

$names = new NameList(array('Piotr', 'Ryszard', 'Ania', 'Wojciech', 'Tomasz'));


$csv = new CsvLIstSerializer();
echo $csv->output($names);