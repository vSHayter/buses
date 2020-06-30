use buses;

insert into country values 
(null, "Украина"), (null, "Россия"), (null, "Белоруссия");
insert into city values 
(null, "Донецк", 1), (null, "Киев", 1), 
(null, "Москва", 2), (null, "Краснодар", 2), (null, "Севастополь", 2), 
(null, "Минск", 3),(null, "Гомель", 3);
insert into place values 
(null, "Горловка", 1), (null, "Дебальцево", 1), (null, "Енакиево", 1), (null, "Торез", 1), (null, "Хотов", 2), (null, "Чабаны", 2),
(null, "Одинцово", 3), (null, "Ступино", 3), (null, "Коломна", 3),(null, "Энем", 4),(null, "Адыгейск", 4), (null, "Соколиное", 5), (null, "Танковое", 5),
(null, "Дубенцы", 6), (null, "Хатежино", 6), (null, "Осовцы", 7), (null, "Красное", 7);
insert into atp values
(null, "Богдан"), (null, "Шериф-Тур"), (null, "Симон-Тур");
insert into bus values
(null, "Honda Civic", "BB2222AB", "Конишев Эдуард Витальевич", 25, 1), (null, "Hyundai Elantra", "AA3333BA", "Сидоров Дмитрий Олегович", 25, 1),
(null, "Mercedes Vito", "A666AA", "Вилецкий Алексей Игоревич", 50, 2),(null, "Volkswagen Vento", "A777BA", "Олейник Виктор Викторович", 50, 2),
(null, "Citroen Berlingo", "B888AK", "Башаров Марат Дмиртриевич", 30, 3),(null, "Citroen Jumper", "B999BB", "Попов Герман Алексеевич", 30, 3);
insert into flight values
(null, 1, 3, '10:00:00', '16:00:00', "Каждый день", 1),
(null, 2, 5, '12:50:00', '09:15:00', "Каждый день", 2),
(null, 3, 6, '07:10:15','17:25:00', "Через день", 3),
(null, 6, 2, '18:00:00','13:55:00', "Воскресеьне, Среда", 4),
(null, 10, 16, '22:00:00', '14:30:00', "Понедельник, Пятница", 5);
insert into stop values
(null, 1, 2), (null, 1, 3),
(null, 2, 3), (null, 2, 4),
(null, 3, 7), (null, 3, 4),
(null, 4, 6), (null, 4, 9), (null, 4, 7),
(null, 5, 11), (null, 5, 12), (null, 5, 15);
insert into payment values
(null, "Безналичный расчёт"), (null, "Оплата на кассе");
insert into user values (null, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0713508552', 1);