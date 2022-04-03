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
			else if($valeurIndice>45 && $valeurIndice<=55){
			return ('class="Vert1"');
			}
			else if($valeurIndice>40 && $valeurIndice<=60){
			return ('class="Vert2"');
			}
			else if($valeurIndice>35 && $valeurIndice<=65){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>30 && $valeurIndice<=70){
			return ('class="Jaune"');
			}
			else if($valeurIndice>25 && $valeurIndice<=75){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>20 && $valeurIndice<=80){
			return ('class="Orange"');
			}
			else if($valeurIndice>15 && $valeurIndice<=85){
			return ('class="Rouge"');
			}
			else if($valeurIndice>10 && $valeurIndice<=90){
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
			else if($valeurIndice<2 && $valeurIndice>=1){
			return ('class="Vert1"');
			}
			else if($valeurIndice<3 && $valeurIndice>=2){
			return ('class="Vert2"');
			}
			else if($valeurIndice<4 && $valeurIndice>=3){
			return ('class="Jaune"');
			}
			else if($valeurIndice<5 && $valeurIndice>=4){
			return ('class="Orange"');
			}
			else if($valeurIndice<6 && $valeurIndice>=5){
			return ('class="Rouge"');
			}
			else if($valeurIndice<7 && $valeurIndice>=6){
			return ('class="RougeBrique"');
			}
			else if($valeurIndice==7){
			 return ('class="RougeNoir"');
			}
		}
		if ($nomIndice=="indpaixglobale"){
			if($valeurIndice==NULL){
				return('class="Vide"');
			}
			else if($valeurIndice>=1 && $valeurIndice<=1.5){
			return ('class="Vert1"');
			}
			else if($valeurIndice>1.5 && $valeurIndice<=2){
			return ('class="VertJaune"');
			}
			else if($valeurIndice>2 && $valeurIndice<=2.5){
			return ('class="Jaune"');
			}
			else if($valeurIndice>2.5 && $valeurIndice<=3){
			return ('class="JauneFonce"');
			}
			else if($valeurIndice>3 && $valeurIndice<=3.5){
			return ('class="Orange"');
			}
			else if($valeurIndice>3.5 && $valeurIndice<=4){
			return ('class="Rouge"');
			}
			else if($valeurIndice>4 && $valeurIndice<=4.5){
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