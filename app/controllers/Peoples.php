<?php

class People extends Controller
{
    //properties
    private $peopleModel;

    // Dit is de contructor van de controller
    public function __construct()
    {
        // Dit is de model van de controller
        $this->peopleModel = $this->model('People');
    }


    public function index($land = 'Nederland', $age = 21)
    {
        $records = $this->peopleModel->getPeople();

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->id</td>
                        <td>$items->Name</td>
                        <td>$items->CapitalCity</td>
                        <td>$items->Continent</td>
                        <td>$items->Population</td>
                        <td><a href='" . URLROOT . "/Peoples/update/$items->id'>Update</a></td>
                        <td><a href='" . URLROOT . "/Peoples/delete/$items->id'>Delete</a></td>
                       </tr>"; 
        }
        
        // var_dump($records);
        $data = [
            'title' => 'Overzicht van alle Rijke mensen',
            'rows' => $rows
        ];

        $this->view('Peoples/index', $data);

    }

    public function update($id = null){
        // var_dump($id);exit();
        //var_dump($_SERVER);exit();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->peopleModel->updatePeople($_POST);
        header("Location: " . URLROOT . "/Peoples/index");
        } else {
            $row = $this->peopleModel->getSinglePeople($id);
            $data = [
                'title' => '<h1>Update land</h1>',	
                'row' => $row
            ];
            $this->view("Peoples/update", $data);
        }
        
    }

    public function delete($id = null){
        //echo $id;exit();
        $this->peopleModel->deletepeople();
        $data =[
            'deleteStatus' => "Het record met id  = $id is verwijderd"

        ];
        $this->view("Peoples/delete", $data); 
        header("Refresh:2; url=" . URLROOT . "/Peoples/index");
        } 
    

    public function test()
    {
        $data = [
            'title' => 'Tijd voor een pro PHP moment',
        ];
        $this->view('Peoples/test', $data);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // POST schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this -> peopleModel->createPeople($_POST);

            if ($result) {
                echo "Het is gelukt!";
                header("Refresh:3; URL=" . URLROOT . "/Peoples/index");
            } else {
                echo "Het is niet gelukt!";
                header("Refresh:3; URL=" . URLROOT . "/Peoples/index");
            }
        }
        
        $data = [
            'title' => 'voeg een nieuw land toe'
        ];
        $this->view('Peoples/create', $data);
    }
}