<?php

namespace EportalAdmin\Controller;

use Exception;
use EportalAdmin\Service\EportalJointPropertyValueServiceInterface;
use Property\Service\PropertyServiceInterface;
use Property\Service\PropertyValueServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 *
 * @author imaleo
 *        
 */
class SchoolController extends AbstractActionController {

    protected $schoolForm;

    /**
     *
     * @var PropertyServiceInterface
     */
    protected $propertyService;

    /**
     *
     * @var PropertyValueServiceInterface
     */
    protected $propertyValueService;

    /**
     *
     * @var EportalJointPropertyValueServiceInterface
     */
    protected $jpvService;

    public function indexAction() {
        $pvId = $this->params()->fromQuery('pv_id');
        if ($pvId) {
            $school = $this->propertyValueService->findById($pvId);
            $subjects = $this->jpvService->getSubject($school);
            $classes = $this->jpvService->getClass($school);
            $section = $this->jpvService->getSection($school);
            return new ViewModel(array(
                'hasParam' => true,
                'school' => $school,
                'subjects' => $subjects,
                'classes' => $classes,
                'sections' => $section
            ));
        }
        $schoolProperty = $this->propertyService->findByName('school');
        $schools = $this->propertyValueService->findByProperty($schoolProperty);
        return new ViewModel(array(
            'schools' => $schools,
        ));
    }

    public function addAction() {
        $form = $this->schoolForm;
        $request = $this->getRequest();
        if ($request->isPost()) {
            return $this->process();
        }
        return array('form' => $form);
    }

    public function getSchoolForm() {
        if (!$this->schoolForm) {
            $this->schoolForm = $this->getServiceLocator()->get('EportalAdmin\Form\SchoolForm');
        }
        return $this->schoolForm;
    }

    public function setSchoolForm($schoolForm) {
        $this->schoolForm = $schoolForm;
        return $this;
    }

    public function getPropertyService() {
        if (!$this->propertyService) {
            $this->propertyService = $this->getServiceLocator()->get('Property\Service\Property');
        }
        return $this->propertyService;
    }

    public function setPropertyService(PropertyServiceInterface $propertyService) {
        $this->propertyService = $propertyService;
        return $this;
    }

    public function getPropertyValueService() {
        if (!$this->propertyValueService) {
            $this->propertyValueService = $this->getServiceLocator()->get('Property\Service\PropertyValue');
        }
        return $this->propertyValueService;
    }

    public function setPropertyValueService(PropertyValueServiceInterface $propertyValueService) {
        $this->propertyValueService = $propertyValueService;
        return $this;
    }

    public function getEportalJointPropertyValueService() {
        if (!$this->jpvService) {
            $this->jpvService = $this->getServiceLocator()->get('EportalAdmin\Service\EportalJointPropertyValue');
        }
        return $this->jpvService;
    }

    public function setEportalJointPropertyValueService(EportalJointPropertyValueServiceInterface $jpvService) {
        $this->jpvService = $jpvService;
        return $this;
    }

    protected function process() {
        $post = $this->getRequest()->getPost();
        $form = $this->schoolForm->setData($post);
        if ($form->isValid()) {
            $school = $form->getData();
            $schoolProperty = $this->propertyService->findByName('school');
            $school->setProperty($schoolProperty);
            try {
                $this->propertyValueService->insert($school);
                $this->flashMessenger()->addSuccessMessage('School added successfully');
                return $this->redirect()->toUrl('admin/school');
            } catch (Exception $ex) {
                return array(
                    'error' => true,
                    'form' => $form
                );
            }
        }
        return array('form' => $form);
    }

}
