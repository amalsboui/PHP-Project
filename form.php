<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Soumission</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Profile Changes</h2>
        <form action="includes/formsent.inc.php" method="post" enctype="multipart/form-data">
            <label for="username">Username</label><br>
            <input  type="text" name="username"style="width: 350px; height: 50px" ><br><br>
            <label for="projects">Projects done before :</label><br>
            <input  type="text" name="projects" placeholder="list ur projects and achievements briefly"style="width: 350px; height: 50px" ><br><br>
            <label for="email">Your mail Adress :</label><br>
            <input  type="email" name="email"style="width: 350px; height: 50px" ><br><br>
            <label for="job">Your job :</label><br>
            <input  type="text" name="job"style="width: 350px; height: 50px" ><br><br>
            <label for="city">City :</label><br>
            <select  name="city">
            <option value="Tunis">Tunis</option>
            <option value="Sfax">Sfax</option>
            <option value="Monastir">Monastir</option>
            <option value="Ariana">Ariana</option>
            <option value="Sousse">Sousse</option>
            <option value="Mahdiz">Mahdia</option>
            <option value="Medenine">Medenine</option>
            <option value="Nabeul">Nabeul</option>
            <option value="Ben Arous3">Ben Arous</option>
            <option value="Bizerte">Bizerte</option>
            <option value="Gabes">Gabes</option>
            <option value="Manouba">Manouba</option>
            <option value="Zaghouan">Zaghouan</option>
            <option value="Beja">Beja</option>
            <option value="Tozeur">Tozeur</option>
            <option value="Kairouan">Kairouan</option>
            <option value="Kef">Kef</option>
            <option value="Siliana">Siliana</option>
            <option value="Sidi Bouzid">Sidi Bouzid</option>
            <option value="Tataouine">Tataouine</option>
            <option value="Gafsa">Gafsa</option>
            <option value="Kasserine">Kasserine</option>
            <option value="Jendouba">Jendouba</option>
            <option value="Kebili">Kebili</option>
             </select><br><br>

            <label for="image">Upload a profile picture :</label><br>
            <input type="file" id="image" name="image"><br><br>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
