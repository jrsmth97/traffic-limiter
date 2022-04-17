<?php

if (isset($_GET['success'])) {
    $traffic = new TrafficLimiter(false);
    $traffic->unsetRecord();
}

class TrafficLimiter {
    var $limit            = 100; // user limit
    var $defaultBreakTime = 2; // seconds
    var $newRec; // is new record

    public function __construct($newRec = true) {
        $this->ip = $this->getIp();
        $this->newRec = $newRec;
    }
    
    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }
    
    public function setBreakTime($time) {
        $this->defaultBreakTime = $time;
        return $this;
    }
    
    public function unsetRecord() {
        sleep($this->defaultBreakTime);
        $this->deleteRecord($this->getIp());
        return 'ok';
    }

    public function activate($newRec = true) {
        $oldRecs       = $this->getRecords();
        $ipExist       = in_array($this->ip, $oldRecs);
        if ($ipExist) {
            $this->deleteRecord($this->ip);
        }
        
        $oldRecordSize = sizeof($this->getRecords());
        $inc = $newRec ? 1 : 0;
        if (($oldRecordSize + $inc) > $this->limit) { 
            $this->deny();
            die;
        }
        
        $this->appendRecord($this->ip);
    }

    public function deny() {
        echo 'CALM DOWN :), PLEASE COMEBACK IN SECONDS';
    }

    public function appendRecord(String $ip): Bool {
        $arr = $this->getRecords();
        array_push($arr, $ip);
        $content = implode('_', $arr);
        return file_put_contents('records.txt', ltrim($content, '_'));
    }

    public function getRecords(): Array {
        return explode('_', file_get_contents('records.txt'));
    }

    public function deleteRecord(String $ip): Bool {
        $oldRecords = $this->getRecords();
        $newRecords = array_filter($oldRecords, fn ($i) => $i != $ip);
        $newRecords = implode("_", $newRecords);
        return file_put_contents('records.txt', $newRecords);
    }

    public function checkRecord(String $ip): Bool {
        return in_array($ip, $this->getRecords());
    }

    public function getIp(): String {
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }
}