<?php

class CustomerDetailsCheckoutComponent extends CheckoutComponent{

	protected $requiredfields = array(
		'FirstName','Surname','Email'
	);

	public function getFormFields(Order $order) {
		$fields = FieldList::create(
			$firstname = TextField::create('FirstName', _t('CheckoutField.FIRSTNAME', 'First Name')),
			$surname = TextField::create('Surname', _t('CheckoutField.SURNAME', 'Surname')),
			$email = EmailField::create('Email', _t('CheckoutField.EMAIL', 'Email'))
		);

		return $fields;
	}

	public function validateData(Order $order, array $data) {
		//all fields are required
	}

	public function getData(Order $order) {
		if($order->FirstName || $order->Surname || $order->Email){
			return array(
				'FirstName' => $order->FirstName,
				'Surname' => $order->Surname,
				'Email' => $order->Email
			);
		}
		if($member = Member::currentUser()){
			return array(
				'FirstName' => $member->FirstName,
				'Surname' => $member->Surname,
				'Email' => $member->Email
			);
		}
		return array();
	}

	public function setData(Order $order, array $data) {
		$order->update($data);
		$order->write();
	}

}
