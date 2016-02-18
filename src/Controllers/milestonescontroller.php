<?php
namespace famoser\crm\Controllers;

use famoser\crm\Models\Database\MilestoneModel;
use famoser\crm\Models\Database\ProjectModel;
use famoser\phpFrame\Controllers\ControllerBase;
use famoser\phpFrame\Controllers\Generic1nController;
use famoser\phpFrame\Helpers\FormatHelper;
use famoser\phpFrame\Models\Database\BaseDatabaseModel;
use famoser\phpFrame\Models\View\MenuItem;
use famoser\phpFrame\Services\DatabaseService;
use famoser\phpFrame\Services\GenericDatabaseService;
use famoser\phpFrame\Views\GenericView;

/**
 * Created by PhpStorm.
 * User: Florian Moser
 * Date: 13.09.2015
 * Time: 16:03
 */
class MilestonesController extends Generic1nController
{
    /*
    /**
     * Konstruktor, erstellet den Controllers.
     *
     * @param Array $request Array aus $_GET & $_POST.
     *
    public function __construct($request, $requestFiles, $params)
    {
        $this->request = $request;
        $this->params = $params;
        $this->genericController = new GenericController($this->request, $this->params, "milestones", "milestone", "StartDate", array("add" => "edit"), null, $this->getMenu(), $this->getNRelations());
    }*/

    public function __construct($request, $params, $files)
    {
        $defaultModel = new MilestoneModel();
        $defaultModel->setStartDate(FormatHelper::getInstance()->dateFromString("today"));
        parent::__construct($request,
            $params,
            $files,
            $defaultModel,
            array(Generic1nController::CRUD_CREATE => Generic1nController::CRUD_UPDATE));

        $this->addMenuItem(new MenuItem("active", ""));
        $this->addMenuItem(new MenuItem("archived", "archived"));
    }

    /**
     * Methode zum Anzeigen des Contents.
     *
     * @return String Content der Applikation.
     */
    public function Display()
    {
        if (count($this->params) > 0) {
            if ($this->params[0] == "archived") {
                return parent::Display(array(), array("IsArchived" => true), "StartDate DESC");
            } else if (count($this->params) > 1 && is_numeric($this->params[1])) {
                if ($this->params[0] == "add") {
                    $model = $this->getObjectInstance();
                    if ($model instanceof MilestoneModel) {
                        $project = GenericDatabaseService::getInstance()->getById(new ProjectModel(), $this->params[1]);
                        if ($project instanceof ProjectModel) {
                            $model->setDeadlineDate($project->getDeadlineDate());
                        }
                    }
                }
            }
        }
        return parent::DisplayExtended(array("IsArchived" => false), "StartDate DESC", new ProjectModel(), "Project");
    }
}