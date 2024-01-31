<?php
    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\RattrapageModel;
    
    class RattrapageController extends BaseController
    {
        public function index(): void
        {
            helper(['form']);

            echo view('common/header');
            echo view('RattrapageView');
            echo view('common/footer');
        }
    }
?>