<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name"><?php 
                        if($transactionSuccessful)
                        {echo "Success!";} 
                        else
                            {echo "Something went wrong!";}?></span>
                        <hr class="star-light">
                        <div class="col-xs-6 col-xs-offset-3">
                            <?php echo $charge_message?>
                        </div>
                        <?php if ($file_errors != ""){
                            echo "<div class=\"col-xs-6 col-xs-offset-3\">";
                            echo "There were some file errors:<br>";
                            echo $file_errors;
                            echo "<br>Please send in your essay and (include your name as the subject) directly to scwediting@gmail.com";
                            echo "</div>";
                            }?>
                    </div>
                </div>
            </div>
        </div>
    </header>