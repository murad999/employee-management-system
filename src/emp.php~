<?php
class Emp{  
      public $con;  
      public function __construct()  
      {  
			if(!isset($_SESSION)){
				session_start();
			}
           $this->con = mysqli_connect("localhost", "root", "1234", "emp");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }  
      public function insert($table_name, $data)  
      {  
	 // print_r($table_name);//
	  //print_r($data);//
	 // die();//
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  
           if(mysqli_query($this->con, $string))  
           { 
           
              $_SESSION['success'] =" <p class='alert alert-success text-center'>" . "Data Insert successfully" . "</p>" ;

              $_SESSION['submit_payment'] =" <p class='alert alert-success text-center'>" . "Data Insert successfully" . "</p>" ;

              $_SESSION['checkin'] =" <p class='alert alert-success text-center'>" . "Attendance submitted" . "</p>" ;

              $_SESSION['leave_in'] =" <p class='alert alert-success text-center'>" . "Your leave application is submitted" . "</p>" ;

             $_SESSION['required'] =" <p class='alert alert-danger text-center'>" . "Please fillup all this fields" . "</p>" ;

            if($table_name=="designation")
              header('location: ../admin.php?page=view/designation.php');
            if($table_name=="paygrades")
              header('location: ../admin.php?page=view/paygrade.php');
            if($table_name=="payitems")
              header('location: ../admin.php?page=view/manage_payitem.php');
            if($table_name=="admins")
              header('location: ../admin.php?page=view/main.php');
            if($table_name=="employees")
              header('location: ../admin.php?page=view/main.php');
            if($table_name=="salaries")
              header('location: ../admin.php?page=view/salary_manag.php');
            if($table_name=="paymenthistories")
              header('location: admin.php?page=view/employees_payment.php');
            if($table_name=="timesheets")
              header('location: ../emp/index.php?page=attendance.php');
            if($table_name=="leaves")
              header('location: ../emp/index.php?page=leave_apply.php');
				
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }  
		   
      }  
      public function select($table_name)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }


 public function select_active_list($table_name,$cond)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name." WHERE ".$cond."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }

public function select_month_year_day($table_name,$cond)  
      {  
           $array = array();  
           $query = "SELECT YEAR(entry_date) as entry_year,
            MONTH(entry_date) as entry_month,
            COUNT(DISTINCT entry_date) as total_entry FROM ".$table_name." WHERE ".$cond." GROUP BY YEAR(entry_date), MONTH(entry_date) 
            ORDER BY YEAR(entry_date), MONTH(entry_date)"; 
          //echo $query;exit; 
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }



 public function select_active_list_emp($table_name1,$table_name2,$table_name3,$cond)  
      {  
           $array = array();  
           $query = "SELECT employees.*,paygrades.name,paygrades.basic,designation.designation FROM ".$table_name1." LEFT JOIN ".$table_name2." ON employees.paygrade_id = paygrades.id LEFT JOIN ".$table_name3." ON employees.designation_id = designation.id WHERE ".$cond."";  
           //echo $query;exit;
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }


public function select_join($table_name1,$table_name2,$table_name3='')  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name1." LEFT JOIN ".$table_name2." ON paygrades.designation_id = designation.id";  
           //SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }

// public function select_user($table_name1,$table_name2)  
//       {  
//            $array = array();  
//            $query = "SELECT * FROM ".$table_name1." LEFT JOIN ".$table_name2." ON admins.id"; 
//            echo $query;exit; 
//            //SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id
//            $result = mysqli_query($this->con, $query);  
//            while($row = mysqli_fetch_assoc($result))  
//            {  
//                 $array[] = $row;  
//            }  
//            return $array;  
//       }


      //SELECT * FROM salaries LEFT JOIN paygrades ON paygrades.id = salaries.paygrade_id LEFT JOIN payitems ON salaries.payitem_id = payitems.id
	 public function selectJoin_viewSalary($table_name1,$table_name2,$table_name3)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name1." LEFT JOIN ".$table_name2." ON paygrades.id = salaries.paygrade_id LEFT JOIN ".$table_name3." ON salaries.payitem_id = payitems.id"; 
           //echo $query;exit; 
           //SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }

      public function selectJoin_employ($table_name1,$table_name2,$table_name3)  
      {  
        //SELECT * FROM employees LEFT JOIN paygrades ON paygrades.id = employees.paygrade_id LEFT JOIN designation ON employees.designation_id = designation.id WHERE active= 1
           $array = array();  
           $query = "SELECT employees.*,paygrades.name,paygrades.basic,designation.designation FROM ".$table_name1." LEFT JOIN ".$table_name2." ON employees.paygrade_id = paygrades.id LEFT JOIN ".$table_name3." ON employees.designation_id = designation.id WHERE active= 1"; 
           //echo $query;exit; 
           //SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      ////SELECT leaves*,employees.fullname FROM leaves LEFT JOIN employees ON employees.id=leaves.employee_id WHERE status=0

      public function selectJoin_leave_emp($table_name1,$table_name2)  
      {  
        //SELECT * FROM employees LEFT JOIN paygrades ON paygrades.id = employees.paygrade_id LEFT JOIN designation ON employees.designation_id = designation.id WHERE active= 1
           $array = array();  
           $query = "SELECT leaves.*,employees.emp_info,employees.image FROM ".$table_name1." LEFT JOIN ".$table_name2." ON employees.id = leaves.employee_id WHERE status=0"; 
           //echo $query;exit; 
           //SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }


       public function selectJoin_paymenthistory_emp($table_name1,$table_name2)  
      {  
        //SELECT * FROM employees LEFT JOIN paygrades ON paygrades.id = employees.paygrade_id LEFT JOIN designation ON employees.designation_id = designation.id WHERE active= 1
           $array = array();  
           $query = "SELECT paymenthistories.*,employees.emp_info,employees.email FROM ".$table_name1." LEFT JOIN ".$table_name2." ON employees.id = paymenthistories.employee_id"; 
           //echo $query;exit; 
           //SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }

		 public function del($table_name, $data)  
      {     
           $query = "DELETE FROM ".$table_name." WHERE id=$data"; 
           $del = mysqli_query($this->con, $query); 

          $_SESSION['success_del'] =" <p class='alert alert-success text-center'>" . "Data successfully DELETED" . "</p>" ;
       
        if($table_name=="designation")
          header('location: ../admin.php?page=view/designation.php');
        if($table_name=="payitems")
          header('location: ../admin.php?page=view/manage_payitem.php');

        
      }  
    public function delete($query){
        $delete = $this->con->query($query);
        if($delete){
            //header('location:index.php?msg = Post deleted...');
        }else{
            echo "Post did not deleted";
        }
    }

      public function view($table_name, $data)  
      {     
           $query = "SELECT *FROM ".$table_name." WHERE id=$data"; 
           $show = mysqli_query($this->con, $query); 
           $row = mysqli_fetch_assoc($show);
           return $row;
        
      } 
      public function update($table_name, $fields, $where_condition)  
      {  
        //print_r($where_condition);
        //die();
           $query = '';  
           $condition = '';  
           foreach($fields as $key => $value)  
           {  
                $query .= $key . "='".$value."', ";  
           }  
           $query = substr($query, 0, -2);  
           /*This code will convert array to string like this-  
           input - array(  
                'key1'     =>     'value1',  
                'key2'     =>     'value2'  
           )  
           output = key1 = 'value1', key2 = 'value2'*/  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . "='".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           /*This code will convert array to string like this-  
           input - array(  
                'id'     =>     '5'  
           )  
           output = id = '5'*/  
           $query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";  
           if(mysqli_query($this->con, $query))  
           {  
              $_SESSION['success_update'] =" <p class='alert alert-success text-center'>" . "Data successfully UPDATED" . "</p>" ;
                return true;  
           }  
      }  
 }  

