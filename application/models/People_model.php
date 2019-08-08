<?php

    /*
    * The table 'test_personne' has these fields
    id (a unique value, auto incrementing field)
    name
    surname
    age
    weight
    size
    */

    //Define Model
    class People_model extends CI_Model
    {
        private $id;
        public $name;
        public $surname;
        public $age;
        protected $weight;
        public $size;
        
        ///////////////////////////////////////////////////////
        //Function for usage
        public function define_people($id, $name, $surname, $age, $weight, $size) 
        { 
            $this->id = $id; 
            $this->name = $name; 
            $this->surname = $surname; 
            $this->age = $age; 
            $this->setWeight($weight); 
            $this->size = $size; 
        } 

        public function presentation()
        {
            return "Bonjour je m'appelle ".$this->name." ".$this->surname.", j'ai ".$this->age." ans et je mesure ".$this->size."cm. Mon id est ".$this->id." .";
        }

        //////////////////////////////////////////////////////////////////////////////////////////////
        //Setter
        public function setWeight($weight)
        {
            $weight = (int) $weight;
            
            if ($weight >= 1 && $weight <= 200)
            {
                $this->weight = $weight;
            }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////
        //Getter
        public function weight() { return $this->weight; }


        ///////////////////////////////////////////////////////////////////////////////////////////////
        //Get all people from the database
        function get_people_all()
        {
            $results = array();

            $list_people_all = array();
            //Define request
            $req = "SELECT * FROM test_personne";

            //request
            $db_debug = $this->db->db_debug; //save setting
            $this->db->db_debug = FALSE; //disable debugging for queries

            $query = $this->db->query($req);
            $this->db->db_debug = $db_debug;

            //If the query succeed
            if($query !== FALSE)
            {
                foreach ($query->result() as $row)
                {
                    $people = new People_model;
                    $people->define_people($row->tp_id, $row->tp_name, $row->tp_surname, $row->tp_age, $row->tp_weight, $row->tp_size);
                    array_push($results, $people);
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