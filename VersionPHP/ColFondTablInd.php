<?
	function FondCase ($nomIndice, $valeurIndice){
		if($nomIndice=="indicedemocratie"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>90 && $valeurIndice<=100){
			return ('class="Vert1"');
			}
			else if($valeurIndice>80 && $valeurIndice<=90){
			return ('class="Vert2"');
			}
			else if($valeurIndice>70 && $valeurIndice<=80){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>60 && $valeurIndice<=70){
			return ('class="Jaune"');
			}
			else if($valeurIndice>50 && $valeurIndice<=60){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>40 && $valeurIndice<=50){
			return ('class="Orange"');
			}
			else if($valeurIndice>30 && $valeurIndice<=40){
			return ('class="Rouge"');
			}
			else if($valeurIndice>20 && $valeurIndice<=30){
			return ('class="RougeBrique"');
			}
			else{
				 return ('class="RougeNoir"');
			}
		} 
		if ($nomIndice=="indcorruption"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>90 && $valeurIndice<=100){
			return ('class="Vert1"');
			}
			else if($valeurIndice>80 && $valeurIndice<=90){
			return ('class="Vert2"');
			}
			else if($valeurIndice>70 && $valeurIndice<=80){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>60 && $valeurIndice<=70){
			return ('class="Jaune"');
			}
			else if($valeurIndice>50 && $valeurIndice<=60){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>40 && $valeurIndice<=50){
			return ('class="Orange"');
			}
			else if($valeurIndice>30 && $valeurIndice<=40){
			return ('class="Rouge"');
			}
			else if($valeurIndice>20 && $valeurIndice<=30){
			return ('class="RougeBrique"');
			}
			else{
				 return ('class="RougeNoir"');
			}
		}
		if ($nomIndice=="indparite"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>90 && $valeurIndice<=100){
			return ('class="Vert1"');
			}
			else if($valeurIndice>80 && $valeurIndice<=90){
			return ('class="Vert2"');
			}
			else if($valeurIndice>70 && $valeurIndice<=80){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>60 && $valeurIndice<=70){
			return ('class="Jaune"');
			}
			else if($valeurIndice>50 && $valeurIndice<=60){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>40 && $valeurIndice<=50){
			return ('class="Orange"');
			}
			else if($valeurIndice>30 && $valeurIndice<=40){
			return ('class="Rouge"');
			}
			else if($valeurIndice>20 && $valeurIndice<=30){
			return ('class="RougeBrique"');
			}
			else{
				 return ('class="RougeNoir"');
			}
		} 
		if ($nomIndice=="indlibermorale"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>90 && $valeurIndice<=100){
			return ('class="Vert1"');
			}
			else if($valeurIndice>80 && $valeurIndice<=90){
			return ('class="Vert2"');
			}
			else if($valeurIndice>70 && $valeurIndice<=80){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>60 && $valeurIndice<=70){
			return ('class="Jaune"');
			}
			else if($valeurIndice>50 && $valeurIndice<=60){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>40 && $valeurIndice<=50){
			return ('class="Orange"');
			}
			else if($valeurIndice>30 && $valeurIndice<=40){
			return ('class="Rouge"');
			}
			else if($valeurIndice>20 && $valeurIndice<=30){
			return ('class="RougeBrique"');
			}
			else{
				 return ('class="RougeNoir"');
			}
		} 
		if ($nomIndice=="indlibercivile"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>83.33 && $valeurIndice<=100){
			return ('class="Vert1"');
			}
			else if($valeurIndice>66.67 && $valeurIndice<=83.33){
			return ('class="Vert2"');
			}
			else if($valeurIndice>50 && $valeurIndice<=66.67){
			return ('class="Jaune"');
			}
			else if($valeurIndice>33.33 && $valeurIndice<=50){
			return ('class="Orange"');
			}
			else if($valeurIndice>16.67 && $valeurIndice<=33.33){
			return ('class="Rouge"');
			}
			else if($valeurIndice>0 && $valeurIndice<=16.67){
			return ('class="RougeBrique"');
			}
			else if($valeurIndice==0){
			 return ('class="RougeNoir"');
			}
		}
		if ($nomIndice=="indpaixglobale"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice<=100 && $valeurIndice>87.5){
			return ('class="Vert1"');
			}
			else if($valeurIndice<=87.5 && $valeurIndice>75){
			return ('class="VertJaune"');
			}
			else if($valeurIndice<=75 && $valeurIndice>62.5){
			return ('class="Jaune"');
			}
			else if($valeurIndice<=62.5 && $valeurIndice>50){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice<=50 && $valeurIndice>37.5){
			return ('class="Orange"');
			}
			else if($valeurIndice<=37.5 && $valeurIndice>25){
			return ('class="Rouge"');
			}
			else if($valeurIndice<=25 && $valeurIndice>12.5){
			return ('class="RougeBrique"');
			}
			else{
				 return ('class="RougeNoir"');
			}
		}
		
		if ($nomIndice=="indbonheur"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>90 && $valeurIndice<=100){
			return ('class="Vert1"');
			}
			else if($valeurIndice>80 && $valeurIndice<=90){
			return ('class="Vert2"');
			}
			else if($valeurIndice>70 && $valeurIndice<=80){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>60 && $valeurIndice<=70){
			return ('class="Jaune"');
			}
			else if($valeurIndice>50 && $valeurIndice<=60){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>40 && $valeurIndice<=50){
			return ('class="Orange"');
			}
			else if($valeurIndice>30 && $valeurIndice<=40){
			return ('class="Rouge"');
			}
			else if($valeurIndice>20 && $valeurIndice<=30){
			return ('class="RougeBrique"');
			}
			else{
				 return ('class="RougeNoir"');
			}
		}
		
	}?>