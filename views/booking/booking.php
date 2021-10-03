<!-- Booking Form Starts -->
<section class="contact-form section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-text">
                        <h4>Донецк</h4>
                        <p>Южный автовокзал</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="info-text">
                        <h4>+38071-350-85-52</h4>
                        <p>Бронируйте по телефону</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="info-text">
                        <h4>donbass@gmail.com</h4>
                        <p>Бронируйте через почту</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <?php
                    $form = \yii\widgets\ActiveForm::begin([
                            'action' => ['booking/booking', 'id' => $trip],
                            //'fieldClass' => ['class' => 'date-custom'],
                            'fieldConfig' => [
                                    'template' => '{input}',
                                    'options' => [
                                        'tag' => false,
                                    ]
                            ]
                    ]);
                    $model = new \app\models\Booking();
                    $items = \yii\helpers\ArrayHelper::map($payments,'id', 'type');
                ?>
                <div class="left">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введи Ваше имя', 'required' => 'true', 'class' => '']); ?>
                    <?= $form->field($model,'surname')->textInput(['placeholder' => 'Введите Вашу фамилию' , 'required' => 'true', 'class' => '']); ?>
                    <?= $form->field($model,'patronymic')->textInput(['placeholder' => 'Введите Ваше отчество', 'required' => 'true', 'class' => '']); ?>
                    <?= $form->field($model,'phone')->textInput(['placeholder' => 'Введите Ваш номер' , 'required' => 'true', 'class' => '']); ?>
                    <?= $form->field($model,'email')->textInput(['placeholder' => 'Введите Ваш email' , 'required' => 'true', 'class' => '']); ?>
                    <?= $form->field($model,'amount')->textInput(['placeholder' => 'Введите кол-во билетов', 'required' => 'true', 'class' => '']); ?>
                </div>
                <div class="right">
                    <?= $form->field($model, 'date')->textInput(['type' => 'date', 'required' => 'true', 'class' => 'form-control date-custom']); ?>
                    <?= $form->field($model, 'id_payment')->dropDownList($items, ['placeholder' => 'Введите пожелание', 'required' => 'true', 'class' => 'payment w-100']); ?>
                    <?= $form->field($model, 'text')->textarea(['placeholder' => 'Введите пожелание', 'class' => '']); ?>
                    <?= \yii\helpers\Html::submitButton('Забронировать сейчас', ['class' => 'template-btn']); ?>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<!-- Booking Form End -->
