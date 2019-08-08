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
    class User_model extends CI_Model
    {
        public $id;
        public $name;
        public $email;
        public $depar;
        
        ///////////////////////////////////////////////////////
        //Function for usage
        public function define_user($id,$name,$email,$depar) 
        { 
            $this->setId($id);
            $this->setName($name);
            $this->setEmail($email);
            $this->setDepar($depar);
        } 


        //////////////////////////////////////////////////////////////////////////////////////////////
        //Setter
        public function setId($id)
        {
            //sécu
            $this->id = $id;
        }

        
        public function setName($name)
        {
            //sécu
            $this->name = $name;
        }

        
        public function setEmail($email)
        {
            //sécu
            $this->email = $email;
        }

        
        public function setDepar($depar)
        {
            //sécu
            $this->depar = $depar;
        }

        //////////////////////////////////////////////////////////////////////////////////////////////
        //Getter
        public function getId() { return $this->id; }

        public function getName() { return $this->name; }

        public function getEmail() { return $this->email; }

        public function getDepar() { return $this->depar; }

        

        

        ///////////////////////////////////////////////////////////////////////////////////////////////
        //Get all users from the database
        function get_user_all()
        {
            $results = array();

            $list_user_all = array();
            //Define request
            $req = "SELECT * FROM user";

            //request
            $query = $this->db->query($req);

            //If the query succeed
            if($query !== FALSE)
            {
                foreach ($query->result() as $row)
                {
                    $user = new User_model;
                    $user->define_user($row->u_id,$row->u_name,$row->u_mail,$row->u_dep);
                    array_push($results, $user);
                }  
            }
            else
            {
                $results = FALSE;
            }


            /* Libération du jeu de résultats */
            

            return $results;
        }
        
        //Get all users from the database
        function addUser()
        {
            //sécu
            //Define request
            $req = "INSERT INTO `user`( `u_name`, `u_mail`, `u_dep`) VALUES ('".$this->getName()."','".$this->getEmail()."','".$this->getDepar()."')";

            //request
            $query = $this->db->query($req);

            //If the query succeed
            if($query !== FALSE)
            {
                $results = TRUE;
            }
            else
            {
                $results = FALSE;
            }


            /* Libération du jeu de résultats */
            

            return $results;
        }


    }
?>