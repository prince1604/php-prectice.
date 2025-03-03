<form method = "post" action=""<?php echo htmlspecialchars($_server["php_self"]);?>">
    name: <input type="text" name="name">
    <span class="error">* <?php echo $nameerr;?></span>
    <br><br>
    e-mail:
    <input type="text"  name="email">
    <span class="error">* <?php echo $emailerr;?></span>
    <br><br>
    website:
    <input type=""text name="website">
    <span class="error"><?php echo $websiteerr;?></span>
    <br><br>
    comment:<textarea name="comment" row="5" cols="40"></textarea>
    <br><br>
    gender:
    <input type="radio" name="gender" value="female">female
    <input type="radio" name="gender" value="male">male
    <input type="radio" name="gender" value="other">other
    <span class="error">* <?php echo $gendererr;?></span>
    <br><br>
    input type="submit" name="submit" value="sumbit">
    </form> 