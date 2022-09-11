# ТРЕБОВАНИЯ / REQUIREMENTS:
**1** WebAPI для взаимодействия с БД / Web API for DB interaction;<br>
**2** Реализовать CRUD операции с БД / Implement CRUD operations with the DB;<br>
**3** Реализовать метод получения списка игр определённого жанра / Implement a method for getting a list of games of a certain genre;<br>
**4** SOLID, MVC, MVVM;<br>
**5** 3 слоя абстракции / 3 layers of abstraction;<br>
**6** "тонкие" контроллеры / "thin" controllers;<br>
**7** БД содержит / The DB contains:<br>
 + название / name;<br>
 + студия-разработчик / developer studio;<br>
 + жанр / genre;<br>

 ## ХОД РАБОТЫ / PROGRESS OF WORK
 Создадим тестовую БД MySQL games. Студия не зависит от игры или жанра, а игра имеет признаки (жанр, студия). БД будет состоять из трёх основных таблиц (название игры, студия и жанр) и двух таблиц для связи (игр с жанром, игр со студией).

 Код для создания таблицы в файле ```create_db_games.php```

 





