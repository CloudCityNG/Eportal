<?php

namespace EportalAdmin\Controller;

use Property\Form\PropertyValueForm;
use Property\Service\PropertyValueServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Description of EditPropertyController
 *
 * @author imaleo
 */
class PropertyValueController extends AbstractActionController {

    /**
     *
     * @var PropertyValueForm
     */
    protected $form;

    /**
     *
     * @var PropertyValueServiceInterface
     */
    protected $propertyValueService;

    public function editAction() {
        $id = $this->params('id');
        $form = $this->getPropertyValueForm();
        $propertyValue = $this->propertyValueService->findById($id);
        $form->bind($propertyValue);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                try {
                    $this->propertyValueService->update($propertyValue);
                } catch (\Exception $ex) {
                    return array(
                        'error' => true,
                        'form' => $form,
                        'property' => $propertyValue->getProperty()->getName()
                    );
                }
                return array(
                    'success' => true,
                    'form' => $form,
                    'property' => $propertyValue->getProperty()->getName()
                );
            }
            return array(
                        'success' => false,
                        'form' => $form,
                        'property' => $propertyValue->getProperty()->getName()
                    );
        }
        return array(
            'form' => $form,
            'property' => $propertyValue->getProperty()->getName()
        );
    }

    public function deleteAction() {
        
    }
    
    public function getPropertyValueForm() {
        if (!$this->form) {
            $this->form = $this->getServiceLocator()->get('Property\Form\PropertyValueForm');
        }
        return $this->form;
    }

    public function setPropertyValueForm(PropertyValueForm $form) {
        $this->form = $form;
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

}
