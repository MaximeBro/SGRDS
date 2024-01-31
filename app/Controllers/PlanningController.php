<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RattrapageModel;
use App\Models\RessourceModel;

class PlanningController extends BaseController
{
    private $session = null;
    private $ressourceModel = null;
    private $rattrapageModel = null;

    public function index(): void
    {
        helper(['form']);
        $data = $this->loadViewData();

        echo view('common/header');
        echo view('Planning/content', $data);
        echo view('common/footer');
    }

    private function loadViewData($ressource = null, $semestre = null): array
    {
        $ressourceModel = new RessourceModel();
        $rattrapageModel = new RattrapageModel();
        $this->session = \Config\Services::session();

        $rattrapages = $rattrapageModel->findAll();

        if(!empty($ressource) && !empty($semestre)) {
            $rattrapages = $rattrapageModel->getByRessourceAndSemestre($ressource, $semestre);
        }
        else {
            if(!empty($ressource)) {
                $rattrapages = $rattrapageModel->getByRessource($ressource);
            }

            if(!empty($semestre)) {
                $rattrapages = $rattrapageModel->getBySemestre($semestre);
            }
        }

        foreach($rattrapages as $rattrapage) {
            $id = $rattrapage['idressource'];
            $linked_resources[$id] = $ressourceModel->getRessourceById($id);
        }

        $data['session'] = $this->session;
        $data['ressources'] = $ressourceModel->getRessources();
        $data['rattrapages'] = $rattrapages;

        if(!empty($linked_resources)) { $data['linked_resources'] = $linked_resources; }

        return $data;
    }

    public function filter(): void
    {
        helper(['form']);
        $selectedRessource = $this->request->getVar('selectRessource');
        $selectedSemestre = $this->request->getVar('selectedSemestre');
        $data = $this->loadViewData($selectedRessource, $selectedSemestre);

        echo view('common/header');
        echo view('Planning/content', $data);
        echo view('common/footer');
    }
}