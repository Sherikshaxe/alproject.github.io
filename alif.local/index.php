<?php

	
	$dates = file_get_contents("secret.txt");
	$sliceddates = explode(" ", $dates);
	$all  = array();
	$negatives= array();
	$positives= array();
	$fl = array();
		for ($i=0; $i<count($sliceddates); $i+=2) {
		     array_push($all,$sliceddates[$i]+$sliceddates[$i+1]);
		     array_push($fl, $sliceddates[$i]."+".$sliceddates[$i+1]."=");
		     array_push($all,$sliceddates[$i]-$sliceddates[$i+1]);
		     array_push($fl, $sliceddates[$i]."-".$sliceddates[$i+1]."=");
		     array_push($all,$sliceddates[$i]*$sliceddates[$i+1]);
		     array_push($fl, $sliceddates[$i]."*".$sliceddates[$i+1]."=");
		     array_push($all,$sliceddates[$i]/$sliceddates[$i+1]);
		     array_push($fl, $sliceddates[$i].":".$sliceddates[$i+1]."=");

		}

		for ($j=0; $j<count($all); $j++) {
			 	if ($all[$j]>0) {
			 		
			 	array_push($positives,$fl[$j].$all[$j]."
");			
			    }else{
			    array_push($negatives, $fl[$j].$all[$j]."
");
			    }
			
			
		}
		echo "POSiTIVE ANSWERS HERE:
";
			for ($o=0; $o<count($positives); $o++) { 
				echo $positives[$o];
			}
		echo "NEGATIVE ANSWERS HERE:
";
			for ($o=0; $o<count($negatives); $o++) { 
				echo $negatives[$o];
			}
		echo "LOOK AT FILE SECRET.txt";


		file_put_contents("positives.txt", $positives);	
		file_put_contents("negatives.txt", $negatives);
	
