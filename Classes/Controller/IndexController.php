<?php

namespace Subugoe\Zamn\Controller;

use Subugoe\Zamn\Domain\Repository\HansRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class IndexController extends ActionController
{
    /**
     * @var HansRepository
     */
    private $hansRepository;

    public function __construct(HansRepository $hansRepository)
    {
        parent::__construct();
        $this->hansRepository = $hansRepository;
    }

    public function indexAction()
    {
        $this->view->assignMultiple(
            [
                'personal' => $this->hansRepository->findAll(),
                'collections' => $this->hansRepository->findAll(true),
            ]
        );
    }

    public function detailAction()
    {
        if ($this->request->hasArgument('id')) {
            $id = (int) $this->request->getArgument('id');
        } else {
            throw new \Exception('Required argument id not set.');
        }

        $this->view->assign('hans', $this->hansRepository->findByUid($id));
    }
}
