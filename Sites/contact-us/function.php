<?

function checkemail($email)
{
	if(ereg("^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int)$", $email))
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>