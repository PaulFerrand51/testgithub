<?php

    /*
    * The table 'test_depar' has these fields
    name (a unique value)
    */

    //Define Departement
    class Depar_model extends CI_Model
    {
        public $name;
        
        ///////////////////////////////////////////////////////
        //Function for usage
        public function define_depar($name) 
        { 
            $this->name = $name;
        } 


        //////////////////////////////////////////////////////////////////////////////////////////////
        //Setter

        //////////////////////////////////////////////////////////////////////////////////////////////
        //Getter
        public function getName() { return $this->name; }


        ///////////////////////////////////////////////////////////////////////////////////////////////
        //Get all departements from the database
        function get_depar_all()
        {
            $results = array();

            $list_user_all = array();
            //Define request
            $req = "SELECT * FROM departement";

            //request
            $query = $this->db->query($req);

            //If the query succeed
            if($query !== FALSE)
            {
                foreach ($query->result() as $row)
                {
                    $depar = new Depar_model;
                    $depar->define_depar($row->dp_name);
                    array_push($results, $depar);
                }  
            }
            else
            {
                $results = FALSE;
            }


            /* Libération du jeu de résultats */
            

            return $results;
        }
        

        /*function get_people_id($id)
        {
            //if id is not a integer
            if(!is_integer($id))
            {
                return false;
            }
            $list_people_all = array();
            //Connect to database
            $mysqli = connectmysql();
            //Define request
            $req = "SELECT * FROM test_personne WHERE tp_id = $id";

            //request
            $result = $mysqli->query($req);
            //If at least one result
            if($result->num_rows != 0)
            {
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {

                    $people = new People($row['tp_id'], $row['tp_name'], $row['tp_surname'], $row['tp_age'], $row['tp_weight'], $row['tp_size']);

                }
            }
            


             Libération du jeu de résultats 

            return $people;
        }*/

    }
?>