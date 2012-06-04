<?php
Yii::import('application.modules.registration.controllers.YumRegistrationController');

class RegistrationController extends YumRegistrationController {

	public function actionRegistration() {
		Yii::import('application.modules.profile.models.*');
		$form = new YumRegistrationForm;
		$profile = new YumProfile;
	
		$this->performAjaxValidation('YumRegistrationForm', $form);
	
		if (isset($_POST['YumRegistrationForm'])) {
			$form->attributes = $_POST['YumRegistrationForm'];
			$profile->attributes = $_POST['YumProfile'];
	
			$form->validate();
			$profile->validate();
	
			if(!$form->hasErrors() && !$profile->hasErrors()) {
				$user = new YumUser;
				$user->register($form->username, $form->password, $profile->email);
				$profile->user_id = $user->id;
				$profile->save();
	
				$this->sendRegistrationEmail($user);
				Yum::setFlash('Thank you for your registration. Please check your email.');
				$this->redirect(Yum::module()->loginUrl);
			}
		}
	
		$this->render(Yum::module()->registrationView, array(
				'form' => $form,
				'profile' => $profile,
		)
		);
	}
	
	public function sendRegistrationEmail($user) {
		if (!isset($user->profile->email)) {
			throw new CException(Yum::t('Email is not set when trying to send Registration Email'));
		}
		$activation_url = $user->getActivationUrl();

		$sent = null;

		$body = strtr('Hi, {email}. Please activate your account by clicking this link: {activation_url}', array(
	        '{email}' => $user->profile->email,
			'{activation_url}' => $activation_url));

		$mail = array(
				'from' => Yum::module('registration')->registrationEmail,
				'to' => $user->profile->email,
				'subject' => 'Circorum Registration',
				'body' => $body,
		);
		$sent = YumMailer::send($mail);

		return $sent;
	}
	
}