<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>


<form action="testPictureUpload.php" enctype="multipart/form-data" method="POST">
    Choose Image : <input name="img" size="35" type="file"/><br/>
    <input type="submit" name="submit" value="Upload"/>
</form>

<?php

// Script to test if the CURL extension is installed on this server

// Define function to test
function _is_curl_installed() {
    if  (in_array  ('curl', get_loaded_extensions())) {
        return true;
    }
    else {
        return false;
    }
}

// Ouput text to user based on test
if (_is_curl_installed()) {
    echo "cURL is <span style=\"color:blue\">installed</span> on this server";
} else {
    echo "cURL is NOT <span style=\"color:red\">installed</span> on this server";
}
?>