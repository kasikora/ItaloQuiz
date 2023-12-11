# Zadania

## Przygotowanie środowiska

Rozwiązując zadania może być przydatna [nasza prezentacja](https://docs.google.com/presentation/d/18oEkPeBZgzpucZXSkNZZfrV7JIZKFMknvblV2ELy2NY/edit?usp=sharing)

Pobierz nasz mini projekt z folderu 'tasks' (nie ma potrzeby pobierania całego projektu quizowego), na którym sam przeprowadzisz ataki CSRF, XSS takie jak my na naszej prezentacji i spróbujesz zabezpieczyć stronę </br>
[Pobierz stąd](https://drive.google.com/file/d/1CENacje-JxjyBzniWqFldpH-EGFcZsLM/view?usp=sharing) </br> </br>

Uruchom naszą aplikację na serwerze lokalnym, aby mieć dostęp do niej poprzez przeglądarkę wpisując
> http://localhost/tasks/mainpage.php

Możesz zrobić to w xampp dodając wypakowany folder do katalogu 'htdocs'. </br>

W xampp uruchom serwer Apache i MySQL:

![image](https://github.com/miwasil/ItaloQuizz/assets/115273240/b8599d69-3eab-4ced-8cce-fee5398629f3)



Aby uruchomić bazę danych wejdź w PHPmyAdmin
> http://localhost/phpmyadmin

Stwórz nową bazę danych o nazwie 'posting', następnie kliknij w prawym górnym rogu 'Import' i wybierz dump naszej bazy danych z wcześniej pobranego folderu (posting.sql). Jeżeli pojawią się jakieś błędy to je zignoruj.

Sprawdź czy wszystko działa poprawnie logując się i dodając nowy post. Możesz użyć już stworzonego konta:

> email: zadania </br>
> hasło: zadania

Po zrobieniu każdego zadania umieść na UPELu zrzut ekranu kodu/skryptu/zapytania oraz efektu, jaki on daje.

## Zadanie 1- CSRF GET
### 1.1

Przeprowadzisz tutaj atak CSRF na stronę, która dodaje posty metodą GET (mainpage_get.php).
Poprzez specjalnie spreparowany link lub cały skrypt .html (strona, która po kliknięciu w jakiś przycisk uruchomi spreparowany link przekierowujący na mainpage_get.php) dodaj nowy post o treści: `Deadline projektu z Comnet minął 2 tygodnie temu hahahaha`. </br>
Zrób to będąc zalogowanym na koncie 'zadania'.

### 1.2

Tutaj będziesz miał analogiczne zadanie, jednak stwórz skrypt .html, który po otwarciu tej strony automatycznie doda nam post o treści: `Wraz z dzisiejszym dniem kończę współpracę z moimi sponsorami`. </br>
Chodzi tutaj o to, żeby przeprowadzić atak, gdy użytkownik wchodzi tylko na stronę (stworzoną przez Ciebie) ale nie wchodzi w żadne odnośniki na niej. Zrób to będąc zalogowanym na koncie 'zadania'. 

> podpowiedź: fałszywe zdjęcie

## Zadanie 2- CSRF POST

Napisz skrypt .html, który po kliknięciu w przycisk na tej stronce będzie przesyłał formularz z gotowym postem o treści: `Chciałbym ogłosić przekazanie swojego majątku fundacji walki z meduzami w Morzu Śródziemnym`. </br>
Zrób to będąc zalogowanym na koncie 'zadania'.

> uwaga: jest to atak metodą POST, więc musisz zaatakować stronę, która dodaje posty właśnie tą metodą -> mainpage.php

## Zadanie 3- login CSRF

Stwórz nowe konto w bazie danych (zrób to w phpmyadmin w tabeli 'login'). </br>
Przeprowadź atak login CSRF, czyli stwórz skrypt, dzięki któremu klikając coś na stronie (tej stworzonej teraz przez Ciebie) zalogujesz się na to nowo stworzone konto. </br> 
Następnie dodaj tam jakiś post (nieuważny użytkownik może nie zwrócić uwagi, że dodaje coś nie na swoim koncie) o treści: `Pamiętniczku, dzień 3- dziś przy moim mieszkaniu na Łobzowskiej 17 przydarzył się straszny wypadek...`.

## Zadanie 4



## Zadanie 5 – TOKEN CSRF

Token CSRF jest najbardziej popularnym zabezpieczeniem przed atakami CSRF. Polega on na dodawaniu ukrytego pola w formularzu zawierającego losowy ciąg znaków. Tak powiązany token z ciasteczkami sesji pozwala na skuteczną weryfikację zapytań po stronie serwera. Atakujący nie jest w stanie odgadnąć tokenu ustanowionego dla danej sesji, więc każde sfabrykowane zapytanie będzie odrzucane przez serwer.

### 5.1 Generowanie unikalnego tokenu

Aby zabezpieczenie działało poprawnie, należy wygenerować unikalny token przy ustanawianiu nowej sesji, na przykład podczas logowania się przez użytkownika. Warto przechowywać taki token w zmiennej $_SESSION.

Psst!! Gdzieś w tym miejscu trzeba to zrobić (loginpage.php)

![5a](https://github.com/miwasil/ItaloQuizz/assets/115181450/6107a243-fdde-4961-a78b-97b658b5199a)

### 5.2 Przekazywanie tokenu CSRF klientowi

Następnie należy przekazać token CSRF klientowi. W zapytaniach POST używa się do tego pola input z parametrem hidden. Dzięki temu token będzie przesyłany za każdym razem, gdy używamy konkretnego formularza. Robimy to w formularzu w pliku mainpage.php. 

Takie pole może wyglądać w ten sposób

![5b](https://github.com/miwasil/ItaloQuizz/assets/115181450/87a75bb3-3205-4b7d-99e7-de51ccffc034)



### 5.3 Walidacja tokenu CSRF

Ostatnim krokiem jest weryfikacja czy dla danego zapytania token jest poprawny (lub czy w ogóle istnieje). Tutaj znowu należy coś dodać do pliku mainpage.php

Można to zrobić gdzieś w tym miejscu (wystarczy prosty if sprawdzający token jest prawidłowy lub czy w ogóle istnieje)
![5c](https://github.com/miwasil/ItaloQuizz/assets/115181450/18337054-f1ab-47a4-9e1a-a724fdd234aa)

Tak zaimplementowany token zabezpiecza użytkownika przed atakami CSRF. Należy jednak pamiętać, że taki token musi być zawarty w każdym zapytaniu generowanym do serwera (np. w każdym formularzu). Dodatkowo aby takie zabezpieczenie miało sens, aplikacja musi być zabezpieczona przed atakami XSS tak aby nie dało się wykraść wartości tokena.
