<?php
    class EmployeeModel extends dbEmployee {
        public function getRecord($tablename) 
        {
            $qr = "SELECT * FROM $tablename";
            return mysqli_query($this->con, $qr);
        }
        
        public function delProduct($tblname, $field, $keyword) {
            $result = false;
            $sql = "DELETE FROM $tblname where $field='$keyword'";
            if (mysqli_query($this->con, $sql)) {
                $result = true;
            }
            return json_decode($result);
        }
    }
?>