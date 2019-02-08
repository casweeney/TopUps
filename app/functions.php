<?php
    function inject_checker ($connection, $field){
        return (htmlentities(trim(mysqli_real_escape_string($connection, $field))));
    }
    
    function prepare_input($input){
        $output = trim($input);
        $output = stripslashes($output);
        $output = htmlspecialchars($output);
        
        return $output;
    }

    function redirect_to($location){
        header("location: {$location}");
        exit;
    }

    //////////////// FUNCTION TO VERIFY ONLY TEXT FIELDS ///////////////
	function text_only_validator ($name){
		// return(@ereg('^[a-zA-Z]+[a-z0-9A-Z]+$', $name));
		return ctype_alnum($name);
	}

    function numbers_only($value){
        return preg_match('/^([0-9]+)$/', $value);
    }

	//////////////// FUNCTION TO VERIFY ONLY USERNAME FIELDS ///////////////
	function username_validator ($username){
		// return(@ereg('^[@]+[a-z0-9A-Z_]+$', $username));
		return preg_match("/^[a-z0-9A-Z]*$/",$username);
	}

	////////////////FUNCTION TO VERIFY ONLY EMAIL FIELDS ///////////////
	function single_email_validator ($email){
		// return(preg_match('^[a-z0-9A-Z]+@[a-z0-9A-Z]+\\.[a-z]+$', $email));
        return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
	/////////////// TO ENCRYPT DATA SENT THROUGH GETS //////////////
	function confused ($get){
		return( sha1(sha1(sha1(htmlentities(urlencode($sent))))) );
	}
?>