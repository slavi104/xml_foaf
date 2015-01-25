<!DOCTYPE html>
<html>
<head>
  <title>FOAF Generator</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>FOAF Generator</h1>
  <div id="generation_form_folder">
    <h2>Settings:</h2>
    <form method="POST" action="names_generator.php" id="name_generator">

        <div class="labelAndInput">
            <label>Start birth date:</label>
            <input type="date" id="start_date" name="start_date" value="01-01-1960"/>
        </div>
        <br><br>
        <div class="labelAndInput">
            <label>End birth date:</label>
            <input type="date" id="end_date" name="end_date" value="31-12-1979"/>
        </div>
        <br><br>
        <div class="labelAndInput">
            <label>Number of men(max 50):</label>
            <input type="number" min="0" max="50" id="number_men" name="number_men" value="50"/>
        </div>
        <br><br>
        <div class="labelAndInput">
            <label>RNumber of women(max 50):</label>
            <input type="number" min="0" max="50" id="number_women" name="number_women" value="50"/>
        </div>
        <br><br>
        <div class="labelAndInput">
            <label>Tel code:</label>
            <input type="text" id="tel_code" name="tel_code" value="+359-898-"/>
        </div>
        <br><br>
        <div class="labelAndInput" style="width:50%; display:inline-block; float:left;">
            <label>Men names:</label>
            <textarea type="text" id="men_names" name="men_names">
Jamar Keiper
Marion Stocker
Duncan Cohan
Omer Vivier
Donny Maliszewski
Daryl Hartsell
Delmer Shutts
Christian Onorato
Buster Loisel
Carol Flinchum
Chadwick Willsey
Carroll Cerrone
Demetrius Eisenmenger
Nathanial Salsman
Wilfredo Yankey
Tyree Bock
Ivory Loberg
Jerrell Lockwood
James Sabin
Eddy Sola
Alex Frankum
Houston Bohling
Gavin Vannorman
Stanley Roesner
Isaiah Poyer
Jae Laverriere
Elmo Doyel
Simon Mccutchan
Randall Woodberry
Joe Stoney
Bernard Bolin
Elisha Edmond
Sol Elzy
Augustus Pinkham
Rubin Jacobs
Anderson Pickering
Brent Bracken
Bill Schrecengost
Oscar Cude
Clint Alden
Brain Siegal
Ahmad Cressman
Ira Vollmer
Huey Ruggieri
Bruce Coman
Lamar Bylsma
Shad Noblitt
Trey Weisz
Thurman Shadduck
Timmy Shoulders
            </textarea>
        </div>
        <div class="labelAndInput" style="width:50%; display:inline-block;">
            <label>Women names:</label>
            <textarea type="text" id="women_names" name="women_names">
Crissy Richard
Nevada Sturgell
Kristen Burbage
Danyelle Ruddell
Daisy Champney
Sherron Mangum
Tajuana Ortegon
Ilana Adelson
Eleonora Brunswick
Rosina Ravelo
Awilda Riccardi
Mei Sowinski
Ronna Buckmaster
Hailey Gash
Dalia Wardlow
Alita Wishon
Mignon Hickox
Emiko Hubler
Jami Despres
Florencia Decosta
Fay Cleghorn
Janean Przybyla
Chery Fargo
Meagan Bohannon
Yoshie Borchers
Kyra Eaves
Libbie Leonetti
Gisela Astin
Alysia Dalke
Cyndy Camp
Vennie Cornell
Cynthia Hollingshead
Kyung Trunnell
Bernadette Monterroso
Analisa Bartlow
Gia Eskridge
Ciera Dickenson
Magaret Koziel
Sari Claypoole
Kam Marcial
Sharlene Dederick
Shenita Blazer
Roxana Fluker
Judie Feher
Claudia Dulmage
Gilma Montag
Takisha Oxner
Krystle Spagnoli
Leeanne Mensch
Arline Mosby
            </textarea>
        </div>

        <input type="submit" id="generate_btn" value="Generate" href="/index.php">
    </form>
</div>
</body>
</html>