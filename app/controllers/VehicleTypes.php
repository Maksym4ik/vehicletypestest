<?php

require_once '../app/models/VehicleTypeDTO.php';

class VehicleTypes extends Controller
{
    private $vehicleTypeModel;
    private VehicleTypeDTO $VehicleTypeDTO;


    public function __construct()
    {
        $this->vehicleTypeModel = $this->model('VehicleType');
        $this->VehicleTypeDTO = new VehicleTypeDTO();
        if(!$this->isLoggedIn()) {
            header('location:' . URLROOT . '/users/login');
        }
    }

    public function index($id = null) {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        parse_str(file_get_contents("php://input"),$postVars);
        if($postVars['token'] !== $_SESSION['token']) {
            echo json_encode([
                'status'=>'ERROR',
                'code'=> '405',
                'message'=>'Method Not Allowed'
            ]);
            return;
        }
        //create request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->createRow();
            return;
        }
        //update request
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            echo $this->updateRow($id);
            return;
        }
        //delete request
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            echo $this->delete($id);
            return;
        }
    }

    public function list() {
        if(isset($_GET['page'])) {
            $currentPage = intval($_GET['page']);
        } else {
            $currentPage = 1;
        }

        //pagination logic
        $recordsPerPage = 10;
        $totalRecords = $this->vehicleTypeModel->getCount();
        $totalPages = ceil($totalRecords / $recordsPerPage);
        $currentPage = isset($currentPage) ? $currentPage : 1;
        $offset = ($currentPage - 1) * $recordsPerPage;
        //get results
        $records = $this->vehicleTypeModel->getAll($recordsPerPage,$offset);
        $range = 5;
        $startPage = max(1, $currentPage - $range);
        $endPage = min($totalPages, $currentPage + $range);
        $data = [
            'records'=>$records,
            'startPage'=>$startPage,
            'endPage'=>$endPage,
            'currentPage'=>$currentPage,
            'totalPages'=>$totalPages,
            'title'=>'Vehicle Types list'
        ];

        
        $this->setView('vehicle-types/list', $data);
    }

    public function create() {
        $this->isApproveAccess(2);
        $data['title'] = 'Create Vehicle Type';
        $this->setView('vehicle-types/create', $data);
    }

    public function view($id = null) {
        if($id) {
            $row = $this->vehicleTypeModel->getById($id);
            $data['row'] = $row;
        } else {
            header('location:' . URLROOT . '/vehicle-types/list');
        }
        $data['title'] = 'Vehicle Type view';
        $this->setView('vehicle-types/view', $data);
    }

    public function update($id = null)
    {
        $this->isApproveAccess(2);
        if (!$id) {
            header('location:' . URLROOT . '/vehicle-types/list');
        }

        $row = $this->vehicleTypeModel->getById($id);
        $data['name'] = $row->name;
        $data['id'] = $row->id;

        $data['title'] = 'Vehicle Type update';
        $this->setView('vehicle-types/update', $data);
    }

    private function delete($id)
    {
        $this->isApproveAccess(2);
        if ($id) {
            $this->vehicleTypeModel->deleteById($id);
            return json_encode([
                'status'=>'OK',
                'code'=>'200',
                'message'=>"Vehicle Type - $id was removed"
            ]);
        } else {
            return json_encode([
                'status'=>'ERROR',
                'code'=>'400',
                'message'=>"Vehicle Type id is not accepted"
            ]);
        }
    }

    private function createRow() {
        $data['name'] = trim($_POST['name']);
        $data['userId'] = trim($_POST['userId']);
        //validation
        $data = $this->validate($data);

        if (empty($data['nameError'])) {
            $dto = $this->VehicleTypeDTO->fromRequest($_POST);
            if ($this->vehicleTypeModel->create($dto)) {
                return json_encode([
                    'status'=>'OK',
                    'code'=>'201',
                    'message'=>'New Vehicle Type saved!'
                ]);
            } else {
                $data['nameError'] = 'Record is not saved, try again!';
                return json_encode([
                    'status'=>'ERROR',
                    'code'=>'409',
                    'message'=>$data['nameError']
                ]);
            }
        } else {
            return json_encode([
                'status'=>'ERROR',
                'code'=>'409',
                'message'=>$data['nameError']
            ]);
        }
    }

    private function updateRow($id) {
        parse_str(file_get_contents("php://input"),$postVars);

        $data['name'] = trim($postVars['name']);
        $data['id'] = $id;
        $data['userId'] = trim($postVars['userId']);
        //validation
        $data = $this->validate($data);

        if (empty($data['nameError'])) {
            $dto = $this->VehicleTypeDTO->fromRequest($postVars);
            if ($this->vehicleTypeModel->update($dto)) {
                return json_encode([
                    'status'=>'OK',
                    'code'=>'201',
                    'message'=>'Vehicle Type updated!'
                ]);
            } else {
                $data['nameError'] = 'Record is not updated, try again.';
                return json_encode([
                    'status'=>'ERROR',
                    'code'=>'409',
                    'message'=>$data['nameError']
                ]);
            }
        } else {
            return json_encode([
                'status'=>'ERROR',
                'code'=>'409',
                'message'=>$data['nameError']
            ]);
        }
    }

    private function validate($data) {
        if (empty($data['name'])) {
            $data['nameError'] = 'Please enter name.';
        } if(strlen($data['name']) <= 2) {
            $data['nameError'] = 'Must contain more than 2 characters';
        } else {
            if ($this->vehicleTypeModel->findCountByName($data['name'])) {
                $data['nameError'] = 'name is already taken.';
            }
        }

        return $data;
    }

}