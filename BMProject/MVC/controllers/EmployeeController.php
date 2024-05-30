<?php
    class EmployeeController extends Controller
    {
        public $employeeModel;

        public function __construct()
        {
            $this->employeeModel = $this->model("EmployeeModel");
        }

        function displayIntroduction() 
        {
            $this->view("master", ["Page" => "home"]);
        }

        function impdelEmployee() 
        {
            $this -> view("master", [
                "Page" => "deleteProduct"
            ]);
        }

        function deleteEmployee() 
        {
            if (isset($_POST["btDelete"])) {
                $deparment = $_POST["selectDeparment"];
                $tblname = 'tbemployee';
                $field = "deparment";
                $result = $this->employeeModel->delProduct($tblname, $field, $deparment);
                $this->view(
                    "master",
                    [
                        "Page" => "deleteProduct",
                        "result" => $result
                    ]
                );
            }
        }
    }
?>