function cache(d, m, C1, C2){
	if(document.getElementById(d).style.display=='none'){
		document.getElementById(d).style.display='block';
		document.getElementById(m).innerHTML=C1;
	}else{
		document.getElementById(d).style.display='none';
		document.getElementById(m).innerHTML=C2;
	}

}
