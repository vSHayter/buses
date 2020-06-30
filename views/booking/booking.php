<!-- Contact Form Starts -->
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
                <form action="<?= \yii\helpers\Url::toRoute(['booking/booking', 'id' => $flight]) ?>">
                    <div class="left">
                        <input type="text" name="name" placeholder="Введите Ваше имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите имя'" required>
                        <input type="text" name="surname" placeholder="Введите Вашу фамилию" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите фамилию'" required>
                        <input type="text" name="patronymic" placeholder="Введите Ваше отчество" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите Ваше отчество'" required>
                        <input type="text" name="phone" placeholder="Введите Ваш номер" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите Ваш номер'" required>
                        <input type="email" name="email" placeholder="Введите Ваш email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите email'" required>
                        <input type="text" name="amount" placeholder="Введите кол-во билетов" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите кол-во билетов'" required>
                    </div>
                    <div class="right">
                        <input type="date" name="date" required><br><br>
                        <select name="payment" size="5" >
                                <option value="" disabled selected>Выберите тип оплаты</option>
                            <?php foreach ($payments as $payment): ?>
                                <option value="<?=$payment->id?>"><?=$payment->type?></option>
                            <?php endforeach; ?>
                        </select>
                        <textarea name="message" cols="20" rows="7"  placeholder="Введите пожелание" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите пожелание'" required></textarea>
                    </div>
                    <button type="submit" formmethod="post" class="template-btn">Забронировать сейчас</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form End -->
