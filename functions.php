<?php
function logger($message, $level, $fileName = __FILE__, $logFile = "StudentShift.log") {
    
    $date = date('m/d/Y h:i:s a', time());
    $logMessage = "[" . $level . "] " . $date . " " . $fileName . ", " . $message;
    
    $logMessage .= PHP_EOL;
    return file_put_contents($logFile, $logMessage, FILE_APPEND);
}
function clearLog() {
    file_put_contents("StudentShift.log", "");
}
function format_r($object) {
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}
function majorRowsToCSV(array $rows) {
    if (isset($rows[0])) {
        
        $major = str_replace(" ","",$rows[0]['Major']);
        $data = array();
        $jobTypes = array();

        foreach($rows as $val) {
            $val = str_replace(" ","",$val);
            $jobTypes[$val['Job_Type']] = 0;
        }
        $jobTypes = array_keys($jobTypes);

        $data = 'id' . '\n';
        $data .= $major . ',' . '\n';

        foreach($jobTypes as $x) {
            $positions = array();

            foreach($rows as $y) {
                if ($y['Job_Type'] == $x) {
                    $y = str_replace(" ","",$y);
                    $positions[$y['Job_Title_Area_of_Study']] = 0;
                }
            }
            $positions = array_keys($positions);
            
            if (sizeof($positions) != 0) {
                $data .= $major . '.' . $x . ',' . '\n';
            } else {
                $data .= $major . '.' . $x . '\n';
            }

            foreach($positions as $y) {
                $data .= $major . '.' . $x . '.' . $y . '\n';
            }
        }
    }
    return $data;
}
function majorRowstoJSON(array $rows) {
    if (isset($rows[0])) {

        $major = $rows[0]['Major'];
        $jobTypes = array();

        foreach($rows as $val) {
            $jobTypes[$val['Job_Type']] = 0;
        }
        $jobTypes = array_keys($jobTypes);

        $data =     'var data_json = {' . "\n";
        $data .=    '"name": "' . $major . '",' . "\n";
        $data .=    '"children": [' . "\n";

        foreach($jobTypes as $key => $x) {
            $positions = array();

            foreach($rows as $y)
                if ($y['Job_Type'] == $x)
                    $positions[$y['Job_Title_Area_of_Study']] = 0;
            
            $positions = array_keys($positions);
            
            $data .=    '{' . "\n";
            parentJSON($data, $positions, $x);

            if ($key < sizeof($jobTypes) - 1)
                $data .=    '},' . "\n";
            else
                $data .=    '}' . "\n";
        }
        
        $data .=    ']};' . "\n";

        return $data;
    }
}
function parentJSON(&$data, array $children, $name) {

    $data .=    '"name": "' . $name . '",' . "\n";
    $data .=    '"children": [' . "\n";
    
    foreach($children as $key => $val) {
        $data .=    '{' . "\n";
        $data .=    '   "name": "' . $val . '"' . "\n";

        if ($key < sizeof($children) - 1)
            $data .=    '},' . "\n";
        else
            $data .=    '}' . "\n";
    }

    $data .=    ']' . "\n";
}
?>