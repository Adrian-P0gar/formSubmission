            <html>
            <head>
                <style>
                    .error {color: #FF0000;}
                </style>
            </head>

            <body>
    <?php  $nameErr = $genderErr = $hobbiesErr = "";
    $name = $day = $month= $year =  $gender = $hobbies = $explodedName = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (empty($_POST["name"])){
            $nameErr = "Name is required!";
        } else {
            $name = test_input($_POST["name"]);
        }

        $day = test_input($_POST["day"]);
        $month = test_input($_POST["month"]);
        $year = test_input($_POST["year"]);
        if( empty($_POST['gender'])){
            $genderErr = "Gender is required!";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        if( empty($_POST['hobbies'])){
            $hobbies = "Hobbies is required!";
        } else {
            $hobbies = $_POST["hobbies"];
        }
        $explodedName = explode(" ", $name);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

            <h1> Form submission </h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <p>
                    Name: <input type="text" name="name"><br>
                        <span class="error" >* <?php echo $nameErr;?></span>
                    </p>
                    <p>
                    Birth date: <select name="day">
                        <?php for ($i = 1; $i <= 31; $i++): ?>
                            <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo $i ?>
                        <?php endfor ?>
                        </select>
                       <select name="month">
                           <?php for ($i = 1; $i <= 12; $i++): ?>
                           <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo $i ?>
                               <?php endfor ?>
                       </select>
                    <select name="year">
                        <?php for ($i = 1920; $i <= 2020; $i++): ?>
                        <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?php echo $i ?>
                            <?php endfor ?>
                    </select></p>
                        <p>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male"> Male </label>
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female"> Female </label>
                            <input type="radio" name="gender" id="other" value="other">
                            <label for="other"> Other? </label>
                            <span class="error" >* <?php echo $genderErr;?></span>
                        </p>
                        <p>
                            <input type="checkbox" name="hobbies[]"  id="sport" value="sport">
                            <label for="sport"> Sport </label>
                            <input type="checkbox" name="hobbies[]" id="reading" value="reading">
                            <label for="reading"> Reading </label>
                            <input type="checkbox" name="hobbies[]" id="watchingTV" value="watchingTV">
                            <label for="watchingTV"> Watching TV </label>
                            <input type="checkbox" name="hobbies[]" id="programming" value="programming">
                            <label for="programming"> Programming </label>
                            <input type="checkbox" name="hobbies[]" id="dancing" value="dancing">
                            <label for="dancing"> Dancing </label>
                            <span class="error" >* <?php echo $hobbiesErr;?></span>
                        </p>
                        <p>
                            <input type="submit" name="submit" value="Submit">
                        </p>
                </form>
            </body>
            </html>



            <?php



            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(count($explodedName) > 1){
                echo "First name: ". $explodedName[0]. " Last name: ";
                for($i=1; $i< count($explodedName); $i++  ){
                    echo $explodedName[$i]. " ";
                }
            }else{
                echo "Name: ". $explodedName[0];
            }}

                echo "<br> Birth date: ". $day. " - ". $month. " - ". $year. '<br>';
                echo " Gender: ". $gender. "<br>";
                echo "Hobbies : ";

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                if(is_array($hobbies)){
                    for($i=0; $i < count($hobbies); $i++ ){
                        echo  $hobbies[$i] . " ";}

                }
            }

            ?>