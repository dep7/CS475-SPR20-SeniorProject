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
function convertDate($str) {
    $dateArr = explode(", ",$str);
    $dateArr[0] = monthToInt($dateArr[0]);
    $time = strtotime($dateArr[0] . "-1-" . $dateArr[1]);
    return date('Y-m-d',$time);
}
function dateRangeCSV($rows) {
    
    if (isset($rows[0])) {
        
        $graduationDates = array();
        $employDates = array();

        $minDateGrad = convertDate($rows[0]['Graduation_Date']);
        $maxDateGrad = convertDate($rows[0]['Graduation_Date']);
        $minDateEmp = $rows[0]['Employment'];
        $maxDateEmp = $rows[0]['Employment'];

        foreach($rows as $idx => $val) {
            $graduationDates[$idx] = convertDate($val['Graduation_Date']);
            $employDates[$idx] = $val['Employment'];

            if ($minDateGrad > $graduationDates[$idx])
                $minDateGrad = $graduationDates[$idx];
            else if ($maxDateGrad < $graduationDates[$idx])
                $maxDateGrad = $graduationDates[$idx];

            if ($minDateEmp > $employDates[$idx])
                $minDateEmp = $employDates[$idx];
            else if ($maxDateEmp < $employDates[$idx])
                $maxDateEmp = $employDates[$idx];
        }

        $data = array();

        $data['csv'] = '[';

        foreach($rows as $idx => $val) {
            $data['csv'] .= '{"id":"Student_' . $val['StudentID'] . '","grad_date":"' . $graduationDates[$idx] . '","employ_date":"' . $employDates[$idx] . '"}';
            if (($idx + 1) < sizeof($rows)) $data['csv'] .= ',';
        }

        $data['csv'] .= ']';

        $data['minRange'] = $minDateGrad;
        $data['maxRange'] = $maxDateEmp;

        return $data;
    }
    
}
function monthToInt($month) {
    switch($month) {
        case 'January': return 1;
        case 'February': return 2;
        case 'March': return 3;
        case 'April': return 4;
        case 'May': return 5;
        case 'June': return 6;
        case 'July': return 7;
        case 'August': return 8;
        case 'September': return 9;
        case 'October': return 10;
        case 'November': return 11;
        case 'December': return 12;
        default: return 1;
    }
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